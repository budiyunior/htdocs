<?php
    include 'koneksi.php';

    $origin = "86";
    $weight = 1000;
    $courier = "jne";
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM alamat WHERE id = $id");

    $alamat = mysqli_fetch_array($data);
    // print_r($alamat);
    // echo $alamat['id']." ".$alamat['detail'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$alamat['id_kota']."&weight=".$weight."&courier=".$courier,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 66277c2fe0a72d6dcbf96b55fbf3c3cf"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // if ($err) {
    //     echo "cURL Error #:" . $err;
    // } else {
    //     echo $response;
    // }

    $cost = json_decode($response, true);
    $berat = $cost['rajaongkir']['query']['weight']

    // echo $cost['rajaongkir']['origin_details']['city_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Pilih Ongkir</h2>
    <br>
    <table>
        <tr>
            <td>
                <h4>Kota Asal</h4>
            </td>
            <td>:</td>
            <td>
                <?php echo $cost['rajaongkir']['origin_details']['city_name'].", ".$cost['rajaongkir']['origin_details']['province']." (".$cost['rajaongkir']['origin_details']['postal_code'].")" ?>
            </td>
        </tr>

        <tr>
            <td>
                <h4>Kota Tujuan</h4>
            </td>
            <td>:</td>
            <td>
                <?php echo $cost['rajaongkir']['destination_details']['city_name'].", ".$cost['rajaongkir']['destination_details']['province']." (".$alamat['kode_pos'].")" ?>
            </td>
        </tr>

        <tr>
            <td>
                <h4>Berat Item</h4>
            </td>
            <td>:</td>
            <td>
                <?php echo $berat." gr (". $berat/1000 ." kg)" ?>
            </td>
        </tr>
    </table>
    <br>
    <?php for($i = 0; $i < count($cost['rajaongkir']['results']); $i++): ?>
        <?php for($j = 0; $j < count($cost['rajaongkir']['results'][$i]['costs']); $j++): ?>
            <h5>
                <?php echo $cost['rajaongkir']['results'][$i]['name']; ?>
            </h5>
            <p>
                <?php echo $cost['rajaongkir']['results'][$i]['costs'][$j]['description'] ?>
            </p>
            <p>
                Rp. <?php echo $cost['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'] ?> (<?php echo $cost['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'] ?> hari)
            </p>
        <?php endfor; ?>
    <?php endfor; ?>
</body>
</html>
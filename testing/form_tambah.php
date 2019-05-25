<?php
    include 'koneksi.php';

    // Mengambil data provinsi
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 66277c2fe0a72d6dcbf96b55fbf3c3cf"
    ),
    ));

    $prov = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // Mengambil data kota
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 66277c2fe0a72d6dcbf96b55fbf3c3cf"
    ),
    ));

    $kota = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    //konversi data
    $data_prov = json_decode($prov, true);
    $data_kota = json_decode($kota, true);

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
    <form action="add_alamat.php" method="post">
        <label for="provinsi">Provinsi</label>
        <select name="provinsi" id="provinsi">
            <?php for($i = 0; $i < count($data_prov['rajaongkir']['results']); $i++)
                {
                    echo "<option value='".$data_prov['rajaongkir']['results'][$i]['province_id'].','.$data_prov['rajaongkir']['results'][$i]['province']."'>".$data_prov['rajaongkir']['results'][$i]['province']."</option>";
                }
            ?>
        </select>
        <br>
        <label for="kota">kota</label>
        <select name="kota" id="kota">
            <?php for($i = 0; $i < count($data_kota['rajaongkir']['results']); $i++)
                {
                    echo "<option value='".$data_kota['rajaongkir']['results'][$i]['city_id'].','.$data_kota['rajaongkir']['results'][$i]['city_name']."'>".$data_kota['rajaongkir']['results'][$i]['city_name']."</option>";
                }
            ?>
        </select>
        <br>
        <label for="kodepos">Kode Pos</label>
        <input type="text" name="kodepos" id="kodepos" maxlenght="5">
        <br>
        <label for="detail">Detail</label>
        <br>
        <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
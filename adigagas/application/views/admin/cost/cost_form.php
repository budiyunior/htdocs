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
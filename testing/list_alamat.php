<?php

    include 'koneksi.php';

    $data_alamat = mysqli_query($conn, "SELECT * FROM alamat");
    
    print_r($data_alamat);
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
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>id provinsi</th>
                <th>provinsi</th>
                <th>id kota</th>
                <th>nama kota</th>
                <th>kode pos</th>
                <th>detail</th>
                <th>status</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data_alamat as $row): ?>
            <tr>
                <td>
                    <?php echo $row['id'] ?>
                </td>
                <td>
                    <?php echo $row['id_provinsi'] ?>
                </td>
                <td>
                    <?php echo $row['nama_provinsi'] ?>
                </td>
                <td>
                    <?php echo $row['id_kota'] ?>
                </td>
                <td>
                    <?php echo $row['nama_kota'] ?>
                </td>
                <td>
                    <?php echo $row['kode_pos'] ?>
                </td>
                <td>
                    <?php echo $row['detail'] ?>
                </td>
                <td>
                    <?php echo $row['stat'] ?>
                </td>
                <td>
                    <a href="use.php?id=<?php echo $row['id']; ?>">USE</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
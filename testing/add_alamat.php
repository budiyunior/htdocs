<?php
include 'koneksi.php';

// echo $_POST['provinsi'];
$prov = explode("," , $_POST['provinsi']);
$kota = explode("," , $_POST['kota']);


    

    $id_provinsi = $prov[0];
    $nama_provinsi = $prov[1];
    $id_kota = $kota[0];
    $nama_kota = $kota[1];
    $kode_post = $_POST['kodepos'];
    $detail = $_POST['detail'];
    $stat = 0;

    mysqli_query($conn, "INSERT INTO alamat VALUES(NULL,'$id_provinsi','$nama_provinsi','$id_kota','$nama_kota','$kode_post','$detail','$stat')");
    
    echo $_POST['provinsi'];
    echo $_POST['kota'];
    echo $_POST['kodepos'];
    echo $_POST['provinsi'];
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
    <a href="list_alamat.php">
        <button>LIST</button>
    </a>
</body>
</html>
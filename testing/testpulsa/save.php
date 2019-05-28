<?php
    session_start();
    unset($_SESSION['transaksi']);
    unset($_SESSION['detail_transaksi']);
    unset($_SESSION['status']);
    
    include 'koneksi.php';

    $id = $_POST['id_transaksi'];
    $bayar = $_POST['bayar'];
    $total = $_POST['total'];
    $kembali = $bayar - $total;

    $save = mysqli_query($conn, "UPDATE tm_transaksi SET bayar='$bayar',kembali='$kembali' WHERE id_transaksi = '$id'");

    header("location: form_trans.php");
    echo "<script>alert('Kembali : ".$kembali."')</script>";
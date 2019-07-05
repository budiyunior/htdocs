<?php
    session_start();
    include 'koneksi.php';

    $id = $_POST['id_transaksi'];
    $bayar = $_POST['bayar'];
    $total = $_POST['total'];
    $kembali = $bayar - $total;

    if($bayar < $total){
        $_SESSION['save']="warning";
        $_SESSION['savenotif']="Silahkan masukkan nominal pembayaran dengan benar";
    }else{
        unset($_SESSION['transaksi']);
        unset($_SESSION['detail_transaksi']);
        unset($_SESSION['status']);
        
        

        $save = mysqli_query($conn, "UPDATE tm_transaksi SET bayar='$bayar',kembali='$kembali' WHERE id_transaksi = '$id'");

        $_SESSION['save']="success";
        $_SESSION['savenotif']="Kembali Rp. ".$kembali;
    }
    

    header("location: beli.php");
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

        include 'print.php';

        unset($_SESSION['transaksi']);
        unset($_SESSION['detail_transaksi']);
        
        
        

        

        
    }
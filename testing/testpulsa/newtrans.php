<?php
    session_start();
    include 'koneksi.php';

    unset($_SESSION['detail_transaksi']);
    unset($_SESSION['status']);

    $id = uniqid(15);
    $tgl = date('Y-m-d');

    $trans = [
        'id_transaksi' => $id,
        'tanggal' => $tgl,
        'total' => 0,
        'bayar' => 0,
        'kembali' => 0
    ];

    $_SESSION['transaksi'] = $trans;

    $newtrans = mysqli_query($conn, "INSERT INTO tm_transaksi VALUES('$id','$tgl',0,0,0)");

    header("location: form_trans.php");
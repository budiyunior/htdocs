<?php

/*
 
 penulis: Muhammad yusuf
 website: https://www.kodingindonesia.com/
 
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //MEndapatkan Nilai Dari Variable 
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    //import file koneksi database 
    require_once('koneksi.php');

    //Membuat SQL Query
    $sql = "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat', jurusan = '$jurusan' WHERE id = $id;";

    //Meng-update Database 
    if (mysqli_query($con, $sql)) {
        echo 'Berhasil Update Data Pegawai';
    } else {
        echo 'Gagal Update Data Pegawai';
    }

    mysqli_close($con);
}

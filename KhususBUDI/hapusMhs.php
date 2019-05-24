<?php

/*
 
 penulis: Muhammad yusuf
 website: https://www.kodingindonesia.com/
 
 */

//Mendapatkan Nilai ID
$id = $_GET['id'];

//Import File Koneksi Database
require_once('koneksi.php');

//Membuat SQL Query
$sql = "DELETE FROM mahasiswa WHERE id=$id;";


//Menghapus Nilai pada Database 
if (mysqli_query($con, $sql)) {
    echo 'Berhasil Menghapus Pegawai';
} else {
    echo 'Gagal Menghapus Pegawai';
}

mysqli_close($con);

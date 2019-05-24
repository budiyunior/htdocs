<?php

/*
 
 penulis: Muhammad yusuf
 website: https://www.kodingindonesia.com/
 
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Mendapatkan Nilai Variable
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    //Pembuatan Syntax SQL
    $sql = "INSERT INTO mahasiswa (nama,alamat,jurusan) VALUES ('$nama','$alamat','$jurusan')";

    //Import File Koneksi database
    require_once('koneksi.php');

    //Eksekusi Query database
    if (mysqli_query($con, $sql)) {
        echo 'Berhasil Menambahkan Pegawai';
    } else {
        echo 'Gagal Menambahkan Pegawai';
    }

    mysqli_close($con);
}

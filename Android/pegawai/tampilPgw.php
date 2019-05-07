<?php

/*

 penulis: Muhammad yusuf
 website: http://www.kodingindonesia.com/

 */

//Mendapatkan Nilai Dari Variable ID Pegawai yang ingin ditampilkan
$id = $_GET['id'];

//Importing database
require_once('koneksi.php');

//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
$sql = "SELECT * FROM transaksi WHERE id=$id";

//Mendapatkan Hasil
$r = mysqli_query($con, $sql);

//Memasukkan Hasil Kedalam Array
$result = array();
$row = mysqli_fetch_array($r);
array_push($result, array(
	"id" => $row['id'],
	"name" => $row['nama_operator'],
	"desg" => $row['nominal'],
	"salary" => $row['no_hp']
));

//Menampilkan dalam format JSON
echo json_encode(array('result' => $result));

mysqli_close($con);
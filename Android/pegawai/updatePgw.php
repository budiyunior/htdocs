<?php

/*

 penulis: Muhammad yusuf
 website: http://www.kodingindonesia.com/

 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//MEndapatkan Nilai Dari Variable
	$id = $_POST['id'];
	$name = $_POST['name'];
	$desg = $_POST['desg'];
	$sal = $_POST['salary'];

	//import file koneksi database
	require_once('koneksi.php');

	//Membuat SQL Query
	$sql = "UPDATE transaksi SET nama_operator = '$name', nominal = '$desg', no_hp = '$sal' WHERE id = $id;";

	//Meng-update Database
	if (mysqli_query($con, $sql)) {
		echo 'Berhasil Update Data Pegawai';
	} else {
		echo 'Gagal Update Data Pegawai';
	}

	mysqli_close($con);
}
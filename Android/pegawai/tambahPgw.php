<?php

/*

 penulis: Muhammad yusuf
 website: http://www.kodingindonesia.com/

 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//Mendapatkan Nilai Variable
	$name = $_POST['name']; //nama operator
	$desg = $_POST['desg']; //nominal
	$sal = $_POST['salary']; //no_hp

	//Pembuatan Syntax SQL
	$sql = "INSERT INTO tb_pulsa (nama_operator,nominal,no_hp) VALUES ('$name','$desg','$sal')";

	//Import File Koneksi database
	require_once('koneksi.php');

	//Eksekusi Query database
	if (mysqli_query($con, $sql)) {
		echo 'Berhasil Menambahkan Pulsa';
	} else {
		echo 'Gagal Menambahkan Pulsa';
	}

	mysqli_close($con);
}

<?php
require_once 'koneksi.php';

$query = "select * from mahasiswa";

$sql = mysqli_query($con, $query);

$ray = array();

while ($row = mysqli_fetch_array($sql)) {
    array_push($ray, array(
        "id_mhs" => $row['id']
    ));
}

echo json_encode($ray);

mysqli_close($con);

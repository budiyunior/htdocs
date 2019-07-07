<?php

require_once('connection.php');

$imagename = $_FILES['imagename']['tmp_name'];

if(!$imagename){
  echo json_encode(array('message'=>'required file is empty.'));
}else{

  $dir = $_SERVER['DOCUMENT_ROOT'] . '/Khusus_Bahtiar/Api%20+%20DB/retrofitimageuploader/image/';

  $newname = uniqid() . '.jpg';

  move_uploaded_file($imagename, $dir.$newname);

  $query = mysqli_query($CON, "INSERT INTO image VALUES('','$newname')");

  if($query){
    echo json_encode(array('message'=>'image successfully uploaded.'));
  }else{
    echo json_encode(array('message'=>'image failed to upload.'));
  }

}

?>

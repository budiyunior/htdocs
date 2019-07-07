<?php

require_once('connection.php');

$imageid = $_GET['imageid'];

if(!$imageid){
  echo json_encode(array('message'=>'required id is empty.'));
}else{

  $imagename = null;
  $query = mysqli_query($CON, "SELECT imagename FROM image WHERE imageid='$imageid'");
  while($row=mysqli_fetch_array($query)){
    $imagename  = $row['imagename'];
  }

  $query1 = mysqli_query($CON, "DELETE FROM image WHERE imageid='$imageid'");

  if($query1){
    unlink($_SERVER['DOCUMENT_ROOT'] . '/Khusus_Bahtiar/Api%20+%20DB/retrofitimageuploader/image/' . $imagename);
    echo json_encode(array('message'=>'image deleted successfully.'));
  }else{
    echo json_encode(array('message'=>'image failed to delete'));
  }

}

?>

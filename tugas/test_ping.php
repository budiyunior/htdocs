<?php
$ip =   "192.168.7.19";

exec("ping -n 3 $ip", $output, $status);

$ping = $output[2];
$stat = explode(":",$ping);

if($status == 0){
    if($stat[1] != " Destination host unreachable."){
        $status = "BERHASIL";
    }else {
        $status = "GAGAL";
    };

}else {
    $status = "GAGAL";
};



?>
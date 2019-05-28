<?php
    session_start();
    include 'koneksi.php';

    $id_transaksi = $_POST['id_transaksi'];
    $op = $_POST['operator'];
    $nominal = $_POST['nominal'];
    $nomor = $_POST['nomor'];
    $biayaadmin = 2000;
    $subtotal = $biayaadmin + $nominal;
    $status_transaksi;

    $ip = "192.168.1.3";
    $port = "8989";

    //ping server SMSGateway
    exec("ping -n 3 $ip", $output, $status);

    $ping = $output[2];
    $stat = explode(":",$ping);

    // cek status transaksi
    if($status == 0){
        if($stat[1] != " Destination host unreachable."){
            $status_transaksi = "BERHASIL";
        }else {
            $status_transaksi = "GAGAL";
        };

    }else {
        $status_transaksi = "GAGAL";  
    };

    $data = array("no" => $nomor, "pesan" => "Pulsa senilai Rp. ".$nominal." telah diisikan ke nomor anda.");
    $data_string = json_encode($data);

    if ($status_transaksi == "BERHASIL"){

        if(isset($_SESSION['detail_transaksi'])){
            $_SESSION['detail_transaksi'][] = [
                'id_transaksi' => $id_transaksi,
                'operator' => $op,
                'nominal' => $nominal,
                'nomor' => $nomor,
                'biaya_admin' => $biayaadmin,
                'subtotal' => $subtotal
            ];
        } else {
            $_SESSION['detail_transaksi'] = array([
                'id_transaksi' => $id_transaksi,
                'operator' => $_POST['operator'],
                'nominal' => $nominal,
                'nomor' => $nomor,
                'biaya_admin' => $biayaadmin,
                'subtotal' => $subtotal
            ]);
            
        }

        $additem = mysqli_query($conn, "INSERT INTO td_transaksi VALUES(NULL,'$id_transaksi','$op','$nominal','$nominal','$biayaadmin','$subtotal')");

        $ch = curl_init('http://'.$ip.':'.$port.'');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Length: ' . strlen($data_string))
        );
        
        $result = curl_exec($ch);
    }

    $_SESSION['status'] = $status_transaksi;

    header("location: form_trans.php");
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cost extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: 66277c2fe0a72d6dcbf96b55fbf3c3cf"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		// if ($err) {
		// echo "cURL Error #:" . $err;
		// } else {
		// echo $response;
		// }
		// $response = curl_exec($curl);
		
		$cost = json_decode($response, true);
		$berat = $cost['rajaongkir']['query']['weight'];

		$this->load->view("admin/cost/cost_form", $cost);
    }

    
}


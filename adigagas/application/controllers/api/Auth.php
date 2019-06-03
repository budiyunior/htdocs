<?php

defined('BASEPATH') or exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends MY_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        // $this->load->database();
        $this->load->model("Auth_model");
    }

    public function index_post()
    {
        $email = $this->post('email');
        $password = md5($this->post('password'));
        $kunci = $this->config->item('thekey');

        $invalidLogin = ['status' => 'invalid login'];

        $check_login = $this->Auth_model->check_login($email, $password);

        // echo $username . ' ' . $password;

        if (!$check_login) {
            $this->response($invalidLogin, 200);
        } else {
            // $token['id'] = $data[0]['id'];  //From here
            $token['email'] = $email;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            $token['exp'] = $date->getTimestamp() + 60 * 60 * 5; //To here is to generate token
            $output['token'] = JWT::encode($token, $kunci); //This is the output token
            $output['email'] = $email; //This is the output token
            $output['id_pengguna'] = $check_login['id_pengguna']; //This is the output token
            $this->response($output, 200);
            // $this->response($output, 200);
        }
    }
}

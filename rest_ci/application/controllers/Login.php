<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Login extends REST_Controller
{
    public function index()
    {
        echo "halloo login";
    }

    public function signin()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad Request.'));
        } else {
            json_output(400, array('status' => 400, 'message' => 'Bad Request.'));
        }
    }
}

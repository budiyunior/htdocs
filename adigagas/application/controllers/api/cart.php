<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class cart extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }


    function index_get()
    {
        $cart = $this->db->get('cart')->result();
        $this->response(array("result" => $cart, 200));
    }

    function index_post() {
        $data = array(
                    'id_cart'           => $this->post('id_cart'),
                    'id_pengguna'          => $this->post('id_pengguna'),
                    'total_harga'    => $this->post('total_harga'),
                    'total_berat' => $this->post('total_berat'));
        $insert = $this->db->insert('cart', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id_cart = $this->put('id_cart');
        $data = array(
            'id_cart'           => $this->post('id_cart'),
            'id_pengguna'          => $this->post('id_pengguna'),
            'total_harga'    => $this->post('total_harga'),
            'total_berat' => $this->post('total_berat'));
       
        $this->db->where('id_cart', $id_cart);
        $update = $this->db->update('cart', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_cart = $this->delete('id_cart');
        $this->db->where('id_cart', $id_cart);
        $delete = $this->db->delete('cart');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }














}

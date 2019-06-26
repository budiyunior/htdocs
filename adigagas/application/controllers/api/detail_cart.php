<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class detail_cart extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }


    function index_get()
    {
        $detail_cart = $this->db->get('detail_cart')->result();
        $this->response(array("result" => $detail_cart, 200));
    }

    function index_post()
    {
        $data = array(
            'id_detail_cart'           => $this->post('id_detail_cart'),
            'id_pengguna'           => $this->post('id_pengguna'),
            'id_cart'           => $this->post('id_cart'),
            'id_desain'          => $this->post('id_desain'),
            'jumlah'    => $this->post('jumlah'),
            'subtotal_berat' => $this->post('subtotal_berat'),
            'subtotal_harga'           => $this->post('subtotal_harga'),
        );
        $insert = $this->db->insert('detail_cart', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $id_detail_cart = $this->put('id_detail_cart');
        $data = array(
            'id_detail_cart'           => $this->post('id_detail_cart'),
            'id_cart'           => $this->post('id_cart'),
            'id_desain'          => $this->post('id_desain'),
            'jumlah'    => $this->post('jumlah'),
            'subtotal_berat' => $this->post('subtotal_berat'),
            'subtotal_harga'           => $this->post('subtotal_harga'),
        );


        $this->db->where('id_detail_cart', $id_detail_cart);
        $update = $this->db->update('detail_cart', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete()
    {
        $id_detail_cart = $this->delete('id_detail_cart');
        $this->db->where('id_detail_cart', $id_detail_cart);
        $delete = $this->db->delete('detail_cart');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}

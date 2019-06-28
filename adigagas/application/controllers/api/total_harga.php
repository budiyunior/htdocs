<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Total_harga extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('m_showcart');
    }
    function index_post()
    {
        $id_pengguna = $this->input->post('id_pengguna');
        // $keranjang = $this->db->query("SELECT * FROM desain_cart where id_pengguna = $id_pengguna")->result();
        $keranjang = $this->db->query("SELECT SUM(subtotal_harga) as total_harga FROM desain_cart where id_pengguna = $id_pengguna")->result();
        // $keranjang = $this->db->query("SELECT * FROM `total_harga` WHERE id_pengguna = $id_pengguna")->result();
        //$perbaikan = $this->db->get_where('perbaikan',['id_user'=>$id_user])->result();
        $this->response(array("result" => $keranjang, 200));
    }
}

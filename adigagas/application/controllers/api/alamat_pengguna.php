<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Alamat_pengguna extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        
    }

    //Menampilkan data kontak
    // function index_get()
    // {
    //     $jenisitem = $this->db->get('jenis_item')->result();
    //     $this->response(array("result" => $jenisitem, 200));
    // }
    function index_get()
    {

        $alamat_pengguna = $this->db->get('alamat_pengguna')->result();
        $this->response(array("result" => $alamat_pengguna, 200));

        // $id_cart = $this->get('id_cart');
        // if ($id_cart == '') {
        //     $keranjang = $this->db->get('cart')->result();
        // } else {
        //     $this->db->where('id_cart', $id_cart);
        //     $keranjang = $this->db->get('cart')->result();
        // }
        // $this->response($keranjang, 200);

        // $id = $this->get('id');
        // if ($id == '') {
        //     $kontak = $this->db->get('telepon')->result();
        // } else {
        //     $this->db->where('id', $id);
        //     $kontak = $this->db->get('telepon')->result();
        // }
        // $this->response($kontak, 200);
    }
    function index_post()
    {
        $id_pengguna = $this->input->post('id_alamat');
        $keranjang = $this->db->query("SELECT * FROM alamat_pengguna where id_pengguna = $id_pengguna")->result();
        // $keranjang = $this->db->query("SELECT SUM(subtotal_harga) FROM desain_cart where id_pengguna = $id_pengguna")->result();

        //$perbaikan = $this->db->get_where('perbaikan',['id_user'=>$id_user])->result();
        $this->response(array("result" => $keranjang, 200));
    }



    // $this->response(array("result" => $keranjang, 200));


    // $id = $this->get('id_user');
    // if ($id == '') {
    //     $kontak = $this->db->get('user')->result();
    // } else {
    //     $this->db->where('id_user', $id);
    //     $kontak = $this->db->get('user')->result();
    // }
    // $this->response($kontak, 200);
}

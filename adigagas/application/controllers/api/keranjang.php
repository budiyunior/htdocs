<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Keranjang extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('m_keranjang');
    }

    //Menampilkan data kontak
    // function index_get()
    // {
    //     $jenisitem = $this->db->get('jenis_item')->result();
    //     $this->response(array("result" => $jenisitem, 200));
    // }
    function index_get()
    {

        $item = $this->db->get('keranjang')->result();
        $this->response(array("result" => $item, 200));

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
        $id_pengguna = $this->input->post('id_pengguna');

        // $where = array(
        //     'id_pengguna' => $id_pengguna
        // );

        // $cek=$this->m_login->cek_login_biasa($username,$password)->num_rows();
        $cek = $this->m_keranjang->cek_keranjang($id_pengguna);

        // echo $cek;
        /* if ($cek) {
            $this->response(array('status'=> 'oke','id'=>$cek['id_user']));
        }*/
        if ($cek) {
            $output['id_item'] = $cek['id_item'];
            $output['id_cart'] = $cek['id_cart'];
            $output['total_harga'] = $cek['total_harga'];
            $output['total_berat'] = $cek['total_berat'];

            $output['id_pengguna'] = $id_pengguna;

            // $output['nama_pengguna'] = $cek['nama_pengguna'];
            // $output['tanggal_lahir'] = $cek['tanggal_lahir'];
            // $output['id_akses'] = $cek['id_akses'];
            // $output['id_cart'] = $id_cart;
            // $output['password'] = $password;
            // $output['nomor_telp'] = $cek['nomor_telp'];

            $this->response($output, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
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

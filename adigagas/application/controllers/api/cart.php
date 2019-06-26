<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Cart extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('m_showcart');
    }


    function index_get()
    {
        $cart = $this->db->get('cart')->result();
        $this->response(array("result" => $cart, 200));
    }


    function index_post()
    {
        $id_pengguna = $this->input->post('id_pengguna');
        $keranjang = $this->db->query("SELECT * FROM keranjang where id_pengguna = $id_pengguna ")->result();
        //$perbaikan = $this->db->get_where('perbaikan',['id_user'=>$id_user])->result();
        $this->response(array("result" => $keranjang, 200));
    }
    // function index_post()
    // {

    //     $id_pengguna = $this->input->post('id_pengguna');
    //     $where = array(
    //         'id_cart' => $id_pengguna

    //     );

    //     // $cek=$this->m_login->cek_login_biasa($username,$password)->num_rows();
    //     $cek = $this->m_showcart->cek_login($id_pengguna);

    //     // echo $cek;
    //     /* if ($cek) {
    //         $this->response(array('status'=> 'oke','id'=>$cek['id_user']));
    //     }*/
    //     if ($cek) {
    //         $output['id_pengguna'] = $id_pengguna;
    //         $output['id_cart'] = $cek['id_cart'];
    //         $output['id_desain'] = $cek['id_desain'];
    //         $output['jumlah'] = $cek['jumlah'];
    //         $output['total_harga'] = $cek['total_harga'];
    //         $output['total_berat'] = $cek['total_berat'];
    //         $output['subtotal_harga'] = $cek['subtotal_harga'];
    //         $output['subtotal_berat'] = $cek['subtotal_berat'];

    //         $this->response($output, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }


    function index_put()
    {
        $id_cart = $this->put('id_cart');
        $data = array(
            'id_cart'           => $this->post('id_cart'),
            'id_pengguna'          => $this->post('id_pengguna'),
            'total_harga'    => $this->post('total_harga'),
            'total_berat' => $this->post('total_berat')
        );

        $this->db->where('id_cart', $id_cart);
        $update = $this->db->update('cart', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }



    function index_delete()
    {
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

<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Pengiriman extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('m_pengiriman');
    }

    //Menampilkan data kontak
    // function index_get()
    // {
    //     $jenisitem = $this->db->get('jenis_item')->result();
    //     $this->response(array("result" => $jenisitem, 200));
    // }
    function index_get()
    {
        $result = $this->m_pengiriman->cek_transaksi($id_pengiriman);
        if ($result) {
            $this->response(array('status' => 'oke', 'id' => $result['id'], $result, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_post()
    {
        $id_pengiriman = $this->input->post('id_pengiriman');
        $where = array(
            'id_pengiriman' => $id_pengiriman,
            
        );

        // $cek=$this->m_login->cek_login_biasa($username,$password)->num_rows();
        $cek = $this->m_pengiriman->cek_transaksi($id_pengiriman);

        // echo $cek;
        /* if ($cek) {
            $this->response(array('status'=> 'oke','id'=>$cek['id_user']));
        }*/
        if ($cek) {
            $output['id_pengiriman'] = $id_pengiriman;
            $output['nama_ekspedisi'] = $cek['nama_ekspedisi'];
            $output['servis'] = $cek['servis'];
            $output['deskripsi'] = $cek['deskripsi'];
            $output['harga'] = $cek['harga'];
            $output['etd'] = $cek['etd'];
           




            $this->response($output, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    // function index_get()
    // {
    //     $id_jenis_item = $this->get('id_jenis_item');
    //     if ($id_jenis_item == '') {
    //         $jenis_item = $this->db->get('jenis_item')->result();
    //     } else {
    //         $this->db->where('id_jenis_item', $id_jenis_item);
    //         $jenis_item = $this->db->get('jenis_item')->result();
    //     }
    //     $this->response($jenis_item, 200);
    // }


    // function index_post()
    // {
    //     $data = array(

    //         'nama_jenis'          => $this->post('nama_jenis'),

    //     );
    //     $insert = $this->db->insert('jenis_item', $data);
    //     if ($insert) {
    //         $this->response($data, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }

    // function index_put()
    // {
    //     $id = $this->put('id_jenis_item');
    //     $data = array(
    //         'id_jenis_item'       => $this->put('id_jenis_item'),
    //         'nama_jenis'          => $this->put('nama_jenis'),

    //     );
    //     $this->db->where('id_jenis_item', $id);
    //     $update = $this->db->update('jenis_item', $data);
    //     if ($update) {
    //         $this->response($data, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }
    // function index_delete()
    // {
    //     $id = $this->delete('id_jenis_item');
    //     $this->db->where('id_jenis_item', $id);
    //     $delete = $this->db->delete('jenis_item');
    //     if ($delete) {
    //         $this->response(array('status' => 'success'), 201);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }
}


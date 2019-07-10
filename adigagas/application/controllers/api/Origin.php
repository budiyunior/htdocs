<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Origin extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('m_origin');
    }

    //Menampilkan data kontak
    // function index_get()
    // {
    //     $jenisitem = $this->db->get('jenis_item')->result();
    //     $this->response(array("result" => $jenisitem, 200));
    // }
    // function index_get()
    // {
    //     $result = $this->m_login->cek_login($email, $password);
    //     if ($result) {
    //         $this->response(array('status' => 'oke', 'id' => $result['id'], $result, 200));
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }
    function index_post()
    {
        $id = "1";
        $where = array(
            'id_alamat_origin' => $id
        );
        // $cek=$this->m_login->cek_login_biasa($username,$password)->num_rows();
        $cek = $this->m_origin->get_origin();
        // echo $cek;
        /* if ($cek) {
            $this->response(array('status'=> 'oke','id'=>$cek['id_user']));
        }*/
        if ($cek) {
            $output['id_alamat_origin'] = $cek['id_alamat_origin'];
            $output['id_provinsi'] = $cek['id_provinsi'];
            $output['nama_provinsi'] = $cek['nama_provinsi'];
            $output['id_kota'] = $cek['id_kota'];
            $output['nama_kota'] = $cek['nama_kota'];
            $output['kode_pos'] = $cek['kode_pos'];

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

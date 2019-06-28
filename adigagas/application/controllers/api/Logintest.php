<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Logintest extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('m_logintest');
    }

    //Menampilkan data kontak
    // function index_get()
    // {
    //     $jenisitem = $this->db->get('jenis_item')->result();
    //     $this->response(array("result" => $jenisitem, 200));
    // }
    function index_get()
    {
        $result = $this->m_login->cek_login($email, $password);
        if ($result) {
            $this->response(array('status' => 'oke', 'id' => $result['id'], $result, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_post()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where = array(
            'email' => $email,
            'password' => $password
        );
        // $cek=$this->m_login->cek_login_biasa($username,$password)->num_rows();
        $cek = $this->m_logintest->cek_login($email, $password);
        // echo $cek;
        /* if ($cek) {
            $this->response(array('status'=> 'oke','id'=>$cek['id_user']));
        }*/
        if ($cek) {
            $output['id_pengguna'] = $cek['id_pengguna'];
            $output['nama_pengguna'] = $cek['nama_pengguna'];
            $output['tanggal_lahir'] = $cek['tanggal_lahir'];
            $output['id_akses'] = $cek['id_akses'];
            $output['email'] = $email;
            $output['password'] = $password;
            $output['nomor_telp'] = $cek['nomor_telp'];

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

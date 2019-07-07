<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Users extends REST_Controller
{
    public $id_pengguna;
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    //Menampilkan data kontak
    function index_get()
    {
        $id = $this->get('id_pengguna');
        if ($id == '') {
            $users = $this->db->get('pengguna')->result();
        } else {
            $this->db->where('id_pengguna', $id);
            $users = $this->db->get('pengguna')->result();
        }
        $this->response($users, 200);
    }

    function index_post()
    {
        $data = array(

            'id_pengguna'           => $this->post('id_pengguna'),
            // 'id_pengguna'           => $this->id_pengguna = uniqid($id_pengguna),
            'nama_pengguna'          => $this->post('nama_pengguna'),
            'tanggal_lahir'    => $this->post('tanggal_lahir'),
            'email'    => $this->post('email'),
            'id_akses'    => $this->post('id_akses'),
            'password'    => $this->post('password'),
            'nomor_telp'    => $this->post('nomor_telp')
        );
        $insert = $this->db->insert('pengguna', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}

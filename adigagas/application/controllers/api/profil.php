<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Profil extends REST_Controller
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
        $result = $this->m_login->cek_login($username, $password);
        if ($result) {
            $this->response(array('status' => 'oke', 'id' => $result['id'], $result, 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_post()
    {
        $id_pengguna = $this->input->post('id_pengguna');
        $a = $this->db->get_where('item', ['id_pengguna' => $id_pengguna])->result();
        $this->response(array("result" => $a, 200));
    }
}

<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller
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
        $pengguna = $this->db->get('pengguna')->result();
        $this->response(array("result" => $pengguna, 200));
    }
  

    function index_post()
    {
        $data = array(

            'pengguna'          => $this->post('pengguna'),

        );
        $insert = $this->db->insert('pengguna', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

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

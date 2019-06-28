<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Posttransaksi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $data = array(
            'id_transaksi' => $this->post('id_transaksi'),
            'id_pengguna' => $this->post('id_pengguna'),
            'tanggal_transaksi' => $this->post('tanggal_transaksi'),
            'total_harga' => $this->post('total_harga'),
            'total_berat' => $this->post('total_berat'),
            'id_alamat_kirim' => $this->post('id_alamat_kirim'),
            'id_pengiriman' => $this->post('id_pengiriman'),
            'id_status' => $this->post('id_status'),
        );
        $insert = $this->db->insert('transaksi', $data);
        if ($insert) {
            // 'id_desain'] = $insert['id_desain'];

            $this->response($data, 200);
            // $this->response($output, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}

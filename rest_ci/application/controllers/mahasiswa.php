<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Mahasiswa extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $mahasiswa = $this->db->get('mahasiswa')->result();
        $this->response(array("mahasiswa" => $mahasiswa, 200));
    }
}

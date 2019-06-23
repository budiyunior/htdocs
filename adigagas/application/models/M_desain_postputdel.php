<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_desain_postputdel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function  cek_desain($id_desain)
    {
        $this->db->where('id_desain', $id_desain);
        $data = $this->db->get('desain_pengguna')->row_array();
        return $data;
    }
}

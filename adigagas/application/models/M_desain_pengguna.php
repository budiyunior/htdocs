<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_desain_pengguna extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function  cek_desain($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $data = $this->db->get('desain_pengguna')->row_array();
        return $data;
    }
}

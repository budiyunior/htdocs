<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_keranjang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function  cek_keranjang($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $data = $this->db->get('keranjang')->row_array();
        return $data;
    }
}

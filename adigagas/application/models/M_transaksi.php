<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_transaksi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function  cek_transaksi($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $data = $this->db->get('transaksi')->row_array();
        return $data;
    }
}

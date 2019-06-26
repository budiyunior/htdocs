<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_pengiriman extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function  cek_transaksi($id_pengiriman)
    {
        $this->db->where('id_pengiriman', $id_pengiriman);
        $data = $this->db->get('pengiriman')->row_array();
        return $data;
    }
}

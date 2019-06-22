<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_keranjang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function  cek_keranjang($id_cart)
    {
        $this->db->where('id_cart', $id_cart);
        $data = $this->db->get('cart')->row_array();
        return $data;
    }
}

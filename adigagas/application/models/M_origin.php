<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_origin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_origin()
    {
        // $hash = $this->db->query("SELECT password FROM pengguna WHERE email='$email'");
        // $pass = password_verify($password, $hash);
        // $password = password_hash($password);

        $this->db->where('id_alamat_origin', 1);
        $data = $this->db->get('alamat_origin')->row_array();
        return $data;   
    }

    // function cek_item()
    // {
    //     $this->db->where('id_pengguna', $id_pengguna);
    //     $data = $this->db->get('item')->row_array();
    //     return $data;
    // }
}

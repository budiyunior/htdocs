<?php

class User extends CI_Controller
{
    public function index()
    {
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('admin/overview', $datas);
    }
}

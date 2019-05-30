<?php

class User extends CI_Controller
{
    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        echo 'Selamat datang ' . $data['pengguna']['nama_pengguna'];
    }
}

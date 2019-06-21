<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model("pelanggan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('admin/profil', $data);
    }

    public function edit($id_pengguna = null)
    {

        if (!isset($id_pengguna)) redirect('admin/profil');

        $pelanggan = $this->pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pelanggan"] = $pelanggan->getById($id_pengguna);
        if (!$data["pelanggan"]) show_404();

        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $this->load->view("admin/edit_profil", $data);
    }
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model("laporan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $data["laporan"] = $this->laporan_model->getUserId();
        $this->load->view("admin/laporan/list", $data);
    }

    public function add()
    {
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();

        $pegawai = $this->pegawai_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pegawai/new_form", $datas);
    }

    public function edit($id_pengguna = null)
    {
        if (!isset($id_pengguna)) redirect('admin/pegawai');

        $pegawai = $this->pegawai_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pegawai"] = $pegawai->getById($id_pengguna);
        if (!$data["pegawai"]) show_404();

        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $this->load->view("admin/pegawai/edit_form", $data);
    }

    public function delete($id_pengguna = null)
    {
        if (!isset($id_pengguna)) show_404();

        if ($this->pegawai_model->delete($id_pengguna)) {
            redirect(site_url('admin/pegawai'));
        }
    }
}

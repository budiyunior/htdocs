<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model("transaksi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);


        $email = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')]);
        $id_akses = $this->db->get_where('pengguna', ['id_akses' =>
        $this->session->userdata('id_akses')]);

        $data["transaksi"] = $this->transaksi_model->getDetTrans();
        $this->load->view("admin/transaksi/list", $data);
        
    }

    public function view($id = null)
    {
        if (!isset($id)) show_404();

        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);


        $email = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')]);
        $id_akses = $this->db->get_where('pengguna', ['id_akses' =>
        $this->session->userdata('id_akses')]);

        $data["trans"] = $this->transaksi_model->getTrans($id);
        $data["detailtrans"] = $this->transaksi_model->getDetailTrans($id);
        $data["konfirm"] = $this->transaksi_model->getKonfirm($id);
        $this->load->view("admin/transaksi/view", $data);
    }

    // public function add()
    // {
    //     $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $pegawai = $this->pegawai_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pegawai->rules());

    //     if ($validation->run()) {
    //         $pegawai->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("admin/pegawai/new_form", $datas);
    // }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/transaksi');

        $transaksi = $this->transaksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());

        if ($validation->run()) {
            $transaksi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["transaksi"] = $transaksi->getById($id_pengguna);
        if (!$data["transaksi"]) show_404();

        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $this->load->view("admin/transaksi/edit_form", $data);
    }

    // public function delete($id_pengguna = null)
    // {
    //     if (!isset($id_pengguna)) show_404();

    //     if ($this->pegawai_model->delete($id_pengguna)) {
    //         redirect(site_url('admin/pegawai'));
    //     }
    // }
}

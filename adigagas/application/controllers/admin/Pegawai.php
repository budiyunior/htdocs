<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pegawai_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pegawai"] = $this->pegawai_model->getAll();
        $this->load->view("admin/pegawai/list", $data);
    }

    public function add()
    {
        $pegawai = $this->pegawai_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pegawai/new_form");
    }

    public function edit($id_pengguna = null)
    {
        if (!isset($id_pengguna)) redirect('admin/pegawai');
       
        $pegawai= $this->pegawai;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pegawai"] = $pegawai->getById($id_pengguna);
        if (!$data["pegawai"]) show_404();
        
        $this->load->view("admin/pegawai/edit_form", $data);
    }

    public function delete($id_pengguna=null)
    {
        if (!isset($id_pengguna)) show_404();
        
        if ($this->pegawai_model->delete($id_pengguna)) {
            redirect(site_url('admin/pegawai'));
        }
    }
}
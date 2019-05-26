<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pelanggan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pelanggan"] = $this->pelanggan_model->getAll();
        $this->load->view("admin/pelanggan/list", $data);
    }

    public function add()
    {
        $pelanggan = $this->pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pelanggan/new_form");
    }

    public function edit($id_pelanggan = null)
    {
        if (!isset($id_pelanggan)) redirect('admin/pelanggan');
       
        $pelanggan= $this->pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pelanggan"] = $pelanggan->getById($id_pelanggan);
        if (!$data["pelanggan"]) show_404();
        
        $this->load->view("admin/pelanggan/edit_form", $data);
    }

    public function delete($id_pelanggan=null)
    {
        if (!isset($id_pelanggan)) show_404();
        
        if ($this->pelanggan_model->delete($id_pengguna)) {
            redirect(site_url('admin/pelanggan'));
        }
    }
}
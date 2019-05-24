<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("client_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pengguna"] = $this->client_model->getAll();
        $this->load->view("admin/client/list", $data);
    }

    public function add()
    {
        $pengguna = $this->client_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            $pengguna->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/client/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/client');
    
        $pengguna = $this->client_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            $pengguna->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pengguna"] = $pengguna->getById($id);
        if (!$data["pengguna"]) show_404();
        
        $this->load->view("admin/client/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->client_model->delete($id)) {
            redirect(site_url('admin/client'));
        }
    }
}
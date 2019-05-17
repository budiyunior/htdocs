<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pulsa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pulsa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pulsa"] = $this->pulsa_model->getAll();
        $this->load->view("admin/pulsa/list", $data);
    }

    public function add()
    {
        $pulsa = $this->pulsa_model;
        $validation = $this->form_validation;
        $validation->set_rules($pulsa->rules());

        if ($validation->run()) {
            $pulsa->save();
        }

        $this->load->view("admin/pulsa/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pulsa');
    
        $pulsa = $this->pulsa_model;
        $validation = $this->form_validation;
        $validation->set_rules($pulsa->rules());

        if ($validation->run()) {
            $pulsa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pulsa"] = $pulsa->getById($id);
        if (!$data["pulsa"]) show_404();
        
        $this->load->view("admin/pulsa/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pulsa_model->delete($id)) {
            redirect(site_url('admin/pulsa'));
        }
    }
}
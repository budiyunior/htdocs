<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JenisItem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model("jenisitem_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $data["jenisitem"] = $this->jenisitem_model->getAll();
        $this->load->view("admin/jenisitem/list", $data);
    }

    public function add()
    {
        $jenisitem = $this->jenisitem_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenisitem->rules());

        if ($validation->run()) {
            $jenisitem->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view("admin/jenisitem/new_form", $datas);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/jenisitem');
        $jenisitem = $this->jenisitem_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenisitem->rules());

        if ($validation->run()) {
            $jenisitem->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jenisitem"] = $jenisitem->getById($id);
        if (!$data["jenisitem"]) show_404();

        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $this->load->view("admin/jenisitem/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->jenisitem_model->delete($id)) {
            redirect(site_url('admin/jenisitem'));
        }
    }
}

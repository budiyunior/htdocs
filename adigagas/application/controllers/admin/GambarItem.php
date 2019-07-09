<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GambarItem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model("gambaritem_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $data["gambaritem"] = $this->gambaritem_model->getUserId();
        $this->load->view("admin/gambaritem/list", $data);
    }

    public function add()
    {
        $gambaritem = $this->gambaritem_model;
        $validation = $this->form_validation;
        $validation->set_rules($gambaritem->rules());

        if ($validation->run()) {
            $gambaritem->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view("admin/gambaritem/new_form", $datas);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/gambaritem');
        $gambaritem = $this->gambaritem_model;
        $validation = $this->form_validation;
        $validation->set_rules($gambaritem->rules());

        if ($validation->run()) {
            $gambaritem->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["gambaritem"] = $gambaritem->getById($id);
        if (!$data["gambaritem"]) show_404();

        $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view("admin/_partials/spesialtop.php", $datas);

        $this->load->view("admin/gambaritem/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->gambaritem_model->delete($id)) {
            redirect(site_url('admin/gambaritem'));
        }
    }
}

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

    // public function edit($id = null)
    // {
    //     if (!isset($id)) redirect('admin/transaksi');

    //     $transaksi = $this->transaksi_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($transaksi->rules());

    //     if ($validation->run()) {
    //         $transaksi->update();
    //         $this->session->set_flashdata('success', 'Data telah diubah');
    //     }

    //     $data["transaksi"] = $transaksi->getById($id);
    //     if (!$data["transaksi"]) show_404();

    //     $datas['pengguna'] = $this->db->get_where('pengguna', ['email' =>
    //     $this->session->userdata('email')])->row_array();
    //     $this->load->view("admin/_partials/spesialtop.php", $datas);

    //     $this->load->view("admin/transaksi/", $data);
    // }

    function update(){
        
        $id_transaksi = $this->input->post('id_transaksi');
        $id_pengguna = $this->input->post('id_pengguna');
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $total_harga = $this->input->post('total_harga');
        $total_berat = $this->input->post('total_berat');
        $id_alamat_kirim = $this->input->post('id_alamat_kirim');
        $id_pengiriman = $this->input->post('id_pengiriman');
        $id_status = $this->input->post('id_status');

        $data = array(

            'id_transaksi' => $id_transaksi,
            'id_pengguna' => $id_pengguna,
            'tanggal_transaksi' => $tanggal_transaksi,
            'total_harga' => $total_harga,
            'total_berat' => $total_berat,
            'id_alamat_kirim' => $id_alamat_kirim,
            'id_pengiriman' => $id_pengiriman,
            'id_status' => $id_status
        );
    
        $where = array(
            'id_transaksi' => $id_transaksi
        );
    
        $this->transaksi_model->update_data($where,$data,'transaksi');
        redirect('crud/index');
    }

    // public function delete($id_pengguna = null)
    // {
    //     if (!isset($id_pengguna)) show_404();

    //     if ($this->pegawai_model->delete($id_pengguna)) {
    //         redirect(site_url('admin/pegawai'));
    //     }
    // }
}

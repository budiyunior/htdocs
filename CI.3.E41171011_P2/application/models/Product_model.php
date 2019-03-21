<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "kemeja";

    public $idkemeja;
    public $nama_kemeja;
    public $ukuran_kemeja;
    public $idmerk;
    public $stok;
    public $image = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'nama_kemeja',
            'label' => 'NamaKemeja',
            'rules' => 'required'],

            ['field' => 'ukuran_kemeja',
            'label' => 'UkuranKemeja',
            'rules' => 'required'],
            
            ['field' => 'idmerk',
            'label' => 'Merk',
            'rules' => 'numeric'],

            ['field' => 'stok',
            'label' => 'Stok',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idkemeja" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idkemeja = uniqid();
        $this->nama_kemeja = $post["nama_kemeja"];
        $this->ukuran_kemeja = $post["ukuran_kemeja"];
        $this->idmerk = $post["idmerk"];
        $this->stok = $post["stok"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idkemeja = $post["id"];
        $this->nama_kemeja = $post["nama_kemeja"];
        $this->ukuran_kemeja = $post["ukuran_kemeja"];
        $this->idmerk = $post["idmerk"];
        $this->stok = $post["stok"];
        $this->db->update($this->_table, $this, array('idkemeja' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idkemeja" => $id));
    }
}
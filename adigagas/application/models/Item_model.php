<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model
{
    private $_table = "item";

    public $id_item;
    public $id_pengguna;
    public $nama_item;
    public $id_jenis_item;
    public $harga_satuan;
    public $berat_satuan;
    public $deskripsi;
 

    public function rules()
    {
        return [
            ['field' => 'nama_item',
            'label' => 'nama_item',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_item" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_item = $post["id_item"];
        $this->id_pengguna = $post["id_pengguna"];
        $this->nama_item = $post["nama_item"];
        $this->id_jenis_item = $post["id"];
        $this->harga_satuan = $post["harga_satuan"];
        $this->berat_satuan = $post["berat_satuan"];
        $this->deskripsi = $post["deskripsi"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_item = $post["id_item"];
        $this->id_pengguna = $post["id_pengguna"];
        $this->nama_item = $post["nama_item"];
        $this->id_jenis_item = $post["id"];
        $this->harga_satuan = $post["harga_satuan"];
        $this->deskripsi = $post["deskripsi"];
        $this->db->update($this->_table, $this, array('id_item' => $post['id_item']));
    }

    public function delete($id_item)
    {
        return $this->db->delete($this->_table, array("id_item" => $id_item));
    }

}
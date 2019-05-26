<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JenisItem_model extends CI_Model
{
    private $_table = "jenis_item";

    public $id_jenis_item;
    public $nama_jenis;

    public function rules()
    {
        return [
            ['field' => 'nama_jenis',
            'label' => 'nama_jenis',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jenis_item" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jenis_item = $post["id"];
        $this->nama_jenis = $post["nama_jenis"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jenis_item = $post["id"];
        $this->nama_jenis = $post["nama_jenis"];
        $this->db->update($this->_table, $this, array('id_jenis_item' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jenis_item" => $id));
    }

}
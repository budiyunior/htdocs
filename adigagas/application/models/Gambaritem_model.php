<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gambaritem_model extends CI_Model
{
    private $_table = "gambar_shirt";

    public $id_gambar;
    public $id_item;
    public $nama_gambar;
    public $gambar;
 

    public function rules()
    {
        return [
            ['field' => 'nama_gambar',
            'label' => 'nama_gambar',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_gambar" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_gambar = $post["id_gambar"];
        $this->id_item = $post["id_item"];
        $this->nama_gambar = $post["nama_gambar"];
        $this->gambar = $post["gambar"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_gambar = $post["id_gambar"];
        $this->id_item = $post["id_item"];
        $this->nama_gambar = $post["nama_gambar"];
        $this->gambar = $post["gambar"];
        $this->db->update($this->_table, $this, array('id_gambar' => $post['id_gambar']));
    }

    public function delete($id_gambar)
    {
        return $this->db->delete($this->_table, array("id_gambar" => $id_gambar));
    }

}
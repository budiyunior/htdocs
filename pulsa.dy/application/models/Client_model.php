<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model
{
    private $_table = "pengguna";

    public $id_pengguna;
    public $nama_pengguna;
    public $id_otoritas;
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'nama_pengguna',
            'label' => 'nama_pengguna',
            'rules' => 'required'],

            ['field' => 'id_otoritas',
            'label' => 'id_otoritas',
            'rules' => 'numeric'],
            
            ['field' => 'username',
            'label' => 'username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pengguna" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pengguna = "USR".uniqid();
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->id_otoritas = $post["id_otoritas"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengguna = $post["id_pengguna"];
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->id_otoritas = $post["id_otoritas"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id_pengguna']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengguna" => $id));
    }

}
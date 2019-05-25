<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    private $_table = "pengguna";

    public $id_pengguna;
    public $nama_pengguna;
    public $tanggal_lahir;
    public $id_akses;
    public $email;
    public $password;
    public $nomor_telp;

    public function rules()
    {
        return [
            ['field' => 'id_pengguna',
            'label' => 'id_pengguna',
            'rules' => 'required'],

            ['field' => 'nama_pengguna',
            'label' => 'nama_pengguna',
            'rules' => 'required'],
            
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
        $this->id_pengguna = uniqid();
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->id_akses = $post["id_akses"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->nomor_telp = $post["nomor_telp"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengguna = $post["id_pengguna"];
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->id_akses = $post["id_akses"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->nomor_telp = $post["nomor_telp"];
        $this->db->update($this->_table, $this, array('id_pengguna' => $post['id_pengguna']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_pengguna" => $id_pengguna));
    }


}
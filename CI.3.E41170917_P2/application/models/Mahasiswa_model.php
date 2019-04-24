<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    private $_table = "mahasiswa"; //nama tabel
    //nama kolom di tabel
    public $NIM;
    public $nama;
    public $jeniskelamin;
    public $alamat;

    public function rules()
    {
        return [
            [
                'field' => 'NIM',
                'label' => 'NIM',
                'rules' => 'required'
            ],

            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'jeniskelamin',
                'label' => 'JenisKelamin',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
        //sama dgn select * from mahasiswa
        //method ini mengembalikan array berisi objek row
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["NIM" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->nama = $post["nama"];
        $this->jeniskelamin = $post["jeniskelamin"];
        $this->alamat = $post["alamat"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->NIM = $post["NIM"];
        $this->nama = $post["nama"];
        $this->jeniskelamin = $post["jeniskelamin"];
        $this->alamat = $post["alamat"];
        $this->db->update($this->_table, $this, array('NIM' => $post['NIM']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("NIM" => $id));
    }
}

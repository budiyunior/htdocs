<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model
{
    // private $_vtable = "vpaketpulsa";
    private $_table = "vpaketpulsa";

    public $id_paket;
    // public $id_provider;
    public $nama_provider;
    public $nominal;

    public function rules()
    {
        return [
            ['field' => 'id_paket',
            'label' => 'id_paket',
            'rules' => 'required'],

            ['field' => 'nama_provider',
            'label' => 'nama_provider',
            'rules' => 'required'],
            
            ['field' => 'nominal',
            'label' => 'nominal',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_paket" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_provider = $post["id_provider"];
        $this->nominal = $post["nominal"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_provider = $post["id_provider"];
        $this->nominal = $post["nominal"];
        $this->db->update($this->_table, $this, array('id_paket' => $post['id_paket']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_paket" => $id));
    }

    function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

    }

}
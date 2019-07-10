<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model
{
    private $_table = "item";

    public $id_item;
    public $nama_item;
    public $id_jenis_item;
    public $harga_satuan;
    public $berat_satuan;
    public $deskripsi;
    public $gambar = "default.jpg";
 

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

    public function getJenisId()
    {
        $query = $this->db->query("SELECT * FROM v_item");
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_item = $post["id_item"];
        $this->nama_item = $post["nama_item"];
        $this->id_jenis_item = $post["id"];
        $this->harga_satuan = $post["harga_satuan"];
        $this->berat_satuan = $post["berat_satuan"];
        $this->deskripsi = $post["deskripsi"];
        $this->gambar = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_item = $post["id_item"];
        $this->nama_item = $post["nama_item"];
        $this->id_jenis_item = $post["id"];
        $this->harga_satuan = $post["harga_satuan"];
        $this->berat_satuan = $post["berat_satuan"];
        $this->deskripsi = $post["deskripsi"];
        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_item' => $post['id_item']));
    }

    public function delete($id_item)
    {
        $this->_deleteImage($id_item);
        return $this->db->delete($this->_table, array("id_item" => $id_item));
        
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_item;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
    }

    private function _deleteImage($id_item)
    {
        $item = $this->getById($id_item);
        if ($item->gambar!= "01.jpg") {
            $filename = explode(".", $item->gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gambaritem_model extends CI_Model
{
    private $_table = "gambar_shirt";

    public $id_gambar;
    public $id_item;
    public $nama_gambar;
    public $gambar = "default.jpg";
 

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

    public function getUserId()
    {
        $query = $this->db->query("SELECT gambar_shirt.id_gambar, item.id_item, gambar_shirt.nama_gambar, gambar_shirt.gambar FROM gambar_shirt INNER JOIN item ON gambar_shirt.id_item=item.id_item GROUP BY item.id_item");
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_gambar = $post["id_gambar"];
        $this->id_item = $post["id_item"];
        $this->nama_gambar = $post["nama_gambar"];
        $this->gambar = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_gambar = $post["id_gambar"];
        $this->id_item = $post["id_item"];
        $this->nama_gambar = $post["nama_gambar"];
        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_gambar' => $post['id_gambar']));
    }

    public function delete($id_gambar)
    {
        return $this->db->delete($this->_table, array("id_gambar" => $id_gambar));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_gambar;
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

    private function _deleteImage($id_gambar)
    {
        $gambaritem = $this->getById($id_gambar);
        if ($gambaritem->gambar != "01.jpg") {
            $filename = explode(".", $gambaritem->gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

}
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    private $_table = "pengguna";

    public $id_transaksi;
    public $nama_pengguna;
    public $tanggal_lahir;
    public $email;
    public $password;
    public $nomor_telp;
    public $foto = "default.jpg";

    public function rules()
    {
        return [

            [
                'field' => 'nama_pengguna',
                'label' => 'nama_pengguna',
                'rules' => 'required'
            ],

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

    public function getUserId()
    {
        $query = $this->db->query("SELECT * FROM V_trans WHERE id_status ='done'");
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pengguna = "cus" . uniqid(15);
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->id_akses = "cus";
        $this->email = $post["email"];
        $this->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->nomor_telp = $post["nomor_telp"];
        $this->foto = $this->_uploadImage();
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
        if (!empty($_FILES["foto"]["name"])) {
            $this->foto = $this->_uploadImage();
        } else {
            $this->foto = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_pengguna' => $post['id_pengguna']));
        $this->db->update($this->_table, $this, array('id_pengguna' => $post['id_pengguna']));


        function update_data($where, $data, $_table)
        {
            $this->db->where($where);
            $this->db->update($_table, $data);
        }


        // public function cek_akses_adm($email, $id_akses)
        // {

        //     $periksa = $this->db->get_where('pengguna', array('email' =>
        //     $this->session->userdata('email'), 'id_akses' => ('adm')));
        //     if ($periksa->num_rows() > 0) {
        //         return 1;
        //     } else {
        //         return 0;
        //     }
        // }

        // public function cek_akses_su($email, $id_akses)
        // {

        //     $periksa = $this->db->get_where('pengguna', array('email' =>
        //     $this->session->userdata('email'), 'id_akses' => ('su')));
        //     if ($periksa->num_rows() > 0) {
        //         return 1;
        //     } else {
        //         return 0;
        //     }
        // }


        // public function save()
        // {
        //     $post = $this->input->post();
        //     if (isset($_POST['id_akses'])) {
        //         $id_pengguna = $_POST['id_akses'];
        //     }
        //     $this->id_pengguna = uniqid($id_pengguna);
        //     $this->nama_pengguna = $post["nama_pengguna"];
        //     $this->tanggal_lahir = $post["tanggal_lahir"];
        //     $this->id_akses = $post["id_akses"];
        //     $this->email = $post["email"];
        //     $this->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //     $this->nomor_telp = $post["nomor_telp"];
        //     $this->foto = $this->_uploadImage();
        //     $this->db->insert($this->_table, $this);




        // public function delete($id_pengguna)
        // {
        //     $this->_deleteImage($id_pengguna);
        //     return $this->db->delete($this->_table, array("id_pengguna" => $id_pengguna));
        // }

        // private function _uploadImage()
        // {
        //     $config['upload_path']          = './upload/profil/';
        //     $config['allowed_types']        = 'gif|jpg|png';
        //     $config['file_name']            = $this->id_pengguna;
        //     $config['overwrite']            = true;
        //     $config['max_size']             = 1024; // 1MB
        //     // $config['max_width']            = 1024;
        //     // $config['max_height']           = 768;

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('foto')) {
        //         return $this->upload->data("file_name");
        //     }

        //     print_r($this->upload->display_errors());
        // }

        // private function _deleteImage($id_pengguna)
        // {
        //     $pegawai = $this->getById($id_pengguna);
        //     if ($pegawai->foto != "01.jpg") {
        //         $filename = explode(".", $pegawai->foto)[0];
        //         return array_map('unlink', glob(FCPATH . "upload/profil/$filename.*"));
        //     }
        // }
    }
}

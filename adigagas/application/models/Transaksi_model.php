<?php defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "transaksi";

    public $id_transaksi;
    public $id_pengguna;
    public $tanggal_transaksi;
    public $total_harga;
    public $total_berat;
    public $id_alamat_kirim;
    public $id_pengiriman;
    public $id_status;

    public function rules()
    {
        return [

            [
                'field' => 'id_pengguna',
                'label' => 'id_pengguna',
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
        return $this->db->get_where($this->_table, ["id_transaksi" => $id])->row();
    }

    public function getDetTrans()
    {
        $query = $this->db->query("SELECT * FROM v_trans");
        return $query->result();
    }

    public function getTrans($id)
    {
        $query = $this->db->query("SELECT * FROM v_trans WHERE id_transaksi = '$id' ");
        return $query->result();
    }

    public function getDetailTrans($id)
    {
        $query = $this->db->query("SELECT * FROM detail_transaksi WHERE id_transaksi = '$id' ");
        return $query->result();
    }

    public function getKonfirm($id)
    {
        $query = $this->db->query("SELECT * FROM konfirmasi_pembayaran WHERE id_transaksi = '$id' ");
        return $query->result();
    }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->id_transaksi = $post["id_transaksi"];
    //     $this->id_pengguna = $post["id_pengguna"];
    //     $this->tanggal_transaksi = $post["tanggal_transaksi"];
    //     $this->total_harga = $post["total_harga"];
    //     $this->total_berat = $post["total_berat"];
    //     $this->id_alamat_kirim = $post["id_alamat_kirim"];
    //     $this->id_pengiriman = $post["id_pengiriman"];
    //     $this->id_status = $post["id_status"];
        
    //     $this->db->update($this->_table, $this, array('id_transaksi' => $post['id_transaksi']));
    // }

    function update_data($where,$data,$_table){
		$this->db->where($where);
		$this->db->update($_table,$data);
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
    // }

    

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

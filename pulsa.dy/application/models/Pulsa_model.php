<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pulsa_model extends CI_Model
{
    private $_table = "trans_jual";

    public $kode_trans;
    public $nama_plg;
    public $nomor;
    public $nominal;
    public $status_trans;

    public function rules()
    {
        return [
            ['field' => 'nama_plg',
            'label' => 'nama_plg',
            'rules' => 'required'],

            ['field' => 'nomor',
            'label' => 'nomor',
            'rules' => 'required'],
            
            ['field' => 'nominal',
            'label' => 'nominal',
            'rules' => 'numeric'],        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_trans" => $id])->row();
    }

    public function save()
    {  
        $ip = "192.168.1.13";
        $port = "8989";

        //ping server SMSGateway
        exec("ping -n 3 $ip", $output, $status);

        $ping = $output[2];
        $stat = explode(":",$ping);

        // cek status transaksi
        if($status == 0){
            if($stat[1] != " Destination host unreachable."){
                $status = "BERHASIL";
                $this->session->set_flashdata('success', 'Transaksi Berhasil');
            }else {
                $status = "GAGAL";
                $this->session->set_flashdata('danger', 'Transaksi Gagal');
            };

        }else {
            $status = "GAGAL";  
            $this->session->set_flashdata('danger', 'Transaksi Gagal');
        };

        //masukkan ke database
        $post = $this->input->post();
        $this->kode_trans = "SELL-".uniqid(15);
        $this->nama_plg = $post["nama_plg"];
        $this->nomor = $post["nomor"];
        $this->nominal = $post["nominal"];
        $this->status_trans = $status;
        $this->db->insert($this->_table, $this);
        
        //membuat JSON nomor dan pesan
        $data = array("no" => $post["nomor"], "pesan" => "Terimakasih kepada plg Yth. ".$post["nama_plg"].". Pulsa senilai Rp. ".$post["nominal"]." telah berhasil diisikan ke nomor Anda. Pulsa.dy **via web**");
        $data_string = json_encode($data);  

        //cek apakah jika transaksi BERHASIL maka akan mengirim JSON data ke SMSGateway Server
        if ($status == "BERHASIL"){
            $ch = curl_init('http://'.$ip.':'.$port.'');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");    
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Length: ' . strlen($data_string))
            );
            
            $result = curl_exec($ch);
        }

    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_trans = $post["kode_trans"];
        $this->nama_plg = $post["nama_plg"];
        $this->nomor = $post["nomor"];
        $this->nominal = $post["nominal"];
        $this->db->update($this->_table, $this, array('kode_trans' => $post['kode_trans']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_trans" => $id));
    }

}
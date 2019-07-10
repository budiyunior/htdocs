<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class User extends REST_Controller
{

	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
	}

	//Menampilkan data kontak
	// function index_get()
	// {
	//     $jenisitem = $this->db->get('jenis_item')->result();
	//     $this->response(array("result" => $jenisitem, 200));
	// }
	function index_get()
	{
		$item = $this->db->get('pengguna')->result();
		$this->response(array("result" => $item, 200));
	}


	function index_post()
	{
		$data = array(
			'id_pengguna'           => $this->post('id_pengguna'),
			// 'id_pengguna'           => $this->id_pengguna = uniqid($id_pengguna),
			'nama_pengguna'          => $this->post('nama_pengguna'),
			'tanggal_lahir'    => $this->post('tanggal_lahir'),
			'email'    => $this->post('email'),
			'id_akses'    => $this->post('id_akses'),
			'password'    => $this->post('password'),
			'nomor_telp'    => $this->post('nomor_telp')
		);
		$insert = $this->db->insert('pengguna', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}














	// function index_get()
	// {
	//     $id_jenis_item = $this->get('id_jenis_item');
	//     if ($id_jenis_item == '') {
	//         $jenis_item = $this->db->get('jenis_item')->result();
	//     } else {
	//         $this->db->where('id_jenis_item', $id_jenis_item);
	//         $jenis_item = $this->db->get('jenis_item')->result();
	//     }
	//     $this->response($jenis_item, 200);
	// }


	// function index_post()
	// {
	//     $data = array(

	//         'nama_jenis'          => $this->post('nama_jenis'),

	//     );
	//     $insert = $this->db->insert('jenis_item', $data);
	//     if ($insert) {
	//         $this->response($data, 200);
	//     } else {
	//         $this->response(array('status' => 'fail', 502));
	//     }
	// }

	// function index_put()
	// {
	//     $id = $this->put('id_jenis_item');
	//     $data = array(
	//         'id_jenis_item'       => $this->put('id_jenis_item'),
	//         'nama_jenis'          => $this->put('nama_jenis'),

	//     );
	//     $this->db->where('id_jenis_item', $id);
	//     $update = $this->db->update('jenis_item', $data);
	//     if ($update) {
	//         $this->response($data, 200);
	//     } else {
	//         $this->response(array('status' => 'fail', 502));
	//     }
	// }
	// function index_delete()
	// {
	//     $id = $this->delete('id_jenis_item');
	//     $this->db->where('id_jenis_item', $id);
	//     $delete = $this->db->delete('jenis_item');
	//     if ($delete) {
	//         $this->response(array('status' => 'success'), 201);
	//     } else {
	//         $this->response(array('status' => 'fail', 502));
	//     }
	// }
}

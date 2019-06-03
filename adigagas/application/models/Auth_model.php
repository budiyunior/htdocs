<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function check_login($email, $password)
	{
		$this->db->where('username', $email);
		$this->db->where('password', $password);
		$user = $this->db->get('pengguna')->row_array();
		return $user;
	}

	public function register($data)
	{
		return $this->db->insert('pengguna', $data);
	}
}

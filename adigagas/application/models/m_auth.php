<?php

/**
 * 
 */
class m_auth extends CI_Model
{

	private $table_name = "pengguna";

	function get_user_by_email($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		return $this->db->get($this->table_name)->row();
	}
}

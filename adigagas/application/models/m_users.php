<?php


/**
 * 
 */
class m_users extends CI_Model
{

	private $table_name = "pengguna";

	private $primary = "id_pengguna";

	function get_all()
	{

		#Get all data users

		$data = $this->db->get($this->table_name);
		return $data->result();
	}

	function get_by_id($id_pengguna)
	{

		#Get data user by id
		$this->db->where($this->primary, $id_pengguna);
		$data = $this->db->get($this->table_name);

		return $data->row();
	}


	function get_by_username_email($email)
	{
		#Get data by username or email
		//$this->db->where('USERNAME',$username);
		$this->db->where('EMAIL', $email);
		$data = $this->db->get($this->table_name)->row();

		return $data;
	}


	function insert($data)
	{

		#Insert data to table tb_users
		$insert = $this->db->insert($this->table_name, $data);

		return $insert;
	}

	function delete($id_pengguna)
	{
		#Delete data user by id
		$this->db->where($this->primary, $id_pengguna);
		$delete = $this->db->delete($this->table_name);

		return $delete;
	}

	function update($id_pengguna, $data)
	{
		#Update data user by id
		$this->db->where($this->primary, $id_pengguna);
		$update = $this->db->update($this->table_name, $data);
		if ($update) {
			$update = $this->get_by_id($id_pengguna);
		}

		return $update;
	}
}

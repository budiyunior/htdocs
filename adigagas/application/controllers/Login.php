
<?php

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	function index()
	{
		// load view admin/overview.php
		$this->load->view("admin/login");
	}

	function auth()
	{
		$email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);


		$user = $this->db->get_where('pengguna', ['email' => $email])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'id_akses' => $user['id_akses']
				];
				$this->session->set_userdata($data);
				redirect('user');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_akses');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
		redirect('login');
	}
}

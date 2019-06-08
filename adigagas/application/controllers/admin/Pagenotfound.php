<?php

class Pagenotfound extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('login');
		}
	}

	public function index()
	{
		// load view admin/overview.php
		$this->load->view("admin/pagenotfound");
	}
}

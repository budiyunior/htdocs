<?php

class Forgotpassword extends CI_Controller
{
	public function __construct()
	{ }

	public function index()
	{
		// load view admin/overview.php
		$this->load->view("admin/forgotpassword");
	}
}

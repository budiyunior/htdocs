<?php

class Pengguna extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // load view admin/pengguna.php
        $this->load->view("admin/pengguna");
	}
}
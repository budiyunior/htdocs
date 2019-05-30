
<?php

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	    }
	 
	     function index()
	    {
	    // load view admin/overview.php
	    $this->load->view("admin/login");
	    }
	 
	    function auth(){
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		
	 
		$cek_admin=$this->login_model->auth_admin($username,$password);
	 
		if($cek_admin->num_rows() > 0){ 
			    redirect('admin/pegawai');
	 
	 
		}else{ 
			    $cek_kasir=$this->login_model->auth_kasir($username,$password);
			    if($cek_kasir->num_rows() > 0){
				   redirect('admin/overview');
			    }else{  
				    $url=base_url();
				    echo $this->session->set_flashdata('msg','Username Atau Password Salah');
				    redirect($url);
			    }
			}
	 
	    }
	 
	    function logout(){
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	    }

	}	 
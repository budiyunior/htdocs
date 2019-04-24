<?php 
 
class m_login extends CI_Model{	
	
	private $_table = "login";

    public $id_admin;
    public $username;
    public $password;
	public $Nama_Depan;
	public $Nama_Belakang;

	public function rules()
{
    return [
        ['field' => 'Username',
        'label' => 'Username',
        'rules' => 'required'],

        ['field' => 'Password',
        'label' => 'Password',
        'rules' => 'numeric'],
        
        ['field' => 'Nama_Belakang',
        'label' => 'Nama_Belakang',
		'rules' => 'required'], 

		['field' => 'Nama_Depan',
        'label' => 'Nama_Depan',
        'rules' => 'required']
    ];
}

	function cek_login($username,$password){		
	$periksa = $this->db->get_where('login', array('username'=>$username, 'password'=>$password));

	if($periksa->num_rows()>0){
		return 1;
	}else{
		return 0;
	}
	}

	public function save()
    {
        $post = $this->input->post();
        $this->Id_admin = uniqid();
        $this->Username = $post["Username"];
		$this->Password = $post["Password"];
		$this->Nama_Depan = $post["Nama_Depan"];
		$this->Nama_Belakang = $post["Nama_Belakang"];
        $this->db->insert($this->_table, $this);
    }
	
	// public function save($username,$password,$nama_depan,$nama_belakang){
	// 	$cek = $this->db->insert('admin', array('Username'= [$username], 'Password'= [$password], 'Nama_Depan'= [$nama_depan], 'Nama_Belakang'= [$nama_belakang]));
	// 	if($cek->num_rows()>0){
	// 		return 1;
	// 	}else{
	// 		return 0;
	// 	}
    // }


}
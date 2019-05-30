<?php
class Login_model extends CI_Model
    {
        private $_table = "pengguna";
    
        public $id_akses;
        public $email;
        public $password;

    
        public function rules()
        {
            return [
    
                ['field' => 'nama_pengguna',
                'label' => 'nama_pengguna',
                'rules' => 'required'],
                
            ];
        }
   
    function auth_admin($username,$password){
    
        $user=$this->db->query("SELECT password FROM pengguna WHERE email='$username' and id_akses='adm'");
        if(password_verify($password, $user)){ 
            redirect('admin/overview');
        }else{
            redirect('admin/pegawai');
          }
    
     
        
        // $query=$this->db->get_where('pengguna ', array('email'=>$username, 'password'=>password_verify($password), 'id_akses'=>'adm'));
           
        
    }
 
   
    function auth_kasir($username,$password){
        $hash=$this->db->query("SELECT password FROM pengguna WHERE email='$username' and password='$password' and id_akses='cas'");
        $pass=password_verify($password, $hash);
        if($pass->num_rows() > 0){ 
            redirect('admin/overview');
        // $query=$this->db->get_where('pengguna', array('email'=>$username, $pass, 'id_akses'=>'cas'));
      
    }else{
        redirect('admin/pegawai');
      }
}
    }

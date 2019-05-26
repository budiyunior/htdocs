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
        $hash=$this->db->query("SELECT password FROM pengguna WHERE email='$username'");
        $query=$this->db->get_where('pengguna', array('email'=>$username, 'password'=>password_verify($password,$hash), 'id_akses'=>'adm'));
           
        return $query;
    }
 
   
    function auth_kasir($username,$password){
        $hash=$this->db->query("SELECT password FROM pengguna WHERE email='$username'");
        $query=$this->db->get_where('pengguna', array('email'=>$username, 'password'=>password_verify($password,$hash), 'id_akses'=>'cas'));
      
        return $query;
    }
}

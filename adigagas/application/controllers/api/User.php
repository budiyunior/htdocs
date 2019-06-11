<?php

defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';


/**
 * 
 */


class User extends REST_Controller
{

	function __construct()
	{
		parent::__construct();

		#Configure limit request methods
		$this->methods['index_get']['limit'] = 10; #10 requests per hour per user/key
		$this->methods['index_post']['limit'] = 10; #10 requests per hour per user/key
		$this->methods['index_delete']['limit'] = 10; #10 requests per hour per user/key
		$this->methods['index_put']['limit'] = 10; #10 requests per hour per user/key

		#Configure load model api table users
		$this->load->model('m_users');
	}


	function index_get($id_akses = null, $id_pengguna = null)
	{

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success get user', 'data' => null);

		#Set response API if Not Found
		$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'no users were found', 'data' => null);

		#
		if (!empty($this->get('id_pengguna')))
			$id_pengguna = $this->get('id_pengguna');

		if (!empty($this->get('id_akses')))
			$id_akses = $this->get('id_akses');



		if ($id_pengguna == null || $id_pengguna == 0) {
			#Call methode get_all from m_users model
			$users = $this->m_users->get_all();
		}


		if ($id_pengguna != null && $id_pengguna != 0) {

			#Check if id <= 0
			if ($id_pengguna <= 0) {
				$this->response($response['NOT_FOUND'], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			#Call methode get_by_id from m_users model
			$users = $this->m_users->get_by_id($id_pengguna);
		}


		# Check if the users data store contains users
		if ($users) {
			$response['SUCCESS']['data'] = $users;

			#if found Users
			$this->response($response['SUCCESS'], REST_Controller::HTTP_OK);
		} else {

			#if Not found Users
			$this->response($response['NOT_FOUND'], REST_Controller::HTTP_NOT_FOUND); # NOT_FOUND (404) being the HTTP response code

		}
	}

	function index_post()
	{

		#
		$user_data = array(
			'nama_pengguna' => $this->post('nama_pengguna'),
			'email' => $this->post('email'),
			'tanggal_lahir' => $this->post('tanggal_lahir'),
			'is_akses' => $this->post('id_akses'),
			'nomor_telp' => $this->post('nomor_telp'),
			'password' => md5($this->post('password'))

		);


		// #Initialize image name
		// $image_name=round(microtime(true)).date("Ymdhis").".jpg";

		// #Upload avatar
		// if ($this->Upload_Images($image_name))
		// 	$user_data['PHOTO']=$image_name;

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success insert data', 'data' => $user_data);

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail insert data', 'data' => null);

		#Set response API if exist data
		$response['EXIST'] = array('status' => FALSE, 'message' => 'exist data', 'data' => null);

		// if ($this->m_users->get_by_username_email($this->post('nama_pengguna'),$this->post('email'))){
		// 	#Remove image user
		// 	if ($user_data['PHOTO']!=null) {
		// 		$this->remove_image($user_data['PHOTO']);
		// 	}

		// 	$this->response($response['EXIST'],REST_Controller::HTTP_FORBIDDEN);

		// }

		#Check if insert user_data Success
		// if ($this->m_users->insert($user_data)) {

		// 	#If success
		// 	$this->response($response['SUCCESS'], REST_Controller::HTTP_CREATED);
		// } else {
		// 	#Remove image user
		// 	if ($user_data['PHOTO'] != null) {
		// 		$this->remove_image($user_data['PHOTO']);
		// 	}

		// 	#If fail
		// 	$this->response($response['FAIL'], REST_Controller::HTTP_FORBIDDEN);
		// }
	}

	// function index_delete($id_pengguna=null){

	// 	#Set response API if Success
	// 	$response['SUCCESS'] = array('status' => TRUE, 'message' => 'Success delete user'  );

	// 	#Set response API if Fail
	// 	$response['FAIL'] = array('status' => FALSE, 'message' => 'Fail delete user'  );

	// 	#Set response API if user not found
	// 	$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'No users were found' );


	// 	#Check available user
	// 	if (!$this->validate($id_pengguna))
	// 		$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);


	// 	if (!empty($this->get('ID_USER')))
	// 		$id_pengguna=$this->get('ID_USER');

	// 	if ($this->m_users->delete($id_pengguna)) {

	// 		#If success
	// 		$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);

	// 	}else{

	// 		#If Fail
	// 		$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);

	// 	}

	// }

	// function index_put(){

	// 	$id_pengguna=$this->put('ID_USER');

	// 	$user_data = array(	'NAME' =>$this->put('NAME'), 
	// 						'NIK' => $this->put('NIK') ,
	// 						'USERNAME' => $this->put('USERNAME') ,
	// 						'EMAIL' => $this->put('EMAIL') , 
	// 						'NO_TELP' => $this->put('NO_TELP') ,
	// 						'JENIS_KELAMIN' => $this->put('JENIS_KELAMIN') ,
	// 						'ALAMAT' => $this->put('ALAMAT') ,
	// 						'ACTIVATED' => $this->put('ACTIVATED') ,
	// 						'LAST_UPDATE' =>date('Y-m-d h:i:s'),
	// 						'GROUP_USER'=>$this->put('GROUP_USER'),
	// 					);
	// 	if ($this->put('PASSWORD')) {
	// 		$user_data['PASSWORD'] = md5($this->put('PASSWORD'));
	// 	}

	// 	#Initialize image name
	// 	$image_name=round(microtime(true)).date("Ymdhis").".jpg";

	// 	#Upload avatar
	// 	if ($this->Upload_Images($image_name))
	// 		$user_data['PHOTO']=$image_name;


	// 	#Set response API if Success
	// 	$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success update user' , 'data' => $user_data );

	// 	#Set response API if Fail
	// 	$response['FAIL'] = array('status' => FALSE, 'message' => 'fail update user' , 'data' => $user_data );

	// 	#Set response API if user not found
	// 	$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'no users were found' , 'data' => $user_data );

	// 	#Set response API if exist data
	// 	$response['EXIST'] = array('status' => FALSE, 'message' => 'exist insert data' , 'data' => $user_data );

	// 	#Check available user
	// 	if (!$this->validate($id_pengguna))
	// 		$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);


	// 	if ($this->m_users->get_by_username_email($this->put('USERNAME'),$this->put('EMAIL'))->ID_USER!=null&&$this->m_users->get_by_username_email($this->put('USERNAME'),$this->put('EMAIL'))->ID_USER!=$id_pengguna)
	// 		$this->response($response['EXIST'],REST_Controller::HTTP_FORBIDDEN);
	// 	$up=$this->m_users->update($id_pengguna,$user_data);
	// 	if ($up) {

	// 		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success update user' , 'data' => $up );			
	// 		#If success
	// 		$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);

	// 	}else{

	// 		#If Fail
	// 		$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);

	// 	}

	// }

	function validate($id_pengguna)
	{
		$users = $this->m_users->get_by_id($id_pengguna);
		if ($users)
			return TRUE;
		else
			return FALSE;
	}

	// function Upload_Images($name) 
	// {

	// 		if ($this->post('PHOTO')) {
	//     		$strImage = str_replace('data:image/png;base64,', '', $this->post('PHOTO'));			
	// 		}else{
	// 			$strImage = str_replace('data:image/png;base64,', '', $this->put('PHOTO'));
	// 		}
	// 		if (!empty($strImage)) {
	// 			$img = imagecreatefromstring(base64_decode($strImage));

	// 			if($img != false)
	// 			{
	// 			   if (imagejpeg($img, './upload/avatars/'.$name)) {
	// 			   	return true;
	// 			   }else{
	// 			   	return false;
	// 			   }
	// 			}
	// 		}
	// }


	// function remove_image($name){
	// 	$path='./upload/avatars/'.$name;
	// 	unlink($path);
	// }


}

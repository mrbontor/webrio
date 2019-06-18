<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->model('Users');
	}
 
	public function index(){
		$data['title'] = "Login as Administrator";
		if($this->session->userdata('_isLogin')){
			redirect('beranda');
		}
		else{
			$this->load->view('login', $data);
		}
	}
 
	public function login(){
		$output = array('error' => false);
 
		$username = $_POST['username'];
		$password = md5($_POST['password']);
 
		$data = $this->Users->login($username, $password);
 		$userWhere = array(
 			'username' => $username
 		);
 		$userData = array(
			'last_login' => Date('Y-m-d H:i:s')
		);
		if($data){
			$this->Users->updateLogin($userWhere,$userData);
			$data_session = array(
						'username' => $username,
						'id_user' => $data['id'],
						'email' => $data['id'],
						'name' => $data['name'],
						'_isLogin' => true
						);
		 
			$this->session->set_userdata($data_session);
			
			// $this->session->set_userdata('admin', $data);
			$output['message'] = 'Logging in. Please wait...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Login Invalid. User Admin not found';
		}
 
		echo json_encode($output); 
	}

	public function logout(){
		// $username = $this->session->userdata($username);
		// $this->Users->updateLogin($username);
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
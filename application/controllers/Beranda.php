<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('_isLogin') !=TRUE){
            redirect('auth');
        };
        $this->load->helper('text');
		$this->load->model('Users');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['subtitle'] = "Dashboard";
		$data['username'] = $this->session->userdata('name');
		$this->load->view('beranda', $data);	
	}

	public function logout(){
		$userData = array(
			'last_logout' => Date('Y-m-d H:i:s')
		);
 		$userWhere = array(
 			'username' => $this->session->userdata('username')
 		);
 
		$this->Users->updateLogout($userWhere,$userData);
		$this->session->sess_destroy();
		redirect('/');
	}
}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */
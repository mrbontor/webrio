<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index()
	{
		$data['setting'] = $this->Home_model->find_setting();
		$this->load->view('home', $data);	
	}



}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
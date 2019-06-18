<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Contact_model');
	}

	public function index()
	{
		$data['setting'] = $this->Home_model->find_setting();
		$this->load->view('contact', $data);	
	}

	public function createUser()
    {
        
        $json = array();
        
            $name 		= $this->input->post('name');
            $email 		= $this->input->post('email');           
            $phone 	= $this->input->post('contact_no');
            $subject  	= $this->input->post('subject');
            $message  	= $this->input->post('message');
            $timeStamp 	= date("Y-m:d h:m:s");
            
            // name validation
            if(empty(trim($name))){
                $json['error']['name'] = 'Please enter full name';
            }
            // subject validation
            if(empty(trim($name))){
                $json['error']['subject'] = 'Please enter subject';
            }
            // email validation
            if(empty(trim($email))){
                $json['error']['email'] = 'Please enter email address';
            }
            // check email validation
            if (empty(trim($email))) {
                $json['error']['email'] = 'Please enter valid email address';
            }
            // check conatct no validation
            if(empty(trim($phone))) {
                $json['error']['phone'] = 'Please enter valid contact no. format: 0852016458902';
            }
            // message validation
            if(empty($message)){
                $json['error']['message'] = 'Please enter message';
            }

            if(empty($json['error'])){
                $this->Contact_model->setName(trim($name));
                $this->Contact_model->setEmail($email);
                $this->Contact_model->setPhone($phone);
                $this->Contact_model->setSubject($subject);
                $this->Contact_model->setMessage($message);
                $this->Contact_model->setTimeStamp($timeStamp);
                try {
                 $last_id = $this->Contact_model->create();
                } catch (Exception $e) {
                    var_dump($e->getMessage());
                }
                
                if (!empty($last_id) && $last_id > 0) {
                    
                    $json['status'] = 'success';
                }
            }
        echo json_encode($json);
    }
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */
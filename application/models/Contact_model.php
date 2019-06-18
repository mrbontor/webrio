<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

	private $_name;
    private $_email;
    private $_phone;
    private $_subject;
    private $_message;
    private $_timeStamp;
 
    public function setName($name) 
    {
        $this->_name = $name;
    }
    
    public function setEmail($email)
    {
        $this->_email = $email;
    }
    public function setPhone($phone) 
    {
        $this->_phone = $phone;
    }
    public function setSubject($subject)
    {
        $this->_subject = $subject;
    }
    public function setMessage($message)
    {
        $this->_message = $message;
    }
    public function setTimeStamp($timeStamp) 
    {
        $this->_timeStamp = $timeStamp;
    }
 
    // save value in database
    public function create()
    {
        $data = array(
            'name' => $this->_name,
            'email' => $this->_email,
            'phone' => $this->_phone,
            'subject' => $this->_subject,
            'message' => $this->_message,
            'created_date' => $this->_timeStamp,
        );
        $this->db->insert('contact', $data);
        return $this->db->insert_id();
    }

}

/* End of file Contact_model.php */
/* Location: ./application/models/Contact_model.php */
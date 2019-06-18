<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	public function login($username, $password){
		$query = $this->db->get_where('users_admin', array('username'=>$username, 'password'=>$password));
		return $query->row_array();
	}

	public function updateLogin($where, $data){
		$this->db->update('users_admin', $data, $where);
		return $this->db->affected_rows();
	}

	public function updateLogout($where,$data){
		$this->db->update('users_admin', $data, $where);
		return $this->db->affected_rows();
	}
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
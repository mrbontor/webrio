<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

	var $table = 'pages';

	public function find_data(){

        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$query = $this->db->insert($this->table, $data);
		return $query;
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}

/* End of file Pages_model.php */
/* Location: ./application/models/Pages_model.php */
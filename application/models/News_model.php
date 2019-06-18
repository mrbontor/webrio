<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	var $table = 'news';
	public function getData($rowno,$rowperpage) 
	{
		$this->db->select('*');
		$this->db->from('categories');
        $this->db->join($this->table, 'categories.id = '.$this->table.'.category', 'Right');
		$this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getrecordCount() 
	{
		$this->db->select('count(*) as allcount');
		$this->db->from($this->table);
		$query = $this->db->get();
		$result = $query->result_array();

		return $result[0]['allcount'];
	}

	public function get_detail($slug)
	{
		if ($slug === FALSE)
		{
			$this->db->select('*');
			$this->db->from('categories');
	        $this->db->join($this->table, 'categories.id = '.$this->table.'.category', 'Right');
	        // $this->db->where($this->table.'.slug', $slug)
			$query = $this->db->get($this->table);

			return $query->result_array();
		}
			   
		$query = $this->db->get_where($this->table, array($this->table.'.slug' => $slug));
		return $query->row_array();
	}

}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    var $table = 'gallery';

	public function find_banner()
	{
        $this->db->select('*');
        $this->db->where('category', 'banner');
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }
    public function find_corousel()
	{
        $this->db->select('*');
        $this->db->where('category', 'corousel');
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }

    public function find_project()
	{
        $this->db->select('*');
        $this->db->where('category', 'project');
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

	public function get_by_name($name)
	{
		$this->db->from($this->table);
		$this->db->where('image',$name);
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

	public function delete_by_name($name)
	{
		$this->db->where('image', $name);
		$this->db->delete($this->table);
	}
}

/* End of file Gallery_model.php */
/* Location: ./application/models/Gallery_model.php */
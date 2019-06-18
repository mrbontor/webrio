<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function find_setting()
	{
		$query = $this->db->get('settings');

        return $query->row();
	}

	public function find_category(){
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();

        return $query->result();
    }

    public function find_news_lastest(){

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->join('news', 'categories.id = news.category');
        $this->db->limit(3);
        $query = $this->db->get();

        return $query->result();
    }

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */
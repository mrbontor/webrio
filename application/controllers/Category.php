<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('_isLogin') !=TRUE){
            redirect('auth');
        };
        $this->load->helper('url');
		$this->load->model('Users');
		$this->load->model('Categories');
	}

	public function index()
	{
		$data['title'] = "Master Categories Product";
		$data['subtitle'] = "Data Categories";
		$data['username'] = $this->session->userdata('name');
		$this->load->view('category', $data);	
	}

	public function ajax_list()
    {
        $data = $this->Categories->find_data();
        echo json_encode($data);
    }
    
    public function ajax_edit($id)
    {
        $data = $this->Categories->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();
        $slug = url_title($this->input->post('category_name'),'dash',TRUE);
        $data = array(
            'category_name' => $this->input->post('category_name'),
            'status' => $this->input->post('status'),
            'slug' => $slug
        );

        $insert = $this->Categories->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $slug = url_title($this->input->post('category_name'),'dash',TRUE);
        $data = array(
            'category_name' => $this->input->post('category_name'),
            'status' => $this->input->post('status'),
            'slug' => $slug
        );

        $this->Categories->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $Categories = $this->Categories->get_by_id($id);
        
        $this->Categories->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('category_name') == '')
        {
            $data['inputerror'][] = 'category name';
            $data['error_string'][] = 'category name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Please select status';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */
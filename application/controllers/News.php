<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('_isLogin') !=TRUE){
            redirect('auth');
        };
        $this->load->helper(array('text','url'));
		$this->load->model('Users');
		$this->load->model('News_model');
		$this->load->model('Categories');
	}

	public function index()
	{
		$data['title'] = "Master News";
		$data['subtitle'] = "News";
    	$data['news'] = $this->News_model->find_data();
    	$data['categories'] = $this->Categories->find_data();
		$data['username'] = $this->session->userdata('name');

    	$this->load->view('news', $data);	
	}

	public function ajax_list()
	{
    	$data = $this->News_model->find_data();
		echo json_encode($data);
	}
	
	public function ajax_edit($id)
	{
		$data = $this->News_model->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$slug = url_title($this->input->post('title'),'dash',TRUE);
		$data = array(
			'category' => $this->input->post('category'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'create_at' => Date('Y-m-d H:i:s'),
			'update_at' => Date('Y-m-d H:i:s'),
			'status' => $this->input->post('status'),
			'author' => $this->session->userdata('username'),
			'slug' => $slug
		);

		if(!empty($_FILES['image']['name']))
		{
			$upload = $this->_do_upload();
			$data['image'] = $upload;
		}

		$insert = $this->News_model->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$slug = url_title($this->input->post('title'),'dash',TRUE);
		$data = array(
			'category' => $this->input->post('category'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'update_at' => Date('Y-m-d H:i:s'),
			'status' => $this->input->post('status'),
			'slug' => $slug
		);

		if($this->input->post('remove_photo')) // if remove image checked
		{
			if(file_exists('upload/news/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/news/'.$this->input->post('remove_photo'));
			$data['image'] = '';
		}

		if(!empty($_FILES['image']['name']))
		{
			$upload = $this->_do_upload();
			
			$News_model = $this->News_model->get_by_id($this->input->post('id'));
			if(file_exists('upload/news/'.$News_model->image) && $News_model->image)
				unlink('upload/news/'.$News_model->image);

			$data['image'] = $upload;
		}

		$this->News_model->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$News_model = $this->News_model->get_by_id($id);
		if(file_exists('upload/news/'.$News_model->image) && $News_model->image)
			unlink('upload/news/'.$News_model->image);
		
		$this->News_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/news/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;
        $config['max_width']            = 1400;
        $config['max_height']           = 1400;
        $config['file_name']            = round(microtime(true) * 1000); 

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('image'))
        {
            $data['inputerror'][] = 'image';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('category') == '')
		{
			$data['inputerror'][] = 'category';
			$data['error_string'][] = 'category is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('title') == '')
		{
			$data['inputerror'][] = 'title';
			$data['error_string'][] = 'title is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'description is required';
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

/* End of file News.php */
/* Location: ./application/controllers/News.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('_isLogin') !=TRUE){
            redirect('auth');
        };
        $this->load->helper('text');
		$this->load->model('Users');
		$this->load->model('Setting_model');
	}

	public function index()
	{
		$data['title'] = "Master Settings";
		$data['subtitle'] = "Data Setting";
    	$data['setting'] = $this->Setting_model->find_data();
		$data['username'] = $this->session->userdata('name');

    	$this->load->view('setting', $data);	
	}

	public function ajax_list()
	{
    	$data = $this->Setting_model->find_data();
		echo json_encode($data);
	}
	
	public function ajax_edit($id)
	{
		$data = $this->Setting_model->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		$data = array(
			'title' => $this->input->post('title'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'bio' => $this->input->post('bio'),
			'description' => $this->input->post('description'),
			'keyword' => $this->input->post('keyword')
		);

		if(!empty($_FILES['favicon']['name']))
		{
			$upload = $this->_do_upload();
			$data['favicon'] = $upload;
		}

		$insert = $this->Setting_model->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'bio' => $this->input->post('bio'),
			'description' => $this->input->post('description'),
			'keyword' => $this->input->post('keyword')
		);

		if($this->input->post('remove_photo')) // if remove favicon checked
		{
			if(file_exists('upload/setting/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/setting/'.$this->input->post('remove_photo'));
			$data['favicon'] = '';
		}

		if(!empty($_FILES['favicon']['name']))
		{
			$upload = $this->_do_upload();
			
			$Setting_model = $this->Setting_model->get_by_id($this->input->post('id'));
			if(file_exists('upload/setting/'.$Setting_model->favicon) && $Setting_model->favicon)
				unlink('upload/setting/'.$Setting_model->favicon);

			$data['favicon'] = $upload;
		}

		$this->Setting_model->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$Setting_model = $this->Setting_model->get_by_id($id);
		if(file_exists('upload/setting/'.$Setting_model->favicon) && $Setting_model->favicon)
			unlink('upload/setting/'.$Setting_model->favicon);
		
		$this->Setting_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/setting/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
        $config['max_size']             = 500;
        $config['max_width']            = 24;
        $config['max_height']           = 24;
        $config['file_name']            = round(microtime(true) * 1000); 

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('favicon'))
        {
            $data['inputerror'][] = 'favicon';
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

		if($this->input->post('title') == '')
		{
			$data['inputerror'][] = 'title';
			$data['error_string'][] = 'title is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'email is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('contact') == '')
		{
			$data['inputerror'][] = 'contact';
			$data['error_string'][] = 'contact is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Address is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('bio') == '')
		{
			$data['inputerror'][] = 'bio';
			$data['error_string'][] = 'bio is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'description is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('keyword') == '')
		{
			$data['inputerror'][] = 'keyword';
			$data['error_string'][] = 'keyword is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Settings.php */
/* Location: ./application/controllers/Settings.php */
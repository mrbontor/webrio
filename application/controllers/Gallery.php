<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('_isLogin') !=TRUE){
            redirect('auth');
        };
        $this->load->helper(array('text','url'));
		$this->load->model('Users');
		$this->load->model('Gallery_model');
	}
	public function index()
	{
		$data['title'] = "Gallery";
		$data['subtitle'] = "Data Gallery";
    	$data['gallery'] = $this->Gallery_model->find_banner();
    	$data['corousel'] = $this->Gallery_model->find_corousel();
    	$data['project'] = $this->Gallery_model->find_project();
    	$data['username'] = $this->session->userdata('name');

    	$this->load->view('gallery', $data);	
	}

	public function upload()
	{
		$data['title'] = "Upload Gallery";
		$data['subtitle'] = "File Upload";
    	$data['username'] = $this->session->userdata('name');

    	$this->load->view('upload', $data);	
	}

	public function ajax_list_banner()
	{
    	$data = $this->Gallery_model->find_banner();
		echo json_encode($data);
	}

	public function ajax_list_corousel()
	{
    	$data = $this->Gallery_model->find_corousel();
		echo json_encode($data);
	}

	public function ajax_list_project()
	{
    	$data = $this->Gallery_model->find_project();
		echo json_encode($data);
	}
	
	public function ajax_edit($id)
	{
		$data = $this->Gallery_model->get_by_id($id);
		echo json_encode($data);
	}

	function do_upload_banner(){

        // $config['upload_path']   = FCPATH.'/upload/gallery/banner/';
        $xpost = $this->input->post('category');
        $config['upload_path']   = 'upload/gallery/'.$xpost.'/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if(!empty($_FILES['image']['name']))
		{
			if($this->upload->do_upload('image')){
	        	$data = array(
					'category' => $this->input->post('category'),
					'image' => $this->upload->data('file_name')
				);
	        	$this->Gallery_model->save($data);
	        }else{
	        	$message = 'Upload error: '.$this->upload->display_errors('','');
	        }
		}else{
			echo 'error';
		}
        
	}

	function remove_foto(){

		$post_name  = $this->input->post('image');
		$image = $this->Gallery_model->get_by_name($post_name);

		if($image > 0){
			if(file_exists($file = 'upload/gallery/banner/'.$image)){
				unlink($file);
			}
			$this->Gallery_model->delete_by_name($image);
		}
		echo "{}";
	}

}

/* End of file Galery.php */
/* Location: ./application/controllers/Galery.php */

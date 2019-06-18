<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Home_model');
		$this->load->model('News_model');
	}

	public function index()
	{
		$data['setting'] = $this->Home_model->find_setting();
		$this->load->view('news', $data);	
	}

	public function load_category()
    {
        $data = $this->Home_model->find_category();
        echo json_encode($data);
    }

    public function load_news_lastest()
    {
        $data = $this->Home_model->find_news_lastest();
        echo json_encode($data);
    }

	public function loadRecord($record=0){

		$recordPerPage  = 3;
		
		if($record != 0){
		  	$record = ($record-1) * $recordPerPage ;
		}

		$allcount = $this->News_model->getrecordCount();

		$users_record = $this->News_model->getData($record,$recordPerPage );

		// Pagination Configuration
		$config['base_url'] = base_url().'/News/loadRecord';
		$config['use_page_numbers'] = TRUE;
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="page-item"><a class="page-link" href="" data-ci-pagination-page="">Next';
		$config['next_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="page-item"><a class="page-link" href="" data-ci-pagination-page="">Previous';
		$config['prev_tag_close'] = '</a></li>';

		// $config['next_link'] = '<li class="page-item"><a class="page-link" href="">Next</a></li>';
		// $config['prev_link'] = '<li class="page-item"><a class="page-link" href="">Previous</a></li>';
		$config['attributes'] = array('class' => 'page-link');
		// $config['attributes']['rel'] = FALSE;

		$config['total_rows'] = $allcount;
		$config['per_page'] = $recordPerPage ;

		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $record;

		echo json_encode($data);
	}

	public function detail($slug)
	{
		$slug =  $this->uri->segment(3);
		$data['setting'] = $this->Home_model->find_setting();
		$data['article'] = $this->News_model->get_detail($slug);
		$this->load->view('detail',$data);
	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */
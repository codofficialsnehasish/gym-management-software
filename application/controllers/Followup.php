<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Followup extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='module';
		$this->inquiry='inquiry';
		$this->view_path='followup/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('followup', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Role';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
			$this->load->view($this->view_path.'content',$data);
			$script['pagescript']='contentScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function inquiry_followup(){
		if ($this->permission->method('followup', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Inquiry Followup';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_single_data($this->inquiry,'is_followup',1);
			$this->load->view($this->view_path.'inquiry_followup',$data);
			$script['pagescript']='contentScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}
}
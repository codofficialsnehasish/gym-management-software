<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='memberships';
		$this->view_path='accounts/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('transactions', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Inquiry';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_table($this->table_name);
			$this->load->view($this->view_path.'transactions/content',$data);
			$script['pagescript']='contentScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function invoice()
	{
		if ($this->permission->method('transactions', 'read')->access()) {
			$id=$this->uri->segment(4);
			$statusCon = array(
				'tblName'=>$this->table_name,
				'where'=> array(
						'id'=>$id
					)
			);
			$result = $this->select->getResult($statusCon);
			if(!empty($result)){
				$data['item']= $result[0];

				$this->load->view($this->view_path.'transactions/invoice',$data);
			}else{
				$this->session->set_flashdata('errors', 'Query error');
				redirect($this->agent->referrer());
			}
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}

	}
}

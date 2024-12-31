<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='career';
		$this->view_path='admin/auth/';
		$this->load->helper('file');
		//$this->output->enable_profiler(TRUE);
		
	}



	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Change Password';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']="";
		$this->load->view($this->view_path.'changepass',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function change_password(){
		$result=$this->auth_model->change_password($this->auth_user->id);
		if($result['status']==1){
				$this->session->set_flashdata('success', $result['msg']);
				redirect($this->agent->referrer());
		}else{
				$this->session->set_flashdata('error', $result['msg']);
				redirect($this->agent->referrer());
		}
	//	echo json_encode($result);
	}

}

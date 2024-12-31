<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_settings extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->general_setting='general_settings';
		$this->setting='settings';
		$this->email_content='email_content';
		$this->view_path='settings/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="";
		$header['title']='General Settings';
		$this->load->view('partials/header',$header);
		$allitems=$this->select->select_table($this->general_setting,'id','asc');
		$data['item']=$allitems[0];
		$this->load->view($this->view_path.'email_settings',$data);
		$script['pagescript']='formScript';
		$this->load->view('partials/footer',$script);
	}
	
	
	///////////////
		/////////////////////////////
		public function process(){
			$id=$this->uri->segment(3);
			$data=array(
				'mail_library'=>$this->input->post('mail_library', true),
				'mail_protocol'=>$this->input->post('mail_protocol', true),
				'mail_host'=>$this->input->post('mail_host', true),
				'mail_port'=>$this->input->post('mail_port', true),
				'mail_username'=>$this->input->post('mail_username', true),
				'mail_password'=>$this->input->post('mail_password', true),
				'mail_title'=>$this->input->post('mail_title', true)
	
			);
			$configs = array(
				'tblName' => $this->general_setting,
				'data' => $data,
				'where' => array('id'=>$id)
			);
			$update=$this->edit_model->edit($configs);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
					redirect($this->agent->referrer());
			}
		
		}
	
		public function contact_email_settings()
		{
		$header['pagecss']="";
		$header['title']='General Settings';
		$this->load->view('partials/header',$header);
		$allitems=$this->select->select_single_data($this->email_content,'page','contact');
		$data['item']=$allitems[0];
		$this->load->view($this->view_path.'contact_email_settings',$data);
		$script['pagescript']='formScript';
		$this->load->view('partials/footer',$script);
		}
	
		/////////////////////////////
		public function email_content_process(){
			$id=$this->uri->segment(3);
			$data=array(
				'mail_subject'=>$this->input->post('mail_subject', true),
				'mail_template'=>$this->input->post('mail_template', true),
				'mail_body'=>$this->input->post('mail_body', true)	
			);
			$configs = array(
				'tblName' => $this->email_content,
				'data' => $data,
				'where' => array('id'=>$id)
			);
			$update=$this->edit_model->edit($configs);

			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
					redirect($this->agent->referrer());
			}
		
		}
			public function register_email_settings()
			{
			$header['pagecss']="";
			$header['title']='Register eMail Settings';
			$this->load->view('partials/header',$header);
			$allitems=$this->select->select_single_data($this->email_content,'page','register');
			$data['item']=$allitems[0];
			$this->load->view($this->view_path.'register_email_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
			}
		
			/////////////////////////////
			public function product_email_settings()
			{
			$header['pagecss']="";
			$header['title']='Product eMail Settings';
			$this->load->view('partials/header',$header);
			$allitems=$this->select->select_single_data($this->email_content,'page','product');
			$data['item']=$allitems[0];
			$this->load->view($this->view_path.'product_email_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
			}

}
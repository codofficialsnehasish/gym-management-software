<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='inquiry';
		$this->view_path='inquiry/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('inquiry', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Inquiry';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_single_data($this->table_name,'is_followup',1);
			$this->load->view($this->view_path.'content',$data);
			$script['pagescript']='contentScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function add_new()
	{
		if ($this->permission->method('inquiry', 'create')->access()) {
			$header['pagecss']="";
			$header['title']='Add New Inquiry';
			$this->load->view('partials/header',$header);

			$statusCon = array(
				'tblName'=>'status_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['status_master']= $this->select->getResult($statusCon);

			$catagoryCon = array(
				'tblName'=>'catagory_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['catagory_master']= $this->select->getResult($catagoryCon);

			$this->load->view($this->view_path.'add',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function process()
	{
		if ($this->permission->method('inquiry', 'create')->access()) {
			$this->form_validation->set_rules('first_name', 'first_name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$data=array(
					'first_name'=> $this->input->post('first_name', true),
					'middle_name'=> $this->input->post('middle_name', true),
					'last_name'=> $this->input->post('last_name', true),
					'full_name'=> $this->input->post('first_name', true).' '.$this->input->post('middle_name', true).' '.$this->input->post('last_name', true),
					'email'=> $this->input->post('email', true),
					'mobile'=> $this->input->post('mobile', true),
					'opt_mobile'=> $this->input->post('opt_mobile', true),
					'address'=> $this->input->post('address', true),
					'inquiry_for'=> $this->input->post('inquiry_for', true),
					'status'=> $this->input->post('status', true),
					'inquiry_date'=> $this->input->post('inquiry_date', true),
					'expected_joining_date'=> $this->input->post('expected_joining_date', true)
				);
				$configs = array(
					'tblName' => $this->table_name,
					'data' => $data
				);
				$insert=$this->insert_model->insert_data($configs);
				$msgdata=array(
					'inquiry_id'=> $insert,
					'remark'=> $this->input->post('remark', true),
					'user_id'=> $this->auth_user->id,
					'next_followup_date'=> $this->input->post('expected_joining_date', true),
					'is_from_inquiry'=> 1
				);
				$configss = array(
					'tblName' => 'followup',
					'data' => $msgdata
				);
				$insert=$this->insert_model->insert_data($configss);
				if($insert){
					$this->session->set_flashdata('success', 'Data has been inserted successfully');
					redirect($this->agent->referrer());
				}else{
					$this->session->set_flashdata('errors', 'Query error');
					redirect($this->agent->referrer());
				}
			}
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function inquiryDetails()
	{
		if ($this->permission->method('inquiry', 'read')->access()) {
			$id=$this->uri->segment(3);
			$header['pagecss']="";
			$header['title']='Inquiry Detail';
			$this->load->view('partials/header',$header);
			$inquiryArray=$this->select->select_single_data($this->table_name,'id',$id);
			$data['item']=$inquiryArray[0];
			$followupArray=$this->select->select_single_data('followup','inquiry_id',$inquiryArray[0]->id);
			$data['followup']=$followupArray;
			$this->load->view($this->view_path.'inquirydetails',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function followupProcess()
	{
		if ($this->permission->method('inquiry', 'create')->access()) {
			$this->form_validation->set_rules('remark', 'remark', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$data=array(
					'expected_joining_date'=> $this->input->post('next_follow_date', true),
					'is_followup'=> $this->input->post('inqstatus', true)
				);
				$where=array(
					'id'=> $this->input->post('inquiry_id', true)
				);
				$configs = array(
					'tblName' => $this->table_name,
					'data' => $data,
					'where' => $where
				);
				$edit=$this->edit_model->edit($configs);

				$msgdata=array(
					'inquiry_id'=> $this->input->post('inquiry_id', true),
					'remark'=> $this->input->post('remark', true),
					'user_id'=> $this->auth_user->id,
					'next_followup_date'=> $this->input->post('next_follow_date', true),
					'is_from_inquiry'=> 1
				);
				$configss = array(
					'tblName' => 'followup',
					'data' => $msgdata
				);
				$insert=$this->insert_model->insert_data($configss);
				if($insert){
					$this->session->set_flashdata('success', 'Data has been inserted successfully');
					redirect($this->agent->referrer());
				}else{
					$this->session->set_flashdata('errors', 'Query error');
					redirect($this->agent->referrer());
				}
			}
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function not_interested(){
		if ($this->permission->method('inquiry', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Not Interested';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_single_data($this->table_name,'is_followup',0);
			$this->load->view($this->view_path.'not_interested_list',$data);
			$script['pagescript']='contentScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}


	public function delete(){
		if ($this->permission->method('inquiry', 'delete')->access()) {
			$id= $this->input->post('id');
			$configs = array(
				'tblName' => $this->table_name,
				'where' => array('id'=>$id)
			);
			$this->delete_model->delete($configs);
			echo 'Deleted Successfully';
		}else{
			echo 'Permission Denied';
		}
	}
}

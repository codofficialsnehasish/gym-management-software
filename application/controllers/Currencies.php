<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currencies extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='currencies';
		$this->view_path='currencies/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('currencies', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Currency';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_table($this->table_name,'is_visible','desc');
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
		if ($this->permission->method('currencies', 'create')->access()) {
			$header['pagecss']="";
			$header['title']='Add New Currency';
			$this->load->view('partials/header',$header);
			$data['categories']='';
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
		if ($this->permission->method('currencies', 'create')->access()) {
			$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$data=array(
					'name'=>$this->input->post('name', true),
					'code'=>$this->input->post('code', true),
					'is_visible'=>$this->input->post('is_visible', true),
					'symbol'=>$this->input->post('symbol', true),
					'hex'=>$this->input->post('hex', true)
				);
				$configs = array(
					'tblName' => $this->table_name,
					'data' => $data
				);
				$insert=$this->insert_model->insert_data($configs);
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

	public function edit()
	{
		if ($this->permission->method('currencies', 'update')->access()) {
			$id=$this->uri->segment(3);
			$header['pagecss']="";
			$header['title']='Edit Brand';
			$this->load->view('partials/header',$header);
			$categoryArray=$this->select->select_single_data($this->table_name,'id',$id);
			//print_r($categoryArray);die;
			$data['item']=$categoryArray[0];
			$this->load->view($this->view_path.'edit',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function update_process()
	{
		if ($this->permission->method('currencies', 'update')->access()) {
			$id=$this->uri->segment(3);
			$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$data=array(
					'name'=>$this->input->post('name', true),
					'code'=>$this->input->post('code', true),
					'is_visible'=>$this->input->post('is_visible', true),
					'symbol'=>$this->input->post('symbol', true),
					'hex'=>$this->input->post('hex', true)
				);
				$configs = array(
					'tblName' => $this->table_name,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}


	public function delete(){
		if ($this->permission->method('currencies', 'delete')->access()) {
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

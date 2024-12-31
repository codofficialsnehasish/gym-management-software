<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='module';
		$this->view_path='employees/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Role';
		$this->load->view('partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Role';
		$this->load->view('partials/header',$header);
		$data['categories']='';
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'name'=> $this->input->post('name', true),
				'description'=> $this->input->post('description', true),
				'directory'=> $this->slug->slugify($this->input->post('name', true)),
				'is_visible'=> $this->input->post('is_visible', true)
			);
			//'created_at'=> $this->currentTime

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
	}

	public function edit()
	{
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
	}

	public function update_process()
	{
		$id=$this->uri->segment(3);
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'name'=> $this->input->post('name', true),
				'description'=> $this->input->post('description', true),
				'directory'=> $this->slug->slugify($this->input->post('name', true)),
				'is_visible'=> $this->input->post('is_visible', true)
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
	}


	public function delete(){
		$id= $this->input->post('id');
		$configs = array(
			'tblName' => $this->table_name,
			'where' => array('id'=>$id)
		);
		$this->delete_model->delete($configs);
		echo 'Deleted Successfully';
	}

}

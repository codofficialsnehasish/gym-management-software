<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class seller extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='users';
		$this->view_path='admin/seller/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='sellers';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_single_data($this->table_name,'role','seller');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}

	public function visibility_status(){
		$id= $this->input->post('id');
		$this->edit_model->edit(array('status'=>1),$id,'id',$this->table_name);
		echo 'Lived Successfully';
	}
	
	public function update_process()
	{
		$id=$this->input->post('user_id', true);
			$data=array(
				'status'=>$this->input->post('status', true),
                'commission_rate'=>$this->input->post('commission_rate', true),
			);
			
			$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
	
	}



	public function details()
	{
		$id=$this->uri->segment(4);
		
		$header['pagecss']="contentCss";
		$header['title']='Sellers';
		$this->load->view('admin/partials/header',$header);
		$items=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$items[0];
		$this->load->view($this->view_path.'details',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}


	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit seller';
		$this->load->view('admin/partials/header',$header);
		$sellerArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$sellerArray[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function updateProcess()
	{
	//	$id=$this->uri->segment(4);
		$id =	$this->input->post('id');
		$this->form_validation->set_rules('first_name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'first_name'=>$this->input->post('first_name', true),
				'last_name'=>$this->input->post('last_name', true),
				'full_name'=>$this->input->post('first_name', true).' '.$this->input->post('last_name', true),
				'email'=>$this->input->post('email', true),
				'status'=>$this->input->post('status', true),
				'phone_number'=>$this->input->post('phone_number', true),
				'address'=>$this->input->post('address', true),
				'shop_name'=>$this->input->post('shop_name', true),
				'pan_no'=>$this->input->post('pan_no', true),
				'gst_no'=>$this->input->post('gst_no', true),

			);

			if(is_uploaded_file($_FILES['pan_proof']['tmp_name'])) 
			{  
				$data['pan_proof']=$this->mediaupload->doUploadAny('pan_proof');
			}
			if(is_uploaded_file($_FILES['gst_proof']['tmp_name'])) 
			{  
				$data['gst_proof']=$this->mediaupload->doUploadAny('gst_proof');
			}


			$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

}

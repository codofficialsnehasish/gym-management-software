<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='booking_details';
		$this->booking_dates='booking_dates';
		$this->room_master='room_master';
		$this->documents='documents';
		$this->view_path='booking/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Role';
		$this->load->view('partials/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'id','desc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Role';
		$this->load->view('partials/header',$header);
		$data['allrooms']=$this->select->select_table($this->room_master,'is_visible','desc');
		$data['documents']=$this->select->select_table($this->documents,'is_visible','desc');
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'name'=> $this->input->post('name', true),
				'phone'=> $this->input->post('phone', true),
				'addr'=> $this->input->post('addr', true),
				'doc_proof'=> $this->input->post('doc_proof', true),
				'id_no'=> $this->input->post('id_no', true),
				'driver'=> $this->input->post('driver', true),
				'mode_of_transport'=> $this->input->post('mode_of_transport', true),
				'start_date'=> formated_date($this->input->post('start_date', true),'Y-m-d'),
				'end_date'=> formated_date($this->input->post('end_date', true),'Y-m-d'),
				'status'=> 0,
				'booked_on'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->table_name,
				'data' => $data
			);
			$insert=$this->insert_model->insert_data($configs);
			if($insert){
				////booking dates
				$startTime = strtotime($this->input->post('start_date', true));
				$endTime = strtotime($this->input->post('end_date', true));
				$values = array();
				for($time = $startTime; $time < $endTime; $time = strtotime('+1 day', $time))
				{
				   $thisDate = date('Y-m-d', $time);
					foreach($this->input->post('group-a[]') as $val){
						$metadata=array(
							'book_id'=>$insert,
							'r_id'=>$val['room'],
							'rate'=>$val['rate'],
							'adult'=>$val['no_of_heads'],
							'child'=> $val['child'],
							//'driver'=>$val['driver'],
							'dated'=>$thisDate,
							'status'=>1,
						);
						$configs1 = array(
							'tblName' => $this->booking_dates,
							'data' => $metadata
						);
						$this->insert_model->insert_data($configs1);
					}
				}
		
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
				'is_visible'=> $this->input->post('is_visible', true),
				'created_at'=> $this->currentTime
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


	public	function invoice(){
		// Get output html
		$html = $this->load->view($this->view_path.'invoice',true);
		
		// Load pdf library
		$this->load->library('pdf');
		
		// Load HTML content
		$this->dompdf->loadHtml($html);
		
		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');
		
		// Render the HTML as PDF
		$this->dompdf->render();
		
		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
		}


		public function details()
		{
			$id=$this->uri->segment(3);
			$header['pagecss']="";
			$header['title']='Edit Brand';
			$this->load->view('partials/header',$header);
			$categoryArray=$this->select->select_single_data($this->table_name,'id',$id);
			//print_r($categoryArray);die;
			$data['item']=$categoryArray[0];
			$this->load->view($this->view_path.'details',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}
	


}

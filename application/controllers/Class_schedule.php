<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_schedule extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='class_schedules';
		$this->view_path='class_schedule/';
		$this->members_in_class = 'members_in_class';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('schedule_class', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Schedule Class';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_table($this->table_name);
			$statusCon = array(
				'tblName'=>'users',
				'where'=> array(
						'role'=>get_role_id_byname('Member')
					)
			);
			$data['members']= $this->select->getResult($statusCon);
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
		if ($this->permission->method('schedule_class', 'create')->access()) {
			$header['pagecss']="";
			$header['title']='Schedule Class';
			$this->load->view('partials/header',$header);

			$trainercon = array(
				'tblName'=>'users',
				'where'=> array(
						'role'=>get_role_id_byname('Trainer')
					)
			);
			$data['trainers']= $this->select->getResult($trainercon);

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
		if ($this->permission->method('schedule_class', 'create')->access()) {
			$this->form_validation->set_rules('class_name', 'Class Name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$data=array(
					'class_name'=> $this->input->post('class_name', true),
					'trainer_id'=> $this->input->post('trainer_id', true),
					'start_time'=> $this->input->post('start_time', true),
					'end_time'=> $this->input->post('end_time', true),
					'capacity'=> $this->input->post('capacity', true),
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
		if ($this->permission->method('schedule_class', 'update')->access()) {
			$id=$this->uri->segment(3);
			$header['pagecss']="";
			$header['title']='Schedule Class';
			$this->load->view('partials/header',$header);
			$inquiryArray=$this->select->select_single_data($this->table_name,'id',$id);
			$data['item']=$inquiryArray[0];
			$trainercon = array(
				'tblName'=>'users',
				'where'=> array(
						'role'=>get_role_id_byname('Trainer')
					)
			);
			$data['trainers']= $this->select->getResult($trainercon);
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
		if ($this->permission->method('schedule_class', 'update')->access()) {
			$id=$this->uri->segment(3);
			$this->form_validation->set_rules('class_name', 'Class Name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$data=array(
					'class_name'=> $this->input->post('class_name', true),
					'trainer_id'=> $this->input->post('trainer_id', true),
					'start_time'=> $this->input->post('start_time', true),
					'end_time'=> $this->input->post('end_time', true),
					'capacity'=> $this->input->post('capacity', true),
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
		if ($this->permission->method('schedule_class', 'delete')->access()) {
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

	public function assign_member_in_class(){
		if ($this->permission->method('schedule_class', 'read')->access()) {
			$id=$this->uri->segment(3);
			$header['pagecss']="";
			$header['title']='Assign Member In Class';
			$this->load->view('partials/header',$header);
			$sql = "SELECT u.* FROM users u WHERE u.role = ".get_role_id_byname('Member')." AND NOT EXISTS (
																				SELECT 1 
																				FROM members_in_class mic 
																				WHERE mic.member_id = u.id 
																				AND mic.class_id = ".$id."
																			)
																		";
			$statusCon = array(
				'tblName'=>'users',
				'where'=> array(
						'role'=>get_role_id_byname('Member')
					)
			);
			$data['members']= $this->select->custom_qry($sql);

			$assignmember = array(
				'tblName'=>'members_in_class',
				'where'=> array(
						'class_id'=> $id
					)
			);
			$data['assign_members']= $this->select->getResult($assignmember);

			$data['class_id'] = $id;
			$this->load->view($this->view_path.'assign_member',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function process_assign()
	{
		if ($this->permission->method('schedule_class', 'create')->access()) {
			$this->form_validation->set_rules('member_ids[]', 'Members', 'required');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$member_ids = $this->input->post('member_ids', true);
				if (!empty($member_ids)) {
					foreach ($member_ids as $member_id) {
						// Insert each member into the members_in_class table
						$member_data = array(
							'class_id' => $this->input->post('class_id', true),
							'member_id' => $member_id,
						);

						// Insert member into class
						$member_config = array(
							'tblName' => $this->members_in_class,  // Same table for members_in_class
							'data' => $member_data
						);
						$this->insert_model->insert_data($member_config);
						$this->session->set_flashdata('success', 'Data has been inserted successfully');
						redirect($this->agent->referrer());
					}
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

	public function delete_assign_member(){
		if ($this->permission->method('schedule_class', 'delete')->access()) {
			$id=$this->uri->segment(3);
			$configs = array(
				'tblName' => 'members_in_class',
				'where' => array('id'=>$id)
			);
			$this->delete_model->delete($configs);
			$this->session->set_flashdata('success', 'Data has been Deleted Successfully');
			redirect($this->agent->referrer());
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}
}

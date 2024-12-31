<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->trainers='trainers';
		$this->users='users';
		$this->user_role='user_role';
		$this->country = 'location_countries';
		$this->state = 'location_states';
		$this->city = 'location_cities';
		$this->qualification = 'trainer_qualification';
		$this->work_exprence = 'work_exprence';
		$this->achievements = 'achievements';
		$this->users='users';
		$this->bank='bank';
		$this->table_name='trainers';
		$this->view_path='trainer/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('trainer', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Trainer';
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

	public function add_new()
	{
		if ($this->permission->method('trainer', 'create')->access()) {
			$header['pagecss']="";
			$header['title']='Add New Trainer';
			$this->load->view('partials/header',$header);
			
			$genderCon = array(
					'tblName'=>'gender_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['gender_master']= $this->select->getResult($genderCon);
			
			$medicalHistoryCon = array(
					'tblName'=>'medical_history_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['medical_history_master']= $this->select->getResult($medicalHistoryCon);

			$bloodGroupCon = array(
					'tblName'=>'blood_group_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['blood_group_master']= $this->select->getResult($bloodGroupCon);

			$maritialstatusCon = array(
					'tblName'=>'marital_status_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['marital_status_master']= $this->select->getResult($maritialstatusCon);

			$religionCon = array(
					'tblName'=>'religion_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['religion_master']= $this->select->getResult($religionCon);

			$nationalityCon = array(
					'tblName'=>'nationality_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['nationality_master']= $this->select->getResult($nationalityCon);
			
			
			$shiftCon = array(
					'tblName'=>'shift_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['shift_master']= $this->select->getResult($shiftCon);

			$countryConnections = array(
					'tblName' => 'location_countries',
					'where' => array(
							'is_visible'=>1
						)
				);
			$data['countries']= $this->select->getResult($countryConnections);
			
			$packageCon = array(
					'tblName'=>'package_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['package_master']= $this->select->getResult($packageCon);
			
			$paymentModeCon = array(
					'tblName'=>'payment_mode_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['payment_mode_master']= $this->select->getResult($paymentModeCon);

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
		if ($this->permission->method('trainer', 'create')->access()) {
			$this->form_validation->set_rules('first_name', 'Name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				$userdata= array(
					"first_name"       => $this->input->post('first_name', true),
					"middle_name"      => $this->input->post('middle_name', true),
					"last_name"        => $this->input->post('last_name', true),
					"full_name"        => trim($this->input->post('first_name', true).' '.$this->input->post('middle_name', true).' '.$this->input->post('last_name', true)),
					"phone_number"     => $this->input->post('phone_number', true),
					"home_phone_number"=> $this->input->post('home_phone_number', true),
					"email"            => $this->input->post('email', true),
					"gender"           => $this->input->post('gender', true),
					"dob"              => formated_date($this->input->post('dob', true),'Y-m-d'),
					"nationality"      => $this->input->post('nationality', true),
					"religion"         => $this->input->post('religion', true),
					"marital_status"   => $this->input->post('marital_status', true),
					"blood_group"      => $this->input->post('blood_group', true),
					"aadhar_no"        => $this->input->post('aadhar_no', true),
					"pan_no"           => $this->input->post('pan_no', true),
					"country_id"       => $this->input->post('country_id', true),
					"state_id"         => $this->input->post('state_id', true),
					"city_id"          => $this->input->post('city_id', true),
					"zip_code"         => $this->input->post('zip_code', true),
					"address"          => $this->input->post('address', true),
					"pn_country_id"    => $this->input->post('pn_country_id', true),
					"pn_state_id"      => $this->input->post('pn_state_id', true),
					"pn_city_id"       => $this->input->post('pn_city_id', true),
					"pn_zip_code"      => $this->input->post('pn_zip_code', true),
					"pn_address"       => $this->input->post('pn_address', true),
					'role'             => get_role_id_byname('Trainer'),
					"created_at"       => $this->currentTime
				);

				if(is_uploaded_file($_FILES['file']['tmp_name'])) 
				{  
					$userdata['user_image']=$this->mediaupload->doUpload('file');
				}else{
					$userdata['user_image']=$this->input->post('media_id', true);
				}

				$configs = array(
					'tblName' => $this->users,
					'data' => $userdata
				);
				$user_id=$this->insert_model->insert_data($configs);

				if($user_id){
					/*
						Member Role Entry
					*/
					$trainer_id = generate_trainer_id();

					$roledata = array(
						'user_id'         => $user_id,
						'role_id'         => get_role_id_byname('Trainer'),
						'created_by'      => $this->auth_user->id,
						'created_at'      => $this->currentTime
					);
					$roleconfigs = array(
						'tblName' => $this->user_role,
						'data' => $roledata
					);
					$this->insert_model->insert_data($roleconfigs);
					//
		
					/*
						Members Entry
					*/
					$yrainerssdata = array(
						'user_id'              => $user_id,
						'trainer_id'            => $trainer_id,
						'shift_id'             => $this->input->post('shift_id', true),
						'medical_history'      => $this->input->post('medical_history', true),
						'date_of_joining'      => $this->currentTime
					);
					$memberconfigs = array(
						'tblName' => $this->trainers,
						'data' => $yrainerssdata
					);
					$this->insert_model->insert_data($memberconfigs);
				
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

	public function details(){
		if ($this->permission->method('trainer_details', 'read')->access()) {
			$id=$this->uri->segment(3);
			$header['pagecss']="contentCss";
			$header['title']='Trainer';
			$this->load->view('partials/header',$header);

			// $trainerdata=$this->select->select_table($this->users,'id',$id);
			// print_r($trainerdata);die;
			// $items=get_user_data($trainerdata[0]->user_id);
			// $user = $this->auth_model->get_user_by_id($trainerdata[0]->id);
			$user=$this->auth_model->get_user_by_id($id);
			$data['userdata']=$user;
			// $data['trainerdata']=$trainerdata[0];
			
			////////////////////////////////////////////////////////////////////////
			$trainerCon = array(
				'tblName'=>$this->trainers,
				'where'=> array(
					'user_id'=> $id
					)
				);
			$TrainerCon= $this->select->getResult($trainerCon);
				
			$data['trainerdata']=$TrainerCon[0];
			$data['trainer'] = $TrainerCon[0];


			// $qualification = array(
			// 	'tblName'=>$this->qualification,
			// 	'where'=> array(
			// 			'trainer_id'=> $id
			// 		)
			// );
			// $qualification= $this->select->getResult($qualification);
			// $data['qualification'] = $qualification;


			$salary_config = array(
				'tblName'=>'salary_config',
				'where'=> array(
					'user_id'=> $id
				)
			);
			$salary_configs= $this->select->getResult($salary_config);
			if(!empty($salary_configs[0])){
				$data['salary_config']= $this->select->getResult($salary_config)[0];
			}else{
				$data['salary_config']= $this->select->getResult($salary_config);
			}

			$stateCon = array(
				'tblName'=>$this->state,
				'where'=> array(
						'country_id'=> $user->country_id
					)
			);
			$data['stateData']= $this->select->getResult($stateCon);

			$cityCon = array(
				'tblName'=>$this->city,
				'where'=> array(
						'state_id'=> $user->state_id
					)
			);
			$data['cityData']= $this->select->getResult($cityCon);


			$pmstateCon = array(
				'tblName'=>$this->state,
				'where'=> array(
						'country_id'=> $user->pn_country_id
					)
			);
			$data['pmstateData']= $this->select->getResult($pmstateCon);

			$pmcityCon = array(
				'tblName'=>$this->city,
				'where'=> array(
						'state_id'=> $user->pn_state_id
					)
			);
			$data['pmcityData']= $this->select->getResult($pmcityCon);

			////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$genderCon = array(
				'tblName'=>'gender_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['gender_master']= $this->select->getResult($genderCon);
			
			$medicalHistoryCon = array(
					'tblName'=>'medical_history_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['medical_history_master']= $this->select->getResult($medicalHistoryCon);

			$bloodGroupCon = array(
					'tblName'=>'blood_group_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['blood_group_master']= $this->select->getResult($bloodGroupCon);

			$maritialstatusCon = array(
					'tblName'=>'marital_status_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['marital_status_master']= $this->select->getResult($maritialstatusCon);

			$religionCon = array(
					'tblName'=>'religion_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['religion_master']= $this->select->getResult($religionCon);

			$nationalityCon = array(
					'tblName'=>'nationality_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['nationality_master']= $this->select->getResult($nationalityCon);
			
			
			$shiftCon = array(
					'tblName'=>'shift_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['shift_master']= $this->select->getResult($shiftCon);

			$countryConnections = array(
					'tblName' => 'location_countries',
					'where' => array(
							'is_visible'=>1
						)
				);
			$data['countries']= $this->select->getResult($countryConnections);
			
			$packageCon = array(
					'tblName'=>'package_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['package_master']= $this->select->getResult($packageCon);
			
			$paymentModeCon = array(
					'tblName'=>'payment_mode_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['payment_mode_master']= $this->select->getResult($paymentModeCon);
			$data['page_head'] = "Trainer Details";
			$this->load->view($this->view_path.'details/content',$data);
			$script['pagescript']='trainerScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}


	public function basicinfo(){
		if ($this->permission->method('basic_information', 'update')->access()) {
			$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'status'=> $this->input->post('status', true),
					'first_name'=> $this->input->post('first_name', true),
					'middle_name'=> $this->input->post('middle_name', true),
					'last_name'=> $this->input->post('last_name', true),
					"full_name"=> trim($this->input->post('first_name', true).' '.$this->input->post('middle_name', true).' '.$this->input->post('last_name', true)),
					'gender'=> $this->input->post('gender', true),
					'dob'=> $this->input->post('dob', true),
					'religion'=> $this->input->post('religion', true),
					'marital_status'=> $this->input->post('marital_status', true),
					'blood_group'=> $this->input->post('blood_group', true),
					'nationality'=> $this->input->post('nationality', true)
					//	'created_at'=> $this->currentTime
				);
				$configs = array(
					'tblName' => $this->users,
					'data' => $data,
					'where' => array('id'=>$this->input->post('user_id', true))
				);
				$update=$this->edit_model->edit($configs);
				if($update){
					$dta = array(
						'date_of_joining'=> formated_date($this->input->post('date_of_joining', true),'Y-m-d'),
						'shift_id'=> $this->input->post('shift_id', true)
						);
					if(!empty($this->input->post('date_of_leaving', true))){
						$dta['date_of_leaving'] = formated_date($this->input->post('date_of_leaving', true),'Y-m-d');
					}

					$mconfigs = array(
					'tblName' => $this->table_name,
					'data' => $dta,
					'where' => array('user_id'=>$this->input->post('user_id', true)));
					$this->edit_model->edit($mconfigs);

					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}


	public function contactinfo(){
		if ($this->permission->method('contact_information', 'update')->access()) {
			$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'email'=> $this->input->post('email', true),
					'phone_number'=> $this->input->post('phone_number', true),
					'official_phone_number'=> $this->input->post('official_phone_number', true),
					'country_id'=> $this->input->post('country_id', true),
					'state_id'=> $this->input->post('state_id', true),
					'city_id'=> $this->input->post('city_id', true),
					'zip_code'=> $this->input->post('zip_code', true),
					'address'=> $this->input->post('address', true),
					'pn_country_id'=> $this->input->post('pn_country_id', true),
					'pn_state_id'=> $this->input->post('pn_state_id', true),
					'pn_city_id'=> $this->input->post('pn_city_id', true),
					'pn_zip_code'=> $this->input->post('pn_zip_code', true),
					'pn_address'=> $this->input->post('pn_address', true)
				);
				$configs = array(
					'tblName' => $this->users,
					'data' => $data,
					'where' => array('id'=>$this->input->post('user_id', true))
				);
				$update=$this->edit_model->edit($configs);
				if($update){
					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function documentinfo(){
		if ($this->permission->method('documents', 'update')->access()) {
			$this->form_validation->set_rules('aadhar_no', 'Aadhar', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'aadhar_no'=> $this->input->post('aadhar_no', true),
					'pan_no'=> $this->input->post('pan_no', true),
				);
				if(is_uploaded_file($_FILES['file']['tmp_name'])) {  
					$data['aadhar_proof']=$this->mediaupload->doUpload('file');
				}
				if(is_uploaded_file($_FILES['file2']['tmp_name'])) {  
					$data['pan_proof']=$this->mediaupload->doUpload('file2');
				}
				$configs = array(
					'tblName' => $this->users,
					'data' => $data,
					'where' => array('id'=>$this->input->post('user_id', true))
				);
				$update=$this->edit_model->edit($configs);
				if($update){
					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function qualificationinfo(){
		if ($this->permission->method('qualification', 'create')->access()) {
			$this->form_validation->set_rules('qualification', 'Qualification', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'trainer_id'=> $this->input->post('trainer_id', true),
					'qualification'=> $this->input->post('qualification', true),
					'board_university'=> $this->input->post('board_university', true),
					'subject'=> $this->input->post('subject', true),
					'passing_year'=> $this->input->post('passing_year', true),
					'percentage'=> $this->input->post('percentage', true),
				);
				$configs = array(
					'tblName' => $this->qualification,
					'data' => $data
				);
				$update=$this->insert_model->insert_data($configs);
				if($update){
					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}
	
	public function workexprenceinfo(){
		if ($this->permission->method('experience', 'create')->access()) {
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'trainer_id'=> $this->input->post('trainer_id', true),
					'name'=> $this->input->post('name', true),
					'exp_year'=> $this->input->post('exp_year', true),
					'exp_months'=> $this->input->post('exp_months', true),
				);
				if(is_uploaded_file($_FILES['work_certificate']['tmp_name'])) {  
					$data['sertificate']=$this->mediaupload->doUpload('work_certificate');
				}
				$configs = array(
					'tblName' => $this->work_exprence,
					'data' => $data
				);
				$update=$this->insert_model->insert_data($configs);
				if($update){
					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function achievementsinfo(){
		if ($this->permission->method('achievements', 'create')->access()) {
			$this->form_validation->set_rules('prize_name', 'Prize_name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'trainer_id'=> $this->input->post('trainer_id', true),
					'prize_name'=> $this->input->post('prize_name', true),
					'competition_name'=> $this->input->post('competition_name', true),
					'date'=> $this->input->post('date', true),
				);
				if(is_uploaded_file($_FILES['achivement_picture']['tmp_name'])) {  
					$data['image']=$this->mediaupload->doUpload('achivement_picture');
				}
				$configs = array(
					'tblName' => $this->achievements,
					'data' => $data
				);
				$update=$this->insert_model->insert_data($configs);
				if($update){
					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}
	

	public function bankinfo(){
		if ($this->permission->method('bank_account', 'create')->access()) {
			$this->form_validation->set_rules('bank_name', 'Bank_name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'trainer_id'=> $this->input->post('trainer_id', true),
					'bank_name'=> $this->input->post('bank_name', true),
					'account_number'=> $this->input->post('account_number', true),
					'ifsc_code'=> $this->input->post('ifsc_code', true),
				);
				$configs = array(
					'tblName' => $this->bank,
					'data' => $data
				);
				$update=$this->insert_model->insert_data($configs);
				if($update){
					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function salary_configuration(){
		if ($this->permission->method('salary_configuration', 'update')->access()) {
			$this->form_validation->set_rules('user_id', 'User id', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'user_id'=>$this->input->post('user_id', true),
					'base_salary'=> $this->input->post('base_salary', true),
					'provident_fund'=> $this->input->post('provident_fund', true),
					'health_insurance'=> $this->input->post('health_insurance', true),
					'income_tax'=> $this->input->post('income_tax', true),
					'other_deductions'=> $this->input->post('other_deductions', true),
					'paying_in_hand'=> $this->input->post('paying_in_hand', true),
				);
				$salary_config = array(
					'tblName'=>'salary_config',
					'where'=> array(
						'user_id'=> $this->input->post('user_id', true)
					)
				);
				$salary_configs= $this->select->getResult($salary_config);
				if(!empty($salary_configs)){
					$configs = array(
						'tblName' => 'salary_config',
						'data' => $data,
						'where' => array('user_id'=>$this->input->post('user_id', true))
					);
					$update=$this->edit_model->edit($configs);
				}else{
					$configs = array(
						'tblName' => 'salary_config',
						'data' => $data
					);
					$update=$this->insert_model->insert_data($configs);
				}
				if($update){
					$status = 1;
					$msg = 'Data has been updated successfully';
				}else{
					$status = 0;
					$msg = 'Query error';
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function profilepicture(){	
		if ($this->permission->method('profile_picture', 'update')->access()) {
			// echo $this->mediaupload->doUpload($this->file_name);
			$data=array();
			if(is_uploaded_file($_FILES['file']['tmp_name'])) {  
				$data['user_image']=$this->mediaupload->doUpload('file');
			}

			// $data['user_image']=$this->mediaupload->doUpload($this->file_name);

			$configs = array(
				'tblName' => $this->users,
				'data' => $data,
				'where' => array('id'=>$this->input->post('user_id', true))
			);
			
			echo $update=$this->edit_model->edit($configs);
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
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
		if ($this->permission->method('trainer', 'delete')->access()) {
			$id= $this->input->post('id');
			$configs = array(
				'tblName' => $this->table_name,
				'where' => array('id'=>$id)
			);
			$this->delete_model->delete($configs);
			echo 'Deleted Successfully';
		}else{
			echo 'You not have any permission to delete this trainer';
		}
	}

	public function getQualification(){
		$id = $this->input->post('id');
		$qualifications = array(
			'tblName'=>$this->qualification,
			'where'=> array(
					'trainer_id'=> $id
				)
		);
		$qualificationdata = $this->select->getResult($qualifications);
		$html = '';
		if(!empty($qualificationdata)){
			foreach($qualificationdata as $q){
				$html .= '<tr>';
				$html .= '<td>'. $q->qualification .'</td>';
				$html .= '<td>'. $q->board_university .'</td>';
				$html .= '<td>'. $q->subject .'</td>';
				$html .= '<td>'. $q->passing_year .'</td>';
				$html .= '<td>'. $q->percentage .'</td>';
				if ($this->permission->method('qualification', 'delete')->access()) {
					$html .= '<td><a class="btn btn-danger delete-qualification-btn" id="'. $q->id .'"><i class="ti-trash"></i></a></td>';
				}
				$html .= '</tr>';
			}
		}
		echo $html;
	}

	public function deleteQualification(){
		if ($this->permission->method('qualification', 'delete')->access()) {
			$id = $this->input->post('id');
			$configs = array(
				'tblName' => $this->qualification,
				'where' => array('id'=>$id)
			);
			$delete = $this->delete_model->delete($configs);
			if($delete){
				$status = 1;
				$msg = 'Data has been deleted successfully';
			}else{
				$status = 0;
				$msg = 'Query error';
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function getworkExprence(){
		$id = $this->input->post('id');
		$exprence = array(
			'tblName'=>$this->work_exprence,
			'where'=> array(
					'trainer_id'=> $id
				)
		);
		$exp = $this->select->getResult($exprence);
		$html = '';
		if(!empty($exp)){
			foreach($exp as $e){
				$html .= '<tr>';
				$html .= '<td>'. $e->name .'</td>';
				$html .= '<td>'. $e->exp_year .' Year '.$e->exp_months.' Months </td>';
				$html .= '<td><img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="'. get_image($e->sertificate).'" data-holder-rendered="true"></td>';
				if ($this->permission->method('experience', 'delete')->access()) {
					$html .= '<td><a class="btn btn-danger delete-exprence-btn" id="'. $e->id .'"><i class="ti-trash"></i></a></td>';
				}
				$html .= '</tr>';
			}
		}
		echo $html;
	}

	public function deleteworkExprence(){
		if ($this->permission->method('experience', 'delete')->access()) {
			$id = $this->input->post('id');
			$configs = array(
				'tblName' => $this->work_exprence,
				'where' => array('id'=>$id)
			);
			$delete = $this->delete_model->delete($configs);
			if($delete){
				$status = 1;
				$msg = 'Data has been deleted successfully';
			}else{
				$status = 0;
				$msg = 'Query error';
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function getachievements(){
		$id = $this->input->post('id');
		$achievements = array(
			'tblName'=>$this->achievements,
			'where'=> array(
					'trainer_id'=> $id
				)
		);
		$achiv = $this->select->getResult($achievements);
		$html = '';
		if(!empty($achiv)){
			foreach($achiv as $a){
				$html .= '<tr>';
				$html .= '<td>'. $a->prize_name .'</td>';
				$html .= '<td>'. $a->competition_name .'</td>';
				$html .= '<td>'. $a->date .'</td>';
				$html .= '<td><img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="'. get_image($a->image).'" data-holder-rendered="true"></td>';
				if ($this->permission->method('achievements', 'delete')->access()) {
				$html .= '<td><a class="btn btn-danger delete-achievements-btn" id="'. $a->id .'"><i class="ti-trash"></i></a></td>';
				}
				$html .= '</tr>';
			}
		}
		echo $html;
	}

	public function deleteachievements(){
		if ($this->permission->method('achievements', 'delete')->access()) {
			$id = $this->input->post('id');
			$configs = array(
				'tblName' => $this->achievements,
				'where' => array('id'=>$id)
			);
			$delete = $this->delete_model->delete($configs);
			if($delete){
				$status = 1;
				$msg = 'Data has been deleted successfully';
			}else{
				$status = 0;
				$msg = 'Query error';
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function getbankaccounts(){
		$id = $this->input->post('id');
		$bank_data = array(
			'tblName'=>$this->bank,
			'where'=> array(
					'trainer_id'=> $id
				)
		);
		$bank = $this->select->getResult($bank_data);
		$html = '';
		if(!empty($bank)){
			foreach($bank as $a){
				$html .= '<tr>';
				$html .= '<td>'. $a->bank_name .'</td>';
				$html .= '<td>'. $a->account_number .'</td>';
				$html .= '<td>'. $a->ifsc_code .'</td>';
				if ($this->permission->method('bank_account', 'delete')->access()) {
				$html .= '<td><a class="btn btn-danger delete-bankaccounts-btn" id="'. $a->id .'"><i class="ti-trash"></i></a></td>';
				}
				$html .= '</tr>';
			}
		}
		echo $html;
	}

	public function deletebankaccounts(){
		if ($this->permission->method('bank_account', 'delete')->access()) {
			$id = $this->input->post('id');
			$configs = array(
				'tblName' => $this->bank,
				'where' => array('id'=>$id)
			);
			$delete = $this->delete_model->delete($configs);
			if($delete){
				$status = 1;
				$msg = 'Data has been deleted successfully';
			}else{
				$status = 0;
				$msg = 'Query error';
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function change_trainer_password(){
		if ($this->permission->method('change_password', 'update')->access()) { 
			$this->load->library('bcrypt');
			$userId = $this->input->post('user_id', true);
			$newPass = $this->input->post('password',true);
			$confirmPass = $this->input->post('confirm_password',true);
			$user_name = $this->input->post('user_name',true);
			$user = $this->auth_model->get_user_by_id($userId);
			$newPassword=$this->bcrypt->hash_password($confirmPass);
			//  
			if (!empty($user)) {
				if($newPass==$confirmPass){
					$this->db->update('users', array('password'=>$newPassword,'username'=>$user_name), array('id' => $userId));
					$status=1;
					$msg='Password has been changed';
					echo json_encode(array('status'=>$status,'msg'=>$msg));
				}else{
					$status=0;
					$msg='Sorry!Confirm password Does Not Match!';    
					echo json_encode(array('status'=>$status,'msg'=>$msg));
				}
			}
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}
}

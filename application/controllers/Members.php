<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->members='members';
		$this->member_category='member_category';
		$this->users='users';
		$this->user_role='user_role';
		$this->transactions='transactions';
		$this->package_master='package_master';
		$this->bodymeasurement='members_bodymeasurement';
		$this->country = 'location_countries';
		$this->state = 'location_states';
		$this->city = 'location_cities';
		$this->view_path='members/';
		$this->file_name = 'profile_picture';
		$this->member_weight_logs = 'member_weight_logs';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('member', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Members';
			$this->load->view('partials/header',$header);
			$data['allitems']=$this->select->select_table($this->members,'member_id','asc');
			$this->load->view($this->view_path.'content',$data);
			$script['pagescript']='contentScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function active_members()
	{
		if ($this->permission->method('member', 'read')->access()) {
			// die;
			$header['pagecss']="contentCss";
			$header['title']='Members';
			$this->load->view('partials/header',$header);
			$item = $this->select->custom_qry("SELECT * FROM `memberships` WHERE start_date <= CURDATE() 
													AND end_date >= CURDATE()
												GROUP BY member_id ASC
											");
			if(!empty($item)){
				$data['allitems'] = $item;
			}else{

				$data['allitems']= [];
			}
			// print_r($data['allitems']); die;
			$this->load->view($this->view_path.'content',$data);
			$script['pagescript']='contentScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function inactive_members()
	{
		if ($this->permission->method('member', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Members';
			$this->load->view('partials/header',$header);
			$item = $this->select->custom_qry("
												SELECT * 
												FROM `memberships` 
												WHERE start_date > CURDATE() 
												OR end_date < CURDATE()
												GROUP BY member_id ASC
											");
			if(!empty($item)){
				$data['allitems'] = $item;
			}else{

				$data['allitems']= [];
			}
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
		if ($this->permission->method('member', 'create')->access()) {
			$id=$this->uri->segment(3);
			if(!empty($id)){
				$inquiry_data = array(
					'tblName'=>'inquiry',
					'where'=> array(
						'id'=>$id
					)
				);
				$dataitems = $this->select->getResult($inquiry_data);
				$data['inquiry_data']= $dataitems[0];
			}
			$header['pagecss']="";
			$header['title']='Add New Member';
			$this->load->view('partials/header',$header);
			
			$genderCon = array(
					'tblName'=>'gender_master',
					'where'=> array(
							'is_visible'=>1
						)
				);
			$data['gender_master']= $this->select->getResult($genderCon);

			$membermastercon = array(
				'tblName'=> $this->member_category,
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['member_categorys']= $this->select->getResult($membermastercon);
			
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
		if ($this->permission->method('member', 'create')->access()) {
			// echo '<pre>';
			// print_r($_POST);die;
	    
	    
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
					"member_category_id"=> $this->input->post('member_category_id', true),
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
					'role'             => get_role_id_byname('Member'),
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
				$member_id = generate_member_id();

				$roledata = array(
					'user_id'         => $user_id,
					'role_id'         => get_role_id_byname('Member'),
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
				$membersdata = array(
					'user_id'              => $user_id,
					'member_id'            => $member_id,
					'shift_id'             => $this->input->post('shift_id', true),
					'medical_history'      => $this->input->post('medical_history', true),
					'date_of_joining'      => $this->currentTime
				);
				$memberconfigs = array(
					'tblName' => $this->members,
					'data' => $membersdata
				);
				$this->insert_model->insert_data($memberconfigs);
				//
					
				if ($this->input->post('package_id', true)) {

					$data=array(
						'member_id'=> $user_id,
						'gst_type'=> $this->input->post('gstType', true),
						'package_id'=> $this->input->post('package_id', true),
						'duration_in_days'=> intval($this->input->post('duration', true)),
						'start_date' => $this->input->post('start_date', true),
						'end_date' => (new DateTime($this->input->post('start_date', true)))->modify('+' . intval($this->input->post('duration', true)) . ' days')->format('Y-m-d'),
						'amount'=> $this->input->post('amount', true),
						'gst_amount'=> $this->input->post('gstAmount', true),
						'payble_amount'=> $this->input->post('payableAmount', true),
						'payment_mode'=> $this->input->post('payment_mode', true),
					);
					$configs = array(
						'tblName' => 'memberships',
						'data' => $data
					);
					$insert=$this->insert_model->insert_data($configs);
					/*
						Transactions Entry
					*/
					$transactionsdata = array(
						'user_id'         => $user_id,
						'gstType'         => $this->input->post('gstType', true),
						'package_id'      => $this->input->post('package_id', true),
						'package_amount'  => $this->input->post('payableAmount', true),
						'gst_amount'      => $this->input->post('gstAmount', true),
						'payableAmount'   => $this->input->post('payableAmount', true),
						'payment_mode'=> $this->input->post('payment_mode', true),
					);
					$trannsconfigs = array(
						'tblName' => $this->transactions,
						'data' => $transactionsdata
					);
					$this->insert_model->insert_data($trannsconfigs);
				}
				//
				
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
		if ($this->permission->method('member_details', 'read')->access()) {
			$id=$this->uri->segment(3);
			// echo $id;die;
			$header['pagecss']="contentCss";
			$header['title']='Members';
			$this->load->view('partials/header',$header);
			$user=$this->auth_model->get_user_by_id($id);
			$data['user']=$user;

			$memberCon = array(
				'tblName'=>$this->members,
				'where'=> array(
						'user_id'=> $id
					)
			);
			$memberResult = $this->select->getResult($memberCon); 
			
			$data['member'] = $memberResult[0];
			
			$trnsCon = array(
				'tblName'=>$this->transactions,
				'where'=> array(
						'user_id'=> $id
					)
			);
			$trnsrResult = $this->select->getResult($trnsCon); 
			//print_r($trnsrResult);
			if(!empty($trnsrResult)){
			$data['trns'] = $trnsrResult[0];
			//get package
			$packageCon = array(
				'tblName'=>$this->package_master,
				'where'=> array(
						'id'=> $trnsrResult[0]->package_id
					)
			);
			$data['packageData']= $this->select->getResult($packageCon);
			}else{
				$data['trns'] = "";
				$data['packageData']= "";
			}

		
			$membermastercon = array(
				'tblName'=> $this->member_category,
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['member_categorys']= $this->select->getResult($membermastercon);
			
			
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


			$memberCon = array(
				'tblName'=>$this->members,
				'where'=> array(
						'user_id'=> $id
					)
			);
			$memberData= $this->select->getResult($memberCon);
			
			
			$data['member'] = $memberData[0];

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

			$paymentModeCon = array(
				'tblName'=>'catagory_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['catagory_masters']= $this->select->getResult($paymentModeCon);
			
			$paymentModeCon = array(
					'tblName'=> $this->bodymeasurement,
					'where'=> array(
							'user_id'=> $id
						)
				);
			$measurement =$this->select->getResult($paymentModeCon);
			if(!empty($measurement)){
			$data['bodymeasurement'] = $measurement[0];
			}else{
			$data['bodymeasurement'] = ""; 
			}
			
			$data['page_head'] = "Member Details";
			$this->load->view($this->view_path.'details/content',$data);
			$script['pagescript']='memberScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}


    /*
    Body Measurement
    */
    public function bodymeasurement(){
        if ($this->permission->method('body_measurement', 'update')->access()) {
			$mesureCon = array(
					'tblName'=> $this->bodymeasurement,
					'where'=> array(
							'user_id'=> $this->input->post('user_id', true)
						)
				);
			$measurement =$this->select->getResult($mesureCon);

			$this->form_validation->set_rules('neck', 'Neck', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					'user_id'=> $this->input->post('user_id', true),
					'dated'=> formated_date($this->input->post('dated', true),'Y-m-d'),
					'neck'=> $this->input->post('neck', true),
					'left_arm'=> $this->input->post('left_arm', true),
					'right_arm'=> $this->input->post('right_arm', true),
					'chest'=> $this->input->post('chest', true),
					'upper_waist'=> $this->input->post('upper_waist', true),
					'lower_waist'=> $this->input->post('lower_waist', true),
					'hips'=> $this->input->post('hips', true),
					'left_thigh'=> $this->input->post('left_thigh', true),
					'right_thigh'=> $this->input->post('right_thigh', true),
					'calf'=> $this->input->post('calf', true),
					'weight'=> $this->input->post('weight', true),
					'height'=> $this->input->post('height', true),
					'shoulders'=> $this->input->post('shoulders', true),
					'body_fat_percentage'=> $this->input->post('body_fat_percentage', true),
					'visceral_fat'=> $this->input->post('visceral_fat', true),
					'subcutaneous_fat'=> $this->input->post('subcutaneous_fat', true),
					'bmi'=> $this->input->post('bmi', true),
					'bmr'=> $this->input->post('bmr', true),
					'muscle_mass_percentage'=> $this->input->post('muscle_mass_percentage', true),
					'remarks'=> $this->input->post('remarks', true),
					'created_at'=> $this->currentTime
				);
				
				if(!empty($measurement)){
					$configs = array(
						'tblName' => $this->bodymeasurement,
						'data' => $data,
						'where' => array('user_id'=>$this->input->post('user_id', true))
					);
					$update=$this->edit_model->edit($configs);
					if($update){
						$status = 1;
						$msg = 'Data has been updated successfully';
					}else{
						$status = 0;
						$msg = 'Query error';
					}
				}else{
					$memberconfigs = array(
						'tblName' => $this->bodymeasurement,
						'data' => $data
					);
					$insert = $this->insert_model->insert_data($memberconfigs);  
					if($insert){
						$status = 1;
						$msg = 'Data has been Inserted successfully';
					}else{
						$status = 0;
						$msg = 'Query error';
					}
				}
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}


    /*
    Basic Info
    */

    public function basicinfo(){
		if ($this->permission->method('basic_information', 'update')->access()) {
			$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$data=array(
					////'user_id'=> $this->input->post('user_id', true),
				//	'dated'=> formated_date($this->input->post('dated', true),'Y-m-d'),
					'status'=> $this->input->post('status', true),
					'first_name'=> $this->input->post('first_name', true),
					'middle_name'=> $this->input->post('middle_name', true),
					'last_name'=> $this->input->post('last_name', true),
					"full_name"=> trim($this->input->post('first_name', true).' '.$this->input->post('middle_name', true).' '.$this->input->post('last_name', true)),
					'gender'=> $this->input->post('gender', true),
					"member_category_id"=> $this->input->post('member_category_id', true),
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
						'shift_id'=> $this->input->post('shift_id', true),
						);
					if(!empty($this->input->post('date_of_leaving', true))){
						$dta['date_of_leaving'] = formated_date($this->input->post('date_of_leaving', true),'Y-m-d');
					}

					$mconfigs = array(
					'tblName' => $this->members,
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
		if ($this->permission->method('contact_details', 'update')->access()) {
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

	public function documentinfo(){
		if ($this->permission->method('documents', 'update')->access()) {
			// print_r($this->input->post()); die;
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



    public function package(){
		if ($this->permission->method('package_details', 'create')->access()) {
			$this->form_validation->set_rules('package_id', 'Package', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				// $transactionsdata = array(
				// 	'user_id'         => $this->input->post('user_id', true),
				// 	'gstType'         => $this->input->post('gstType', true),
				// 	'package_id'      => $this->input->post('package_id', true),
				// 	'package_amount'  => $this->input->post('payableAmount', true),
				// 	'gst_amount'      => $this->input->post('gstAmount', true),
				// 	'payableAmount'   => $this->input->post('payableAmount', true),
				// );
				// 	$trannsconfigs = array(
				// 	'tblName' => $this->transactions,
				// 	'data' => $transactionsdata
				// );
				// $update = $this->insert_model->insert_data($trannsconfigs);



				$data=array(
					'member_id'=> $this->input->post('user_id', true),
					'gst_type'=> $this->input->post('gstType', true),
					'package_id'=> $this->input->post('package_id', true),
					'duration_in_days'=> (int) $this->input->post('duration', true),
					'start_date' => $this->input->post('start_date', true) ?? date('Y-m-d'),
					'end_date' => (new DateTime($this->input->post('start_date', true)))->modify('+' . (int)$this->input->post('duration', true) . ' days')->format('Y-m-d'),
					'amount'=> $this->input->post('amount', true),
					'gst_amount'=> $this->input->post('gstAmount', true),
					'continue_charge_amount'=>0,
					'payble_amount'=> $this->input->post('payableAmount', true),
					'payment_mode'=> $this->input->post('payment_mode', true),
				);
				$configs = array(
					'tblName' => 'memberships',
					'data' => $data
				);
				$insert=$this->insert_model->insert_data($configs);

				$transactionsdata=array(
					'user_id'=> $this->input->post('user_id', true),
					'payment_mode'=> $this->input->post('payment_mode', true),
					'gstType'=> $this->input->post('gstType', true),
					'package_id'=> $this->input->post('package_id', true),
					'payableAmount'=> $this->input->post('payableAmount', true),
					'package_amount' => $this->input->post('amount', true),
					'gst_amount' => $this->input->post('gstAmount', true),
				);
				$configss = array(
					'tblName' => 'transactions',
					'data' => $transactionsdata
				);
				$update=$this->insert_model->insert_data($configss);

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

	public function member_weight_logs(){
		if ($this->permission->method('weight_chart', 'create')->access()) { 
			$this->form_validation->set_rules('user_id', 'User', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$transactionsdata = array(
					'user_id'         => $this->input->post('user_id', true),
					'weight'         => $this->input->post('weight', true),
					'recorded_at'      => $this->input->post('recorded_at', true),
					'remarks'  => $this->input->post('remarks', true),
				);
					$trannsconfigs = array(
					'tblName' => $this->member_weight_logs,
					'data' => $transactionsdata
				);
				$update = $this->insert_model->insert_data($trannsconfigs);
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

	public function get_Weight_logs(){
		if ($this->permission->method('weight_chart', 'read')->access()) { 
			$id = $this->input->post('id');
			$weight = array(
				'tblName'=>$this->member_weight_logs,
				'where'=> array(
						'user_id'=> $id
					)
			);
			$weightdata = $this->select->getResult($weight);
			$html = '';
			if(!empty($weightdata)){
				foreach($weightdata as $q){
					$html .= '<tr>';
					$html .= '<td>'. $q->weight .'</td>';
					$html .= '<td>'. $q->recorded_at .'</td>';
					$html .= '<td>'. $q->remarks .'</td>';
					// $html .= '<td><a class="btn btn-danger" onclick="delete_weight_logs(this.id);" id="'. $q->id .'"><i class="ti-trash"></i></a></td>';
					if ($this->permission->method('weight_chart', 'delete')->access()) { 
						$html .= '<td><a class="btn btn-danger delete-log-btn" id="'. $q->id .'"><i class="ti-trash"></i></a></td>';
					}
					$html .= '</tr>';
				}
			}
			echo $html;
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function delete_weight_log(){
		if ($this->permission->method('weight_chart', 'delete')->access()) { 
			$id = $this->input->post('id');
			$configs = array(
				'tblName' => $this->member_weight_logs,
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
			echo json_encode(array('status'=>$status,'mssg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}



	public function member_diet_logs(){
		if ($this->permission->method('diet_chart', 'create')->access()) { 
			$this->form_validation->set_rules('user_id', 'User', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$transactionsdata = array(
					'user_id'         => $this->input->post('user_id', true),
					'diet_name'         => $this->input->post('diet_name', true),
					'meal_type'      => $this->input->post('meal_type', true),
					'food_items'  => $this->input->post('food_items', true),
					'calories'  => $this->input->post('calories', true),
					'protein'  => $this->input->post('protein', true),
					'carbs'  => $this->input->post('carbs', true),
					'fats'  => $this->input->post('fats', true),
					'dos'  => $this->input->post('dos', true),
					'donts' => $this->input->post('donts', true),
				);
					$trannsconfigs = array(
					'tblName' => 'diet_charts',
					'data' => $transactionsdata
				);
				$update = $this->insert_model->insert_data($trannsconfigs);
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

	public function get_diet_logs(){
		if ($this->permission->method('diet_chart', 'read')->access()) { 
			$id = $this->input->post('id');
			$weight = array(
				'tblName'=>'diet_charts',
				'where'=> array(
						'user_id'=> $id
					)
			);
			$weightdata = $this->select->getResult($weight);
			$html = '';
			if(!empty($weightdata)){
				foreach($weightdata as $q){
					$html .= '<tr>';
					$html .= '<td>'. $q->diet_name .'</td>';
					$html .= '<td>'. $q->meal_type .'</td>';
					$html .= '<td>'. $q->food_items .'</td>';
					$html .= '<td>'. $q->carbs .'</td>';
					$html .= '<td>'. $q->protein .'</td>';
					$html .= '<td>'. $q->fats .'</td>';
					$html .= '<td>'. $q->calories .'</td>';
					// $html .= '<td>'. $q->dos .'</td>';
					// $html .= '<td>'. $q->donts .'</td>';
					$html .= '<td>';
					if (!empty($q->dos)) {
						$html .= '<ul>';
						foreach (explode(',', $q->dos) as $do) {
							$html .= '<li>' . trim($do) . '</li>';
						}
						$html .= '</ul>';
					} else {
						$html .= 'No Do\'s available';
					}
					$html .= '</td>';

					$html .= '<td>';
					if (!empty($q->donts)) {
						$html .= '<ul>';
						foreach (explode(',', $q->donts) as $dont) {
							$html .= '<li>' . trim($dont) . '</li>';
						}
						$html .= '</ul>';
					} else {
						$html .= 'No Don\'ts available';
					}
					$html .= '</td>';


					// $html .= '<td><a class="btn btn-danger" onclick="delete_weight_logs(this.id);" id="'. $q->id .'"><i class="ti-trash"></i></a></td>';
					if ($this->permission->method('diet_chart', 'delete')->access()) { 
						$html .= '<td><a class="btn btn-danger delete-diet-btn" id="'. $q->id .'"><i class="ti-trash"></i></a></td>';
					}
					$html .= '</tr>';
				}
			}
			echo $html;
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Permission Denied'));
		}
	}

	public function delete_diet_log(){
		if ($this->permission->method('diet_chart', 'delete')->access()) { 
			$id = $this->input->post('id');
			$configs = array(
				'tblName' => 'diet_charts',
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
			echo json_encode(array('status'=>$status,'mssg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'mssg'=>'Permission Denied'));
		}
	}




	public function member_workout(){
		if ($this->permission->method('workouts', 'create')->access()) { 
			// print_r($this->input->post()); die;	   
			$this->form_validation->set_rules('user_id', 'User', 'required|xss_clean|max_length[200]');
			if ($this->form_validation->run() == false) {
				$status = 0;
				$msg = validation_errors();
			}else{
				$days = $this->input->post('days', true);
				$workout = $this->input->post('workout', true);
				$weight = $this->input->post('weight', true);
				$sets = $this->input->post('sets', true);
				$reps = $this->input->post('reps', true);
				$rest = $this->input->post('rest', true);
				$description = $this->input->post('description', true);

				foreach ($days as $index => $day) {
					$transactionsdata = array(
						'user_id' => $this->input->post('user_id', true),
						'from_date' => $this->input->post('form_date', true),
						'repeat_days' => $this->input->post('days_repeat', true),
						'day' => $day,
						'workout_id' => $workout[$index],
						'weight' => $weight[$index],
						'sets' => $sets[$index],
						'reps' => $reps[$index],
						'rest' => $rest[$index],
						'description' => $description[$index] ?? null,
					);
					$trannsconfigs = array(
						'tblName' => 'member_workouts',
						'data' => $transactionsdata
					);
					$update = $this->insert_model->insert_data($trannsconfigs);
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
			echo json_encode(array('status'=>0,'mssg'=>'Permission Denied'));
		}
    }

	public function get_member_workouts() {
		if ($this->permission->method('workouts', 'read')->access()) { 
			$id = $this->input->post('id', true);
		
			// Prepare the query configuration
			$workoutsConfig = array(
				'tblName' => 'member_workouts',
				'where' => array(
					'user_id' => $id
				)
			);
		
			// Fetch the data
			$workoutsData = $this->select->getResult($workoutsConfig);
		
			$html = '';
			if (!empty($workoutsData)) {
				$groupedData = [];
				foreach ($workoutsData as $workout) {
					$groupedData[$workout->from_date][] = $workout;
				}

				$html = '';
				foreach ($groupedData as $fromDate => $workouts) {
					$rowspan = count($workouts);
					$firstRow = true;

					foreach ($workouts as $workout) {
						$html .= '<tr>';
						
						if ($firstRow) {
							$html .= '<td rowspan="' . $rowspan . '">' . $workout->from_date . '</td>';
							$html .= '<td rowspan="' . $rowspan . '">' . $workout->repeat_days . '</td>';
							$firstRow = false;
						}

						$html .= '<td>' . $workout->day . '</td>';
						$html .= '<td>' . get_name('catagory_master', $workout->workout_id) . '</td>';
						$html .= '<td>' . $workout->weight . ' Kg</td>';
						$html .= '<td>' . $workout->sets . '</td>';
						$html .= '<td>' . $workout->reps . '</td>';
						$html .= '<td>' . $workout->rest . ' min</td>';
						$html .= '<td>' . (!empty($workout->description) ? $workout->description : 'N/A') . '</td>';
						if ($this->permission->method('workouts', 'delete')->access()) { 
							$html .= '<td><a class="btn btn-danger delete-workout-btn" id="' . $workout->id . '"><i class="ti-trash"></i></a></td>';
						}
						$html .= '</tr>';
					}
				}


			} else {
				$html .= '<tr><td colspan="8" class="text-center">No workout logs found.</td></tr>';
			}
		
			echo $html;
		}else{
			echo json_encode(array('status'=>0,'mssg'=>'Permission Denied'));
		}
	}

	public function delete_member_workouts(){
		if ($this->permission->method('workouts', 'delete')->access()) { 
			$id = $this->input->post('id');
			$configs = array(
				'tblName' => 'member_workouts',
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
			echo json_encode(array('status'=>$status,'mssg'=>$msg));
		}else{
			echo json_encode(array('status'=>0,'mssg'=>'Permission Denied'));
		}
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
				'tblName' => $this->members,
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
		if ($this->permission->method('member', 'delete')->access()) {
			$id= $this->input->post('id');
			$configs = array(
				'tblName' => $this->members,
				'where' => array('id'=>$id)
			);
			$this->delete_model->delete($configs);
			echo 'Deleted Successfully';
		}else{
			echo 'You not have any permission to delete this member';
		}
	}

	public function get_all_package(){
		$id = $this->input->post('id', true);
		
		$inquiry_data = array(
			'tblName'=>'memberships',
			'where'=> array(
				'member_id'=>$id
			)
		);
		$dataitems = $this->select->getResult($inquiry_data);

		$html = '';
		if(!empty($dataitems)){
			foreach($dataitems as $q){
				$user = get_user($q->member_id);
				$package = get_package($q->package_id);
				$html .= '<tr>';
				$html .= '<td>'. $package->name .'</td>';
				$html .= '<td>'. $q->duration_in_days.' Days </td>';
				$html .= '<td>'. $q->payble_amount .'</td>';
				$html .= '<td>'. formated_date($user->created_at) .'</td>';
				$html .= '<td>'. formated_date($q->start_date) .'</td>';
				$html .= '<td>'. formated_date($q->end_date) .'</td>';
				$html .= '</tr>';
			}
		}
		echo $html;
	}

    public function get_package(){
		$id = $this->input->post('package_id', true);
		$inquiry_data = array(
			'tblName'=>'package_master',
			'where'=> array(
				'id'=>$id
			)
		);
		$dataitems = $this->select->getResult($inquiry_data);
		
		$array = array('duration'=> $dataitems[0]->duration,'duration_type'=> $dataitems[0]->duration_type,'amount'=>$dataitems[0]->amount);
		echo json_encode($array);
    }

	public function get_continue_charge(){
		$id = $this->input->post('continue_id', true);
		$inquiry_data = array(
			'tblName'=>'continue_charge',
			'where'=> array(
				'id'=>$id
			)
		);
		$dataitems = $this->select->getResult($inquiry_data);
		
		$array = array('duration'=> $dataitems[0]->duration,'duration_type'=> $dataitems[0]->duration_type,'amount'=>$dataitems[0]->amount);
		echo json_encode($array);	
	}

	public function change_member_password(){
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

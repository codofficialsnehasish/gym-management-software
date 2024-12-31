<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Online_Addmission extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
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

	public function addmission()
	{
        $header['pagecss']="";
        $header['title']='Online Addmission';
        // $this->load->view('partials/header',$header);
        
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

        $data['pagescript']='formScript';
        $this->load->view('online_addmission',$data);
        // $this->load->view('partials/footer',$script);
	}

    public function process()
	{
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
                'created_by'      => 0,
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
	}

}
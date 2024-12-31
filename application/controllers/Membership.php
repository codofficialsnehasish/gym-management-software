<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='memberships';
		$this->view_path='memberships/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('membership', 'read')->access()) {
			$header['pagecss']="contentCss";
			$header['title']='Membership';
			$this->load->view('partials/header',$header);
			// $data['allitems']=$this->select->select_table($this->table_name);
			$data['allitems']=$this->select->custom_qry("SELECT u.id AS user_id, u.*, m.*
														FROM users u
														LEFT JOIN memberships m ON u.id = m.member_id
														WHERE u.role = ".get_role_id_byname('Member')."
														AND (
															m.created_at IS NULL OR 
															m.created_at = (
															SELECT MAX(created_at)
															FROM memberships
															WHERE member_id = u.id
															)
														);");

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
		if ($this->permission->method('membership', 'create')->access()) {
			$header['pagecss']="";
			$header['title']='Add New Membership';
			$this->load->view('partials/header',$header);

			$statusCon = array(
				'tblName'=>'users',
				'where'=> array(
						'role'=>get_role_id_byname('Member')
					)
			);
			$data['members']= $this->select->getResult($statusCon);

			$catagoryCon = array(
				'tblName'=>'package_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['package_master']= $this->select->getResult($catagoryCon);

			$continue_charge = array(
				'tblName'=>'continue_charge',
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['continue_charges']= $this->select->getResult($continue_charge);

			$catagoryCon = array(
				'tblName'=>'payment_mode_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
			$data['payment_mode_master']= $this->select->getResult($catagoryCon);

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
		if ($this->permission->method('membership', 'create')->access()) {
			$this->form_validation->set_rules('member_id', 'Member', 'required');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}else{
				if(!empty($this->input->post('continue_charge_id', true))){
					$continue_id = $this->input->post('continue_charge_id', true);
					$continue_charge = array(
						'tblName'=>'continue_charge',
						'where'=> array(
								'id'=>$continue_id
							)
					);
					$continue_charges = $this->select->getResult($continue_charge);
					// print_r($continue_charges[0]); die;
				}
				$data=array(
					'member_id'=> $this->input->post('member_id', true),
					'gst_type'=> $this->input->post('gstType', true),
					'package_id'=> $this->input->post('package_id', true),
					'continue_charge_id'=>$this->input->post('continue_charge_id', true),
					'duration_in_days'=> (int) $this->input->post('duration', true),
					'start_date' => $this->input->post('start_date', true),
					'end_date' => (new DateTime($this->input->post('start_date', true)))->modify('+' . (int)$this->input->post('duration', true) . ' days')->format('Y-m-d'),
					'amount'=> $this->input->post('amount', true),
					'gst_amount'=> $this->input->post('gstAmount', true),
					'continue_charge_amount'=>0,
					'payble_amount'=> $this->input->post('payableAmount', true),
					'payment_mode'=> $this->input->post('payment_mode', true),
				);
				if(!empty($continue_charges[0])){
					$data['continue_charge_amount'] = $continue_charges[0]->amount;
				}
				$configs = array(
					'tblName' => $this->table_name,
					'data' => $data
				);
				$insert=$this->insert_model->insert_data($configs);

				$transactionsdata=array(
					'user_id'=> $this->input->post('member_id', true),
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
}

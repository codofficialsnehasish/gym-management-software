<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expire_Report extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->view_path='reports/';
	}

    public function index()
	{
        if ($this->permission->method('expiry_report', 'read')->access()) {
            $header['pagecss']="contentCss";
            $header['title']='Expiry Report';
            $this->load->view('partials/header',$header);
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
                                                        )
                                                        AND m.end_date = CURDATE()
                                                            ORDER BY m.end_date DESC;");
            $this->load->view($this->view_path.'expiry_report',$data);
            $script['pagescript']='contentScript';
            $this->load->view('partials/footer',$script);
        }else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

    public function generate_expiry_report(){
        if ($this->permission->method('expiry_report', 'read')->access()) {
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required');
			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
				//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
				redirect($this->agent->referrer());
			}
            $header['pagecss']="contentCss";
            $header['title']='Expiry Report';
            $this->load->view('partials/header',$header);
            $data['start_date'] = $start_date = $this->input->post('start_date', true);
            $data['end_date'] = $end_date = $this->input->post('end_date', true);
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
                                                        )
                                                        AND m.end_date BETWEEN '" . $start_date . "' AND '" . $end_date . "'
                                                            ORDER BY m.end_date DESC;");
            $this->load->view($this->view_path.'expiry_report',$data);
            $script['pagescript']='contentScript';
            $this->load->view('partials/footer',$script);
        }else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
    }
}
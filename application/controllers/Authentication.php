 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends Core_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->isLoggedIn();
		//$this->output->enable_profiler(TRUE);
		// $this->load->library('google');
		// $this->load->library('facebook');
	}

	public function index(){
		$this->load->view('auth/login');
	}
	
    /**
	* Password recovery
	*/

	public function recoverpassword(){
		$this->load->view('auth/recoverpassword');
	}
	

	/**
	*ajax login 
	*/
	public function ajax_login_process(){
		$this->form_validation->set_rules('email', 'eMail', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[30]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		} else {
			if ($this->auth_model->ajaxlogin()) {
		    	$user = $this->auth_model->get_user_by_email_or_username($this->input->post('email'));
				$status=1;
				$msg='Loggedin Successfully';
				//$this->auth_model->update_loginhistory($user->id);
			} else {
				$msg=$this->session->flashdata('error');
				$status=0;
			}
		}
		reset_flash_data();
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}



}
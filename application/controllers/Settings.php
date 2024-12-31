<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->general_setting='general_settings';
		$this->setting='settings';
		$this->view_path='settings/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='General Settings';
			$this->load->view('partials/header',$header);
			$allitems=$this->select->select_table($this->general_setting,'id','asc');
			$allsettings=$this->select->select_table($this->setting,'id','asc');
			$resultArray=array_merge($allitems,$allsettings);
			$data['item']=$resultArray[0];
			$data['site_info']=$resultArray[1];
			$this->load->view($this->view_path.'settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}
	/////////////////////////////
	public function site_info_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->input->post('info_id');
			echo $id;
			$data=array(
				'application_name'=>$this->input->post('application_name', true),
				'site_title'=>$this->input->post('site_title', true),
				'homepage_title'=>$this->input->post('homepage_title', true),
				'keywords'=>$this->input->post('keywords', true),
				'site_description'=>$this->input->post('site_description', true),
				'copyright'=>$this->input->post('copyright', true)
			);
			print_r($data);
			$configs = array(
				'tblName' => $this->setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}

	}

		/////////////////////////////
	public function logo_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			//$id=$this->uri->segment(3);
			$id = $this->input->post('id', true);
			///logo
			if(is_uploaded_file($_FILES['logo']['tmp_name'])) 
			{  
				$data['logo']=$this->mediaupload->doUpload('logo');
			}else{
				$data['logo']=$this->input->post('hdn_logo', true);
			}
			//////logo email
			if(is_uploaded_file($_FILES['logo_email']['tmp_name'])) 
			{  
				$data['logo_email']=$this->mediaupload->doUpload('logo_email');
			}else{
				$data['logo_email']=$this->input->post('hdn_logo_email', true);
			}
			//////favicon
			if(is_uploaded_file($_FILES['favicon']['tmp_name'])) 
			{  
				$data['favicon']=$this->mediaupload->doUpload('favicon');
			}else{
				$data['favicon']=$this->input->post('hdn_favicon', true);
			}

			$configs = array(
				'tblName' => $this->general_setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}

	}

	public function contact(){
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='Contact Info Settings';
			$this->load->view('partials/header',$header);
			$allsettings=$this->select->select_table($this->setting,'id','asc');
			$data['item']=$allsettings[0];
			$this->load->view($this->view_path.'contact_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);	
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	/////////////////////////////
	public function contact_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'contact_email'=>$this->input->post('contact_email', true),
				'contact_email_opt'=>$this->input->post('contact_email_opt', true),			
				'contact_phone'=>$this->input->post('contact_phone', true),
				'contact_phone_opt'=>$this->input->post('contact_phone_opt', true),
				'contact_address'=>$this->input->post('contact_address', true),
				'contact_text'=>$this->input->post('contact_text', true)
			);
			$configs = array(
				'tblName' => $this->setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function social_media(){
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='Social Media Settings';
			$this->load->view('partials/header',$header);
			$allsettings=$this->select->select_table($this->setting,'id','asc');
			$data['item']=$allsettings[0];
			$this->load->view($this->view_path.'social_media_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);	
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}
			
	
	/////////////////////////////
	public function social_media_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'site_url'=>$this->input->post('site_url', true),
				'facebook_url'=>$this->input->post('facebook_url', true),			
				'twitter_url'=>$this->input->post('twitter_url', true),
				'instagram_url'=>$this->input->post('instagram_url', true),
				'pinterest_url'=>$this->input->post('pinterest_url', true),
				'linkedin_url'=>$this->input->post('linkedin_url', true),
				'youtube_url'=>$this->input->post('youtube_url', true),
				'vk_url'=>$this->input->post('vk_url', true),			
				'whatsapp_url'=>$this->input->post('whatsapp_url', true),
				'tumblr_url'=>$this->input->post('tumblr_url', true),
				'flickr_url'=>$this->input->post('flickr_url', true),
				'vimeo_url'=>$this->input->post('vimeo_url', true)

			);
			$configs = array(
				'tblName' => $this->setting,
				'data' => $data,
				'where' => array('id'=>$id)
			);
			$update=$this->edit_model->edit($configs);

			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('error', 'Query error');
					redirect($this->agent->referrer());
			}
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}

	}
	///////////////////////
	public function custom_css(){
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="codeMirror";
			$header['title']='Custom Css Settings';
			$this->load->view('partials/header',$header);
			$allsettings=$this->select->select_table($this->general_setting,'id','asc');
			$data['item']=$allsettings[0];
			$this->load->view($this->view_path.'custom_css_settings',$data);
			$script['pagescript']='';
			$this->load->view('partials/footer',$script);	
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	/////////////////////////////
	public function custom_css_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'custom_css_codes'=>$this->input->post('custom_css_codes', true)
			);
		
			$configs = array(
				'tblName' => $this->general_setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}


	///////////////////////
	public function custom_js(){
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="codeMirror";
			$header['title']='Custom Javascript Settings';
			$this->load->view('partials/header',$header);
			$allsettings=$this->select->select_table($this->general_setting,'id','asc');
			$data['item']=$allsettings[0];
			$this->load->view($this->view_path.'custom_js_settings',$data);
			$script['pagescript']='';
			$this->load->view('partials/footer',$script);	
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	/////////////////////////////
	public function custom_js_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'custom_javascript_codes'=>$this->input->post('custom_javascript_codes', false)
			);
			$configs = array(
				'tblName' => $this->general_setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}

	}

	//////////////////////////
	public function cookie_warning(){
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='Cookie Warning Settings';
			$this->load->view('partials/header',$header);
			$allsettings=$this->select->select_table($this->setting,'id','asc');
			$data['item']=$allsettings[0];
			$this->load->view($this->view_path.'cookie_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);	
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	/////////////////////////////
	public function cookie_warning_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'cookies_warning'=>$this->input->post('cookies_warning', true),
				'cookies_warning_text'=>$this->input->post('cookies_warning_text', true)
			);
			$configs = array(
				'tblName' => $this->setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	//////////////////////////
	public function google_recaptcha(){
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='Google reCAPTCHA Settings';
			$this->load->view('partials/header',$header);
			$allsettings=$this->select->select_table($this->general_setting,'id','asc');
			$data['item']=$allsettings[0];
			$this->load->view($this->view_path.'recaptcha_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);	
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	/////////////////////////////
	public function google_recaptcha_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'recaptcha_site_key'=>$this->input->post('recaptcha_site_key', true),
				'recaptcha_secret_key'=>$this->input->post('recaptcha_secret_key', true),
				'recaptcha_lang'=>$this->input->post('recaptcha_lang', true)
			);
			$configs = array(
				'tblName' => $this->general_setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	//////////////////////////
	public function maintenance_mode(){
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='Google reCAPTCHA Settings';
			$this->load->view('partials/header',$header);
			$allsettings=$this->select->select_table($this->general_setting,'id','asc');
			$data['item']=$allsettings[0];
			$this->load->view($this->view_path.'maintenance_mode_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);	
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}
	
	/////////////////////////////
	public function maintenance_mode_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'maintenance_mode_status'=>$this->input->post('maintenance_mode_status', true),
				'maintenance_mode_title'=>$this->input->post('maintenance_mode_title', true),
				'maintenance_mode_description'=>$this->input->post('maintenance_mode_description', true)
			);
			$configs = array(
				'tblName' => $this->general_setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}
	

	public function email_settings()
	{
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='General Settings';
			$this->load->view('partials/header',$header);
			$allitems=$this->select->select_table($this->general_setting,'id','asc');
			$data['item']=$allitems[0];
			$this->load->view($this->view_path.'email_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}


	////////////////////////////////////////////
	public function email_settings_process(){
		if ($this->permission->method('general_settings', 'update')->access()) {
			$id=$this->uri->segment(3);
			$data=array(
				'mail_library'=>$this->input->post('mail_library', true),
				'mail_protocol'=>$this->input->post('mail_protocol', true),
				'mail_host'=>$this->input->post('mail_host', true),
				'mail_port'=>$this->input->post('mail_port', true),
				'mail_username'=>$this->input->post('mail_username', true),
				'mail_password'=>$this->input->post('mail_password', true),
				'mail_title'=>$this->input->post('mail_title', true)

			);
			$configs = array(
				'tblName' => $this->general_setting,
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
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}

	public function contact_email_settings()
	{
		if ($this->permission->method('general_settings', 'read')->access()) {
			$header['pagecss']="";
			$header['title']='General Settings';
			$this->load->view('partials/header',$header);
			$allitems=$this->select->select_table($this->general_setting,'id','asc');
			$data['item']=$allitems[0];
			$this->load->view($this->view_path.'contact_email_settings',$data);
			$script['pagescript']='formScript';
			$this->load->view('partials/footer',$script);
		}else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
	}
}
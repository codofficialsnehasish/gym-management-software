<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		//$this->output->enable_profiler(TRUE);
		$this->file_name='file';
	}

	public function index()
	{
		$header['pagecss']="mediaCss";
		$header['title']='Category';
		$this->load->view('admin/partials/header',$header);
		$data['allmedia']=$this->select->select_table('media','media_id','desc');
		$this->load->view('admin/media/content',$data);
		$script['pagescript']='mediaScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_images()
	{
		$header['pagecss']="uploadCss";
		$header['title']='Media Library';
		$this->load->view('admin/partials/header',$header);
		$data['allmedia']=$this->select->select_table('media','media_id','desc');
		$this->load->view('admin/media/add',$data);
		$script['pagescript']='uploadScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function getLibrary()
	{
		$allmedia=$this->select->custom_qry("SELECT *, concat(`file_path`,`file_name`) media_img_url FROM `media` order by media_id desc");
		echo json_encode($allmedia);
	}
	public function process(){	
		$this->mediaupload->doUpload($this->file_name);
	}


	//////////28/04/2023
	
	public function getCategoryLibrary()
	{
		$cat_id = $this->input->get('cat_id');
		$allmedia=$this->select->custom_qry("SELECT *, concat(`file_path`,`file_name`) media_img_url FROM `media` where media_id in(select media_id from portfolio where cat_id=".$cat_id.") order by media_id desc");
		echo json_encode($allmedia);
	}

	
	

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound_404 extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		
	//	$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
	    $data[]="";
		$this->load->view('errors/error_404',$data);
	}


}	
?>
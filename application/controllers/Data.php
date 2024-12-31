<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='';
		$this->view_path='data/';
		//$this->output->enable_profiler(TRUE);
        $this->load->library('upload');   
	}

    public function index(){
        if ($this->permission->method('data', 'read')->access()) {
            $header['pagecss']="contentCss";
            $header['title']='Data';
            $this->load->view('partials/header',$header);
            $data['allitems']=[];
            $data['links'] = $this->select->select_table('google_drive_links','id','asc');
            $this->load->view($this->view_path.'content',$data);
            $script['pagescript']='contentScript';
            $this->load->view('partials/footer',$script);
        }else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
    }

    // Handle form submission
    public function process() {
        if ($this->permission->method('data', 'update')->access()) {
            $this->form_validation->set_rules('original_link', 'Google Drive Folder Link', 'required|valid_url');

            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                $original_link = $this->input->post('original_link');

                // Extract folder ID
                if (preg_match('/[-\w]{25,}/', $original_link, $matches)) {
                    $folder_id = $matches[0];

                    $data = [
                        'original_link' => $original_link,
                        'folder_id' => $folder_id
                    ];

                    $link_config = array(
                        'tblName' => 'google_drive_links'
                    );
                    
                    // Check if the table is empty
                    $link_configs = $this->select->getResult($link_config);
                    // print_r($link_configs[0]->id);die;
                    if (empty($link_configs)) {
                        // Insert a new row
                        $configs = array(
                            'tblName' => 'google_drive_links',
                            'data' => $data
                        );
                        $result = $this->insert_model->insert_data($configs);
                    } else {
                        // Update the existing row (assuming you're updating the first row or based on a condition)
                        $configs = array(
                            'tblName' => 'google_drive_links',
                            'data' => $data,
                            'where' => array('id' => $link_configs[0]->id) // Update the first record
                        );
                        $result = $this->edit_model->edit($configs);
                    }
                    
                    $this->session->set_flashdata('success', 'Google Drive link saved successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Invalid Google Drive folder link.');
                }

                redirect($this->agent->referrer());
            }
        }else{
			$this->output->set_status_header(403);
			$this->load->view('errors/error_403');
		}
    }

}
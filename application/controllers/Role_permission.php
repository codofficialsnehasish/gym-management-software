<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_permission extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='role_permission';
		$this->user_role = 'user_role';
		$this->view_path='role_permission/';
		//$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Role';
		$this->load->view('partials/header',$header);
		$data['allroles']=$this->select->select_table('role','id','desc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='roleScript';
		$this->load->view('partials/footer',$script);
	}


	public function asign_role()
	{
		$header['pagecss']="contentCss";
		$header['title']='Role';
		$this->load->view('partials/header',$header);
		$data['allroles']=$this->select->select_table('role','id','desc');
		$data['allusers']=$this->select->select_table('users','id','desc');
		$this->load->view($this->view_path.'asign_role',$data);
		$script['pagescript']='roleScript';
		$this->load->view('partials/footer',$script);
	}

	public function user_role(){
		 foreach($this->input->post('role_id', true) as $role){
			
				$data = array(
					'user_id' => $this->input->post('user_id', true),
					'role_id' => $role,
					'created_by' => $this->auth_user->id,
					'created_at' => $this->currentTime
				);
				
				$configs = array(
					'tblName' => $this->user_role,
					'data' => $data
				);
				$insert=$this->insert_model->insert_data($configs);	
	
		 }
		 if($insert){
			$status = 1;
			$msg = 'Role Asigned successfully';
			//$this->session->set_flashdata('success', 'Role Asigned successfully');
			//redirect($this->agent->referrer());
		}else{
			$status = 0;
			$msg = 'Query error';
			$this->session->set_flashdata('errors', 'Query error');
			// redirect($this->agent->referrer());
		}
		echo json_encode(array('status' => $status,'msg' => $msg));
	}



	public function permission(){
		$role_id= $this->input->post('role_id');
		$deleteconfigs = array(
			'tblName' => $this->table_name,
			'where' => array('role_id'=>$role_id)
		);
		$this->delete_model->delete($deleteconfigs);
		 foreach($this->input->post('module_id', true) as $module){
			
				$data = array(
					'fk_module_id' => $module,
					'role_id' => $role_id
				);
				if(!empty($this->input->post('create'.$module, true))){
					$data['create'] = $this->input->post('create'.$module, true);
				}else{
					$data['create'] = 0;
				}
				if(!empty($this->input->post('read'.$module, true))){
					$data['read'] = $this->input->post('read'.$module, true);
				}else{
					$data['read'] = 0;
				}
				if(!empty($this->input->post('update'.$module, true))){
					$data['update'] = $this->input->post('update'.$module, true);
				}else{
					$data['update'] = 0;
				}
				if(!empty($this->input->post('delete'.$module, true))){
					$data['delete'] = $this->input->post('delete'.$module, true);
				}else{
					$data['delete'] = 0;
				}
				$configs = array(
					'tblName' => $this->table_name,
					'data' => $data
				);
				$insert=$this->insert_model->insert_data($configs);	
		 }
		 if($insert){
			$this->session->set_flashdata('success', 'Role Added Successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
				redirect($this->agent->referrer());
			}

	}


	public function get_permission(){
        $role_id = $this->input->post('role_id', true);
        $this->html_content($role_id, "permissionList");
	}

	
	public function get_user_role(){
        $user_id = $this->input->post('user_id', true);
        $this->html_content_role($user_id, "userRoleList");
	}


 // html content
 private function html_content($role_id, $view)
 {
	if($role_id != 0){
		$moduleConditions=array(
		'tblName' => 'module',
		'where'   => array(
			'is_visible' => 1
		)
		);
	 $data['allmodules'] = $this->select->getResult($moduleConditions);
	 $data['role_id'] = $role_id;
	 $html_content = $this->load->view('role_permission/' . $view, $data, true);
	 $data = array(
		 'result' => 1,
		 'html_content' => $html_content,
	 );
	}else{
		$data = array(
			'result' => 1,
			'html_content' => '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			<strong>Sorry!</strong> No Permission Available. Please Choose Valid Role.
		</div>',
		);
	}
	 echo json_encode($data);
	 reset_flash_data();
 }

// html content
private function html_content_role($user_id, $view)
{
   if($user_id != 0){
	   $conditions=array(
	   'tblName' => 'user_role',
	   'where'   => array(
		   'user_id' => $user_id
	   )
	   );
	$data['allroles'] = $this->select->getResult($conditions);
	$data['user_id'] = $user_id;
	$userName = 'to '.select_value_by_id('users','id',$user_id,'full_name');
	$roleList = $this->select->custom_qry("select * from role where id not in (select role_id from user_role where user_id=".$user_id.")");
	$html_content = $this->load->view('role_permission/' . $view, $data, true);
	$data = array(
		'result' => 1,
		'html_content' => $html_content,
		'roleList' => $roleList,
		'user_name' => $userName
	);
   }else{
	   $data = array(
		   'result' => 1,
		   'html_content' => '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
		   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		   <strong>Sorry!</strong> No Role Asign Yet. Please Choose Valid Role.
	   </div>',
	   );
   }
	echo json_encode($data);
	reset_flash_data();
}


public function user_role_delete(){
	$id= $this->input->post('id');
	$configs = array(
		'tblName' => $this->user_role,
		'where' => array('id'=>$id)
	);
	$this->delete_model->delete($configs);
	echo 'Deleted Successfully';
}

}

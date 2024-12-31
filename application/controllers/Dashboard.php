<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_notLoggedIn();
	//	$this->output->enable_profiler(TRUE);
      $this->load->helper('file');
		
	}

	public function index()
	{
	 	$header['pagecss']="dashboardCss";
		// 	$header['title']='Dashboard';
	 	$this->load->view('partials/header',$header);
		// //	$data['allitems']=$this->select->select_table('payment_details','id','desc',0,10);
		// //	print_r($data['allitems']);die;
	    $data['members_count']=count($this->select->select_table('members'));
		$data['active_members'] = count_active_members();
		$transactions=$this->select->custom_qry("
												SELECT 
												SUM(CASE WHEN DATE(created_at) = CURDATE() THEN payableAmount ELSE 0 END) AS today_earning,
												SUM(CASE WHEN MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE()) THEN payableAmount ELSE 0 END) AS month_earning
												FROM transactions
												");
		$data['transactions']=$transactions[0];
		$data['today_expires'] = $this->select->custom_qry("SELECT count(u.id) as count
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
		$this->load->view('dashboard/dashboard',$data);
		 $script['pagescript']='dashboardScript';
		 $this->load->view('partials/footer',$script);
	}

    public function test(){

        $controllers = get_filenames(APPPATH.'controllers/');
        //print_r($controllers) ;
        echo APPPATH.'controllers/';
        $data = "<?php defined('BASEPATH') OR exit('No direct script access allowed');

        class Doctor extends Core_Controller {}?>";
if ( ! write_file(APPPATH.'controllers/Doctor.php', $data))
{
        echo 'Unable to write the file';
}
else
{
        echo 'File written!';
}
    }
	/**
     * Logout
     */
    public function logout()
    {
        if (!$this->auth_check) {
            redirect(admin_url());
        }
        $this->auth_model->logout();
        redirect($this->agent->referrer());
    }


    // public function update_token(){
    //     $token=$this->input->post('token');
    //     $this->edit_model->edit(array('notification_token'=>$token),2,'id','users');
    //     echo 'success';
    // }
    
    ////////////////////////get state list
	public function get_state_list(){
		//$consumer_type = $this->input->post('consumer_type');
		$conditions['tblName'] = 'location_states';
		$conditions['where'] = array('country_id'=>$this->input->post('country_id'));
		$conditions['is_visible'] = 1;
		$result = $this->select->select->getResult($conditions);
		echo json_encode($result);
	}
	////////////////////////get city list
	public function get_city_list(){
		//$consumer_type = $this->input->post('consumer_type');
		$conditions['tblName'] = 'location_cities';
		$conditions['where'] = array('state_id'=>$this->input->post('state_id'));
		$conditions['is_visible'] = 1;
		$result = $this->select->select->getResult($conditions);
		echo json_encode($result);
	}

}





?>
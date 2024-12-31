<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
//admin url
if (!function_exists('admin_url')) {
    function admin_url($str="")
    {
        return base_url() .$str;
    }
}
//get favicon
if (!function_exists('get_favicon')) {
    function get_favicon()
    {
        $ci =& get_instance();
        return get_image($ci->general_settings->favicon);
    }
}

//get logo
if (!function_exists('get_logo')) {
    function get_logo()
    {
        $ci =& get_instance();
        return get_image($ci->general_settings->logo);
    }
}

//get logo
if (!function_exists('get_email_logo')) {
    function get_email_logo()
    {
        $ci =& get_instance();
        return get_image($ci->general_settings->logo_email);
    }
}

//get user by id
if (!function_exists('get_user')) {
    function get_user($user_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->auth_model->get_user($user_id);
    }
}

//get current user session
if (!function_exists('get_current_user_session')) {
    function get_current_user_session()
    {
        return @get_user_session();
    }
}


 function get_initial($string){
		if ($string == trim($string) && strpos($string, ' ') !== false) {
		$r=explode(' ',$string);
		$rr=array();	
		for($i=0;$i<count($r);$i++){
		$rr[]=substr($r[$i],0,1);
		}
		$abbr=implode('',$rr);
		}else{
		$abbr=substr($string,0,3);
		}
		return strtoupper($abbr);
	}

    //generate token
    if (!function_exists('generate_token')) {
        function generate_token()
        {
            $token = uniqid("", TRUE);
            $token = str_replace(".", "-", $token);
            return $token . "-" . rand(10000000, 99999999);
        }
    }

    //clean number
    if (!function_exists('clean_number')) {
        function clean_number($num)
        {
            $ci =& get_instance();
            $num = trim($num);
            $num = $ci->security->xss_clean($num);
            $num = intval($num);
            return $num;
        }
    }
    //get logged user
    if (!function_exists('user')) {
        function user()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            $user = $ci->auth_model->get_logged_user();
            if (empty($user)) {
                $ci->auth_model->logout();
            } else {
                return $user;
            }
        }
    }

    //check auth
    if (!function_exists('auth_check')) {
        function auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            return $ci->auth_model->is_logged_in();
        }
    }

    //current time
    if (!function_exists('current_time')) {
        function current_time()
        {
            return date('Y-m-d H:i:s');
        }
    }


    //get image by media id
    if (!function_exists('get_image')) {
    function get_image($media_id){
        if($media_id!='' and $media_id!='NULL' and $media_id!=0){
        $ci =& get_instance();
        $conditions['tblName']='media';
        $conditions['where']=array('media_id'=>$media_id,'status'=>1);
        $conditions['limit'] = 1;
        $result=$ci->select->getResult($conditions);
        if(!empty($result)){
            return base_url($result[0]->file_path.$result[0]->file_name);
        }else{
            return base_url('assets/images/no-image.jpg');
        }
        }else{
            return base_url('assets/images/no-image.jpg');
        }
    }
    }

    //get file path by media id
    if (!function_exists('get_filepath')) {
    function get_filepath($media_id){
        if($media_id!='' and $media_id!='NULL' and $media_id!=0){
        $ci =& get_instance();
        $conditions['tblName']='media';
        $conditions['where']=array('media_id'=>$media_id,'status'=>1);
        $conditions['limit'] = 1;
        $result=$ci->select->getResult($conditions);
        return $result[0]->file_path.$result[0]->file_name;
        }else{
            return '';
        }
    }
    }
    



//Include javascript
if (!function_exists('PageSpecScript')) {
    function PageSpecScript($page=""){
	if($page!=''){
		$ci =& get_instance();
		return $ci->load->view('pagescript/'.$page);
		}else{
			return null;
		}
    }
}
//Include css
if (!function_exists('PageSpecCss')) {
    function PageSpecCss($page=""){
	if($page!=''){
	$ci =& get_instance();
	return $ci->load->view('pagecss/'.$page);
	}
	else{
		return null;
	}
    }
}

//remove special characters
if (!function_exists('remove_special_characters')) {
    function remove_special_characters($str, $is_slug = false)
    {
        $str = trim($str);
        $str = str_replace('#', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\'', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('?', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        $str = str_replace('|', '', $str);
        $str = str_replace('~', '', $str);
        if ($is_slug == true) {
            $str = str_replace(" ", '-', $str);
            $str = str_replace("'", '', $str);
        }
        return $str;
    }
}
//select value by field name
if (!function_exists('select_value_by_id')) {
function select_value_by_id($table,$field_id,$id,$value)
{
  if($id!='' and $id!='NULL' and $id!=0){
   $ci =& get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where($field_id,$id);  
   $query = $ci->db->get();
   $result= $query->result();
   if(!empty($result)){
    return $result[0]->$value; 
    }else{
        return '-';
    }
    }else{
        return '-';
    }
}
}

//check uncheck
if (!function_exists('check_uncheck')) {
    function check_uncheck($val1,$val2)
    {
        if($val1==$val2){
            $str='checked';
        }else{
            $str='';
        }
        return $str;
    }
}

//check visibility
if (!function_exists('check_visibility')) {
    function check_visibility($val)
    {
        if($val==1){
            $str='<span class="btn btn-success btn-sm"><i class="fas fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Visible"></i></span>';
        }else{
            $str='<span class="btn btn-danger btn-sm"><i class="fas fa-eye-slash" data-bs-toggle="tooltip" data-bs-placement="top" title="Not Visible"></i></span>';
        }
        return $str;
    }
}

//check visibility
if (!function_exists('check_TrueFlase')) {
    function check_TrueFlase($val)
    {
        if($val==1){
            $str='<span class="btn btn-success btn-sm">True</span>';
        }else{
            $str='<span class="btn btn-warning btn-sm">False</span>';
        }
        return $str;
    }
}
//check custom_radio_button
if (!function_exists('check_custom_radio_button')) {
    function check_custom_radio_button($val1,$val2)
    {
        if($val1==$val2){
            $str='checked';
        }else{
            $str='';
        }
        return $str;
    }
}

//check custom select box
if (!function_exists('check_custom_select_box')) {
    function check_custom_select_box($val1,$val2)
    {
        if($val1==$val2){
            $str='selected';
        }else{
            $str='';
        }
        return $str;
    }
}

//active menu
if (!function_exists('active_menu')) {
    function active_menu($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(1)==$val?'mm-active':'';
    }
}

//active link
if (!function_exists('active_link')) {
    function active_link($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(1)==$val?'active':'';
    }
}

//tab active link
if (!function_exists('tab_active')) {
    function tab_active($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(2)==$val?'active':'';
    }
}

//excerpt
if (!function_exists('excerpt')) {
    function excerpt($str,$limit=4)
    {
       $wordCount = str_word_count($str);
       if($wordCount>4){
       return word_limiter( $str, $limit );
       }else{
           return $str;
       }
    }
}

//print date
if (!function_exists('formated_date')) {
    function formated_date($datetime,$format='jS M, Y')
    {
		$d=date_create($datetime);
		$date= date_format($d,$format);
    	$formatedDate=	str_replace("th","<sup>th</sup>",$date);
        $formatedDate=	str_replace("st","<sup>st</sup>",$date);
        $formatedDate=	str_replace("rd","<sup>rd</sup>",$date);
        $formatedDate=	str_replace("nd","<sup>nd</sup>",$date);
		return $formatedDate;
    }
}

//get image by media id
if (!function_exists('get_custom_field_value')) {
    function get_custom_field_value($page_id,$field_name){
        if(($page_id!='' and $page_id!='NULL' and $page_id!=0)){
        $ci =& get_instance();
        $conditions['tblName']='custom_fields_value';
        $conditions['where']=array('page_id'=>$page_id,'field_name'=>$field_name);
        $conditions['limit'] = 1;
        $result=$ci->select->getResult($conditions);
            if(!empty($result)){
                return $result[0]->field_value;
            }else{
                return ''; 
            }
        }else{
            return '';
        }
      }
    }

    ///////send mail
    if (!function_exists('send_mail')) {
    function send_mail($subject,$to,$template,$userdata,$attachment=""){
        $ci =& get_instance();
        $ci->load->model("email_model");
        return $ci->email_model->send_email_data($subject,$to,$template,$userdata,$attachment);
      
   }
}

//print old form data
if (!function_exists('old')) {
    function old($field)
    {
        $ci =& get_instance();
        if (isset($ci->session->flashdata('form_data')[$field])) {
            return html_escape($ci->session->flashdata('form_data')[$field]);
        }
    }
}

//select value by field name
if (!function_exists('get_id_by_name')) {
    function get_id_by_name($table,$field_name,$field_value,$val)
    {
       $ci =& get_instance();
       $result= $ci->select->custom_qry("select * from ".$table." where ".$field_name."='".$field_value."'");
       if(!empty($result)){
        return $result[0]->$val; 
        }else{
            return '-';
        }
       
    }
    }

//reset flash data
if (!function_exists('reset_flash_data')) {
    function reset_flash_data()
    {
        $ci =& get_instance();
        $ci->session->set_flashdata('errors', "");
        $ci->session->set_flashdata('error', "");
        $ci->session->set_flashdata('success', "");
    }
}

//generate unique id
if (!function_exists('generate_unique_id')) {
    function generate_unique_id()
    {
        $id = uniqid("", TRUE);
        $id = str_replace(".", "-", $id);
        return $id . "-" . rand(10000000, 99999999);
    }
}


if (!function_exists('time_ago')) {
    function time_ago($timestamp)
    {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes = round($seconds / 60);           // value 60 is seconds
        $hours = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks = round($seconds / 604800);          // 7*24*60*60;
        $months = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if ($seconds <= 60) {
            return "Just Now";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "1 " . "minute ago";
            } else {
                return "$minutes " . 'minute ago';
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return "1 " . 'hour ago';
            } else {
                return "$hours " . 'hour ago';
            }
        } else if ($days <= 30) {
            if ($days == 1) {
                return "1 " . 'day ago';
            } else {
                return "$days " . 'days ago';
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return "1 " . 'month ago';
            } else {
                return "$months " . 'months ago';
            }
        } else {
            if ($years == 1) {
                return "1 " . 'year ago';
            } else {
                return "$years " . 'years ago';
            }
        }
    }
}



//get javascript
if (!function_exists('get_custom_javascript')) {
    function get_custom_javascript()
    {
        $ci =& get_instance();
        return htmlspecialchars_decode($ci->general_settings->custom_javascript_codes);
    }
}


//get css
if (!function_exists('get_custom_css')) {
    function get_custom_css()
    {
        $ci =& get_instance();
        return '<style>'.$ci->general_settings->custom_css_codes.'</style>';
    }
}


//get css
if (!function_exists('check_permission')) {
    function check_permission($role_id,$module_id,$fieldName)
    {
        $ci =& get_instance();
        $result= $ci->select->custom_qry("select * from role_permission  where role_id=".$role_id." and fk_module_id=".$module_id);
        if(!empty($result)){
         if($result[0]->$fieldName == 1){
            return "checked";
         }else{
            return "";
         }
         }else{
             return '';
         }
     }
}


 //is admin
 if (!function_exists('is_admin')) {
    function is_admin($user_id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        $result= $ci->select->custom_qry("select role_id from user_role  where user_id=".$user_id." and role_id=1");
        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }

    if (!function_exists('get_user_data')) {
        function get_user_data($user_id)
        {
            $ci =& get_instance();
            $result= $ci->select->custom_qry("select * from users where id=".$user_id."");
            if(!empty($result)){
                return $result[0];
            }
            return array();
        }
    }
    if(!function_exists('get_name')) {
        function get_name($table_name,$id){
            $id = !empty($id) ? $id : 0;
            $ci =& get_instance();
            $result= $ci->select->custom_qry("select name from ".$table_name." where id=".$id."");
            if(!empty($result)){
                return $result[0]->name;
            }else{
                return '';
            }
        }
    }
    
    if (!function_exists('get_last_followup_data')) {
        function get_last_followup_data($inquiry_id)
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            $result= $ci->select->custom_qry("select * from followup where inquiry_id=".$inquiry_id." and is_from_inquiry=1 ORDER BY created_at desc limit 1");
            if(!empty($result)){
                return $result[0];
            }
        }
    }
}

    if (!function_exists('generate_member_id')) {
        function generate_member_id(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT * FROM `member_id_gen`");
            $number =$result[0]->reg_number+1;
            // $ci->edit_model->edit(array('reg_number'=>$number),$result[0]->id,'id','member_id_gen');
            $ci->edit_model->edit(array(
                'where' => array('id' => $result[0]->id), // Conditions
                'data' => array('reg_number' => $number),  // Data to update
                'tblName' => 'member_id_gen'             // Table name
            ));
            return $result[0]->reg_prefix.str_pad($number, 4 , "0", STR_PAD_LEFT);
        }
    } 


    if (!function_exists('generate_trainer_id')) {
        function generate_trainer_id(){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT * FROM `member_id_gen`");
            $number =$result[1]->reg_number+1;
            // $ci->edit_model->edit(array('reg_number'=>$number),$result[0]->id,'id','member_id_gen');
            $ci->edit_model->edit(array(
                'where' => array('id' => $result[1]->id), // Conditions
                'data' => array('reg_number' => $number),  // Data to update
                'tblName' => 'member_id_gen'             // Table name
            ));
            return $result[1]->reg_prefix.str_pad($number, 4 , "0", STR_PAD_LEFT);
        }
    } 

  if (!function_exists('get_role_id_byname')) {
    function get_role_id_byname($roleName){
        $ci =& get_instance();
        $config = array(
			'tblName'=>'role',
			'where'=> array(
					'name'=> $roleName
				)
		);
		$result = $ci->select->getResult($config);
		return !empty($result)?$result[0]->id:0;
    }
}


  if (!function_exists('checkEmpty')) {
    function checkEmpty($val){
       	return !empty($val)?$val:58555;
    }
}
      
 if (!function_exists('get_expiryDate')) {
    function get_expiryDate($date,$pacaage){
    $stop_date = new DateTime($date);
    $stop_date->modify('+'.$pacaage.' day');
    return $stop_date->format('Y-m-d');
    }
 }    


if (!function_exists('get_package')) {
    function get_package($id)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        $package = $ci->select->select_single_data('package_master','id',$id);
        if(!empty($package)){
            return $package[0];
        }else{
            return array();
        }
    }
}

if (!function_exists('days_diff')) {
    function days_diff($start_date, $end_date)
    {
        $start = new DateTime($start_date);
        $end = new DateTime($end_date);
        $today = new DateTime(); // Get today's date

        // If today is greater than the end date, return negative days
        if ($today > $end) {
            $interval = $end->diff($today);
            return -$interval->days;  // Negative value for days after end date
        }

        // Otherwise, return the positive days difference between start and end date
        $interval = $today->diff($end);
        return $interval->days;
    }
}


if (!function_exists('checkSubscriptionStatus')) {
    function checkSubscriptionStatus($start_date, $end_date)
    {
        if(empty($start_date) && empty($end_date)){
            return "Subscription not yet started.";
        }
        try {
            $start = new DateTime($start_date);
            $end = new DateTime($end_date);
            $today = new DateTime();

            // Calculate the difference in days
            $days_left = $today->diff($end)->days;

            // Adjust for past dates
            if ($end < $today) {
                return "Expired";
            } elseif ($today < $start) {
                return "Subscription not yet started.";
            } else {
                return "Active";
            }
        } catch (Exception $e) {
            // Handle invalid date formats
            return "Invalid date format: " . $e->getMessage();
        }
    }

}


    if (!function_exists('get_subscription_status_by_user')) {
        /**
         * Get subscription status based on user ID.
         *
         * @param int $user_id
         * @return int
         *         0 => Inactive
         *         1 => Active
         *         2 => Not Started Yet
         */
        function get_subscription_status_by_user($user_id)
        {
            $CI =& get_instance(); // Get CodeIgniter instance
            $CI->load->database(); // Load database library if not already loaded

            // Fetch the latest membership details for the user
            $query = $CI->db->select('start_date, end_date')
                            ->from('memberships')
                            ->where('member_id', $user_id)
                            ->order_by('end_date', 'DESC') // Assuming latest subscription ends last
                            ->limit(1)
                            ->get();

            if ($query->num_rows() > 0) {
                $membership = $query->row();

                $start_date = $membership->start_date;
                $end_date = $membership->end_date;
                $current_date = date('Y-m-d');

                if ($current_date < $start_date) {
                    return 2; // Not started yet
                } elseif ($current_date >= $start_date && $current_date <= $end_date) {
                    return 1; // Active
                } elseif ($current_date > $end_date) {
                    return 0; // Inactive
                }
            }

            return 2; // No subscription found
        }
    }

    if (!function_exists('subscription_status')) {
        function subscription_status($user_id)
        {
            $CI =& get_instance(); // Get CodeIgniter instance
            $CI->load->database(); // Load database library if not already loaded

            // Fetch the latest membership details for the user
            $query = $CI->db->select('start_date, end_date')
                            ->from('memberships')
                            ->where('member_id', $user_id)
                            ->order_by('end_date', 'DESC') // Assuming latest subscription ends last
                            ->limit(1)
                            ->get();

            if ($query->num_rows() > 0) {
                $membership = $query->row();

                $start_date = $membership->start_date;
                $end_date = $membership->end_date;
                $current_date = date('Y-m-d');

                if ($current_date < $start_date) {
                    return 'Not Started'; // Not started yet
                } elseif ($current_date >= $start_date && $current_date <= $end_date) {
                    return 'Active'; // Active
                } elseif ($current_date > $end_date) {
                    return 'Inactive'; // Inactive
                }
            }

            return 'Not started yet'; // No subscription found
        }
    }

    if (!function_exists('count_active_members')) {
        function count_active_members()
        {
            $CI =& get_instance(); // Get CodeIgniter instance
            $CI->load->database(); // Load database library if not already loaded

            // Current date
            $current_date = date('Y-m-d');

            // Count active members
            $query = $CI->db->select('COUNT(DISTINCT member_id) AS active_members')
                            ->from('memberships')
                            ->where('start_date <=', $current_date)
                            ->where('end_date >=', $current_date)
                            ->get();

            if ($query->num_rows() > 0) {
                return $query->row()->active_members; // Return the count of active members
            }

            return 0; // No active members found
        }
    }




    if (!function_exists('check_booking_avaliable')) {
        function check_booking_avaliable($class_id){
            $ci =& get_instance();
            $result = $ci->select->custom_qry("SELECT * FROM `class_schedules` WHERE `id` = ".$class_id);
            if($result[0]->capacity > $result[0]->booked){
                $booking =$result[0]->booked+1;
                $ci->edit_model->edit(array(
                    'where' => array('id' => $result[0]->id), // Conditions
                    'data' => array('booked' => $booking),  // Data to update
                    'tblName' => 'class_schedules'             // Table name
                ));
                return 1;
            }else{
                return 0;
            }
        }
    } 

    if (!function_exists('generate_google_drive_embed_link')) {
        function generate_google_drive_embed_link($folder_id, $view_type = 'grid') {
            return "https://drive.google.com/embeddedfolderview?id={$folder_id}#{$view_type}";
        }
    }

    if (!function_exists('get_role_by_user_id')){
        function get_role_by_user_id($user_id){
            $query = "SELECT role.name FROM role JOIN user_role ON role.id = user_role.role_id WHERE user_role.user_id = ".$user_id.";";
            $ci =& get_instance();
            $result = $ci->select->custom_qry($query);
            return $result;
        }
    }

    if (!function_exists('has_role')){
        function has_role(array $roles, string $roleName): bool
        {
            foreach ($roles as $role) {
                if (isset($role->name) && $role->name === $roleName) {
                    return true;
                }
            }
            return false;
        }
    }


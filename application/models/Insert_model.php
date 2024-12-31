<?php

class Insert_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
/*
*Insert
*/
 function insert_data($params = array()){
    

    if(array_key_exists("data",$params)){
        $data = $params['data'];
    }
    
    if(array_key_exists("tblName",$params)){
        $this->db->insert($params['tblName'],$data);
        return $this->db->insert_id();  
    }


    } 


}

?>

<?php
class Edit_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    /*
    *Edit
    */
    function edit($params = array()){

        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }

        if(array_key_exists("data",$params)){
            $data = $params['data'];
        }
    
        if(array_key_exists("tblName",$params)){
            return $this->db->update($params['tblName'],$data);
        }

        return true;

    } 


}

?>

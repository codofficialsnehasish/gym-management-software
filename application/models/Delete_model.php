<?php

class Delete_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
 /*
  * Delete
 */   
 public function delete($params = array())
{

        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }

        if(array_key_exists("tblName",$params)){
            return $this->db->delete($params['tblName']);
        }
        
    }

 /*
  * Truncate
 */  
 public function turncate($tableName){
        return $this->db->truncate($tableName);
 }	


}
?>
<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
   class Select extends CI_Model  
   {  
      function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  
      //we will use the select function  
	 public function select_table($table,$orderby="",$order="",$limit="", $offset="1000000")  
      {  
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->order_by($orderby, $order);
		 $query = $this->db->get(); 
		 return $query->result();
      }  
	   function select_single_data($table,$field_id,$id,$orderby="",$order="",$limit="", $offset="10000000")
	  {
         $this->db->select('*');
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->where($field_id,$id);  
		 $query = $this->db->get();
		 return $query->result();
	  }


		
	public function select_distinct_data($field,$table,$orderby="",$order="",$limit="", $offset="")
	  {
         $this->db->distinct();
		 $this->db->select($field);
		 $this->db->from($table);
		 $this->db->limit($offset, $limit);
		 $this->db->order_by($orderby, $order);
		 $query = $this->db->get(); 
		 return $query->result();
	  }
	  
	  public function custom_qry($qry)
	  {
		  $sql=$this->db->query($qry);
		  return $sql->result();
	  }
	//////////////////////////////////////////////////////////////
	function getResult($params = array()){
        $this->db->select('*');
		if(array_key_exists("tblName",$params)){
        $this->db->from($params['tblName']);
		}
		//fetch data by conditions
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
		
		if(array_key_exists("order_by",$params)){
			//$this->db->order_by($params['order_by']);
			$this->db->order_by($params['order_by'],$params['order']);
		}
		
        if(array_key_exists("single",$params)){
            $this->db->where($params['single']);
            $query = $this->db->get();
            $result = $query->result();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result():FALSE;
            }
        }

        //return fetched data
        return $result;
    }



 
public function convert_multi_array($array) {
  $out = implode(",",array_map(function($a) {return implode("~",$a);},$array));
  //print_r($out);
  return $out;
}
}  
?>
<?php
class Moptionsdesc extends MY_Model{
    protected static $table	='tbl_option_description';
	protected static $pid	='option_id';
    public $param2 = array();
    
    
    public function getDataTable(){
      $sTable       = self::$table;
	  $sIndexColumn = 'option_id';
	
        
        $columns = array(
                    	array( 'db' => 'option_id', 'dt' => 0,
                               'formatter' => function( $d, $row ) {
                    		
                                return '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$d.'"/><span></span></label>';
                    		  },
                                 
                              ),
                    	array( 'db' => 'option_name',  'dt' => 1, ),         
                    );
        
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns);
        echo json_encode($result);   
		
    }
    
    
    public function setParamOption($data){
       
        $this->param2 = $data;
    }
    
    public function saveoptionValue($data){
        $table = "tbl_option_value";
        $con = isset($this->param2['where']) ? $this->param2['where'] :"" ;
        if (empty($con)){
            $this->db->insert($table,$data);
            return $this->db->insert_id();
        }else{
            $this->db->where($con);
            $this->db->update($table,$data);
        }
        
        return $this->db->affected_rows();
        
    }
     
    public function saveoptionValueDesc($data){
        $table = "tbl_option_value_description";
        $con = isset($this->param2['where']) ? $this->param2['where'] :"" ;
                        
        if (empty($con)){
            $this->db->insert($table,$data);
        }else{
            $this->db->where($con);
            $this->db->update($table,$data);
        }
        
        return $this->db->affected_rows();
    }
    
    public function loadOption($q){
        $query = "SELECT option_id as id, option_name as text FROM tbl_option_description WHERE option_name LIKE '%".$q."%'";
        $res = $this->db->query($query);
        
        return $res->result(); 
    }
}
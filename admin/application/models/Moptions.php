<?php
class Moptions extends MY_Model{
    protected static $table	='tbl_option';
	protected static $pid	='option_id';	
    
    protected static $table2 ='tbl_option_description'; 
    
    public function getDataTable($tipe='2'){
      $sTable       = self::$table;
	  $sIndexColumn = 'id';
	
        
        $columns = array(
                    	array( 'db' => 'option_id', 'dt' => 0,
                               'formatter' => function( $d, $row ) {
                    		
                                return '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$d.'"/><span></span></label>';
                    		  },
                                 
                              ),
                    	array( 'db' => 'category_name',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                return '<a href="'.site_url('category/view/'.$row["option_id"]).'">'.$d.'</a>';
                    		  }),         
                    );
        
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns);
        echo json_encode($result);   
		
    }
    
    public function getOptionChoose(){
        $res = $this->db->get("tbl_option_choose");
        
        return $res->result();
    }
    
    public function getOptionValue($id){
        $q = "SELECT option_value_id, name FROM tbl_option_value_description WHERE option_id='".$id."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    /* product option*/
    
    public function addProductOption($data){
        
        if ( $this->db->insert('tbl_product_option',$data) ){
            return $this->db->insert_id();
        }
        
        return false;
        
    }
    
    
    public function addProductOptionValue($data,$id=''){
        
        if ($id){
            $this->db->where(array('product_option_value_id'=>$id));
            if ( $this->db->update('tbl_product_option_value',$data) ){
                return true;
            }
        }else{
            if ( $this->db->insert('tbl_product_option_value',$data) ){
                return $this->db->insert_id();
            }
        }
        
        
        return false;
        
    }
    
    public function getProductOptionValue($productId){
        $q ="SELECT product_option_value_id, option_value_id, quantity, subtract, price, price_prefix,
              points,points_prefix,weight FROM tbl_product_option_value WHERE product_id='".$productId."'";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getProduct_option($product_id){
        $q = "SELECT t.product_option_id, t.option_id, od.option_name FROM tbl_product_option t 
              LEFT JOIN tbl_option_description od ON od.option_id = t.option_id WHERE t.product_id='".$product_id."'";
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function deleteOption($product_option_id){
        $q = "DELETE FROM tbl_product_option WHERE product_option_id='".$product_option_id."'";
        $this->db->query($q);
        
        return $this->db->affected_rows();
    }
    public function deleteProductOption($product_option_value_id){
        $q = "DELETE FROM tbl_product_option_value WHERE product_option_value_id='".$product_option_value_id."'";
        $this->db->query($q);
        
        return $this->db->affected_rows();
    }
    
}
<?php
class mproductcategory extends MY_Model{
    protected static $table	='tbl_product_category';
	protected static $pid	='id';	
    
    
    public function getProductCategory($product_id){
        $q = "SELECT t.id,t.category_id, c.category_name FROM ".self::$table." t 
              LEFT JOIN tbl_category c ON c.id = t.category_id  
              WHERE t.product_id='".$product_id."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
}

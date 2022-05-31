<?php
class Morderdetail extends MY_Model{
    protected static $table	='tbl_order_detail';
	protected static $pid	='no_order';	
    
    public function getOrder($order_id){
        $q = "SELECT t.*,ps.post_title, ps.post_description, c.category_name FROM ".self::$table." t
              LEFT JOIN tbl_product p ON p.id = t.product_id 
              LEFT JOIN tbl_post ps ON ps.id = p.post_id
              LEFT JOIN tbl_category c ON c.id = p.category_id 
              WHERE t.order_id='".$order_id."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getOrderFront($noorder){
        $q = "SELECT od.*,ps.post_image_thumbs,ps.post_title FROM ".self::$table." od LEFT JOIN tbl_product p ON p.id = od.product_id
              LEFT JOIN tbl_post ps ON ps.id = p.post_id WHERE od.no_order='".$noorder."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
   
}
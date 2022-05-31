<?php
class Mbannercategory extends MY_Model{
    protected static $table	='tbl_banner_promo_category';
	protected static $pid	='id';	
    
    
    public function getPromoCategory($banner_promo_id){
        $q = "SELECT t.id,t.category_id, c.category_name FROM ".self::$table." t 
              LEFT JOIN tbl_category c ON c.id = t.category_id  
              WHERE t.banner_promo_id='".$banner_promo_id."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
}

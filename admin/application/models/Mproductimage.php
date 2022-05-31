<?php
class Mproductimage extends MY_Model{
    protected static $table	='tbl_product_image';
	protected static $pid	='id';
    
    public function getImages($sku){
        $q = "SELECT * FROM tbl_product_image p WHERE p.product_id='".$sku."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
}
<?php
class Mproductmedia extends MY_Model{
    protected static $table	='tbl_product_media';
	protected static $pid	='id';
    
    public function getMedias($sku){
        $q = "SELECT * FROM tbl_product_media p WHERE p.product_id='".$sku."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
}
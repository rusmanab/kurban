<?php
class Morderhistory extends MY_Model{
    protected static $table	='tbl_order_history';
	protected static $pid	='id';	
    
    public function getOrderDesc($orderId){
        $q = "SELECT t.*,s.nama_status FROM ".self::$table." t 
                LEFT JOIN tbl_status s ON s.id=t.status_id WHERE t.order_id='".$orderId."'";
        $res = $this->db->query($q);
        
        return $res->result();
    }
}
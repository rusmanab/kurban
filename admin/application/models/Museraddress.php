<?php
class Museraddress extends MY_Model{
    protected static $table	='tbl_user_address';
	protected static $pid	='id';	
    
    public function getShipAddress($userId){
        $q = "SELECT * FROM " . self::$table . " t WHERE t.is_default='1' AND t.user_id='".$userId."'";
        
        $res = $this->db->query($q);
        return $res->row();
    }
    
}
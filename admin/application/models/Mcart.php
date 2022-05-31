<?php
class Mcart extends MY_Model{
    protected static $table	='tbl_cart';
	protected static $pid	='id';	
    
    
    public function getListCart($userid){
        $q = "SELECT * FROM tbl_cart WHERE user_id='".$userid."'";
        $res = $this->db->query($q);
        $res = $res->result();
        
        if ($res){
            $return = array(
                    'list'      => $res
                    );
            return $return;
        }
        
        return false;
        
    }
    
    
    public function getTotalItemCart($userid){
        $q = "SELECT sum(qty)as totalitem FROM tbl_cart WHERE user_id='".$userid."'";
        
      
        $res = $this->db->query($q);
        $res = $res->row();
        
        return $res;
    }
    
}
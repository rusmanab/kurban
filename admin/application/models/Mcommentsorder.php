<?php 
class Mcommentsorder extends MY_Model{
    protected static $table	='tbl_comments_order';
	protected static $pid	='id';	 
    
    public function getTread($noorder){
        $q = "SELECT c.*, u.full_name, u.avatar_thumbs FROM tbl_comments_order c
              LEFT JOIN tbl_users u ON u.id = c.user_id
              WHERE no_order='".$noorder."' ORDER BY id ASC";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }  
    
    public function latestComment($userid){
        $q = "SELECT co.*, u.full_name, u.avatar_thumbs  FROM tbl_comments_order co 
              RIGHT JOIN tbl_jobdesc j ON co.no_order=j.no_order 
              RIGHT JOIN tbl_users u ON u.id = co.user_id
              WHERE j.user_id='".$userid."' AND isread=0 AND co.parent_id > 0 LIMIT 10";
        
        $res = $this->db->query($q);
        
        return $res->result();
        
    } 
    
    public function setReadComment($id){
        $q = "UPDATE tbl_comments_order SET isread=1 WHERE id='".$id."'";
        $this->db->query($q);        
    }
     
}
<?php
class Mjobdescimage extends MY_Model{
    protected static $table	='tbl_jobdesc_image';
	protected static $pid	='id';
    
    
    public function getImageDesainer($noorder, $jobdesc_id){
        $q = "SELECT ji.*,  j.no_order FROM tbl_jobdesc j 
              LEFT JOIN tbl_jobdesc_image ji ON ji.jobdesc_id = j.id 
              WHERE j.no_order='".$noorder."' AND jobdesc_id='".$jobdesc_id."'";
              
        $res =  $this->db->query($q);
        
        return $res->result();
    }
}
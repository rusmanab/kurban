<?php
class Muser extends MY_Model{
    protected static $table	='tbl_users';
	protected static $pid	='id';	
    
    public function getDataTable($condition=''){
      $sTable       = self::$table;
	  $sIndexColumn = 'id';
	
        
        $columns = array(
                    	array( 'db' => 'id', 'dt' => 0,
                               'formatter' => function( $d, $row ) {
                    		
                                return '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$d.'"/><span></span></label>';
                    		  },
                                 
                              ),
                    	array( 'db' => 'full_name',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                $name = $d;
                                if (empty($name)){
                                    $name = $row['username']; 
                                }
                                
                                return $name;//'<a href="'.site_url('post/view/'.$row["id"]).'">'.$d.'</a>';
                    		  }),                
                    	array( 'db' => 'level_name',   'dt' => 2, ),
                        array(  'db'=>'status', 'dt'=>3, 
                                'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="badge badge-danger">Inactive</span>';
                                    if ( $d ==1 ){
                                        $status = '<span class="badge badge-success">Active</span>';
                                    }
                                    
                                    return $status;
                                })
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q ="";
        $c = "";
        if ( $condition ){
            
            $q = "SELECT id, full_name, level, status FROM tbl_users WHERE level!='0'";
            $c = 1;
        }
        
        $q = "SELECT u.id, u.full_name, u.status, u.username,l.level_name FROM tbl_users u LEFT JOIN tbl_level l ON l.id=u.level_id";
        
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q, $c);
        echo json_encode($result);   
		
    }
    
    public function getUsersByLevel($level=''){
        $where = '';
        if ( $level ){
            $where = " WHERE level='".$level."'";
        }
        $q = "SELECT * FROM tbl_users".$where;
        
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function activated($userid){
        $q = "UPDATE ".self::$table." SET activated_key='', status='1' WHERE id='".$userid."'";
        
        $res = $this->db->query($q);
        
        return $this->db->affected_rows();
        
    }
    
    public function getDasignerAvailable(){
        $q = "SELECT id as user_id,email,jobdesc_status FROM tbl_users WHERE jobdesc_status < 1 AND level=2 ORDER BY id ASC LIMIT 1";
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function resetUserByEmail($email){
        $q = "SELECT id,email,full_name FROM tbl_users WHERE email='".$email."'";
        
        $res = $this->db->query($q);
        $res = $res->row();
        if ( $res ){
            $uniqId = md5(uniqid());
            $q = "UPDATE tbl_users SET activated_key='".$uniqId."' WHERE id='".$res->id."'";
            $r = $this->db->query($q);
            if ( $this->db->affected_rows()){
                $output = array('data'=>$res,'key'=>$uniqId);
                return $output;
            }
        }
        
        return false;
    }
    
    
    public function login($username,$pass){
        $q = "SELECT id, full_name, avatar_thumbs, is_address_up,username,email,password FROM ".self::$table." 
              WHERE username='".$username."' OR email='".$username."' AND status='1'";
        $res = $this->db->query($q);
        $res = $res->row(0);
        if ( $res ){
            if ( md5($pass) == $res->password ){
                return $res;
            }else{
                return false;
            }
        }
        return false;
    }
}
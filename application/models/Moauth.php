<?php
class Moauth extends CI_Model{
    protected static $pid='id';
	protected static $table='tbl_oauth';
    
    public function saveToken($res, $ismobile="2"){
       
        $ok = true;
        if ($ismobile =="1"){
            $q = "DELETE FROM ".self::$table." WHERE user_id='".$res->id."' AND ismobile='1'";    
            if ( !$this->db->query($q) ){
                //$ok = false;
            }
        }
        
        if ( $ok ){
            
            $token = md5(md5(uniqid()));
            $ip = $this->input->ip_address();
            $data = array(
                        'user_id'       => $res->id,
                        'token'         => $token,
                        'ip'            => $ip,
                        'created_date'  => date('Y-m-d H:i:s'),
                        'ismobile'      => $ismobile,
                        'fcm_key'       => $res->fcmToken
                    );
          
            if ( $this->db->insert(self::$table,$data) ){
                return $token;
            }else{
                return false;
            }    
        }
    }
    
    public function logout($token){
        $q = "DELETE FROM ".self::$table." WHERE token='".$token."'";
        
        if ( $this->db->query($q) ){
            return 1;
        }
        return 0;
    }
    
    public function getInfo($token){
        $q = "SELECT t.user_id, u.* FROM ".self::$table." t ";
        $q.= " LEFT JOIN tbl_users u ON u.id = t.user_id WHERE t.token='".$token."'";
        //var_dump($q);
        
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function getNewToken($source){
        
        $token = md5(md5($source['token']));
        $ip = $this->input->ip_address();
        
        $q = "DELETE FROM ".self::$table." WHERE user_id='".$source['userId']."' AND ismobile='1'";
        if ( $this->db->query($q) ){
            
            
            
            $data = array(
                    'user_id'       => $source['userId'],
                    'token'         => $token,
                    'ip'            => $ip,
                    'created_date'  => date('Y-m-d H:i:s'),
                    'ismobile'      => '1',
                    'fcm_key'       => $source['fcmToken']              
                );
            if ( $this->db->insert(self::$table,$data) ){
                return $token;
            }else{
                return false;
            } 
        }else{
            return false;
        }
       
    }
    
    public function getFcmKeyAM($area){
        $q = "SELECT fcm_key FROM ".self::$table." t ";
        $q.= "LEFT JOIN musers u ON u.id= t.user_id ";
        $q.= "LEFT JOIN tbl_am_level a ON a.user_id=u.id ";
        $q.= "WHERE a.branch_id='".$area."' AND u.level='3'";
        
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getTokenById($userId){
        $qFcm = "SELECT fcm_key FROM tbl_oauth WHERE user_id='".$userId."' AND NOT ISNULL(fcm_key) ORDER BY id DESC LIMIT 1";
        $fcm = $this->db->query($qFcm);
        $fcm = $fcm->row();
        return $fcm;
    }
    
    public function getFcmAllUser(){
        $q = "SELECT fcm_key FROM tbl_oauth o WHERE DATE(o.created_date) = CURRENT_DATE() AND NOT ISNULL(fcm_key)";
        $res = $this->db->query($q);
        $res = $res->result();
        
        return $res;
    }
    
 }
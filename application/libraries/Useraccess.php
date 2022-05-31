<?php
class Useraccess{
    private $_CI;
    private $_MUSER;
    
    public function __construct(){
        $this->_CI = & get_instance();
        
        
        $this->_CI->load->model('mglobal','user');
        
        $this->_MUSER = $this->_CI->user;
    }
    
    public function isLogin(){
        $memid = $this->_CI->session->userdata('f_userid');
        if ($memid){
            return $memid;
        }else{
            $this->_CI->load->helper('cookie');
            $token = $this->_CI->input->cookie('modetoken');
            if ($token){
                $exe = $this->users_model->update_session($token);
                return $exe;                       
            }else{
                return false;
            }
        }
    }
    
    public function Login($username, $password){
        
        /*$param['where'] = array(
                            'username' => $username,
                            'password' => md5($password),
                            'status'   => '1',    
                            );
        $this->_MUSER->setParam($param);*/
        
        $result = $this->_MUSER->userLogin($username,md5($password));
        
        if ($result){
            
            $thename = $result->full_name;
            if (empty($thename)){
                $thename = $result->username;
            }
            
            $avatar = base_url($result->avatar_thumbs);
            if ( !@getimagesize($avatar) ){
                $avatar = base_url('assets/themes/default/layouts/layout/img/avatar3_small.jpg');
            }
            
            $this->_CI->session->set_userdata('f_userid', $result->id);
            $this->_CI->session->set_userdata('f_username', $result->full_name);
            $this->_CI->session->set_userdata('f_avatar', $avatar);
            $this->_CI->session->set_userdata('f_level', $result->level_id);
            
            return true;
        }
        
        return false;
        
    }
    
    public function Logout(){
        $session =array(
                        'f_userid','f_username', 'f_avatar', 'f_level'
                        );
        $this->_CI->session->unset_userdata($session);
    }
    
    public function updateSession($token){
        $this->db->where('token',$token);
        $res = $this->db->get('tbl_lates_login')->result();
        
        if ($res){
            $id = $res[0]->id;
            $this->db->where('id',$id);
            $log = $this->db->get('tbl_users')->result();
            if ($log){
                foreach ($log as $login){
                    $this->_CI->session->set_userdata('f_userid', $result->id);
                    $this->_CI->session->set_userdata('f_username', $result->full_name);
                    $this->_CI->session->set_userdata('f_avatar', $result->avatar_thumbs);
                    $this->_CI->session->set_userdata('f_level', $result->level_id);
                    
                }
                return true;
            }else{
                return false;
            }    
        }        
    }
}
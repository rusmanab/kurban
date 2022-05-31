<?php
class Mjobdesc extends MY_Model{
    protected static $table	='tbl_jobdesc';
	protected static $pid	='id';
    
    
    public function getJobdesc($noorder, $mode=''){
        $where = " t LEFT JOIN tbl_users u ON u.id=t.user_id WHERE t.no_order='".$noorder."' AND t.parent_id=0 AND is_accept='2' ORDER BY t.id DESC LIMIT 1";
        
        if ($mode==2){
            $where = " t LEFT JOIN tbl_users u ON u.id=t.user_id WHERE t.no_order='".$noorder."' AND t.parent_id!=0 AND is_accept='2' ORDER BY t.id DESC LIMIT 1";
        }
        
        $q = "SELECT t.*,u.full_name  FROM ".self::$table.$where;
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getJobdescInfo($noorder, $mode=''){
        $where = " t LEFT JOIN tbl_users u ON u.id=t.user_id WHERE t.no_order='".$noorder."' AND t.parent_id=0 AND t.is_accept!=1";
        
        if ($mode==2){
            $where = " t LEFT JOIN tbl_users u ON u.id=t.user_id WHERE t.no_order='".$noorder."' AND t.parent_id!=0 AND t.is_accept!=1";
        }
        
        $q = "SELECT t.*,u.full_name  FROM ".self::$table.$where;
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    
    public function cekIsAssign($noorder,$mode=1){
        $where = " t LEFT JOIN tbl_users u ON u.id=t.user_id WHERE t.no_order='".$noorder."' AND t.is_accept!=1";
        
        if ($mode==1){
            $where.= " AND t.parent_id = 0";
        }elseif ($mode==2){
            $where.= " AND t.parent_id != 0";
        }
        $where.= " ORDER BY t.id DESC LIMIT 1";
        
        $q = "SELECT t.*,u.full_name FROM ".self::$table.$where;
        
        $res = $this->db->query($q);
        
        if ( $res->row()){
            return $res->row();
        }
        return false;
    }
    
   
    
    public function getTableNew($status, $userid){
        
        $columns = array(
                    	array( 'db' => 'no_order', 'dt' => 0, 'suffix' =>'o',
                               'formatter' => function( $d, $row ) {
                                
                                if ($row['status'] == 0 ){
                                    $dataurl = site_url('mytask/newtask/'.$row["no_order"]);
                                    return '<a class="detail" data-url="'.$dataurl.'" data-toggle>#'.$d.'</a>';
                                }elseif ($row['status'] == 2 ){
                                    return $d;
                                }
                                    
                                
                                
                    		  },
                                 
                              ),
                    	array('db'=>'alamat', 'dt'=>1,'suffix' =>'od'),
                    	array('db'=>'assign_date', 'dt'=>2,'suffix' =>'o',
                             'formatter' => function( $d, $row ){
                                    
                                    $date = new DateTime($d);
                                    return $date->format("M d, Y H:i:s");
                             }),
                        array('db'=>'status', 'dt'=>3,'suffix' =>'o',
                             'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="label label-danger"> New Task</span>';
                                    if ( $d == 1 ){
                                        $status = '<span class="label label-info">Onprogress</span>';
                                    }elseif ($d == 2){
                                        $status = '<span class="label label-success">Finish</span>';
                                    }
                                    return $status;
                             })
                    );
        $q = "SELECT o.no_order,o.status,od.alamat, o.assign_date FROM ".self::$table." o
              LEFT JOIN tbl_orders od ON od.no_order = o.no_order WHERE o.status='".$status."' AND o.user_id='".$userid."'";
        
        
        $result = $this->simple($_GET,self::$table,self::$pid,$columns,$q, "yes" );
        echo json_encode($result); 
        
    }
    
    public function getTablePro($userid){
        
        
        $columns = array(
                    	array( 'db' => 'no_order', 'dt' => 0, 'suffix' =>'o',
                               'formatter' => function( $d, $row ) {
                                
                                
                                    $dataurl = site_url('mytask/detail/'.$row["no_order"]);
                                
                                    return '<a href="'.$dataurl.'" class="detailpro" >#'.$d.'</a>';
                    		  },
                                 
                              ),
                    	array('db'=>'alamat', 'dt'=>1,'suffix' =>'od'),
                    	array('db'=>'assign_date', 'dt'=>2,'suffix' =>'o',
                             'formatter' => function( $d, $row ){
                                    
                                    $date = new DateTime($d);
                                    return $date->format("M d, Y H:i:s");
                             }),
                        array('db'=>'status', 'dt'=>3,'suffix' =>'o',
                             'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="label label-danger"> New Task</span>';
                                    if ( $d == 1 ){
                                        $status = '<span class="label label-info">Onprogress</span>';
                                    }elseif ($d == 2){
                                        $status = '<span class="label label-success">Finish</span>';
                                    }
                                    return $status;
                             })
                    );
        
        $q = "SELECT o.no_order,o.status,od.alamat, o.assign_date FROM ".self::$table." o
             LEFT JOIN tbl_orders od ON od.no_order = o.no_order WHERE o.status='1' AND o.user_id='".$userid."'";
        
        
        $result = $this->simple($_GET,self::$table,self::$pid,$columns,$q, "yes" );
        echo json_encode($result); 
        
    }
    
    
    public function getTablePro2($userid){
        
        $columns = array(
                    	array( 'db' => 'no_order', 'dt' => 0, 'suffix' =>'o',
                               'formatter' => function( $d, $row ) {
                                
                                    if ($row['status'] == 0){
                                        $dataurl = site_url('threadorder/newtask/'.$row["no_order"]);
                                    }else{
                                        $dataurl = site_url('threadorder/read/'.$row["no_order"]);
                                    }
                                    
                                
                                    return '<a href="'.$dataurl.'" >#'.$d.'</a>';
                    		  },
                                 
                              ),
                    	
                    	array('db'=>'assign_date', 'dt'=>1,'suffix' =>'o',
                             'formatter' => function( $d, $row ){
                                    
                                    $date = new DateTime($d);
                                    return $date->format("M d, Y H:i:s");
                             }),
                        array('db'=>'status', 'dt'=>2,'suffix' =>'o',
                             'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="label label-danger"> New Task</span>';
                                    if ( $d == 1 ){
                                        $status = '<span class="label label-info">Onprogress</span>';
                                    }elseif ($d == 2){
                                        $status = '<span class="label label-success">Finish</span>';
                                    }
                                    return $status;
                             })
                    );
        
        $q = "SELECT o.no_order,o.status, o.assign_date FROM ".self::$table." o WHERE o.user_id='".$userid."' AND status !=3";
        $result = $this->simple($_GET,self::$table,self::$pid,$columns,$q, "yes" );
        echo json_encode($result); 
        
    }
    
    
    public function getDescUkur($noorder, $userid=''){
        /*$where = " t LEFT JOIN tbl_users u ON u.id=t.user_id WHERE t.no_order='".$noorder."' AND t.is_accept!=1";
        
        if ($mode==1){
            $where.= " AND t.parent_id = 0";
        }elseif ($mode==2){
            $where.= " AND t.parent_id != 0";
        }
        $where.= " ORDER BY t.id DESC LIMIT 1";
        
        $q = "SELECT t.*,u.full_name FROM ".self::$table.$where;*/
        
        
        $and = "AND parent_id=0";
        if (!empty($userid)){
            $and.= " AND user_id='".$userid."'";
        }
        $q = "SELECT t.*, u.full_name, u.avatar_thumbs FROM ".self::$table." t 
              LEFT JOIN tbl_users u ON u.id = t.user_id
              WHERE no_order='".$noorder."' AND t.is_accept=2 ".$and;
        
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function getDescDesainer($noorder, $userid=''){
        $and = "AND parent_id!=0";
        if (!empty($userid)){
            $and.= " AND user_id='".$userid."' ORDER BY id DESC LIMIT 1";
        }
        $q = "SELECT t.*, u.full_name, u.avatar_thumbs FROM ".self::$table." t 
              LEFT JOIN tbl_users u ON u.id = t.user_id
              WHERE no_order='".$noorder."' ".$and;
        
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function getOrderPerUser($userid){
        $q = "SELECT * FROM ".self::$table." t WHERE t.user_id='".$userid."' AND status=0 ORDER BY id DESC";
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getJobDesc2($noorder,$userid){
        $q = "SELECT * FROM ".self::$table." t WHERE 
              t.no_order='".$noorder."' AND t.user_id='".$userid."' ORDER BY id DESC LIMIT 1";
        $res = $this->db->query($q);
        
        return $res->row();
        
    }
    
    public function JobdesDetail($id){
        $q = "SELECT t.*,u.full_name, u.avatar_thumbs FROM ".self::$table." t 
              LEFT JOIN tbl_users u ON u.id = t.user_id WHERE t.id='".$id."'";
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    
    /* api */
    
    
    /* desainer */
    
    public function listJobdescDesainer($userid,$page){
        
        $res = $this->db->query($q);
        $res = $res->result();
        
        
        $limit = 10; 
        
        if ($page == 0){
            $star = 0;
        }else{
            $star =  ($page - 1) * $limit;
        }
        
        $q2 = "SELECT o.no_order,o.status, o.assign_date FROM ".self::$table." o 
              WHERE o.user_id='".$userid."' AND status !=3";
              
        $res2 = $this->db->query($q2);
        
        $total = $res2->num_rows();
        
        $jumpage = ceil($total / $limit);
        
        $more = false;
        
        if ( $jumpage > $page ){
            $more = true;
        }
        
        $q = "SELECT o.no_order,o.status, o.assign_date FROM ".self::$table." o 
              WHERE o.user_id='".$userid."' AND status !=3 LIMIT ".$star.",".$limit;
              
        $res = $this->db->query($q);
        
        $return = array(
                    'list'      => $res->result(),
                    'paging'    => array(
                                        'currentpage'   => $page,
                                        'more'          => $more
                                        )
                    );
        return $return;
    }
    
}


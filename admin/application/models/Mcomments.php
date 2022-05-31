<?php
class Mcomments extends MY_Model{
    protected static $table	='tbl_comments';
	protected static $pid	='id';	
    
    public function getDataTable($condition=''){
      $sTable       = self::$table;
	  $sIndexColumn = 'id';
	  
        
        $columns = array(
                    	array( 'db' => 'id', 'dt' => 0,),
                    	array( 'db' => 'user_name',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                $return = '<a href="'.site_url('comments/views/'.$row["id"]).'">'.$d.'</a>';
                                
                                return $return;
                    		  }),                
                    	array( 'db' => 'message',   'dt' => 2, 
                                'formatter' => function( $d, $row ){
                                    
                                    $foreword = $row["message"];
                                    
                                    return $foreword;
                                }),
                        array(  'db'=>'status', 'dt'=>3, 
                                'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="label label-danger"> Pending </span>';
                                    if ( $d ==1 ){
                                        $status = '<span class="label label-primary"> Publish </span>';
                                    }
                                    if ( $d ==2 ){
                                        $status = '<span class="label label-primary"> Unpublish </span>';
                                    }
                                    
                                    return $status;
                                }),
                        	array( 'db' => 'created_date', 'dt' => 4,),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q = "SELECT c.id,c.message,c.created_date,c.status, ";
        $q.= "IFNULL((SELECT full_name FROM tbl_users WHERE id=c.user_id),'Anonymous') as user_name ";
        $q.= "FROM tbl_comments c WHERE c.post_id='".$condition."'";
        
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q,"1");
        echo json_encode($result);   
		
    }
    
    public function getDetail($id){
        $q = "SELECT c.*,pr.id as produk_id,IFNULL((SELECT full_name FROM tbl_users WHERE id=c.user_id),'Anonymous') as user_name, p.post_title ";
        $q.= "FROM tbl_comments c LEFT JOIN tbl_post p ON p.id = c.post_id ";
        $q.= "LEFT JOIN tbl_product pr ON pr.post_id=p.id ";
        $q.= "WHERE c.id='".$id."'";
        
        $res = $this->db->query($q);
        return $res->row();
    }
    
}
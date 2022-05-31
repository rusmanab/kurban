<?php
class Mpost extends MY_Model{
    protected static $table	='tbl_post';
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
                    	array( 'db' => 'post_title',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                return '<a href="'.site_url('post/view/'.$row["id"]).'">'.$d.'</a>';
                    		  }),                
                    	array( 'db' => 'post_created_date',   'dt' => 2,
                                'formatter' => function( $d, $row ) {
                    			//return $d;
                                return date( 'd-m-Y', strtotime($d));
                    		  } ),
                        array('db'=>'post_status', 'dt'=>3,
                             'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="label label-warning"> Unpublish </span>';
                                    if ( $d ==1 ){
                                        $status = '<span class="label label-primary"> Publish </span>';
                                    }
                                    
                                    return $status;
                             })
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q ="";
        $c = "";
        if ( $condition ){
            $c = 1;
            $q = "SELECT id, post_title, post_created_date, post_status FROM tbl_post WHERE post_type='".$condition."'";
        }
        
        $c = 1;
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q, $c);
        echo json_encode($result);   
		
    }
    
    public function showPost($star = 0, $limit = 3){
        
        $where = array(
                        'post_type'     => 'post',
                        'post_status'   => '1' ,
                        
                        );
        
        
        $this->db->where($where);
        $this->db->limit($limit,$star);	
        $this->db->order_by('id','DESC');
        
        $query=$this->db->get(static::$table);
        
        return $query->result();       
    }
    
    public function totalRows($post_type='post'){
        $q = "SELECT id FROM ".self::$table." WHERE post_type='".$post_type."'";
        
        $query = $this->db->query($q);
        
        return $query->num_rows(); 
    }
    
    public function readPost($slug){
        $q = "SELECT * FROM ".self::$table." WHERE url_slug='".$slug."'";
        
        $res = $this->db->query($q);
        $res = $res->row();
        if ( $res ){
            
            $query = "UPDATE ".self::$table." SET viewed = viewed + 1 WHERE id='".$res->id."'";
            $this->db->query($query);
            return $res;
        }
        
        return 0;
    }
    
    public function popularPost($excerp=''){ 
        $where = "";
        if ($excerp){
            $where = "AND t.url_slug !='".$excerp."' ";
        }
        $q = "SELECT t.post_title,t.url_slug,t.post_image_thumbs, t.viewed, c.category_name,c.slug FROM ".self::$table." t 
              LEFT JOIN tbl_category c ON c.id = t.category_id WHERE t.post_type='post' AND t.viewed > 0 ".$where."
              ORDER BY t.post_created_date ,t.viewed DESC LIMIT 3";
        $res = $this->db->query($q);
        $res = $res->result();
        
        return $res;
    }
}

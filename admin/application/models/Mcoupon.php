<?php
class Mcoupon extends MY_Model{
    protected static $table	='tbl_coupon';
	protected static $pid	='id';	
    
    public function getDataTable(){
      $sTable       = self::$table;
	  $sIndexColumn = 'id';
	
        
        $columns = array(
                    	array( 'db' => 'id', 'dt' => 0,
                               'formatter' => function( $d, $row ) {
                    		
                                return '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$d.'"/><span></span></label>';
                    		  },
                                 
                              ),
                    	array( 'db' => 'coupon_name',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                return '<a href="'.site_url('coupon/edit/'.$row["id"]).'">'.$d.'</a>';
                    		  }),  
                        array( 'db' => 'code',  'dt' => 2),   
                        array( 'db' => 'isactive',  'dt' => 3, 'formatter' => function( $d, $row ) {
                                $status = "<span class='badge badge-danger'>Disable</span>";
                    		    if ( $row['isactive'] == 1 ){
                    		        $status = "<span class='badge badge-success'>Enable</span>"; 
                    		    }
                                return $status;
                    		  }),            
                    	//array( 'db' => 'category_desc',   'dt' => 2 ),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        //$q = "SELECT * FROM ".self::$table." t WHERE t.category_type='".$tipe."'";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns);
        echo json_encode($result);   
		
    }
    
    public function getCoupon($code){
        $q = "SELECT id,coupon_type,shipping,value FROM ".self::$table." WHERE ( DATE(NOW()) BETWEEN star_date AND end_date) AND code='".$code."' AND isactive=1";
        $res = $this->db->query($q);
        
        $res = $res->row();
        
        return $res;
    }
    
}
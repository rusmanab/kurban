<?php
class Mbanner extends MY_Model{
    protected static $table	='tbl_banner_promo';
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
                        array( 'db' => 'title', 'dt' => 1 ,'formatter' => function( $d, $row ) {
                    		      $image = $row["title"] . '<br/><img src="'.ROOT.$row["thumbs"].'" />';
                                return $image;
                    		  }),
                                 
                    	array( 'db' => 'created_at',   'dt' => 2,
                                'formatter' => function( $d, $row ) {
                    			//return $d;
                                return date( 'd-m-Y', strtotime($d));
                    		  } ),
                       array( 'db' => 'status',   'dt' => 3,
                                'formatter' => function( $d, $row ) {
                    			$status = 'Not Aktive';
                                if ( $row["thumbs"] == '1' ){
                                    $status = 'Aktive';
                                }
                                return $status;
                    		  } ),       
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q = "SELECT id,title,thumbs,created_at,status FROM tbl_banner_promo";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q,"");
        echo json_encode($result);    
		
    }
    
    
}
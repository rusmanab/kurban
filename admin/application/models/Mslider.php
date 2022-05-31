<?php
class Mslider extends MY_Model{
    protected static $table	='tbl_slider';
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
                                if ( $row["status"] == '1' ){
                                    $status = 'Aktive';
                                }
                                return $status;
                    		  } ),
                    );
        
        
        $q = "SELECT id,title,thumbs,created_at,status FROM tbl_slider";
     
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q,"");
        echo json_encode($result);   
		
    }
   
    
}
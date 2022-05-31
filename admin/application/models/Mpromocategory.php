<?php
class Mpromocategory extends MY_Model{
    protected static $table	='tbl_banner_promo_category';
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
                        array( 'db' => 'title', 'dt' => 1 ),
                    	array( 'db' => 'thumbs',  'dt' => 1, 'formatter' => function( $d, $row ) {                   		    
                                return '<img src="'.base_url($row["thumbs"]).'" />';
                    		  }),                
                    	array( 'db' => 'created_at',   'dt' => 2,
                                'formatter' => function( $d, $row ) {
                    			//return $d;
                                return date( 'd-m-Y', strtotime($d));
                    		  } ),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns);
        echo json_encode($result);    
		
    }
    
    
}
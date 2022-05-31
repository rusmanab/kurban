<?php
class Muserlevel extends MY_Model{
    protected static $table	='tbl_level';
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
                        array( 'db' => 'level_name',   'dt' => 1 ),               
                    	array( 'db' => 'create_at',   'dt' => 2 ),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q = "SELECT * FROM ".self::$table." t";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q,"");
        echo json_encode($result);   
		
    }
    
    
}
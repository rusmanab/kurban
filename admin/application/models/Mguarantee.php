<?php
class Mguarantee extends MY_Model{
    protected static $table	='tbl_guarantee';
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
                    	array( 'db' => 'name',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                return '<a href="'.site_url('guarantee/edit/'.$row["id"]).'">'.$d.'</a>';
                    		  }),  
                        array( 'db' => 'tipe_unit',  'dt' => 2),   
                        array( 'db' => 'model',  'dt' => 3),   
                        array( 'db' => 'serial_number',  'dt' => 4),   
                        array( 'db' => 'date_buying',  'dt' => 5),        
                    	//array( 'db' => 'category_desc',   'dt' => 2 ),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        //$q = "SELECT * FROM ".self::$table." t WHERE t.category_type='".$tipe."'";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns);
        echo json_encode($result);   
		
    }
    
    
}
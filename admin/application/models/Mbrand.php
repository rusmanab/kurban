<?php
class Mbrand extends MY_Model{
    protected static $table	='tbl_brand';
	protected static $pid	='id';	
    
    public function getDataTable($tipe='2'){
        $sTable       = self::$table;
        $sIndexColumn = 'id';
	
        
        $columns = array(
                    	array( 'db' => 'id', 'dt' => 0,
                               'formatter' => function( $d, $row ) {
                    		
                                return '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$d.'"/><span></span></label>';
                    		  },
                                 
                              ),
                        array( 'db' => 'image',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    	        $srcImage = base_url("assets/themes/default/no_image.png");
                                if (!empty($row["image"])){
                                    if (file_exists("../" . $row["image"])){
                                       $srcImage = ROOT.$row["image"];
                                    }
                                }
                    		    $data = '<img src="'.$srcImage.'" height="80" />';
                                return $data;
                    		  }), 
                    	array( 'db' => 'brand_name',  'dt' => 2, 'formatter' => function( $d, $row ) {
                    	       
                    		    $data = '<a href="'.site_url('brand/view/'.$row["id"]).'">'.$d.'</a>';
                                return $data;
                    		  }),                
                    	array( 'db' => 'create_at',   'dt' => 3 ),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q = "SELECT id,brand_name,create_at,image FROM ".self::$table." t";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q,"");
        echo json_encode($result);   
		
    }
    
    
}
<?php
class Mkota extends MY_Model{
    protected static $table	='tbl_kota';
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
                    	array( 'db' => 'category_name',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                return '<a href="'.site_url('category/view/'.$row["id"]).'">'.$d.'</a>';
                    		  }),                
                    	array( 'db' => 'create_at',   'dt' => 2,
                                'formatter' => function( $d, $row ) {
                    			//return $d;
                                return date( 'd-m-Y', strtotime($d));
                    		  } ),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns);
        echo json_encode($result);   
		
    }
    
    public function getCities($provinsiId){
        $q = "SELECT * FROM tbl_kota WHERE provinsi_id='".$provinsiId."'";
        
        $res = $this->db->query($q);
        return $res->result();
    }
    
    
}
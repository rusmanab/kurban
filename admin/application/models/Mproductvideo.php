<?php
class Mproductvideo extends MY_Model{
    protected static $table	='tbl_product_video';
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
                    	array( 'db' => 'title',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                return '<a href="'.site_url('brand/view/'.$row["id"]).'">'.$d.'</a>';
                    		  }),                
                    	array( 'db' => 'created_at',   'dt' => 2 ),
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q = "SELECT id,title,created_at FROM ".self::$table." t";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q,"");
        echo json_encode($result);   
    }
    
    public function getVideo($sku){
        $q = "SELECT * FROM tbl_product_video p WHERE p.product_id='".$sku."'" ;
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
}
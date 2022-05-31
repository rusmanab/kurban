<?php
class Mdoku extends MY_Model{
    
    protected static $table	='tbl_doku';
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
                    	array( 'db' => 'client_name',  'dt' => 1, 'formatter' => function( $d, $row ) {
                    		    
                                $return = '<a href="'.site_url('post/view/'.$row["id"]).'">'.$d.'</a> 
                                          <small class="help-block">'.$row["contact_name"].', <strong><i>'.$row["position"].'</i></strong></small>
                                          ';
                                
                                return $return;
                    		  }),                
                    	array( 'db' => 'foreword',   'dt' => 2, 
                                'formatter' => function( $d, $row ){
                                    
                                    $foreword = $row["foreword"];
                                    
                                    return $foreword;
                                }),
                        array(  'db'=>'status', 'dt'=>3, 
                                'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="label label-danger"> Unpublish </span>';
                                    if ( $d ==1 ){
                                        $status = '<span class="label label-primary"> Publish </span>';
                                    }
                                    
                                    return $status;
                                })
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q = "SELECT * FROM tbl_our_clients";
        
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q);
        echo json_encode($result);   
		
    }
    
}
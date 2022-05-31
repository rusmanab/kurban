<?php
class Mcategory extends MY_Model{
    protected static $table	='tbl_category';
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
                    	array( 'db' => 'category_name',   'dt' => 2, 'formatter' => function( $d, $row ) {
                    		    
                    		    $data = '<a href="'.site_url('category/view/'.$row["id"]).'">'.$d.'</a>';
                                
                                return $data;
                    		  } ),
                        array( 'db' => 'create_at',   'dt' => 3 ),
                        
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        $q = "SELECT * FROM ".self::$table." t WHERE t.category_type='".$tipe."'";
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$q,1);
        echo json_encode($result);   
		
    }
    
    public function getCategory($param=0, $isnull='', $subcat=''){
        $q = "SELECT * FROM ". self::$table ." WHERE category_type='".$param."'";
        
        if ($isnull){
            $q.= " AND ISNULL(parent_id)";
        } 
        
        if ( $subcat > 0 ){
            $q.= " AND parent_id='".$subcat."'";
        }
        
        
        $res = $this->db->query($q);
        
        return $res->result();      
    }
    
    public function getTop($type=0){
        $q = "SELECT * FROM ". self::$table ." WHERE category_type='".$type."' AND isparent=1";
       
        $res = $this->db->query($q);
        
        return $res->result(); 
    }
    
    public function getParentDesc($id){
        $q = "SELECT * FROM ".self::$table." WHERE id='".$id."'";
        $res = $this->db->query($q);
        $res = $res->row();
        
        if ( empty($res->categor_desc)){
            return $res->category_name;
        }else{
            return $res->categor_desc;
        }
    }
    public function getCategoryList($type,$isparent=0){
        $q = "SELECT * FROM ". self::$table ." WHERE category_type='".$type."' AND isparent='".$isparent."'";
       
        $res = $this->db->query($q);
        
        return $res->result(); 
    }
    
    /* load */
    
    public function loadCategory($q,$type=1){
        if ($type == 3){
            $cate = "";
        }else{
            $cate = " AND category_type='".$type."'";
        }
        $query = "SELECT id,category_name as text FROM ". self::$table ." WHERE  (category_name LIKE '".$q."%' OR category_desc LIKE '%".$q."%') ".$cate;
        
        $res = $this->db->query($query);
        
        return $res->result(); 
    }
}
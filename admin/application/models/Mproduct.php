<?php
class Mproduct extends MY_Model{
    protected static $table	='tbl_product';
	protected static $pid	='sku';	
    
    public function getDataTable($clothestype=1, $condition=''){
      $sTable       = self::$table;
	  $sIndexColumn = 'sku';
	
        
        $columns = array(
                    	array( 'db' => 'id', 'dt' => 0, 'suffix' =>'t',
                               'formatter' => function( $d, $row ) {
                    		
                                return '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$d.'"/><span></span></label>';
                    		  }),
                        array( 'db' => 'post_image_thumbs',  'dt' => 1, 'suffix' =>'x' ,'formatter' => function( $d, $row ) {
                    		    $srcImage = base_url("assets/themes/default/no_image.png");
                                if (!empty($row["post_image_thumbs"])){
                                    if (file_exists("../" . $row["post_image_thumbs"])){
                                       $srcImage = ROOT.$row["post_image_thumbs"];
                                    }
                                }
                    		    $data = '<img src="'.$srcImage.'" height="80" />';
                                
                                return $data;
                    		  }),
                    	array( 'db' => 'post_title',  'dt' => 2, 'suffix' =>'x' ,'formatter' => function( $d, $row ) {
                    	    
                                $small = $row["category_name"] ; /// $row["sku"] ." ". $ge ." ". $row["category_name"] . " ". $row["sub_category_name"];
                                $slug = $row["category_slug"] ;
                                $category_name = explode(";",$small);
                                $category_slug = explode(";",$slug);      
                                
                                $category = array();
                                for($i=0; $i < count($category_name); $i++){
                                    //$category[]= '<a href="'.site_url('post/view/'.$category_slug[$i]).'">'.$category_name[$i].'</a>';
                                    $category[]= $category_name[$i];
                                }
                                $category_desc = implode(",",$category);
                              
                                return $d . "<small class='help-block'>" . ' [ '. $category_desc .' ]'.'</small>';
                    		  }),                
                    	array( 'db' => 'price',   'dt' => 3, 'suffix' =>'t',
                                'formatter' => function( $d, $row ) {
                    			//return $d;
                                $discount = number_format($row['discount_price']);
                                $price = number_format($d);
                                if ($discount > 0){
                                    
                                    $afterDiskon = $d - $row['discount_price'];
                                    
                                    $price = "<strike>$price</strike><br/>".$afterDiskon;
                                }
                                
                                return $price;
                    		  } ),
                        array('db'=>'post_status', 'dt'=>4,  'suffix' =>'x',
                             'formatter' => function( $d, $row ){
                                    
                                    $status = '<span class="badge badge-danger">Unpublish</span>';
                                    if ( $d ==1 ){
                                        $status = '<span class="badge badge-success">Publish</span>';
                                    }
                                    
                                    return $status;
                             })
                    );
        
        
        //$Joinquery = "SELECT t.id, l.nolp, t.nama, t.create_at FROM ".self::$table." t LEFT JOIN tbl_laporan l ON l.pelapor_id=t.id";
        /*$Joinquery = "SELECT t.id,t.price, t.sku, c.category_name, c.category_desc, p.post_title, p.post_created_date, 
                        p.post_status ,
                        (SELECT discount_price FROM tbl_product_discount WHERE product_id=t.id ORDER BY id DESC LIMIT 1) as discount_price 
                        FROM ".self::$table." t LEFT JOIN tbl_post p ON p.id=t.post_id 
                        LEFT JOIN tbl_category c ON c.id = t.category_id";*/
                        
        $Joinquery = "SELECT t.id,t.price,t.sku, x.post_title,x.post_image_thumbs,x.post_created_date,x.post_status,category.category_name,";
        $Joinquery.= "category.category_slug,(SELECT discount_price FROM tbl_product_discount WHERE product_id = t.id ORDER BY id DESC LIMIT 1 ) AS discount_price "; 
        $Joinquery.= "FROM tbl_product t ";
        $Joinquery.= "LEFT JOIN tbl_post x ON x.id = t.post_id ";
        $Joinquery.= "LEFT JOIN tbl_category c ON c.id = t.category_id ";
        $Joinquery.= "LEFT JOIN (SELECT pc.product_id, GROUP_CONCAT(c.category_name ORDER BY c.id ASC SEPARATOR ';') as category_name,  GROUP_CONCAT(c.slug ORDER BY c.id ASC SEPARATOR ';') as category_slug FROM tbl_product_category pc LEFT JOIN tbl_category c ON c.id = pc.category_id GROUP BY pc.product_id) as category ON category.product_id = t.id";
       
        $result = $this->simple($_GET,$sTable,$sIndexColumn,$columns,$Joinquery);
        echo json_encode($result);   
		
    }
    
    public function getProductOption($productId){
        $q = "SELECT po.*, od.option_name FROM tbl_product_option po 
                LEFT JOIN tbl_option_description od ON od.option_id = po.option_id
                WHERE po.product_id='".$productId."'";
        $result = $this->db->query($q);
        $result = $result->row();
        $response['result']      = false;
        if ($result){
            
            $q2 = "SELECT opv.*,ovd.name FROM tbl_product_option_value opv 
                   LEFT JOIN tbl_option_value_description ovd ON ovd.option_value_id = opv.option_value_id
                   WHERE product_id='".$productId."'";
            $result2 = $this->db->query($q2);
            $result2 = $result2->result();
            
            $response['option']      = $result;
            $response['optionValue'] = $result2; 
            $response['result']      = true;
        }
        
        return $response;
    }
    
    public function getProductSummary($id, $isPost=1){
        
        if ($isPost==1){
            $where = "WHERE p.post_id='".$id."'";
        }elseif ($isPost==2){
            $where = "WHERE p.id='".$id."'";   
        }
        
        $q = "SELECT p.id, p.sku, ps.post_title AS product_name, p.price,
	           pd.discount_persen, ifnull(pd.discount_price,0) as discount_price,(p.price - ifnull(pd.discount_price, 0)) as priceafter_diskon, 
               ps.post_image, ps.post_image_thumbs, ps.meta_title,ps.meta_description, ps.meta_keywords,
               ps.post_description, ps.url_slug FROM tbl_product p 
               LEFT JOIN tbl_post ps ON ps.id = p.post_id 
               LEFT JOIN vproduct_diskon pd ON pd.product_id = p.id ".$where;
          
            
         $result = $this->db->query($q);
        
         return $result->row();
    }
    
    public function getProductDetail($id){
        $q = "SELECT p.*, 
              ps.post_title,ps.post_status, ps.post_description, ps.post_image,ps.meta_title,ps.meta_keywords ,ps.meta_description
               FROM tbl_product p LEFT JOIN tbl_post ps ON ps.id=p.post_id WHERE p.id='".$id."'";
              
        $result = $this->db->query($q);
        
        return $result->row();
    }
    
    public function totalRows($clothes_type=1){
        $q = "SELECT COUNT(sku)as total FROM ".self::$table." WHERE clothes_type='".$clothes_type."'";
        
        $query = $this->db->query($q);
        $query = $query->row();
        
        return $query->total; 
    }
    
    public function getProduct($postId){
        $q = "SELECT p.*,c.category_name, c.category_desc FROM tbl_product p 
              LEFT JOIN tbl_category c ON c.id = p.category_id WHERE p.post_id='".$postId."'";
        
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    
    /*  API */
    
    public function ListProduct($param){
        $where = "WHERE ";
        if (!isset($param['clothes_type'])){
            $where.= "p.clothes_type='2'";
        }else{
            $where.= "p.clothes_type='1'";
        }
        if (isset($param['category'])){
            $where.= " AND p.category_id='".$param['category']."'";
        }
        
        $oder = "ORDER BY p.id ASC";
        if (isset($param['order_by'])){
            $oder.= "";
        }
        
        $limit = 10; 
        $star = 0;
        $page = 1;
        if (isset($param['pages'])){
            if ( $param['pages'] > 0 ){
                $star =  ($param['pages'] - 1) * $limit;    
                $page = $param['pages'];
            }
        }
        
        if (isset($param['limit'])){
            $limit = $param['limit'];
        }
     
        
        $q = "SELECT p.id,p.sku,ps.post_title as product_name,p.price, ps.post_image, ps.post_image_thumbs, ps.post_description
              FROM tbl_product p  
              LEFT JOIN tbl_post ps ON ps.id = p.post_id ".$where;
              
        
        $res2 = $this->db->query($q);
        
        $total = $res2->num_rows();
        
        $jumpage = ceil($total / $limit);
                
        $more = false;
        
        if ( $jumpage > $page ){
            $more = true;
        }
        $LIMIT = " LIMIT ".$star.",".$limit;
        
        $WHERE = $where . " ";
        
        $q2 = "SELECT p.id, p.sku, ps.post_title AS product_name, p.price,
	           pd.discount_persen, pd.discount_price,(p.price - pd.discount_price) as priceafter_diskon, ps.post_image, ps.post_image_thumbs,
               ps.post_description, ps.url_slug FROM tbl_product p 
               LEFT JOIN tbl_post ps ON ps.id = p.post_id 
               LEFT JOIN vproduct_diskon pd ON pd.product_id = p.id ".$WHERE." ".$oder." ".$LIMIT;
       
        //"SELECT discount_persen,discount_price FROM tbl_product_discount pd
            //  WHERE ( DATE(NOW()) BETWEEN star_date AND end_date) AND product_id='".$productId."'  ORDER BY id DESC LIMIT 1";
      
            
        $res = $this->db->query($q2);
        
        $return = array(
                    'list'      => $res->result(),
                    'paging'    => array(
                                        'currentpage'   => $page,
                                        'more'          => $more
                                        )
                    );
        return $return;
    }
    
    public function getProductDetail2($id){
         $q2 = "SELECT p.id, p.sku, ps.post_title AS product_name, p.price,
	           pd.discount_persen, pd.discount_price,(p.price - pd.discount_price) as priceafter_diskon, ps.post_image, ps.post_image_thumbs,
               ps.post_description FROM tbl_product p 
               LEFT JOIN tbl_post ps ON ps.id = p.post_id 
               LEFT JOIN tbl_product_discount pd ON pd.product_id = p.id WHERE p.id='".$id."'";
             
         $res = $this->db->query($q2);
         $res = $res->row();
         
         if ( $res ){
            
            $qImage = "SELECT * FROM tbl_product_image WHERE product_id='".$id."'";
            $res1 = $this->db->query($qImage);
            $imageList = $res1->result();
            
            $isImage = false; 
            if ($imageList){
                $isImage = true;    
            }
            
            $product = array(
                            'product'   => $res,
                            'hasimage'  => $isImage,
                            'listImage' => $imageList    
                            );
            return $product;
         }
         
         return false;
    }
    
    public function getProductPrice($id){
         $q2 = "SELECT p.id, p.sku, ps.post_title AS product_name,  p.price,
	           pd.discount_persen, pd.discount_price,
               (p.price - pd.discount_price) as priceafter_diskon FROM tbl_product p 
               LEFT JOIN tbl_post ps ON ps.id = p.post_id
               LEFT JOIN tbl_product_discount pd ON pd.product_id = p.id WHERE p.id='".$id."'";
             
         $res = $this->db->query($q2);
         $res = $res->row();
         
         
         return $res;
    }
    
    public function listAllProduct(){
        $q = "SELECT p.id, ps.post_title FROM tbl_product p LEFT JOIN tbl_post ps ON ps.id = p.post_id";
        $res = $this->db->query($q);
        $res = $res->result();
        
        return $res;
    }
    
    public function loadProduct($q=''){
        
        $query = "SELECT t.id,p.post_title as text FROM ". self::$table." t ";
        $query.= " LEFT JOIN tbl_post p ON p.id = t.post_id ";
        if (!empty($q)){
            $query.= "WHERE p.post_title LIKE '".$q."%'";
        }
        
        $res = $this->db->query($query);
        
        return $res->result();
    }
    
}
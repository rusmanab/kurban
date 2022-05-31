<?php
class Mwishlist extends MY_Model{
    protected static $table	='tbl_wishlist';
	protected static $pid	='id';	
    
    public function getList($param){
        
        $limit = 10; 
        $star = 0;
        $page = 1;
        if (!isset($param['pages'])){
            if ( $param['pages'] > 0 ){
                $star =  ($param['pages'] - 1) * $limit;    
                $page = $param['pages'];
            }
        }
        
        $q2 = "SELECT t.id, t.product_id, ps.post_title AS product_name, 
              ps.post_image, ps.post_image_thumbs FROM ".self::$table." t 
              LEFT JOIN tbl_product p ON p.id = t.product_id 
              LEFT JOIN tbl_post ps ON ps.id = p.post_id WHERE t.user_id='".$param['user_id']."'";
              
        
        $res2 = $this->db->query($q2);
        
        $total = $res2->num_rows();
        
        $jumpage = ceil($total / $limit);
                
        $more = false;
        
        if ( $jumpage > $page ){
            $more = true;
        }
        $LIMIT = " LIMIT ".$star.",".$limit;
        
        $q2.= $LIMIT;
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
}
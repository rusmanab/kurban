<?php
class Customclothes extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mpost','post');
        $this->load->model('mproduct','clothes');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('custom_clothes');
        $data['subTitle']  =  strtolower( $this->lang->line('list_of').$this->lang->line('custom_clothes') );
        $data['formtitle'] = "";
        $data['icon']      = "list";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                            $data['title'],
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
       
        $regCss = array(
                        base_url('assets/themes/default/global/plugins/datatables/datatables.min.css'),
                        base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/bootbox/bootbox.min.js'),
                        base_url('assets/themes/default/global/plugins/datatables/datatables.min.js'),  
                        base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),                        
                        );
                        
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "global/jslist";
        $this->theme_admin->registerScript($addjs);
       
        $view = 'customclothes/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        //$this->output->enable_profiler(true);
        $this->load->model('mcategory');
        
        $data['title']     = $this->lang->line('custom_clothes');
        $data['subTitle']  = strtolower( $this->lang->line('add') ." " . $this->lang->line('custom_clothes') );
        $data['formtitle'] = $this->lang->line('add') . " " . $this->lang->line('clothes');
        $data['icon']      = "shopping-cart";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'product' ),
                             $this->lang->line('add')
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'), 
                        base_url('assets/themes/default/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'), 
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),                       
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/customclothes/js";
        $this->theme_admin->registerScript($addjs);
        
        $this->load->model('mcategory','category');
        
        $categories = $this->category->getCategoryList(2);
        
        $data['categories'] = $categories;
        $data['clothes']    = '';
        $subcategories      = '';
        $data['subcategories'] = $subcategories;
        
        $view = 'customclothes/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        $this->load->model('mproducdisount','diskon');
        
        $data['title']     = $this->lang->line('custom_clothes');
        $data['subTitle']  = strtolower( $this->lang->line('edit') . " ".  $this->lang->line('custom_clothes') );
        $data['formtitle'] = $this->lang->line('edit') . " " . $this->lang->line('clothes');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'product' ),
                             $this->lang->line('edit')
                             );
                             
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),                       
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/customclothes/js";
        $this->theme_admin->registerScript($addjs);
        
        $data['clothes']    = $this->clothes->getProductDetail($id);
                 
        
        $this->load->model('mcategory','category');        
         $categories = $this->category->getCategoryList(2);    
        $data['categories'] = $categories;
       
        $param['where'] = array(
                            'product_id' => $id
                            );
        $this->diskon->setParam($param);
        $discount = $this->diskon->getData();
        $data['discount'] = $discount;
        
        $view = 'customclothes/form';
        
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
        $this->output->enable_profiler(true);
        
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        
        $post = $_POST;
        
        $imageid        = $this->input->post("imageid", true);
        $image          = $this->input->post("image", true);
        $imagethumbs    = $this->input->post("imagethumbs", true);
        $imageTitle     = $this->input->post("imageTitle", true);
        $count          = count($imageid);
        $date           = Date('Y-m-d H:i:s');
      
        $mypost = $this->post->cleanInput($post);
        
        $this->db->trans_start();
                
        
        $postData   = array(
                                        //'category_id'       => $mypost['category_id'],
                            'post_title'        => $mypost['post_title'],
                            'post_description'  => $mypost['post_description'],
                            'post_status'       => $mypost['post_status'],
                            'meta_title'        => $mypost['meta_title'],
                            'meta_description'  => $mypost['meta_description'],
                            'meta_keywords'     => $mypost['meta_keywords'],
                        );
                        
        $dataProduct = array(
                            'sku'               => $mypost['sku'],
                            'price'             => $mypost['price'],
                            //'gender'            => $mypost['gender'],
                            'category_id'       => $mypost['category_id'],
                            //'sub_category_id'   => $mypost['sub_category_id'],
                            'clothes_type'      => 2,                            
                            //'post_id'           => $mypost['id'],
                           
                            );
        
        $id = $mypost['id'];

        if ($id){
            $param['where'] = array('id'=>$mypost["postid"]);
             $postData['post_modify_date'] = date('Y-m-d H:i:s');
             $this->post->setParam($param);
        }else{
            $postData['post_created_date']  = date('Y-m-d H:i:s');            
            $postData['url_slug']           = $this->post->getSlug($post['post_title'],'url_slug') ;
            $postData['post_type']          = 'product'; 
            $postData['user_id']            = $this->userid;
        }


        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->post->uploadImage("post","userfile",true,220);
                  
                                    
    		$postData['post_image']          = str_replace('../','',$img['image_path']);
            $postData['post_image_thumbs']   = str_replace('../','', $img['thumb_path']);
                
		}
        
      
        
        $this->post->setData($postData);
        $this->post->save();
        
        if (!$id){
            $dataProduct['post_id']     = $this->post->lastInsert();
        }else{
                
            //$dataProduct['post_id']         = $post['id'];
            $param['where']                 = array('id'=>$post["id"]);
            $this->clothes->setParam($param);
        }
            
        $this->clothes->setData($dataProduct);
        $this->clothes->save();
        $productId = $id;
        
        if (!$id){
            $productId = $this->clothes->lastInsert();
        }     
               
        
        $this->load->model('mproducdisount','diskon');
        
        $did             = $post["did"];
        $discount_persen = $post["discount_persen"];
        $discount_price  = $post["discount_price"];
        $star_date       = $post["star_date"];
        $end_date        = $post["end_date"];
        
        $count = count($discount_price);
        
        for($i=0; $i < $count; $i++){
            if ($discount_price[$i] > 0){
                
                $diskon = array(
                            'product_id'        => $productId,
                            'discount_persen'   => $discount_persen[$i],
                            'discount_price'    => $discount_price[$i],
                            'star_date'         => $star_date[$i],
                            'end_date'          => $end_date[$i],
                            'qty'               => 1
                            );
                if ( $did[$i] > 0 ){
                    $where['where'] = array('id'=>$did[$i]);
                    $this->diskon->setParam($where);
                }else{
                    $this->diskon->ClearSelect();
                }
                $this->diskon->setData($diskon);
                $this->diskon->save();         
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );
            $this->db->trans_commit();
        }
        
            
        $this->session->set_flashdata($message);    
        redirect('customclothes');
    }
    
    public function save2(){
        $this->output->enable_profiler(true);
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        
        $post = $_POST;
        
        $mypost = $this->post->cleanInput($post);
        
        $this->db->trans_start();
                
        
        $postData   = array(
                                        //'category_id'       => $mypost['category_id'],
                            'post_title'        => $mypost['post_title'],
                            'post_description'  => $mypost['post_description'],
                            'post_status'       => $mypost['post_status'],
                        );
                        
        $dataProduct = array(
                            'sku'               => $mypost['sku'],
                            'price'             => $mypost['price'],
                            'gender'            => $mypost['gender'],
                            'category_id'       => $mypost['category_id'],
                            'sub_category_id'   => $mypost['sub_category_id'],
                            'clothes_type'      => 2,
                            'meta_title'        => $mypost['meta_title'],
                            'meta_description'  => $mypost['meta_description'],
                            'meta_keywords'     => $mypost['meta_keywords'],
                            'post_id'           => $mypost['id'],
                            );
        
        $id = $mypost['id'];
        $skuold = $mypost['skuold'];
        
        if ($id){
            $param['where'] = array('id'=>$post["id"]);
             $postData['post_modify_date'] = date('Y-m-d H:i:s');
             $this->post->setParam($param);
        }else{
            $postData['post_created_date']  = date('Y-m-d H:i:s');            
            $postData['url_slug']           = $this->post->getSlug($post['post_title'],'url_slug') ;
            $postData['post_type']          = 'product'; 
            $postData['user_id']            = $this->userid;
        }


        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
    		$img    = $this->post->uploadImage("post");
                                    
    		$postData['post_image']          = str_replace('../','',$img['image_path']);
            $postData['post_image_thumbs']   = str_replace('../','', $img['thumb_path']);
                
		}

        $this->post->setData($postData);
        
        $this->post->save();
        
        if (!$id){
            $dataProduct['post_id'] = $this->post->lastInsert();                
        }else{
            $dataProduct['post_id'] = $mypost['id'];
        }
            
        if ($skuold){
            $where['where'] = array(
                                    'sku' => $skuold
                                    );
            $this->clothes->setParam($where);
        }
            
            
        $this->clothes->setData($dataProduct);
        $this->clothes->save();
           
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $message = array('msg_type'=>"success","msg_content"=>$this->lang->line('msg_save') );  
            $this->db->trans_commit();
        }
        
        $this->session->set_flashdata($message);    
        redirect('customclothes');
    }
    
    public function delete(){
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	    $this->db->trans_start();
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i]);
                $this->clothes->setParam($param);
                $post = $this->clothes->getData(true);
                $postId = $post->post_id;
                
                
                $result =$this->clothes->delete();
                if ($result){
                    $postP['where'] = array('id' => $postId );
                    $this->post->setParam($postP);
                    $this->post->delete();
                }
		  }
           $alert ="error";
           $pesan = '<i class="icon-exclamation-sign"> </i> <strong>'.$this->lang->line('msg_undelete').'</strong>';
          if ($this->db->trans_status() === FALSE) {
               
                $this->db->trans_rollback();
          }else{
                $alert ="success";
                $pesan = '<i class="icon-exclamation-sign"> </i> <strong>'.$this->lang->line('msg_delete').'</strong>';
                $this->db->trans_commit();
          }
          
           $output = array(
                        'type'=>$alert,
                        'pesan'=>$pesan
                    );
           echo json_encode($output);	      
		}       
	}
        
   
    public function get_table(){
       
	   $this->clothes->getDataTable(2);
    }
    
    public function getsubcategory(){
        $categoryId = $this->input->post('category_id', true);
        
        $this->load->model('mcategory','category');
        
        $subcategories = $this->category->getCategory(1,'', $categoryId);
        $o = '';
        foreach($subcategories as $s){
            $o.= '<option value="'.$s->id.'">'.$s->category_name.'</option>' . "\r\n";
        }
        
        if ( empty($subcategories) ){
            
        }
        echo json_encode( array('opt'=>$o ));
    }
}
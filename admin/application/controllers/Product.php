<?php
class Product extends MY_Controller{
    
    public $model;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mpost','post');
        $this->load->model('mproduct','product');
    }
    
    public function index(){
        $data['title']     = $this->lang->line('product');
        $data['subTitle']  = $this->lang->line('list_of').$this->lang->line('product');
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
       
        $view = 'product/index';
        $this->theme_admin->display($view,$data);
    }
    
    public function add(){
        //$this->output->enable_profiler(true);
        
        $data['title']     = $this->lang->line('product');
        $data['subTitle']  =  strtolower( $this->lang->line('add') ." " . $this->lang->line('product') );
        $data['formtitle'] = $this->lang->line('add');
        $data['icon']      = "shopping-cart";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'product' ),
                             $this->lang->line('add')
                             );
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                       base_url('assets/themes/default/global/plugins/select2-4.0.3/css/select2.min.css'),
                       base_url('assets/themes/default/global/plugins/select2/css/select2-bootstrap.min.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.css'),

                        );
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),                          
                        base_url('assets/themes/default/global/plugins/plupload/js/plupload.full.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),       
                        base_url('assets/themes/default/global/plugins/select2-4.0.3/js/select2.full.min.js'),                  
                        base_url('assets/themes/default/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js'),
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/product/js";
        $this->theme_admin->registerScript($addjs);
        
        $this->load->model('mcategory','category');
        
        
        $categories = $this->category->getCategory(1,1);
        
        $this->load->model('mbrand','brand');
        $brand = $this->brand->getData();
        $data['brand']     = $brand;
        
        $data['images']     = "";
        $data['categories'] = $categories;
        $data['clothes']    = array();
        $data['medias']     = '';
        
        $this->load->model('mlevel');
        $data['levels']  = $this->mlevel->getData();
        
        $view = 'product/form';
        $this->theme_admin->display($view,$data);
    }
    
    public function edit($id){
        //$this->output->enable_profiler(true);
        $this->load->model('mproductmedia','productmedia');
        $this->load->model('mproductimage','productimage');
        $this->load->model('mproducdisount','diskon');
        $this->load->model('mproductcategory','pc');
        $this->load->model('moptions','option');
        $this->load->model('mlevel');
        
        $data['title']     = $this->lang->line('product');
        $data['subTitle']  = strtolower( $this->lang->line('edit') . " ".  $this->lang->line('product') );
        $data['formtitle'] = $this->lang->line('edit');
        $data['icon']      = "edit";
        
        $breadcrumb = array( array($this->lang->line('home') => '' ),
                             array( $data['title'] => 'product' ),
                             $this->lang->line('edit')
                             );
                             
        $data['breadcrumb'] = breadcrumb($breadcrumb);
        $regCss = array(
                       base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.css'),
                       base_url('assets/themes/default/global/plugins/select2-4.0.3/css/select2.min.css'),
                       base_url('assets/themes/default/global/plugins/select2/css/select2-bootstrap.min.css'),
                       base_url('assets/themes/default/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.css'),
                       base_url('assets/themes/default/global/plugins/datatables/datatables.min.css'),
                       base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),                         
                        );
                        
        $regJs  = array(
                        base_url('assets/themes/default/global/plugins/tinymce/tinymce.min.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),  
                        base_url('assets/themes/default/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),  
                        base_url('assets/themes/default/global/plugins/plupload/js/plupload.full.min.js'), 
                        base_url('assets/themes/default/global/plugins/bootstrap-toastr/toastr.min.js'),      
                        base_url('assets/themes/default/global/plugins/select2-4.0.3/js/select2.full.min.js'),
                        base_url('assets/themes/default/global/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js'),
                        base_url('assets/themes/default/global/plugins/datatables/datatables.min.js'),  
                        base_url('assets/themes/default/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),                
                        );
                         
        $this->theme_admin->registerCsshead($regCss);
        $this->theme_admin->regsiterJsClosing($regJs);
        
        $addjs = "pages/product/js";
        $this->theme_admin->registerScript($addjs);
        
        $data['clothes'] = $this->product->getProductDetail($id);
        $images = $this->productimage->getImages($id);         
        $data['images']  = $images;
        
        $productmedia = $this->productmedia->getMedias($id);
        $data['medias']  = $productmedia;
                      
        $categories = $this->pc->getProductCategory($id);        
        $data['categories'] = $categories;
        
        /*$category_id = $data['clothes']->clothes_category;
       
        $subcategories = $this->category->getCategory(1,'',$category_id);        
        $data['subcategory'] = $subcategories;*/
        
        $param['where'] = array(
                            'product_id' => $id
                            );
        $this->diskon->setParam($param);
        $discount = $this->diskon->getData();
        $data['discount'] = $discount;
        $this->load->model('mbrand','brand');
        $brand = $this->brand->getData();
        $data['brand']     = $brand;
        
        $data['levels']  = $this->mlevel->getData();
        
        // load product option
        $product_option = $this->option->getProduct_option($id);
        if ($product_option){
            $data['prouctoption']       = $product_option;
            $data2['optionval']          = $this->option->getOptionValue($product_option->option_id);
            $data2['productoptionValue'] = $this->option->getProductOptionValue($id);
            
            $data['optionview']         = $this->load->view('pages/product/optionedit',$data2,true);
        }
        
        //$comment = 
        
        $view = 'product/form';
        
        $this->theme_admin->display($view,$data);
    }
    
    public function save(){
       
        //$this->output->enable_profiler(true);
        $this->load->model('mproductimage','productimage');
        $this->load->model('moptions','option');
      
        $message = array('msg_type'=>"error","msg_content"=>$this->lang->line('msg_unsave') );
        
        $post = $_POST;
        
        $imageid        = $this->input->post("imageid", true);
        $image          = $this->input->post("image", true);
        $imagethumbs    = $this->input->post("imagethumbs", true);
        $imageTitle     = $this->input->post("imageTitle", true);
        
        $count = 0;
        if (isset($imageid)){
            $count          = count($imageid);
        }
        
        
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
                            'weight'            => $mypost['weight'],
                            'brand_id'          => $mypost['brand_id'],
                            //'kapasitas_timbang' => $mypost['kapasitas_timbang'],
                            //'range_timbang' => $mypost['range_timbang'],
 
                            //'category_id'       => $mypost['category_id'][0],
                            //'sub_category_id'   => $mypost['sub_category_id'],
                            //'clothes_type'      => 1,                            
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

        $error = false;
        $errdata = "";
        
        if (!empty($_FILES["userfile"]["size"])){
		
    		$this->load->library('upload');
            
    		$img    = $this->post->uploadImage("product","userfile",true,220,0,false);
        
            if ($img["error"]){
                $error = true;
                $errdata = $img["errdata"];
            }else{
                $postData['post_image']          = str_replace('../','',$img['image_path']);
                $postData['post_image_thumbs']   = str_replace('../','', $img['thumb_path']);
            }       
		}
       
        $this->post->setData($postData);
        $this->post->save();
        
        if (!$id){
            $dataProduct['post_id']     = $this->post->lastInsert();
            
            
        }else{
                
            //$dataProduct['post_id']         = $post['id'];
            $param['where']                 = array('id'=>$post["id"]);
            $this->product->setParam($param);
        }
        if (!$error){    
            $this->product->setData($dataProduct);
            $this->product->save();
            $productId = $id;
            $category_Id = $this->input->post("category_id", true);
            $this->load->model('mproductcategory','pc');
            if (!$id){
                $productId = $this->product->lastInsert();
                if ($category_Id){
                    for($i=0; $i < count($category_Id); $i++){
                        $pcategory = array(
                                        'product_id'    => $productId,
                                        'category_id'   => $category_Id[$i]
                                    );
                        
                        $this->pc->setData($pcategory);                
                        $this->pc->save();             
                    }
                }
            }else{
                $where['where'] = array('product_id'=>$productId);
                $this->pc->setParam($where);
                $this->pc->delete();
                $this->pc->ClearSelect();
                if ($category_Id){
                    for($i=0; $i < count($category_Id); $i++){
                        $pcategory = array(
                                        'product_id'    => $productId,
                                        'category_id'   => $category_Id[$i]
                                    );
                        
                        $this->pc->setData($pcategory);                
                        $this->pc->save();             
                    }
                }
            }     
            
            
                   
            for($i=0; $i < $count; $i++){
                    $data = array();
                    $data = array(
                                'product_id'    => $productId,
                                'label'         => $imageTitle[$i],                                
                                'created_at'    => $date,
                                'user_id'       => $this->userid
                                );
                    //
                    if ($imageid[$i]){
                        $where['where'] = array('id'=>$imageid[$i]);
                        $this->productimage->setParam($where);
                    }
                    
                    if (isset($image[$i])){
                        if (!empty($image[$i])){
                            $data['image']        = $image[$i];
                        }else{
                            unset($data['image']);
                        }
                        if (!empty($imagethumbs[$i])){
                            $data['image_thumbs'] = $imagethumbs[$i];
                        }else{
                            unset($data['image_thumbs']);
                        }
                    }
                    
                    
                    $this->productimage->setData($data);
                    $this->productimage->save();
                    $this->productimage->ClearSelect();
                }
            // media
			/*
            $this->load->model('mproductmedia','productmedia');
            
            $mediaid        = $this->input->post("mediaid", true);
            $media          = $this->input->post("media", true);
            $mediaTitle     = $this->input->post("mediaTitle", true);
         
            $countMedia = 0;
            if (isset($media)){
                $countMedia     = count($media);
            }
            
            for($i=0; $i < $countMedia; $i++){
                $data = array();
                $data = array(
                            'product_id'    => $productId,
                            'title'         => $mediaTitle[$i],                                
                            'created_at'    => $date,
                            'user_id'       => $this->userid,
                            'tipe'          => '1',
                            'created_at'    => date('Y-m-d H:i:s')
                            );
                //
                if ($mediaid[$i]){
                    if ($mediaid[$i] > 0){
                        $where['where'] = array('id'=>$mediaid[$i]);
                        $this->productmedia->setParam($where);
                    }
                    
                }
                
                if (isset($media[$i])){
                    if (!empty($media[$i])){
                        $data['path_document']        = $media[$i];
                        $pathinfo = pathinfo($media[$i]);
                        
                        $data['file_ext']        = $pathinfo["extension"];
                        
                    }else{
                        unset($data['path_document']);
                    }
                    
                }
                
                
                $this->productmedia->setData($data);
                $this->productmedia->save();
                $this->productmedia->ClearSelect();
            }
			*/
            // end media
            //exit();
            $this->load->model('mproducdisount','diskon');
            $disId           = $this->input->post("did", true);
            $discount_persen = $this->input->post("discount_persen", true);
            $discount_persen2 = $this->input->post("discount_persen2", true);
            $discount_price  = $this->input->post("discount_price", true);
            $star_date       = $this->input->post("star_date", true);
            $end_date        = $this->input->post("end_date", true);
            $level_id        = $this->input->post("level_id", true);
            
            $count = 0;
            if ($discount_price){
                $count = count($discount_price);    
            }
          
            for($i=0; $i < $count; $i++){
                if ($discount_price[$i] > 0){
                    
                    $this->diskon->ClearParam();
                    if (isset($disId[$i])){
                        if ( $disId[$i] > 0 ){
                            $where['where'] = array('id' => $disId[$i]);
                            $this->diskon->setParam($where);
                        }
                        
                    }
                  
                    $diskon = array(
                                'product_id'        => $productId,
                                'discount_persen'   => $discount_persen[$i],
                                'discount_persen2'   => $discount_persen2[$i],
                                'discount_price'    => $discount_price[$i],
                                'star_date'         => $star_date[$i],
                                'end_date'          => $end_date[$i],
                                'qty'               => 1,
                                'level_id'          => $level_id[$i]
                                );
                   
                    $this->diskon->setData($diskon);
                    $this->diskon->save();         
                }
            }
            
            // option
            
    
            if (isset($mypost['option_id'])){
                $tbl_product_option = array(
                                    'product_id' => $productId,
                                    'option_id'  => $mypost['option_id'],
                                    'value'      => '',
                                    'required'   => $mypost['optionrequired'],
                                    );
                $optionId = $mypost['optionId'];
                if (!$optionId){
                    $optionId = $this->option->addProductOption($tbl_product_option);
                }
            
                if (isset($mypost['product_option_value_id'])){
                    $product_option_value_id = $mypost['product_option_value_id'];
                    
                    $countOption = count($product_option_value_id);
                    
                
                    for ($o=0; $o < $countOption; $o++){
                        $product_option_valueId = $mypost['product_option_value_id'][$o];
                        
                        $tbl_product_option_value = array(
                                            //'product_option_value_id'   => ,
                                            'product_option_id'         => $optionId,
                                            'product_id'                => $productId,
                                            'option_id'                 => $mypost['option_id'],
                                            'option_value_id'           => $mypost['option_value_id'][$o],
                                            'quantity'                  => $mypost['optionQty'][$o],
                                            //'subtract'
                                            'price'                     => $mypost['optionPrice'][$o],
                                            'price_prefix'              => $mypost['optionPricePrefix'][$o],
                                            'points'                    => $mypost['optionPoints'][$o],
                                            'points_prefix'             => $mypost['optionPointsPrefix'][$o],
                                            'weight'                    => $mypost['optionWeight'][$o],
                                            //'weight_prefix'             => $mypost['optionrequired'][$i],
                                            );
                        
                        if ($product_option_valueId){
                            // edit
                            $this->option->addProductOptionValue($tbl_product_option_value,$product_option_valueId);
                        }else{
                            $this->option->addProductOptionValue($tbl_product_option_value);
                        }
                        
                    }
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
        }else{
            $message = array('msg_type'=>"error","msg_content"=>$errdata );
        }
            
        $this->session->set_flashdata($message);    
        redirect('product');
    }
    
    public function delete(){
		$id   =explode(',',$this->input->post('id',true));
        
		$tot=count($id);
	
        
		if (!empty($id)){
			for($i=0;$i < $tot;$i++){
				$param['where'] = array('id'=> $id[$i] );
                $this->product->setParam($param);
            
                    $result =$this->product->delete();
                    if ($result){
                        $alert ="success";
                       	$pesan = '<i class="icon-exclamation-sign"> </i> <strong>'.$this->lang->line('msg_delete').'</strong>';
                    }else{
                         $alert ="error";
                        $pesan = '<i class="icon-exclamation-sign"> </i> <strong>'.$this->lang->line('msg_undelete').'</strong>';
                    }
		  }
           $output = array(
                        'type'=>$alert,
                        'pesan'=>$pesan
                    );
           echo json_encode($output);	      
		}       
	}
        
   
    public function get_table(){
       
	   $this->product->getDataTable();
    }
    public function getComments($postId){
       $this->load->model('mcomments');
	   $this->mcomments->getDataTable($postId);
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
    
    
    public function deleteimage(){
        $this->load->model('mproductimage','productimage');
        
        
        $id = $this->input->post('id', true);
        $where['where'] = array('id'=>$id);
        
        $output = array('error'=>1);
        $this->productimage->setParam($where);    
            
        $row = $this->productimage->getData(true);
            
        if ($this->productimage->delete()){
            $output = array('error'=>0);   
            
            $this->deleteFile($row->image,$row->image_thumbs); 
        }
            
        echo json_encode($output);
       
    }
    
    public function deleteimagefile(){
        $output = array('error'=>1);
        
        $imgb = $this->input->post("imgb", true);
        $imgt = $this->input->post("imgt", true);
        echo $imgb;
        $delet = $this->deleteFile($imgb,$imgt);
        if ($delet){
            $output = array('error'=>0);
        }
        json_encode($output);
    }
    
    
    
    public function doupload(){
       $media = $this->input->post('type', true);
    
       if ($media=='media'){
            $this->douploadMedia();
       }else{ 
        
           $this->load->library('upload');
           $output = array(
                        "jsonrpc"   => "2.0", 
                        "result"    => "false", 
                        "id"        => "id"
                        );
                        
            if (!empty($_FILES)) {
                $img = $this->post->uploadImage('product', 'file',76,97);
                $image       = str_replace('..'.DIRECTORY_SEPARATOR,'',$img['image_path']); 
                $image_thumbs= str_replace('..'.DIRECTORY_SEPARATOR,'', $img['thumb_path']);
                $uniqId      = uniqid();
                $addtag      = '<tr id="'.$uniqId.'">
                                    <td><a href="'. ROOT . $image.'" class="fancybox-button" data-rel="fancybox-button">
                                        <img class="img-responsive" src="'. ROOT . $image_thumbs.'" alt=""> </a>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" value="" name="imageid[]" />
                                                        <input type="hidden" value="'.$image.'" name="image[]" id="img_'.$uniqId.'" />
                                                        <input type="hidden" value="'.$image_thumbs.'" name="imagethumbs[]" id="imgthumbs_'.$uniqId.'"/>
                                                        <input type="text" class="form-control" name="imageTitle[]" value="Thumbnail image"> 
                                                    </td>                                                                                                                        
                                                    <td>
                                                        <a href="#" class="btn btn-default btn-sm removeimage" data-url="'.site_url('product').'" data-trid="'.$uniqId.'" data-id="0">
                                                        <i class="fa fa-times"></i> Remove </a>
                                                    </td>
                                                </tr>';
               $output = array(
                            "jsonrpc"     => "2.0", 
                            "result"      => "OK", 
                            "id"          => $uniqId,
                            "addtag"      => $addtag,
                        );   
            }
            
            echo json_encode($output);
        }
    }
    
    public function douploadMedia(){ 
       $this->load->library('upload');
       $output = array(
                    "jsonrpc"   => "2.0", 
                    "result"    => "false", 
                    "id"        => "id"
                    );
       
        if (!empty($_FILES)) {
            $this->post->setMimeType("|pdf|xlsx|docx");
            $this->post->setMaxSizeUpload("25600?");
            $img = $this->post->uploadImage('media', 'file',false);
           
            if ( $img["error"] ){
                $output = array(
                    "jsonrpc"   => "2.0", 
                    "result"    => "false", 
                    "id"        => "id",
                    "err_msg"   => strip_tags( $img["errdata"])
                    );
            }else{
                
            
                $image       = str_replace('..'.DIRECTORY_SEPARATOR,'',$img['image_path']); 
                $imageThumb  = $image;
                if ( $_FILES["file"]["type"] == "application/pdf" ){
                    $imageThumb = "assets/images/icon-pdf.png";
                }
                if ( $_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ){
                    $imageThumb = "assets/images/icon-excel.png";
                }
                if ( $_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ){
                    $imageThumb = "assets/images/icon-word.png";
                }
                
                $uniqId      = uniqid();
                $addtag      = '<tr id="'.$uniqId.'">
                                    <td><a href="'. ROOT . $image.'" class="fancybox-button" data-rel="fancybox-button">
                                        <img class="img-responsive" src="'. ROOT . $imageThumb.'" alt=""> </a>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" value="0" name="mediaid[]" />
                                                        <input type="hidden" value="'.$image.'" name="media[]" id="img_'.$uniqId.'" />
                                                        <input type="text" class="form-control" name="mediaTitle[]" value="title"> 
                                                    </td>                                                                                                                        
                                                    <td>
                                                        <a href="#" class="btn btn-default btn-sm removeMedia" data-url="'.site_url('product').'" data-trid="'.$uniqId.'" data-id="0">
                                                        <i class="fa fa-times"></i> Remove </a>
                                                    </td>
                                                </tr>';
               $output = array(
                            "jsonrpc"     => "2.0", 
                            "result"      => "OK", 
                            "id"          => $uniqId,
                            "addtag"      => $addtag,
                        );   
            }
        }
        
        echo json_encode($output);
    }
    
    public function deletemedia(){
        $this->load->model('mproductmedia','productmedia');
        
        
        $id = $this->input->post('id', true);
        $where['where'] = array('id'=>$id);
        
        $output = array('error'=>1);
        $this->productmedia->setParam($where);    
            
        $row = $this->productmedia->getData(true);
      
        if ($this->productmedia->delete()){
            $output = array('error'=>0);   
            
            $this->deleteFile($row->image,$row->image_thumbs); 
        }
            
        echo json_encode($output);
       
    }
    
    public function deletemediafile(){
        
        $output = array('error'=>1);
        
        $imgb = $this->input->post("imgb", true);
     
        $delet = $this->deleteFile($imgb);
        if ($delet){
            $output = array('error'=>0);
        }
        json_encode($output);
    }
    
    public function remdiscount(){
        
        
        $this->load->model('mproducdisount','diskon');
        $id = $this->input->post('id',true);
      
        $param['where'] = array('id'=>$id);
        $this->diskon->setParam($param);
        $response = array('error'=>1);
        if ($this->diskon->delete()){
            $response = array('error'=>0);
        }
        echo json_encode($response);
    }
    
    public function deleteCategory(){
        $this->load->model('mproductcategory','pc');
        
        $id = $this->input->post('id',true);
        $param['where'] = array('id'=>$id);
        $this->pc->setParam($param);
        $response = array('error'=>1);
        if ($this->pc->delete()){
            $response = array('error'=>0);
        }
        echo json_encode($response);
        
    }
    public function addCategory(){
        $this->load->model('mproductcategory','pc');
        
        $id = $this->input->post('id',true);
        $value = $this->input->post('value',true);
        
        $data = array('product_id'=>$id,'category_id'=>$value);
        


        $this->pc->setData($data);
        $response = array('error'=>1);
        if ($this->pc->save()){
            $response = array('error'=>0);
        }
        echo json_encode($response);
    }
    public function getCategory($tipe='1'){
        $this->load->model('mcategory','category');
        $this->output->set_content_type('application/json');
        
        $q = $this->input->get_post('q', true);
        
        $category = $this->category->loadCategory($q,"3");
        
        $data = array(
                    'total_count'           => count($category),
                    'incomplete_results'    => false,
                    'items'                 => $category
                    );
        $this->output->set_output(json_encode($data));
        // echo json_encode($data);
    }
}

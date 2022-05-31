<?php

function breadcrumb($array)
{
    
    //$li = '<li><a href="'.site_url().'">Home</a><i class="fa fa-angle-right"></i></li>'."\n";
    $li = "";
    for($i=0; $i < count($array); $i++)
    {
        if (is_array($array[$i])){
            foreach($array[$i] as $key => $data){
                
                $li.= '<li><a href="'.site_url($data).'">'.$key.'</a><i class="fa fa-circle"></i></li>'."\n";
            }
            
        }else{
            $li.= '<li><span>'.$array[$i].'</span></li>'."\n";
        }
       
    }
    
    $ul = '<ul class="page-breadcrumb ">'; // breadcrumb
    $ul.= $li;
    $ul.= '</ul>';                       
                            
    return $ul;                    
}



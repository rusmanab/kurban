<?php
class Mtemplate extends CI_Model{
    
    public function getKategory(){
        $q = "SELECT id,category_name,slug,IFNULL(image,'') as image,IFNULL(image_big,'') as image_big ";
        $q.= "FROM tbl_category ORDER BY category_name ASC"; //  LIMIT 10
        $res = $this->db->query($q);
        
        return $res->result();
    }
    
    public function getWebsiteInfo(){
        $q = "SELECT title as meta_title, logo as meta_image ,deskripsi as meta_description ";
        $q.= ",value,sosmed FROM tbl_setting LIMIT 1";
        
        $res = $this->db->query($q);
        
        return $res->row();
    }
    
    public function getMenu($tipe){
        $q = "SELECT * FROM tbl_menu WHERE type='".$tipe."' ORDER BY `order` ASC";
        $res = $this->db->query($q);
        
        return $res->result();
    } 
    
}

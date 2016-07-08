<?php
include_once Url::getPath("models").'DBModel.php';



class DBexposSponsorPartner {
        
    public $expos_id;
    public $db;
	
	
	public function __construct($expos_id = null)  
    {  
	    $this->expos_id = $expos_id;
            $this->db = new DBModel();
            $this->db->connectDB();
    } 
    
    
    public function getExposSponsorPartner($expos_id, $sp_cat_id = null){
        $sql='select expos_sp.expos_sp_id,expos_sp.expos_id, sp_name_en,sp_name_cn, expos_sp.sp_cat_id,sp_cat_name_en, sp_cat_name_cn , sp_logo_url,sp_logo_hyperlink from expos_sp
            left join sponsor_partner on sponsor_partner.spid = expos_sp.sp_id
            left join sp_cat on sp_cat.sp_cat_id = expos_sp.sp_cat_id
            where 1=1  and active = 1 ';
        
        $where_str='';
        if($expos_id != null && $expos_id !=""){
        $where_str.= ' and expos_id = '.$expos_id;
        } else {
            $where_str.= '';
        }
        
        if($sp_cat_id != null && $sp_cat_id !=""){
        $where_str.= ' and expos_sp.sp_cat_id = '.$sp_cat_id;
        } else {
            $where_str.= '';
        }
        
        $sql.=$where_str;
        
        $order = ' order by sp_cat.sp_cat_order,sp_name_en  ';
        $sql.= $order;
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }   
    
    public function getExposSponsorCat ($expos_id){
        $sql='select target_show_sp.sp_cat_id, sp_cat_name_en, sp_cat_name_cn, sp_cat_order from 
                ( select sp_cat_id from expos_sp where expos_id = "'.$expos_id.'" group by sp_cat_id order by sp_cat_id ) as target_show_sp
                left join sp_cat on target_show_sp.sp_cat_id = sp_cat.sp_cat_id 
                order by sp_cat_order';
        
        
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }
    
    
    public function getCanAddSponsorPartner($expos_id){
        $sql='select * from sponsor_partner
                left join 
                ( SELECT sp_id FROM new_smartexpos.expos_sp where expos_id = '.$expos_id.' and active = 1 ) as exist_sp
                on exist_sp.sp_id = sponsor_partner.spid
                where exist_sp.sp_id is null
                order by sp_name_en ';
        $data = $this->db->selectBySQL($sql);
        return $data;
    }
    
    public function AddSponsorPartner ($sp_id,$sp_cat_id,$expos_id){
        $check_ok = false;
        
        $sql='select * from expos_sp where sp_id ="'.$sp_id.'" and expos_id = "'.$expos_id.'"';
        $data = $this->db->selectBySQL($sql);
        if(sizeof($data)>0){
            // the data already existed . using UPDATE
            $expos_sp_id = $data[0]['expos_sp_id'];
            $sql = 'update expos_sp set sp_cat_id="'.$sp_cat_id.'" , active = 1 where expos_sp_id="'.$expos_sp_id.'"';
            $check_ok = $this->db->execBySQL($sql);
            return $check_ok;

        } else{
            // the data are new add, using INSERT
             $sql = 'insert into expos_sp (expos_id,sp_id,sp_cat_id,active) values ("'.$expos_id.'","'.$sp_id.'","'.$sp_cat_id.'","1")';
             $check_ok = $this->db->execBySQL($sql);
             return $check_ok;
        }
    }
    public function editExposSponsorPartner_cat($expo_sp_id,$sp_cat_id){
        
        $sql='update expos_sp set sp_cat_id = '.$sp_cat_id.' where expos_sp_id = '.$expo_sp_id.' ';
        $result = $this->db->execBySQL($sql);
        return $result;
        
    }



}








?>
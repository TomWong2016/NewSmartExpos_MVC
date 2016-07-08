<?php
include_once Url::getPath("models").'DBModel.php';



class DBexpos {
        
    public $expos_id;
    public $db;
	
	
    public function __construct($expos_id = null)  
        {  
                $this->expos_id = $expos_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    public function getExposDetails($expos_id = null, $past= null){
        $sql='SELECT expos_id,expos_catid,expos_title_en,expos_title_cn,expos_des_en,expos_des_cn,expos_start_date,expos_end_date,expos_hotline,past FROM new_smartexpos.expos'
                . ' where 1=1 ';
        
        
        
        $where_str='';
        if($expos_id != null && $expos_id !=""){
            $where_str.= ' and expos_id = '.$expos_id.' ';
        } 
        
        if($past!= null && $past!="" ){
            $where_str.= ' and past = '.$past.' ';
        } 
        
        $sql.=$where_str;
        
        
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }
    
    public function getPastExpos($expos_catid = null, $past = null){
        $sql='select expos_id, expos_catid, expos_title_en,expos_title_cn,expos_des_en,expos_des_cn,expos_start_date,expos_end_date,expos_past_title_en,expos_past_title_cn,past  from expos where 1=1 ';
        
         $where_str='';
        if($expos_catid != null && $expos_catid !=""){
            $where_str.= ' and expos_catid = '.$expos_catid.' ';
        } 
        
        if($past!= null && $past!="" ){
            $where_str.= ' and past = '.$past.' ';
        } 
        
         $sql.=$where_str;
        
        
        $data = $this->db->selectBySQL($sql);
        return $data;
        
        
        
    }
}

?>
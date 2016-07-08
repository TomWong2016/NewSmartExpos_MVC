<?php
include_once Url::getPath("models").'DBModel.php';



class DBexposDetails {
        
    public $expos_id;
    public $db;
	
	
    public function __construct($expos_id = null)  
        {  
                $this->expos_id = $expos_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    public function getExposDetails($expos_id = null, $name= null, $type = null, $active=null){
        $sql='select expos_details_id,expos_id,name,title_en,title_cn,url,content_en,content_cn,type,seq from expos_details where 1=1 ';
        
        $where_str='';
        if($expos_id != null && $expos_id !=""){
            $where_str.= ' and expos_id = '.$expos_id.' ';
        } 
        
        if($name!= null && $name!="" ){
            $where_str.= ' and name = "'.$name.'" ';
        } 
        
          if($type!= null && $type!="" ){
            $where_str.= ' and type = "'.$type.'" ';
        } 
        
        if($active!= null && $active!="" ){
            $where_str.= ' and active = '.$active.' ';
        } 
        
        $sql.=$where_str;
        
        $order = ' order by seq ';
        $sql.= $order;
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }   
}

?>
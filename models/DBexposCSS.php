<?php
include_once Url::getPath("models").'DBModel.php';



class DBexposCSS {
        
    public $expos_id;
    public $db;
	
	
    public function __construct($expos_id = null)  
        {  
                $this->expos_id = $expos_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    public function getExposCSS($expos_id = null){
        $sql='SELECT idcss,expos_id,css_en,css_cn FROM exposcss '
                . ' where 1=1 ';
        
        
        
        $where_str='';
        if($expos_id != null && $expos_id !=""){
            $where_str.= ' and expos_id = '.$expos_id.' ';
        } 
        
        $sql.=$where_str;
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }   
}

?>
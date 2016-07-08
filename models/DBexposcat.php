<?php
include_once Url::getPath("models").'DBModel.php';



class DBexposcat {
        
    public $expos_id;
    public $db;
	
	
    public function __construct($expos_id = null)  
        {  
                $this->expos_id = $expos_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    public function getExposCat($expos_catid = null){
        $sql='select expo_catid, expo_catname_en, expo_catname_cn, seq from expos_cat '
                . ' where 1=1 ';
        
        
        
        $where_str='';
        if($expos_catid != null && $expos_catid !=""){
            $where_str.= ' and expo_catid = '.$expos_catid.' ';
        } 
        
        $sql.=$where_str;
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }   
}

?>
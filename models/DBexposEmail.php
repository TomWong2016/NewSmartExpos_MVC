<?php
include_once Url::getPath("models").'DBModel.php';



class DBexposEmail {
        
    public $expos_id;
    public $db;
	
	
    public function __construct($expos_id = null)  
        {  
                $this->expos_id = $expos_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    public function getExposEmail($expos_id = null){
        $sql='SELECT * FROM expos_email '
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
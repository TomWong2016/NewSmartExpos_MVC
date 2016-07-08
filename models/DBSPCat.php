<?php
include_once Url::getPath("models").'DBModel.php';



class DBSPCat {
        
    public $sp_cat_id;
    public $db;
	
	
    public function __construct($sp_cat_id = null)  
        {  
                $this->sp_cat_id = $sp_cat_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    public function getSPCat($sp_cat_id = null){
        $sql='SELECT sp_cat_id,sp_cat_name_en,sp_cat_name_cn,sp_cat_type,sp_cat_order FROM sp_cat '
                . ' where 1=1 ';
        
        
        
        $where_str='';
        if($sp_cat_id != null && $sp_cat_id !=""){
        $where_str = 'and sp_cat_id = '.$sp_cat_id;
        } else {
            $where_str ='';
        }
        
        $sql.=$where_str;
        return $this->db->selectBySQL($sql);
    }   
}

?>
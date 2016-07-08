<?php
include_once Url::getPath("models").'DBModel.php';



class DBexposOverview {
        
    public $expos_overview_id;
    public $db;
	
	
    public function __construct($expos_overview_id = null)  
        {  
                $this->expos_overview_id = $expos_overview_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    public function getExposOverview($expos_id){
        $sql='SELECT expos_overview_id,expos_id,expos_overview_des_en,expos_overview_des_cn FROM expos_overview
                where 1=1 ';
        
        
        
        $where_str='';
        if($expos_id != null && $expos_id !=""){
        $where_str = 'and expos_id = '.$expos_id;
        } else {
            $where_str ='';
        }
        
        $sql.=$where_str;
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }   
    
    
    public function editExposOverview($expos_id,$overview_en,$overview_cn){
        $sql='update expos_overview set expos_overview_des_en="'.$overview_en.'", expos_overview_des_cn="'.$overview_cn.'"
                where 1=1  ';
        
        
        
        $where_str='';
        if($expos_id != null && $expos_id !=""){
        $where_str = 'and expos_id = '.$expos_id;
        } else {
            $where_str ='';
        }
        
        $sql.=$where_str;
        
        $result = $this->db->execBySQL($sql);
        return $result;
    }   
}

?>
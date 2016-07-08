<?php
include_once Url::getPath("models").'DBModel.php';



class DBregistration {
        
    public $expos_id;
    public $db;
	
	
    public function __construct($expos_id = null)  
        {  
                $this->expos_id = $expos_id;
                $this->db = new DBModel();
                $this->db->connectDB();
        } 
	
	
    
    
    /*
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
    */
    
    public function AddRegistration($first,$last,$job,$company,$country,$email,$tel,$hearfrom,$subscribe,$type,$expos_id,$reg_time){
        
        $sql='insert into registration (first,last,job,company,country,email,tel,hearfrom,subscribe,type,event,reg_time) values 
                ("'.$first.'","'.$last.'","'.$job.'","'.$company.'","'.$country.'","'.$email.'","'.$tel.'","'.$hearfrom.'","'.$subscribe.'","'.$type.'","'.$expos_id.'","'.$reg_time.'")';
        //echo $sql;
        $check = $this->db->execBySQL($sql);
        
        return $check;
    }
}

?>
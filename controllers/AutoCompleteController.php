<?php
include_once(Url::modelsFolderPath() . 'AutoCompleteModel.php');

class AutoCompleteController {
	public $result, $autoCompleteModel;
	
	public function __construct()  
    {  
        $this->autoCompleteModel = new AutoCompleteModel();
    } 
	
	public function showSuggestion($lang, $searchType, $keyword)
	{
		$this->result = $this->autoCompleteModel->getSuggestedLocation($lang, $searchType, $keyword);
		return json_encode($this->result);
	}
}

?>
<?php
//include_once(Url::modelsFolderPath() . 'PageModel.php');

include_once '/../models/PageModel.php';

class PageController {
	public $language;
	
	public function __construct()  
    {  
        $this->language = new PageModel();
    } 
    
	public function show($pagename, $lang, $view_vars = array())
	{
		if(file_exists(Url::getPath("views") .  $pagename)) {
        
			if($pagename=="index.php") {
				$data = $this->language->loadLangFile(array('header.php', $pagename, 'footer.php'), $lang);
			} else if(strpos($pagename, "popup")!==false) {
				$data = $this->language->loadLangFile(array('header.php', 'popup.php', 'index.php', 'footer.php'), $lang);
			} else {
				$data = $this->language->loadLangFile(array('header.php', $pagename, 'index.php', 'footer.php'), $lang);
			}
			$data = array_merge($data, $view_vars);
			if(strpos($pagename, "popup")!==false) {
				include Url::getPath("views") . $pagename;
			} else {
				include Url::getPath("views") . 'header.php';
				include Url::getPath("views") . $pagename;
				include Url::getPath("views") . 'footer.php';
			}
		} else {
                    
   
			$data = $this->language->loadLangFile(array('header.php', 'footer.php'), $lang);
			$data = array_merge($data, $view_vars);
			include Url::getPath("views") . 'header.php';
			include Url::getPath("views") . $pagename;
			include Url::getPath("views") . 'footer.php';
		}
	}
}

?>
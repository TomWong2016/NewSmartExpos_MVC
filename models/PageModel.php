<?php 
	class PageModel {
		private $array = array();
		 
		public function loadLangFile($names, $code = "tc") {
			if (is_array($names)) {
				foreach ($names as $name) {
					$file = Url::getPath("languages/" . $code) . $name;
					if (is_readable($file)) {
						$this->array += include $file;
					} else {
						//echo "Could not load language file " . $file;
						//die;
					}
				}
				return $this->array;
			} else {
				$file = Url::getPath("languages/" . $code) . $name;
				if (is_readable($file)) {
					$this->array = include $file;
					return $this->array;
				} else {
					//echo Error::display("Could not load language file '$code/$name.php'");
					//die;
				}
			}
		}
		
		public static function showLang($key, $name, $code = "tc") {
			$file = Url::getPath("languages/" . $code) . $name;
			if (is_readable($file)) {
				$array = include $file;
			} else {
				//echo Error::display("Could not load language file '$code/$name.php'");
				//die;
			}
			if (!empty($array[$key])) {
				return $array[$key];
			} else {
				return $key;
			}
		}
	}
?>
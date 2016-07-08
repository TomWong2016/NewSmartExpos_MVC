<?php

class JSON {
	
	public static function decode($url, $path, $key, $values, $params='', $cache = "true", $method = 'GET') {
		$cacheFile = Url::getPath("cache") . md5(Url::apiPath() . $url . $path . '?lang=' . Session::get("lang") . '&' . $params);
		
		if($cache=="true") {
			if (file_exists($cacheFile)) {
				$fh = fopen($cacheFile, 'r');
				$cacheTime = trim(fgets($fh));
				
				// if data was cached recently, return cached data
				if($url=="transactions") {
					if ($cacheTime > strtotime('-60 seconds')) {
						return JSON::genResult(fread($fh, filesize($cacheFile)), $key, $values);
					}
				} else {
					if ($cacheTime > strtotime('-60 seconds')) {
						return JSON::genResult(fread($fh, filesize($cacheFile)), $key, $values);
					}
				}
			}
			try {
				$ch =  curl_init(Url::apiPath() . $url . $path . '?lang=' . Session::get("lang") . '&' . $params);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 2);
				$json = curl_exec($ch);
				if(count(json_decode($json)) > 0) {
					if (file_exists($cacheFile)) {
						$fh = fopen($cacheFile, 'r');
						$cacheTime = trim(fgets($fh));
						fclose($fh);
						unlink($cacheFile);
					}
					$fh = fopen($cacheFile, 'w');
					fwrite($fh, time() . "\n");
					fwrite($fh, $json);
					fclose($fh);
				} else {
					$fh = fopen($cacheFile, 'r');
					$cacheTime = trim(fgets($fh));
					return JSON::genResult(fread($fh, filesize($cacheFile)), $key, $values);
				}
			} catch (Exception $ex) {
				$fh = fopen($cacheFile, 'r');
				$cacheTime = trim(fgets($fh));
				return JSON::genResult(fread($fh, filesize($cacheFile)), $key, $values);
			}
		} else {
			if($method=="POST") {
				$ch =  curl_init(Url::apiPath() . $url . $path . '?lang=' . Session::get("lang") . '&' . $params);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, 5);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			} else {
				$ch =  curl_init(Url::apiPath() . $url . $path . '?lang=' . Session::get("lang") . '&' . $params);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			}
			$json = curl_exec($ch);
		}
		return JSON::genResult($json, $key, $values);
	}
	public static function genResult($json, $key, $values) {
		$obj_list = json_decode($json);
		$result = array();
		if(is_array($obj_list)) {
			foreach($obj_list as $outerIndex=>$obj) {
				if(is_array($values)) {
					foreach ($values as $index=>$value) {
						if($key=="") {
							$result[$outerIndex][$values[$index]] = $obj->$value;
						} elseif (property_exists($obj, $key) && property_exists($obj, $value)) {
							$result[$obj->$key][$values[$index]] = $obj->$value;
						} elseif (property_exists($obj, $key)) {
						    $result[$obj->$key][$values[$index]] = null;
						}
					}
				} else {
					if($key=="") {
						$result[] = $obj->$values;
					} else {
						$result[$obj->$key] = $obj->$values;
					}
				}
			}
		} else if(is_object($obj_list)){
			if(is_array($values)) {
				foreach ($values as $index=>$value) {
					if($key=="") {
						$result[][$values[$index]] = $obj_list->$value;
					} elseif (property_exists($obj_list, $key) && property_exists($obj_list, $value)) {
						$result[$obj_list->$key][$values[$index]] = $obj_list->$value;
					} elseif (property_exists($obj_list, $key)) {
						$result[$obj_list->$key][$values[$index]] = null;
					}
				}
			} else {
				if($key=="") {
					$result[] = $obj_list->$values;
				} else {
					$result[$obj_list->$key] = $obj_list->$values;
				}
			}
		} else {
			$result = $obj_list;
		}
		return $result;
	}
}

?>

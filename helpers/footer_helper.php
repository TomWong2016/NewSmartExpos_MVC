<?php

class Footer {
	
	public static function genFooter($array, $between) {
		end($array);
        $last_element_key = key($array);
        foreach($array as $link=>$name) {
            if(is_array($name)) {
            	echo '<a href="' . $link . '" target="_blank" title="' . $name[0] . '">' . $name[1] . '</a>';
            } else {
            	echo '<a href="' . $link . '" target="_blank">' . $name . '</a>';
            }
            if($between && $link!=$last_element_key) {
            	echo ' <span>|</span> ';
            } else if(!$between && $link==$last_element_key) {
            	echo '<span>|</span>';
            } else if(!$between && $link!=$last_element_key) {
            	echo '&nbsp;&nbsp;';
            }
        }
	}
}

?>
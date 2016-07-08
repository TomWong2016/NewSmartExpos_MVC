<?php

class Assets {

	protected static $templates = array(
        'js'  => '<script src="%s"></script>',
        'css' => '<link href="%s" rel="stylesheet" type="text/css">',
    );
    
    protected static function resource($files, $template) {
        $template = self::$templates[$template];
        if (is_array($files)) {
            foreach ($files as $file) {
                echo sprintf($template, $file)."\n";
            }
        } else {
            echo sprintf($template, $files)."\n";
        }
    }
    
    public static function js($files) {
        static::resource($files, 'js');
    }
    
    public static function css($files) {
        static::resource($files, 'css');
    }
    
    public static function image($file) {
    	echo Url::imagesFolderPath() . $file;
    }
	
}

?>
<?php 

$config['base_url'] = ''; // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller'] = 'main'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)

$config['db_host'] = 'localhost'; // Database host (e.g. localhost)
$config['db_name'] = 'new_smartexpos'; // Database name
$config['db_username'] = 'root'; // Database username
$config['db_password'] = ''; // Database password

date_default_timezone_set("Asia/Hong_Kong");
ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'] . '/session');
?>
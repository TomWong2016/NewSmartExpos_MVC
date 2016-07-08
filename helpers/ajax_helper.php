<?php
include_once '../config/config.php';
include_once 'url_helper.php';
include_once 'session_helper.php';
include_once 'json_helper.php';
session_start();
echo json_encode(JSON::decode($_POST['url'], $_POST['path'], $_POST['key'], $_POST['values'], $_POST['params'], $_POST['cache'], $_POST['method']));
?>
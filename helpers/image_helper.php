<?php
	$imagePath = $_GET['imagePath'];
	$new_width = $_GET['new_width'];
	$new_height = $_GET['new_height'];
	
	// Content type
	header('Content-type: image/jpeg');
	
	// Get new dimensions
	list($width, $height, $type) = getimagesize($imagePath);
	$ratio = $width/$height;
	if( $ratio > 1) {
		$new_width = $new_width;
		$new_height = $new_width/$ratio;
	}
	else {
		$new_width = $new_height*$ratio;
		$new_height = $new_height;
	}
	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);
	
	switch($type) {
		case IMAGETYPE_JPEG:
			$image = imagecreatefromjpeg($imagePath);
			break;
		case IMAGETYPE_GIF:
			$image = imagecreatefromgif($imagePath);
			break;
		case IMAGETYPE_PNG:
			$image = imagecreatefrompng($imagePath);
			break;
		default:
			throw new Exception('This file is not in JPG, GIF, or PNG format!');
	}
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	// Output
	imagejpeg($image_p, null, 100);
?>
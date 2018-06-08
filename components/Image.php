<?php
class Image{

	/*
		Optimization of Image
		@return Array()
	*/
	public static function getImage($img,$max_width = 200,$max_height = 200){
		$img_path = P.$img;
		
		list($width, $height) = getimagesize($img_path); 
		$ratioh = $max_height/$height; 
		$ratiow = $max_width/$width; 
		$ratio = min($ratioh, $ratiow); 
		$width = intval($ratio*$width); 
		$height = intval($ratio*$height);


		$image = array();
		$image["path"] = $get_img;
		$image["width"] = $width;
		$image["height"] = $height;

		return $image;
	}
	/* -----------end-function---------- */

	public static function resize($image, $w_o = false, $h_o = false) {
	    if (($w_o < 0) || ($h_o < 0)) {
	      return false;
	    }
	    list($w_i, $h_i, $type) = getimagesize($image);
	    $types = array("", "gif", "jpeg", "png");
	    $ext = $types[$type];
	    if ($ext) {
	      $func = 'imagecreatefrom'.$ext;
	      $img_i = $func($image);
	    } else {
	      echo 'Некорректное изображение'; 
	      return false;
	    }
	    
	    if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
	    if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
	    $img_o = imagecreatetruecolor($w_o, $h_o);
	    imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); 
	    $func = 'image'.$ext; 
	    return $func($img_o, $image); 
	  }

}
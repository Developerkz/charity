<?php
class File{


	public static function toKBSize( $size ){
	    $fileSize = 0;                   
	                
	    if ($size > 1024 * 1024) {
	        $fileSize = round($size * 100 / (1024 * 1024) / 100).'MB';
	    }else {
	        $fileSize = round(($size * 100 / 1024) / 100).'KB';
	    }

	    return $fileSize;
	}

	
}

?>
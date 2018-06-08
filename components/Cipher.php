<?php 
class Cipher{

	/*	
		Primary Cipher for Password
		return String
	*/
	public static function primary($value){


		$value = md5($value).md5($value);
		$value = strrev($value);
		$value = md5($value);
		$value = strrev($value);
		

		return $value;
	}
	/* ------------- end-function ------------- */
}
?>
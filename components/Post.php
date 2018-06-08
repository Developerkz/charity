<?php
class Post{

	public static function isButton($button){
		if(isset($_POST[$button])){
			return true;
		}
		else{
			return false;
		}
	}

	public static function getField($value){
		$text = $_POST[$value];

		$text = strip_tags($text);
		$text = trim($text);
		return $text;
	}

	public static function theField($value){
		echo $_POST[$value];
	}

	public static function isField($value){

		if(isset($_POST[$value])){
			return true;
		}
		else{
			return false;
		}
		
	}

	public static function isRequestPost(){
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			return true;
		}
		return false;
	}
}
?>
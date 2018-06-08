<?php
class Page{

	/*
		Page 404
		include file 404 then stopped all commands
	*/
	public static function page404(){
		include_once(P.'html/page404.php');
		exit;
	}
	/* -----------end-function---------- */


	/*
		URI
		Display uri of project
	*/
	public static function uri(){
		echo 'http://charity/';
	}
	/* -----------end-function---------- */


	/*
		Image
		Display path where have images of Images
	*/
	public static function getImage(){
		echo 'files/images/';
	}
	/* -----------end-function---------- */

	/*
		News Image
		Display path where have images of News Images
	*/
	public static function getNewsImage(){
		echo 'files/news/';
	}
	/* -----------end-function---------- */



	/*
		Child Image
		Display path where have images of Child Images
	*/
	public static function getChildImage(){
		echo 'files/children/';
	}
	/* -----------end-function---------- */


	/*
		Slide Image
		Display path where have images of Slide Images
	*/
	public static function getSlideImage(){
		echo 'files/slide/';
	}
	/* -----------end-function---------- */


	/*
		Payment Image
		Display path where have images of Payment Images
	*/
	public static function getPaymentImage(){
		echo 'files/payments/';
	}
	/* -----------end-function---------- */




	/*
		Send Mail
	*/
	public static function sendMail($from,$to,$subject,$body)
	{
		$charset = 'utf-8';
		mb_language("ru");
		$headers  = "MIME-Version: 1.0 \n" ;
		$headers .= "From: <".$from."> \n";
		$headers .= "Reply-To: <".$from."> \n";
		$headers .= "Content-Type: text/html; charset=$charset \n";
		
		$subject = '=?'.$charset.'?B?'.base64_encode($subject).'?=';

		mail($to,$subject,$body,$headers);
	}
	/* -----------end-function---------- */



	/*
		Generate Password
	*/
	public static function generatePassword(){
		$number = rand(8,25);

	    $arr = array('a','b','c','d','e','f',

	                 'g','h','i','j','k','l',

	                 'm','n','o','p','r','s',

	                 't','u','v','x','y','z',

	                 'A','B','C','D','E','F',

	                 'G','H','I','J','K','L',

	                 'M','N','O','P','R','S',

	                 'T','U','V','X','Y','Z',

	                 '1','2','3','4','5','6',

	                 '7','8','9','0','+','*',

	                 '-','_','/','#','!','&');



	    $password = "";

	    for($i = 0; $i < $number; $i++){

	      $index = rand(0, count($arr) - 1);
	      $password .= $arr[$index];
	      
	    }


	  return $password;
	}
	/* -----------end-function---------- */



}
?>
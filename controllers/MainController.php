<?php
class MainController{




	/*
	* Main page
	* @return HTML page
	*/
	public function methodIndex(){

		//Fields
		$slides = array();
		$slides = Slide::getList();
		
		$children = array();
		$children = Child::getList();

		$news = array();
		$news = News::getList();

		//Page
		include_once(P.'html/main/main.php');
		return true;
	}
	/*
	* end Function
	*/




	/*
	* About
	* @return HTML page
	*/
	public function methodAbout(){

		//Page
		include_once(P.'html/main/about.php');
		return true;
	}
	/*
	* end Function
	*/


	
	/*
	* Contact
	* @return HTML page
	*/
	public function methodContact(){

		//Page
		include_once(P.'html/main/contact.php');
		return true;
	}
	/*
	* end Function
	*/


	/*
	* Add Email to DB
	* Ajax Function
	*/
	public function methodEmail(){

		if(Post::isRequestPost()){
			$email = Post::getField("email");
			Email::add($email);
		}
		else{
			header("Location:/");
		}

		return true;
	}
	/*
	* end Function
	*/
}
?>
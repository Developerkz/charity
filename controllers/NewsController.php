<?php
class NewsController{

	/*
	* News view
	* @return HTML page
	*/
	public function methodView($url){

		//Fields
		$news = array();
		$news = News::getList();

		$newsView = News::getURL($url);
		if(!$newsView){Page::page404();}

		//Page
		include_once(P.'html/news/view.php');
		return true;
	}
	/*
	* end Function
	*/



	/*
	* News list
	* @return HTML page
	*/
	public function methodList(){

		//Fields
		$news = array();
		$news = News::getList();

		//Page
		include_once(P.'html/news/list.php');
		return true;
	}
	/*
	* end Function
	*/
}
?>
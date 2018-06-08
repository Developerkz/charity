<?php
return array(

	//News
	'news/([A-Za-z0-9-]+)' => 'news/view/$1',
	'news' => 'news/list',


	//Child
	'donate/([0-9]+)' => 'child/donate/$1',
	'child/([A-Za-z0-9-]+)' => 'child/view/$1',
	'children' => 'child/list',

	//Main
	'main' => 'main/index',
	'about' => 'main/about',
	'contact' => 'main/contact',
	'add-email' => 'main/email',

	//Account
	'account/change-password' => 'user/change',
	'account' => 'user/account',
	'register' => 'user/register',
	'remind' => 'user/remind', 
	'logout' => 'user/logout',
	'login' => 'user/login',
	
);
?>
<?php 
class DB{

	/*
		Data Base Connection
	*/
	public static function getConnection(){
		$params = include(P.'config/db_parameters.php');
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn,$params['user'],$params['pass']);
		return $db;
	}
	/* -----------end-function---------- */

}
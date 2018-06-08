<?php
class Email{


	public static function add($email){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "INSERT INTO ch_emails (email,oDate) VALUES(:email,NOW()) ";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":email",$email,PDO::PARAM_STR);




		return $result->execute();

	}

}
?>
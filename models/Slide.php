<?php
class Slide{






	/*
	* Get Slides
	* @return Array()
	*/
	public static function getList($status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$get = array();
		$i = 0;
		$sql = "SELECT * FROM ch_slides WHERE status = :status";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();

		//Rewrite to Array
		while($row = $result->fetch()){
			$get[$i]["slideID"] = $row["slideID"];
			$get[$i]["title"] = $row["title"];
			$get[$i]["url"] = $row["url"];
			$get[$i]["img"] = $row["img"];
			$get[$i]["description"] = $row["description"];
			$get[$i]["status"] = $row["status"];
			$get[$i]["oDate"] = $row["oDate"];
			$i++;
		}

		return $get;
	}
	/*
	* end Function
	*/






}
?>
<?php
class Donate{




	/*
	-------------------------------
			Get Donates
			@return Array()
	-------------------------------
	*/
	public static function getList($status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$i=0;
		$get = array();
		$sql = "SELECT * FROM ch_donates WHERE status = :status";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();


		//Rewrite to Array()
		while($row = $result->fetch()){
			$get[$i]["donateID"] = $row["donateID"];
			$get[$i]["email"] = $row["email"];
			$get[$i]["total"] = $row["total"];
			$get[$i]["paymentID"] = $row["paymentID"];
			$get[$i]["childID"] = $row["childID"];
			$get[$i]["uniqueID"] = $row["uniqueID"];
			$get[$i]["status"] = $row["status"];
			$get[$i]["oDate"] = $row["oDate"];
			$i++;
		}

		return $get;
	}
	/* -----------end-function---------- */










	/*
	-------------------------------
			Get Donate By UNIGUE
			@return Array()
	-------------------------------
	*/
	public static function getUID($id){

		//Convertion to INTEGER
		$id = intval($id);

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "SELECT * FROM ch_donates WHERE uniqueID = :uniqueID";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":uniqueID",$id,PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		return $result->fetch();
	}
	/* -----------end-function---------- */






	/*
	-------------------------------
			Get Donates of Child
			@return Array()
	-------------------------------
	*/
	public static function getChild($childID,$status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$i=0;
		$get = array();
		$sql = "SELECT * FROM ch_donates WHERE childID = :childID AND status = :status";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":childID",$childID,PDO::PARAM_INT);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();


		//Rewrite to Array()
		while($row = $result->fetch()){
			$get[$i]["donateID"] = $row["donateID"];
			$get[$i]["email"] = $row["email"];
			$get[$i]["total"] = $row["total"];
			$get[$i]["paymentID"] = $row["paymentID"];
			$get[$i]["childID"] = $row["childID"];
			$get[$i]["uniqueID"] = $row["uniqueID"];
			$get[$i]["status"] = $row["status"];
			$get[$i]["oDate"] = $row["oDate"];
			$i++;
		}

		return $get;
	}
	/* -----------end-function---------- */







	/*
	-------------------------------
			Get Donates of Email
			@return Array()
	-------------------------------
	*/
	public static function getEmail($email){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$i=0;
		$get = array();
		$sql = "SELECT * FROM ch_donates WHERE email = :email";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->execute();


		//Rewrite to Array()
		while($row = $result->fetch()){
			$get[$i]["donateID"] = $row["donateID"];
			$get[$i]["email"] = $row["email"];
			$get[$i]["total"] = $row["total"];
			$get[$i]["paymentID"] = $row["paymentID"];
			$get[$i]["childID"] = $row["childID"];
			$get[$i]["uniqueID"] = $row["uniqueID"];
			$get[$i]["status"] = $row["status"];
			$get[$i]["oDate"] = $row["oDate"];
			$i++;
		}

		return $get;
	}
	/* -----------end-function---------- */




	/*
	-------------------------------
			Add Donate
			@return Array()
	-------------------------------
	*/
	public static function add($email,$total,$paymentID,$childID,$uniqueID,$status = 0){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "INSERT INTO ch_donates( email, total, paymentID, childID, uniqueID, status, oDate) 
					 			VALUES(:email,:total,:paymentID,:childID,:uniqueID,:status, NOW())";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->bindParam(":total",$total,PDO::PARAM_INT);
		$result->bindParam(":paymentID",$paymentID,PDO::PARAM_INT);
		$result->bindParam(":childID",$childID,PDO::PARAM_INT);
		$result->bindParam(":uniqueID",$uniqueID,PDO::PARAM_INT);
		$result->bindParam(":status",$status,PDO::PARAM_INT);

		return $result->execute();

	}
	/* -----------end-function---------- */



}
?>
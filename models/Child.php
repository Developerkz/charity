<?php
class Child{




	/*
	-------------------------------
			Get Children
			@return Array()
	-------------------------------
	*/
	public static function getList($status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields 
		$i=0;
		$get = array();
		$sql = "SELECT * FROM ch_children WHERE status = :status ORDER BY childID DESC";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();

		//Rewrite to Array()
		while($row = $result->fetch()){
			$get[$i]["childID"] = $row["childID"];
			$get[$i]["url"] = $row["url"];
			$get[$i]["name"] = $row["name"];
			$get[$i]["surname"] = $row["surname"];
			$get[$i]["age"] = $row["age"];
			$get[$i]["wish"] = $row["wish"];
			$get[$i]["skills"] = $row["skills"];
			$get[$i]["diagnosis"] = $row["diagnosis"];
			$get[$i]["phone"] = $row["phone"];
			$get[$i]["address"] = $row["address"];
			$get[$i]["image"] = $row["image"];
			$get[$i]["status"] = $row["status"];
			$get[$i]["total"] = $row["total"];
			$get[$i]["tobuy"] = $row["tobuy"];
			$i++;
		}

		return $get;
	}
	/* -----------end-function---------- */






	/*
	-------------------------------
			Get Child By ID
			@return Array()
	-------------------------------
	*/

	public static function get($childID,$status = 1){
		
		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "SELECT * FROM ch_children WHERE childID = :childID AND status = :status";


		//Query 
		$result = $db->prepare($sql);
		$result->bindParam(":childID",$childID,PDO::PARAM_INT);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		return $result->fetch();
	}	

	/* -----------end-function---------- */



	/*
	-------------------------------
			Get Child By ID
			@return Array()
	-------------------------------
	*/

	public static function getURL($url,$status = 1){
		
		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "SELECT * FROM ch_children WHERE url = :url AND status = :status";


		//Query 
		$result = $db->prepare($sql);
		$result->bindParam(":url",$url,PDO::PARAM_STR);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();
		
		return $result->fetch();
	}	

	/* -----------end-function---------- */



	/*
	-------------------------------
			Add child
			@return Boolean
	-------------------------------
	*/

	public static function add($url,$name,$surname,$age,$wish,$skills,$diagnosis,$phone,$address,$image,$status = 1,$total,$tobuy){
		
		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "INSERT INTO ch_children ( url, name, surname, age, wish, skills, diagnosis, phone, address, image, status, total, tobuy) 
								 VALUES (:url,:name,:surname,:age,:wish,:skills,:diagnosis,:phone,:address,:image,:status,:total,:tobuy)";


		//Query 
		$result = $db->prepare($sql);
		$result->bindParam(":url",$url,PDO::PARAM_STR);
		$result->bindParam(":name",$name,PDO::PARAM_STR);
		$result->bindParam(":surname",$surname,PDO::PARAM_STR);
		$result->bindParam(":age",$age,PDO::PARAM_INT);
		$result->bindParam(":wish",$wish,PDO::PARAM_STR);
		$result->bindParam(":diagnosis",$diagnosis,PDO::PARAM_STR);
		$result->bindParam(":phone",$phone,PDO::PARAM_STR);
		$result->bindParam(":address",$address,PDO::PARAM_STR);
		$result->bindParam(":image",$image,PDO::PARAM_STR);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->bindParam(":total",$total,PDO::PARAM_INT);
		$result->bindParam(":tobuy",$tobuy,PDO::PARAM_STR);

		return $result->execute();
	}	

	/* -----------end-function---------- */







	/*
	-------------------------------
			Update child
			@return Boolean
	-------------------------------
	*/

	public static function update($childID,$name,$surname,$age,$wish,$skills,$diagnosis,$phone,$address,$image,$status = 1,$total,$tobuy){
		
		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "UPDATE ch_children SET  url = :url, name =:name,
		surname = :surname, age = :age, wish = :wish, skills = :skills,
		diagnosis = :diagnosis, phone = :phone, address = :address, image = :image, status = :status, total = :total, tobuy = :tobuy
		WHERE childID = :childID";


		//Query 
		$result = $db->prepare($sql);
		$result->bindParam(":childID",$childID,PDO::PARAM_INT);
		$result->bindParam(":url",$url,PDO::PARAM_STR);
		$result->bindParam(":name",$name,PDO::PARAM_STR);
		$result->bindParam(":surname",$surname,PDO::PARAM_STR);
		$result->bindParam(":age",$age,PDO::PARAM_INT);
		$result->bindParam(":wish",$wish,PDO::PARAM_STR);
		$result->bindParam(":diagnosis",$diagnosis,PDO::PARAM_STR);
		$result->bindParam(":phone",$phone,PDO::PARAM_STR);
		$result->bindParam(":address",$address,PDO::PARAM_STR);
		$result->bindParam(":image",$image,PDO::PARAM_STR);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->bindParam(":total",$total,PDO::PARAM_INT);
		$result->bindParam(":tobuy",$tobuy,PDO::PARAM_STR);

		return $result->execute();
	}	

	/* -----------end-function---------- */





	/*
	-------------------------------
			Delete Child
			@return Boolean
	-------------------------------
	*/

	public static function delete($childID){
		
		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "DELETE FROM ch_children WHERE childID = :childID";


		//Query 
		$result = $db->prepare($sql);
		$result->bindParam(":childID",$childID,PDO::PARAM_INT);

		return $result->execute();
	}	

	/* -----------end-function---------- */
}
?>
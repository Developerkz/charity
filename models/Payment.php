<?php
class Payment{




	/*
	* Get Payments
	* @return Array()
	*/
	public static function getList($status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$get = array();
		$i = 0;
		$sql = "SELECT * FROM ch_payments WHERE status = :status";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();

		//Rewrite to Array
		while($row = $result->fetch()){
			$get[$i]["paymentID"] = $row["paymentID"];
			$get[$i]["title"] = $row["title"];
			$get[$i]["img"] = $row["img"];
			$get[$i]["status"] = $row["status"];
			$i++;
		}

		return $get;
	}
	/*
	* end Function
	*/





	/*
	* Get Payment By ID
	* @return Array()
	*/
	public static function get($id,$status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$get = array();
		$i = 0;
		$sql = "SELECT * FROM ch_payments WHERE paymentID = :paymentID AND status = :status";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":paymentID",$id,PDO::PARAM_INT);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		return $result->fetch();
	}
	/*
	* end Function
	*/


}
?>
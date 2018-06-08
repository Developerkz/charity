<?php
class News{

	/*
	* Get News
	* @return Array()
	*/
	public static function getList($status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$get = array();
		$i = 0;
		$sql = "SELECT * FROM ch_news WHERE status = :status";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();

		//Rewrite to Array
		while($row = $result->fetch()){
			$get[$i]["newsID"] = $row["newsID"];
			$get[$i]["title"] = $row["title"];
			$get[$i]["url"] = $row["url"];
			$get[$i]["img"] = $row["img"];
			$get[$i]["description"] = $row["description"];
			$get[$i]["status"] = $row["status"];
			$get[$i]["seoDescription"] = $row["seoDescription"];
			$get[$i]["seoKeywords"] = $row["seoKeywords"];
			$get[$i]["oDate"] = $row["oDate"];
			$i++;
		}

		return $get;
	}
	/*
	* end Function
	*/


	/*
	* Get News By URL
	* @return Array()
	*/
	public static function getURL($url,$status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$get = array();
		$i = 0;
		$sql = "SELECT * FROM ch_news WHERE url = :url AND status = :status";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":url",$url,PDO::PARAM_STR);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		return $result->fetch();
	}
	/*
	* end Function
	*/

}
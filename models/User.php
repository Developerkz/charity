<?php
class User{


	/*
	-------------------------------
			Get Users
			@return Array()
	-------------------------------
	*/
	public static function getUsers($status = 1){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$get = array();
		$i = 0;
		$sql = "SELECT * FROM ch_users WHERE status = :status";


		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->execute();


		//Rewrite to massive
		while($row = $result->fetch()){
			$get[$i]["userID"] = $row["userID"];
			$get[$i]["name"] = $row["name"];
			$get[$i]["surname"] = $row["surname"];
			$get[$i]["email"] = $row["email"];
			$get[$i]["phone"] = $row["phone"];
			$get[$i]["password"] = $row["password"];
			$get[$i]["status"] = $row["status"];
			$get[$i]["regDate"] = $row["regDate"];
			$i++;
		}

		return $get;
	}

	/* -----------end-function---------- */





	/*
	-------------------------------
			Get User By ID
			@return Array()
	-------------------------------
	*/
	public static function getUserByID($userID){

		//Convertion to INTEGER
		$userID = intval($userID);

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "SELECT * FROM ch_users WHERE userID = :userID";


		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":userID",$userID,PDO::PARAM_INT);
		$result->execute();

		return $result->fetch();
	}

	/* -----------end-function---------- */










	/*
	-------------------------------
			Get User By Email
			@return Array()
	-------------------------------
	*/
	public static function getUserByEmail($email){


		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "SELECT * FROM ch_users WHERE email = :email";


		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->execute();

		return $result->fetch();
	}

	/* -----------end-function---------- */



	/*
	-------------------------------
			Add User
			@return Boolean
	-------------------------------
	*/
	public static function addUser($name,$surname,$email,$phone,$password){

		//Connection to DB
		$db = DB::getConnection();
		$status = 1;

		//Fields
		$password = Cipher::primary($password);
		$sql = "INSERT INTO ch_users ( name, surname, email, phone, password, regDate, status)
							   VALUES(:name,:surname,:email,:phone,:password, NOW(),  :status)";



		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":name",$name,PDO::PARAM_STR);
		$result->bindParam(":surname",$surname,PDO::PARAM_STR);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->bindParam(":phone",$phone,PDO::PARAM_STR);
		$result->bindParam(":password",$password,PDO::PARAM_STR);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		
		return $result->execute();
	}

	/* -----------end-function---------- */





	/*
	-------------------------------
			Update User
			@return Boolean
	-------------------------------
	*/
	public static function updateUser($userID,$name,$surname,$email,$phone,$password){

		//Convertion to INTEGER
		$userID = intval($userID);

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "UPDATE ch_users SET

			    name = :name, 
			    surname = :surname,
			    email = :email,
			    phone = :phone,
			    password = :password

				WHERE userID = :userID";



		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":userID",$userID,PDO::PARAM_INT);
		$result->bindParam(":name",$name,PDO::PARAM_STR);
		$result->bindParam(":surname",$surname,PDO::PARAM_STR);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->bindParam(":phone",$phone,PDO::PARAM_STR);
		$result->bindParam(":password",$password,PDO::PARAM_STR);
		
		return $result->execute();
	}

	/* -----------end-function---------- */









	/*
	-------------------------------
			Delete User
			@return Boolean
	-------------------------------
	*/
	public static function deleteUser($userID){

		//Convertion to INTEGER
		$userID = intval($userID);

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "DELETE FROM ch_users WHERE userID = :userID";


		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":userID",$userID,PDO::PARAM_INT);
		
		return $result->execute();
	}

	/* -----------end-function---------- */




	/*
	-------------------------------
			Check User Data
			@return user ID
	-------------------------------
	*/
	public static function checkUserData($email,$password){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "SELECT * FROM ch_users WHERE email = :email AND password = :password";
		$password = Cipher::primary($password);


		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->bindParam(":password",$password,PDO::PARAM_STR);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		$data = $result->fetch();

		return $data["userID"];
	}
	/* -----------end-function---------- */




	/*
	-------------------------------
			Check Email Exist
			@return user ID
	-------------------------------
	*/
	public static function checkEmailExist($email){

		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "SELECT count(*) FROM ch_users WHERE email = :email";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->execute();

		$data = $result->fetch();

		return $data[0];
	}
	/* -----------end-function---------- */

	/*
	-------------------------------
			Update Password
			@return user ID
	-------------------------------
	*/
	public static function updatePassword($email,$newPassword){


		//Connection to DB
		$db = DB::getConnection();

		//Fields
		$sql = "UPDATE ch_users SET password = :password
				WHERE email = :email";

		//Query
		$result = $db->prepare($sql);
		$result->bindParam(":email",$email,PDO::PARAM_STR);
		$result->bindParam(":password",$newPassword,PDO::PARAM_STR);
		
		return $result->execute();
	}

	/* -----------end-function---------- */





	/*
	-------------------------------
			User Authorization
			@return NULL
	-------------------------------
	*/
	public static function auth($userID){
		$userID = intval($userID);
		$_SESSION["user"] = $userID; 
	}

	/* -----------end-function---------- */


	/*
	-------------------------------
			User Authorization
			@return NULL
	-------------------------------
	*/
	public static function deleteAuth(){
		unset($_SESSION["user"]);
	}

	/* -----------end-function---------- */




	/*
	-------------------------------
			User Authorization
			@return NULL
	-------------------------------
	*/
	public static function isAuth(){
		if(isset($_SESSION["user"])){
			return true;
		}
		return false;
	}

	/* -----------end-function---------- */




	/*
	-------------------------------
			User Authorization
			@return NULL
	-------------------------------
	*/
	public static function getAuth(){
		if(isset($_SESSION["user"])){
			return $_SESSION["user"];
		}
		return false;
	}

	/* -----------end-function---------- */



	/*
	-------------------------------
			Cookie Authorization
			@return NULL
	-------------------------------
	*/
	public static function cookieAuth($userID){
		$year = 3600*24*365;
		setcookie('userCookie',$userID,time() + $year);
	}

	/* -----------end-function---------- */



	/*
	-------------------------------
			Delete Cookie Authorization
			@return NULL
	-------------------------------
	*/
	public static function deleteCookieAuth(){
		setcookie('userCookie','',time() - 60);
	}

	/* 

	
	/*
	-------------------------------
			Cookie Authorization
			@return NULL
	-------------------------------
	*/
	public static function isCookieAuth(){
		if(isset($_COOKIE["userCookie"])){
			return true;
		}
		else{
			return false;
		}
	}

	/* -----------end-function---------- */

}
?>
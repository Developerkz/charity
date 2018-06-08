<?php
class UserController{
	


	/*
	* Login page
	* @return HTML page
	*/
	public function methodLogin(){


		if(User::isAuth()){
			header("Location:/account");
		}

		//Fields
		$email = false;
		$password = false;

		//onClick Button
		if(Post::isButton("user_login")){
			$email = Post::getField("email");
			$password = Post::getField("password");

			$errors = array();

			//Validation
			if(!Validate::checkEmail($email)){
				$errors[] = Validate::errorEmail();
			}
			if(!Validate::checkPassword($password)){
				$errors[] = Validate::errorPassword();
			}

			$userID = User::checkUserData($email,$password);

			if(!$userID){
				$errors[] = Validate::errorLogin();
			}
			
			if(!$errors){
				User::auth($userID);

				if(Post::isField("remember") AND Post::getField("remember") == "iRemember"){
					User::cookieAuth($userID);
				}
				header("Location:/account");
			}
		}

		//Page
		include_once(P.'html/user/login.php');
		return true;
	}
	/*
	* end Function
	*/








	/*
	* Registration page
	* @return HTML page
	*/
	public function methodRegister(){

		if(User::isAuth()){
			header("Location:/account");
		}

		//Fields
		$name = false;
		$surname = false;
		$email = false;
		$phone = false;
		$password = false;
		$password_r = false;

		//onClick Button
		if(Post::isButton("user_register")){
			$name = Post::getField("name");
			$surname = Post::getField("surname");
			$email = Post::getField("email");
			$password = Post::getField("password");
			$phone = Post::getField("phone");
			$password_r = Post::getField("passwordr");

			$errors = array();

			//Validation
			if(!Validate::checkField($name,2)){
				$errors[] = Validate::errorField(2);
			}
			if(!Validate::checkField($surname,2)){
				$errors[] = Validate::errorField(2);
			}
			if(!Validate::checkField($phone,7)){
				$errors[] = Validate::errorPhone();
			}
			if(!Validate::checkEmail($email)){
				$errors[] = Validate::errorEmail();
			}
			if(!Validate::checkPassword($password)){
				$errors[] = Validate::errorPassword();
			}
			if($password != $password_r){
				$errors[] = Validate::repeatPassword();
			}
			if( User::checkEmailExist($email)){
				$errors[] = Validate::emailExist();
			}

			if(!$errors){
				User::addUser($name,$surname,$email,$phone,$password);
				$userID = User::checkUserData($email,$password);
				User::auth($userID);
				header("Location:/account");
			}
		}

		//Page
		include_once(P.'html/user/register.php');
		return true;
	}
	/*
	* end Function
	*/



	/*
	* Login page
	* @return HTML page
	*/
	public function methodRemind(){

		if(User::isAuth()){
			header("Location:/account");
		}

		//Fields
		$email = false;
		$message = false;


		//onClick Button
		if(Post::isButton("user_remind")){
			$email = Post::getField("email");

			$errors = array();

			if(!User::checkEmailExist($email)){
				$errors[] = Validate::notEmailExist();
			}
			if(!Validate::checkEmail($email)){
				$errors[] = Validate::errorEmail();
			}

			if(!$errors){
				$newPassword = Page::generatePassword();
				$newPassword = Cipher::primary($newPassword);
				User::updatePassword($email,$newPassword);
				$message = Validate::newPass();
			}
		}

		//Page
		include_once(P.'html/user/remind.php');
		return true;
	}
	/*
	* end Function
	*/






	/*
	* Logout 
	* @Location to other page
	*/
	public function methodLogout(){
		if(!User::isAuth()){
			header("Location:/login");
		}

		if(User::isCookieAuth()){
			User::deleteCookieAuth();
		}
		if(User::isAuth()){
			User::deleteAuth();
		}
		header("Location:/");
	}
	/*
	* end Function
	*/


	/*
	* Account
	* @return HTML page
	*/
	public function methodAccount(){
		if(!User::isAuth()){
			header("Location:/login");
		}

		$user = array();
		$user = User::getUserByID($_SESSION["user"]);

		$donates = array();
		$donates = Donate::getEmail($user["email"]);

		

		//Page
		include_once(P.'html/user/account.php');
		return true;
	}
	/*
	* end Function
	*/


	/*
	* Change Password
	* @return HTML page
	*/
	public function methodChange(){
		if(!User::isAuth()){
			header("Location:/login");
		}

		$user = array();
		$user = User::getUserByID($_SESSION["user"]);


		$password_o = false;
		$password = false;
		$password_r = false;

		//onClick Button
		if(Post::isButton("change_password")){

			$password_o = Post::getField("passwordo");
			$password = Post::getField("password");
			$password_r = Post::getField("passwordr");

			$errors = array();

			//Validation
			if(!Validate::checkPassword($password) AND !Validate::checkPassword($password_o)){
				$errors[] = Validate::errorPassword();
			}
			if($password != $password_r){
				$errors[] = Validate::repeatPassword();
			}
			if($user["password"] != Cipher::primary($password_o)){
				$errors[] = Validate::notCorrectPassword();
			}

			if(!$errors){
				$newPassword = Cipher::primary($password);
				User::updatePassword($user["email"],$newPassword);
				header("Location:/account");
			}
		}




		//Page
		include_once(P.'html/user/change.php');
		return true;
	}
	 /*
	* end Function
	*/
}
?>
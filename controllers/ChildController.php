<?php
class ChildController{



	/*
	* List of Children
	* @return HTML page
	*/
	public function methodList(){

		//Fields
		$children = array();
		$children = Child::getList();

		//Page
		include_once(P.'html/child/children.php');
		return true;
	}
	/*
	* end Function
	*/






	/*
	* View Child
	* @return HTML page
	*/
	public function methodView($url){
		
		//Fields
		$child = array();
		$child = Child::getURL($url);

		$uniqueID = $child["childID"].rand(10000,99999);

		if(!$child){Page::page404();}

		$donates = array();
		$donates = Donate::getChild($child["childID"]);

		$donate_money = 0;
		foreach ($donates as $dmoney) {
			$donate_money += $dmoney["total"];
		}


		$total_money = intval($child["total"]);
		$percentage = intval(($donate_money/$total_money)*100);
		$donate_people = count($donates);

		$payments = array();
		$payments = Payment::getList();


		$name = false;
		$surname = false;
		$email = false;
		$phone = false;
		$sum = false;
		$payment = false;

		if(Post::isButton("donate")){

			if(!User::isAuth()){
				$name = Post::getField("name");
				$surname = Post::getField("surname");
				$email = Post::getField("email");
				$phone = Post::getField("phone");
				$password = Page::generatePassword();

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
				if( User::checkEmailExist($email)){
					$errors[] = Validate::emailExist2();
				}

				if(!$errors){
					User::addUser($name,$surname,$email,$phone,$password);
				}
			}
			else{
				$userID = User::getUserByID($_SESSION["user"]);
				$email = $userID["email"];
			}

			$sum = Post::getField("sum");
			$payment = Post::getField("payment");


			Donate::add($email,$sum,$payment,$child["childID"],$uniqueID);
			header("Location:/donate/".$uniqueID);
		}


		//Page
		include_once(P.'html/child/child.php');
		return true;
	}
	/*
	* end Function
	*/







	/*
	* Donate View
	* @return HTML page
	*/
	public function methodDonate($id){

		//Convertion to integer
		$id = intval($id);


		//Donate Information
		$donate = array();
		$donate = Donate::getUID($id);

		//User Information
		$donateUser = array();
		$donateUser = User::getUserByEmail($donate["email"]);

		//Child Information
		$child = array();
		$child = Child::get($donate["childID"]);

		//Payment Information
		$payment = array();
		$payment = Payment::get($donate["paymentID"]);


		//Page
		include_once(P.'html/child/donate.php');
		return true;
	}

	/*
	* end Function
	*/



}
?>
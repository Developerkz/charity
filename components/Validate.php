<?php
class Validate{
    public static function checkField($value,$size){
        if (strlen($value) >= $size) {
            return true;
        }
        return false;
    }
	public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }

    public static function errorField($size){
        return "Введите поле больше $size символов(-а)";
    }
    public static function errorEmail(){
    	return "Неправильный Email";
    }
    public static function errorPhone(){
        return "Введите свой телефон номер корректно";
    }
    public static function errorPassword(){
    	return "Введите пароль больше 8 символов";
    }
    public static function errorLogin(){
    	return "Неверный Email и(или) пароль";	
    }
    public static function repeatPassword(){
        return "Пароли не совпадают";  
    }
    public static function emailExist(){
        return "Такой Email уже зарегистрирован";  
    }
    public static function emailExist2(){
        return "Такой Email уже зарегистрирован! Пожалуйста сделайте вход";  
    }
    public static function newPass(){
        return "На ваш Email отправлен новый пароль";  
    }
    public static function notEmailExist(){
        return "Такой Email не зарегистрирован";
    }
    public static function notCorrectPassword(){
        return "Неверный пароль";
    }
}
?>
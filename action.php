<?php
include "db.inc.php";
if($_POST && $_POST['reg']){
	class Register{
	public $name;
	public $fam;
	public $login;
	public $password;

	function __construct($name1,$fam1,$login1,$password1){
		$this->name=$name1;
		$this->fam=$fam1;
		$this->login=$login1;
		$this->password=$password1;
	}
}

	$passLength=10;
	function number($str){
		$num=0;
		for($i=0;$i<strlen($str);++$i){
			if(preg_match('/^[0-9]$/', $str[$i])){
				$num+=1;

			}
		}
		if($num>=2){return true;}
		else{return false;}
	}

	function largeLetter($str){
		$num=0;
		for($i=0;$i<strlen($str);++$i){
			if(preg_match('/^[A-Z]|[А-Я]$/', $str[$i])){
				$num+=1;

			}
		}
		if($num>=2){return true;}
		else{return false;}
	}

	$required=array('name','fam','login','password','password2');

	$error=false;
	$comment;
		for($i=0;$i<count($required);++$i){
			$comment[$required[$i]]="";
		}
	foreach ($_POST as $key => $value) {
		${$key}=trim($value);
	}
	if(empty($name)){
		$error=true;
		$comment['name']='Введите имя!';
	}
	else if(!preg_match('/^[а-яА-ЯёЁ]|[a-zA-Z]$/', $name)){
		$error=true;
		$comment['name']="Недопустимые символы в имени!";
	}

	if(empty($fam)){
		$error=true;
		$comment['fam']="Введите фамилию!";
	}
	else if(!preg_match('/^[а-яА-ЯёЁ]|[a-zA-Z]$/', $fam)){
		$error=true;
		$comment['fam']="Недопустимые символы в фамилии!";
	}

	if(empty($login)){
		$error=true;
		$comment['login']="Введите логин!";
	}
	else if(strlen($login)<6){
		$error=true;
		$comment['login']="Количество символов должно быть >6!";
	}
	else{
		$sql="SELECT id FROM register WHERE login='".$login."'";
		$i=$pdo->query($sql)->fetch();
		if($i!=0){
			$error=true;
			$comment['login']="Такой логин уже существует!";
		}
	}

	$hash=password_hash($password,PASSWORD_DEFAULT);
	if(empty($password)){
		$error=true;
		$comment['password']="Введите пароль!";
	}
	else if(!number($password)){
		$error=true;
		$comment['password']="В пароле должны содержаться минимум 2 цифры!";
	}
	else if(!largeLetter($password)){
		$error=true;
		$comment['password']="В пароле должны содержаться минимум 2 заглавные буквы!";
	}
	else if(strlen($password)<10){
		$error=true;
		$comment['password']='Количество символов должно быть >'.$passLength.'!';
	}

	if(empty($password2)){
		$error=true;
		$comment['password2']="Повторите пароль!";
	}
	else if(!password_verify($password2,$hash)){
		$error=true;
		$comment['password2']="Пароль не верный!";
	}


	if(!$error){
		$sql="SELECT MAX(id) as max FROM register";
		$max=$pdo->query($sql)->fetch();
		$max=$max['max']+1;
		$reg=new Register($name, $fam, $login, $hash);
		$sql="INSERT INTO register(`id`, `name`, `fam`, `login`, `password`) VALUES('".$max."','".$reg->name."','".$reg->fam."','".$reg->login."','".$reg->password."')";
		$pdo->exec($sql);
		header("Location: success.php");
	}
}


	
?>
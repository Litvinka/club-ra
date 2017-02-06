<?php

$error=false;
$write=0;
$requared=['nameAsk','famAsk','emailAsk','textAsk'];
$comment=array();
for($i=0;$i<count($requared);++$i){
			$comment[$requared[$i]]="";
	}

if(isset($_POST['submitAsk'])&& $_POST){
	foreach ($_POST as $key => $value) {
		${$key}=htmlspecialchars(trim($value));
	}
	if(empty($nameAsk)){
		$error=true;
		$comment['nameAsk']="Введите имя!";
	}
	elseif(!preg_match('/^[а-яА-ЯёЁ]|[a-zA-Z]$/', $nameAsk)){
		$error=true;
		$comment['nameAsk']="Недопустимые символы в имени!";
	}
	if(empty($famAsk)){
		$error=true;
		$comment['famAsk']="Введите фамилию!";
	}
	elseif(!preg_match('/^[а-яА-ЯёЁ]|[a-zA-Z]$/', $famAsk)){
		$error=true;
		$comment['famAsk']="Недопустимые символы в фамилии!";
	}
	if(empty($emailAsk)){
		$error=true;
		$comment['emailAsk']="Введите e-mail!";
	}
	else if(!preg_match("/^[0-9a-z!#$%&'*+-\/\=?^_`{}|~]+[-0-9a-z!#$%&'*+-\/\=?^_`{}|~]*[0-9a-z!#$%&'*+-\/\=?^_`{}|~]*@([0-9a-z][-0-9a-z]{0,61}[0-9a-z]*\.)+[a-z]{2,6}$/",$emailAsk)){
		$error=true;
		$comment['emailAsk']="Недопустимый формат ввода!!";
	}
	if(empty($textAsk)){
		$error=true;
		$comment['textAsk']="Введите сообщение!";
	}

	if(!$error){
		$message = $textAsk; 
		$headers = "From: ".$emailAsk; 
		if (mail("lepelmdsmiles@mail.ru", "Новый вопрос", $message, $headers)) {
 		$write="Сообщение отправлено";
 		}
 		else {
		$write="При отправке сообщения возникла ошибка";
 		}
		 
		foreach ($_POST as $key => $value) {
			$value="";
			${$key}="";
		}
	}

}

?>
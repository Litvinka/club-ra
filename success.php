<?php  
		session_start();

		include_once("db.inc.php");


	if($_POST && $_POST['log']){
	$required1=array('login1','password3');
	$error=false;
	$comment1;
		for($i=0;$i<count($required1);++$i){
			$comment1[$required1[$i]]="";
		}
	foreach ($_POST as $key => $value) {
		${$key}=trim($value);
	}
	if(empty($login1)){
		$error=true;
		$comment1['login1']="Введите логин!";
	}
	else{

		$sql="SELECT id FROM register WHERE login='".$login1."'";
		$i=$pdo->query($sql)->fetch();
		
		if($i>0){
			echo $i['id'];
		}
		else{
			$comment1['login1']="Неверный логин!";
			$error=true;
		}
	}

	$hash=password_hash($password3,PASSWORD_DEFAULT);
	if(empty($password3)){
		$error=true;
		$comment1['password3']="Введите пароль!";
	}
	else{
		$sql="SELECT password FROM register WHERE login='".$login1."'";
		$i=$pdo->query($sql)->fetch();
			if(password_verify($password3,$i['password'])){
				echo "All right!";
			}
			else{
				$comment1['password3']="Неверный пароль!";
				$error=true;
			}
	}

	if(!$error){
		$_SESSION['login']=$login1;
		if($_SESSION['login']=="admin1"){
			header("Location:news.admin.php");
		}
		else{
			header("Location:index.php");}
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Вход</title>
</head>

<body>

	<article id="in">
	<button id="main"><a href="index.php">На главную</a></button>
		<form method="post" id="loginForm">
			<label for="login" action>Логин</label><span class="star">*</span>
			<span class="com"><?php if($_POST){echo $comment1['login1'];} ?></span>
			<p><input type="" id="login1" name="login1" value="<?php if($_POST && isset($_POST['login1'])){echo $login1;} ?>"></p>
			<label for="password">Пароль</label><span class="star">*</span>
			<span class="com"><?php if($_POST){echo $comment1['password3'];} ?></span>
			<p><input type="password" name="password3" id="password3" value="<?php if($_POST && isset($_POST['password3'])){echo $password3;} ?>"></p>
			<p><input type="submit" name="log" id="log" value="войти"></p>
		</form>
	</article>

</body>
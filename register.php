<?php
session_start();
include "action.php"; ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" type="text/css" rel="stylesheet">
<title>Регистрация</title>
</head>

<body>
<button id="main"><a href="index.php">На главную</a></button>
	<article id="in">
		<form method="post" id="registerForm">
			<label for="name" action>Имя</label><span class="star">*</span>
			<span class="com"><?php if($_POST){echo $comment['name'];} ?></span>
			<p><input type="name" id="name" name="name" value="<?php if($_POST && isset($_POST['name'])){echo $name;} ?>"></p>
			<label for="fam" action>Фамилия</label><span class="star">*</span>
			<span class="com"><?php if($_POST){echo $comment['fam'];} ?></span>
			<p><input type="" id="fam" name="fam" value="<?php if($_POST && isset($_POST['fam'])){echo $fam;} ?>"></p>
			<label for="login" action>Логин</label><span class="star">*</span>
			<span class="com"><?php if($_POST){echo $comment['login'];} ?></span>
			<p><input type="" id="login" name="login" value="<?php if($_POST && isset($_POST['login'])){echo $login;} ?>"></p>
			<label for="password">Пароль</label><span class="star">*</span>
			<span class="com"><?php if($_POST){echo $comment['password'];} ?></span>
			<p><input type="password" name="password" id="password" value="<?php if($_POST && isset($_POST['password'])){echo $password;} ?>"></p>
			<label for="password2">Повторите пароль</label><span class="star">*</span>
			<span class="com"><?php if($_POST){echo $comment['password2'];} ?></span>
			<p><input type="password" name="password2" id="password2" value="<?php if($_POST && isset($_POST['password2'])){echo $password2;} ?>"></p>
			<p><input type="submit" name="reg" id="reg" value="зарегистрироваться"></p>
		</form>
	</article>

</body>
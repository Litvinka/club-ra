<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Контакты</title>
</head>

<?php
	include "Ask.php";
?>
<body>
	<?php
		include "header.php";
	?>
	<article class="main" id="kontakty">
		<section>
			<h1 class="section">Контакты:</h1>
			<figure id="leader">
				<img src="image/leader.jpg" height="350px">
				<section id="leaderInfo">
					<p><span class="pBlue">Руководитель клуба:</span> Радько Виктор Николаевич<br>
						Педагог высшей категории<br>
						Педагогический стаж - 20 лет.
					</p>
					<p><span class="pBlue">Телефон: </span>+375 29 214-23-26<br>
						<span class="pBlue">e-mail: </span><a style="color:#241071" href="mailto:Radko68@mail.ru">Radko68@mail.ru</a>
					</p>
					<p><span class="pBlue">Часто задаваемые вопросы:</span>
						<ul>
							<li>1. -С какого возраста можно записать ребёнка в интеллектуальны клуб?
							<ul>
								<li style="margin-bottom:10px">Дети с 3 по 11 класс.</li>
							</ul>
							</li>
							<li>2. -По каким дням?
								<ul>
									<li>Младшая группа (3-4 классы) - пн-ср с 14-00 до 15-30,</li>
									<li>Средняя группа (5-7 классы) - пн, ср с 15-50 до 18-20,</li>
									<li>Старшая группа (8-11 классы) - вт, чт с 15-50 до 18-20,</li>
									<li>Занятия в гимназии - пт с 13-00 до 15-00.</li>
								</ul>
							</li>
						</ul>
					</p>
				</section>
			</figure>
			<section id="mapAndForm">
					<figure id="map">
						<h2>Как добраться:</h2>
						<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=G68X7HEvn0ygpNBDhwew77G0-sLpLDxS&width=90%&height=383&lang=ru_RU&sourceType=constructor"></script>
					</figure>
					<figure id="formAsk">
						<h2>Есть вопросы?</h2>
						<form id="Ask" method="post">
							<label for="nameAsk">Имя</label>
	 						<span class="star">*</span>
	 						<span class="commentAsk"><?php echo $comment['nameAsk']; ?></span>
							<p><input type="text" name="nameAsk" id="nameAsk" value="<?php if(isset($_POST['nameAsk'])){echo $nameAsk;} ?>"></p>

							<label for="famAsk">Фамилия</label>
	 						<span class="star">*</span>
	 						<span class="commentAsk"><?php echo $comment['famAsk']; ?></span>
							<p><input type="text" name="famAsk" id="famAsk" value="<?php if(isset($_POST['famAsk'])){echo $famAsk;} ?>"></p>

							<label for="emailAsk">e-mail</label>
	 						<span class="star">*</span>
	 						<span class="commentAsk"><?php echo $comment['emailAsk']; ?></span>
							<p><input type="email" name="emailAsk" id="emailAsk" value="<?php if(isset($_POST['emailAsk'])){echo $emailAsk;} ?>"></p>

							<label for="textAsk">Вопрос</label>
	 						<span class="star">*</span>
	 						<span class="commentAsk"><?php echo $comment['textAsk'];?></span>
							<p><textarea name="textAsk" rows="5" cols="24" style="resize:none;"><?php if(isset($_POST['textAsk'])){echo $textAsk;} ?></textarea></p>
							<p><input type="submit" name="submitAsk" id="submitAsk" value="задать вопрос"></p>
						</form>
						<?php if($write!=0){echo $write;} ?>
					</figure>
			</section>
		</section>	
		
	</article>

	<?php
		include "footer.php";
	?>

<script>
	var k=document.querySelector('navOpen');
	if(k){k.setAttribute('class','');}
	document.getElementById("navAbout").setAttribute('class', 'navOpen');
	var s=document.getElementsByClassName('navOpen')[0];
	s.style.backgroundColor="#f60017";
	document.getElementById("navAbout").querySelector("a").setAttribute("href","#");
</script>
<script src="JS/gamburger.js"></script>
</body>
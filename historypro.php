<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>История</title>
</head>
<body>
<?php
	include "header.php"
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li id="localnavOpen"><a href="#">история</a></li>
			<li><a href="rules.php">правила</a></li>
			<li><a href="resultpro.php">результаты</a></li>
		</ul>
	</nav>
	<section id="historypro">
		<h1 class="section">История:</h1>
		<h4>Кубок PROвинции - республиканский проект, рассчитанный на возрастные категории от 4 до 11 классов. </h4>
		<h4>Кубок PROвинции ведёт свой отсчёт с 1997 года. Один раз их было 2 в году. В 2016 году будет юбилейный 20 турнир. С 2005 года турнир стал республиканским и на данное время собирает до 39 команд со всей страны (Гомель, Минск, Витебск, Полоцк, Борисов, Смолевичи, Логойск, Чашники, Миоры, Городок...).</h4>
		<h4>Турнир неоднократно номинировался как Лучший турнир года БЛИК. Проект позиционирует себя как инновационная площадка для опробования новых форм интеллектуальных игр.</h4>
		<figure class="hfoto">
			<img src="image/КубокПровинции/ALP_4994.jpg" alt="Кубок PROвинции - 2015" title="Кубок PROвинции - 2015">
		</figure>
		<figure class="hfoto">
			<img src="image/КубокПровинции/ALP_48871.jpg" alt="Кубок PROвинции - 2015" title="Кубок PROвинции - 2015">
		</figure>
		<figure class="hfoto">
			<img src="image/КубокПровинции/ALP_5047.jpg" alt="Кубок PROвинции - 2015" title="Кубок PROвинции - 2015">
		</figure>
		<figure class="hfoto">
			<img src="image/КубокПровинции/ALP_5088.jpg" alt="Кубок PROвинции - 2015" title="Кубок PROвинции - 2015">
		</figure>
		<figure class="hfoto">
			<img src="image/КубокПровинции/ALP_5110.jpg" alt="Кубок PROвинции - 2015" title="Кубок PROвинции - 2015">
		</figure>
		<figure class="hfoto">
			<img src="image/КубокПровинции/ALP_5125.jpg" alt="Кубок PROвинции - 2015" title="Кубок PROвинции - 2015">
		</figure>
	</section>
</article>

<?php
	include "footer.php"
?>


<script>
	var k=document.querySelector('navOpen');
	if(k){k.setAttribute('class','');}
	document.getElementById("navPro").setAttribute('class', 'navOpen');
	var s=document.getElementsByClassName('navOpen')[0];
	s.style.backgroundColor="#f60017";
	var d=s.getElementsByTagName("li")[0].style.backgroundColor="#f60017";
</script>
<script src="JS/gamburger.js"></script>
</body>
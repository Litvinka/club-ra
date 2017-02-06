<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Летопись клуба интеллектуалов "РА"</title>
</head>
<body>
<?php
	include "header.php"
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li id="localnavOpen"><a href="#">летопись</a></li>
			<li ><a href="graduates.php">выпускники клуба</a></li>
			<li><a href="students.php">герои нашего времени</a></li>
			<li><a href="achievements.php">наши достижения</a></li>
		</ul>
	</nav>
	<section id="letopis">
		<h1 class="section">Летопись:</h1>
		<h4>Клуб создан Виктором Радько в декабре 1997 года на общественных началах. Первым серьёзным испытанием для клуба стал, в том же декабре, 1-ый областной интеллектуальный турнир с приглашением 7 городов Витебской области. Первые игры Виктору Радько помогал проводить Сергей Кухто, который тогда работал в Лепеле в РДК, а сейчас - один из генеральных директоров белорусского ТВ.</h4>
		<figure class="letfoto">
			<img src="image/letopis/berlin1.jpg">
			<figcaption>Мы - участники экологического проекта "Живая вода" в Берлине</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/berlin2.jpg">
			<figcaption>Мы - участники экологического проекта "Живая вода" в Берлине</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/pohod.jpg">
			<figcaption>Выход клуба "Ра" на природу</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/futbol.jpg">
			<figcaption>Мы играем в футбол</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/zapovednik.jpg">
			<figcaption>Знакомство с Березинским заповедником</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/vitebsk.jpg">
			<figcaption>Мы в Витебске</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/kubok2008.jpg">
			<figcaption>Кубок PROвинции - 2008</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/kubok2.jpg">
			<figcaption>Кубок PROвинции</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/kubok4.jpg">
			<figcaption>Кубок PROвинции</figcaption>
		</figure>
		<figure class="letfoto">
			<img src="image/letopis/kubok3.jpg">
			<figcaption>Кубок PROвинции</figcaption>
		</figure>
	</section>
</article>



<?php
	include "footer.php"
?>


<script>
	var k=document.querySelector('navOpen');
	if(k){k.setAttribute('class','');}
	document.getElementById("navClub").setAttribute('class', 'navOpen');
	var s=document.getElementsByClassName('navOpen')[0];
	s.style.backgroundColor="#f60017";
	var d=s.getElementsByTagName("li")[0].style.backgroundColor="#f60017";
</script>
<script src="JS/gamburger.js"></script>
</body>
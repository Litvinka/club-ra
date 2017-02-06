<?php
include "resultpro.inc.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>кубок Фартуны</title>
</head>
<body>
<?php
	include "header.php"
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li><a href="igraal.php">интеллектуальный играаль</a></li>
			<li id="localnavOpen"><a href="#">кубок Фартуны</a></li>
			<li><a href="apple.php">яблоня познания</a></li>
		</ul>
	</nav>
	<section id="igraal">
		<h1 class="section">Кубок Фартуны</h1>
		<h4>Проект Кубок Фартуны - интеллектуальное ЧГК для школ по номинациям - дюймы - мини - ювеналы - юниоры.</h4>
		<figure class="hfoto">
			<img src="image/фортуна/1.jpg" alt="Кубок Фартуны" title="Кубок Фартуны">
		</figure>
		<figure class="hfoto">
			<img src="image/фортуна/2.jpg" alt="Кубок Фартуны - 2008" title="Кубок Фартуны">
		</figure>
	</section>
</article>

<?php
	include "footer.php"
?>


<script>
	var k=document.querySelector('navOpen');
	if(k){k.setAttribute('class','');}
	document.getElementById("navProect").setAttribute('class', 'navOpen');
	var s=document.getElementsByClassName('navOpen')[0];
	s.style.backgroundColor="#f60017";
	var d=s.getElementsByTagName("li")[1].style.backgroundColor="#f60017";
</script>
<script src="JS/gamburger.js"></script>
</body>
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
<title>Интеллектуальный играаль</title>
</head>
<body>
<?php
	include "header.php"
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li id="localnavOpen"><a href="#">интеллектуальный играаль</a></li>
			<li><a href="fartuna.php">кубок Фартуны</a></li>
			<li><a href="apple.php">яблоня познания</a></li>
		</ul>
	</nav>
	<section id="igraal">
		<h1 class="section">Интеллектуальный играаль</h1>
		<h4>Интеллектуальный играаль - проект для школ. Состязаются представители одной параллели.</h4>
		<figure class="hfoto">
			<img src="image/играаль/1.jpg" alt="Интеллектуальный играаль" title="Интеллектуальный играаль">
		</figure>
		<figure class="hfoto">
			<img src="image/играаль/2.jpg" alt="Интеллектуальный играаль" title="Интеллектуальный играаль">
		</figure>
		<figure class="hfoto">
			<img src="image/играаль/3.jpg" alt="Интеллектуальный играаль" title="Интеллектуальный играаль">
		</figure>
		<figure class="hfoto">
			<img src="image/играаль/4.jpg" alt="Интеллектуальный играаль" title="Интеллектуальный играаль">
		</figure>
		<figure class="hfoto">
			<img src="image/играаль/7.jpg" alt="Интеллектуальный играаль" title="Интеллектуальный играаль">
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
	var d=s.getElementsByTagName("li")[0].style.backgroundColor="#f60017";
</script>
<script src="JS/gamburger.js"></script>
</body>
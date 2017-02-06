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
<title>Яблоня познания</title>
</head>
<body>
<?php
	include "header.php"
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li><a href="igraal.php">интеллектуальный играаль</a></li>
			<li><a href="fartuna.php">кубок Фартуны</a></li>
			<li id="localnavOpen"><a href="#">яблоня познания</a></li>
		</ul>
	</nav>
	<section id="igraal">
		<h1 class="section">Яблоня познания</h1>
		<h4>Яблоня познания - семейный проект, рассчитанный на совместную игру в одной команде родителей и детей.</h4>
		<figure class="hfoto">
			<img src="image/яблоня/1.jpg" alt="Яблоня познания" title="Яблоня познания">
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
	var d=s.getElementsByTagName("li")[2].style.backgroundColor="#f60017";
	document.getElementById('localnavOpen').style.borderBottom="solid 3px #241071";
</script>
<script src="JS/gamburger.js"></script>
</body>
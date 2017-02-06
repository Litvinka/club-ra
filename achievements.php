<?php
	include"achievements.inc.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Наши достижения:</title>
</head>
<body>
<?php
	include "header.php"
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li><a href="letopis.php">летопись</a></li>
			<li><a href="graduates.php">выпускники клуба</a></li>
			<li><a href="students.php">герои нашего времени</a></li>
			<li id="localnavOpen"><a href="#">наши достижения</a></li>
		</ul>
	</nav>
	<section id="achievements">
		<h1 class="section">Наши достижения:</h1>
		<section class="all">
		<?php 
		$num=($step-1)*6;
		for($i=0;$i<6 && $num<$max;++$i) { ?>
			<figure class="achievement">
				<img src="<?php echo $ach[$i]->url; ?>" alt="">
				<hgroup>
					<figcaption><?php echo $ach[$i]->name; ?></figcaption>
					<h4>Завоевала команда: </h4>
					<p class='pAchievement'><?php echo $ach[$i]->team; ?></p>
					<h4 class="adate">Дата: <span><?php echo $ach[$i]->date; ?></span></h4>
				</hgroup>
			</figure>
		<?php $num++;} ?>
		</section>
		<section class="pageNav">
			<?php include "pageNav.inc.php"; ?>
		</section>
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
	var d=s.getElementsByTagName("li")[3].style.backgroundColor="#f60017";
	document.getElementById('localnavOpen').style.borderBottom="solid 3px #241071";
</script>
<script src="JS/gamburger.js"></script>
</body>
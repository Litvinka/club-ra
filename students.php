<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Герои нашего времени</title>
</head>
<body>
<?php
	include "header.php";
	include "students.inc.php";
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li><a href="letopis.php">летопись</a></li>
			<li><a href="graduates.php">выпускники клуба</a></li>
			<li id="localnavOpen"><a href="#">герои нашего времени</a></li>
			<li><a href="achievements.php">наши достижения</a></li>
		</ul>
	</nav>
	<section id="graduates">
		<h1 class="section">Герои нашего времени:</h1>
		<section class="all">
			<?php 
			$num=($step-1)*9;
			for($i=0;$i<9 && $num<$max;++$i) { ?>
				<figure class="graduate">
					<img src="<?php echo $students[$i]->photo; ?>" alt="<?php echo $students[$i]->FIO; ?>">
					<figcaption><?php echo $students[$i]->FIO; ?></figcaption>
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
	var d=s.getElementsByTagName("li")[2].style.backgroundColor="#f60017";
</script>
<script src="JS/gamburger.js"></script>
</body>
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
<title>Результаты Кубка PROвинции</title>
</head>
<body>
<?php
	include "header.php"
?>

<article class="main1">
	<nav class="localnav">
		<ul class="localnavUl">
			<li><a href="historypro.php">история</a></li>
			<li><a href="rules.php">правила</a></li>
			<li id="localnavOpen"><a href="#">результаты</a></li>
		</ul>
	</nav>
	<section id="resultpro">
		<h1 class="section">Результаты:</h1>
		<?php for($i=0;$i<$max;++$i){ ?>
		<section class="resultP">
			<h3><?php echo $res[$i]->name;?></h3>
			<h4 class="resh3"><b>1 место (Лепель):</b></h4>
			<?php if($res[$i]->duimy!=0){ ?>
			<h4><b>Дюймы: </b><?php echo $res[$i]->duimy; ?></h4>
			<?php } ?>
			<h4><b>Мини: </b><?php echo $res[$i]->mini; ?></h4>
			<h4><b>Ювеналы: </b><?php echo $res[$i]->uv; ?></h4>
			<h4><b>Юниоры: </b><?php echo $res[$i]->un;?></h4>
			<h4 class="resh3"><b>1 место (внешний зачет):</b></h4>
			<?php if($res[$i]->duimyOut!=0){ ?>
			<h4><b>Дюймы: </b><?php echo $res[$i]->duimyOut; ?></h4>
			<?php } ?>
			<h4><b>Юниоры: </b><?php echo $res[$i]->un; ?></h4>
			<h4><b>Мини: </b><?php echo $res[$i]->miniOut; ?></h4>
			<h4><b>Ювеналы: </b><?php echo $res[$i]->uvOut; ?></h4>
			<h4><b>Юниоры: </b><?php echo $res[$i]->unOut; ?></h4>
			<a href="<?php echo $res[$i]->doc; ?>">Скачать</a>
		</section>
		<?php } ?>
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
	var d=s.getElementsByTagName("li")[2].style.backgroundColor="#f60017";
	document.getElementById('localnavOpen').style.borderBottom="solid 3px #241071";
</script>
<script src="JS/gamburger.js"></script>
</body>
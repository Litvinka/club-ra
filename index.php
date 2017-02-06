<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="bxslider/jquery.bxslider.min.js"></script>
<link href="bxslider/jquery.bxslider.css" rel="stylesheet" />
<title>Клуб интеллектуалов "РА"</title>
<script type="text/javascript">
	$(document).ready(function(){
	  $('.bxslider').bxSlider({
	  	auto:true
	  });
	});
</script>

</head>
<body>
	<?php
		include "header.php";
		include "news.inc.php";
		include "search.inc.php";
		include "anons.inc.php";
	?>
	<figure class="slider">
		<ul class="bxslider">
		  <li><img src="image/pic1.jpg" alt="Кубки"/></li>
		  <li><img src="image/pic2.jpg" alt="Кубки"/></li>
		  <li><img src="image/pic3.jpg" alt="Кубки"/></li>
		</ul>
	</figure>

	<article class="main">
		<section id="news">
			<h1 class="section">Новости клуба:</h1>
			<figure id="newsMain">
				<img src="<?php echo $new[0]->url; ?>">
				<hgroup class="newsM">
					<figcaption><a href='<?php echo "onenews.php?news=".$new[0]->id;?>'><?php echo $new[0]->name; ?></a></figcaption>
					<p><?php echo $new[0]->news; ?>
					</p>
					<section class="newsInfo">
						<span class="date">Дата: <?php echo $new[0]->dat; ?></span>
						<a href='<?php echo "onenews.php?news=".$new[0]->id;?>'><button>читать</button></a>
					</section>
				</hgroup>
			</figure>
		<?php
			for($i=1;$i<5;++$i) {
		?>
			<figure class="news">
				<img src="<?php echo $new[$i]->url; ?>">
					<hgroup class="newsM">
						<figcaption><a href='<?php echo "onenews.php?news=".$new[$i]->id;?>'><?php echo $new[$i]->name; ?></a></figcaption>
						<p><?php echo $new[$i]->news; ?>
						</p>
						<section class="newsInfo">
							<span class="date">Дата: <?php echo $new[$i]->dat; ?></span>
							<a href='<?php echo "onenews.php?news=".$new[$i]->id;?>'><button>читать</button></a>
						</section>
					</hgroup>
			</figure>
		<?php
			}
		?>
		</section>
		<section id="anons">
			<h1 class="section">Анонс:</h1>
			<?php
				for($i=0;$i<3;++$i) {
			?>
			<figure class="anons">
				<img width="114px" height="76px" src="<?php echo $anons[$i]->url;?>">
				<a href='<?php echo "oneanons.php?anons=".$anons[$i]->id;?>'><figcaption><?php echo $anons[$i]->txt; ?></figcaption></a>
			</figure>
			<?php
				}
			?>
		</section>
	</article>

	<?php
		include "footer.php";
	?>

<script>
	document.getElementById("flogo").querySelector("a").setAttribute("href","#");
	document.getElementById("h1").querySelector("a").setAttribute("href","#");
	document.getElementById("h1").getElementsByTagName("a")[1].setAttribute("href","#");
	document.getElementById("h1").getElementsByTagName("a")[2].setAttribute("href","#");
</script>
<script src="JS/gamburger.js"></script>
</body>
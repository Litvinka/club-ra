<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Результаты поиска</title>
</head>
<body>
<?php
	include "header.php";
	include_once("db.inc.php");
	include "search.inc.php";
?>
<article id="sresult">
	<section id="searchresult">
		<h4 class="notText">Результаты поиска по запросу <b><?php echo $word;?></b>: </h4>
	</section>
	<?php if($num==0){ 
		echo "К сожалению, по вашему запросу ничего не найдено!";} 
		else{
			$d=($step-1)*10;
			for($i=0;$i<10 && $d<$num;++$i){?>
			<ul id="results">
				<li><a href="<?php echo $s[$d]->url;?>">
				<h4 class="searchName"><?php echo $s[$d]->name; ?></h4>
				<h4 class="searchText"><?php echo $s[$d]->text; ?></h4></a>
			</ul>
		<?php ++$d;} ?>
		<section class="pageNav" style="padding-top:45px;">
			<?php include "pageNav.inc.php"; ?>
		</section>
		<?php }?>
		
</article>

<?php
	include "footer.php";
?>
<script src="JS/gamburger.js"></script>
</body>
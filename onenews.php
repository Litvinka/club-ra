<?php

if($_GET && $_GET['news']){
	$news=$_GET['news'];
}
else{
	$news=1;
}
include_once "db.inc.php";

$sql="SELECT * FROM новости WHERE id='".$news."'";
$new=$pdo->query($sql)->fetch();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title><?php echo $new['name']; ?></title>
</head>
<body>
	<?php
		include "header.php";
	?>
	<article class="main" id="onenews">
		<section>
			<h1 class="section"><?php echo $new['name']; ?></h1>
			<figure class="onenews">
				<img src="<?php echo $new['url'];?>">
				<h4><?php echo $new['news']; ?></h4>
			    <h5><?php echo $new['dat']; ?></h5>
			</figure>	
		</section>	
		
	</article>

	<?php
		include "footer.php";
	?>
<script src="JS/gamburger.js"></script>
</body>
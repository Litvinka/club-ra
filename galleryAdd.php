<?php
include_once "db.inc.php";

$sql='SELECT * FROM галерея';
$data=$pdo->query($sql);
while($row=$data->fetch()){
	$name[]=$row['Название'];
	$urlS[]=$row['Url_small'];
	$urlL[]=$row['Url_large'];
}
$pdo=0;

if($_GET && $_GET['move']==1){
		if($_GET && $_GET['page']){
		$page=(int)$_GET['page'];
	}
	else{
		$page=1;
	}
	$n=($page-1)*10+1;
 	for($k=0;$k<10 && $n<count($urlS);++$k) {
 	printf("<figure class='photo'>
				<img id='%s' src='%s' alt='%s'>
				<figcaption>%s</figcaption>
			</figure>",$n,$urlS[$n],$name[$n],$name[$n]);
 	$n++;
	}
	exit(); 
}
?>
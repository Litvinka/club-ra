<?php
	include_once "db.inc.php";
	if($_GET && isset($_GET['step'])){
		$step=$_GET['step'];
	}
	else{
		$step=1;
	}
	$num=0;
	
	class SEARCH{
		public $name;
		public $text;
		public $url;

		function __construct($name, $text, $url){
			$this->name=$name;
			$this->text=$text;
			$this->url=$url;
		}
	}
	$word=$_SESSION['search'];
	$sql="SELECT id,name,news FROM новости WHERE name LIKE '%".$word."%' OR news LIKE '%".$word."%'";
	$resS=$pdo->query($sql)->fetchAll();
	$num=count($resS);
	for($i=0;$i<$num;++$i){
		$url="onenews.php?news=".$resS[$i]['id'];
		$s[]=new SEARCH($resS[$i]['name'],$resS[$i]['news'],$url);
	}
	$sql="SELECT id,txts,txt FROM анонс WHERE txts LIKE '%".$word."%' OR txt LIKE '%".$word."%'";
	$resS=$pdo->query($sql)->fetchAll();
	$num+=count($resS);
	for($i=0;$i<count($resS);++$i){
		$url="oneanons.php?anons=".$resS[$i]['id'];
		$s[]=new SEARCH($resS[$i]['txts'],$resS[$i]['txt'],$url);
	}
	$sql="SELECT name,team,date FROM достижения WHERE name LIKE '%".$word."%' OR team LIKE '%".$word."%'";
	$url="achievements.php";
	$resS=$pdo->query($sql)->fetchAll();
	$num+=count($resS);
	for($i=0;$i<count($resS);++$i){
		$s[]=new SEARCH($resS[$i]['name'],$resS[$i]['team']." ".$resS[$i]['date'],$url);
	}
	$sql="SELECT Название FROM галерея WHERE Название LIKE '%".$word."%'";
	$url="gallery.php";
	$resS=$pdo->query($sql)->fetchAll();
	$num+=count($resS);
	for($i=0;$i<count($resS);++$i){
		$s[]=new SEARCH($resS[$i]['Название']," Изображение. ",$url);
	}
	$sql="SELECT FIO FROM героинашеговремени WHERE FIO LIKE '%".$word."%'";
	$url="students.php";
	$resS=$pdo->query($sql)->fetchAll();
	$num+=count($resS);
	for($i=0;$i<count($resS);++$i){
		$s[]=new SEARCH($resS[$i]['FIO']," Герои нашего времени. ",$url);
	}
	$sql="SELECT FIO,schoolend,univer,work FROM выпускники WHERE FIO LIKE '%".$word."%' OR schoolend LIKE '%".$word."%' OR univer LIKE '%".$word."%' OR work LIKE '%".$word."%'";
	$url="graduates.php";
	$resS=$pdo->query($sql)->fetchAll();
	$num+=count($resS);
	for($i=0;$i<count($resS);++$i){
		$s[]=new SEARCH($resS[$i]['FIO'],"Окончание школы:".$resS[$i]['schoolend'].". ".$resS[$i]['univer'].". ".$resS[$i]['work'],$url);
	}
	$url="search.php";
	$maxNum=$num/10;
?>
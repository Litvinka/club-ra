<?php
	include_once "db.inc.php";
	if(!$_GET){
		$step=1;
	}
	else{
		$step=$_GET['step'];
	}
	$url='achievements.php';
	$sql='SELECT MAX(id) as max FROM достижения';
	$max=$pdo->query($sql)->fetch();
	$max=$max['max'];
	$maxNum=($max)/6;
	class ACHIEVEMENT{
		public $name;
		public $team;
		public $date;
		public $url;

		function __construct($name, $team, $date, $url){
			$this->name=$name;
			$this->team=$team;
			$this->date=$date;
			$this->url=$url;
		}
	}
	$inp=($step-1)*6;
	$sql="SELECT * FROM достижения ORDER BY date DESC LIMIT :start, 6 ";
	 $STH = $pdo->prepare($sql);   
    $STH->bindParam(':start', $inp, PDO::PARAM_INT); 
    $STH->execute(); 
    $str=$STH->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($str);++$i){
		$ach[]=new ACHIEVEMENT($str[$i]['name'],$str[$i]['team'],$str[$i]['date'],$str[$i]['url']);	
	}
?>
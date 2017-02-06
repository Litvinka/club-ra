<?php
	include_once "db.inc.php";
	if(!$_GET){
		$step=1;
	}
	else{
		$step=$_GET['step'];
	}
	$url='students.php';
	$sql='SELECT MAX(id) as max FROM героинашеговремени';
	$max=$pdo->query($sql)->fetch();
	$max=$max['max'];
	$maxNum=($max)/9;
	class STUDENT{
		public $id;
		public $FIO;
		public $photo;

		function __construct($id, $FIO, $photo){
			$this->id=$id;
			$this->FIO=$FIO;
			$this->photo=$photo;
		}
	}
	$inp=($step-1)*9;
	$sql="SELECT * FROM героинашеговремени LIMIT :start, 9 ";
	$STH = $pdo->prepare($sql);   
    $STH->bindParam(':start', $inp, PDO::PARAM_INT); 
    $STH->execute(); 
    $str=$STH->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($str);++$i){
		$students[]=new STUDENT($str[$i]['id'],$str[$i]['FIO'],$str[$i]['photo']);	
	}
?>
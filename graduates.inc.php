<?php
	include_once "db.inc.php";
	if(!$_GET){
		$step=1;
	}
	else{
		$step=$_GET['step'];
	}
	$url='graduates.php';
	$sql='SELECT MAX(id) as max FROM выпускники';
	$max=$pdo->query($sql)->fetch();
	$max=$max['max'];
	$maxNum=($max)/9;
	class GRADUATE{
		public $id;
		public $FIO;
		public $photo;
		public $schoolend;
		public $univer;
		public $work;

		function __construct($id, $FIO, $photo, $schoolend ,$univer, $work){
			$this->id=$id;
			$this->FIO=$FIO;
			$this->photo=$photo;
			$this->schoolend=$schoolend;
			$this->univer=$univer;
			$this->work=$work;
		}
	}
	$inp=($step-1)*9;
	$sql="SELECT * FROM выпускники ORDER BY schoolend DESC LIMIT :start, 9 ";
	 $STH = $pdo->prepare($sql);   
    $STH->bindParam(':start', $inp, PDO::PARAM_INT); 
    $STH->execute(); 
    $str=$STH->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($str);++$i){
		$graduate[]=new GRADUATE($str[$i]['id'],$str[$i]['FIO'],$str[$i]['photo'],$str[$i]['schoolend'],$str[$i]['univer'],$str[$i]['work']);	
	}
?>
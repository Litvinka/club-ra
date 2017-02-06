<?php
	include_once "db.inc.php";
	if(!$_GET){
		$step=1;
	}
	else{
		$step=$_GET['step'];
	}
	$url='test.admin.php';
	$sql='SELECT MAX(id) as max FROM чгк';
	$max=$pdo->query($sql)->fetch();
	$max=$max['max'];
	$maxNum=($max)/10;
	class CGK{
		public $id;
		public $question;
		public $answer;
		public $answer2;
		public $comment;

		function __construct($id, $question, $answer, $answer2, $comment){
			$this->id=$id;
			$this->question=$question;
			$this->answer=$answer;
			$this->answer2=$answer2;
			$this->comment=$comment;
		}
	}
	$inp=($step-1)*10;
	$sql="SELECT * FROM чгк LIMIT :start, 10 ";
	$STH = $pdo->prepare($sql);   
    $STH->bindParam(':start', $inp, PDO::PARAM_INT); 
    $STH->execute(); 
    $str=$STH->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($str);++$i){
		$cgk[]=new CGK($str[$i]['id'],$str[$i]['question'],$str[$i]['answer'],$str[$i]['answer2'],$str[$i]['comment']);	
	}
?>
<?php
	include_once "db.inc.php";

	$url='index.php';
	$sql='SELECT MAX(id) as max FROM новости';
	$max=$pdo->query($sql)->fetch();
	$max=$max['max'];
	class NEWS{
		public $id;
		public $name;
		public $news;
		public $dat;
		public $url;

		function __construct($id, $name, $news, $dat, $url){
			$this->id=$id;
			$this->name=$name;
			$this->news=$news;
			$this->dat=$dat;
			$this->url=$url;
		}
	}
	$sql="SELECT * FROM новости ORDER BY dat DESC LIMIT 0, 5 ";
	$STH = $pdo->prepare($sql);   
    $STH->execute(); 
    $str=$STH->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($str);++$i){
		$new[]=new NEWS($str[$i]['id'],$str[$i]['name'],$str[$i]['news'],$str[$i]['dat'],$str[$i]['url']);	
	}
?>

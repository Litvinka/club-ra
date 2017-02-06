<?php
	include_once "db.inc.php";

	$url='index.php';
	$sql='SELECT MAX(id) as max FROM анонс';
	$max=$pdo->query($sql)->fetch();
	$max=$max['max'];
	class ANONS{
		public $id;
		public $txt;
		public $url;

		function __construct($id, $txt, $url){
			$this->id=$id;
			$this->txt=$txt;
			$this->url=$url;
		}
	}
	$sql="SELECT * FROM анонс LIMIT 0, 3 ";
    $str=$pdo->query($sql)->fetchAll();
	for($i=0;$i<count($str);++$i){
		$anons[]=new ANONS($str[$i]['id'],$str[$i]['txts'],$str[$i]['url']);	
	}
?>

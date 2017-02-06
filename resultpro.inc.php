<?php
	include_once "db.inc.php";
	$url='resultpro.php';
	class RESULT{
		public $id;
		public $name;
		public $mini;
		public $uv;
		public $un;
		public $duimy;
		public $miniOut;
		public $uvOut;
		public $unOut;
		public $duimyOut;
		public $doc;

		function __construct($id, $name, $mini ,$uv, $un, $duimy, $miniOut, $uvOut, $unOut, $duimyOut, $doc){
			$this->id=$id;
			$this->name=$name;
			$this->mini=$mini;
			$this->uv=$uv;
			$this->un=$un;			
			$this->duimy=$duimy;
			$this->miniOut=$miniOut;
			$this->uvOut=$uvOut;
			$this->unOut=$unOut;
			$this->duimyOut=$duimyOut;
			$this->doc=$doc;
		}
	}
	$sql="SELECT * FROM результаты ORDER BY name DESC";
	$all=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($all);++$i){
		$res[]=new RESULT($all[$i]['id'],$all[$i]['name'],$all[$i]['mini'],$all[$i]['uv'],$all[$i]['un'],$all[$i]['duimy'],$all[$i]['miniOut'],$all[$i]['uvOut'],$all[$i]['unOut'],$all[$i]['duimyOut'],$all[$i]['doc']);	
	}
	$max=count($all);
?>
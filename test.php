<?php
include_once "db.inc.php";
$sql='SELECT MAX(id) as max FROM чгк';
$max=$pdo->query($sql)->fetch();
$max=$max['max'];

$str; 
if($_POST && isset($_POST['nextq'])){
	$_SESSION['nextq']=true;
	$step=$_SESSION['step']+1;
	$_SESSION['step']=$step;
	if($_SESSION['step']==6){
		$well=0;
		foreach ($_SESSION['right'] as $key => $value) {
			if($value=="right"){
				$well++;
			}
		}
		 foreach ($_SESSION as $key => $value) {
		 	if($key!="login" && $key!="search"){
			unset($_SESSION['$key']);}
	}	
	}
}
else if($_POST && isset($_POST['submitq'])){
	$_SESSION['nextq']=false;
	$answer=trim($_POST['answer']);
	$step=$_SESSION['step'];
	$_SESSION['answer'][$step]=$answer;
	if(!trim($_SESSION['answer2'][$step])){
		$ans2='--';
	}
	else{
		$ans2=trim($_SESSION['answer2'][$step]);
	}
	if(strcmp(mb_strtolower($_SESSION['answer'][$step]),mb_strtolower($_SESSION['answer1'][$step]))==0 || 
		strcmp(mb_strtolower($_SESSION['answer'][$step]),mb_strtolower($ans2))==0){
		$_SESSION['right'][$step]="right";
	}
	else{
		$_SESSION['right'][$step]="none";
	}
	if(isset($_SESSION['login'])){
		$sql="SELECT MAX(id) as max FROM ответы";
		$max=$pdo->query($sql)->fetch();
		$max=$max['max']+1;
		$sql="SELECT * FROM register WHERE login='".$_SESSION['login']."'";
		$info=$pdo->query($sql)->fetch();
		$sql="INSERT INTO ответы(`id`, `question_id`, `answer`, `name`, `fam`, `rightA`) VALUES('".$max."','".$_SESSION['ask'][$step]."','".$_SESSION['answer'][$step]."','".$info['name']."','".$info['fam']."','".$_SESSION['right'][$step]."')";
		$pdo->exec($sql);
	}
}
else if(isset($_SESSION['step']) && $_SESSION['step']!=6){
	$step=$_SESSION['step'];
}
else{
	$_SESSION['step']=1;
	$_SESSION['nextq']=true;
	$_SESSION['ask'][0]='';
	$step=1;
}

if($step==1 && $_SESSION['nextq']){
	for($i=1;$i<=5;++$i){
	$id=rand(1,$max);
	while(in_array($id,$_SESSION['ask'])){
	$id=rand(1,$max);}
	$_SESSION['ask'][$i]=$id;
	$sql="SELECT * from чгк WHERE id='".$id."'";
	$row=$pdo->query($sql);
	$d=$row->fetch();
		$_SESSION['text'][$i]=$d['question'];	
		$_SESSION['answer1'][$i]=$d['answer']; 
		$_SESSION['answer2'][$i]=$d['answer2'];
		$_SESSION['comment'][$i]=$d['comment'];
	}
}

?>
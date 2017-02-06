<?php
$error=false;
if($_POST && isset($_POST['change'])){
	$comment="";
	foreach ($_POST as $key => $value) {
		${$key}=htmlspecialchars(trim($value));
	}
	if(empty($admquest1)||empty($ask11)){
		$error=true;
		$comment="Заполните поля!";
	}
	if(!$error){
		include "db.inc.php";
		$sql = "UPDATE чгк SET question = :question, 
            answer = :answer, 
            answer2 = :answer2,
            comment = :comment   
            WHERE id = :id";
		$stmt = $pdo->prepare($sql);                                  
		$stmt->bindParam(':question', $admquest1, PDO::PARAM_STR);       
		$stmt->bindParam(':answer', $ask11, PDO::PARAM_STR);    
		$stmt->bindParam(':answer2', $ask12, PDO::PARAM_STR); 
		$stmt->bindParam(':comment', $admcomment1, PDO::PARAM_STR); 
		$stmt->bindParam(':id', $id1, PDO::PARAM_STR);    
		$stmt->execute(); 
		$comment="Изменения сохранены!";
	}
}


if($_POST && isset($_POST['add'])){
	$requared=['admquest','ask1'];
	$com=array();
	for($i=0;$i<count($requared);++$i){
			$com[$requared[$i]]="";
	}
	$comment1="";
	foreach ($_POST as $key => $value) {
		${$key}=htmlspecialchars(trim($value));
	}
	if(empty($admquest)){
		$com['admquest']="Введите вопрос!";
		$error=true;
	}
	if(empty($ask1)){
		$com['ask1']="Введите ответ на вопрос!";
		$error=true;
	}
	if(!$error){
		include "db.inc.php";
		$comment1='Вопрос добавлен!';
		$sql="SELECT MAX(id) as max FROM чгк";
		$max=$pdo->query($sql)->fetch();
		$max=$max['max']+1;
		$sql="INSERT INTO чгк(`id`, `question`, `answer`, `answer2`, `comment`) VALUES('".$max."','".$admquest."','".$ask1."','".$ask2."','".$admcomment."')";
		$pdo->exec($sql);
	}	

}

if($_POST && isset($_POST['del'])){
	include "db.inc.php";
	$id=$_POST['id1'];
	$sql="DELETE FROM чгк WHERE id = '".$id."'";
	$pdo->exec($sql);
}	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Изменение и добавление вопросов ЧГК</title>
</head>

<body>
	<?php
		include "cgk.inc.php";
		include "header.admin.php";
		if(isset($_SESSION['login']) && $_SESSION['login']=="admin1"){ 
	?>
<article class="admin">
	<nav class="localnav">
		<ul class="localnavUl">
			<li><a href="news.admin.php">новости</a></li>
			<li><a href="students.admin.php">герои нашего времени</a></li>
			<li id="localnavOpen"><a href="#">вопросы</a></li>
		</ul>
	</nav>
		<section id="admnews">
			<h1 class="section">Проверь себя:</h1>

		<figure class="admnew" style="margin-bottom:70px;">
					<form method="post" enctype="multipart/form-data">
						<label style="color:black; margin:0px" for="admquest">Введите вопрос:</label>
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['admquest'];}?></span>
						<p><textarea rows="5" cols="84" id="admquest" name="admquest" style="resize:none"><?php if($_POST && isset($admques)){echo $admques;} ?></textarea></p>

						<label style="color:black; margin:0px" for="ask1">Введите ответ:</label>
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['ask1'];}?></span>
						<p><input type="text" name="ask1"id="ask1" value="<?php if($_POST && isset($ask1)){echo $ask1;} ?>"></p>

						<label style="color:black; margin:0px" for="ask2">Введите второй возможный ответ(если есть):</label>
						<p><input type="text" name="ask2"id="ask2" value="<?php if($_POST && isset($ask2)){echo $ask2;} ?>"></p>

						<label style="color:black; margin:0px" for="admcomment">Пояснение к ответу(если есть):</label>
						<p><textarea rows="3" cols="84" id="admcomment" name="admcomment" style="resize:none"><?php if($_POST && isset($admcomment)){echo $admcomment;} ?></textarea></p>

						<p><input type="submit" name="add" id="add" value="добавить">
						<span style="color:red"><b><?php if(isset($_POST['add'])){echo $comment1;}?></b></span></p>
					</form>	
			</figure>

		<?php
			$num=($step-1)*10;
			for($i=0;$i<10 && $num<$max;++$i) { ?>
			<figure class="admnew" style="margin-bottom:40px;">
					<form method="post" enctype="multipart/form-data">
						<label style="color:black; margin:0px" for="id">Номер вопроса:</label>
						<p><input type="text" name="id1"id="id" value="<?php echo $cgk[$i]->id; ?>"></p>
						<label style="color:black; margin:0px" for="admquest">Вопрос:</label>
						<p><textarea rows="5" cols="84" id="admquest" name="admquest1" style="resize:none"><?php echo $cgk[$i]->question; ?></textarea></p>
						<label style="color:black; margin:0px" for="ask1">Ответ:</label>
						<p><input type="text" name="ask11"id="ask1" value="<?php echo $cgk[$i]->answer; ?>"></p>
						<label style="color:black; margin:0px" for="ask2">Второй возможный ответ:</label>
						<p><input type="text" name="ask21"id="ask2" value="<?php echo $cgk[$i]->answer2; ?>"></p>
						<label style="color:black; margin:0px" for="admcomment">Пояснение к ответу:</label>
						<p><textarea rows="3" cols="84" id="admcomment" name="admcomment1" style="resize:none"><span style="color:red"><b><?php echo $cgk[$i]->comment; ?></textarea></p>
						<p><input type="submit" name="change" id="change" value="сохранить изменения">
						<span style="color:red"><b><?php if(isset($_POST['change']) && $cgk[$i]->id==$id1){echo $comment;}?></b></span></p>
						<p><input type="submit" name="del" id="del" value="удалить"> </p>
					</form>	
			</figure>
		<?php $num++;} ?>
		<section class="pageNav">
			<?php include "pageNav.inc.php"; ?>
		</section>
		</section>
</article>

	<?php
		include "footer.php";
	?>
	<?php } else{?>
	<p style="margin-left:70px; font-size:22px">Страница недоступна!</p>
	<?php } ?>
<script>
    document.getElementById('localnavOpen').style.borderBottom="solid 3px #241071";
</script>
</body>
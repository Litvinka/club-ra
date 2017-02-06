
<?php
$error=false;
$path='C:/xampp/htdocs/kursovayja/image/';
$requared=['fio','url'];
	$com=array();
	for($i=0;$i<count($requared);++$i){
			$com[$requared[$i]]="";
	}
if($_POST && isset($_POST['change'])){
	foreach ($_POST as $key => $value) {
		${$key}=htmlspecialchars(trim($value));
		if(empty(${$key})){
			$error=true;
			$comment="Заполните все данные!";
		}
	}
	if(!empty($_FILES['picture']['name']) && !$error){
		if (!copy($_FILES['picture']['tmp_name'], $path.$_FILES['picture']['name'])){
			$comment='Что-то пошло не так...';
			$error=true;
		}
		else{
			$comment='Изменения сохранены!';
			$url=substr($path,27). $_FILES['picture']['name'];
	}}
	else if(empty($_FILES['picture']['name']) && !$error){
		$comment="Изменения сохранены!";
	}
	if(!$error){
		include "db.inc.php";
		$sql = "UPDATE героинашеговремени SET FIO = :FIO, 
            photo = :photo  
            WHERE id = :id";
		$stmt = $pdo->prepare($sql);                                  
		$stmt->bindParam(':FIO', $fio, PDO::PARAM_STR);       
		if(empty($url)){
			$sql="SELECT photo FROM героинашеговремени WHERE id='".$id."'";
			$data=$pdo->query($sql)->fetch();
			$url=$data['photo'];
			$stmt->bindParam(':photo', $url, PDO::PARAM_STR); }
		else{
			$stmt->bindParam(':photo', $url, PDO::PARAM_STR); 
		}
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);    
		$stmt->execute(); 
	}
}


if($_POST && isset($_POST['add'])){
	$comment1="";
	foreach ($_POST as $key => $value) {
		${$key}=htmlspecialchars(trim($value));
	}
	if(empty($fio)){
		$com['fio']="Введите имя!";
		$error=true;
	}
	if(empty($_FILES['picture2']['name'])){
		$com['url']="Выберите изображение!";
		$error=true;
		}
	else{if (!copy($_FILES['picture2']['tmp_name'], $path.$_FILES['picture2']['name'])){
			$com['url']='Что-то пошло не так...';
			$error=true;
		}
		else{
			$url=substr($path,27). $_FILES['picture2']['name'];
	}}
	
	if(!$error){
		include "db.inc.php";
		$comment1='Запись добавлена!';
		$sql="SELECT MAX(id) as max FROM героинашеговремени";
		$max=$pdo->query($sql)->fetch();
		$max=$max['max']+1;
		$sql="INSERT INTO героинашеговремени(`id`, `FIO`, `photo`) VALUES('".$max."','".$fio."','".$url."')";
		$pdo->exec($sql);
	}	
}

if($_POST && isset($_POST['del'])){
	include "db.inc.php";
	$id=$_POST['id'];
	$sql="DELETE FROM героинашеговремени WHERE id = '".$id."'";
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
<title>Изменение и добавление новостей</title>
</head>

<body>
	<?php
		include "students.inc.php";
		include "header.admin.php";
		$url="students.admin.php";
		if(isset($_SESSION['login']) && $_SESSION['login']=="admin1"){ 
	?>
<article class="admin">
	<nav class="localnav">
		<ul class="localnavUl">
			<li><a href="news.admin.php">новости</a></li>
			<li id="localnavOpen"><a href="#">герои нашего времени</a></li>
			<li><a href="test.admin.php">вопросы</a></li>
		</ul>
	</nav>
		<section id="admnews">
			<h1 class="section">Герои нашего времени:</h1>
			<figure class="admnew" style="margin-bottom:70px;">
				<img width="193px" height="290px" style="background-color:grey;">
					<form method="post" enctype="multipart/form-data">
						<label style="color:black; margin:0px" for="fio">Введите ФИО:</label>
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['fio'];}?></span>
						<p><input type="text" id="fio" name="fio" value="<?php if($_POST && isset($_POST['add'])){echo $fio;} ?>"></p>

						<p>Выбрать изображение:
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['url'];}?></span>
						<input type="file" name="picture2" id="picture" accept="image/*,image/jpeg"></p>
						<p><input type="submit" name="add" id="add" value="добавить"><span style="color:red"><b><?php if(isset($_POST['add'])){echo $comment1;}?></b></span></p>
					</form>	
			</figure>
		<?php
			$num=($step-1)*9;
			for($i=0;$i<9 && $num<$max;++$i) { ?>
			<figure class="admnew">
				<img width="193px" height="290px" src="<?php echo $students[$i]->photo; ?>">
					<form method="post" enctype="multipart/form-data">
						<p><input type="text" id="fio" name="fio" value="<?php echo $students[$i]->FIO; ?>"></p>
						<p><input type="text" name="id" id="id1" hidden value="<?php echo $students[$i]->id; ?>"></p>
						<p>Изменить изображение:
						<input type="file" name="picture" id="picture" accept="image/*,image/jpeg"></p>
						<p><input type="submit" name="change" id="change" value="сохранить изменения"> 
						<span style="color:red"><b><?php if(isset($_POST['change']) && $id==$students[$i]->id){echo $comment;} ?></b></span></p>
						<p><input type="submit" name="del" id="del" value="удалить"> </p>
					</form>	
			</figure>
		<?php
			$num++;}
		?>
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
</body>


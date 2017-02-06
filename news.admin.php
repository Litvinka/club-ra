
<?php
$error=false;
$path='C:/xampp/htdocs/kursovayja/image/';
$requared=['name2','news2','dat2','url'];
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
		$sql = "UPDATE новости SET name = :name, 
            news = :news, 
            dat = :dat,
            url = :url   
            WHERE id = :id";
		$stmt = $pdo->prepare($sql);                                  
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);       
		$stmt->bindParam(':news', $news, PDO::PARAM_STR);    
		$stmt->bindParam(':dat', $dat, PDO::PARAM_STR); 
		if(empty($url)){
			$sql="SELECT url FROM новости WHERE id='".$id."'";
			$data=$pdo->query($sql)->fetch();
			$url=$data['url'];
			$stmt->bindParam(':url', $url, PDO::PARAM_STR); }
		else{
			$stmt->bindParam(':url', $url, PDO::PARAM_STR); 
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
	if(empty($name2)){
		$com['name2']="Введите название новости!";
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
	if(empty($news2)){
		$com['news2']="Введите текст новости!";
		$error=true;
	}
	if(empty($dat2)){
		$com['dat2']="Введите дату новости!";
		$error=true;
	}
	if(!$error){
		include "db.inc.php";
		$comment1='Новость добавлена!';
		$sql="SELECT MAX(id) as max FROM новости";
		$max=$pdo->query($sql)->fetch();
		$max=$max['max']+1;
		$sql="INSERT INTO новости(`id`, `name`, `news`, `dat`, `url`) VALUES('".$max."','".$name2."','".$news2."','".$dat2."','".$url."')";
		$pdo->exec($sql);
	}	
}

if($_POST && isset($_POST['del'])){
	include "db.inc.php";
	$id=$_POST['id'];
	$sql="DELETE FROM новости WHERE id = '".$id."'";
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
		include "news.inc.php";
		include "header.admin.php";
		if(isset($_SESSION['login']) && $_SESSION['login']=="admin1"){ 
	?>
<article class="admin">
	<nav class="localnav">
		<ul class="localnavUl">
			<li id="localnavOpen"><a href="#">новости</a></li>
			<li><a href="students.admin.php">герои нашего времени</a></li>
			<li><a href="test.admin.php">вопросы</a></li>
		</ul>
	</nav>
		<section id="admnews">
			<h1 class="section">Новости клуба:</h1>
			<figure class="admnew" style="margin-bottom:70px;">
				<img width="363px" height="245px" style="background-color:grey;">
					<form method="post" enctype="multipart/form-data">
						<label style="color:black; margin:0px" for="name1">Введите название новости:</label>
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['name2'];}?></span>
						<p><input type="text" id="name1" name="name2" value="<?php if($_POST && isset($name2)){echo $name2;} ?>"></p>
						<label style="color:black; margin:0px" for="txt1">Введите текст новости:</label>
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['news2'];}?></span>
						<p><textarea name="news2"id="txt1" rows="6" cols="84"><?php if($_POST && isset($news2)){echo $news2;} ?></textarea></p>
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['dat2'];}?></span>
						<p><input type="text" name="dat2" id="dat1" placeholder="<?php echo $new[0]->dat; ?>" value="<?php if($_POST && isset($dat2)){echo $dat2;} ?>"></p>
						<p>Выбрать изображение:
						<span class="commentAsk"><?php if(isset($_POST['add'])){echo $com['url'];}?></span>
						<input type="file" name="picture2" id="picture" accept="image/*,image/jpeg"></p>
						<p><input type="submit" name="add" id="add" value="добавить">
						<span style="color:red"><b><?php if(isset($_POST['add'])){echo $comment1;}?></b></span></p>
					</form>	
			</figure>
		<?php
			for($i=0;$i<5;++$i) {
		?>
			<figure class="admnew">
				<img width="363px" height="245px" src="<?php echo $new[$i]->url; ?>">
					<form method="post" enctype="multipart/form-data">
						<p><input type="text" id="name1" name="name" value="<?php echo $new[$i]->name; ?>"></p>
						<p><textarea name="news"id="txt1" rows="6" cols="84"><?php echo $new[$i]->news; ?></textarea></p>
						<p><input type="text" name="dat" id="dat1" value="<?php echo $new[$i]->dat; ?>"></p>
						<p><input type="text" name="id" id="id1" hidden value="<?php echo $new[$i]->id; ?>"></p>
						<p>Изменить изображение:
						<input type="file" name="picture" id="picture" accept="image/*,image/jpeg"></p>
						<p><input type="submit" name="change" id="change" value="сохранить изменения"> 
						<span style="color:red"><b><?php if(isset($_POST['change']) && $id==$new[$i]->id){echo $comment;} ?></b></span></p>
						<p><input type="submit" name="del" id="del" value="удалить"> </p>
					</form>	
			</figure>
		<?php
			}
		?>
		</section>
</article>

	<?php
		include "footer.php";
	?>
<?php } else{?>
	<p style="margin-left:70px; font-size:22px">Страница недоступна!</p>
	<?php } ?>
</body>



<?php
include_once "db.inc.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Проверь себя</title>
</head>
<body>
	<?php
		include "header.php";
		include "test.php";
	?>
	<article class="main" id="test">
		<section>
			<h1 class="section">Проверь себя:</h1>
			<form id="testq" method="post">
			<?php if($step<6){ ?>
				<h3>Вопрос №<?php echo $step; ?></h3>
				<label for="answer" class="question"><?php echo $_SESSION['text'][$step]; ?></h4>
				<p><input name="answer" id="answer" value="<?php if($_SESSION['nextq']==0) {echo $_SESSION['answer'][$step];} ?>">
				<input type="submit" name="submitq" id="submitq" style="cursor:pointer;" value="ответить">
				<input type="submit" name="nextq" id="nextq" style="cursor:pointer;" value="следующий вопрос" >
				<?php if($_SESSION['nextq']==0){ ?>
					<span class="right"> <?php if($_SESSION['right'][$step]=="right"){echo "Правильный ответ!";}
					else{echo "Вы ответили не верно!";} ?></span>
					<p class="rightAsk"><b>Правильный ответ: </b><?php echo $_SESSION['answer1'][$step]; 
					if(!empty(trim($_SESSION['answer2'][$step]))){echo "<b> Зачет: </b>".$_SESSION['answer2'][$step];} ?></p>
					</p>
					<p class="comment"><?php if(!empty(trim($_SESSION['comment'][$step]))){echo "<b>Пояснение: </b>".$_SESSION['comment'][$step];} ?></p>
				<?php }	} 
					else{	?>
						<h3>Результаты:</h3>
						<p class="result">Вы правильно ответили на <?php echo $well; if($well==1){echo ' вопрос';} else if($well==0 || $well==5){echo ' вопросов';}
						else {echo ' вопроса';}
						?> из 5!</p>
						<input type="submit" name="nextgame" id="nextgame" style="cursor:pointer;" value="играть еще раз">
					<?php } ?>
			</form>			
		</section>	
		
	</article>

	<?php
		include "footer.php";
	?>

<script>
	var k=document.querySelector('navOpen');
	if(k){k.setAttribute('class','');}
	document.getElementById('navTest').setAttribute('class', 'navOpen');
	var s=document.getElementsByClassName('navOpen')[0];
	s.style.backgroundColor="#f60017";

	if("<?php echo $_SESSION['nextq']; ?>"){
		document.getElementById("submitq").style.display='block';
		document.getElementById("nextq").style.display='none';
		document.getElementById('answer').disabled=0;
	}
	else{
		document.getElementById('nextq').style.display='block';
		document.getElementById('answer').disabled=1;
		document.getElementById('submitq').style.display='none';
	}
</script>
<script src="JS/gamburger.js"></script>
</body>
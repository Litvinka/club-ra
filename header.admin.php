	<?php 
		session_start();
		$url=$_SERVER['REQUEST_URI'];
		if($url!="/kursovayja/search.php"){$_SESSION['search']='';}
		if(isset($_POST['exit'])){
			unset($_SESSION['login']);
		}
		if(isset($_POST['search1'])){
			if(isset($_POST['search'])){
				$word=trim(htmlspecialchars($_POST['search']));
				if(!empty($word)){
					$_SESSION['search']=$word;
					header("Location: search.php");}
			}
		}
	?>
<header>
		<figure id="flogo">
			<a href="news.admin.php">
		    <img src="image/logo.jpg" id="logo" title="Клуб интеллектуалов 'РА'">
		    </a>
		</figure>
		<figure id="h1">
			<hgroup>
				<h1><a href="news.admin.php">Клуб интеллектуалов "РА"</a></h1>
				<h2><a href="news.admin.php">Территория доcтойного детства</a></h2>
			</hgroup>
			<a href="news.admin.php"><img id="RA" src="image/cmok.jpg" title="РА"></a>
		</figure>
		<fieldset id="searchgroup">
		<?php if(!isset($_SESSION['login'])) { ?>
			<a href="success.php"><button id="go">Войти</button></a>
			<a href="register.php"><button id="registr">Регистрация</button></a>
			<?php }else{ ?>
			<form method="post">
				<input type="submit" id="go" name="exit" value="Выйти" style="cursor:pointer;">
			</form>
			<p class="user">Здравствуй, <?php echo $_SESSION['login']; ?></p>
			<?php } ?>
		</fieldset>
	</header>


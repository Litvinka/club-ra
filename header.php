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
			<a href="index.php">
		    <img src="image/logo.jpg" id="logo" title="Клуб интеллектуалов 'РА'">
		    </a>
		</figure>
		<figure id="h1">
			<hgroup>
				<h1><a href="index.php">Клуб интеллектуалов "РА"</a></h1>
				<h2><a href="index.php">Территория доcтойного детства</a></h2>
			</hgroup>
			<a href="index.php"><img id="RA" src="image/cmok.jpg" title="РА"></a>
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
			<form method="post">
			<input type="search" id="search" name="search" value="<?php if(isset($_SESSION['search'])){echo $_SESSION['search'];} ?>">
			<input type="submit" style="background-image:url(image/search.jpg); border:0px" id="search1" name="search1" value=""></form>
		</fieldset>
	</header>

	<nav id="globalnav" role="navigation"> 
		<ul id="globalnavUl">
			<li id="navClub"><a href="letopis.php">о клубе</a>
				<ul>
					<a href="letopis.php"><li>летопись</li></a>
					<a href="graduates.php"><li>выпускники клуба</li></a>
					<a href="students.php"><li>герои нашего времени</li></a>
					<a href="achievements.php"><li>наши достижения</li></a>
				</ul>
			</li>
			<li id="navPro"><a href="historypro.php">кубок PROвинции</a>
				<ul>
					<li><a href="historypro.php">история</a></li>
					<li><a href="rules.php">правила</a></li>
					<li><a href="resultpro.php">результаты</a></li>
				</ul>
			</li>
			<li id="navGallery"><a href="gallery.php">галерея</a></li>
			<li id="navTest"><a href="test-yourself.php">проверь себя</a></li>
			<li id="navArticle"><a href="article.php" style="position:relative; top:-8px">статьи для саморазвития</a></li>
			<li id="navProect"><a href="igraal.php">проекты клуба</a>
				<ul>
					<li><a href="igraal.php">интеллектуальный играаль</a></li>
					<li><a href="fartuna.php">кубок Фартуны</a></li>
					<li><a href="apple.php">яблоня познания</a></li>
				</ul>
			</li>
			<li id="navAbout"><a href="about.php">контакты</a></li>
		</ul>
		<img src="image/gamburger.jpg" alt="гамбургер" id="gamburger">
	</nav> 

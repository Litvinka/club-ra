<?php
include "galleryAdd.php";

$foto=-1;
$url="gallery.php";
if($_GET && $_GET['foto']){
	$foto=$_GET['foto']-1;
}
?>

<!DOCTYPE html PUBLIC "//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title>Галерея клуба интеллектуалов "РА"</title>
<script type="text/javascript" src="JS/jquery-1.12.3.min.js"></script>
</head>
<body>
<?php
	include "header.php";
?>
<article id="allphoto">
	<h1 class="section">Галерея:</h1>
		<section class="photos" id="photos">
			<?php for($k=0;$k<10 && $k<count($urlS);++$k) { ?>
			<figure class="photo">
				<img id="<?php echo $k+1; ?>" src="<?php echo $urlS[$k]; ?>" alt="<?php echo $name[$k]; ?>">
				<figcaption><?php echo $name[$k]; ?></figcaption>
			</figure>
			<?php } ?>
		</section>
		<section class="pager"></section>
	<button id="photobt" onclick="add()">Еще фото</button>
</article>
<article class="lfoto">
	<img src="" alt="" class="lage">

</article>


<?php
	include "footer.php";
?>

<script>
		document.getElementById("photos").addEventListener("click",function(e){
			var width=window.innerWidth;
			var height=window.innerHeight;
			var src=e.target.src;                      
		    src=src.substr(0, src.length-5)+'.jpg';
			document.getElementsByClassName("lfoto")[0].style.display="flex";
			var limg=document.getElementsByClassName("lage")[0];
			limg.src=src;
			var Img = document.createElement('img');
			Img.src="image/exit.png";
			Img.id="exit";
			Img.width="18";
			Img.height="18";
			Img.style.padding="5px";
			Img.style.cursor="pointer";
			limg.parentElement.appendChild(Img);
			document.body.style.overflow = "hidden";
			Img.addEventListener("click",function(d){
				limg.src="";
				document.body.style.overflow = "auto";
				document.getElementsByClassName("lfoto")[0].style.display="none";
				Img.parentElement.removeChild(Img);
			});
		},false);			
</script>
<script>
	var k=document.querySelector('navOpen');
	if(k){k.setAttribute('class','');}
	document.getElementById("navGallery").setAttribute('class', 'navOpen');
	var s=document.getElementsByClassName('navOpen')[0];
	s.style.backgroundColor="#f60017";

		var page;
$(document).ready(function(){
	var param=location.search.slice(location.search.indexOf("?")+1).split("&");
	var result=[];
	for(var i=0;i<param.length;++i){
		var res=param[i].split("=");
		result[res[0]]=res[1];
	}
	if(result["page"]){
		page=result['page'];
	}
	else{
		page=1;
	}
	$(".pager").text(page).hide();
});
var block=false;
function add(){
	if(!block){
		block=true;
			page++;
			$.ajax({
				url:"gallery.php",
				type:"GET",
				data:"page="+page+"&move=1",
				success:function(html){
					if(html){
						$(html).appendTo(".photos");
						$(".pager").text(page);						
						var maxpage="<?php echo count($name)/10; ?>";
						if(page>maxpage){
							$("#photobt").hide();
						}
					}
					block=false;
				}
			});
	}
}
</script>
<script src="JS/gamburger.js"></script>
</body>
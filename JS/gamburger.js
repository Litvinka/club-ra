document.getElementById("gamburger").addEventListener("click",function(e){
	var nav=document.getElementById("globalnavUl");
		if(nav.style.display==="flex"){
			nav.style.display="none";
		}	
		else{
			nav.style.display="flex";
			nav.style.flexDirection="column";
		}
	},false);
document.getElementById("gamburger").style.cursor="pointer";

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
</head>
 
<audio id="mySound" preload="auto" autoplay >
		<source src="img/audio.mp3" type="audio/mp3"> 
</audio>

        <div>
			<nav>
                     
				<ul> 
                       <li><a href="view/inscription.php"><img src="https://img.icons8.com/nolan/64/gender-neutral-user.png"/></a></li>
                       <li><a href="view/afficher_panier.php"><img src="https://img.icons8.com/nolan/64/add-basket.png"/></a></li>
                       
                    <li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="view/contact.php">CONTACT US</a></li>
                    <li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="view/apropos.php">ABOUT-US</a></li>	
                	<li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="view/boutique.php">SHOP</a></li>	
					<li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="index.php">HOME</a></li>
                   
				</ul>
			</nav>
		</div>

<script>

function PlaySound(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.play();
}
function StopSound(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.pause();
    thissound.currentTime = 0;
}
</script>
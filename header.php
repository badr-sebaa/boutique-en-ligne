<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
</head>
 
<audio id="mySound" preload="auto" autoplay >
		<source src="img/audio.mp3" type="audio/mp3"> 
</audio>

        <div>
			<nav>
                <h1>SCHLASS</h1>
                     <img class="logo" src="./img/log.png" alt="logo">
				<ul>
                    <li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="#">SIGN UP</a></li>
                     <li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="#">LOGIN</a></li>
                    <li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="#">CONTACT US</a></li>	
                	<li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="#">SHOP</a></li>
                    <li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="#">TEST</a></li>	
					<li><a onmouseover="PlaySound('mySound')" 
                    onmouseout="StopSound('mySound')" href="#">HOME</a></li>
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
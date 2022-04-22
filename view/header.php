<?php 
session_start();
require 'controler/user.php';

$user = new Users();

?>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
</head>
 


        <div>
			<nav>
                     
				<ul>
                <?php if(!($user->isConnected())){?>
                    <li><a href="controler/deconnexion.php">LOGOUT</a></li>
                    <?php }?>
                    <li><a  href="view/afficher_panier.php"><img src="view/img/panier.png" style="width: 40px;"></a></li>
                     <li><a  href="view/historique_Achats.php"><img src="view/img/icons8-account-64.png" style="width: 40px;"></a></li>
                    <li><a  href="view/contact.php">CONTACT US</a></li>
                    <li><a  href="view/apropos.php">ABOUT-US</a></li>	
                	<li><a  href="view/boutique.php">SHOP</a></li>	
					<li><a  href="#">HOME</a></li>
				</ul>
			</nav>
		</div>
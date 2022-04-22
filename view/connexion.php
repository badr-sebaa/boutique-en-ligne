<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>Login SCHLASS</title>

    <link rel="stylesheet" href="CSS/registertest.css">

  </head>

  <body>

<main>
<form class="box" action="../controler/connexion_traitement.php" method="post">

  <h1>Login</h1>


  <input type="email" name="email" placeholder="Email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">

  
  <input type="password" name="password" placeholder="Password" required >


  <input type="submit" name="submit" value="Login">

  <a href="inscription.php">you don't have an acount ?</a>
</form>

</main>
        
</body>

</html>
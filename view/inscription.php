<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>َRegister SCHLASS</title>

    <link rel="stylesheet" href="CSS/registertest.css">

  </head>

  <body>

<main>
<form class="box" action="inscription_traitement.php" method="post">

  <h1>Register</h1>

  <input type="text" name="walet" placeholder="Walet" required>
  
  <input type="text" name="lastname" placeholder="Lastname" required>
  
  <input type="text" name="firstname" placeholder="Firstname" required>

  <input type="email" name="email" placeholder="Email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">

  <input type="email" name="email_verify" placeholder="Retype your Email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">

  <input type="password" name="password" placeholder="Password" required pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$">

  <input type="password" name="password" placeholder="Retype your Password" required pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$">

  <input type="submit" name="submit" value="Register">

</form>

</main>
        
</body>

</html>
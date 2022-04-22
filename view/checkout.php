<?php
session_start();
require '../controler/user.php';

$user = new Users();

if(!($user->isConnected())){
  header('Location: inscription.php');
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Accept a payment</title>
    <meta name="description" content="A demo of a payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="CSS/checkout.css" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/checkout.js" defer></script>
  </head>
  <body>
    <!-- Display a payment form -->
    <form id="payment-form" method="POST" action="../controler/checkout_traitement.php">
      <div id="payment-element">
      <input type="text" name="card_number" placeholder="1234 1234 1234 1234" required>
      <input type="text" name="name" placeholder="Nom Prénom" required>
      <input type="date" name="expiration" required>
      <input type="text" name="CVV" placeholder="000" required>
      </div>
      <input type="checkbox" name="checkbox">Save card ?
      <button id="submit" >
        <span id="button-text">Pay now</span>
      </button> 
      <div id="payment-message" class="hidden"></div>
    </form>

    <div class="cart"></div>
  </body>
</html>

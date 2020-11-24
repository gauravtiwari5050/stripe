<?php
require('stripe-php-master/init.php');
// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_51HHOc1JFiSecQRoGbHhbX3idLovYbDo0j1dkmDxwazqYfsnPRyfd2zwIxpk9tA5umSjouQC9z3tn9hboH12ekcuy00gphmouIX');

$ob = \Stripe\BillingPortal\Session::create([
  'customer' => 'cus_IMBDSddwgUSmDH',
  'return_url' => 'https://khyaal.com/stripe/welcome.php',
]);



//echo 'a';
//header('Content-type: application/json');

//echo "<script>window.location='".$ob["url"]&"';</script>";
header("Location: ".$ob["url"]);
die();

?>
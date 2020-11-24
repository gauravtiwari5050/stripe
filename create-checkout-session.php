<?php
// This example sets up an endpoint using the Slim framework.
// Watch this video to get started: https://youtu.be/sGcNPFX1Ph4.

//use Slim\Http\Request;
//use Slim\Http\Response;


require('stripe-php-master/init.php');
//use Stripe\Stripe;

//require 'vendor/autoload.php';

//$app = new \Slim\App;
/*
$app->add(function ($request, $response, $next) {
  // Set your secret key. Remember to switch to your live secret key in production!
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  \Stripe\Stripe::setApiKey('sk_test_51HHOc1JFiSecQRoGbHhbX3idLovYbDo0j1dkmDxwazqYfsnPRyfd2zwIxpk9tA5umSjouQC9z3tn9hboH12ekcuy00gphmouIX');

  return $next($request, $response);
});

$app->post('/create-checkout-session', function (Request $request, Response $response) {
  $session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      // Replace `price_...` with the actual price ID for your subscription
      // you created in step 2 of this guide.
      'price' => '800',
      'quantity' => 1,
    ]],
    'mode' => 'subscription',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
  ]);

  return $response->withJson([ 'id' => $session->id ])->withStatus(200);
});

$app->run();
*/

$price_data = json_decode(file_get_contents('php://input'));

$price_id = $price_data->price_id;
// $tran = $price_data->tran;
$price_count = $price_data->price_count;


$customer = new Customer;

$stripe_customer = Stripe_Customer::create(array(
  "description" => $customer->name,
  "email" => $customer->email
));


// echo $data;
 //return;
\Stripe\Stripe::setApiKey('sk_test_51HHOc1JFiSecQRoGbHhbX3idLovYbDo0j1dkmDxwazqYfsnPRyfd2zwIxpk9tA5umSjouQC9z3tn9hboH12ekcuy00gphmouIX');

$stripe = new \Stripe\StripeClient("sk_test_51HHOc1JFiSecQRoGbHhbX3idLovYbDo0j1dkmDxwazqYfsnPRyfd2zwIxpk9tA5umSjouQC9z3tn9hboH12ekcuy00gphmouIX");

$session = \Stripe\Checkout\Session::create([
  'customer'=> 'cus_IMBDSddwgUSmDH',
  'payment_method_types' => ['card'],
  'billing_address_collection' => 'required',
  'line_items' => [[
    // Replace `price_...` with the actual price ID for your subscription
    // you created in step 2 of this guide.
    // "currency" => "usd",
    'price' => $price_id,//'price_1HfmL3JFiSecQRoG14TDVgJ8',
    'quantity' => 1,//$price_count,
   'tax_rates' => ['txr_1HokSwJFiSecQRoGnfFk5JkK']
  ]],

  //  'mode' => 'payment',
  // 'discounts' => [[
  //   'coupon' => 'L8m8cwwW',
  // ]],
  // 'subscription_data'=>['trial_period_days'=>7],
  'allow_promotion_codes' => true,
  // 'tax_rate' => true,
  'mode' => 'subscription',
  'success_url' => 'http://localhost/khyaal-stripe/index-stripe.html',
  'cancel_url' => 'http://localhost/khyaal-stripe/index-stripe.html',
  // 'cancel_url' => 'https://example.com/cancel',
]);



/*
$session = \Stripe\Checkout\Session::create([
  'customer'=>'cus_IGKjoSaB98Soor',
  'payment_method_types' => ['card'],
  'line_items' => [[
    // Replace `price_...` with the actual price ID for your subscription
    // you created in step 2 of this guide.
    'price_data' => [
      'product' => 'prod_IGXE8Jc0ODIjQ1',
      'currency'=>'inr',
      'unit_amount'=>900
      //'unit_amount_decimal'=> 900.0
    ],
    //'price' => 'price_1Hg09ZJFiSecQRoGVgMFJVYD',//$price_id,
    'quantity' => 1,
  ]],
  'mode' => 'subscription',
  'success_url' => 'https://example.com/success',
  'cancel_url' => 'https://example.com/cancel',
]);
*/

header('Content-type: application/json');
echo json_encode($session);//->withJson([ 'id' => $session->id ])->withStatus(200);

?>
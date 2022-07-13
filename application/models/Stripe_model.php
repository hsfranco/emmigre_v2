<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stripe_model extends CI_Model {
    public function __construct()
    {
      parent::__construct();

      require_once(APPPATH. "../vendor/stripe/stripe-php/init.php");
      // LIVE KEYS
      //\Stripe\Stripe::setApiKey('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');
     
  
      // TEST API KEYS
      \Stripe\Stripe::setApiKey('sk_test_51IIhCuCH8UypDiwQech0ZQdDFHlTVK1vSGwpyvcPlHKGG41kbWFKQFk42HjpMO5CBXj9Hrd7qOkFzS2OeMjmmMsi00pmp9miU5');
    }


    public function getCustomer($code)  {
      $stripe = new \Stripe\StripeClient(
        'sk_test_51IIhCuCH8UypDiwQech0ZQdDFHlTVK1vSGwpyvcPlHKGG41kbWFKQFk42HjpMO5CBXj9Hrd7qOkFzS2OeMjmmMsi00pmp9miU5'
      );
      return  $stripe->customers->retrieve(
        $code,
        []
      );
   
    }

 public function CreatePaymentSession() {
   $success_url = base_url() . "/b2-visto-turista/confirmacao";
   $cancel_url = base_url() . "/b2-visto-turista";

    $session['stripe'] = \Stripe\Checkout\Session::create([
      'payment_method_types' => ['card'],
      'mode' => 'payment',
      'line_items' => [[
        'price' => 'price_1LK009CH8UypDiwQECIwEdqx',
        'quantity' => 1
      ]],
      'success_url' => $success_url,
      'cancel_url' =>  $cancel_url,
    ]);

   
      return $session;
 }
}
?>

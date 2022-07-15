
  var checkoutButton = document.getElementById('checkout-button');
  //var stripe = Stripe('pk_test_51IIhCuCH8UypDiwQijWukKmGdRb2hVsQP1UgsHhiP6nqNcAswYOxZX5Xp5qPAb1KkU83YzqW6SYHjxt2S1PLzLrl00ppKQIT94');
  var stripe = Stripe('pk_test_51IIhCuCH8UypDiwQijWukKmGdRb2hVsQP1UgsHhiP6nqNcAswYOxZX5Xp5qPAb1KkU83YzqW6SYHjxt2S1PLzLrl00ppKQIT94');
  console.log(checkoutButton);

  checkoutButton.addEventListener('click', function() {
    stripe.redirectToCheckout({
      // Make the id field from the Checkout Session creation API response
      // available to this file, so you can provide it as argument here
      // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
      sessionId: $('#stripeSessionID').val()
    }).then(function (result) {
      // If `redirectToCheckout` fails due to a browser or network
      // error, display the localized error message to your customer
      // using `result.error.message`.
    });
  });
  
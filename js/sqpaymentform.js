// Set the application ID
var applicationId = "sandbox-sq0idp-DAQiKgdEcBHX_Bkrc1c9qw";

// Set the location ID
var locationId = "CBASEMm6qqI9vL8W68588UvZQTYgAQ";


var totalPrice= document.getElementById("totalPrice").innerHTML;
var subTotal = document.getElementById("subTotal").innerHTML;
var tax = document.getElementById("tax").innerHTML;

totalPrice = parseFloat(totalPrice.substr(1,totalPrice.length))
subTotal = parseFloat(subTotal.substr(1,subTotal.length))
tax = parseFloat(tax.substr(1,tax.length))

console.log("totalPrice:" + totalPrice + " " + typeof(totalPrice));
console.log("subtotal: " + subTotal);
console.log("tax: "+ tax);
    


/*
 * function: requestCardNonce
 *
 * requestCardNonce is triggered when the "Pay with credit card" button is
 * clicked
 *
 * Modifying this function is not required, but can be customized if you
 * wish to take additional action when the form button is clicked.
 */
function requestCardNonce(event) {

  // Don't submit the form until SqPaymentForm returns with a nonce
  event.preventDefault();

  // Request a nonce from the SqPaymentForm object
  paymentForm.requestCardNonce();
}

// Create and initialize a payment form object
var paymentForm = new SqPaymentForm({

  // Initialize the payment form elements
  applicationId: applicationId,
  locationId: locationId,
  inputClass: 'sq-input',

  // Customize the CSS for SqPaymentForm iframe elements
  inputStyles: [{
      fontSize: '.9em'
  }],

  // Initialize Apple Pay placeholder ID
  applePay: {
    elementId: 'sq-apple-pay'
  },

  // Initialize Masterpass placeholder ID
  masterpass: {
    elementId: 'sq-masterpass'
  },

  // Initialize the credit card placeholders
  cardNumber: {
    elementId: 'card-number',
    placeholder: '1234 5678 9101'
  },
  cvv: {
    elementId: 'cvv',
    placeholder: 'CVV'
  },
  expirationDate: {
    elementId: 'expiration-date',
    placeholder: 'MM/YY'
  },
  postalCode: {
    elementId: 'postal-code'
  },

  // SqPaymentForm callback functions
  callbacks: {

    /*
     * callback function: methodsSupported
     * Triggered when: the page is loaded.
     */
    methodsSupported: function (methods) {

      var applePayBtn = document.getElementById('sq-apple-pay');
      var applePayLabel = document.getElementById('sq-apple-pay-label');
      var masterpassBtn = document.getElementById('sq-masterpass');
      var masterpassLabel = document.getElementById('sq-masterpass-label');

      // Only show the button if Apple Pay for Web is enabled
      // Otherwise, display the wallet not enabled message.
      if (methods.applePay === true) {
        applePayBtn.style.display = 'inline-block';
        applePayLabel.style.display = 'none' ;
      }
      // Only show the button if Masterpass is enabled
      // Otherwise, display the wallet not enabled message.
      if (methods.masterpass === true) {
        masterpassBtn.style.display = 'inline-block';
        masterpassLabel.style.display = 'none';
      }
    },

    /*
     * callback function: createPaymentRequest
     * Triggered when: a digital wallet payment button is clicked.
     */
    createPaymentRequest: function () {
      // The payment request below is provided as
      // guidance. You should add code to create the object
      // programmatically.
      return {
        requestShippingAddress: false,
        currencyCode: "USD",
        countryCode: "US",

        total: {
          label: "Total",
          amount: totalPrice,
          pending: false,
        },

        lineItems: [
          {
            label: "Subtotal",
            amount: subTotal,
            pending: false,
          },
          {
            label: "Tax",
            amount: tax,
            pending: false,
          }
        ]
      };
    },

    /*
     * callback function: cardNonceResponseReceived
     * Triggered when: SqPaymentForm completes a card nonce request
     */
    cardNonceResponseReceived: function(errors, nonce, cardData) {
      if (errors) {
        // Log errors from nonce generation to the Javascript console
        console.log("Encountered errors:");
        errors.forEach(function(error) {
          console.log('  ' + error.message);
        });

        return;
      }

      alert('Nonce received: ' + nonce); /* FOR TESTING ONLY */

      // Assign the nonce value to the hidden form field
      document.getElementById('card-nonce').value = nonce;

      // POST the nonce form to the payment processing page
      //document.getElementById('nonce-form').submit();
      
      
      var payLoad = {
        "amount": totalPrice,
        "nonce":nonce
      }
      
 
        $.ajax({
              url : "processPayment.php",
              type: 'POST',
              data: payLoad,
              dataType: "json",
              success: function(data) {
                console.log("success")
                console.log(data);
                
              },
              error:function(data)
             {
                
                //console.log(data);
                var response = data["responseText"].substr(data["responseText"].search('{'),data["responseText"].length)
                console.log("response text: " + response)
                
                response = $.parseJSON(response)
                console.log(response)
             }
            
        });
          
    },

    /*
     * callback function: unsupportedBrowserDetected
     * Triggered when: the page loads and an unsupported browser is detected
     */
    unsupportedBrowserDetected: function() {
      /* PROVIDE FEEDBACK TO SITE VISITORS */
    },

    /*
     * callback function: inputEventReceived
     * Triggered when: visitors interact with SqPaymentForm iframe elements.
     */
    inputEventReceived: function(inputEvent) {
      switch (inputEvent.eventType) {
        case 'focusClassAdded':
          /* HANDLE AS DESIRED */
          break;
        case 'focusClassRemoved':
          /* HANDLE AS DESIRED */
          break;
        case 'errorClassAdded':
          /* HANDLE AS DESIRED */
          break;
        case 'errorClassRemoved':
          /* HANDLE AS DESIRED */
          break;
        case 'cardBrandChanged':
          /* HANDLE AS DESIRED */
          break;
        case 'postalCodeChanged':
          /* HANDLE AS DESIRED */
          break;
      }
    },

    /*
     * callback function: paymentFormLoaded
     * Triggered when: SqPaymentForm is fully loaded
     */
    paymentFormLoaded: function() {
      /* HANDLE AS DESIRED */
    }
  }
});
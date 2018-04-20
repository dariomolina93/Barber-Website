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


/*
 * function: requestCardNonce
 *
 * requestCardNonce is triggered when the "Pay with credit card" button is
 * clicked
 *
 * Modifying this function is not required, but can be customized if you
 * wish to take additional action when the form button is clicked.
 */
 
 function verifyFullName()
 {
   var name = document.getElementsByName("fullName")[0].value
   
   if(name.length < 4)
      return false
      
    return true;
 }
 
 function verifyEmail()
 {
   var email = document.getElementsByName("email")[0].value
   console.log(typeof(email))
   
   if(email.length < 5 || email.search('@') == -1)
      return false
      
    return true;
 }
 
 function verifyPhone()
 {
   var phone = document.getElementsByName("phone")[0].value
   
   if(phone.length < 10)
      return false
      
   return true
 }
 
 function verifyZipCode()
 {
   var zipCode = document.getElementsByName("zipCode")[0].value
   
   if(zipCode.length < 5)
      return false
      
   return true
 }
 
  function verifyState()
 {
   var state = document.getElementsByName("state")[0].value
   
   if(state.length < 2)
      return false
      
   return true
 }
 
 function inputPhone(evt)
 {
   var phone = document.getElementsByName("phone")[0].value
   if(phone.length == 10)
      return false;
      
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
        
    return true;
  }
  
function inputZipCode(evt)
 {
   var zipCode = document.getElementsByName("zipCode")[0].value
   if(zipCode.length == 5)
      return false;
      
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
        
    return true;
  }
  
  function verifyAddress()
  {
    var address = document.getElementsByName("address")[0].value
    
    if(address.length < 5)
      return false
      
    return true
  }
  
  function verifyCity()
  {
    var city = document.getElementsByName("city")[0].value
    
    if(city.length < 3)
      return false
      
    return true
  }
  
  function verifyFormInputFields()
  {
     if(!verifyFullName())
      {
        document.getElementById("error").innerHTML = "Full Name field needs to have atleast 5 letters."
        return false;
      }
      else if(!verifyEmail())
      {
        document.getElementById("error").innerHTML = "There is an error in email field."
        return false;
      }
      else if(!verifyPhone())
      {
        document.getElementById("error").innerHTML = "Phone field should have 10 digits."
        return false;
      }
      else if(!verifyAddress())
      {
        document.getElementById("error").innerHTML = "Address field should have atleast 5 letters."
        return false;
      }
      else if(!verifyZipCode())
      {
        document.getElementById("error").innerHTML = "Zip code field should have 5 digits"
        return false;
      }
      else if(!verifyCity())
      {
        document.getElementById("error").innerHTML = "City field should have atleast 3 letters."
        return false;
      }
      else if(!verifyState())
      {
        document.getElementById("error").innerHTML = "State field should have 2 letters."
        return false;
      }
      else
        return true;
  }
  
  
  
  function inputState(evt)
  {
    var states=["AK","AL","AR","AZ","CA","CO","CT","DE","FL","GA","HI","IA","ID","IL","IN","KS","KY","LA","MA","MD","ME","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VA","VT","WA","WI","WV","WY"]
      
    var state = document.getElementsByName("state")[0].value
    if(state.length == 2)
    {

      if(states.includes(state.toUpperCase()))
      {
        document.getElementsByName("state")[0].value = state.toUpperCase()
    
        return false
      }
      
      document.getElementsByName("state")[0].value = ""
    }
      
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode > 64 && charCode < 91) || (charCode >96 && charCode < 123))
      return true;
      
    return false
  }
  
 
 
function requestCardNonce(event) {

  //Don't submit form until form input fields have been filled
  if(!verifyFormInputFields())
  {
    console.log("before return")
    return;
  }
    
    
  //verifyFormInputFields();

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

  //Customize the CSS for SqPaymentForm iframe elements
  inputStyles: [{
      fontSize: '14px'
  }],

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
    elementId: 'postal-code',
    placeholder: "93930"
  },

  // SqPaymentForm callback functions
  callbacks: {

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
          document.getElementById("error").innerHTML = error.message
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
              url : "process.php",
              type: 'POST',
              data: payLoad,
              dataType: "json",
              success: function(data) {
                
                //console.log(data);
                console.log("Success!!!" + data)
                document.getElementById('nonce-form').submit();
                
                
              },
              error:function(data)
             {
                
                //console.log(data);
                var response = data["responseText"].substr(data["responseText"].search('{'),data["responseText"].length)
                
                response = $.parseJSON(response)
                
                document.getElementById("error").innerHTML = response["errors"][0]["detail"]
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
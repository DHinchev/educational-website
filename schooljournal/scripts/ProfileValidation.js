 //PROFILE PAGE SCRIPT


$(function() {
  //set method that checks for password validity
  $.validator.addMethod("regexpass", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Sorry the password can be between 6 and 12 characters long and the following symbols are not allowed: , ` * &amp; &gt; $&lt; ");

    // Setup form validation on the #change_form_password element
    $("#change_form_password").validate({
    
        // Specify the validation rules
                rules: {
                    change_password: {
                        required: true,
                        regexpass: /^([1-zA-Z0-1@.\s]{1,12})$/,
                        minlength: 6
                    },
                },
                //Set messages to display
                messages: {
                    change_password: {
                        required: "Password field is empty",
                        minlength: "Your password must be between 6 and 12 characters long"
                    },
                },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

$(function() {
  //set method that checks for email validity
  $.validator.addMethod("regexemail", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Sorry the email is either wrong or inproperly written");

    // Setup form validation on the #change_form_email element
    $("#change_form_email").validate({
    
        // Specify the validation rules
                rules: {
                    change_email: {
                        required: true,
                        regexemail: /^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/,
                    },
                },
                 //Set messages to display
                messages: {
                    change_email: {
                        required: "New email is required."
                    },
                },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

//if the email already exists in the database, display the corresponding messages in freen or blue
    $(document).ready(function(){
    $('#change_email').keyup(function(){
        var email = $('#change_email').val();
        if(email.length > 3) {
            $.ajax({ // Send the username val to available.php
            type : 'POST',
            data : {email:email},
            url  : '/schooljournal/php/registerValidationCheckEmail.php',
            success: function(data){ // Get the result
                if(data == true){
                     $('#messageEmail').html('Email is availabele').css('color', 'green'); 
                }
                else{
                    $('#messageEmail').html('Email is not availabe.Try another one').css('color', 'red');
                }
            }
            });
        }
    });
});
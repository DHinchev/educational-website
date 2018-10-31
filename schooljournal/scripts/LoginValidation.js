  
  $(function() {
//set username filtering method
$.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Please enter a valid username.");
//set email filtering method
$.validator.addMethod("regex", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Please enter a valid email.");
//set password filtering method
$.validator.addMethod("regexpass", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Sorry the password can be between 6 and 12 characters long and the following symbols are not allowed: , ` * &amp; &gt; $&lt; ");

    // Setup form validation on the #hideRegisterForm element
    $("#hideRegisterForm").validate({
    
        // Specify the validation rules
        rules: {
            username: {
                required: true,
                regx: /^[A-Za-z][A-Za-z0-9]*([A-Za-z0-9]+)*$/, 
                minlength: 6
            },
            password: {
                required: true,
                regexpass: /^([1-zA-Z0-1@.\s]{1,12})$/,
                minlength: 6
            },
            rpassword: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                regex: /^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/
            },
            registeras:{
                required: true,
                registeras: true
            },
            agreement:{
                required: true,
                agreement: true
            },
        },
        
        // Specify the validation error messages
        messages: {
            address: "Please enter your address",
            email: {
                    required: "Please enter a valid email",
                    },
            registeras: "You must choose user type",
            username: {
                required: "Please enter a valid username",
                minlength: "The username must be at leas 6 characters long",
            },
            agreement: "You must accept the terms of service",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            rpassword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            }
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

    $(function() {

    // Setup form validation on the #hide-login-form element
    $("#hide-login-form").validate({
    
        // Specify the validation rules
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    username: {
                        required: "Username is required."
                    },
                    password: {
                        required: "Password is required."
                    }
                },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });



  $(function() {

$.validator.addMethod("regex_forgott", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Please enter a valid email.");


    // Setup form validation for the #hideForfottenForm element
    $("#hideForfottenForm").validate({
    
        // Specify the validation rules
        rules: {
            email: {
                required: true,
                regex_forgott: /^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/
            },
        },
        
        // Specify the validation error messages
        messages: {
            email: {
                    required: "Please enter a valid email",
                    }
             },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

//Check if username exists in the database and if it does display the message
    $(document).ready(function(){
    $('#username').keyup(function(){
        var username = $('#username').val();
        if(username.length > 3) {
            $.ajax({ 
            type : 'POST',
            data : {username:username},
            url  : '/schooljournal/php/registerValidation.php',
            success: function(data){ 
                if(data == true){
                     $('#messageUsr').html('Username is availabele').css('color', 'green'); 
                }
                else{
                    $('#messageUsr').html('Username is not availabe.Try another one').css('color', 'red');
                }
            }
            });
        }
    });
});


//Check if email exists in the database and if it does display the message
    $(document).ready(function(){
    $('#email').keyup(function(){
        var email = $('#email').val();
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

//check if passwords in register are matching
    $('#password, #rpassword').keyup( function () {
    if ($('#password').val() == $('#rpassword').val()) {
        $('#messagePass').html('Matching').css('color', 'green');
    } else 
        $('#messagePass').html('Not Matching').css('color', 'red');
});


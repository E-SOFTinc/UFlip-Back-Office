//Added by Aparna
$(document).ready(function() {
  var msg3 = $("#error_msg3").html();
    $("#phone_no").keypress(function (e)  
	{
		//if the letter is not digit then display error and don't type anything
		if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
		{
			//display error message
			$("#errmsg1").html("Digits only ").show().fadeOut(1200,0); 
			return false;
		}	
	});
	
	return true;
    
});

function validate_feedback() {
    
    

        var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        var numberRegex = /^[0-9]+/;
        var charecterRegex = /^[0-9a-zA-Z]+/;
        var SpecialRegex = /^[a-z0-9]+/;
      
      var company=feedback_form.company.value;
      var phone_no=feedback_form.phone_no.value;
      var time_to_call=feedback_form.time_to_call.value;
      var email=feedback_form.email.value;
      var comments=feedback_form.comments.value;
      
        if (feedback_form.company)
        {

            if (company == "")
            {
               msg = $("#error_msg1").html();
               inlineMsg("company", msg, 4);
               return false; 
            }
        }
        
         if (feedback_form.phone_no)
        {

            if (phone_no == "")
            {
               msg = $("#error_msg3").html();
               inlineMsg("phone_no", msg, 4);
               return false; 
            }
        }
        
          if (feedback_form.time_to_call)
        {

            if (time_to_call == "")
            {
               msg = $("#error_msg4").html();
               inlineMsg("time_to_call", msg, 4);
               return false; 
            }
        }
        
        if (feedback_form.email)
        {

            if (email == "" || !email.match(emailRegex))
            {
               msg = $("#error_msg7").html();
               inlineMsg("email", msg, 4);
               return false; 
            }
        }
        
         if (feedback_form.comments)
        {

            if (comments == "")
            {
               msg8 = $("#error_msg8").html();
               inlineMsg("comments", msg8, 4);
               return false; 
            }
        }
        
        
       
        return true;
     };
    
///// code ends Aparna ////  



var ValidateUser = function() {
 
    // function to initiate Validation Sample 1
    var msg = $("#error_msg").html();
    var msg1 = $("#error_msg1").html();
    var msg2 = $("#error_msg2").html();
    var msg3 = $("#error_msg3").html();
    var msg4 = $("#error_msg4").html();
    var msg5 = $("#error_msg5").html();
    var runValidatorweeklySelection = function() {
        var searchform = $('#feedback_form');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#feedback_form').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
				 error.insertAfter($(element).closest('.input-group'));
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                feedback_user: {
                    minlength:1,
                    required:true
                },
                visitors_name: {
                    minlength: 1,
                    required: true
                },
               company: {
                    minlength: 1,
                    required: true
                },
               phone_no: {
                    minlength: 1,
                    required: true,
                    
                   
                   // equalTo: "#new_pwd_admin"
                },
            time_to_call: {
                    minlength: 1,
                    required: true
                }, 
              emaill: {
                    minlength: 1,
                    required: true,
                    email:true
                }, 
                comments: {
                    minlength: 1,
                    required: true
                } ,
                 email: {
                    minlength: 1,
                    required: true,
                    email:true
                }
            },
            messages: {
                feedback_user:msg2,
                 visitors_name: msg,
                company: msg1,
                phone_no: msg3,
                time_to_call: msg4,
               email: {
                    required: msg5,
                    email: "Your email address must be in the format of name@domain.com"
                },
                 comments: msg2
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                errorHandler1.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                //$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
            }
        });
    };
 /*   var runValidatordailySelection = function() {
        var searchform = $('#change_pass_common');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#change_pass_common').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                user_name_common: {
                    minlength: 1,
                    required: true
                },
                new_pwd_common: {
                    minlength: 1,
                    required: true
                },
                confirm_pwd_common: {
                    minlength: 1,
                    required: true,
                    equalTo: "#new_pwd_common"
                }
            },
            messages: {
                user_name_common: msg5,
                new_pwd_common: msg1,
                confirm_pwd_common: msg3



            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                errorHandler1.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                //$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
            }
        });
    };*/
    return {
        //main function to initiate template pages
        init: function() {
            runValidatorweeklySelection();
           
        }
    };
}();
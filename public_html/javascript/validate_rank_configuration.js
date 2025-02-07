
var Validateconfig = function() {

    // function to initiate Validation Sample 1
    var msg=$("#error_msg1").html();
    var msg1=$("#error_msg2").html();
    
    var runValidatorweeklySelection = function() {
        var searchform = $('#rank_form');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#rank_form').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
				// error.insertAfter($(element).closest('.input-group'));
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                rank_name: {
                    minlength: 1,
                    required: true
                },
               ref_count: {
                    minlength: 1,
                    required: true
                }
             
            },
            messages: {
                 rank_name:msg,
                ref_count: msg1
               
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
 
    return {
        //main function to initiate template pages
        init: function() {
            runValidatorweeklySelection();
           
        }
    };
}();

$("#rank_achievers_bonus").keypress(function (e)  

	{

	

	  //if the letter is not digit then display error and don't type anything

	  if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))

	  {

		//display error message

		$("#errmsg2").html("Digits Only ").show().fadeOut(1200,0); 

	   return false;

      }	

	});
        
        $("#ref_count").keypress(function (e)  

	{

	

	  //if the letter is not digit then display error and don't type anything

	  if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))

	  {

		//display error message

		$("#errmsg1").html("Digits Only ").show().fadeOut(1200,0); 

	   return false;

      }	

	});
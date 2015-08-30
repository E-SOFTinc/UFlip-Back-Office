$(document).ready(function()

{
    var msg = "";
    $("#product_amount").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46)
        {
            //display error message
            msg = $("#validate_msg1").html();
            $("#errmsg1").html(msg).show().fadeOut(1200, 0);
            return false;
        }
        return true;
    });
    $("#pair_value").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            //display error message
            msg = $("#validate_msg1").html();
            $("#errmsg2").html(msg).show().fadeOut(1200, 0);
            return false;
        }
        return true;
    });
});


/*function validate_product_add(proadd)
 
 { 
 var numberRegex = /^[0-9]+/;
 
 if(document.proadd.prod_name)
 {
 var prod_name = proadd.prod_name.value;
 }
 if(document.proadd.product_id)
 {
 var product_id = proadd.product_id.value;
 }
 if(document.proadd.product_amount)
 {
 var product_amount = proadd.product_amount.value;
 }
 if(document.proadd.product_value)
 {
 var product_value = proadd.product_value.value;
 }
 //alert(prod_name+'--'+product_id+"--"+product_amount+"--"+product_value);
 var msg="";
 
 if(prod_name == "") {
 
 msg = $("#error_msg1").html();
 
 inlineMsg('prod_name',msg,4);
 
 return false;
 
 }
 
 
 
 if(product_id == "") {
 
 msg = $("#error_msg2").html();
 
 inlineMsg('product_id',msg,4);
 
 return false;
 
 }
 
 if(product_amount == "") {
 
 msg = $("#error_msg3").html();
 
 inlineMsg('product_amount',msg,4);
 
 return false;
 
 }
 
 if(!product_amount.match(numberRegex))
 {
 msg = $("#validate_msg").html();
 
 inlineMsg('product_amount',msg,4);
 
 return false;
 }
 
 if(product_value == "") {
 
 msg = $("#error_msg4").html();
 
 inlineMsg('product_value',msg,4);
 
 return false;
 
 }
 if(!product_value.match(numberRegex))
 {
 msg = $("#validate_msg").html();
 
 inlineMsg('product_value',msg,4);
 
 return false;
 }
 
 return true;
 
 
 
 }*/
/*
 function validate_product_image(product_image_form)
 {
 var msg="";
 
 var product_id_img = product_image_form.product_id_img.value;
 
 
 var product_image = product_image_form.userfile.value;
 
 
 if(product_id_img == "") {
 
 msg = $("#validate_msg_img1").html();
 
 inlineMsg('product_id_img',msg,4);
 
 return false;
 
 }
 
 
 
 if(product_image == "") {
 
 msg = $("#validate_msg_img2").html();
 
 inlineMsg('userfile',msg,4);
 
 return false;
 
 }
 return true;
 }
 */


var ValidateUser = function() {

    // function to initiate Validation Sample 1
    var msg = $("#error_msg").html();
    var msg1 = $("#error_msg1").html();
    var msg2 = $("#error_msg2").html();
    var msg3 = $("#error_msg3").html();
    var msg4 = $("#validate_msg_img2").html();
    var msg5 = $("#validate_msg_img1").html();
    var msg6 = $("#error_msg4").html();

    var runValidatorweeklySelection = function() {
        var searchform = $('#proadd');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#proadd').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                prod_name: {
                    minlength: 1,
                    required: true
                },
                product_id: {
                    minlength: 1,
                    required: true
                },
                product_amount: {
                    minlength: 1,
                    required: true,
                    // equalTo: "#new_pwd_admin"
                },
                pair_value: {
                    minlength: 1,
                    required: true,
                }

            },
            messages: {
                prod_name: msg,
                product_id: msg1,
                product_amount: msg3,
                pair_value: msg6

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
    var runValidatordailySelection = function() {

        var searchform = $('#product_image_form');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#product_image_form').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                product_id: {
                    minlength: 1,
                    required: true
                }
//                userfile: {
//                    minlength: 1,
//                    required: true
//                }
            },
            messages: {
                product_id: msg5
                        //  userfile:msg4

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
            runValidatordailySelection();
        }
    };
}();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var ValidateUser = function() {

    // function to initiate Validation Sample 1
    var msg = $("#error_msg12").html();
    var msg1 = $("#error_msg9").html();
    var msg2 = $("#error_msg3").html();
    var msg3 = $("#error_msg1").html();
    var msg7 = $("#error_msg7").html();
    var msg8 = $("#error_msg8").html();
    var msg10 = $("#error_msg10").html();
    var runValidatorweeklySelection = function() {
        var searchform = $('#searchform');
        var errorHandler1 = $('.errorHandler', searchform);
        var successHandler1 = $('.successHandler', user_register);
        $.validator.addMethod("FullDate", function() {
            //if all values are selected
            if (($("#day").val() != "" || $("#day").val() == "00") && ($("#month").val() != "" || $("#month").val() != "00") && ($("#year").val() != "" || $("#year").val() != "0000")) {
                return true;
            } else {
                return false;
            }
        }, 'Please select a date ');
        $.validator.addMethod("panFormat", function(value, element) {

            if (value == 'NA') {
                return true
            } else {
                return this.optional(element) || value == value.match(/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/);
            }
        });  
        $('#searchform').validate({
          
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if ($(element).hasClass("date-picker")) {
                    error.insertAfter($(element).closest('.input-group'));
                }
                else
                {
                    error.insertAfter(element);
                }
                ;
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                gender: {
                    minlength: 1,
                    required: true
                },
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                address: {
                    minlength: 1,
                    required: true
                },
                mobile: {
                    minlength: 1,
                    required: true,
                    digits: true

                },
                pan_no: {
                    panFormat: true

                },
                date_of_birth: "FullDate"
            },
            messages: {
                gender: msg7,
                address: msg2,
                pan_no: msg10,
                mobile: {required: msg8,
                    digits: msg8

                }

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
    var runValidatorUserSelection = function() {
        var msg = $("#errmsg1").html();
        var searchform = $('#searchform');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#searchform').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if ($(element).hasClass("date-picker")) {
                    error.insertAfter($(element).closest('.input-group'));
                }
                else
                {
                    error.insertAfter(element);
                }
                ;
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                user_name: {
                    minlength: 1,
                    required: true
                }
            },
            messages: {
                user_name: msg3
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
            runValidatorUserSelection();

        }
    };
}();
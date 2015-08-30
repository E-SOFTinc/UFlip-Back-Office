
////Delete Payour Request
function delete_request(id, root)
{
    if (confirm("Sure you want to Delete this request? There is NO undo!"))
    {
        document.location.href = root + 'payout/payout_release/delete/' + id;
    }
}
var ValidateUser = function() {

    // function to initiate Validation Sample 1
    var msg = $("#error_msg").html();

    var runValidatorweeklySelection = function() {
        var searchform = $('#main_menu_chenge');
        var errorHandler1 = $('.errorHandler', searchform);

        $('#main_menu_chenge').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                error.insertAfter($(element).closest('.input-group'));
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                week_date2: {
                    minlength: 1,
                    required: true
                }
            },
            messages: {
                week_date2: msg

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

//=========validate checkbox===================//

var ValidatePayoutRelease = function() {


    // function to initiate Validation Sample 1
    var msg1 = $("#error_msg").html();
    ///////----for 'CHANGE USER PASSWORD' Tab - Begin/////////
    var runValidatorUserSelection = function() {

        /*jQuery.validator.addMethod("alpha_dash", function(value, element) {
         return this.optional(element) || /^[a-z0-9A-Z]*$/i.test(value);
         }, msg6);*/
        $.validator.addMethod('release', function(value) {
            return $('.release:checked').size() > 0;
        }, msg1);
        var searchform = $('#ewallet_form_det');
        var checkboxes = $('.release');
        var checkbox_names = $.map(checkboxes, function(e, i) {
            return $(e).attr("name")
        }).join(" ");
        var errorHandler1 = $('.errorHandler', searchform);
        $('#ewallet_form_det').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                error.insertAfter($(element).closest('.input-group'));
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            groups: {
                checks: checkbox_names
            },
            rules: {
                checkbox_name: {
                    required: true
                }
            },
            messages: {
                checkbox_name: {required: msg1}

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
            runValidatorUserSelection();

        }
    };
}();


 
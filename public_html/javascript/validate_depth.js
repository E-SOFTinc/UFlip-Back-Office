
var ValidateSettings = function() {

    // function to initiate Validation Sample 1

    var runValidateSettings = function() {

        var searchform = $('#set_depth_width');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#set_depth_width').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                // error.insertAfter($(element).closest('.input-group'));
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                depth_value: {
                    minlength: 1,
                    required: true,
                    numeric: 1
                }
            },
            messages: {
                depth_value: "You Must Enter Depth Ceiling"
                
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
            }

        });
    };

    return {
        //main function to initiate template pages
        init: function() {
            runValidateSettings();

        }
    };
}();



var FormWizard = function() {
    var msg = $("#validate_msg14").html();
    var msg1 = $("#validate_msg15").html();
    var msg2 = $("#validate_msg18").html();
    var msg3 = $("#validate_msg12").html();
    var msg4 = $("#validate_msg21").html();
    var msg5 = $("#validate_msg19").html();
    var msg6 = $("#error_msg6").html();
    var msg7 = $("#error_msg7").html();
    var msg8 = $("#validate_msg25").html();
    var msg9 = $("#validate_msg26").html();
    var msg10 = $("#validate_msg13").html();
    var msg11 = $("#validate_msg30").html();
    var msg12 = $("#validate_msg31").html();
    var msg13 = $("#validate_msg32").html();
    var msg14 = $("#validate_msg33").html();
    var msg15 = $("#validate_msg34").html();
    var msg16 = $("#validate_msg35").html();
    var msg17 = $("#validate_msg16").html();
    var msg18 = $("#validate_msg17").html();
    var msg19 = $("#validate_msg36").html();
    var msg20 = $("#validate_msg37").html();
    var msg21 = $("#validate_msg38").html();
    var msg22 = $("#validate_msg39").html();
    var msg23 = $("#validate_msg40").html();
    var msg24 = $("#validate_msg41").html();
    var msg25 = $("#validate_msg42").html();
    var msg26 = $("#validate_msg43").html();
    var msg27 = $("#validate_msg44").html();
    var msg28 = $("#validate_msg45").html();
    var msg29 = $("#validate_msg46").html();
    var msg30 = $("#validate_msg47").html();
    var msg31 = $("#validate_msg48").html();
    var msg32 = $("#validate_msg52").html();
    var msg33 = $("#validate_msg53").html();
    var msg34 = $("#validate_msg23").html();
    var msg35 = $("#validate_msg58").html();
    var msg36 = $("#validate_msg59").html();
    var msg37 = $("#validate_msg8").html();
    var msg63 = $("#validate_msg63").html();
    var msg64 = $("#validate_msg64").html();
    var msg70 = $("#validate_msg70").html();
    var msg66 = $("#validate_msg66").html();
    
    var wizardContent = $('#wizard');
    var wizardForm = $('#form');
    var initWizard = function() {
        // function to initiate Wizard Form
        wizardContent.smartWizard({
            selected: 0,
            keyNavigation: false,
            onLeaveStep: leaveAStepCallback,
            onShowStep: onShowStep,
        });
        var numberOfSteps = 0;
        animateBar();
        initValidator();
    };
    var animateBar = function(val) {
        if ((typeof val == 'undefined') || val == "") {
            var val1 = 0;
        }
        ;
        numberOfSteps = $('.swMain > ul > li').length;
        val1 = parseFloat(val, 10) - parseFloat(1, 10);
        var valueNow = Math.floor(100 / numberOfSteps * val1);
        $('.step-bar').css('width', valueNow + '%');
    };
    var initValidator = function() {
        $.validator.addMethod("alpha_dash", function(value, element) {
            return this.optional(element) || /^[a-z0-9A-Z$@$!%*#?& _~\-!@#\$%\^&\*\(\)?,.:|\\+\\[\]{}''"";`~=]*$/i.test(value);
           
        }, msg31);
             $.validator.addMethod("alpha_da", function(value, element) {
              return this.optional(element) || value == value.match(/^[a-zA-Z0-9-_]+$/);
        }, msg31);
        
        $.validator.addMethod("alpha_num", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z0-9]+$/);
        }, msg35);
        $.validator.addMethod("cardExpiry", function() {
            //if all values are selected
            if ($("#card_expiry_mm").val() != "" && $("#card_expiry_yyyy").val() != "") {
                return true;
            } else {
                return false;
            }
        }, 'Please select a month and year');
        $.validator.addMethod("valid_value", function() {
            var limit = $('#p_scents p').size();
            for (var i = 0; i <= limit; i++) {
                if ($('#epin' + i).val() != "") {
                    return true;
                }
                else
                    return false;

            }
        }, msg33);
        $.validator.addMethod("alpha", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z]+$/);
        }, msg35);

        $.validator.addMethod("alpha_spec", function(value, element) {
            return this.optional(element) || value == value.match(/^[.a-zA-Z ]+$/);
                  }, msg35);
        $.validator.addMethod("alpha_french", function(value, element) {
              return this.optional(element) || value == value.match(/^[a-zàâçéèêëîïôûùüÿñæœ .-]*$/i);
        }, msg35);

        $.validator.addMethod("pan_format", function(value, element) {
            return this.optional(element) || value == value.match(/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/);
        }, msg36);

        $.validator.setDefaults({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.checkbox-inline'));

                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
                // for other inputs, just perform default behavior

                //error.insertAfter($(element).closest('.input-group'));
                // for other inputs, just perform default behavior
            },
//            
            ignore: ':hidden',
            rules: {
                prodcut_id: {
                    minlength: 1,
                    required: true
                },
                ref_username: {
                    minlength: 1,
                    required: true
                },
                full_name: {
                    minlength: 1,
                    required: true,
                    alpha_french: true
                },
                quantity:
                {
                  minlength: 1,
                  required:true, 
                    min: 1,
                  number: true
                },
                pswd: {
                    minlength: 6,
                    alpha_da: true,
                    required: true,
                    maxlength: 20
                },
                cpswd: {
                    minlength: 6,
                    required: true,
                    alpha_da: true,
                    equalTo: "#pswd"
                },
                user_name_entry: {
                    minlength: 3,
                    maxlength: 20,
                    required: true
                },
                day: {
                    minlength: 1,
                    required: true
                },
                country: {
                    minlength: 1,
                    required: true
                },
                mobile: {
                    required: true,
                    number: true,
                },
                gender: {
                    minlength: 1,
                    required: true
                },
                month: {
                    minlength: 1,
                    required: true
                },
                year: {
                    minlength: 1,
                    required: true
                },
                position: {
                    minlength: 1,
                    required: true
                },
                address: {
                    minlength: 1,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                agree: {
                    minlength: 1,
                    required: true
                },
                card_number: {
                    minlength: 1,
                    required: true,
                    number: true

                },
                total_amount: {
                    minlength: 1,
                    required: true,
                    number: true
                },
                pay_type: {
                    minlength: 1,
                    required: true
                },
                card_cvn: {
                    minlength: 1,
                    required: true,
                    number: true
                },
                card_expiry_year: {
                    minlength: 1,
                    required: true
                },
                card_expiry_month: {
                    minlength: 1,
                    required: true
                },
                bill_to_forename: {
                    minlength: 1,
                    required: true,
                    alpha_spec: true
                },
                bill_to_surname: {
                    minlength: 1,
                    required: true,
                    alpha_spec: true
                },
                bill_to_email: {
                    minlength: 1,
                    required: true,
                    email: true
                },
                bill_to_phone: {
                    minlength: 1,
                    number: true,
                    required: true
                },
                epin1: {
                    minlength: 1,
                    required: true,
                    valid_value: true
                },
                user_name_ewallet: {
                    minlength: 1,
                    required: true
                },
                tran_pass_ewallet: {
                    minlength: 1,
                    required: true
                },
                bank_name: {
                    alpha_spec: true
                },
                bank_branch: {
                    alpha_spec: true
                }, bank_acc_no: {
                    number: true
                },
                pan_no: {
                    alpha_num: true,
                    pan_format: true
                }

            },
            messages: {
                pan_no: {alpha_num: msg31,
                    pan_format: msg36
                },
                bank_acc_no: msg20,
                bank_branch: msg35,
                bank_name: msg35,
                card_number: {required: msg25,
                    minlength: 'atleast one charactor',
                    number: msg20},
                epin1: {valid_value: msg33},
                ref_username: msg37,
                     
                full_name: {
                    required: msg,
                    alpha_french: msg35
                },
                quantity:{
                   number :msg63,
                   required :msg63,
                   minlength:msg63,
                   min:msg63
                },
                pswd: {required: msg1,
                    minlength: msg17,
                alpha_da:msg70},
                cpswd: {required: msg18,
                    minlength: msg17,
                    equalTo: msg2,
                    alpha_da:msg70},
                prodcut_id: msg3,
                
                day: msg11,
                country: msg15,
                mobile: {required: msg8,
                    number: msg20},
                agree: msg9,
                passcode: msg10,
                email: {
                    required: msg23,
                    email: msg16
                },
                gender: msg14,
                month: msg12,
                year: msg13,
                position: msg34,
                address: msg24,
                card_expiry_month: msg12,
                card_expiry_year: msg13,
                total_amount: {required: msg26,
                    number: msg20
                },
                pay_type: msg32,
                card_cvn: {required: msg27,
                    number: msg20
                },
                bill_to_forename: {required: msg29,
                    alpha_spec: msg35
                },
                bill_to_surname: {required: msg29,
                    alpha_spec: msg35
                },
                bill_to_email: {
                    required: msg23,
                    email: msg16
                },
                bill_to_phone: {
                    required: msg8,
                    number: msg20,
                    minlength: msg19
                },
                user_name_ewallet: {
                    required: msg21
                },
                tran_pass_ewallet: {
                    required: msg1
                },
                user_name_entry:{
                    required: msg21,
                    minlength:msg64,
                    maxlength:msg70
                },
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
//                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
                $(element).closest('.form-group').removeClass('has-error').removeClass('required').find('.symbol').addClass('ok');
            }
        });
    };
    var displayConfirm = function() {
        $('.display-value', form).each(function() {
            var input = $('[name="' + $(this).attr("data-display") + '"]', form);
            if (input.attr("type") == "text" || input.attr("type") == "email" || input.is("textarea")) {
                $(this).html(input.val());
            } else if (input.is("select")) {
                $(this).html(input.find('option:selected').text());
            } else if (input.is(":radio") || input.is(":checkbox")) {

                $(this).html(input.filter(":checked").closest('label').text());
            } else if ($(this).attr("data-display") == 'card_expiry') {
                $(this).html($('[name="card_expiry_mm"]', form).val() + '/' + $('[name="card_expiry_yyyy"]', form).val());
            }
        });
    };
    var onShowStep = function(obj, context) {
        $(".next-step").unbind("click").click(function(e) {
            e.preventDefault();
            wizardContent.smartWizard("goForward");
        });
        $(".back-step").unbind("click").click(function(e) {
            e.preventDefault();
            wizardContent.smartWizard("goBackward");
        });
        $(".finish-step").unbind("click").click(function(e) {
            e.preventDefault();
            onFinish(obj, context);
        });
    };
    var leaveAStepCallback = function(obj, context) {
        return validateSteps(context.fromStep, context.toStep);
        // return false to stay on step and true to continue navigation
    };
    var onFinish = function(obj, context) {
        if (validateAllSteps()) {
            alert('form submit function');
            $('.anchor').children("li").last().children("a").removeClass('wait').removeClass('selected').addClass('done');
            // wizardForm.submit();
        }
    };
    var validateSteps = function(stepnumber, nextstep) {
        var isStepValid = false;


        if (numberOfSteps >= nextstep && nextstep > stepnumber) {
            // cache the form element selector

            if (wizardForm.valid()) { // validate the form
                wizardForm.validate().focusInvalid();

                $('.anchor').children("li:nth-child(" + stepnumber + ")").children("a").removeClass('wait');
                //focus the invalid fields
                animateBar(nextstep);
                isStepValid = true;
                return true;
            }
            ;
        } else if (nextstep < stepnumber) {
            $('.anchor').children("li:nth-child(" + stepnumber + ")").children("a").addClass('wait');
            animateBar(nextstep);
            return true;
        } else {
            $('.anchor').children("li:nth-child(" + stepnumber + ")").children("a").removeClass('wait');
            displayConfirm();
            animateBar(nextstep);
            return true;
        }
        ;
    };
    var validateAllSteps = function() {
        var isStepValid = true;
        // all step validation logic
        return isStepValid;
    };
    return {
        init: function() {
            initWizard();
        }
    };
}();
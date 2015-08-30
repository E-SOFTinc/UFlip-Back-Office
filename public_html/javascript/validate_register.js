function submitPinOk() {
    var path_temp = document.form.path_temp.value;
    var path_root = document.form.path_root.value;

    var limit = $('#p_scents p').size();
    var pin_ok_button = "";
    var usd_pin = new Array();


    for (var j = 1; j <= limit; j++)
    {
        var epin_name = '#epin' + j;
        var id = $(epin_name).val();
        var pin_bal = $('#remaining_amount' + j).val();
        var pin_amount = $('#pin_amount' + j).val();

        if ($('#p_scents p').size() == j)
            pin_ok_button = 1;
        else
            pin_ok_button = 0;

        var used_pin_det = {'used_pin': id, 'bal_amount': pin_bal, pin_ok: pin_ok_button, pin_amount: pin_amount};

        usd_pin.push(used_pin_det);


    }

    $.ajax({
        url: path_root + "register/epin_submited/",
        type: 'POST',
        data: JSON.stringify({
            json: usd_pin
        }),
        dataType: "json",
        contentType: "application/json",
//                success: function(data) {
//                    if(data==1)
//                    {
//                        
//                        var data1=JSON.stringify(usd_pin);
//                        alert(data1);
//                        var hidden_pin = document.getElementById('is_pin_ok');
//                        hidden_pin.value = data1;
//                    }
//                    else{
//                        var hidden_pin = document.getElementById('is_pin_ok');
//                        hidden_pin.value = null;
//                    }
//                        
//                }
    });


}




function validate_epin(total) {

    var path_temp = document.form.path_temp.value;
    var path_root = document.form.path_root.value;

    var validity = 0;
    var is_invalid_pin = 0;
    var valid_index = 0;
    var invalid_index = 0;
    var pin_amount = 0;
    var valid_codes = new Array();
    var invalid_codes = new Array();
    var limit = $('#p_scents p').size();
    //alert(limit);
    var epin_name = "";

    var pass_arr = new Array();
    var usd_pin = new Array();
    var index = 0;
    var flag = true;
    var epin_valid = path_root + "register/isEpinValid";
    var pin_ok_button = 0;
    var data1 = new Array();

    for (var i = 1; i <= limit; i++)
    {
        epin_name = '#epin' + i;
        var id = $(epin_name).val();
        var res = " ";
        res = getId(pass_arr, id);
        var pass_str = {'pin': res, 'amount': 0};
        pass_arr.push(pass_str);
    }
    function getId(pass_arr, id) {
        var i = 0;
        var j = 1;
        var arr_len = pass_arr.length;

        if (arr_len == 0)
            j = 1;
        if (arr_len > 0)
            j = 0;
        var pin = id;
        for (var i = j; i < arr_len; i++) {

            if (pass_arr[i].pin == id) {
                pin = 'nopin';
                return pin;

            }
            else
            {
                pin = id;
            }

        }
        return pin;
    }

    if (flag)
    {
        var epin_available = path_root + "register/isEpinValid/";
        var JSON_data = JSON.stringify(pass_arr);
        var epin = "";
        var amount = "";
        var toat_amount = 0;
        var i = 1;

        $.ajax({
            url: epin_available,
            type: 'POST',
            data: JSON.stringify({
                json: pass_arr
            }),
            dataType: "json",
            contentType: "application/json",
            success: function(data) {
                $.each(data, function(k, v) {

                    amount = v.amount;
                    epin = v.pin;


                    if (epin == "nopin")
                    {
                        $("#pin_box_" + i).fadeTo(2000, 0.1, function() //start fading the messagebox

                        {

                            var msg36 = "InValid epin..";
                            //var msg37 = $("#error_msg37").html();
                            //add message and change the class of the box and start fading

                            $(this).removeClass();

                            $(this).addClass('messageboxok');


                            $(this).html('<img align="absmiddle" src="' + path_temp + 'images/Error.png" />' + msg36).show().fadeTo(1900, 1);

                        });
                    }
                    else {
                        toat_amount += parseFloat(amount);

                        document.getElementById("pin_amount" + i).value = amount;
                        document.getElementById("balance_amount" + i).value = 0;
                        document.getElementById("remaining_amount" + i).value = 0;
                        $("#pin_box_" + i).fadeTo(2000, 0.1, function() //start fading the messagebox

                        {

                            var msg37 = " Valid epin..";
                            //var msg37 = $("#error_msg37").html();
                            //add message and change the class of the box and start fading

                            $(this).removeClass();

                            $(this).addClass('messageboxok');


                            $(this).html('<img align="absmiddle" src="' + path_temp + 'images/accepted.png" />' + msg37).show().fadeTo(1900, 1);

                        });
                        var product_amount = Math.round($('#product_amount').val() * 100) / 100;
                        if (toat_amount > $('#product_amount').val())
                        {
                            bal_amount = toat_amount - product_amount;
                            bal_amount = Math.round(bal_amount * 100) / 100;
                            new_amount = toat_amount - bal_amount;
                            new_amount = Math.round(new_amount * 100) / 100;
                            document.getElementById('epin_total_amount').value = new_amount;
                            toat_amount = new_amount;
                            document.getElementById("remaining_amount" + i).value = bal_amount;
                        }
                        req_amount = product_amount - toat_amount;
                        req_amount = Math.round(req_amount * 100) / 100;
                        document.getElementById("balance_amount" + i).value = req_amount;








                    }
                    i++;

                });

                if ((epin != 'nopin') || (is_invalid_pin != " ")) {
                    if ($('#product_amount').val() > toat_amount)
                    {
                        addNewraw();

                    }

                    else
                    {
                        $('#validate_epin_div').remove();
                        var pin_ok_button = "";
                        var usd_pin = new Array();

                        addFinishButn();


                        for (var j = 1; j <= limit; j++)
                        {
                            var epin_name = '#epin' + j;
                            var id = $(epin_name).val();
                            var pin_bal = $('#remaining_amount' + j).val();
                            var pin_amount = $('#pin_amount' + j).val();

                            if ($('#p_scents p').size() == j)
                                pin_ok_button = 1;
                            else
                                pin_ok_button = 0;

                            var used_pin_det = {'used_pin': id, 'bal_amount': pin_bal, pin_ok: pin_ok_button, pin_amount: pin_amount};

                            usd_pin.push(used_pin_det);


                        }

                        data1 = JSON.stringify(usd_pin);

                        var hidden_pin = document.getElementById('is_pin_ok');
                        hidden_pin.value = data1;
//                        
                        //  document.getElementById("pin_btn").disabled = true; 
                    }
                    document.getElementById('epin_total_amount').value = toat_amount;

                }


            }
//            error: function(request, errorType, errorThrown) {
//                alert('Error Type: ' + errorType + '  Request: ' + request + '  Error ' + errorThrown);

//            }
        });



    }

}

function addNewraw()
{
//style="position:absolute; margin-top:35px; margin-left:36px; width:151px; height:15px;"
    var scntDiv = $('#p_scents');
    var j = $('#p_scents p').size() + 1;
    $('<tr   align="center" ><td>' + j + '</td> <td><p><label for="p_scnts"><div class="col-md-12"><input type="text" id="epin' + j + '" size="13" name="epin' + j + '" value="" placeholder="PIN"  autocomplete="off" class="form-control"/></div><span id ="pin_box_' + j + '"> </span></label></td><td><div class="col-md-12"><input type="text" id="pin_amount' + j + '" size="13" readonly="true" class="form-control"/></div></td><td><div class="col-md-12"><input type="text" id="remaining_amount' + j + '" size="13" readonly="true" class="form-control"/></div></td><div class="col-md-12"><td><div class="col-md-12"><input type="text" id="balance_amount' + j + '" size="13" readonly="true" class="form-control"/></div></div></td></tr>').appendTo(scntDiv);
    j++;
    return false;
}
function addFinishButn()
{
//style="position:absolute; margin-top:35px; margin-left:36px; width:151px; height:15px;"
    var finButtDiv = $('#finButtn');

     $(' <div class="col-sm-2 col-sm-offset-8"><button  tabindex="48" class="btn btn-blue btn-block" id ="pin_ok" name= "pin_ok"   style="float: right;" >Finish <i class="fa fa-arrow-circle-right"></i></button ></div></div>').appendTo(finButtDiv);


    return true;
}
function validate_registration(form)
{

    // alert('dsdsdsdsdsdsd');
    var numberRegex = /^[0-9]+/;

    var SpecialRegex = /^[a-z0-9]+/;

    var SpaceRegex = (/^\s+$/);

    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    var full_name = form.full_name.value;


    if (document.form.prodcut_id)
    {
        var prodcut_id = form.prodcut_id.value;
    }

    if (document.form.passcode)
    {
        var passcode = form.passcode.value;
    }

    //var username = form.username.value;

    var pswd = form.pswd.value;
    var cpswd = form.cpswd.value;

    //alert(cpswd);
    //var father_id = form.father_id.value;

    if (document.form.sponser_office)
    {
        var sponser_office = form.sponser_office.value;
    }

    if (document.form.sponser_user_name)
    {
        var sponser_user_name = form.sponser_user_name.value;
    }

    if (document.form.position)
    {
        var position = form.position.value;
    }

    if (document.form.address)
    {
        var address = form.address.value;
    }

    if (document.form.district)
    {
        var district = form.district.value;
    }

    if (document.form.state)
    {
        var state = form.state.value;
    }

    if (document.form.mobile)
    {
        var mobile = form.mobile.value;
    }

    if (document.form.land_line)
    {
        var land_line = form.land_line.value;
    }

    if (document.form.email)
    {
        var email = form.email.value;
    }

    if (document.form.user_name_entry)
    {
        var user_name_entry = form.user_name_entry.value;

    }

    if (document.form.date_of_birth)
    {
        var date_of_birth = form.date_of_birth.value;
    }
    if (document.form.year)
    {
        var year = form.year.value;
    }

    var agree = form.agree.checked;

    if (position == "")
    {
        var msg;
        msg = $("#validate_msg23").html();
        inlineMsg('position', msg, 4);
        return false;
    }

    if (form.prodcut_id)
    {
        if (prodcut_id == "")
        {
            var msg;
            msg = $("#validate_msg12").html();
            inlineMsg('prodcut_id', msg, 4);
            return false;
        }
    }

    if (form.user_name_entry)
    {
        if (user_name_entry == "")
        {
            var msg;

            inlineMsg('user_name_entry', 'you must enter user name....', 4);
            return false;
        }
        if (user_name_entry.length < 5)
        {
            var msg;

            inlineMsg('user_name_entry', 'user name  must have minimum 5 character length....', 4);
            return false;
        }
        if (user_name_entry.length > 20)
        {
            var msg;

            inlineMsg('user_name_entry', 'user name exceeds size limit....', 4);
            return false;
        }

    }

    if (form.passcode)
    {
        if (passcode == "")
        {
            var msg;
            msg = $("#validate_msg13").html();
            inlineMsg('passcode', msg, 4);
            return false;
        }
    }
    if (full_name == "")
    {
        //alert('zdfds');
        var msg;
        msg = $("#validate_msg14").html();
        inlineMsg('full_name', msg, 4);
        return false;
    }

    if (pswd == "")
    {
        var msg;
        msg = $("#validate_msg15").html();
        inlineMsg('pswd', msg, 4);
        return false;
    }

    if (pswd.length < 6)
    {
        var msg;
        msg = $("#validate_msg16").html();
        inlineMsg('pswd', msg, 4);
        return false;
    }

    if (cpswd == "")
    {
        var msg;
        msg = $("#validate_msg17").html();
        inlineMsg('cpswd', msg, 4);
        return false;
    }

    if (pswd != cpswd)
    {
        var msg;
        msg = $("#validate_msg18").html();
        inlineMsg('pswd', msg, 4);
        return false;
    }
    if (form.date_of_birth)
    {
        if (date_of_birth == "")
        {
            var msg;
            msg = $("#validate_msg19").html();
            inlineMsg('day', msg, 4);
            return false;
        }
    }
    if (form.year)
    {
        if (year > 1994)
        {
            var msg;
            msg = $("#validate_msg20").html();
            inlineMsg('day', msg, 4);
            return false;
        }
    }
    /*
     if(username == "")
     {
     inlineMsg('username','You must enter your  Full Name...',4);
     return false;
     }
     */


    if (form.sponser_office)
    {
        if (sponser_office == "")
        {
            var msg;
            msg = $("#validate_msg21").html();
            inlineMsg('sponser_office', msg, 4);
            return false;
        }
    }

    if (form.sponser_user_name)
    {
        if (sponser_user_name == "")
        {
            var msg;
            msg = $("#validate_msg22").html();
            inlineMsg('sponser_user_name', msg, 4);
            return false;
        }
    }

    if (position == "")
    {
        var msg;
        msg = $("#validate_msg23").html();
        inlineMsg('position', msg, 4);
        return false;
    }

    var referal_status = document.form.referal_status.value;

    if (referal_status == "yes")
    {
        var ref_username = form.ref_username.value;
        if (ref_username == "")
        {
            var msg;
            msg = $("#validate_msg24").html();
            inlineMsg('ref_username', msg, 4);
            return false;
        }
    }

    /*
     if(form.address)
     {
     if(address == "")
     {
     inlineMsg('address','You must enter your address...',4);
     return false;
     }
     }
     
     if(form.district)
     {
     if(district == "")
     {
     inlineMsg('district','You must enter your district...',4);
     return false;
     }
     }
     
     if(form.state)
     {
     if(state == "")
     {
     inlineMsg('state','You must select your state...',4);
     return false;
     }
     }
     */
    if (form.mobile)
    {
        if (mobile == "")
        {
            var msg;
            msg = $("#validate_msg25").html();
            inlineMsg('mobile', msg, 4);
            return false;
        }
    }

    /*if(form.land_line)
     {
     if(land_line == "")
     {
     inlineMsg('land_line','You must enter your phone number...',4);
     return false;
     }
     }
     
     if(form.email)
     {
     if(email == "")
     {
     inlineMsg('email','You must enter your email...',4);
     return false;
     }
     
     if(!email.match(emailRegex))
     {
     inlineMsg('email','You have entered an invalid  email...',4);
     }
     }
     if(form.email)
     {		
     if(!email.match(emailRegex))
     {
     inlineMsg('email','You have entered an invalid  email...',4);
     }
     }*/



    if (agree == false)
    {
        var msg;
        msg = $("#validate_msg26").html();
        inlineMsg('agree1', msg, 4);
        return false;
    }

    return true;

}
function validate_page()
{

    //  Main.init();
    //TableData.init();
    // FormWizard.init();
    ValidateUser.init();

    // DateTimePicker.init();

}



//var ValidateUser = function() {
//
//    // function to initiate Validation Sample 1
//    var msg = $("#validate_msg14").html();
//    var msg1 = $("#validate_msg15").html();
//    var msg2 = $("#validate_msg18").html();
//    var msg3 = $("#validate_msg12").html();
//    var msg4 = $("#validate_msg21").html();
//    var msg5 = $("#validate_msg19").html();
//    var msg6 = $("#error_msg6").html();
//    var msg7 = $("#error_msg7").html();
//    var msg8 = $("#validate_msg25").html();
//    var msg9 = $("#validate_msg26").html();
//    var msg10 = $("#validate_msg13").html();
//    var msg11 = $("#validate_msg30").html();
//    var msg12 = $("#validate_msg31").html();
//    var msg13 = $("#validate_msg32").html();
//    var msg14 = $("#validate_msg33").html();
//    var msg15 = $("#validate_msg34").html();
//    var msg16 = $("#validate_msg35").html();
//    var msg17 = $("#validate_msg16").html();
//    var msg18 = $("#validate_msg17").html();
//    var msg19 = $("#validate_msg36").html();
//    var msg20 = $("#validate_msg37").html();
//    var msg21 = $("#validate_msg38").html();
//    var msg22 = $("#validate_msg39").html();
//    var msg23 = $("#validate_msg40").html();
//    var msg24 = $("#validate_msg41").html();
//    var msg25 = $("#validate_msg23").html();
//
//    var runValidatorweeklySelection = function() {
//
////document.getElementById("register1").className = "btn btn-blue";
//        jQuery.validator.addMethod("alpha_dash", function(value, element) {
//            return this.optional(element) || /^[a-z0-9A-Z]*$/i.test(value);
//        }, msg22);
//
//        var searchform = $('#form');
//
//        var errorHandler1 = $('.errorHandler', searchform);
//
//        $('#form').validate({
//            errorElement: "span", // contain the error msg in a span tag
//            errorClass: 'help-block',
//            errorPlacement: function(error, element) { // render error placement for each input type
//
//                error.insertAfter(element);
//                error.insertAfter($(element).closest('.input-group'));
//                // for other inputs, just perform default behavior
//            },
//            ignore: ':hidden',
//            rules: {
////                full_name: {
////                    minlength: 1,
////                    required: true
////                },
////                pswd: {
////                    minlength: 6,
////                    alpha_dash: true,
////                    required: true
////                },
////                cpswd: {
////                    minlength: 6,
////                    required: true,
////                    alpha_dash: true,
////                    equalTo: "#pswd"
////                },
////                prodcut_id: {
////                    minlength: 1,
////                    required: true
////                },
////                user_name_entry: {
////                    minlength: 1,
////                    required: true
////                },
////                day: {
////                    minlength: 1,
////                    required: true
////                },
////                country: {
////                    minlength: 1,
////                    required: true
////                },
////                mobile: {
////                    required: true,
////                    number: true,
////                    minlength: 10
////                },
////                agree: {
////                    minlength: 1,
////                    required: true
////                },
////                passcode: {
////                    minlength: 1,
////                    required: true
////                },
////                email: {
////                    required: true,
////                    email: true
////                },
////                gender: {
////                    minlength: 1,
////                    required: true
////                },
////                month: {
////                    minlength: 1,
////                    required: true
////                },
////                year: {
////                    minlength: 1,
////                    required: true
////                },
////                position: {
////                    minlength: 1,
////                    required: true
////                },
////                address: {
////                    minlength: 1,
////                    required: true
////                }
//
//            },
//            messages: {
//                full_name: msg,
//                pswd: {required: msg1,
//                    minlength: msg17},
//                cpswd: {required: msg18,
//                    minlength: msg17,
//                    equalTo: msg2},
//                prodcut_id: msg3,
//                user_name_entry: msg21,
//                day: msg11,
//                country: msg15,
//                mobile: {required: msg8,
//                    number: msg20,
//                    minlength: msg19},
//                agree: msg9,
//                passcode: msg10,
//                email: {
//                    required: msg23,
//                    email: msg16
//                },
//                gender: msg14,
//                month: msg12,
//                year: msg13,
//                position: msg25,
//                address: msg24
//
//            },
//            invalidHandler: function(event, validator) { //display error alert on form submit
//                errorHandler1.show();
//            },
//            highlight: function(element) {
//                $(element).closest('.help-block').removeClass('valid');
//                // display OK icon
//                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
//                // add the Bootstrap error class to the control group
//            },
//            unhighlight: function(element) { // revert the change done by hightlight
//                $(element).closest('.form-group').removeClass('has-error');
//                // set error class to the control group
//            },
//            success: function(label, element) {
//                label.addClass('help-block valid');
//                // mark the current input as valid and display OK icon
//                //$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
//                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
//
//            }
//        });
//    };
//    var runValidatorcardSelection = function() {
//
//        jQuery.validator.addMethod("alpha_dash", function(value, element) {
//            return this.optional(element) || /^[a-z0-9A-Z]*$/i.test(value);
//        }, msg22);
//
//        var searchform = $('#credit_card');
//        var errorHandler1 = $('.errorHandler', searchform);
//        $('#credit_card').validate({
//            errorElement: "span", // contain the error msg in a span tag
//            errorClass: 'help-block',
//            errorPlacement: function(error, element) { // render error placement for each input type
//
//                error.insertAfter(element);
//                error.insertAfter($(element).closest('.input-group'));
//                // for other inputs, just perform default behavior
//            },
//            ignore: ':hidden',
//            rules: {
//                card_number: {
//                    minlength: 1,
//                    required: true,
//                    alpha_dash: true
//
//                },
//                total_amount: {
//                    minlength: 1,
//                    required: true
//                },
//                pay_type: {
//                    minlength: 1,
//                    required: true
//                },
//                card_cvn: {
//                    minlength: 1,
//                    required: true
//                },
//                bill_to_forename: {
//                    minlength: 1,
//                    required: true
//                },
//                bill_to_surname: {
//                    minlength: 1,
//                    required: true
//                },
//                bill_to_email: {
//                    minlength: 1,
//                    required: true
//                },
//                bill_to_phone: {
//                    minlength: 1,
//                    required: true
//                }
//
//
//
//            },
//            messages: {
//                card_number: {required: 'must enter the card numberqqqqq',
//                    minlength: 'atleast one charactor',
//                    alpha_dash: "msg2"},
//                total_amount: 'must enter the amount',
//                pay_type: 'must select pay type',
//                card_cvn: 'must enter the validation number',
//                bill_to_forename: 'must enter the first name ',
//                bill_to_surname: 'must enter the last name ',
//                bill_to_email: 'must enter the email id ',
//                bill_to_phone: 'must enter valid phone number '
//
//            },
//            invalidHandler: function(event, validator) { //display error alert on form submit
//                errorHandler1.show();
//            },
//            highlight: function(element) {
//                $(element).closest('.help-block').removeClass('valid');
//                // display OK icon
//                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
//                // add the Bootstrap error class to the control group
//            },
//            unhighlight: function(element) { // revert the change done by hightlight
//                $(element).closest('.form-group').removeClass('has-error');
//                // set error class to the control group
//            },
//            success: function(label, element) {
//                label.addClass('help-block valid');
//                // mark the current input as valid and display OK icon
//                //$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
//                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
//            }
//        });
//    };
//
//    return {
//        //main function to initiate template pages
//        init: function() {
//            runValidatorweeklySelection();
//            runValidatorcardSelection();
//        }
//    };
//}();

$('#epin_tab').click(function() {
    document.getElementById("active_tab").value = "epin_tab";

});
$('#e_xact_status').click(function() {
    document.getElementById("active_tab").value = "e_xact_tab";

});

$('#credit_card_tab').click(function() {
    document.getElementById("active_tab").value = "credit_card_tab";

});
$('#ewallet_tab').click(function() {
    document.getElementById("active_tab").value = "ewallet_tab";

});

$('#free_join_tab').click(function() {
    document.getElementById("active_tab").value = "free_join_tab";

});
$('#paypal_tab').click(function() {
    document.getElementById("active_tab").value = "paypal_tab";

});
$('#epdq_tab').click(function() {
    document.getElementById("active_tab").value = "epdq_tab";

});
$('#authorize_tab').click(function() {
    document.getElementById("active_tab").value = "authorize_tab";

});
$('#myTab3 a').click(function(e) {
    e.preventDefault();
    $('#myTab a:first').tab('show')
});

$(document).ready(function()
{
    //var path_temp = document.form.path_temp.value;
    var path_root = document.form.path_root.value;
    var product_status = document.getElementById("check_product_status").value;

    if (product_status == 'no') {
        var register_amount = path_root + "register/getRegisterAmount";
        $.post(register_amount, function(data) {
            if (data != 'no_data') {
                $('span.total-title').html(data);
                document.getElementById('product_amount').value = data;
            }

        });

    }
});

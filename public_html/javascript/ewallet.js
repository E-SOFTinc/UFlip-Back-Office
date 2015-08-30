function trim(a)
{

    return a.replace(/^\s+|\s+$/, '');
}

function getXMLHTTP() { //fuction to return the xml http object
    var xmlhttp = false;
    try {
        xmlhttp = new XMLHttpRequest();
    }
    catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e1) {
                xmlhttp = false;
            }
        }
    }

    return xmlhttp;
}

function test()
{
    alert('sss');
}

function getAmountLeg()
{
    var root = document.fund_form.path.value;
    var user_id = document.getElementById('user_name').value;
    var strURL = root + "/ewallet/getLegAmount/" + user_id;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    //alert(trim(req.responseText));
                    document.getElementById('fund1').innerHTML = trim(req.responseText);
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("GET", strURL, true);
        //alert(strURL);
        req.send(null);
    }
}
function getBalanceEPinNum(user_id)
{
    var root = document.fund_form.path.value;
    var strURL = root + "Ewallet/getBalance_EPin/user:" + user_id;
    var req = getXMLHTTP();
    if (req) {

        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    //alert(trim(req.responseText));
                    document.getElementById('fund1').innerHTML = trim(req.responseText);
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("GET", strURL, true);
        //alert(strURL);
        req.send(null);
    }
}
function getPasswordMd(pswd)
{
    var root = document.fund_form.path.value;
    var strURL = root + "/ewallet/getPassWordInmd/" + pswd;
    var req = getXMLHTTP();
    if (req) {

        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    //alert(trim(req.responseText));
                    document.getElementById('hid_pass').innerHTML = trim(req.responseText);
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("GET", strURL, true);
        //alert(strURL);
        req.send(null);
    }
}

function validate_ewallet_fund(fund_form)
{
    var msg = "";
    var numberRegex = /^[0-9]+/;
    if (document.fund_form.user_name)
    {
        var user_name = fund_form.user_name.value;
    }
    if (document.fund_form.pswd)
    {
        var pswd = fund_form.pswd.value;
    }
    if (document.fund_form.u_pwd)
    {
        var u_pwd = fund_form.u_pwd.value;
    }
    if (document.fund_form.md_psd)
    {
        var md_psd = fund_form.md_psd.value;
    }
    if (document.fund_form.to_user_name)
    {
        var to_user_name = fund_form.to_user_name.value;
    }
    if (document.fund_form.amount)
    {
        var amount = fund_form.amount.value;
    }
    if (document.fund_form.bal)
    {
        var bal = fund_form.bal.value;
    }
    var first_amount = parseInt(amount);
    var first_bal = parseInt(bal);
    if (user_name == "")
    {
        msg = $("#error_msg1").html();
        inlineMsg('user_name', msg, 4);
        return false;
    }
    if (first_bal == 0)
    {
        msg = $("#error_msg2").html();
        inlineMsg('bal', msg, 4);
        return false;
    }
    if (bal == "")
    {
        msg = $("#error_msg2").html();
        inlineMsg('bal', msg, 4);
        return false;
    }
    if (pswd == "")
    {
        msg = $("#error_msg3").html();
        inlineMsg('pswd', msg, 4);
        return false;
    }

    if (to_user_name == "")
    {
        msg = $("#error_msg4").html();
        inlineMsg('to_user_name', msg, 4);
        return false;
    }
    if (amount == "")
    {
        msg = $("#error_msg5").html();
        inlineMsg('amount', msg, 4);
        return false;
    }
    if (!amount.match(numberRegex))
    {
        inlineMsg('amount', 'You have entered an invalid Amount.', 2);
        return false;
    }
    if (first_amount > first_bal)
    {
        msg = $("#error_msg6").html();
        inlineMsg('amount', msg, 4);
        return false;
    }
    return true;
}
function validate_ewallet_fund_user(fund_form_user)
{
    var numberRegex = /^[0-9]+/;
    if (document.fund_form_user.avb_amount)
    {
        var avb_amount = fund_form_user.avb_amount.value;
    }
    if (document.fund_form_user.to_user)
    {
        var to_user = fund_form_user.to_user.value;
    }
    if (document.fund_form_user.amount_user)
    {
        var amount_user = fund_form_user.amount_user.value;
    }
    var first_amount = parseInt(amount_user);
    var first_bal = parseInt(avb_amount);
    if (first_bal == 0)
    {
        inlineMsg('avb_amount', 'NOBALANCE...', 4);
        return false;
    }
    if (avb_amount == "")
    {
        inlineMsg('avb_amount', 'NO BALANCE...', 4);
        return false;
    }
    if (to_user == "")
    {
        inlineMsg('to_user', 'Please type To User Name...', 4);
        return false;
    }
    if (amount_user == "")
    {
        inlineMsg('amount_user', 'Please type Amount...', 4);
        return false;
    }
    if (!amount_user.match(numberRegex))
    {
        inlineMsg('amount_user', 'You have entered an invalid Amount.', 2);
        return false;
    }
    if (first_amount > first_bal)
    {
        inlineMsg('amount_user', 'You dont have enough balance...', 4);
        return false;
    }
}
function validate_epin_transfer(fund_form)
{
    var numberRegex = /^[0-9]+/;
    if (document.fund_form.user_name)
    {
        var user_name = fund_form.user_name.value;
    }
    if (document.fund_form.balance_epin)
    {
        var balance_epin = fund_form.balance_epin.value;
    }
    if (document.fund_form.product)
    {
        var product = fund_form.product.value;
    }
    if (document.fund_form.pswd)
    {
        var pswd = fund_form.pswd.value;
    }
    if (document.fund_form.md_psd)
    {
        var md_psd = fund_form.md_psd.value;
    }
    if (document.fund_form.u_pwd)
    {
        var u_pwd = fund_form.u_pwd.value;
    }
    if (document.fund_form.count)
    {
        var count = fund_form.count.value;
    }
    if (document.fund_form.to_user)
    {
        var to_user = fund_form.to_user.value;
    }
    if (user_name == "")
    {
        inlineMsg('user_name', 'Please Select User Name...', 4);
        return false;
    }
    if (balance_epin == "")
    {
        inlineMsg('balance_epin', 'You balance is less ......', 4);
        return false;
    }
    if (product == "")
    {
        inlineMsg('product', 'Please Select Product...', 4);
        return false;
    }
    if (pswd == "")
    {
        inlineMsg('pswd', 'Please type transaction password...', 4);
        return false;
    }
    if (md_psd != u_pwd)
    {
        inlineMsg('pswd', 'Transaction password mismatch...', 4);
        return false;
    }
    if (count == "")
    {
        inlineMsg('count', 'You must Enter the Number.....', 4);
        return false;
    }
    if (!count.match(numberRegex))
    {
        inlineMsg('count', 'You have entered an invalid number.', 2);
        return false;
    }
    if (to_user == "")
    {
        inlineMsg('to_user', 'Please type To User Name...', 4);
        return false;
    }
}
function validate_ewallet_view(frm_e_wallet)
{
    var user_name = frm_e_wallet.user_name.value;
    if (user_name == "")
    {
        inlineMsg('user_name', 'Please Select User Name...', 4);
        return false;
    }
    return true;
}

function validatePinPurchase(searchform)
{
    var numberRegex = /^[0-9]+/;
    var pin_count = searchform.pin_count.value;
    var passcode = searchform.passcode.value;
    var msg = "";

    if (pin_count == "")
    {
        msg = $("#error_msg1").html();
        inlineMsg('pin_count', msg, 4);
        return false;
    }

    if (!pin_count.match(numberRegex))
    {
        inlineMsg('pin_count', 'You have entered an invalid number.', 2);
        return false;
    }

    if (passcode == "")
    {
        msg = $("#error_msg2").html();
        inlineMsg('passcode', msg, 4);
        return false;
    }

    return true;
}

function validatePinPurchaseProduct(searchform)
{
    var msg = "";
    var numberRegex = /^[0-9]+/;
    var product_id = searchform.product.value;
    var pin_count = searchform.pin_count.value;
    var passcode = searchform.passcode.value;

    if (product_id == "")
    {
        inlineMsg('product', 'You must select product.', 4);
        return false;
    }

    if (pin_count == "")
    {
        msg = $("#error_msg1").html();
        inlineMsg('pin_count', msg, 4);
        return false;
    }

    if (!pin_count.match(numberRegex))
    {
        inlineMsg('pin_count', 'You have entered an invalid number.', 2);
        return false;
    }

    if (passcode == "")
    {
        msg = $("#error_msg2").html();
        inlineMsg('passcode', msg, 4);
        return false;
    }

    return true;
}

$(document).ready(function()
{
    var msg = "";
    $("#amount").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46)
        {
            msg = $("#validate_msg1").html();
            //display error message
            $("#errmsg3").html(msg).show().fadeOut(1200, 0);
            return false;
        }
    });
    $("#pin_count").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            msg = $("#validate_msg1").html();
            //display error message
            $("#errmsg3").html(msg).show().fadeOut(1200, 0);
            return false;
        }
    });

    $("#count").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            msg = $("#validate_msg1").html();
            //display error message
            $("#errmsg3").html(msg).show().fadeOut(1200, 0);
            return false;
        }
    });
});

function validate_ewallet_fund_management(fund_form)
{
    var user_name = fund_form.user_name.value;
    var amount = fund_form.amount.value;
    var msg = "";

    if (user_name == "")
    {
        msg = $("#error_msg1").html();
        inlineMsg('user_name', msg, 4);
        return false;
    }

    if (amount == "")
    {
        msg = $("#error_msg2").html();
        inlineMsg('amount', msg, 4);
        return false;
    }

    if (amount <= 0)
    {
        msg = $("#error_msg3").html();
        inlineMsg('amount', msg, 4);
        return false;
    }
    return true;
}

var ValidateUser = function() {

    // function to initiate Validation Sample 1
    var msg = $("#error_msg").html();
    var msg1 = $("#error_msg1").html();
    var msg2 = $("#error_msg2").html();
    var runValidatorweeklySelection = function() {
        var searchform = $('#searchform');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#searchform').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                amount: {
                    minlength: 1,
                    required: true
                },
                pin_count: {
                    minlength: 1,
                    required: true
                },
                passcode: {
                    minlength: 1,
                    required: true
                }
            },
            messages: {
                amount: msg,
                pin_count: msg1,
                passcode: msg2

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

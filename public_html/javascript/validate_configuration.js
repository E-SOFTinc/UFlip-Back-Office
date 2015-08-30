$(document).ready(function()
{

    //=======================================
    var msg1 = $("#validate_msg4").html();

    if ($('#Dynamic').attr('checked')) {

        $("#user_type_div").show();
        $("#user_type_div1").show();

    }
    $("#Dynamic").click(function() {
        $("#user_type_div").show();
        $("#user_type_div1").show();

        if ($('#yes').attr('checked')) {

            var prefix_val = $('#user_name_config').html();

            var html;
            html = "<td>Username Prefix</strong></td><td><input type='text' name ='prefix' id ='prefix' value='' maxlength='19' tabindex='8' title='This is the prefix of user name. It should contain 3 to 15 characters.'><span id='errmsg1'></span></td>";
            document.getElementById('prefix_div').innerHTML = html;
            $('#prefix').val(prefix_val);
            $("#prefix_div").show();


        }


    });
    $("#Static").click(function() {
        $("#user_type_div").hide("fast");
        $("#user_type_div1").hide("fast");
        $("#prefix_div").hide("fast");

    });


    if ($('#yes').attr('checked')) {

        var prefix_val = $('#user_name_config').html();

        var html;
        html = "<td>Username Prefix</strong></td><td><input type='text' name ='prefix' id ='prefix' value='' maxlength='19' tabindex='8' title='This is the prefix of user name. It should contain 3 to 15 characters.'><span id='errmsg1'></span></td>";
        document.getElementById('prefix_div').innerHTML = html;
        $('#prefix').val(prefix_val);
        $("#prefix_div").show();


    }
    $("#yes").click(function() {
        var prefix_val = $('#user_name_config').html();
        // alert(prefix_val);
        html = "<td>Username Prefix</strong></td><td><input type='text' name ='prefix' id ='prefix' value='' maxlength='19' tabindex='9' title='This is the prefix of user name. It should contain 3 to 15 characters.'><span id='errmsg1'></span></td>";
        document.getElementById('prefix_div').innerHTML = html;
        $('#prefix').val(prefix_val);
        $("#prefix_div").show();

    });
    $("#no").click(function() {
        $("#prefix_div").hide("fast");

    });


    //=======================================

    $("#service").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            //display error message
            $("#errmsg1").html("Digits Only ").show().fadeOut(1200, 0);
            return false;
        }
    });
    $("#tds").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            //display error message
            $("#errmsg2").html("Digits Only ").show().fadeOut(1200, 0);
            return false;
        }
    });
    $("#pair").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            //display error message
            $("#errmsg3").html("Digits Only ").show().fadeOut(1200, 0);
            return false;
        }
    });
    $("#ceiling").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            //display error message
            $("#errmsg4").html("Digits Only ").show().fadeOut(1200, 0);
            return false;
        }
    });

    $("#product_point_value").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            //display error message
            $("#errmsg5").html("Digits Only ").show().fadeOut(1200, 0);
            return false;
        }
    });
    $("#referal_amount").keypress(function(e)
    {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            //display error message
            $("#errmsg6").html("Digits Only ").show().fadeOut(1200, 0);
            return false;
        }
    });
    return true;

});


function trim(a)
{
    return a.replace(/^\s+|\s+$/, '');
}



function show_prefix()
{
    var html;
    html = "<td>Username Prefix</strong></td><td><input type='text' name ='prefix' id ='prefix' maxlength='19' tabindex='6' title='This is the prefix of user name. It should contain 3 to 15 characters.'><span id='errmsg1'></span></td>";
    document.getElementById('prefix_div').innerHTML = html;
    document.getElementById('prefix_div').style.display = "";
}
function hide_prefix()
{
    document.getElementById('prefix_div').style.display = "none";
}
//function show_tab()
//{
//    
//    document.getElementById('user_type_div').style.display="";	
//    document.getElementById('user_type_div1').style.display="";
//    
//}
//
//
//function hide_tab()
//{
//
//    document.getElementById('user_type_div').style.display="none";	
//    document.getElementById('user_type_div1').style.display="none";	
//    document.getElementById('prefix_div').style.display="none";	
//}

function validate_configuration(form_setting)
{
    var tds = form_setting.tds.value;

    var pair = form_setting.registration_fee.value;

    var ceiling = form_setting.ceiling.value;

    var service = form_setting.service.value;

    var min_payout = form_setting.min_payout.value;

    var payout_validity = form_setting.payout_validity.value;


    var product_point_value = form_setting.product_point_value.value;

    var rank_days = form_setting.rank_days.value;

    var annual_fee = form_setting.annual_fee.value;


    if (form_setting.referal_status.value == "yes")
    {
        var referal_amount = form_setting.referal_amount.value;
    }

    if (pair == "")
    {
        var msg;
        msg = $("#validate_msg8").html();
        inlineMsg('registration_fee', msg, 4);
        return false;
    }
    if (pair < '0')
    {
        var msg;
        msg = $("#validate_msg8").html();
        inlineMsg('registration_fee', msg, 4);
        return false;
    }

    if (ceiling == "")
    {
        var msg;
        msg = $("#validate_msg2").html();
        inlineMsg('ceiling', msg, 4);
        return false;
    }

    if (service == "")
    {
        var msg;
        msg = $("#validate_msg3").html();
        inlineMsg('service', msg, 4);
        return false;
    }

    if (tds == "")
    {
        var msg;
        msg = $("#validate_msg4").html();
        inlineMsg('tds', msg, 4);
        return false;
    }

    if (product_point_value == "")
    {
        var msg;
        msg = $("#validate_msg5").html();
        inlineMsg('product_point_value', msg, 4);
        return false;
    }

    /*if(pair_value == "") 
     {
     inlineMsg('pair_value','You must enter Pair Value...',4);
     return false;
     }*/

    if (referal_amount == "")
    {
        var msg;
        msg = $("#validate_msg6").html();
        inlineMsg('referal_amount', msg, 4);
        return false;
    }
    if (min_payout == "")
    {
        var msg;
        msg = $("#validate_msg10").html();
        inlineMsg('min_payout', msg, 4);
        return false;
    }
    if (payout_validity == "")
    {
        var msg;
        msg = $("#validate_msg9").html();
        inlineMsg('payout_validity', msg, 4);
        return false;
    }
    if (rank_days == "")
    {
        var msg;
        msg = $("#validate_msg11").html();
        inlineMsg('rank_days', msg, 4);
        return false;
    }
    if (rank_days == 0)
    {
        var msg;
        msg = $("#validate_msg11").html();
        inlineMsg('rank_days', msg, 4);
        return false;
    }

    if (annual_fee == "")
    {
        var msg;
        msg = $("#validate_msg12").html();
        inlineMsg('annual_fee', msg, 4);
        return false;
    }


    return true;

}


function change_module_status(path_root, module_name, module_status)

{
    var set_module_status = path_root + "configuration/change_module_status";
    $.post(set_module_status, {module_name: module_name, module_status: module_status}, function(data)
    {
        location.reload();
    });
}

function change_payment_status(path_root, id, module_status)

{
    var set_module_status = path_root + "configuration/change_payment_status";
    $.post(set_module_status, {id: id, module_status: module_status}, function(data)
    {
        location.reload();
    });
}


function change_credit_card_status(path_root, id, module_status)

{
    var set_module_status = path_root + "configuration/change_credit_card_status";
    $.post(set_module_status, {id: id, module_status: module_status}, function(data)
    {
        location.reload();
    });
}


/*
 $(document).ready(function()
 
 {
 
 
 $("#pair").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg4").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 $("#rank_days").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg11").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 $("#annual_fee").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg12").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 $("#ceiling").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg5").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 $("#service").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg6").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 $("#tds").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg7").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 $("#product_point_value").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg8").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 $("#referal_amount").keypress(function (e)  
 
 {
 
 
 //if the letter is not digit then display error and don't type anything
 
 if( e.which!=8 && e.which!=0 &&  (e.which<48 || e.which>57))
 
 {
 
 //display error message
 
 $("#errmsg9").html("Digits Only ").show().fadeOut(1200,0); 
 
 return false;
 
 }	
 
 });
 });*/

function validate_letter_config(form_setting)
{

    if (document.form_setting.company_name)
    {
        var company_name = form_setting.company_name.value;
    }

    if (document.form_setting.company_add)
    {
        var company_add = form_setting.company_add.value;
    }

    if (document.form_setting.txtDefaultHtmlArea)
    {
        var txtDefaultHtmlArea = form_setting.txtDefaultHtmlArea.value;
    }

    if (document.form_setting.product_matter)
    {
        var product_matter = form_setting.product_matter.value;
    }

    if (document.form_setting.place)
    {
        var place = form_setting.place.value;
    }

    if (company_name == "")
    {
        var msg;
        msg = $("#validate_msg1").html();
        inlineMsg('company_name', msg, 4);
        return false;
    }

    if (company_add == "")
    {
        var msg;
        msg = $("#validate_msg2").html();
        inlineMsg('company_add', msg, 4);
        return false;
    }

    if (txtDefaultHtmlArea == "")
    {
        var msg;
        msg = $("#validate_msg3").html();
        inlineMsg('txtDefaultHtmlArea', msg, 4);
        return false;
    }

    if (product_matter == "")
    {
        var msg;
        msg = $("#validate_msg4").html();
        inlineMsg('product_matter', msg, 4);
        return false;
    }

    /*if(pair_value == "") 
     {
     inlineMsg('pair_value','You must enter Pair Value...',4);
     return false;
     }*/

    if (place == "")
    {
        var msg;
        msg = $("#validate_msg5").html();
        inlineMsg('place', msg, 4);
        return false;
    }

    return true;
}
/* ****************** edited on 2/3/2011 starts ****************************** */
function validate_admin_referal(admin_referal_form)
{
    var user_name = admin_referal_form.user_name.value;
    var msg;
    msg = $("#errmsg1").html();
    if (user_name == "")
    {
        inlineMsg('user_name', msg, 4);
        return false;
    }
    return true;
}
/* ****************** edited on 2/3/2011 ends ****************************** */

function validate_pin_configuration(pin_config_form)
{
    var pin_length = pin_config_form.pin_length.value;
    var pin_maxcount = pin_config_form.pin_maxcount.value;

    if (pin_length == "")
    {
        var msg;
        msg = $("#validate_msg1").html();
        inlineMsg('pin_length', msg, 4);
        return false;
    }

    if (pin_length < 6 || pin_length > 25)
    {
        inlineMsg('pin_length', 'E-Pin Length should between 6 and 25...', 4);
        return false;
    }

    if (pin_maxcount == "")
    {
        inlineMsg('pin_maxcount', 'You must enter maximum pin count...', 4);
        return false;
    }

    return true;
}




function validate_username_configuration(username_config_form)
{
    var length = username_config_form.length.value;
    var prefix = username_config_form.prefix.value;

    if (length == "")
    {
        var msg;
        msg = $("#validate_msg1").html();
        inlineMsg('length', msg, 4);
        return false;
    }

    if (length < 6 || length > 10)
    {
        var msg;
        msg = $("#validate_msg2").html();
        inlineMsg('length', msg, 4);
        return false;
    }

    if (username_config_form.prefix_status[0].checked)
    {
        if (prefix == "")
        {
            var msg;
            msg = $("#validate_msg3").html();
            inlineMsg('prefix', msg, 4);
            return false;
        }

        if (prefix.length < 3 || prefix.length > 15)
        {
            var msg;
            msg = $("#validate_msg4").html();
            inlineMsg('prefix', msg, 4);
            return false;
        }
    }

    return true;
}


function validate_site_config(site_config_form)
{
    var regNum = /^ *[0-9]+ *$/;
    var regEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    var co_name = site_config_form.co_name.value;
    var img_logo = site_config_form.img_logo.value;
    var email = site_config_form.email.value;
    var phone = site_config_form.phone.value;
    var icon = site_config_form.favicon.value;
    im = new Image();
    im.src = site_config_form.img_logo.value;

    if (co_name == "")
    {
        var msg;
        msg = $("#validate_msg1").html();
        inlineMsg('co_name', msg, 4);
        return false;
    }

    var ico = icon.substring(icon.lastIndexOf('.') + 1);

    if (ico != "")
    {
        if (ico != "ico")
        {
            var msg;
            msg = $("#validate_msg2").html();
            inlineMsg('favicon', msg, 4);
            return false;
        }
    }

    var ext = img_logo.substring(img_logo.lastIndexOf('.') + 1);

    if (img_logo != "")
    {
        if (ext != "png" && ext != "PNG" && ext != "JPEG" && ext != "jpeg" && ext != "jpg" && ext != "JPG")
        {
            var msg;
            msg = $("#validate_msg3").html();
            inlineMsg('img_logo', msg, 4);
            return false;
        }
    }


    if (email == "")
    {
        var msg;
        msg = $("#validate_msg4").html();
        inlineMsg('email', msg, 4);
        return false;
    }
    if (!regEmail.test(email))
    {
        var msg;
        msg = $("#validate_msg5").html();
        inlineMsg('email', msg, 4);
        return false;
    }
    if (phone == "")
    {
        var msg;
        msg = $("#validate_msg6").html();
        inlineMsg('phone', msg, 4);
        return false;
    }
    if (!regNum.test(phone))
    {
        var msg;
        msg = $("#validate_msg7").html();
        inlineMsg('phone', msg, 4);
        return false;
    }
    return true;
}


function getUsernamePrefix()
{
    var html;
    var path_root = document.username_config_form.path_root.value;
    var getUsernamePrefix = path_root + "admin/configuration/getUsernamePrefix";
    $.post(getUsernamePrefix, function(data)
    {
        data = trim(data);
        if (data != "")
        {
            html = "<td>Username Prefix</strong></td><td><input type='text' name ='prefix' id ='prefix' maxlength='19' value='" + data + "'title='This is the prefix of user name. It should contain 3 to 15 characters.'><span id='errmsg1'></span></td>";
            document.getElementById('prefix_div').innerHTML = html;
            document.getElementById('prefix_div').style.display = "";
        }
    });
}
function edit_cat(id)

{
    //var confirm_msg=$("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to edit";
    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/category/edit/' + id;

    }



}
function yesnoCheck(id) {
    var path_root = document.form_setting.path_root.value;
    var get_referral_name = path_root + "admin/configuration/get_product_value";
    $.post(get_referral_name, {product_point_value: $('#product_point_value').val()}, function(data)
    {
        data = trim(data);
        if (document.getElementById('valid').checked) {
            document.getElementById(id).style.visibility = "hidden";
            document.getElementById(id).style.display = "block";
           html1="<div class='form-group' ><label class='col-sm-2 control-label' for='product_point_value'>Pair price:<font color='#ff0000'>*</font> </label><div class='col-sm-3'><input type='text' name ='pair_values'id ='product_point'class='form-control'><span id='errmsg4'></span></div>";
            html = "<div class='form-group'>  <label class='col-sm-2 control-label' for='ref_username'>Product point value:<font color='#ff0000'>*</font></label> <div class='col-sm-3'><input type='text' name='product_point_values' id='product_point_value' maxlength='20' autocomplete='Off'class='form-control'/></div></div>";
            html=html+html1;
            document.getElementById('referal_div').innerHTML = html;
            document.getElementById('referal_div').style.display = "";
            //document.getElementById('product_point_value').style.visibility = 'visible';
        } else if (document.getElementById('val').checked) {
            document.getElementById(id).style.visibility = "hidden";
            document.getElementById(id).style.display = "block";
            html = "<div class='form-group'>  <label class='col-sm-2 control-label' for='ref_username'>Pair percentage:<font color='#ff0000'>*</font></label> <div class='col-sm-3'><input type='text' name='product_point_valuess' id='product_point' maxlength='20' autocomplete='Off'class='form-control'/></div></div>";
            document.getElementById('referal_div').innerHTML = html;
            document.getElementById('referal_div').style.display = "";
        }
    });
}
function delete_cat(id)

{
    var confirm_msg = $("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to delete";

    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/category/delete/' + id;

    }
}
function add_cat(id)

{
    var confirm_msg = $("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to add";

    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/category/add/' + id;

    }



}
function edit_rank(id)

{
    //var confirm_msg=$("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to edit";
    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/rank/edit/' + id;

    }



}
function delete_rank(id)

{
    var confirm_msg = $("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to delete";

    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/rank/delete/' + id;

    }
}
function add_rank(id)

{
    var confirm_msg = $("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to add";

    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/rank/add/' + id;

    }



}


function validate_edit_category(editcat)
{

    if (document.editcat.limit)
    {
        var limit = editcat.limit.value;
    }
    if (document.editcat.percentage)
    {
        var percentage = editcat.percentage.value;
    }
    if (document.editcat.id)
    {
        var id = editcat.id.value;
    }
    if (document.editcat.fsb)
    {
        var fsb = editcat.fsb.value;
    }
    if (limit == "")
    {
        var msg;
        msg = $("#validate_msg12").html();
        inlineMsg('limit', msg, 4);

        return false;
    }
    if (percentage == "")
    {
        var msg;
        msg = $("#validate_msg13").html();

        inlineMsg('percentage', msg, 4);
        return false;
    }
    if (fsb == "")
    {
        var msg;
        msg = $("#validate_msg14").html();

        inlineMsg('fsb', msg, 4);
        return false;
    }
    return true;
}
function validate_edit_rank(editrank)
{

    if (document.editrank.pair)
    {
        var pair = editrank.pair.value;
    }

    if (document.editrank.rank)
    {
        var rank = editrank.rank.value;
    }

    if (document.editrank.percentage)
    {
        var percentage = editrank.percentage.value;
    }

    if (document.editrank.id)
    {
        var id = editrank.id.value;
    }
    if (document.editrank.fsb)
    {
        var fsb = editrank.fsb.value;
    }


    if (rank == "")
    {
        var msg;
        msg = $("#validate_msg14").html();

        inlineMsg('rank', msg, 4);
        return false;
    }
    if (pair == "")
    {
        var msg;
        msg = $("#validate_msg15").html();
        inlineMsg('pair', msg, 4);

        return false;
    }
    if (percentage == "")
    {
        var msg;
        msg = $("#validate_msg13").html();

        inlineMsg('percentage', msg, 4);
        return false;
    }
    if (fsb == "")
    {
        var msg;
        msg = $("#validate_msg16").html();

        inlineMsg('fsb', msg, 4);
        return false;
    }
    return true;
}
function validate_timer(form_setting) {

    var week_date1 = form_setting.week_date1.value;

    var week_date2 = form_setting.week_date2.value;
    if (week_date1 == "")
    {
        var msg;
        msg = $("#validate_msg1").html();

        inlineMsg('week_date1', msg, 4);
        return false;
    }
    if (week_date2 == "")
    {
        var msg;
        msg = $("#validate_msg1").html();

        inlineMsg('week_date2', msg, 4);
        return false;
    }
    if (week_date2 < week_date1)
    {
        var msg;
        msg = $("#validate_msg2").html();

        inlineMsg('week_date1', msg, 4);
        return false;
    }

    return true;
}
function edit_timer(id)

{
    //var confirm_msg=$("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to edit";
    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/timer/edit/' + id;

    }



}
function delete_timer(id)

{
    var confirm_msg = $("#confirm_msg_edit").html();
    var confirm_msg = "Sure you want to delete";

    var path_root = $("#path_root").val();
    if (confirm(confirm_msg))

    {

        document.location.href = path_root + 'admin/configuration/timer/delete/' + id;

    }
}


//=====================================================================//
$(document).ready(function() {
    var msg1 = $("#validate_msg1").html();
    var msg2 = $("#validate_msg2").html();
    var msg3 = $("#validate_msg3").html();
    var msg4 = $("#validate_msg4").html();
    var msg5 = $("#validate_msg5").html();
    var msg6 = $("#validate_msg6").html();



    $("#form_setting").validate({
        submitHandler: function(form) {
            SubmittingForm();
        },
        rules: {
            company_name: {
                minlength: 1,
                required: true
            },
            company_add: {
                minlength: 1,
                required: true
            },
            place: {
                minlength: 1,
                required: true
            }


        },
        messages: {
            company_name: msg1,
            company_add: msg2,
            place: msg5



        }


    });
});

//===================for username configuration
$(document).ready(function() {
    var msg1 = $("#validate_msg4").html();
    $("#username_config_form").validate({
        submitHandler: function(form) {
            SubmittingForm();
        },
        rules: {
            prefix: {
                minlength: 1,
                required: true
            }


        },
        messages: {
            prefix: msg1,
        }


    });
});
/*======================================================================*/
//===================for tab redirection
function setHiddenValue(tab)
{
    $("#active_tab").val(tab);

}
//====================


var ValidateEpdqConfig = function() {



    var msg1 = $("#validate_msg1").html();
    var msg2 = $("#validate_msg2").html();
    var msg3 = $("#validate_msg3").html();
    var msg4 = $("#validate_msg4").html();
    var msg5 = $("#validate_msg5").html();
    var msg6 = $("#validate_msg6").html();
    var msg7 = $("#validate_msg7").html();
    var msg8 = $("#validate_msg8").html();
    var msg9 = $("#validate_msg9").html();
    var runValidatorweeklySelection = function() {
        var searchform = $('#payment_status_form');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#payment_status_form').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                api_pspid: {
                    minlength: 1,
                    required: true
                },
                api_password: {
                    minlength: 1,
                    required: true
                },
                language: {
                    minlength: 1,
                    required: true
                },
                currency: {
                    minlength: 1,
                    required: true
                },
                accept_url: {
                    minlength: 1,
                    required: true
                },
                decline_url: {
                    minlength: 1,
                    required: true
                },
                exception_url: {
                    minlength: 1,
                    required: true
                },
                cancel_url: {
                    minlength: 1,
                    required: true
                },
                api_url: {
                    minlength: 1,
                    required: true
                }

            },
            messages: {
                api_pspid: msg1,
                news_desc: msg2,
                language: msg3,
                currency: msg4,
                accept_url: msg5,
                decline_url: msg6,
                exception_url: msg7,
                cancel_url: msg8,
                api_url: msg9

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
var ValidateUser = function() {

    var runValidatorAuthorizeSelection = function() {

        var msg4 = $("#validate_msg1").html();
        var msg5 = $("#validate_msg2").html();
        var searchform = $('#authorize_status_form');
        var errorHandler1 = $('.errorHandler', searchform);

        $('#authorize_status_form').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type

                error.insertAfter(element);
                // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                merchant_log_id: {
                    minlength: 1,
                    required: true
                },
                transaction_key: {
                    minlength: 1,
                    required: true
                }
            },
            messages: {
                merchant_log_id: msg5,
                transaction_key: msg4



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

            runValidatorAuthorizeSelection();

        }
    };
}();

//-------------------
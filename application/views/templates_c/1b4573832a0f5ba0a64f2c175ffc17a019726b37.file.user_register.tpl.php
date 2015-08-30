<?php /* Smarty version Smarty 3.1.4, created on 2015-08-26 09:54:09
         compiled from "application/views/register/user_register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137695113655bb68cf21fef2-89801284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b4573832a0f5ba0a64f2c175ffc17a019726b37' => 
    array (
      0 => 'application/views/register/user_register.tpl',
      1 => 1440582649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137695113655bb68cf21fef2-89801284',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb68cfa53bb',
  'variables' => 
  array (
    'user_type' => 0,
    'tran_checking_placement_data' => 0,
    'tran_validate_placement_data' => 0,
    'tran_checking_your_position' => 0,
    'tran_position_validated' => 0,
    'tran_position_not_useable' => 0,
    'tran_sponser_name_validated' => 0,
    'tran_checking_sponser_user_name' => 0,
    'tran_invalid_sponser_user_name' => 0,
    'tran_invalid_e_pin' => 0,
    'tran_e_pin_validated' => 0,
    'tran_checking_e_pin_availability' => 0,
    'tran_you_must_select_product' => 0,
    'tran_you_must_enter_e_pin' => 0,
    'tran_you_must_enter_full_name' => 0,
    'tran_you_must_enter_password' => 0,
    'tran_minimum_six_characters_required' => 0,
    'tran_you_must_enter_your_password_again' => 0,
    'tran_password_miss_match' => 0,
    'tran_you_must_select_date_of_birth' => 0,
    'tran_age_should_be_greater_than_18' => 0,
    'tran_you_must_enter_sponser_user_name' => 0,
    'tran_you_must_enter_sponser_id' => 0,
    'tran_you_must_select_your_position' => 0,
    'tran_referral_name' => 0,
    'tran_You_must_enter_your_mobile_no' => 0,
    'tran_terms_condition' => 0,
    'tran_user_name_not_availablity' => 0,
    'tran_user_name_not_available' => 0,
    'tran_user_name_available' => 0,
    'tran_You_must_select_a_date' => 0,
    'tran_You_must_select_a_month' => 0,
    'tran_You_must_select_a_year' => 0,
    'tran_You_must_select_gender' => 0,
    'tran_You_must_select_country' => 0,
    'tran_mail_id_format' => 0,
    'tran_mob_no_10_digit' => 0,
    'tran_digits_only' => 0,
    'tran_you_must_enter_username' => 0,
    'tran_special_chars_not_allowed' => 0,
    'tran_you_must_enter_email_id' => 0,
    'tran_You_must_enter_your_address' => 0,
    'tran_enter_card_no' => 0,
    'tran_ent_amnt' => 0,
    'tran_ent_valid_no' => 0,
    'tran_ent_expiry_date' => 0,
    'tran_ent_fore_name' => 0,
    'tran_ent_sure_name' => 0,
    'tran_checking_balance' => 0,
    'tran_insuff_bal' => 0,
    'tran_bal_ok' => 0,
    'tran_invalid_transaction_password' => 0,
    'tran_transaction_ok' => 0,
    'tran_checking_transaction' => 0,
    'tran_you_must_select_pay_type' => 0,
    'tran_you_must_enter_pin_value' => 0,
    'tran_characters_only' => 0,
    'tran_pan_format' => 0,
    'tran_checking_trans_details' => 0,
    'tran_invalid_trans_details' => 0,
    'tran_valid_trans_details' => 0,
    'tran_valid_quantity' => 0,
    'tran_maximum_username_length' => 0,
    'tran_enter_more_than_3_characters' => 0,
    'tran_sponsor_full_name' => 0,
    'tran_Sponsor_username_validated' => 0,
    'tran_Invalid_Sponsor_data' => 0,
    'tran_Invalid_Sponsor_username' => 0,
    'tran_alpha_numeric_values_only' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_new_user_signup' => 0,
    'product_status' => 0,
    'is_product_added' => 0,
    'tran_no_product_added_yet' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'tran_please_click_here_to_add_product' => 0,
    'pin_status' => 0,
    'is_pin_added' => 0,
    'tran_no_e_pin_added_yet' => 0,
    'tran_please_click_here_to_add_e_pin' => 0,
    'BASE_URL' => 0,
    'lang_id' => 0,
    'PUBLIC_URL' => 0,
    'status_id' => 0,
    'paypal_status' => 0,
    'reg_count' => 0,
    'regr' => 0,
    'tran_step1' => 0,
    'tran_sponser_and_package_information' => 0,
    'tran_step2' => 0,
    'tran_contact_info' => 0,
    'tran_bank_info' => 0,
    'tran_step3' => 0,
    'tran_reg_type' => 0,
    'tran_errors_check' => 0,
    'tran_placement_user_name' => 0,
    'read' => 0,
    'tran_sponsor_user_name' => 0,
    'error' => 0,
    'user_name' => 0,
    'tran_placement_full_name' => 0,
    'spnser_full_name' => 0,
    'status_name' => 0,
    'sponser_name' => 0,
    'tran_position' => 0,
    'position' => 0,
    'tran_left_leg' => 0,
    'tran_right_leg' => 0,
    'tran_select_leg' => 0,
    'posion' => 0,
    'tran_product' => 0,
    'products' => 0,
    'tran_quantity' => 0,
    'tran_next' => 0,
    'user_name_type' => 0,
    'tran_user_name' => 0,
    'tran_name' => 0,
    'tran_password' => 0,
    'tran_confirm_password' => 0,
    'tran_date_of_birth' => 0,
    'tran_year' => 0,
    'years' => 0,
    'v' => 0,
    'tran_month' => 0,
    'tran_day' => 0,
    'month' => 0,
    'tran_gender' => 0,
    'tran_female' => 0,
    'tran_male' => 0,
    'tran_select_gender' => 0,
    'tran_address' => 0,
    'tran_country' => 0,
    'tran_select_country' => 0,
    'countries' => 0,
    'tran_state' => 0,
    'state_fill' => 0,
    'tran_pin_code' => 0,
    'tran_mobile_no' => 0,
    'tran_land_line_no' => 0,
    'tran_email' => 0,
    'tran_terms_conditions' => 0,
    'termsconditions' => 0,
    'tran_I_ACCEPT_TERMS_AND_CONDITIONS' => 0,
    'tran_back' => 0,
    'tran_total_amount' => 0,
    'tab_inactive' => 0,
    'credit_card_status' => 0,
    'tran_credit_card' => 0,
    'payment_ewallet_status' => 0,
    'payment_pin_status' => 0,
    'tran_ewallet' => 0,
    'tran_paypal' => 0,
    'epdq_status' => 0,
    'free_joining_status' => 0,
    'tran_epdq' => 0,
    'authorize_status' => 0,
    'tran_authorize' => 0,
    'e_xact_status' => 0,
    'tran_Credit_card_or_Interac_debit_card' => 0,
    'tran_epin' => 0,
    'tran_free_join' => 0,
    'tran_card_number' => 0,
    'tran_currency' => 0,
    'tran_card_type' => 0,
    'tran_visa' => 0,
    'tran_master_card' => 0,
    'tran_card_verification' => 0,
    'tran_expiry_date' => 0,
    'exp_year' => 0,
    'tran_first_name' => 0,
    'tran_last_name' => 0,
    'tran_finish' => 0,
    'tran_transaction_password' => 0,
    'tran_sl_no' => 0,
    'tran_epin_amount' => 0,
    'tran_remain_epin_amount' => 0,
    'tran_req_epin_amount' => 0,
    'num_of_epins' => 0,
    'tran_product_amount' => 0,
    'tran_epin_val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb68cfa53bb')) {function content_55bb68cfa53bb($_smarty_tpl) {?>﻿<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='distributor'){?>﻿
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

    <?php }?>

        <div id="span_js_messages" style="display: none;"> 
            <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_checking_placement_data']->value;?>
</span>
            <span id="validate_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_validate_placement_data']->value;?>
</span>
            <span id="validate_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_checking_your_position']->value;?>
</span>
            <span id="validate_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_position_validated']->value;?>
</span>
            <span id="validate_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_position_not_useable']->value;?>
</span>
            <span id="validate_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_sponser_name_validated']->value;?>
</span>
            <span id="validate_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_checking_sponser_user_name']->value;?>
</span>
            <span id="validate_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_sponser_user_name']->value;?>
</span>
            <span id="validate_msg9"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_e_pin']->value;?>
</span>
            <span id="validate_msg10"><?php echo $_smarty_tpl->tpl_vars['tran_e_pin_validated']->value;?>
</span>
            <span id="validate_msg11"><?php echo $_smarty_tpl->tpl_vars['tran_checking_e_pin_availability']->value;?>
</span>
            <span id="validate_msg12"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_product']->value;?>
</span>
            <span id="validate_msg13"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_e_pin']->value;?>
</span>
            <span id="validate_msg14"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_full_name']->value;?>
</span>
            <span id="validate_msg15"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_password']->value;?>
</span>
            <span id="validate_msg16"><?php echo $_smarty_tpl->tpl_vars['tran_minimum_six_characters_required']->value;?>
</span>
            <span id="validate_msg17"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_password_again']->value;?>
</span>
            <span id="validate_msg18"><?php echo $_smarty_tpl->tpl_vars['tran_password_miss_match']->value;?>
</span>
            <span id="validate_msg19"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_date_of_birth']->value;?>
</span>
            <span id="validate_msg20"><?php echo $_smarty_tpl->tpl_vars['tran_age_should_be_greater_than_18']->value;?>
</span>
            <span id="validate_msg21"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_sponser_user_name']->value;?>
</span>
            <span id="validate_msg22"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_sponser_id']->value;?>
</span>
            <span id="validate_msg23"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_your_position']->value;?>
</span>
            <span id="validate_msg24"><?php echo $_smarty_tpl->tpl_vars['tran_referral_name']->value;?>
</span>
            <span id="validate_msg25"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_your_mobile_no']->value;?>
</span>
            <span id="validate_msg26"><?php echo $_smarty_tpl->tpl_vars['tran_terms_condition']->value;?>
</span>
            <span id="validate_msg27"><?php echo $_smarty_tpl->tpl_vars['tran_user_name_not_availablity']->value;?>
</span>
            <span id="validate_msg28"><?php echo $_smarty_tpl->tpl_vars['tran_user_name_not_available']->value;?>
</span>
            <span id="validate_msg29"><?php echo $_smarty_tpl->tpl_vars['tran_user_name_available']->value;?>
</span>
            <span id="validate_msg30"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_date']->value;?>
</span>
            <span id="validate_msg31"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_month']->value;?>
</span>
            <span id="validate_msg32"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_year']->value;?>
</span>
            <span id="validate_msg33"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_gender']->value;?>
</span>
            <span id="validate_msg34"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_country']->value;?>
</span>
            <span id="validate_msg35"><?php echo $_smarty_tpl->tpl_vars['tran_mail_id_format']->value;?>
</span>
            <span id="validate_msg36"><?php echo $_smarty_tpl->tpl_vars['tran_mob_no_10_digit']->value;?>
</span>
            <span id="validate_msg37"><?php echo $_smarty_tpl->tpl_vars['tran_digits_only']->value;?>
</span>
            <span id="validate_msg38"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_username']->value;?>
</span>
            <span id="validate_msg39"><?php echo $_smarty_tpl->tpl_vars['tran_special_chars_not_allowed']->value;?>
</span>
            <span id="validate_msg40"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_email_id']->value;?>
</span>
            <span id="validate_msg41"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_your_address']->value;?>
</span>
            <span id="validate_msg42"><?php echo $_smarty_tpl->tpl_vars['tran_enter_card_no']->value;?>
</span>
            <span id="validate_msg43"><?php echo $_smarty_tpl->tpl_vars['tran_ent_amnt']->value;?>
</span>
            <span id="validate_msg44"><?php echo $_smarty_tpl->tpl_vars['tran_ent_valid_no']->value;?>
</span>
            <span id="validate_msg45"><?php echo $_smarty_tpl->tpl_vars['tran_ent_expiry_date']->value;?>
</span>
            <span id="validate_msg46"><?php echo $_smarty_tpl->tpl_vars['tran_ent_fore_name']->value;?>
</span>
            <span id="validate_msg47"><?php echo $_smarty_tpl->tpl_vars['tran_ent_sure_name']->value;?>
</span>
            <span id="validate_msg48"><?php echo $_smarty_tpl->tpl_vars['tran_special_chars_not_allowed']->value;?>
</span> 
            <span id="validate_msg49"><?php echo $_smarty_tpl->tpl_vars['tran_checking_balance']->value;?>
</span>
            <span id="validate_msg50"><?php echo $_smarty_tpl->tpl_vars['tran_insuff_bal']->value;?>
</span> 
            <span id="validate_msg51"><?php echo $_smarty_tpl->tpl_vars['tran_bal_ok']->value;?>
</span>
            <span id="validate_msg52"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_transaction_password']->value;?>
</span>
            <span id="validate_msg53"><?php echo $_smarty_tpl->tpl_vars['tran_transaction_ok']->value;?>
</span>
            <span id="validate_msg54"><?php echo $_smarty_tpl->tpl_vars['tran_checking_transaction']->value;?>
</span>
            <span id="validate_msg55"><?php echo $_smarty_tpl->tpl_vars['tran_bal_ok']->value;?>
</span>
            <span id="validate_msg56"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_pay_type']->value;?>
</span>
            <span id="validate_msg57"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_pin_value']->value;?>
</span>
            <span id="validate_msg58"><?php echo $_smarty_tpl->tpl_vars['tran_characters_only']->value;?>
</span>
            <span id="validate_msg59"><?php echo $_smarty_tpl->tpl_vars['tran_pan_format']->value;?>
</span>
            <span id="validate_msg60"><?php echo $_smarty_tpl->tpl_vars['tran_checking_trans_details']->value;?>
</span>
            <span id="validate_msg61"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_trans_details']->value;?>
</span>
            <span id="validate_msg62"><?php echo $_smarty_tpl->tpl_vars['tran_valid_trans_details']->value;?>
</span>
            <span id="validate_msg63"><?php echo $_smarty_tpl->tpl_vars['tran_valid_quantity']->value;?>
</span>
            <span id="validate_msg70"><?php echo $_smarty_tpl->tpl_vars['tran_maximum_username_length']->value;?>
</span>
            <span id="validate_msg64"><?php echo $_smarty_tpl->tpl_vars['tran_enter_more_than_3_characters']->value;?>
</span>
            <span id="validate_msg65"><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_full_name']->value;?>
</span>
            <span id="validate_msg66"><?php echo $_smarty_tpl->tpl_vars['tran_Sponsor_username_validated']->value;?>
</span>
            <span id="validate_msg67"><?php echo $_smarty_tpl->tpl_vars['tran_Invalid_Sponsor_data']->value;?>
</span>
            <span id="validate_msg68"><?php echo $_smarty_tpl->tpl_vars['tran_Invalid_Sponsor_username']->value;?>
</span>
            <span id="validate_msg69"><?php echo $_smarty_tpl->tpl_vars['tran_alpha_numeric_values_only']->value;?>
</span>
            <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
            <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>



        </div>
	<style>
	    .val-error {
		    color:rgba(249, 6, 6, 1);
		    opacity:1;
		}
	</style>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>                        
                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                            </a>
                            <a class="btn btn-xs btn-link panel-refresh" href="#">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <a class="btn btn-xs btn-link panel-expand" href="#">
                                <i class="fa fa-resize-full"></i>
                            </a>
                            <a class="btn btn-xs btn-link panel-close" href="#">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                        <?php echo $_smarty_tpl->tpl_vars['tran_new_user_signup']->value;?>

                    </div>
                    <div class="panel-body" style="padding-right:31px;">
                        <?php if ($_smarty_tpl->tpl_vars['user_type']->value!='distributor'){?>﻿
                            <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>
                                <?php if ($_smarty_tpl->tpl_vars['is_product_added']->value!="yes"){?>




                                    <div class="alert alert-warning">
                                        <button data-dismiss="alert" class="close">
                                            ×
                                        </button>
                                        <i class="fa fa-warning-circle"></i>
                                        <strong><?php echo $_smarty_tpl->tpl_vars['tran_no_product_added_yet']->value;?>
!   </strong><a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/product/product_management"><?php echo $_smarty_tpl->tpl_vars['tran_please_click_here_to_add_product']->value;?>
</a>
                                    </div>


                                    </tr>
                                <?php }?>
                            <?php }?>



                            <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=="yes"){?>
                                <?php if ($_smarty_tpl->tpl_vars['is_pin_added']->value!="yes"){?>



                                    <div class="alert alert-warning">
                                        <button data-dismiss="alert" class="close">
                                            ×
                                        </button>
                                        <i class="fa fa-warning-circle"></i>
                                        <strong><?php echo $_smarty_tpl->tpl_vars['tran_no_e_pin_added_yet']->value;?>
!   </strong><a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/epin/epin_management"><?php echo $_smarty_tpl->tpl_vars['tran_please_click_here_to_add_e_pin']->value;?>
</a>
                                    </div>



                                    </tr>
                                <?php }?>
                            <?php }?>
                        <?php }?>
                        <form role="form" class="smart-wizard form-horizontal" method="post"  name="form" id="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
register/register_submit">
                            <input type="hidden" name="path" id="path" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
">
                            <input type="hidden" name="lang_id" id="lang_id" value="<?php echo $_smarty_tpl->tpl_vars['lang_id']->value;?>
">
                            <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                            <input type="hidden" id="path_root" name="path_root" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
">
                            <input type="hidden" id="status_id" name="status_id" value="<?php echo $_smarty_tpl->tpl_vars['status_id']->value;?>
">
                            <input type="hidden" id="is_pin_ok" name="is_pin_ok" value=0> 
                            <input type="hidden" id="ewallet_bal" name="ewallet_bal" value=0>
                            <input type="hidden" id ="product_amount" name= "product_amount"  value = "" >
                            <input type="hidden" id ="check_product_status" name= "check_product_status"  value = "<?php echo $_smarty_tpl->tpl_vars['product_status']->value;?>
" >
                            <input type="hidden" id="is_paypal_on1" name="is_paypal_on1" value="<?php echo $_smarty_tpl->tpl_vars['paypal_status']->value;?>
">
                            <input name="date_of_birth" id="date_of_birth" type="hidden" size="16" maxlength="10"  <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['date_of_birth'];?>
" <?php }?> />
                            <div id="wizard" class="swMain">
                                <ul>
                                    <li>
                                        <a href="#step-1">
                                            <div class="stepNumber">
                                                1
                                            </div>
                                            <span class="stepDesc"> <?php echo $_smarty_tpl->tpl_vars['tran_step1']->value;?>
 
                                                <br />
                                                <small><?php echo $_smarty_tpl->tpl_vars['tran_sponser_and_package_information']->value;?>
 </small> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <div class="stepNumber">
                                                2
                                            </div>
                                            <span class="stepDesc"> <?php echo $_smarty_tpl->tpl_vars['tran_step2']->value;?>

                                                <br />
                                                <small> <?php echo $_smarty_tpl->tpl_vars['tran_contact_info']->value;?>
 & <?php echo $_smarty_tpl->tpl_vars['tran_bank_info']->value;?>
  </small> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <div class="stepNumber">
                                                3
                                            </div>
                                            <span class="stepDesc"> <?php echo $_smarty_tpl->tpl_vars['tran_step3']->value;?>

                                                <br />
                                                <small> <?php echo $_smarty_tpl->tpl_vars['tran_reg_type']->value;?>
 </small> </span>
                                        </a>
                                    </li>


                                </ul>
                                <div class="progress progress-striped active progress-sm">
                                    <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-success step-bar">
                                        <span class="sr-only"> 0% Complete (success)</span>
                                    </div>
                                </div>



                                <div id="step-1">
                                    <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                        </div>
                                    </div>

                                    <h2 class="StepTitle"> <?php echo $_smarty_tpl->tpl_vars['tran_sponser_and_package_information']->value;?>
   </h2>

                                    <?php if ($_smarty_tpl->tpl_vars['status_id']->value!=''){?>

                                        <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
                                            <div class="form-group">

                                                <label class="col-sm-3 control-label" for="sponser_user_name"><?php echo $_smarty_tpl->tpl_vars['tran_placement_user_name']->value;?>
:<font color="#ff0000">*</font></label>
                                                <div class="col-sm-7">
                                                    <input tabindex="1" type="text" name="sponser_user_name" id="sponser_user_name" size="20" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['fatherid'];?>
" <?php echo $_smarty_tpl->tpl_vars['read']->value;?>
 autocomplete="Off"
                                                           title="" class="form-control"/>  <span id="username_box" style="display:none;"></span>

                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <label class="col-sm-3 control-label" for="ref_username"><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_user_name']->value;?>
:<font color="#ff0000">*</font></label>

                                                <div class="col-sm-7">
                                                    <input name="ref_username" tabindex="1" id="ref_username" type="text" size="22" maxlength="20" autocomplete="Off" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['referral_name'];?>
"  title="" class="form-control"/>
                                                    <span id="referral_box" style="display:none;"></span> 
                                                    <span id="errormsg4"></span>
						    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['ref_username'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['ref_username'];?>
 </span><?php }?>

                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12" id="referal_div"  height="30" class="text" style="display:none;">
                                                </div>
                                            </div>
                                        <?php }else{ ?>




                                            <div class="form-group">

                                                <label class="col-sm-3 control-label" for="sponser_user_name"><?php echo $_smarty_tpl->tpl_vars['tran_placement_user_name']->value;?>
:<font color="#ff0000">*</font></label>
                                                <div class="col-sm-7">
                                                    <input tabindex="1" type="text" name="sponser_user_name" id="sponser_user_name" size="20" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['read']->value;?>
 autocomplete="Off"
                                                           title="" class="form-control"/>  <span id="username_box" style="display:none;"></span>

                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <label class="col-sm-3 control-label" for="sponser_office"><?php echo $_smarty_tpl->tpl_vars['tran_placement_full_name']->value;?>
:<font color="#ff0000">*</font></label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="sponser_office" id="sponser_office" size="22" maxlength="50"  value="<?php echo $_smarty_tpl->tpl_vars['spnser_full_name']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['read']->value;?>
 autocomplete="Off" tabindex="">

                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <label class="col-sm-3 control-label" for="ref_username"><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_user_name']->value;?>
:<font color="#ff0000">*</font></label>

                                                <div class="col-sm-7">
                                                    <input name="ref_username" tabindex="1" id="ref_username" type="text" size="22" maxlength="20" autocomplete="Off" value="<?php echo $_smarty_tpl->tpl_vars['status_name']->value;?>
"  title="" class="form-control"/>
                                                    <span id="referral_box" style="display:none;"></span> 
                                                    <span id="errormsg4"></span> 
						    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['ref_username'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['ref_username'];?>
 </span><?php }?>

                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12" id="referal_div"  height="30" class="text" style="display:none;">
                                                </div>
                                            </div>
                                        <?php }?>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['status_id']->value==''){?>
                                        <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
                                            <div class="form-group">

                                                <label class="col-sm-3 control-label" for="ref_username">qqqqqqqqqqqqq:<font color="#ff0000">*</font></label>

                                                <div class="col-sm-7">
                                                    <input name="ref_username" tabindex="1" id="ref_username" type="text" size="22" maxlength="20" autocomplete="Off" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['referral_name'];?>
"  title="" class="form-control"/>
                                                    <span id="referral_box" style="display:none;"></span> 
                                                    <span id="errormsg4"></span>
						    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['ref_username'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['ref_username'];?>
 </span><?php }?>

                                                </div> 
                                            </div>
                                        <?php }else{ ?>

                                            <div class="form-group">

                                                <label class="col-sm-3 control-label" for="ref_username"><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_user_name']->value;?>
:<font color="#ff0000">*</font></label>
                                                <div class="col-sm-7">
                                                    <input name="ref_username" tabindex="1" id="ref_username" type="text" size="22" maxlength="20" autocomplete="Off" value="<?php if (isset($_smarty_tpl->tpl_vars['sponser_name']->value)){?><?php echo $_smarty_tpl->tpl_vars['sponser_name']->value;?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"<?php echo $_smarty_tpl->tpl_vars['read']->value;?>
  title="" class="form-control"/>
                                                    <span id="referral_box" style="display:none;"></span> 
                                                    <span id="errormsg4"></span>  
						    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['ref_username'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['ref_username'];?>
 </span><?php }?>
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12" id="referal_div"  height="30" class="text" style="display:none;">
                                                </div>
                                            </div>
                                        <?php }?>
                                        
                                    <?php }?>
				    
				    <?php if ($_smarty_tpl->tpl_vars['status_id']->value==''){?>


                                        <div class="">
                                            <div class="" id="referal_div"  height="30" class="text" style="display:none;">
                                            </div>
                                        </div>

                                    <?php }?>

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="position"><?php echo $_smarty_tpl->tpl_vars['tran_position']->value;?>
 :<font color="#ff0000">*</font></label>
                                        <div class="col-sm-7">

                                            <select name="position" id="position" tabindex="2" onChange="" class="form-control" >   
                                                <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
                                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['regr']->value['position'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['position'] = new Smarty_variable($_tmp1, null, 0);?>                                                    <?php if ($_smarty_tpl->tpl_vars['position']->value=='L'){?>
                                                        <option value="L" selected="selected" ><?php echo $_smarty_tpl->tpl_vars['tran_left_leg']->value;?>
</option>
                                                        <option value="R"><?php echo $_smarty_tpl->tpl_vars['tran_right_leg']->value;?>
</option>
                                                    <?php }elseif($_smarty_tpl->tpl_vars['position']->value=='R'){?>
                                                        <option value="R" selected="selected"  ><?php echo $_smarty_tpl->tpl_vars['tran_right_leg']->value;?>
</option>
                                                        <option value="L" ><?php echo $_smarty_tpl->tpl_vars['tran_left_leg']->value;?>
</option>
							<?php }else{ ?>
							     <option value="" selected="selected"><?php echo $_smarty_tpl->tpl_vars['tran_select_leg']->value;?>
</option>
							    <option value="L" ><?php echo $_smarty_tpl->tpl_vars['tran_left_leg']->value;?>
</option>
							    <option value="R"><?php echo $_smarty_tpl->tpl_vars['tran_right_leg']->value;?>
</option>
                                                    <?php }?> 
                                                <?php }else{ ?>

                                                    <?php if ($_smarty_tpl->tpl_vars['posion']->value=='L'){?>
                                                        <option value="L" selected="selected" readonly="true"><?php echo $_smarty_tpl->tpl_vars['tran_left_leg']->value;?>
</option>
                                                        <option value="R"><?php echo $_smarty_tpl->tpl_vars['tran_right_leg']->value;?>
</option>
                                                    <?php }elseif($_smarty_tpl->tpl_vars['posion']->value=='R'){?>
                                                        <option value="R" selected="selected" readonly="true"><?php echo $_smarty_tpl->tpl_vars['tran_right_leg']->value;?>
</option>
                                                        <option value="L" ><?php echo $_smarty_tpl->tpl_vars['tran_left_leg']->value;?>
</option>
                                                    <?php }else{ ?>
                                                        <option value="" selected="selected"><?php echo $_smarty_tpl->tpl_vars['tran_select_leg']->value;?>
</option>
                                                        <option value="L" ><?php echo $_smarty_tpl->tpl_vars['tran_left_leg']->value;?>
</option>
                                                        <option value="R" ><?php echo $_smarty_tpl->tpl_vars['tran_right_leg']->value;?>
</option>
                                                    <?php }?> 
                                                <?php }?>
                                            </select>
                                            </select><span id="errormsg2"></span>
					    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['position'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['position'];?>
 </span><?php }?>
                                        </div>
                                    </div>             


				   <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>

                                        <div class="form-group">
                                            <div class="col-sm-7">
                                            </div>
					</div>
				    <?php }?>
                                    



                                    <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>

                                        <div class="form-group">

                                            <label class="col-sm-3 control-label" for="prodcut_id"><?php echo $_smarty_tpl->tpl_vars['tran_product']->value;?>
:<font color="#ff0000">*</font></label> 
                                            <div class="col-sm-7">

                                                <select name="prodcut_id" id="prodcut_id" tabindex="3"    class="form-control">
						    <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
							<?php if ($_smarty_tpl->tpl_vars['regr']->value['prodcut_id']!=''){?>
							    <option value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['prodcut_id'];?>
" selected=''><?php echo $_smarty_tpl->tpl_vars['regr']->value['prodcut_name'];?>
</option>
							<?php }?>

						    <?php }?>
						    
                                                    <?php echo $_smarty_tpl->tpl_vars['products']->value;?>





                                                </select> 
                                                    
                                                    
                                                    
                                                    
                                                    
                                                <input type='hidden' value='yes' name='pro_status' class="form-control">
						<?php if (isset($_smarty_tpl->tpl_vars['error']->value['prodcut_id'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['prodcut_id'];?>
 </span><?php }?>
                                            </div>    
                                        </div>   
                                            
                                            <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="quantity"><?php echo $_smarty_tpl->tpl_vars['tran_quantity']->value;?>
:<font color="#ff0000">*</font></label>
                                                        <div class="col-sm-7">
                                                            <input name="quantity" tabindex="4" id="quantity" type="number" size="22"  autocomplete="Off"  class="form-control" min="0"/>
                                                            <span id="quantity_box" style="display:none;"></span> 
                                                           <span id="errormsg2"></span> 
                                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['ref_quantity'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['ref_quantity'];?>
 </span><?php }?>
                                                        </div> 
                                                    </div>


                                    <?php }else{ ?>
                                        <input type='hidden' value='no' name='pro_status' class="form-control">
                                    <?php }?>

                                    <div class="form-group">

                                        <div class="col-sm-2 col-sm-offset-3">

                                            <button class="btn btn-blue next-step btn-block" tabindex="20" id="next_1" disabled>
                                                <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                            </button> 
                                        </div>
                                    </div>
                                </div> 
                                <div id="step-2">
                                    <h2> <?php echo $_smarty_tpl->tpl_vars['tran_contact_info']->value;?>
   </h2>

                                    <hr>
                                    <div class="form-group">
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['user_name_type']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2!="dynamic"){?>


                                            <label class="col-sm-3 control-label" for="user_name_entry"><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-7">
                                                <input  type="text"  name="user_name_entry" id="user_name_entry"   autocomplete="Off" tabindex="6" <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['user_name_entry'];?>
" <?php }?> class="form-control"><span id="errormsg3"></span>  <span id="errmsg33"></span>
						<?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_name_entry'])){?><span class='val-error'><?php echo $_smarty_tpl->tpl_vars['error']->value['user_name_entry'];?>
 </span><?php }?>
                                            </div>
                                            <input type='hidden' value='static' name='username_type' class="form-control">
                                        <?php }?>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="full_name"><?php echo $_smarty_tpl->tpl_vars['tran_name']->value;?>
:<font color="#ff0000">*</font></label>
                                        <div class="col-sm-7">
                                            <input  type="text"   name="full_name" id="full_name"  autocomplete="Off"  class="form-control" tabindex="7" <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['full_name'];?>
" <?php }?> >
					    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['full_name'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['full_name'];?>
 </span><?php }?>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-7" id="full_name_div"  height="30" class="text" style="display:none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="password"><?php echo $_smarty_tpl->tpl_vars['tran_password']->value;?>
:<font color="#ff0000">*</font></label>
                                        <div class="col-sm-7">
                                            <input  type="password"  name="pswd" id="pswd"   autocomplete="Off"  class="form-control" tabindex="8">
					    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['pswd'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['pswd'];?>
 </span><?php }?>
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <label class=" col-sm-3 control-label" for="cpswd"><?php echo $_smarty_tpl->tpl_vars['tran_confirm_password']->value;?>
:<font color="#ff0000">*</font></label>
                                        <div class="col-sm-7">
                                            <input name="cpswd" id="cpswd" type="password" autocomplete="Off"  class="form-control" tabindex="9">
					    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['cpswd'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['cpswd'];?>
 </span><?php }?>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="date_of_birth"><?php echo $_smarty_tpl->tpl_vars['tran_date_of_birth']->value;?>
:<font color="#ff0000">*</font> </label>

                                        <div class="col-sm-7 row">

                                            <p><div class="col-sm-4">
                                                <select name="year" id="year" onchange="change_year(this);" tabindex="10" class="form-control" >
                                                <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
						    <?php if ($_smarty_tpl->tpl_vars['regr']->value['year']!=''){?>
							<option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['year'];?>
"><?php echo $_smarty_tpl->tpl_vars['regr']->value['year'];?>
</option>
						    <?php }else{ ?>
							<option value=""><?php echo $_smarty_tpl->tpl_vars['tran_year']->value;?>
</option>
						    <?php }?>					    
						<?php }else{ ?>
						    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_year']->value;?>
</option>
						<?php }?> 
                                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                                                <?php } ?>
                                            </select>
					    </div>
                                        </p>
                                        <p>
                                        <div class="col-sm-4">
                                            <select name="month" id="month" onchange="change_month(this);" tabindex="11" class="form-control" onblur="day_month(this);">
                                            <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
						<?php if ($_smarty_tpl->tpl_vars['regr']->value['month']!=''){?>
						    <option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['month'];?>
"><?php echo $_smarty_tpl->tpl_vars['regr']->value['month'];?>
</option>
						<?php }else{ ?>
						    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_month']->value;?>
</option>
						<?php }?>
						 
					    <?php }else{ ?>
						<option value=""><?php echo $_smarty_tpl->tpl_vars['tran_month']->value;?>
</option>
					    <?php }?>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select> 
					</div>
				    </p><p>
                                    <div class="col-sm-4">
                                        <select name="day" id="day" onchange="change_day(this);" tabindex="12" class="form-control" >
                                        <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
					    <?php if ($_smarty_tpl->tpl_vars['regr']->value['day']!=''){?>
						<option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['day'];?>
"><?php echo $_smarty_tpl->tpl_vars['regr']->value['day'];?>
</option>
					    <?php }else{ ?>
						<option value=""><?php echo $_smarty_tpl->tpl_vars['tran_day']->value;?>
</option>
					    <?php }?>
					    
                                        <?php }else{ ?>
					    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_day']->value;?>
</option>
					<?php }?> 
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['month']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                                        <?php } ?>
                                    </select>
				    
				    </div></p>
				    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['day'])||isset($_smarty_tpl->tpl_vars['error']->value['year'])||isset($_smarty_tpl->tpl_vars['error']->value['month'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['day'];?>
 </span><?php }?> 
                            </div>
				   
                        </div>
				    

                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="gender"><?php echo $_smarty_tpl->tpl_vars['tran_gender']->value;?>
:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
				
                                <select name="gender" id="gender"  class="form-control" tabindex="13">
				    
                                    <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?>
                                        <?php if ($_smarty_tpl->tpl_vars['regr']->value['gender']=='F'){?>
                                            <option  selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['gender'];?>
"><?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>
</option>						<option value='M' ><?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>
 </option>
                                        <?php }elseif($_smarty_tpl->tpl_vars['regr']->value['gender']=='M'){?>
                                            <option  selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['gender'];?>
"><?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>
</option> 
                                            <option value='F'><?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>
</option>
					<?php }else{ ?>
					    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_gender']->value;?>
</option>

					    <option value='M' ><?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>
 </option>
					    <option value='F'><?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>
</option>
                                        <?php }?>
                                    <?php }else{ ?>
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_gender']->value;?>
</option>

                                        <option value='M' ><?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>
 </option>
                                        <option value='F'><?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>
</option>
                                    <?php }?>   

                                </select>
				<?php if (isset($_smarty_tpl->tpl_vars['error']->value['gender'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['gender'];?>
 </span><?php }?>
                            </div>
                        </div> 
                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="address"><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
                                <textarea rows="6" name="address" id="address" cols="22" tabindex="14"  class="form-control"><?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> <?php echo $_smarty_tpl->tpl_vars['regr']->value['address'];?>
 <?php }?></textarea>
				<?php if (isset($_smarty_tpl->tpl_vars['error']->value['address'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['address'];?>
 </span><?php }?>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['tran_country']->value;?>
:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
                                <select name="country" id="country" tabindex="15" onChange="getAllStates(this.value)" class="form-control" >
				    <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?>                                        
					<?php if ($_smarty_tpl->tpl_vars['regr']->value['country']!=''){?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['country_id'];?>
" class="form-control"><?php echo $_smarty_tpl->tpl_vars['regr']->value['country'];?>
</option>
					<?php }else{ ?>
					<option value="" class="form-control"><?php echo $_smarty_tpl->tpl_vars['tran_select_country']->value;?>
</option>
					<?php }?>
				    <?php }else{ ?>
				    <?php }?>
                                    <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>


                                </select>
				<?php if (isset($_smarty_tpl->tpl_vars['error']->value['country'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['country'];?>
 </span><?php }?>
                            </div>
                        </div>

                        <div class="form-group">
			    
			    <?php if (($_smarty_tpl->tpl_vars['reg_count']->value>0)&&(($_smarty_tpl->tpl_vars['regr']->value['state']!=0)||($_smarty_tpl->tpl_vars['regr']->value['state']!=''))){?>
			    <div id="state_fill">

				<label class=" col-sm-3 control-label" for=""><?php echo $_smarty_tpl->tpl_vars['tran_state']->value;?>
:</label>
				<div class="col-sm-7">
				    <select name="state" id="state" tabindex="15" onChange="" class="form-control" >
					<?php echo $_smarty_tpl->tpl_vars['state_fill']->value;?>

					<option value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['state'];?>
" selected="" class="form-control"><?php echo $_smarty_tpl->tpl_vars['regr']->value['state_name'];?>
</option>
					
				    </select>
				</div>
			    </div>
				
			     <?php }?>
				<div  id="state_div" >
                                                                           
				</div>
			   
                        </div>  

                        <input type="hidden" name="district_hid" id="district_hid" value="">
                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="pin"><?php echo $_smarty_tpl->tpl_vars['tran_pin_code']->value;?>
:</label>
                            <div class="col-sm-7">
                                <input  type="text"  name="pin" id="pin"   autocomplete="Off" class="form-control" tabindex="16"<?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['pin'];?>
" <?php }?> >
                                <span id="errmsg2"></span>
                            </div>
                        </div>


                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="mobile"><?php echo $_smarty_tpl->tpl_vars['tran_mobile_no']->value;?>
:<font color="#ff0000">*</font></label>
                            <div class="col-sm-8 row">
                                <div class="col-sm-2">
                                    <input name="mobile_code" readonly="" id="mobile_code" <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?>value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['mobile_code'];?>
"<?php }?> type="text" autocomplete="Off" class="form-control" maxlength="10" tabindex="17" >
                                </div> 
                                <div class="col-sm-9">
                                    <input name="mobile" id="mobile" type="text" autocomplete="Off" class="form-control"  tabindex="17" maxlength="10" <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['mobile'];?>
" <?php }?> >
				    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['mobile'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['mobile'];?>
 </span><?php }?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="land_line"><?php echo $_smarty_tpl->tpl_vars['tran_land_line_no']->value;?>
:</label>
                            <div class="col-sm-7">
                                <input name="land_line" id="land_line"  type="text" autocomplete="Off" class="form-control" tabindex="18" <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['land_line'];?>
" <?php }?>>
                                <span id="errmsg4"></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
                                <input name="email" id="email" type="text"  autocomplete="Off"  class="form-control" tabindex="19" <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> value="<?php echo $_smarty_tpl->tpl_vars['regr']->value['email'];?>
" <?php }?>>
				<?php if (isset($_smarty_tpl->tpl_vars['error']->value['email'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['email'];?>
 </span><?php }?>
                            </div> 
                        </div>
                        <div class="modal fade" id="panel-config" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >
                                            &times;
                                        </button>
                                        <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['tran_terms_conditions']->value;?>
</h4>
                                    </div>
                                    <div class="modal-body">

                                        <table cellpadding="0" cellspacing="0" align="center">

                                            <tr>
                                                <td width="80%">
                                                    <?php echo $_smarty_tpl->tpl_vars['termsconditions']->value;?>
                                            </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="27">
                                            Close
                                        </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>



                        <div class="form-group">
                            <div class="col-sm-3"> </div>
                            <label class="col-sm-7" for="">    

                                <label class="checkbox-inline">
                                    <input name="agree" id="agree"  type="checkbox" value="" tabindex="28">

                                    <a class="btn btn-xs btn-link panel-config" data-toggle="modal" href ="#panel-config"  style="text-decoration: none" >
                                        <?php echo $_smarty_tpl->tpl_vars['tran_I_ACCEPT_TERMS_AND_CONDITIONS']->value;?>

                                    </a>
                                    <font color="#ff0000">*</font>

                                    <span id="agree1"></span>
                                </label>
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-3">
                                <button class="btn btn-dark-grey back-step btn-block"tabindex="29" style="margin-bottom: 10px;">
                                    <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                </button>
                            </div> 
                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['user_name_type']->value;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3!="dynamic"){?>
                                <div class="col-sm-2 col-sm-offset-3">
				     <?php if ($_smarty_tpl->tpl_vars['reg_count']->value>0){?> 
					 <button class="btn btn-blue next-step btn-block" tabindex="30" id="next_2">
					    <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
					  </button> 
				    <?php }else{ ?>
					<button class="btn btn-blue next-step btn-block" tabindex="30" id="next_2" disabled>
					    <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
					</button> 
				     <?php }?>
                                </div>

                            <?php }else{ ?>
                                <div class="col-sm-2 col-sm-offset-3">

                                    <button class="btn btn-blue next-step btn-block" tabindex="30" id="next_2">
                                        <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                    </button> 
                                </div>
                            <?php }?>
                        </div>

                    </div> 

                    <div id="step-3">


                        <center> 
                            <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>
                                <div class="row">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
:  
                                        <span style="font-family: monospace;height:15px; width:100px" class="total-title" id="total_product_amount">
                                        </span>
                                    </h2>
                                </div>
                            <?php }?>

                        </center>
                        <h3></h3>
                        <h2 class="StepTitle"><?php echo $_smarty_tpl->tpl_vars['tran_reg_type']->value;?>
</h2>
                        <h3></h3>

                        <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable('', null, 0);?>

                        <div class="tabbable ">
                            <ul id="myTab3" class="nav nav-tabs tab-green">
                                <?php if ($_smarty_tpl->tpl_vars['tab_inactive']->value!='yes'){?> 
                                    <?php if ($_smarty_tpl->tpl_vars['credit_card_status']->value=='yes'){?> 
                                        <li class="active"  id="credit_card_tab">
                                            <a href="#panel_tab4_example1" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i><?php echo $_smarty_tpl->tpl_vars['tran_credit_card']->value;?>

                                            </a>
                                        </li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='yes'){?>

                                        <li <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='yes'){?> class="active" <?php }?>id="ewallet_tab">
                                            <a href="#panel_tab4_example3" data-toggle="tab">
                                                <i class="blue fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['tran_ewallet']->value;?>

                                            </a>
                                        </li>


                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['paypal_status']->value=='yes'){?>
                                        <li <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['paypal_status']->value=='yes'&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'){?>  class="active" <?php }?>  id="paypal_tab">
                                            <a href="#panel_tab4_example4" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i><?php echo $_smarty_tpl->tpl_vars['tran_paypal']->value;?>

                                            </a>
                                        </li>
                                    <?php }?>




                                    <?php if ($_smarty_tpl->tpl_vars['epdq_status']->value=='yes'){?>
                                        <li <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['free_joining_status']->value=='no'&&$_smarty_tpl->tpl_vars['paypal_status']->value=='no'){?> class="active" <?php }?> id="epdq_tab">
                                            <a href="#panel_tab4_example6" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i><?php echo $_smarty_tpl->tpl_vars['tran_epdq']->value;?>

                                            </a>
                                        </li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['authorize_status']->value=='yes'){?>
                                        <li <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['free_joining_status']->value=='no'&&$_smarty_tpl->tpl_vars['paypal_status']->value=='no'&&$_smarty_tpl->tpl_vars['epdq_status']->value=='no'){?> class="active" <?php }?> id="authorize_tab">
                                            <a href="#panel_tab4_example7" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i><?php echo $_smarty_tpl->tpl_vars['tran_authorize']->value;?>

                                            </a>
                                        </li>
                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['e_xact_status']->value=='yes'){?>
                                        <li <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['free_joining_status']->value=='no'&&$_smarty_tpl->tpl_vars['paypal_status']->value=='no'&&$_smarty_tpl->tpl_vars['epdq_status']->value=='no'){?> class="active" <?php }?> id="e_xact_status" >
                                            <a href="#panel_tab4_example8" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i><?php echo $_smarty_tpl->tpl_vars['tran_Credit_card_or_Interac_debit_card']->value;?>

                                            </a>

 
                                        </li>
                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="yes"){?>
                                        <li <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="yes"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'){?> <?php }?> id="epin_tab">
                                            <a href="#panel_tab4_example2" data-toggle="tab">
                                                <i class="blue fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>

                                            </a>
                                        </li>
                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'){?>
                                    <li  <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'&&$_smarty_tpl->tpl_vars['paypal_status']->value=='no'){?> class="active" <?php }?> id="free_join_tab">
                                        <a href="#panel_tab4_example5" data-toggle="tab">
                                            <i class="blue fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['tran_free_join']->value;?>

                                        </a>
                                    </li>
                                <?php }?>
                                <?php }else{ ?>
                                <?php if ($_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'){?>
                                    <li  class="active" id="free_join_tab">
                                        <a href="#panel_tab4_example5" data-toggle="tab">
                                            <i class="blue fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['tran_free_join']->value;?>

                                        </a>
                                    </li>
                                <?php }?>
<?php }?>
                            </ul>

                            <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable('', null, 0);?>
                            <?php if ($_smarty_tpl->tpl_vars['tab_inactive']->value!='yes'){?> 
                                <?php if ($_smarty_tpl->tpl_vars['credit_card_status']->value=='yes'){?> 
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("credit_card_tab", null, 0);?>

                                <?php }elseif($_smarty_tpl->tpl_vars['payment_pin_status']->value=="yes"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'){?>
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("epin_tab", null, 0);?>

                                <?php }elseif($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='yes'){?> 
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("ewallet_tab", null, 0);?>
                                <?php }elseif($_smarty_tpl->tpl_vars['paypal_status']->value=="yes"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['pin_status']->value=="no"){?>
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("paypal_tab", null, 0);?>
                                <?php }elseif($_smarty_tpl->tpl_vars['authorize_status']->value=='yes'&&$_smarty_tpl->tpl_vars['paypal_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['pin_status']->value=="no"){?>
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("authorize_tab", null, 0);?>

                                <?php }elseif($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['paypal_status']->value=="no"&&$_smarty_tpl->tpl_vars['free_joining_status']->value=='no'&&$_smarty_tpl->tpl_vars['authorize_status']->value=='no'&&$_smarty_tpl->tpl_vars['epdq_status']->value=='yes'){?>
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("epdq_tab", null, 0);?>
                                <?php }elseif($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['paypal_status']->value=="no"&&$_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'&&$_smarty_tpl->tpl_vars['authorize_status']->value=='no'){?>
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("free_join_tab", null, 0);?>
                                    
                                <?php }elseif($_smarty_tpl->tpl_vars['e_xact_status']->value=='yes'&&$_smarty_tpl->tpl_vars['paypal_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['authorize_status']->value=='no'){?>    
                                    <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("e_xact_tab", null, 0);?>

                                <?php }?>
                            <?php }elseif($_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'){?>
                                <?php $_smarty_tpl->tpl_vars['actve_tab_val'] = new Smarty_variable("free_join_tab", null, 0);?>
                            <?php }?>
                            <div class="tab-content">
                                <input type="hidden" name="active_tab" id="active_tab" value="e_xact_tab" >
                                <?php if ($_smarty_tpl->tpl_vars['tab_inactive']->value!='yes'){?> 
                                    <?php if ($_smarty_tpl->tpl_vars['credit_card_status']->value=='yes'){?> 

                                        <div class="tab-pane active"  id="panel_tab4_example1">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_credit_card']->value;?>

                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <h3>  Card information </h3>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">
                                                                <?php echo $_smarty_tpl->tpl_vars['tran_card_number']->value;?>
 <span class="symbol required"></span>
                                                            </label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" id="card_number" name="card_number" tabindex="29" >
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['card_number'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['card_number'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" for="credit_currency"><?php echo $_smarty_tpl->tpl_vars['tran_currency']->value;?>
</label>
                                                            <div class="col-sm-3">   


                                                                <select name="credit_currency" id="credit_currency" tabindex="30" class="form-control" >

                                                                    <option value="USD"> USD</option>
                                                                    <option value="GBP"> GBP</option>
                                                                    <option value="EUR"> EUR</option>

                                                                </select>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['credit_currency'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['credit_currency'];?>
 </span><?php }?>

                                                            </div>
                                                        </div>


                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="pay_type"><?php echo $_smarty_tpl->tpl_vars['tran_card_type']->value;?>
:<font color="#ff0000">*</font></label>

                                                            <div class="col-md-7">
                                                                <img src=" <?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/public_html/images/MasterCard-credit-card.jpg" class="crditcardimgs" /> 

                                                                <br>
                                                                <input type="radio" name="credit_card_type" id="credit_card_type1"  value="visa"  checked=""  tabindex="31"/>  <label for="credit_card_type"><?php echo $_smarty_tpl->tpl_vars['tran_visa']->value;?>
  &nbsp;</label>
                                                                <input type="radio" name="credit_card_type" id="credit_card_type2"    value="master_card" tabindex="32"/><label for="credit_card_type"><?php echo $_smarty_tpl->tpl_vars['tran_master_card']->value;?>
</label>            
                                                                <span id="pay_type" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['credit_card_type'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['credit_card_type'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_cvn"><?php echo $_smarty_tpl->tpl_vars['tran_card_verification']->value;?>
:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input  type="text" name="card_cvn" id="card_cvn" size="20"  tabindex="33"  autocomplete="Off"   class="form-control"/> 
                                                                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
public_html/images/cvn_info.png"   />
                                                                <span id="card_cvn" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['card_cvn'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['card_cvn'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="card_expiry_date" id="card_expiry_date" type="hidden" size="16" maxlength="10"   VALUE="" />
                                                            <label class=" col-sm-3 control-label" for="card_expiry_month"><?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
 :<font color="#ff0000">*</font> 
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <select name="card_expiry_year" id="card_expiry_year"   tabindex="34" onchange="expiry_year(this);" class="form-control" >
                                                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_year']->value;?>
</option>
                                                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['exp_year']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                                                                    <?php } ?>
                                                                </select>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['card_expiry_date'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['card_expiry_date'];?>
 </span><?php }?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select name="card_expiry_month" id="card_expiry_month"   tabindex="35" onchange="expiry_month(this);" class="form-control" >
                                                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_month']->value;?>
</option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select> 
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['card_expiry_date'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['card_expiry_date'];?>
 </span><?php }?>
                                                            </div>


                                                        </div>
                                                        <h3>Account</h3>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="fore_name"><?php echo $_smarty_tpl->tpl_vars['tran_first_name']->value;?>
:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="36" type="text" name="bill_to_forename" id="bill_to_forename"   autocomplete="Off"   class="form-control"/> 
								
                                                                <span id="card_forename" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['bill_to_forename'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['bill_to_forename'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_forename"><?php echo $_smarty_tpl->tpl_vars['tran_last_name']->value;?>
:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="37" type="text" name="bill_to_surname" id="bill_to_surname" size="20"   autocomplete="Off"   class="form-control"/> 

                                                                <span id="card_surname" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['bill_to_surname'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['bill_to_surname'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_email"><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="38" type="text" name="bill_to_email" id="bill_to_email" size="20"   autocomplete="Off"   class="form-control"/> 

                                                                <span id="card_email" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['bill_to_email'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['bill_to_email'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_phone"><?php echo $_smarty_tpl->tpl_vars['tran_mobile_no']->value;?>
:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="39" type="text"name="bill_to_phone" id="bill_to_phone"  size="20"   autocomplete="Off"   class="form-control"/> 

                                                                <span id="card_phone" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['bill_to_phone'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['bill_to_phone'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button tabindex="40" class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;">
                                                                <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button tabindex="40" class="btn btn-blue btn-block" name="credit_crd" id="credit_crd" onclick="validate_page();">
                                                                <?php echo $_smarty_tpl->tpl_vars['tran_finish']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div> 

                                    <?php }?>


                                    

                                    <?php if ($_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='yes'){?>

                                        <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='yes'){?>  active <?php }?>"  id="panel_tab4_example3">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_ewallet']->value;?>

                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <label class="col-sm-3 control-label" for="user_name_ewallet"><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
:<font color="#ff0000">*</font></label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" id="user_name_ewallet" name="user_name_ewallet" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
"  title="<?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
" class="form-control"/>  
                                                                <span id="user_name_ewallet_box" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_name_ewallet'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['user_name_ewallet'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class="col-sm-3 control-label" for="tran_pass_ewallet"><?php echo $_smarty_tpl->tpl_vars['tran_transaction_password']->value;?>
:<font color="#ff0000">*</font></label>
                                                            <div class="col-sm-7">
                                                                <input type="password" class="form-control" id="tran_pass_ewallet" name="tran_pass_ewallet" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_transaction_password']->value;?>
"title="<?php echo $_smarty_tpl->tpl_vars['tran_transaction_password']->value;?>
" class="form-control"/>  
                                                                <span id="tran_pass_ewallet_box" style="display:none;"></span>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['tran_pass_ewallet'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['tran_pass_ewallet'];?>
 </span><?php }?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="ewallet" id="ewallet"disabled>
                                                                <?php echo $_smarty_tpl->tpl_vars['tran_finish']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    <?php }?>


                                    <?php if ($_smarty_tpl->tpl_vars['paypal_status']->value=="yes"){?> 
                                        <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['paypal_status']->value=="yes"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"){?>  active <?php }?>"  id="panel_tab4_example4">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_paypal']->value;?>

                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="paypal" id="paypal" >
                                                                <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['epdq_status']->value=='yes'){?>
                                        <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['epdq_status']->value=="yes"&&$_smarty_tpl->tpl_vars['paypal_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"){?>  active <?php }?>"   id="panel_tab4_example6">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_epdq']->value;?>

                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="epdq" id="epdq" >
                                                                <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 

                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['authorize_status']->value=='yes'){?>
                                        <div class="tab-pane"  id="panel_tab4_example7">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_authorize']->value;?>

                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="authorize" id="authorize" >
                                                                <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 

                                    <?php }?>
                                 
                                    <?php if ($_smarty_tpl->tpl_vars['e_xact_status']->value=='yes'){?>
                                        <div class="tab-pane active"  id="panel_tab4_example8">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_Credit_card_or_Interac_debit_card']->value;?>

                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="exact" id="authorize" >
                                                                <?php echo $_smarty_tpl->tpl_vars['tran_next']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 

                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="yes"){?>

                                        <div class="tab-pane "  id="panel_tab4_example2">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>

                                                    </i>
                                                </div>


                                                <div class="panel-body">


                                                    <div class="col-md-12">

                                                        <div class="row">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered table-hover table-full-width" id="p_scents">
                                                                    <thead>
                                                                        <tr align="center">
                                                                            <th ><?php echo $_smarty_tpl->tpl_vars['tran_sl_no']->value;?>
</th>
                                                                            <th>  <?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
 </th> 
                                                                            <th>  <?php echo $_smarty_tpl->tpl_vars['tran_epin_amount']->value;?>
  </th>
                                                                            <th><?php echo $_smarty_tpl->tpl_vars['tran_remain_epin_amount']->value;?>
  </th> 
                                                                            <th><?php echo $_smarty_tpl->tpl_vars['tran_req_epin_amount']->value;?>
 </th> 
                                                                        </tr>

                                                                    </thead> 
                                                                    <tbody>
                                                                        <tr   align="center" >


                                                                            <td>1</td>  
                                                                            <td><div class="col-md-12">
                                                                                    <p>
                                                                                        <input  style="width:200px" tabindex="41" type="text" name="epin1" id="epin1" size="20"   autocomplete="Off"   class="form-control"/>  
                                                                                        <span id="pin_box_1" style="display:none;"></span>										
											
                                                                                    </p>
                                                                                </div>
                                                                            </td>
								    <?php if (isset($_smarty_tpl->tpl_vars['num_of_epins']->value)){?>
									<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num_of_epins']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['num_of_epins']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
									    <?php if (isset($_smarty_tpl->tpl_vars['error']->value["epin".($_smarty_tpl->tpl_vars['i']->value)])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value["epin".($_smarty_tpl->tpl_vars['i']->value)];?>
</span><?php }?>
									<?php }} ?>
								    <?php }?>
                                                                            <td> <div class="col-md-12">
                                                                                    <input tabindex="42" type="text" name="pin_amount1" id="pin_amount1" size="20"   autocomplete="Off"   class="form-control" readonly/>  
                                                                                    <span id="pin_amount_span" style="display:none;"></span>

                                                                                </div>
                                                                            </td>
                                                                            <td><div class="col-md-12">
                                                                                    <input tabindex="43" type="text" name="remaining_amount1" id="remaining_amount1" size="20"   autocomplete="Off"   class="form-control" readonly/>  
                                                                                    <span id="remain_amount_span" style="display:none;"></span>

                                                                                </div>
                                                                            </td>
                                                                            <td><div class="col-md-12">
                                                                                    <input tabindex="44" type="text" name="balance_amount1" id="balance_amount1" size="19"   autocomplete="Off"   class="form-control" readonly/>  
                                                                                    <span id="balance_amount_span" style="display:none;"></span>

                                                                                </div>

                                                                            </td>

                                                                        </tr>

                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table >
                                                                    <thead> </thead>
                                                                    <tbody>
                                                                        <tr align="center">

                                                                            <?php echo $_smarty_tpl->tpl_vars['tran_product_amount']->value;?>
:  <span style="font-family: monospace;height:15px; width:100px" class="total-title" id="total_product_amount">
                                                                    </span>
                                                                    </tr>
                                                                    <tr>
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-2">
                                                                            <label class="  control-label" for="tt"><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
:<font color="#ff0000">*</font></label></div>
                                                                        <div class="col-md-6">
                                                                            <input tabindex="45" type="text" name="epin_total_amount" id="epin_total_amount" size="20"   autocomplete="Off"   class="form-control"  readonly/>  
                                                                            <span id="epin_total_amount_span" style="display:none;"></span>

                                                                        </div>
                                                                    </div>
                                                                    </tr>
                                                                    <tr>


                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                        <div class="form-group"id="finButtn">
                                                            <div class="col-sm-2 backButtnValidation">
                                                                <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;">
                                                                    <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                                </button>
                                                            </div>



                                                            <div class="col-sm-2 col-sm-offset-8" id="validate_epin_div">
                                                                <input type="button" id ="pin_btn" name= "pin_btn" value = "<?php echo $_smarty_tpl->tpl_vars['tran_epin_val']->value;?>
" onclick="validate_epin();" tabindex="46" class="btn btn-bricky" style="margin-top: 9%;margin-left: 9%;"/> 
                                                            </div> 
                                                        </div>  
                                                    </div>
                                                </div>

                                            </div>  

                                        </div>

                                    <?php }?>
                                    
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'){?>
                                    <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['payment_pin_status']->value=="no"&&$_smarty_tpl->tpl_vars['credit_card_status']->value=='no'&&$_smarty_tpl->tpl_vars['payment_ewallet_status']->value=='no'&&$_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'&&$_smarty_tpl->tpl_vars['paypal_status']->value=="no"){?>  active <?php }?>"  id="panel_tab4_example5">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_free_join']->value;?>

                                                </i>
                                            </div>

                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-sm-2 ">
                                                        <button class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;">
                                                            <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                        </button>
                                                    </div>
                                                    <div class="col-sm-2 col-sm-offset-8">


                                                        <button class="btn btn-blue btn-block" name="free_join" id="free_join" >
                                                            <?php echo $_smarty_tpl->tpl_vars['tran_finish']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                        </button>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div> 
                                <?php }?>
                                <?php }else{ ?>
                                    <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['free_joining_status']->value=='yes'){?>  active <?php }?>"  id="panel_tab4_example5">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-external-link-square"><?php echo $_smarty_tpl->tpl_vars['tran_free_join']->value;?>

                                                </i>
                                            </div>

                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-sm-2 ">
                                                        <button class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;">
                                                            <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                                                        </button>
                                                    </div>
                                                    <div class="col-sm-2 col-sm-offset-8">


                                                        <button class="btn btn-blue btn-block" name="free_join" id="free_join" >
                                                            <?php echo $_smarty_tpl->tpl_vars['tran_finish']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                                        </button>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div> 
                                <?php }?>
                                




                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>


    </div>




</div>
</div>





<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='distributor'){?>﻿
    <?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }?>

<script>
    jQuery(document).ready(function() {
	$("#country").change(function(){
	
	    $("#state_fill").remove();
	});
	
    });
    
   
</script>

<script>
                                                    jQuery(document).ready(function() {
                                                       Main.init();
                                                       FormWizard.init();
                                                       


                                                       
                                                        // ValidateUser.init();
                                                        //DateTimePicker.init();
                                                        //TableData.init();
                                                    });
</script> 
<script>
    var active tab = $("ul#myTab3 li.active")
</script>
<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='distributor'){?>﻿
    <?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }?><?php }} ?>
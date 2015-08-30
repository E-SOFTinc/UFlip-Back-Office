{if $user_type=='distributor'}﻿
{include file="user/layout/header.tpl"  name=""}
{else}
    {include file="admin/layout/header.tpl"  name=""}
    {/if}

        <div id="span_js_messages" style="display: none;"> 
            <span id="validate_msg1">{$tran_checking_placement_data}</span>
            <span id="validate_msg2">{$tran_validate_placement_data}</span>
            <span id="validate_msg3">{$tran_checking_your_position}</span>
            <span id="validate_msg4">{$tran_position_validated}</span>
            <span id="validate_msg5">{$tran_position_not_useable}</span>
            <span id="validate_msg6">{$tran_sponser_name_validated}</span>
            <span id="validate_msg7">{$tran_checking_sponser_user_name}</span>
            <span id="validate_msg8">{$tran_invalid_sponser_user_name}</span>
            <span id="validate_msg9">{$tran_invalid_e_pin}</span>
            <span id="validate_msg10">{$tran_e_pin_validated}</span>
            <span id="validate_msg11">{$tran_checking_e_pin_availability}</span>
            <span id="validate_msg12">{$tran_you_must_select_product}</span>
            <span id="validate_msg13">{$tran_you_must_enter_e_pin}</span>
            <span id="validate_msg14">{$tran_you_must_enter_full_name}</span>
            <span id="validate_msg15">{$tran_you_must_enter_password}</span>
            <span id="validate_msg16">{$tran_minimum_six_characters_required}</span>
            <span id="validate_msg17">{$tran_you_must_enter_your_password_again}</span>
            <span id="validate_msg18">{$tran_password_miss_match}</span>
            <span id="validate_msg19">{$tran_you_must_select_date_of_birth}</span>
            <span id="validate_msg20">{$tran_age_should_be_greater_than_18}</span>
            <span id="validate_msg21">{$tran_you_must_enter_sponser_user_name}</span>
            <span id="validate_msg22">{$tran_you_must_enter_sponser_id}</span>
            <span id="validate_msg23">{$tran_you_must_select_your_position}</span>
            <span id="validate_msg24">{$tran_referral_name}</span>
            <span id="validate_msg25">{$tran_You_must_enter_your_mobile_no}</span>
            <span id="validate_msg26">{$tran_terms_condition}</span>
            <span id="validate_msg27">{$tran_user_name_not_availablity}</span>
            <span id="validate_msg28">{$tran_user_name_not_available}</span>
            <span id="validate_msg29">{$tran_user_name_available}</span>
            <span id="validate_msg30">{$tran_You_must_select_a_date}</span>
            <span id="validate_msg31">{$tran_You_must_select_a_month}</span>
            <span id="validate_msg32">{$tran_You_must_select_a_year}</span>
            <span id="validate_msg33">{$tran_You_must_select_gender}</span>
            <span id="validate_msg34">{$tran_You_must_select_country}</span>
            <span id="validate_msg35">{$tran_mail_id_format}</span>
            <span id="validate_msg36">{$tran_mob_no_10_digit}</span>
            <span id="validate_msg37">{$tran_digits_only}</span>
            <span id="validate_msg38">{$tran_you_must_enter_username}</span>
            <span id="validate_msg39">{$tran_special_chars_not_allowed}</span>
            <span id="validate_msg40">{$tran_you_must_enter_email_id}</span>
            <span id="validate_msg41">{$tran_You_must_enter_your_address}</span>
            <span id="validate_msg42">{$tran_enter_card_no}</span>
            <span id="validate_msg43">{$tran_ent_amnt}</span>
            <span id="validate_msg44">{$tran_ent_valid_no}</span>
            <span id="validate_msg45">{$tran_ent_expiry_date}</span>
            <span id="validate_msg46">{$tran_ent_fore_name}</span>
            <span id="validate_msg47">{$tran_ent_sure_name}</span>
            <span id="validate_msg48">{$tran_special_chars_not_allowed}</span> 
            <span id="validate_msg49">{$tran_checking_balance}</span>
            <span id="validate_msg50">{$tran_insuff_bal}</span> 
            <span id="validate_msg51">{$tran_bal_ok}</span>
            <span id="validate_msg52">{$tran_invalid_transaction_password}</span>
            <span id="validate_msg53">{$tran_transaction_ok}</span>
            <span id="validate_msg54">{$tran_checking_transaction}</span>
            <span id="validate_msg55">{$tran_bal_ok}</span>
            <span id="validate_msg56">{$tran_you_must_select_pay_type}</span>
            <span id="validate_msg57">{$tran_you_must_enter_pin_value}</span>
            <span id="validate_msg58">{$tran_characters_only}</span>
            <span id="validate_msg59">{$tran_pan_format}</span>
            <span id="validate_msg60">{$tran_checking_trans_details}</span>
            <span id="validate_msg61">{$tran_invalid_trans_details}</span>
            <span id="validate_msg62">{$tran_valid_trans_details}</span>
            <span id="row_msg">{$tran_rows}</span>
            <span id="show_msg">{$tran_shows}</span>
        </div>

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
                        {$tran_new_user_signup}
                    </div>
                    <div class="panel-body">
                        {if $user_type !='distributor'}﻿
                            {if $product_status == "yes"}
                                {if $is_product_added != "yes"}




                                    <div class="alert alert-warning">
                                        <button data-dismiss="alert" class="close">
                                            ×
                                        </button>
                                        <i class="fa fa-warning-circle"></i>
                                        <strong>{$tran_no_product_added_yet}!   </strong><a href="{$PATH_TO_ROOT_DOMAIN}admin/product/product_management">{$tran_please_click_here_to_add_product}</a>
                                    </div>


                                    </tr>
                                {/if}
                            {/if}



                            {if $pin_status == "yes"}
                                {if $is_pin_added != "yes"}



                                    <div class="alert alert-warning">
                                        <button data-dismiss="alert" class="close">
                                            ×
                                        </button>
                                        <i class="fa fa-warning-circle"></i>
                                        <strong>{$tran_no_e_pin_added_yet}!   </strong><a href="{$PATH_TO_ROOT_DOMAIN}admin/epin/epin_management">{$tran_please_click_here_to_add_e_pin}</a>
                                    </div>



                                    </tr>
                                {/if}
                            {/if}
                        {/if}
                        <form role="form" class="smart-wizard form-horizontal" method="post"  name="form" id="form" action="{$BASE_URL}register_board/register_submit">
                            <input type="hidden" name="path" id="path" value="{$PATH_TO_ROOT_DOMAIN}">
                            <input type="hidden" name="lang_id" id="lang_id" value="{$lang_id}">
                            <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                            <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
                            <input type="hidden" id="username_type" name="username_type" value="{$user_type}">
                            <input type="hidden" id="status_id" name="status_id" value="{$status_id}">
                            <input type="hidden" id="is_pin_ok" name="is_pin_ok" value=0> 
                            <input type="hidden" id="ewallet_bal" name="ewallet_bal" value=0>
                            <input type="hidden" id ="product_amount" name= "product_amount"  value = "" >
                            <input type="hidden" id ="check_product_status" name= "check_product_status"  value = "{$product_status}" >
                            <input type="hidden" id="is_paypal_on1" name="is_paypal_on1" value="{$paypal_status}">
                            <input name="date_of_birth" id="date_of_birth" type="hidden" size="16" maxlength="10"  {if $reg_count>0} value="{$regr['date_of_birth']}" {/if} />
                            <div id="wizard" class="swMain">
                                <ul>
                                    <li>
                                        <a href="#step-1">
                                            <div class="stepNumber">
                                                1
                                            </div>
                                            <span class="stepDesc"> {$tran_step1} 
                                                <br />
                                                <small>{$tran_sponser_and_package_information} </small> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <div class="stepNumber">
                                                2
                                            </div>
                                            <span class="stepDesc"> {$tran_step2}
                                                <br />
                                                <small> {$tran_contact_info} & {$tran_bank_info}  </small> </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <div class="stepNumber">
                                                3
                                            </div>
                                            <span class="stepDesc"> {$tran_step3}
                                                <br />
                                                <small> {$tran_reg_type} </small> </span>
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
                                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                                        </div>
                                    </div>

                                    <h2 class="StepTitle"> {$tran_sponser_and_package_information}   </h2>


                                    {if $status_id ==""}
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="ref_username">{$tran_sponsor_user_name}:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-7">
                                                <input name="ref_username" tabindex="2" id="ref_username" type="text" size="22" maxlength="20" autocomplete="Off" value="{$user_name}" title="" class="form-control" onclick="disable_next1();"/>
                                                <span id="referral_box" style="display:none;"></span> 
                                                <span id="errormsg4"></span>  

                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" id="referal_div"  height="30" class="text" style="display:none;">
                                            </div>
                                        </div>

                                    {/if}


                                    {*<div class="form-group">

                                    <label class="col-sm-3 control-label" for="position">{$tran_position} :<font color="#ff0000">*</font></label>
                                    <div class="col-sm-7">

                                    <select name="position" id="position" tabindex="3" onChange="" class="form-control" >   


                                    {if $posion =='L'}
                                    <option value="L" selected="selected" readonly="true">{$tran_left_leg}</option>
                                    <option value="R">{$tran_right_leg}</option>
                                    {elseif $posion =='R'}
                                    <option value="R" selected="selected" readonly="true">{$tran_right_leg}</option>
                                    <option value="L" >{$tran_left_leg}</option>
                                    {else}
                                    <option value="" selected="selected">{$tran_select_leg}</option>
                                    <option value="L" >{$tran_left_leg}</option>
                                    <option value="R" >{$tran_right_leg}</option>
                                    {/if} 

                                    </select>
                                    </div>
                                    </div> *}            



                                    {*  {if $product_status == "yes"}
  
                                    <div class="form-group">
                                    <div class="col-sm-7">
                                    </div></div>
                                    {/if}*}



                                    {if $product_status == "yes"}

                                        <div class="form-group">

                                            <label class="col-sm-3 control-label" for="prodcut_id">{$tran_product}:<font color="#ff0000">*</font></label> 
                                            <div class="col-sm-7">

                                                <select name="prodcut_id" id="prodcut_id" tabindex="4"    class="form-control" onchange="checkSponsorAvailability(this);">

                                                    {$products}




                                                </select> 
                                                <input type='hidden' value='yes' name='pro_status' class="form-control">

                                            </div>    
                                        </div>      


                                    {else}
                                        <input type='hidden' value='no' name='pro_status' class="form-control">
                                    {/if}

                                    <div class="form-group">

                                        <div class="col-sm-2 col-sm-offset-3">

                                            <button class="btn btn-blue next-step btn-block" tabindex="20" id="next_1" disabled="true">
                                                {$tran_next} <i class="fa fa-arrow-circle-right"></i>
                                            </button> 
                                        </div>
                                    </div>
                                </div> {*END STEP-1*}
                                <div id="step-2">
                                    <h2> {$tran_contact_info}   </h2>

                                    <hr>
                                    <div class="form-group">
                                        {if {$user_name_type}!="dynamic"}


                                            <label class="col-sm-3 control-label" for="user_name_entry">{$tran_user_name}:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-7">
                                                <input  type="text"  name="user_name_entry" id="user_name_entry"   autocomplete="Off" tabindex="6" {if $reg_count>0} value="{$regr['user_name_entry']}" {/if} class="form-control" onclick="disable_next2()"><span id="errormsg3"></span>  <span id="errmsg33"></span>

                                            </div>
                                        {/if}
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="full_name">{$tran_name}:<font color="#ff0000">*</font></label>
                                        <div class="col-sm-7">
                                            <input  type="text"   name="full_name" id="full_name"  autocomplete="Off"  class="form-control" tabindex="7" {if $reg_count>0} value="{$regr['full_name']}" {/if} >

                                        </div>
                                        {*                                        <div class="form-group">
                                        <div class="col-sm-7" id="full_name_div"  height="30" class="text" style="display:none;">
                                        </div>
                                        </div>*}
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="user_name">{$tran_password}:<font color="#ff0000">*</font></label>
                                        <div class="col-sm-7">
                                            <input  type="password"  name="pswd" id="pswd"   autocomplete="Off"  class="form-control" tabindex="8">

                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <label class=" col-sm-3 control-label" for="cpswd">{$tran_confirm_password}:<font color="#ff0000">*</font></label>
                                        <div class="col-sm-7">
                                            <input name="cpswd" id="cpswd" type="password" autocomplete="Off"  class="form-control" tabindex="9">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label" for="date_of_birth">{$tran_date_of_birth}:<font color="#ff0000">*</font> </label>

                                        <div class="col-sm-7 row">

                                            <p><div class="col-sm-4">
                                                <select name="year" id="year" onchange="change_year(this);" tabindex="10" class="form-control" >
                                                {if $reg_count>0}    <option selected="selected" value="{$regr['year']}">{$regr['year']}</option>{/if} 
                                                <option value="">{$tran_year}</option>
                                                {foreach from = $years  item=v}
                                                    <option value="{$v}">{$v}</option>
                                                {/foreach}
                                            </select></div>
                                        </p>
                                        <p>
                                        <div class="col-sm-4">
                                            <select name="month" id="month" onchange="change_month(this);" tabindex="11" class="form-control" onblur="day_month(this);">
                                            {if $reg_count>0} <option selected="selected" value="{$regr['month']}">{$regr['month']}</option>{/if} 

                                            <option value="">{$tran_month}</option>
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
                                        </select> </div></p><p>
                                    <div class="col-sm-4">
                                        <select name="day" id="day" onchange="change_day(this);" tabindex="12" class="form-control" >
                                        {if $reg_count>0} <option selected="selected" value="{$regr['day']}">{$regr['day']}</option>{/if} 
                                        <option value="">{$tran_day}</option>
                                        {foreach from = $month  item=v}
                                            <option value="{$v}">{$v}</option>
                                        {/foreach}
                                    </select></div></p>

                            </div>

                        </div>


                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="gender">{$tran_gender}:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
                                <select name="gender" id="gender"  class="form-control" tabindex="13">
                                    {if $reg_count> 0}
                                        {if $regr['gender']=='F'}
                                            <option  selected="selected" value="{$regr['gender']}">{$tran_female}</option>       <option value='M' >{$tran_male} </option>
                                        {else}
                                            <option  selected="selected" value="{$regr['gender']}">{$tran_male}</option> 
                                            <option value='F'>{$tran_female}</option>
                                        {/if}
                                    {else}
                                        <option value="">{$tran_select_gender}</option>

                                        <option value='M' >{$tran_male} </option>
                                        <option value='F'>{$tran_female}</option>
                                    {/if}   

                                </select>
                            </div>
                        </div> 
                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="address">{$tran_address}:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
                                <textarea rows="6" name="address" id="address" cols="22" tabindex="14"  class="form-control">{if $reg_count>0} {$regr['address']} {/if}</textarea>

                            </div>
                        </div>

                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="country">{$tran_country}:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
                                <select name="country" id="country" tabindex="15" onChange="getAllStates(this.value);" class="form-control" >

                                    <option value="" class="form-control">{$tran_select_country}</option>

                                    {$countries}

                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div  id="state_div" >

                            </div>
                        </div>              

                        {*<div class="form-group"  >
        
                        <div id="statediv1">
        
                        </div>
                        </div>   
        
                        <div class="form-group"  >
        
                        <div id="district_div">
        
                        </div>
                        </div>
        
                        <div class="form-group"   > 
        
                        <div id="locationdiv">
        
                        </div>
        
                        </div>  *}  

                        <input type="hidden" name="district_hid" id="district_hid" value="">
                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="pin">{$tran_pin_code}:</label>
                            <div class="col-sm-7">
                                <input  type="text"  name="pin" id="pin"   autocomplete="Off" class="form-control" tabindex="16"{if $reg_count >0} value="{$regr['pin']}" {/if} >
                                <span id="errmsg2"></span>
                            </div>
                        </div>


                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="mobile">{$tran_mob_no_10_digit}:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7 row">
                                <div class="col-sm-2">
                                    <input name="mobile_code" readonly="" id="mobile_code" type="text" autocomplete="Off" class="form-control" maxlength="10" tabindex="17" >
                                </div> 
                                <div class="col-sm-9">
                                    <input name="mobile" id="mobile" type="text" autocomplete="Off" class="form-control" tabindex="17" {if $reg_count>0} value="{$regr['mobile']}" {/if} >
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="land_line">{$tran_land_line_no}:</label>
                            <div class="col-sm-7">
                                <input name="land_line" id="land_line"  type="text" autocomplete="Off" class="form-control" tabindex="18" {if $reg_count>0} value="{$regr['land_line']}" {/if}>
                                <span id="errmsg4"></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="email">{$tran_email}:<font color="#ff0000">*</font></label>
                            <div class="col-sm-7">
                                <input name="email" id="email" type="text"  autocomplete="Off"  class="form-control" tabindex="19" {if $reg_count >0} value="{$regr['email']}" {/if}>

                            </div> 
                        </div>




                        <h3> {$tran_bank_info}</h3>
                        <hr> 
                        <div class="form-group">

                            <label class="col-sm-3 control-label">
                                {$tran_pan_no}:
                            </label>
                            <div class="col-sm-7">
                                <input class="form-control"  type="text" name="pan_no" id="pan_no" tabindex="22" {if $reg_count >0} value="{$regr['pan_no']}" {/if} placeholder="ABCDE1234Z">

                            </div>
                        </div>
                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="bank_acc_no">{$tran_bank_account_number}:</label>
                            <div class="col-sm-7">
                                <input  type="text"  name="bank_acc_no" id="bank_acc_no"  autocomplete="Off" class="form-control" tabindex="23" {if $reg_count >0} value="{$regr['bank_acc_no']}" {/if}>

                            </div>
                        </div>
                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="ifsc">{$tran_ifsc_code}:</label>
                            <div class="col-sm-7">
                                <input  type="text"  name="ifsc" id="ifsc" autocomplete="Off"  class="form-control" tabindex="24" {if $reg_count >0} value="{$regr['ifsc']}" {/if}>
                            </div>

                        </div>
                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="bank_name">{$tran_bank_name}:</label>
                            <div class="col-sm-7">
                                <input  type="text"  name="bank_name" id="bank_name"  autocomplete="Off"  class="form-control" tabindex="25" {if $reg_count >0} value="{$regr['bank_name']}" {/if}>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class=" col-sm-3 control-label" for="bank_branch">{$tran_branch_name}:</label>
                            <div class="col-sm-7">
                                <input  type="text"  name="bank_branch" id="bank_branch"  autocomplete="Off"  class="form-control" tabindex="26" {if $reg_count >0} value="{$regr['bank_branch']}" {/if}>
                            </div> 
                        </div>
                        <div class="modal fade" id="panel-config" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >
                                            &times;
                                        </button>
                                        <h4 class="modal-title">{$tran_terms_conditions}</h4>
                                    </div>
                                    <div class="modal-body">

                                        <table cellpadding="0" cellspacing="0" align="center">

                                            <tr>
                                                <td width="80%">
                                                    {$termsconditions}                                            </td>
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
                                        {$tran_I_ACCEPT_TERMS_AND_CONDITIONS}
                                    </a>
                                    <font color="#ff0000">*</font>

                                    <span id="agree1"></span>
                                </label>
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-3">
                                <button class="btn btn-dark-grey back-step btn-block"tabindex="29" style="margin-bottom: 10px;">
                                    <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                </button>
                            </div> 
                            <div class="col-sm-2 col-sm-offset-3">

                                <button class="btn btn-blue next-step btn-block" tabindex="30" id="next_2" {if {$user_name_type}!="dynamic"} disabled="true" {/if}>
                                    {$tran_next} <i class="fa fa-arrow-circle-right"></i>
                                </button> 
                            </div>
                        </div>

                    </div> {*END STEP-2*}

                    <div id="step-3">

                        <center> 
                            {if $product_status == "yes"}
                                <div class="row">
                                    <h2>{$tran_total_amount}:  
                                        <span style="font-family: monospace;height:15px; width:100px" class="total-title" id="total_product_amount">
                                        </span>
                                    </h2>
                                </div>
                            {/if}
                            {if $registration_amount>0}
                                <div class="row">
                                    <h2>{$tran_registration_amount}:   {$registration_amount}
                                        </span>
                                    </h2>
                                </div>
                            {/if} 

                        </center>
                        <h3></h3>
                        <h2 class="StepTitle">{$tran_reg_type}</h2>
                        <h3></h3>

                        {assign var=total value=''}

                        <div class="tabbable ">
                            <ul id="myTab3" class="nav nav-tabs tab-green">
                                {if $tab_inactive != 'yes'} 
                                    {if $credit_card_status == 'yes'} 
                                        <li class="active"  id="credit_card_tab">
                                            <a href="#panel_tab4_example1" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i>{$tran_credit_card}
                                            </a>
                                        </li>
                                    {/if}
                                    {if $payment_pin_status == "yes"}
                                        <li {if $payment_pin_status == "yes" && $credit_card_status == 'no'} class="active" {/if} id="epin_tab">
                                            <a href="#panel_tab4_example2" data-toggle="tab">
                                                <i class="blue fa fa-user"></i>{$tran_epin}
                                            </a>
                                        </li>
                                    {/if}
                                    {if $payment_ewallet_status== 'yes'}

                                        <li {if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'yes'} class="active" {/if}id="ewallet_tab">
                                            <a href="#panel_tab4_example3" data-toggle="tab">
                                                <i class="blue fa fa-user"></i>{$tran_ewallet}
                                            </a>
                                        </li>


                                    {/if}
                                    {if $paypal_status == 'yes'}
                                        <li {if $payment_pin_status == "no" && $paypal_status == 'yes' && $credit_card_status == 'no'&& $payment_ewallet_status== 'no'}  class="active" {/if}  id="paypal_tab">
                                            <a href="#panel_tab4_example4" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i>{$tran_paypal}
                                            </a>
                                        </li>
                                    {/if}
                                    {if $free_joining_status == 'yes'}
                                        <li  {if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $free_joining_status == 'yes' && $paypal_status == 'no'} class="active" {/if} id="free_join_tab">
                                            <a href="#panel_tab4_example5" data-toggle="tab">
                                                <i class="blue fa fa-user"></i>{$tran_free_join}
                                            </a>
                                        </li>
                                    {/if}
                                    {if $epdq_status == 'yes'}
                                        <li {if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $free_joining_status == 'no' && $paypal_status == 'no'} class="active" {/if} id="epdq_tab">
                                            <a href="#panel_tab4_example6" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i>{$tran_epdq}
                                            </a>
                                        </li>
                                    {/if}
                                    {if $authorize_status == 'yes'}
                                        <li {if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $free_joining_status == 'no' && $paypal_status == 'no' && $epdq_status == 'no'} class="active" {/if} id="authorize_tab">
                                            <a href="#panel_tab4_example7" data-toggle="tab">
                                                <i class="pink fa fa-dashboard"> </i>{$tran_authorize}
                                            </a>
                                        </li>
                                    {/if}


                                {else if}
                                    {if $free_joining_status == 'yes'}
                                        <li  class="active" id="free_join_tab">
                                            <a href="#panel_tab4_example5" data-toggle="tab">
                                                <i class="blue fa fa-user"></i>{$tran_free_join}
                                            </a>
                                        </li>
                                    {/if}
                                {/if}

                            </ul>

                            {assign var=actve_tab_val value=""}
                            {if $tab_inactive != 'yes'} 
                                {if $credit_card_status == 'yes'} 
                                    {assign var=actve_tab_val value="credit_card_tab"}

                                {else if $payment_pin_status == "yes" && $credit_card_status == 'no'}
                                    {assign var=actve_tab_val value="epin_tab"}

                                {else if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'yes'} 
                                    {assign var=actve_tab_val value="ewallet_tab"}
                                {else if $paypal_status == "yes" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $pin_status == "no"}
                                    {assign var=actve_tab_val value="paypal_tab"}
                                {else if  $authorize_status == 'yes' && $paypal_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $pin_status == "no"}
                                    {assign var=actve_tab_val value="authorize_tab"}
                                {else if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' &&$paypal_status == "no" && $free_joining_status == 'yes'  && $authorize_status == 'no'}
                                    {assign var=actve_tab_val value="free_join_tab"}
                                {else if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' &&$paypal_status == "no" && $free_joining_status == 'no'  && $authorize_status == 'no'&& $epdq_status == 'yes'}
                                    {assign var=actve_tab_val value="epdq_tab"}

                                {/if}
                            {else if $free_joining_status == 'yes'}
                                {assign var=actve_tab_val value="free_join_tab"}
                            {/if}
                            <div class="tab-content">
                                <input type="hidden" name="active_tab" id="active_tab" value="{$actve_tab_val}" >
                                {if $tab_inactive != 'yes'} 
                                    {if $credit_card_status == 'yes'} 

                                        <div class="tab-pane active"  id="panel_tab4_example1">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square">{$tran_credit_card}
                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <h3>  Card information </h3>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">
                                                                {$tran_card_number} <span class="symbol required"></span>
                                                            </label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" id="card_number" name="card_number" tabindex="29" >
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" for="credit_currency">{$tran_currency}</label>
                                                            <div class="col-sm-3">   


                                                                <select name="credit_currency" id="credit_currency" tabindex="30" class="form-control" >

                                                                    <option value="USD"> USD</option>
                                                                    <option value="GBP"> GBP</option>
                                                                    <option value="EUR"> EUR</option>

                                                                </select>


                                                            </div>
                                                        </div>
                                                        {*<div class="form-group">
    
                                                        <label class=" col-sm-3 control-label" for="total_amount">{$tran_amount}:<font color="#ff0000">*</font>
                                                        </label>
                                                        <div class="col-md-7">
                                                        <input tabindex="30" type="text" name="total_amount" id="total_amount" size="20"   autocomplete="Off"   class="form-control"/>  
                                                        <span id="ttlamount" style="display:none;"></span>
    
                                                        </div>
                                                        </div>
                                                        *}


                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="pay_type">{$tran_card_type}:<font color="#ff0000">*</font></label>

                                                            <div class="col-md-7">
                                                                <img src=" {$BASE_URL}/public_html/images/MasterCard-credit-card.jpg" class="crditcardimgs" /> 

                                                                <br>
                                                                <input type="radio" name="credit_card_type" id="credit_card_type1"  value="visa"  checked=""  tabindex="31"/>  <label for="credit_card_type">{$tran_visa}  &nbsp;</label>
                                                                <input type="radio" name="credit_card_type" id="credit_card_type2"    value="master_card" tabindex="32"/><label for="credit_card_type">{$tran_master_card}</label>            
                                                                <span id="pay_type" style="display:none;"></span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_cvn">{$tran_card_verification}:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input  type="text" name="card_cvn" id="card_cvn" size="20"  tabindex="33"  autocomplete="Off"   class="form-control"/> 
                                                                <img src="{$BASE_URL}public_html/images/cvn_info.png"   />
                                                                <span id="card_cvn" style="display:none;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="card_expiry_date" id="card_expiry_date" type="hidden" size="16" maxlength="10"   VALUE="" />
                                                            <label class=" col-sm-3 control-label" for="card_expiry_month">{$tran_expiry_date} :<font color="#ff0000">*</font> 
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <select name="card_expiry_year" id="card_expiry_year"   tabindex="34" onchange="expiry_year(this);" class="form-control" >
                                                                    <option value="">{$tran_year}</option>
                                                                    {foreach from = $exp_year  item=v}
                                                                        <option value="{$v}">{$v}</option>
                                                                    {/foreach}
                                                                </select> 
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select name="card_expiry_month" id="card_expiry_month"   tabindex="35" onchange="expiry_month(this);" class="form-control" >
                                                                    <option value="">{$tran_month}</option>
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


                                                        </div>
                                                        <h3>Account</h3>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="fore_name">{$tran_first_name}:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="36" type="text" name="bill_to_forename" id="bill_to_forename"   autocomplete="Off"   class="form-control"/> 

                                                                <span id="card_forename" style="display:none;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_forename">{$tran_last_name}:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="37" type="text" name="bill_to_surname" id="bill_to_surname" size="20"   autocomplete="Off"   class="form-control"/> 

                                                                <span id="card_surname" style="display:none;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_email">{$tran_email}:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="38" type="text" name="bill_to_email" id="bill_to_email" size="20"   autocomplete="Off"   class="form-control"/> 

                                                                <span id="card_email" style="display:none;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class=" col-sm-3 control-label" for="card_phone">{$tran_mobile_no}:<font color="#ff0000">*</font></label>


                                                            <div class="col-md-7">
                                                                <input tabindex="39" type="text"name="bill_to_phone" id="bill_to_phone"  size="20"   autocomplete="Off"   class="form-control"/> 

                                                                <span id="card_phone" style="display:none;"></span>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button tabindex="40" class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;">
                                                                <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button tabindex="40" class="btn btn-blue btn-block" name="credit_crd" id="credit_crd" onclick="validate_page();">
                                                                {$tran_finish} <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div> 

                                    {/if}


                                    {if $payment_pin_status == "yes"}

                                        <div class="tab-pane {if $payment_pin_status == "yes" && $credit_card_status == 'no'}  active {/if}"  id="panel_tab4_example2">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square">{$tran_epin}
                                                    </i>
                                                </div>


                                                <div class="panel-body">


                                                    <div class="col-md-12">

                                                        <div class="row">
                                                            <table class="table table-striped table-bordered table-hover table-full-width" id="p_scents">
                                                                <thead>
                                                                    <tr align="center">
                                                                        <th >{$tran_sl_no}</th>
                                                                        <th>  {$tran_epin} </th> 
                                                                        <th>  {$tran_epin_amount}  </th>
                                                                        <th>{$tran_remain_epin_amount}  </th> 
                                                                        <th>{$tran_req_epin_amount} </th> 
                                                                    </tr>

                                                                </thead> 
                                                                <tbody>
                                                                    <tr   align="center" >


                                                                        <td>1</td>  
                                                                        <td><div class="col-md-12">
                                                                                <p>
                                                                                    <input tabindex="41" type="text" name="epin1" id="epin1" size="20"   autocomplete="Off"   class="form-control"/>  
                                                                                    <span id="pin_box_1" style="display:none;"></span>
                                                                                </p>
                                                                            </div>
                                                                        </td> 
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

                                                            <table >
                                                                <thead> </thead>
                                                                <tbody>
                                                                    <tr align="center">

                                                                        {$tran_product_amount}:  <span style="font-family: monospace;height:15px; width:100px" class="total-title" id="total_product_amount">
                                                                </span>
                                                                </tr>
                                                                <tr>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-2">
                                                                        <label class="  control-label" for="tt">{$tran_total_amount}:<font color="#ff0000">*</font></label></div>
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
                                                        <div class="form-group"id="finButtn">
                                                            <div class="col-sm-2 backButtnValidation">
                                                                <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;">
                                                                    <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                                </button>
                                                            </div>



                                                            <div class="col-sm-2 col-sm-offset-8" id="validate_epin_div">
                                                                <input type="button" id ="pin_btn" name= "pin_btn" value = "{$tran_epin_val}" onclick="validate_epin();" tabindex="46" class="btn btn-bricky" style="margin-top: 9%;margin-left: 9%;"/> 
                                                            </div> 
                                                        </div>   
                                                    </div>
                                                </div>

                                            </div>  

                                        </div>

                                    {/if}

                                    {if $payment_ewallet_status== 'yes'}

                                        <div class="tab-pane {if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'yes'}  active {/if}"  id="panel_tab4_example3">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square">{$tran_ewallet}
                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <label class="col-sm-3 control-label" for="user_name_ewallet">{$tran_user_name}:<font color="#ff0000">*</font></label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" id="user_name_ewallet" name="user_name_ewallet" placeholder="{$tran_user_name}"  title="{$tran_user_name}" class="form-control"/>  
                                                                <span id="user_name_ewallet_box" style="display:none;"></span>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class="col-sm-3 control-label" for="tran_pass_ewallet">{$tran_transaction_password}:<font color="#ff0000">*</font></label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" id="tran_pass_ewallet" name="tran_pass_ewallet" placeholder="{$tran_transaction_password}"title="{$tran_transaction_password}" class="form-control"/>  
                                                                <span id="tran_pass_ewallet_box" style="display:none;"></span>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;">
                                                                <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="ewallet" id="ewallet" >
                                                                {$tran_finish} <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    {/if}


                                    {if $paypal_status == "yes"} 
                                        <div class="tab-pane {if $paypal_status == "yes" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $payment_pin_status == "no"}  active {/if}"  id="panel_tab4_example4">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square">{$tran_paypal}
                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="paypal" id="paypal" >
                                                                {$tran_next} <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 
                                    {/if}
                                    {if $free_joining_status == 'yes'}
                                        <div class="tab-pane {if $payment_pin_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $free_joining_status == 'yes' &&  $paypal_status == "no"}  active {/if}"  id="panel_tab4_example5">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square">{$tran_free_join}
                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;">
                                                                <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="free_join" id="free_join" >
                                                                {$tran_finish} <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> 
                                    {/if}
                                    {if $epdq_status == 'yes'}
                                        <div class="tab-pane {if $epdq_status == "yes" &&$paypal_status == "no" && $credit_card_status == 'no' && $payment_ewallet_status== 'no' && $payment_pin_status == "no"}  active {/if}"   id="panel_tab4_example6">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square">{$tran_epdq}
                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="epdq" id="epdq" >
                                                                {$tran_next} <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 

                                    {/if}
                                    {if $authorize_status == 'yes'}
                                        <div class="tab-pane"  id="panel_tab4_example7">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-external-link-square">{$tran_authorize}
                                                    </i>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-2 ">
                                                            <button class="btn btn-dark-grey back-step btn-block" style="margin-bottom: 10px;" >
                                                                <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-8">


                                                            <button class="btn btn-blue btn-block" name="authorize" id="authorize" >
                                                                {$tran_next} <i class="fa fa-arrow-circle-right"></i>
                                                            </button>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 

                                    {/if}
                                {else if}
                                    <div class="tab-pane {if $free_joining_status == 'yes'}  active {/if}"  id="panel_tab4_example5">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-external-link-square">{$tran_free_join}
                                                </i>
                                            </div>

                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-sm-2 ">
                                                        <button class="btn btn-dark-grey back-step btn-block"  style="margin-bottom: 10px;">
                                                            <i class="fa fa-circle-arrow-left"></i> {$tran_back}
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-2 col-sm-offset-8">


                                                        <button class="btn btn-blue btn-block" name="free_join" id="free_join" >
                                                            {$tran_finish} <i class="fa fa-arrow-circle-right"></i>
                                                        </button>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div> 
                                {/if}
                            </div>
                        </div>

                    </div>{*END STEP-3*}
                </div>{*<div id="wizard" class="swMain">*}

            </form>

        </div>


    </div>




</div>
</div>



{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}

<script>
                                                    jQuery(document).ready(function() {
                                                        Main.init();
                                                        //TableData.init();
                                                            FormWizard.init();
                                                        //DateTimePicker.init();
                                                    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
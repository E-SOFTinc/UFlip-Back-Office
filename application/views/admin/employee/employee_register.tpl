{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_You_must_enter_user_name}</span>        
    <span id="error_msg2">{$tran_you_must_enter_your_password}</span>        
    <span id="error_msg3">{$tran_You_must_enter_your_Password_again}</span>        
    <span id="error_msg4">{$tran_You_must_enter_your_email}</span>                  
    <span id="error_msg5">{$tran_You_must_enter_your_mobile_no}</span>
    <span id="error_msg">{$tran_you_must_enter_your_name}</span>
    <span id="error_msg6">{$tran_mail_id_format}</span>
    <span id="error_msg12">{$tran_Invalid_Username}</span>
    <span id="error_msg13">{$tran_checking_username_availability}</span>
    <span id="error_msg14">{$tran_username_validated}</span>
    <span id="error_msg15">{$tran_username_already_exists}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
</div> 

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_New_Employee_Registration}
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
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="user_register" id="user_register" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="full_name">{$tran_name}:<font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input  type="text"  name="full_name" id="full_name"   autocomplete="Off" tabindex="1">
                            

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ref_username">{$tran_user_name}:<font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input  type="text"   name="ref_username" id="ref_username" onblur="check_username_availability(this.value)" autocomplete="Off" tabindex="2">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pswd">{$tran_password}:<font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input  type="password"  name="pswd" id="pswd" tabindex="3"  autocomplete="Off" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="cpswd">{$tran_confirm_password}:<font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input name="cpswd" id="cpswd" type="password" tabindex="4" autocomplete="Off" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="address">{$tran_address}: </label>
                        <div class="col-sm-6">
                            <textarea rows="6" name="address" id="address" cols="22" tabindex="5" ></textarea>
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin">{$tran_pincode}:</label>
                        <div class="col-sm-6">
                            <input name="pin" id="pin" type="text" autocomplete="Off" tabindex="6">
                            <span id="errmsg4"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="mobile">{$tran_mob_no_10_digit}:<font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input name="mobile" id="mobile" type="text" maxlength="10" autocomplete="Off" tabindex="7">
                            <span id="username_box" style="display:none;"></span>
                            <span id="errmsg3"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="land_line">{$tran_land_line_no}:</label>
                        <div class="col-sm-6">
                            <input name="land_line" id="land_line" tabindex="8"  type="text" autocomplete="Off" >
                            <span id="errmsg5"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">{$tran_email}<font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input name="email" id="email" type="text"  autocomplete="Off" tabindex="9">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="date_of_birth">
                            {$tran_date_of_birth}:<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date_of_birth" id="date_of_birth" type="text" tabindex="10" size="20" maxlength="10"  value="" >
                                <label or="date_of_birth" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <p>
                                <button class="btn btn-bricky" name="register" id="register" value="{$tran_register_new_member}" tabindex="11">
                                    {$tran_register_new_member}
                                </button>
                            </p>
                        </div>
                        <div class="col-sm-2 col-sm-offset-1">
                            <p>
                                <button class="btn btn-bricky" name="reset" id="reset" type="reset" value="{$tran_reset}" tabindex="12">
                                    {$tran_reset}
                                </button>
                            </p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
                                jQuery(document).ready(function() {
                                    Main.init();
                                    DatePicker.init();

                                    ValidateUser.init();

                                });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
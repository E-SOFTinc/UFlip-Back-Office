{include file="admin/layout/header.tpl"  name=""}


<div class="main-login col-sm-4 col-sm-offset-4">
    <div class="logo">
        <img src="{$PUBLIC_URL}images/logos/{$site_info["logo"]}" />
    </div>
        <div class="box-login">
            <h3>{$tran_reset_password}</h3>
            <p>
            <mesasge>{include file="admin/layout/error_box.tpl" title="" name=""}</mesasge>
            </p>
            <div id="span_js_messages" style="display:none;">
                <span id="validate_msg15">{$tran_you_must_enter_password}</span>
                <span id="validate_msg18">{$tran_password_miss_match}</span>
                <span id="validate_msg16">{$tran_minimum_six_characters_required}</span>
                <span id="validate_msg17">{$tran_you_must_enter_your_password_again}</span>
                 
            </div>
            <form id="reset_password_form" name="reset_password_form" method="post" action="">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i>{$tran_errors_check}
                </div>
                <input type="hidden" id ="key" name="key" value="{$key}">
                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                         <!--   <label>{$tran_user_name}</label>-->
                            <input type="text" id="user_name" class="form-control" readonly name="user_name" value="{$user_name}" placeholder="{$tran_user_name}" tabindex="1" >
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                          <!--  <label>{$tran_new_password}</label>-->
                            <input type="password" class="form-control"  id="pass" name="pass" placeholder="{$tran_new_password}" tabindex="2" >
                        </span>
                    </div>

                    <div class="form-group">
                        <span class="input-icon">        
                           <!-- <label>{$tran_confirm_password}</label>-->
                            <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="{$tran_confirm_password}" tabindex="3" >
                        </span>
                         <div class="imgcaptcha">
                                        
                                 <div class="col-md-6 col-my" style="padding:0px; text-align:left;">  
								 <img src="{$BASE_URL}login/captcha/admin" id="captcha" /></div>
                                     <div class="col-md-6 col-my" style="padding:0px;">   <div class="Change-text">
                                     <a href="#" onclick="
                                                document.getElementById('captcha').src = '{$BASE_URL}login/captcha/admin/' + Math.random();
                                                document.getElementById('captcha-form').focus();"
                                                id="change-image" class="color">{$tran_not_readable}</a></div> 
											<div class="width-media">	
                                        <input tabindex="4"type="text" style="width:100%;" name="captcha" id="captcha-form" autocomplete="off" /><br/></div>
										</div>
                                    </div>
                    </div>
                                                <div class="form-actions"></div>
                    <div class="form-actions">

                        <input type="submit" id="reset_password_submit" class="btn btn-bricky pull-right" name="reset_password_submit" value="{$tran_reset_password}" tabindex="5" /> &nbsp;
                        <leftspan style="float:none"><a href="{$BASE_URL}" ><div class="btn btn-light-grey go-back">
                            <i class="fa fa-circle-arrow-left"></i>{$tran_back}
                            </div></a></leftspan>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
            ValidateUser.init();
        });
    </script>
</body>

{include file="admin/layout/login_footer.tpl" title="Example Smarty Page" name=""}
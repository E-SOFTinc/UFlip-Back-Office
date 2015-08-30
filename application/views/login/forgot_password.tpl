{include file="admin/layout/header.tpl"  name=""}
    <div class="main-login col-sm-4 col-sm-offset-4">
        <div class="logo">
            <img src="{$PUBLIC_URL}images/logos/{$site_info["logo"]}" />
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <h2>{$tran_forgot_password}</h2>
            <p>
            <mesasge>{include file="admin/layout/error_box.tpl" title="" name=""}</mesasge>
            </p>
            <div id="span_js_messages" style="display:none;">
                <span id="error_msg1">{$tran_invalid_user}</span>        
                <span id="error_msg2">{$tran_invalid_email}</span>        
            </div>

            <form class="login_form" id="forgot_password" name="forgot_password" method="post" onload="document.getElementById('captcha-form').focus()" >

                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i>{$tran_errors_check}
                </div>
                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control"  id="user_name" name="user_name" placeholder="{$tran_user_name}" AUTOCOMPLETE = "OFF" tabindex="1" >
                            <i class="fa fa-user"></i> </span><span class="help-block" for="user_name"></span>
                    </div>

                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control"  id="e_mail" name="e_mail" placeholder="{$tran_email}" AUTOCOMPLETE = "OFF" tabindex="2" >   
                            
                            
                            <div class="imgcaptcha">
                                        <div class="Change-text" style="text-align:right;font-size: 12px;white-space: nowrap;">
                                     <a href="#" onclick="
                                                document.getElementById('captcha').src = '{$BASE_URL}login/captcha/admin/' + Math.random();
                                                document.getElementById('captcha-form').focus();"
                                                id="change-image" class="color">{$tran_not_readable}</a></div>
                                 <div class="col-md-6 col-my" style="padding:0px; text-align:left;">  
								 <img src="{$BASE_URL}login/captcha/admin" id="captcha" /></div>
                                     <div class="col-md-6 col-my" style="padding:0px;">   
											<div class="width-media">	
                                        <input type="text" style="width:100%;" name="captcha" id="captcha-form" autocomplete="off" tabindex="3" /><br/></div>
										</div>
                                    </div>
                            
                            
                            
                            
                            
                            
                               </div>
                                                 <div class="form-actions">
                                                     </div>
                    <div class="form-actions">

                       
                        <input type="submit" class="btn btn-bricky pull-right" id="forgot_password_submit" name="forgot_password_submit" value="{$tran_send_request}" tabindex="4" >&nbsp;

                        <leftspan style="float:none"><a href="{$BASE_URL}" ><div class="btn btn-light-grey go-back">
                            <i class="fa fa-circle-arrow-left"></i> {$tran_back}
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

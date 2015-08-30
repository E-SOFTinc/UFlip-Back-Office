﻿{include file="admin/layout/header.tpl"  name=""}


<div class="main-login col-sm-4 col-sm-offset-4">
    <div class="logo">
        <!--<img src="{$PUBLIC_URL}images/logos/{$site_info["logo"]}" />-->
        <img class="img-responsive" src="{$PUBLIC_URL}images/logos/login-logo.png" />
    </div>
    <!-- start: LOGIN BOX -->
    <div class="box-login">
        <h3>{$tran_login_form}</h3>
        <p>
        <mesasge>{include file="admin/layout/error_box.tpl" title="" name=""}</mesasge>
        </p>

        <ul class="topoptions">
            <li class="dropdown language">
                <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                    {foreach from=$lang_arr item=v}
                        {if $LANG_ID == $v.lang_id}
                            <img src="{$PUBLIC_URL}images/flags/{$v.lang_code}.png" />
                        {/if}
                    {/foreach}
                    <span class="badge"></span>
                </a>
                <ul class="dropdown-menu posts">
                    {foreach from=$lang_arr item=v}
                        <li onclick="getSwitchLanguage('{$v.lang_code}');" >
                            <span class="dropdown-menu-title">
                                <img src="{$PUBLIC_URL}images/flags/{$v.lang_code}.png" /> {$v.lang_name}
                            </span>
                        </li>
                    {/foreach}
                </ul>
            </li>
        </ul>



        <form class="form-login" action="{$PATH_TO_ROOT_DOMAIN}login/verifylogin" id="login_form_admin" name="login_form_admin" method="post">
            <div class="errorHandler alert alert-danger no-display">
                <i class="fa fa-remove-sign"></i>{$tran_errors_check}
            </div>
            <fieldset>
                <div class="form-group">
                    <span class="input-icon">
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="{$tran_user_name}" value="{$url_user_name}" tabindex="1" />
                        <i class="fa fa-user"></i> </span>
                </div>
                <div class="form-group form-actions">
                    <span class="input-icon">                        
                        <input type="password" class="form-control password" name="password" placeholder="{$tran_password}" id="password" tabindex="2" />

                        <i class="fa fa-lock"></i>
                        <a class="forgot" href="{$PATH_TO_ROOT_DOMAIN}login/forgot_password">
                            {$tran_I_forgot_my_password}
                        </a> </span>
<input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
                    {if $CAPTCHA_STATUS=="yes"}                            
                        <br/><div class="imgcaptcha">

                            <div class="col-md-6 col-my" style="padding:0px; text-align:left;">  
                                <img src="{$BASE_URL}login/captcha/admin" id="captcha" /></div>
                            <div class="col-md-6 col-my" style="padding:0px;">   <div class="Change-text">
                                    <a href="#" onclick="
                                            document.getElementById('captcha').src = '{$BASE_URL}login/captcha/admin/' + Math.random();
                                            document.getElementById('captcha-form').focus();"
                                       id="change-image" class="color">{$tran_not_readable}</a></div> 
                                <div class="width-media">	
                                    <input tabindex="3" type="text" style="width:100%;" name="captcha" id="captcha-form" autocomplete="off" /><br/></div>
                            </div>
                        </div>
                        <i class="fa fa-lock"></i> 
                    {/if}

                </div>
                <div class="form-actions">
                    <label for="remember" class="checkbox-inline">
                        <input type="checkbox" class="grey remember" id="remember" name="remember"value="yes">
                        {$tran_Keep_me_signed_in}
                    </label>
                    <input type="submit" class="btn btn-bricky pull-right" value="{$tran_Login}"   tabindex="4" id="submit" name="submit" />
                    <!--    Login 
                    <i class="fa fa-arrow-circle-right"/></i>-->

                </div>
                <div class="new-account">
                    {$tran_Dont_have_an_account_yet}
                    <a href="{$BASE_URL}register/user_register" class="register">
                        {$tran_Create_an_account}
                    </a>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- end: LOGIN BOX -->

</div>


{include file="admin/layout/login_footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        //TableData.init();

        ValidateUser.init();

        //DateTimePicker.init();
        
       
    });
</script>

<script type="text/javascript">
    function getSwitchLanguage(lang) {
        var url = "";
        var base_url = $("#base_url_id").val();
        var current_url = $("#current_url").val();
        var current_url_full = $("#current_url_full").val();

        if (current_url != current_url_full) {
            url = current_url_full;
        } else {
            url = current_url;
        }
// alert("current_url: " + current_url + "==current_url_full:" + current_url_full);

        var redirect_url = base_url;

        redirect_url = base_url + lang + "/" + url;


        document.location.href = redirect_url;
    }
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
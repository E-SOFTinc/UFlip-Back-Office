{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_from_name}</span>
    <span id="validate_msg2">{$tran_you_must_enter_from_email}</span>
    <span id="validate_msg3">{$tran_you_must_enter_smtp_host}</span>
    <span id="validate_msg4">{$tran_you_must_enter_smtp_username}</span>
    <span id="validate_msg5">{$tran_you_must_enter_smtp_password}</span>
    <span id="validate_msg6">{$tran_you_must_enter_smtp_port}</span>
    <span id="validate_msg7">{$tran_you_must_enter_smtp_timeout}</span>
    <span id="validate_msg8">{$tran_select_mail_status}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_mail_settings}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="mail_settings" id="mail_settings" >
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from_name">{$tran_from_name}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="from_name" id ="from_name" value="{$mail_details['from_name']}" maxlength="" title="From Name" autocomplete="Off"tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from_email">{$tran_from_email}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="from_email" id ="from_email" value="{$mail_details['from_email']}" maxlength="" title="From Email" autocomplete="Off"tabindex="2">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                            
                    <!--<div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_host">{$tran_smtp_host}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_host" id ="smtp_host" value="{$mail_details['smtp_host']}" maxlength="" title="SMTP Host" autocomplete="Off"tabindex="3">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_username">{$tran_smtp_username}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_username" id ="smtp_username" value="{$mail_details['smtp_username']}" maxlength="" title="SMTP Username" autocomplete="Off"tabindex="4">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_password">{$tran_smtp_password}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_password" id ="smtp_password" value="{$mail_details['smtp_password']}" maxlength="" title="SMTP Password" autocomplete="Off"tabindex="5">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_port">{$tran_smtp_port}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_port" id ="smtp_port" value="{$mail_details['smtp_port']}" maxlength="" title="SMTP Port" autocomplete="Off"tabindex="6">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_timeout">{$tran_smtp_timeout}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_timeout" id ="smtp_timeout" value="{$mail_details['smtp_timeout']}" maxlength="" title="SMTP Timeout" autocomplete="Off"tabindex="7">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="reg_mail_status">{$tran_reg_mail_status}:</label>
                        <div class="col-sm-6">

                            <label class="radio-inline" for="status_yes"><input tabindex="3"   type="radio" name="reg_mail_status" id="reg_mail_status" value="yes" {if $mail_details["reg_mail_status"] == "yes"}checked {/if}/>
                                {$tran_yes}</label>
                            <label class="radio-inline"  for="status_no"><input tabindex="3"  type="radio"  name="reg_mail_status" id="reg_mail_status" value="no" {if $mail_details["reg_mail_status"] == "no"} checked {/if} />
                                {$tran_no}  </label>                            
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="reg_mail_content">
                            Mail Content English
                        </label>
                        <div class="col-sm-9">
                            <textarea id="reg_mail_content"  name="reg_mail_content" class="ckeditor form-control"  tabindex="2">
                               {$mail_details['reg_mail_content']} 
                            </textarea>
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="reg_mail_content_french">
                            Mail Content French
                        </label>
                        <div class="col-sm-9">
                            <textarea id="reg_mail_content"  name="reg_mail_content_french" class="ckeditor form-control"  tabindex="2">
                               {$french_mail_details['reg_mail_content']} 
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="4"   type="submit"  value="Update" name="update" id="update" > {$tran_update}</button>                                
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
        ValidateMailSettings.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  
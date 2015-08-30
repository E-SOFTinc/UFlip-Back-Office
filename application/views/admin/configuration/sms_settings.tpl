{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_sender_id}</span>
    <span id="validate_msg2">{$tran_you_must_enter_user_name}</span>
    <span id="validate_msg3">{$tran_you_must_enter_password}</span>

</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_sms_settings}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="sms_form" id="username_config_form" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="sender_id">{$tran_sender_id}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="sender_id" id ="sender_id" value="" tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                             <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">{$tran_user_name}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="user_name" id ="user_name" value="" tabindex="2">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                            <div class="form-group">
                        <label class="col-sm-2 control-label" for="password">{$tran_password}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="password" id ="password" value="" tabindex="3">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                            <div class="form-group">
                               <div class="col-sm-2 col-sm-offset-2">
                            <input  type="submit"  name ="sms_config" id ="sms_config" value="{$tran_submit}" tabindex="4">
                            <span id="username_box" style="display:none;"></span>
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
        ValidateSmsSettings.init();
    });
</script>


{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-10 02:34:40
         compiled from "application/views/admin/configuration/mail_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119984341355bc92cbe2ec90-92176006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5359841300517e152859adc13d1454c35d69914d' => 
    array (
      0 => 'application/views/admin/configuration/mail_settings.tpl',
      1 => 1438930614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119984341355bc92cbe2ec90-92176006',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bc92cbeea14',
  'variables' => 
  array (
    'tran_you_must_enter_from_name' => 0,
    'tran_you_must_enter_from_email' => 0,
    'tran_you_must_enter_smtp_host' => 0,
    'tran_you_must_enter_smtp_username' => 0,
    'tran_you_must_enter_smtp_password' => 0,
    'tran_you_must_enter_smtp_port' => 0,
    'tran_you_must_enter_smtp_timeout' => 0,
    'tran_select_mail_status' => 0,
    'tran_mail_settings' => 0,
    'tran_from_name' => 0,
    'mail_details' => 0,
    'tran_from_email' => 0,
    'tran_smtp_host' => 0,
    'tran_smtp_username' => 0,
    'tran_smtp_password' => 0,
    'tran_smtp_port' => 0,
    'tran_smtp_timeout' => 0,
    'tran_reg_mail_status' => 0,
    'tran_yes' => 0,
    'tran_no' => 0,
    'french_mail_details' => 0,
    'tran_update' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bc92cbeea14')) {function content_55bc92cbeea14($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_from_name']->value;?>
</span>
    <span id="validate_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_from_email']->value;?>
</span>
    <span id="validate_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_smtp_host']->value;?>
</span>
    <span id="validate_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_smtp_username']->value;?>
</span>
    <span id="validate_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_smtp_password']->value;?>
</span>
    <span id="validate_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_smtp_port']->value;?>
</span>
    <span id="validate_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_smtp_timeout']->value;?>
</span>
    <span id="validate_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_select_mail_status']->value;?>
</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_mail_settings']->value;?>

            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="mail_settings" id="mail_settings" >
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from_name"><?php echo $_smarty_tpl->tpl_vars['tran_from_name']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="from_name" id ="from_name" value="<?php echo $_smarty_tpl->tpl_vars['mail_details']->value['from_name'];?>
" maxlength="" title="From Name" autocomplete="Off"tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from_email"><?php echo $_smarty_tpl->tpl_vars['tran_from_email']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="from_email" id ="from_email" value="<?php echo $_smarty_tpl->tpl_vars['mail_details']->value['from_email'];?>
" maxlength="" title="From Email" autocomplete="Off"tabindex="2">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                            
                    <!--<div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_host"><?php echo $_smarty_tpl->tpl_vars['tran_smtp_host']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_host" id ="smtp_host" value="<?php echo $_smarty_tpl->tpl_vars['mail_details']->value['smtp_host'];?>
" maxlength="" title="SMTP Host" autocomplete="Off"tabindex="3">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_username"><?php echo $_smarty_tpl->tpl_vars['tran_smtp_username']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_username" id ="smtp_username" value="<?php echo $_smarty_tpl->tpl_vars['mail_details']->value['smtp_username'];?>
" maxlength="" title="SMTP Username" autocomplete="Off"tabindex="4">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_password"><?php echo $_smarty_tpl->tpl_vars['tran_smtp_password']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_password" id ="smtp_password" value="<?php echo $_smarty_tpl->tpl_vars['mail_details']->value['smtp_password'];?>
" maxlength="" title="SMTP Password" autocomplete="Off"tabindex="5">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_port"><?php echo $_smarty_tpl->tpl_vars['tran_smtp_port']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_port" id ="smtp_port" value="<?php echo $_smarty_tpl->tpl_vars['mail_details']->value['smtp_port'];?>
" maxlength="" title="SMTP Port" autocomplete="Off"tabindex="6">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="smtp_timeout"><?php echo $_smarty_tpl->tpl_vars['tran_smtp_timeout']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="smtp_timeout" id ="smtp_timeout" value="<?php echo $_smarty_tpl->tpl_vars['mail_details']->value['smtp_timeout'];?>
" maxlength="" title="SMTP Timeout" autocomplete="Off"tabindex="7">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="reg_mail_status"><?php echo $_smarty_tpl->tpl_vars['tran_reg_mail_status']->value;?>
:</label>
                        <div class="col-sm-6">

                            <label class="radio-inline" for="status_yes"><input tabindex="3"   type="radio" name="reg_mail_status" id="reg_mail_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['mail_details']->value["reg_mail_status"]=="yes"){?>checked <?php }?>/>
                                <?php echo $_smarty_tpl->tpl_vars['tran_yes']->value;?>
</label>
                            <label class="radio-inline"  for="status_no"><input tabindex="3"  type="radio"  name="reg_mail_status" id="reg_mail_status" value="no" <?php if ($_smarty_tpl->tpl_vars['mail_details']->value["reg_mail_status"]=="no"){?> checked <?php }?> />
                                <?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
  </label>                            
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="reg_mail_content">
                            Mail Content English
                        </label>
                        <div class="col-sm-9">
                            <textarea id="reg_mail_content"  name="reg_mail_content" class="ckeditor form-control"  tabindex="2">
                               <?php echo $_smarty_tpl->tpl_vars['mail_details']->value['reg_mail_content'];?>
 
                            </textarea>
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="reg_mail_content_french">
                            Mail Content French
                        </label>
                        <div class="col-sm-9">
                            <textarea id="reg_mail_content"  name="reg_mail_content_french" class="ckeditor form-control"  tabindex="2">
                               <?php echo $_smarty_tpl->tpl_vars['french_mail_details']->value['reg_mail_content'];?>
 
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="4"   type="submit"  value="Update" name="update" id="update" > <?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>                                
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateMailSettings.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
  <?php }} ?>
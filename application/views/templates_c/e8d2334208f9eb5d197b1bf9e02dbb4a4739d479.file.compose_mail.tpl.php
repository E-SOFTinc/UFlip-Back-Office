<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 07:50:27
         compiled from "application/views/admin/mail/compose_mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82608608955bb6f136eeab0-64091030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8d2334208f9eb5d197b1bf9e02dbb4a4739d479' => 
    array (
      0 => 'application/views/admin/mail/compose_mail.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82608608955bb6f136eeab0-64091030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_compose_mail' => 0,
    'tran_errors_check' => 0,
    'tran_Send_Mail_To' => 0,
    'tran_All_Users' => 0,
    'tran_Single_User' => 0,
    'tran_subject' => 0,
    'tran_user_message' => 0,
    'tran_sendmessage' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb6f1373513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb6f1373513')) {function content_55bb6f1373513($_smarty_tpl) {?><div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_compose_mail']->value;?>

    </div>
    <div class="panel-body">
        <form role="form" class="smart-wizard form-horizontal"  id="compose" name="compose" method="post" action="../mail/compose_mail">
            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="status_all"><?php echo $_smarty_tpl->tpl_vars['tran_Send_Mail_To']->value;?>
<span class="symbol required"></span></label>
                <div class="col-sm-3">
                    <input tabindex="1" type="radio" id="status_all" name="mail_status" value="all" onclick="hid_text()" checked='1' />
                    <label for="status_all"></label> <?php echo $_smarty_tpl->tpl_vars['tran_All_Users']->value;?>

                </div>
                <div class="col-sm-3">
                    <input tabindex="1" type="radio" name="mail_status" id="status_mul" value="multiple"   onclick="show_text()"/>
                    <label for="status_mul"></label> <?php echo $_smarty_tpl->tpl_vars['tran_Single_User']->value;?>

                </div>

            </div>
            <div class="form-group" id="user_div"  style="display:none;" >

            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="subject"><?php echo $_smarty_tpl->tpl_vars['tran_subject']->value;?>
<span class="symbol required"></span> </label>
                <div class="col-sm-3">
                    <input tabindex="2" name="subject" type="text" id="subject" size="35"   />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="message1"><?php echo $_smarty_tpl->tpl_vars['tran_user_message']->value;?>
<span class="symbol required"></span></label>
                <div class="col-sm-3">
                    <textarea tabindex="3" name='message1' id='message1' rows='20' cols='35'></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    
                    <button class="btn btn-bricky" type="submit" name="adminsend"  id="adminsend" value="<?php echo $_smarty_tpl->tpl_vars['tran_sendmessage']->value;?>
" tabindex="4"><?php echo $_smarty_tpl->tpl_vars['tran_sendmessage']->value;?>
</button>
                    

                </div>
            </div>
            <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
        </form>
    </div>
</div>
<?php }} ?>
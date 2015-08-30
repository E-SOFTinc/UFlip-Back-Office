<?php /* Smarty version Smarty 3.1.4, created on 2015-08-03 05:03:56
         compiled from "application/views/user/mail/compose_mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104984671755bf3c8c6a6d82-90453188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2077012ab2f6fcc8d3a7e35b8fd87188464737ed' => 
    array (
      0 => 'application/views/user/mail/compose_mail.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104984671755bf3c8c6a6d82-90453188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_compose_mail' => 0,
    'tran_errors_check' => 0,
    'tran_subject' => 0,
    'tran_messagetoadmin' => 0,
    'tran_sendmessage' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bf3c8c6d379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf3c8c6d379')) {function content_55bf3c8c6d379($_smarty_tpl) {?>

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
                <?php echo $_smarty_tpl->tpl_vars['tran_compose_mail']->value;?>
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  name="compose" id="compose" method="post" action="" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="subject"><?php echo $_smarty_tpl->tpl_vars['tran_subject']->value;?>
 : <font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <input tabindex="1" name="subject" type="text" id="subject" size="35"   />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="message"><?php echo $_smarty_tpl->tpl_vars['tran_messagetoadmin']->value;?>
 : <font color="#ff0000">*</font></label>
                        <div class="col-sm-3">
                            <textarea tabindex="2" name='message' id='message' rows='20' cols='35'></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky" type="submit"id="usersend" value="<?php echo $_smarty_tpl->tpl_vars['tran_sendmessage']->value;?>
" name="usersend" tabindex="3"><?php echo $_smarty_tpl->tpl_vars['tran_sendmessage']->value;?>
</button>


                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                </form>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
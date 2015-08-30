<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 03:48:33
         compiled from "application/views/user/tran_pass/change_passcode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180754332755c5c2618ad368-35405289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0556b12f704d616e4156bd463c8c31733b1fbe5a' => 
    array (
      0 => 'application/views/user/tran_pass/change_passcode.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180754332755c5c2618ad368-35405289',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_current_transaction_password' => 0,
    'tran_you_must_enter_new_transaction_password' => 0,
    'tran_transaction_password_length_should_be_more_than_8' => 0,
    'tran_reenter_new_transaction_password' => 0,
    'tran_new_transaction_password_mismatch' => 0,
    'tran_you_must_select_a_username' => 0,
    'tran_change_transaction_password' => 0,
    'tran_errors_check' => 0,
    'tran_current_transaction_password' => 0,
    'tran_new_transaction_password' => 0,
    'tran_update' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c5c26193689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c5c26193689')) {function content_55c5c26193689($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_current_transaction_password']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_new_transaction_password']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_transaction_password_length_should_be_more_than_8']->value;?>
</span>
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_reenter_new_transaction_password']->value;?>
</span>                     
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_new_transaction_password_mismatch']->value;?>
</span>        
    <span id="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_username']->value;?>
</span>
</div>	

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_change_transaction_password']->value;?>
 
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
           
                        <form role="form" class="smart-wizard form-horizontal" name="change_pass" id="change_pass" action="" method="post"  >	 
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_change_transaction_password']->value;?>

                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="old_passcode"><?php echo $_smarty_tpl->tpl_vars['tran_current_transaction_password']->value;?>
<font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="old_passcode" id="old_passcode" tabindex="1" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="new_passcode"><?php echo $_smarty_tpl->tpl_vars['tran_new_transaction_password']->value;?>
<font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="new_passcode" id="new_passcode" tabindex="2" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="re_new_passcode"><?php echo $_smarty_tpl->tpl_vars['tran_reenter_new_transaction_password']->value;?>
<font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="re_new_passcode" id="re_new_passcode" tabindex="3" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-2">                           


                                            <button class="btn btn-bricky" type="submit" name="change"  id="change"  tabindex="4" value="change"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                        </form>




                    </div>
                 
                </div>
            </div>
     
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<script>
    jQuery(document).ready(function() {
    Main.init();   
    ValidateUser.init();
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
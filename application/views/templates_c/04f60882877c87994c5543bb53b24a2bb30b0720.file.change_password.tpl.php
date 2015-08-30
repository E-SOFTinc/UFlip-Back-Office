<?php /* Smarty version Smarty 3.1.4, created on 2015-08-05 05:50:44
         compiled from "application/views/user/password/change_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214326786455c1ea846fee58-60172904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04f60882877c87994c5543bb53b24a2bb30b0720' => 
    array (
      0 => 'application/views/user/password/change_password.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214326786455c1ea846fee58-60172904',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_your_current_password' => 0,
    'tran_the_password_length_should_be_greater_than_6' => 0,
    'tran_password_mismatch' => 0,
    'tran_special_chars_not_allowed' => 0,
    'tran_change_password' => 0,
    'tran_errors_check' => 0,
    'tran_current_password' => 0,
    'tran_new_password' => 0,
    'tran_confirm_password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c1ea847bda7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c1ea847bda7')) {function content_55c1ea847bda7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_current_password']->value;?>
</span>        

    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_the_password_length_should_be_greater_than_6']->value;?>
</span>        
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_password_mismatch']->value;?>
</span>  
    <span id="error_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_special_chars_not_allowed']->value;?>
</span>

</div>      



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
                <?php echo $_smarty_tpl->tpl_vars['tran_change_password']->value;?>

            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" id="change_pass_admin" name="change_pass_admin"  method="post" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="current_pwd_admin"><?php echo $_smarty_tpl->tpl_vars['tran_current_password']->value;?>
 : <font color="#ff0000">*</font></label>
                        <div class="col-sm-3">
                            <input name="current_pwd_admin" type="password" id="current_pwd_admin" tabindex="1" autocomplete="Off" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="new_pwd_admin"><?php echo $_smarty_tpl->tpl_vars['tran_new_password']->value;?>
  : <font color="#ff0000">*</font></label>
                        <div class="col-sm-3">
                            <input name="new_pwd_admin" type="password" id="new_pwd_admin" size="20"  autocomplete="Off" tabindex="2" />
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="confirm_pwd_common"><?php echo $_smarty_tpl->tpl_vars['tran_confirm_password']->value;?>
  : <font color="#ff0000">*</font></label>
                        <div class="col-sm-3">
                            <input name="confirm_pwd_admin" type="password" id="confirm_pwd_admin" size="20"  autocomplete="Off" tabindex="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">


                            <button class="btn btn-bricky" type="submit" name="change_pass_button_admin"  id="change_pass_button_admins" value="<?php echo $_smarty_tpl->tpl_vars['tran_change_password']->value;?>
" tabindex="4"><?php echo $_smarty_tpl->tpl_vars['tran_change_password']->value;?>
</button>
                        </div>
                    </div>

                </form>



            </div>

        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>


<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidatePassword.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }} ?>
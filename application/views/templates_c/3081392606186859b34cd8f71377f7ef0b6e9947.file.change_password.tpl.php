<?php /* Smarty version Smarty 3.1.4, created on 2015-08-01 10:33:03
         compiled from "application/views/admin/password/change_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190414471055bce6af530ed9-53619650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3081392606186859b34cd8f71377f7ef0b6e9947' => 
    array (
      0 => 'application/views/admin/password/change_password.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190414471055bce6af530ed9-53619650',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_your_current_password' => 0,
    'tran_the_password_length_should_be_greater_than_6' => 0,
    'tran_password_mismatch' => 0,
    'tran_you_must_enter_your_new_password_again' => 0,
    'tran_you_must_enter_your_new_password' => 0,
    'tran_you_must_enter_your_confirm_password' => 0,
    'tran_special_chars_not_allowed' => 0,
    'tran_change_password' => 0,
    'user_type' => 0,
    'tab1' => 0,
    'tran_change_admin_password' => 0,
    'tab2' => 0,
    'tran_change_user_password' => 0,
    'tran_errors_check' => 0,
    'tran_current_password' => 0,
    'tran_new_password' => 0,
    'tran_confirm_password' => 0,
    'BASE_URL' => 0,
    'PUBLIC_URL' => 0,
    'tran_user_name' => 0,
    'tran_you_must_enter_new_password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bce6af63530',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bce6af63530')) {function content_55bce6af63530($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_current_password']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_the_password_length_should_be_greater_than_6']->value;?>
</span>        
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_password_mismatch']->value;?>
</span>  
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_new_password_again']->value;?>
</span>     
    <span id="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_new_password']->value;?>
</span>                  
    <span id="error_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_confirm_password']->value;?>
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


                <div class="tabbable ">
                    <ul id="myTab3" class="nav nav-tabs tab-green">
                        <?php if ($_smarty_tpl->tpl_vars['user_type']->value!='employee'){?>
                        <li class="<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
">
                            <a href="#panel_tab4_example1" data-toggle="tab">
                                <i class="pink fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['tran_change_admin_password']->value;?>

                            </a>
                        </li>
                        <?php }?>
                        <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                            <a href="#panel_tab4_example2" data-toggle="tab">
                                <i class="blue fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['tran_change_user_password']->value;?>

                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <?php if ($_smarty_tpl->tpl_vars['user_type']->value!='employee'){?>
                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
" id="panel_tab4_example1">

                            <form role="form" class="smart-wizard form-horizontal" id="change_pass_admin" name="change_pass_admin" method="post" >
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_change_admin_password']->value;?>

                                    </div>  
                                    <br/>
                                    <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label class="col-sm-2 control-label" for="current_pwd_admin"><?php echo $_smarty_tpl->tpl_vars['tran_current_password']->value;?>
<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input name="current_pwd_admin" type="password" id="current_pwd_admin" size="20"  autocomplete="Off" tabindex="1" />

                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="new_pwd_admin"><?php echo $_smarty_tpl->tpl_vars['tran_new_password']->value;?>
  <font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input name="new_pwd_admin" type="password" id="new_pwd_admin" size="20"  autocomplete="Off" tabindex="2" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="confirm_pwd_admin"><?php echo $_smarty_tpl->tpl_vars['tran_confirm_password']->value;?>
   <font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input name="confirm_pwd_admin" type="password" id="confirm_pwd_admin" size="20"  autocomplete="Off" tabindex="3" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">

                                                <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/">
                                                <button class="btn btn-bricky" type="submit" name="change_pass_button_admin"  id="change_pass_button_admin" value="<?php echo $_smarty_tpl->tpl_vars['tran_change_admin_password']->value;?>
"  tabindex="4"><?php echo $_smarty_tpl->tpl_vars['tran_change_admin_password']->value;?>
</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                            </form>
                        </div>
                       <?php }?>
                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
" id="panel_tab4_example2">

                            <form role="form" class="smart-wizard form-horizontal" id="change_pass_common" name="change_pass_common" method="post" >
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_change_user_password']->value;?>

                                    </div>  
                                    <br/>
                                    <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label class="col-sm-2 control-label" for="user_name_common"><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
  <font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input type="text" id="user_name_common" name="user_name_common" value="" onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" tabindex="5" autocomplete="Off" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="new_pwd_common"><?php echo $_smarty_tpl->tpl_vars['tran_new_password']->value;?>
<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input name="new_pwd_common" type="password" id="new_pwd_common" size="20"  autocomplete="Off" tabindex="6" />
                                            </div>
                                            <div style="display:none;">
                                                <span id='span_new_pwd_common'>
                                                    <?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_new_password']->value;?>

                                                </span>
                                                <span id='span_new_pwd_gt'>
                                                    <?php echo $_smarty_tpl->tpl_vars['tran_the_password_length_should_be_greater_than_6']->value;?>

                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="confirm_pwd_common"><?php echo $_smarty_tpl->tpl_vars['tran_confirm_password']->value;?>
   <font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input name="confirm_pwd_common" type="password" id="confirm_pwd_common" size="20"  autocomplete="Off" tabindex="7" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">

                                                <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/">                                       

                                                <button class="btn btn-bricky" type="submit" name="change_pass_button_common"  id="change_pass_button_common" value="<?php echo $_smarty_tpl->tpl_vars['tran_change_user_password']->value;?>
" tabindex="8"><?php echo $_smarty_tpl->tpl_vars['tran_change_user_password']->value;?>
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
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
                                                    jQuery(document).ready(function() {
                                                        Main.init();
                                                        ValidatePassword.init();
                                                    });


</script>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
  

<?php }} ?>
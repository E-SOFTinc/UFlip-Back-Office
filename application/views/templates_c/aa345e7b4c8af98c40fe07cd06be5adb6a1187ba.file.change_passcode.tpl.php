<?php /* Smarty version Smarty 3.1.4, created on 2015-08-06 06:48:18
         compiled from "application/views/admin/tran_pass/change_passcode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67840244155c34982651223-57552431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa345e7b4c8af98c40fe07cd06be5adb6a1187ba' => 
    array (
      0 => 'application/views/admin/tran_pass/change_passcode.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67840244155c34982651223-57552431',
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
    'user_type' => 0,
    'tab1' => 0,
    'tab2' => 0,
    'tran_change_user_transaction_password' => 0,
    'tran_errors_check' => 0,
    'tran_current_transaction_password' => 0,
    'tran_new_transaction_password' => 0,
    'tran_update' => 0,
    'PUBLIC_URL' => 0,
    'tran_select_user_name' => 0,
    'tran_new_password' => 0,
    'tran_reenter_new_password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c3498274b90',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c3498274b90')) {function content_55c3498274b90($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


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
            <div class="tabbable ">
                <ul id="myTab3" class="nav nav-tabs tab-green">
                    <?php if ($_smarty_tpl->tpl_vars['user_type']->value!='employee'){?>
                    <li class="<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
">
                        <a href="#panel_tab4_example1" data-toggle="tab">
                            <i class="pink fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['tran_change_transaction_password']->value;?>

                        </a>
                    </li>
                    <?php }?>
                    <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                        <a href="#panel_tab4_example2" data-toggle="tab">
                            <i class="blue fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['tran_change_user_transaction_password']->value;?>

                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <?php if ($_smarty_tpl->tpl_vars['user_type']->value!='employee'){?>
                    <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
" id="panel_tab4_example1">
                        <p>

                        <form role="form" class="smart-wizard form-horizontal" name="change_pass" id="change_pass" action="" method="post"  >	 
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i>
									
									
									
<span class="visible-md visible-lg hidden-sm hidden-xs">
<?php echo $_smarty_tpl->tpl_vars['tran_change_transaction_password']->value;?>

</span>

<span class="visible-xs visible-sm hidden-md hidden-lg">
Change transact. pass
</span>

                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="old_passcode"><?php echo $_smarty_tpl->tpl_vars['tran_current_transaction_password']->value;?>
<font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="old_passcode" id="old_passcode" tabindex="1" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="new_passcode"><?php echo $_smarty_tpl->tpl_vars['tran_new_transaction_password']->value;?>
<font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="new_passcode" id="new_passcode" tabindex="2" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="re_new_passcode"><?php echo $_smarty_tpl->tpl_vars['tran_reenter_new_transaction_password']->value;?>
<font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="re_new_passcode" id="re_new_passcode" tabindex="3" maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-4">                           


                                            <button class="btn btn-bricky" type="submit" name="change_tran"  value="change_tran" id="change"  tabindex="4"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                        </form>



                        </p>

                    </div>
                        <?php }?>
                    <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
" id="panel_tab4_example2">
                        <p>
                        <form role="form" class="smart-wizard form-horizontal"  name="change_pass_user" id="change_pass_user" method="post"   ><div class="panel panel-default">
                        <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                                        </div>
                                    </div>
                               
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_change_user_transaction_password']->value;?>

                                    </div>  
                                    <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
<font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this,'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="5" >   </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="new_passcode_user"><?php echo $_smarty_tpl->tpl_vars['tran_new_password']->value;?>
 <font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="new_passcode_user" id="new_passcode_user" maxlength="10" tabindex="6" />  </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="re_new_passcode_user"><?php echo $_smarty_tpl->tpl_vars['tran_reenter_new_password']->value;?>
 <font color="#ff0000">*</font> </label>
                                        <div class="col-sm-3">                           
                                            <input type="password" name="re_new_passcode_user" id="re_new_passcode_user" tabindex="7" maxlength="10" />  </div>
                                    </div>
                                        
                                        
                                        
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-2">                           

                                            <button class="btn btn-bricky" type="submit" name="change_user"  id="change_user"  tabindex="8" value="change_user" ><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>	

                        </p>

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
    ValidateUser.init();
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }} ?>
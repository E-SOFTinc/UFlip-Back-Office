<?php /* Smarty version Smarty 3.1.4, created on 2015-08-04 02:19:48
         compiled from "application/views/admin/profile/change_username.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16501507555c067945ee0e4-78295731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87a7e8167636f19de64c3b998d4e3532f2a13051' => 
    array (
      0 => 'application/views/admin/profile/change_username.tpl',
      1 => 1438336661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16501507555c067945ee0e4-78295731',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_You_must_enter_user_name' => 0,
    'tran_you_must_enter_new_username' => 0,
    'tran_special_chars_not_allowed' => 0,
    'tran_minimum_three_characters_required' => 0,
    'tran_change_username' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_id' => 0,
    'tran_type_members_name' => 0,
    'tran_new_username' => 0,
    'tran_type_new_username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c0679465b8f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c0679465b8f')) {function content_55c0679465b8f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<!-- start: PAGE HEADER -->

<!-- end: PAGE HEADER -->

<!-- start: PAGE CONTENT -->

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_user_name']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_new_username']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_special_chars_not_allowed']->value;?>
</span>
    <span id="error_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_special_chars_not_allowed']->value;?>
</span>
    <span id="error_msg9"><?php echo $_smarty_tpl->tpl_vars['tran_minimum_three_characters_required']->value;?>
</span>
</div>	

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_change_username']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" onSubmit="return validate_username()">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_id']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <input placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_type_members_name']->value;?>
" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1">
                        </div>
                    </div>
                          <div class="form-group">
                          <label class="col-sm-2 control-label" for="new_username"><?php echo $_smarty_tpl->tpl_vars['tran_new_username']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <input placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_type_new_username']->value;?>
" class="form-control" type="text" id="new_username" name="new_username" autocomplete="Off" tabindex="2" >

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            
                            <button class="btn btn-bricky" type="submit" id="change_username" value="change_username" name="change_username" tabindex="2">
                                <?php echo $_smarty_tpl->tpl_vars['tran_change_username']->value;?>

                            </button>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end: PAGE CONTENT -->
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
    Main.init();
    ValidateUser.init();
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }} ?>
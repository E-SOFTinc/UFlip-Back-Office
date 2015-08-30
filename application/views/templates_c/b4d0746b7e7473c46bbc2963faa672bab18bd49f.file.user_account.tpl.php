<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:36:54
         compiled from "application/views/admin/profile/user_account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173643086955bba426cfb4c5-06639296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4d0746b7e7473c46bbc2963faa672bab18bd49f' => 
    array (
      0 => 'application/views/admin/profile/user_account.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173643086955bba426cfb4c5-06639296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_user_name' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'posted' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba426d4cc5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba426d4cc5')) {function content_55bba426d4cc5($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_user_name']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("admin/profile/user_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['posted']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/profile/user_summary_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
                                        jQuery(document).ready(function() {
                                            Main.init();
                                            //TableData.init();
                                            ValidateUser.init();
                                        });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
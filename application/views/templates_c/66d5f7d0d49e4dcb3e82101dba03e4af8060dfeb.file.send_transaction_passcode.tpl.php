<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 03:44:18
         compiled from "application/views/user/tran_pass/send_transaction_passcode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204852955755c5c16223e502-95632473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66d5f7d0d49e4dcb3e82101dba03e4af8060dfeb' => 
    array (
      0 => 'application/views/user/tran_pass/send_transaction_passcode.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204852955755c5c16223e502-95632473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_select_user_name' => 0,
    'tran_send_transaction_password' => 0,
    'tran_errors_check' => 0,
    'tran_send_password' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c5c1622a8b8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c5c1622a8b8')) {function content_55c5c1622a8b8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_user_name']->value;?>
</span>
    </div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_send_transaction_password']->value;?>
 
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
                <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
                    <div class="form-group">
                         <div class="col-sm-2 col-sm-offset-2">
                        <label class="col-sm-2 control-label" for="sent_passcode"><button class="btn btn-bricky" type="submit" name="sent_passcode" id="sent_passcode" value="<?php echo $_smarty_tpl->tpl_vars['tran_send_password']->value;?>
" tabindex="2">
                                <?php echo $_smarty_tpl->tpl_vars['tran_send_password']->value;?>

                            </button></label>
                        
                         </div>
                            <input type="hidden" id="path_root" name="path_root" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/">
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
    ValidateUser.init();
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
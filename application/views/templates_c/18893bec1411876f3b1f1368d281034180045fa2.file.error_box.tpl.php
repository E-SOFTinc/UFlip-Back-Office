<?php /* Smarty version Smarty 3.1.4, created on 2015-08-02 23:03:01
         compiled from "application/views/user/layout/error_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174686665455bee7f5be5175-65424783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18893bec1411876f3b1f1368d281034180045fa2' => 
    array (
      0 => 'application/views/user/layout/error_box.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174686665455bee7f5be5175-65424783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MESSAGE_DETAILS' => 0,
    'MESSAGE_STATUS' => 0,
    'MESSAGE_TYPE' => 0,
    'message_class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bee7f5c110e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bee7f5c110e')) {function content_55bee7f5c110e($_smarty_tpl) {?><script>
    jQuery(document).ready(function()
{
    jQuery("#close_link").click(function()
{
    jQuery("#message_box").fadeOut(1000);
}
)
})
</script> 

<?php if ($_smarty_tpl->tpl_vars['MESSAGE_DETAILS']->value){?>
    <?php if ($_smarty_tpl->tpl_vars['MESSAGE_STATUS']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['MESSAGE_TYPE']->value){?>
            <?php $_smarty_tpl->tpl_vars["message_class"] = new Smarty_variable("errorHandler alert alert-success", null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["message_class"] = new Smarty_variable("errorHandler alert alert-danger", null, 0);?>
        <?php }?>

        <div id="message_box"  class="<?php echo $_smarty_tpl->tpl_vars['message_class']->value;?>
">

            <div id="message_note"> 
                <table>
                    <tr>
                        <td>                            
                            <?php echo $_smarty_tpl->tpl_vars['MESSAGE_DETAILS']->value;?>

                        </td>
                    </tr>
                </table>
            </div>
<a href="#" id= "close_link" class="panel-close pull-right" style="margin-top: -18px;"> <i class="fa fa-times"></i></a>
        </div>
    <?php }?>
<?php }?>
<?php }} ?>
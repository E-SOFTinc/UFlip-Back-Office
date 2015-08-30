<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 07:21:06
         compiled from "application/views/admin/layout/error_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190402666355bb6832965138-90722383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79a164b0d8d098015068eb348c68f6436fde99dc' => 
    array (
      0 => 'application/views/admin/layout/error_box.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190402666355bb6832965138-90722383',
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
  'unifunc' => 'content_55bb683299212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb683299212')) {function content_55bb683299212($_smarty_tpl) {?><script>
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
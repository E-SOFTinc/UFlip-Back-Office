<?php /* Smarty version Smarty 3.1.4, created on 2015-08-04 02:33:16
         compiled from "application/views/user/tree/tree_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167151244055c06abca9dea4-60368154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99331f17d8c92ebfc3bc53c7cfeff2bd6613faed' => 
    array (
      0 => 'application/views/user/tree/tree_view.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167151244055c06abca9dea4-60368154',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_details' => 0,
    'v' => 0,
    'id' => 0,
    'arr_val' => 0,
    'user_id' => 0,
    'tooltip' => 0,
    'PUBLIC_URL' => 0,
    'tran_paid' => 0,
    'tran_inactive' => 0,
    'tran_vacant' => 0,
    'tran_find_id' => 0,
    'display_tree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c06abcb52c1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c06abcb52c1')) {function content_55c06abcb52c1($_smarty_tpl) {?>
<style type="text/css">   
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['id'], null, 0);?>
        #user<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
{display:none;}
    <?php } ?>
</style>


<script type="text/javascript">

    $(document).ready(function()
    {
    <?php  $_smarty_tpl->tpl_vars['arr_val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arr_val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arr_val']->key => $_smarty_tpl->tpl_vars['arr_val']->value){
$_smarty_tpl->tpl_vars['arr_val']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars["user_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['arr_val']->value['id'], null, 0);?>
            $("a#userlink<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
").easyTooltip(
     {
                        useElement: "user<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
"
})
<?php } ?>
            })
</script>



<div id="content" >
    <?php echo $_smarty_tpl->tpl_vars['tooltip']->value;?>
 
    <div>
        <input type="hidden" id="user_details" name="user_details" value="<<?php ?>?php echo $user_details;?<?php ?>>">
        <!--style="position:absolute; left:10px; font-size: 12px;" -->
        <table width ="100%" border="0">
            <tr valign="top">
                <td>
                    <img src='<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/active.gif' style="border:hidden" title="Paid" align="absmiddle" width="40px" height="40px"/><b><?php echo $_smarty_tpl->tpl_vars['tran_paid']->value;?>
</b>&nbsp;&nbsp;&nbsp;
                    <img src='<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/inactive.png' style="border:hidden" title="Not Paid" align="absmiddle" width="40px" height="40px"/><b><?php echo $_smarty_tpl->tpl_vars['tran_inactive']->value;?>
</b>&nbsp;&nbsp;&nbsp;
                    <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/add.png" style="border:hidden" title="New One" align="absmiddle" width="24px" height="24px"/>&nbsp;<b><?php echo $_smarty_tpl->tpl_vars['tran_vacant']->value;?>
</b>&nbsp; <font color="#000000"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></font>&nbsp;&nbsp;
                </td>
                <td align="right">
                    <form action="" method="post" onSubmit= "return validate_go(this);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="" tabindex="1" name="go_id" id="go_id">
                        <button class="btn btn-bricky" name="go_submit" id="go_submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_find_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_find_id']->value;?>
</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <?php echo $_smarty_tpl->tpl_vars['display_tree']->value;?>


</div>
<?php }} ?>
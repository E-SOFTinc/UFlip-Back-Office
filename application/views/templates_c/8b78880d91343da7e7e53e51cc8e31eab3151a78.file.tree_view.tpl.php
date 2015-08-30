<?php /* Smarty version Smarty 3.1.4, created on 2015-08-01 04:29:05
         compiled from "application/views/admin/tree/tree_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197530539355bc91617f1f75-20976880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b78880d91343da7e7e53e51cc8e31eab3151a78' => 
    array (
      0 => 'application/views/admin/tree/tree_view.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197530539355bc91617f1f75-20976880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PUBLIC_URL' => 0,
    'user_details' => 0,
    'v' => 0,
    'id' => 0,
    'arr_val' => 0,
    'user_id' => 0,
    'tran_tree_view' => 0,
    'tooltip' => 0,
    'tran_paid' => 0,
    'tran_inactive' => 0,
    'tran_vacant' => 0,
    'tran_find_id' => 0,
    'display_tree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bc916186df5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bc916186df5')) {function content_55bc916186df5($_smarty_tpl) {?>
<html>
    <head>     
        <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/style_tree.css" rel="stylesheet" type="text/css" />

        <script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
javascript/easyTooltip.js"></script>

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

<title><?php echo $_smarty_tpl->tpl_vars['tran_tree_view']->value;?>
</title>
</head>

<body>

    <div id="content" >
        <?php echo $_smarty_tpl->tpl_vars['tooltip']->value;?>
 
        <div>
            <input type="hidden" id="user_details" name="user_details" value="<<?php ?>?php echo $user_details;?<?php ?>>">
            <!--style="position:absolute; left:10px; font-size: 12px;" -->
            <table width ="100%" border="0"  style="min-width: 950px;">
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
</b>&nbsp; <font color="#000000"><strong></strong></font>
                    </td>
                    <td align="right">
                        <form action="" method="post" onSubmit= "return validate_go(this);">
						<p><input type="text" value="" tabindex="3" name="go_id" id="go_id"/></p>
                           <p> <button class="btn btn-bricky" name="go_submit" id="go_submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_find_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_find_id']->value;?>
</button></p>

                    </td>
                </tr>
                </table>
                    </div>

                    <?php echo $_smarty_tpl->tpl_vars['display_tree']->value;?>


                    </div>

                    </body>
                    </html><?php }} ?>
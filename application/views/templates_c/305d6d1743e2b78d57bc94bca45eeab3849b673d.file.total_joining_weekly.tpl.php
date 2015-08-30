<?php /* Smarty version Smarty 3.1.4, created on 2015-08-18 16:04:08
         compiled from "application/views/admin/report/total_joining_weekly.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126247972255ccb882c25f61-48935268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '305d6d1743e2b78d57bc94bca45eeab3849b673d' => 
    array (
      0 => 'application/views/admin/report/total_joining_weekly.tpl',
      1 => 1439542507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126247972255ccb882c25f61-48935268',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55ccb882d0298',
  'variables' => 
  array (
    'tran_user_joining_report' => 0,
    'tran_from' => 0,
    'from_date' => 0,
    'tran_to' => 0,
    'to_date' => 0,
    'count' => 0,
    'tran_no' => 0,
    'tran_user_name' => 0,
    'tran_sponser_name' => 0,
    'tran_status' => 0,
    'tran_date_of_joining' => 0,
    'week_join' => 0,
    'i' => 0,
    'v' => 0,
    'class' => 0,
    'stat' => 0,
    'tran_click_here_print' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ccb882d0298')) {function content_55ccb882d0298($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["report_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_user_joining_report']->value), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/report/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<table><tr><td> <b><?php echo $_smarty_tpl->tpl_vars['tran_from']->value;?>
 : <?php echo $_smarty_tpl->tpl_vars['from_date']->value;?>
</b></td><td><b><?php echo $_smarty_tpl->tpl_vars['tran_to']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['to_date']->value;?>
</b></td></tr></table>
<?php if ($_smarty_tpl->tpl_vars['count']->value>=1){?>

    <br><br><table border='1'   cellpadding='0' cellspacing='0'align='center' >

        <tr class='th'>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
            <th>User Full Name</th>
            <th>Upline Name</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_sponser_name']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_date_of_joining']->value;?>
</th>

        </tr>
        <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['week_join']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>

            <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("tr1", null, 0);?>
            <?php }else{ ?>
                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("tr2", null, 0);?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['active']=="yes"){?>

                <?php $_smarty_tpl->tpl_vars["stat"] = new Smarty_variable("ACTIVE", null, 0);?>

            <?php }else{ ?>

                <?php $_smarty_tpl->tpl_vars["stat"] = new Smarty_variable("BLOCKED", null, 0);?>
            <?php }?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
            <tr<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
>

                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_full_name'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['v']->value['father_user']){?><?php echo $_smarty_tpl->tpl_vars['v']->value['father_user'];?>
<?php }else{ ?>NA<?php }?></td>
                <td><?php if ($_smarty_tpl->tpl_vars['v']->value['sponsor_name']){?><?php echo $_smarty_tpl->tpl_vars['v']->value['sponsor_name'];?>
<?php }else{ ?>NA<?php }?></td>
                <td><?php echo $_smarty_tpl->tpl_vars['stat']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date_of_joining'];?>
</td>


            </tr>

        <?php } ?>
    </table>
<?php }?>
</div>
</div>
<div id = "frame">
    <table align="center" style="margin-top:2px;">
        <tr>
            <td>
        <center>
            <?php echo $_smarty_tpl->tpl_vars['tran_click_here_print']->value;?>

        </center>
        </td>
        <td>
            <a href="" onClick="window.print();
                    return false">
                <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
/images/1335779082_document-print.png" alt="Print" border="none"></a>
        </td>
        </tr>
    </table>
</div><?php }} ?>
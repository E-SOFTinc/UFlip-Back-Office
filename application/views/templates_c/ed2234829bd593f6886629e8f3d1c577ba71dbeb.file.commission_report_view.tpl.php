<?php /* Smarty version Smarty 3.1.4, created on 2015-08-14 14:02:43
         compiled from "application/views/admin/report/commission_report_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181857762955c039fd3da340-86585380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed2234829bd593f6886629e8f3d1c577ba71dbeb' => 
    array (
      0 => 'application/views/admin/report/commission_report_view.tpl',
      1 => 1439542482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181857762955c039fd3da340-86585380',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c039fd477f9',
  'variables' => 
  array (
    'tran_commission_report' => 0,
    'tran_from' => 0,
    'from' => 0,
    'tran_to' => 0,
    'to' => 0,
    'count' => 0,
    'tran_no' => 0,
    'tran_user_name' => 0,
    'tran_full_name' => 0,
    'tran_date' => 0,
    'tran_total_amount' => 0,
    'details' => 0,
    'i' => 0,
    'v' => 0,
    'total' => 0,
    'tot_pay' => 0,
    'tran_no_data' => 0,
    'tran_click_here_print' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c039fd477f9')) {function content_55c039fd477f9($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["report_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_commission_report']->value), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/report/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
<?php $_smarty_tpl->tpl_vars['tot_pay'] = new Smarty_variable(0, null, 0);?>
<table><tr><td><b><?php echo $_smarty_tpl->tpl_vars['tran_from']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
</b></td><td><b>&nbsp;<?php echo $_smarty_tpl->tpl_vars['tran_to']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['to']->value;?>
</b></td></tr></table>
<?php if ($_smarty_tpl->tpl_vars['count']->value>=1){?>
    <br><br><table border='1'  cellpadding='0' cellspacing='0' align='center' >
        <tr class='th'>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th>       
            <th>Amount Type</th>        
            <th><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
</th>
            <th>Amount Payable</th>
        </tr>
        <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>

        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['full_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['view_amt'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
</td>
                <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['total_amount'],2);?>
<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['v']->value['total_amount'], null, 0);?></td>
                <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['amount_payable'],2);?>
<?php $_smarty_tpl->tpl_vars['tot_pay'] = new Smarty_variable($_smarty_tpl->tpl_vars['tot_pay']->value+$_smarty_tpl->tpl_vars['v']->value['amount_payable'], null, 0);?></td>
            </tr>  
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
        <?php } ?>


        <tr>
            <td colspan="5" align='right'> <b>Total</b></td><td><b><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2);?>
</b></td><td><b><?php echo number_format($_smarty_tpl->tpl_vars['tot_pay']->value,2);?>
</b></td>
        </tr>

    </table>

    <table   cellpadding='0' cellspacing='0' align='center'>

    </table>
<?php }else{ ?>
    <h4 align='center'>  <font size="6"><?php echo $_smarty_tpl->tpl_vars['tran_no_data']->value;?>
</font ></h4>

<?php }?>



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
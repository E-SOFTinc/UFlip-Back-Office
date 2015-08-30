<?php /* Smarty version Smarty 3.1.4, created on 2015-08-26 11:05:31
         compiled from "application/views/admin/report/payout_released_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131197988355ccb7bc40bff3-25626969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c8800772bc82982d7ad500537bd93a19528d412' => 
    array (
      0 => 'application/views/admin/report/payout_released_report.tpl',
      1 => 1440587001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131197988355ccb7bc40bff3-25626969',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55ccb7bc4b588',
  'variables' => 
  array (
    'tran_payout_released_report' => 0,
    'tran_from' => 0,
    'from' => 0,
    'tran_to' => 0,
    'to' => 0,
    'payout_release' => 0,
    'tran_no' => 0,
    'tran_full_name' => 0,
    'tran_user_name' => 0,
    'tran_address' => 0,
    'tran_bank' => 0,
    'tran_account_no' => 0,
    'tran_date' => 0,
    'tran_amount' => 0,
    'i' => 0,
    'total_amount' => 0,
    'v' => 0,
    'tran_total_amount' => 0,
    'tran_click_here_print' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ccb7bc4b588')) {function content_55ccb7bc4b588($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["report_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_payout_released_report']->value), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/report/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<br><br>
<table><tr><td><b><?php echo $_smarty_tpl->tpl_vars['tran_from']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
</b></td><td><b>&nbsp;<?php echo $_smarty_tpl->tpl_vars['tran_to']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['to']->value;?>
</b></td></tr></table>
<?php if (!empty($_smarty_tpl->tpl_vars['payout_release']->value)){?>
    
    <table border='1' cellpadding="0" cellspacing="0" align='center' >
        <tr>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
</th>
            <!--<th><?php echo $_smarty_tpl->tpl_vars['tran_bank']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_account_no']->value;?>
</th>-->
            <th><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
        </tr>
        <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
        <?php $_smarty_tpl->tpl_vars["total_amount"] = new Smarty_variable(0, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payout_release']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['total_amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_amount']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['address'];?>
</td>
               <!-- <td><?php echo $_smarty_tpl->tpl_vars['v']->value['bank'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['account_number'];?>
</td>-->
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
</td>
                <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['amount'],2);?>
</td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="5" style="text-align: right"><b><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
</b></td>
            <td><b><?php echo number_format($_smarty_tpl->tpl_vars['total_amount']->value,2);?>
</b></td>
        </tr>
    </table>
<?php }?>

<?php if (empty($_smarty_tpl->tpl_vars['payout_release']->value)){?>
    <table align="center">
        <center>
            <h3>No items in Payout Release!</h3>
        </center>
    </table>
<?php }?>
</div></div>
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
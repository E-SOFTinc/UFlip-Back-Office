<?php /* Smarty version Smarty 3.1.4, created on 2015-08-01 12:34:54
         compiled from "application/views/admin/report/total_payout_report_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96586755655bd033eb70cf2-54273036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90369360a89779be35daa8b46d7d77b5abd65676' => 
    array (
      0 => 'application/views/admin/report/total_payout_report_view.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96586755655bd033eb70cf2-54273036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_user_payout_report' => 0,
    'count' => 0,
    'tran_no' => 0,
    'tran_full_name' => 0,
    'tran_user_name' => 0,
    'tran_address' => 0,
    'tran_bank' => 0,
    'tran_account_no' => 0,
    'tran_pan_no' => 0,
    'tran_total_amount' => 0,
    'tran_tds' => 0,
    'tran_service_charge' => 0,
    'tran_amount_payable' => 0,
    'total_payout' => 0,
    'i' => 0,
    'v' => 0,
    'tran_click_here_print' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bd033ec14e2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bd033ec14e2')) {function content_55bd033ec14e2($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["report_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_user_payout_report']->value), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/report/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['count']->value>=1){?>


<br><br><table border='1' cellpadding="0" cellspacing="0" align='center' >
<tr>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_bank']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_account_no']->value;?>
</th>
   <!-- <th><?php echo $_smarty_tpl->tpl_vars['tran_pan_no']->value;?>
</th>-->
   <!--
    <th>Left Count</th>
    <th>Right Count</th>
    <th>Total Leg</th>
   -->
    <th><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_tds']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_service_charge']->value;?>
</th>
    <th><?php echo $_smarty_tpl->tpl_vars['tran_amount_payable']->value;?>
</th>
    </tr>
    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['total_payout']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>

        
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

   
	<tr >

	                <td> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['full_name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_address'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_bank'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['acc_number'];?>
</td>
			<!--<td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_pan'];?>
</td>-->
                        <!--
			<td><<?php ?>?php echo $left_leg; ?<?php ?>></td>
			<td><<?php ?>?php echo $right_leg; ?<?php ?>></td>
			<td><<?php ?>?php echo $total_leg; ?<?php ?>></td>
                        -->
			<td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['total_amount'],2);?>
</td>
    		        <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['tds'],2);?>
</td>
    		        <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['service_charge'],2);?>
</td>
    	                <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['amount_payable'],2);?>
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
                <a href="" onClick="window.print();return false">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
/images/1335779082_document-print.png" alt="Print" border="none"></a>
            </td>
            </tr>
        </table>
    </div><?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-13 10:48:33
         compiled from "application/views/admin/report/member_payout_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73153606755ccbc51e756d6-53803689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '608a0391d1347131776c200c6d8e8f983c15a757' => 
    array (
      0 => 'application/views/admin/report/member_payout_report.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73153606755ccbc51e756d6-53803689',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_member_wise_payout_report' => 0,
    'count' => 0,
    'member_payout' => 0,
    'tran_user_name' => 0,
    'user_name' => 0,
    'tran_full_name' => 0,
    'full_name' => 0,
    'tran_address' => 0,
    'user_address' => 0,
    'tran_bank' => 0,
    'user_bank' => 0,
    'tran_account_no' => 0,
    'acc_number' => 0,
    'tran_pan_no' => 0,
    'user_pan' => 0,
    'tran_total_amount' => 0,
    'total_amount' => 0,
    'tran_tds' => 0,
    'tds' => 0,
    'tran_service_charge' => 0,
    'service_charge' => 0,
    'tran_amount_payable' => 0,
    'amount_payable' => 0,
    'tran_click_here_print' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55ccbc51f3dcc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ccbc51f3dcc')) {function content_55ccbc51f3dcc($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["report_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_member_wise_payout_report']->value), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/report/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['count']->value>=1){?>

<br><br><table border='1' align='center'cellpadding="0" cellspacing="0" width='50%' >
 

        <?php $_smarty_tpl->tpl_vars["user_name"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["user_name"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["full_name"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["full_name"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["total_amount"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["total_amount"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["amount_payable"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["amount_payable"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["tds"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["tds"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["service_charge"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["service_charge"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["user_pan"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["user_pan"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["acc_number"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["acc_number"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["user_bank"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["user_bank"], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["user_address"] = new Smarty_variable($_smarty_tpl->tpl_vars['member_payout']->value["user_address"], null, 0);?>

        <tr class="text"><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th><td width="30%"><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</td></tr>
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th><td width="30%"><?php echo $_smarty_tpl->tpl_vars['full_name']->value;?>
</td></tr>
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
</th><td width="30%"><?php echo $_smarty_tpl->tpl_vars['user_address']->value;?>
</td></tr>
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_bank']->value;?>
</th><td width="30%"><?php echo $_smarty_tpl->tpl_vars['user_bank']->value;?>
</td></tr>
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_account_no']->value;?>
</th><td width="30%"><?php echo $_smarty_tpl->tpl_vars['acc_number']->value;?>
</td></tr>
   <!-- <tr><th><?php echo $_smarty_tpl->tpl_vars['tran_pan_no']->value;?>
</th><td><?php echo $_smarty_tpl->tpl_vars['user_pan']->value;?>
</td></tr>-->
			
			
			
    <!--
    <tr><th>Left Count</th><td><<?php ?>?php echo $left_leg; ?<?php ?>></td></tr>
    <tr><th>Right Count</th><td><<?php ?>?php echo $right_leg; ?<?php ?>></td></tr>
    <tr><th>Total Leg</th><td><<?php ?>?php echo $total_leg; ?<?php ?>></td></tr>
    -->
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
</th><td width="30%"><?php echo number_format($_smarty_tpl->tpl_vars['total_amount']->value,2);?>
</td></tr>
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_tds']->value;?>
</th><td width="30%"><?php echo number_format($_smarty_tpl->tpl_vars['tds']->value,2);?>
</td></tr>
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_service_charge']->value;?>
</th><td width="30%"><?php echo number_format($_smarty_tpl->tpl_vars['service_charge']->value,2);?>
</td></tr>
    <tr><th align="left" width="30%"><?php echo $_smarty_tpl->tpl_vars['tran_amount_payable']->value;?>
</th><td width="30%"><?php echo number_format($_smarty_tpl->tpl_vars['amount_payable']->value,2);?>
</td></tr>


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
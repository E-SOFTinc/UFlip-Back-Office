<?php /* Smarty version Smarty 3.1.4, created on 2015-08-27 16:58:15
         compiled from "application/views/admin/report/profile_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203723659355df41a7436234-11780821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b543ba91d71fd49f4e657b08252abc9bae036c69' => 
    array (
      0 => 'application/views/admin/report/profile_report.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203723659355df41a7436234-11780821',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_profile_report' => 0,
    'count' => 0,
    'BASE_URL' => 0,
    'tran_create_excel' => 0,
    'tran_no' => 0,
    'tran_name' => 0,
    'tran_user_name' => 0,
    'tran_sponser_name' => 0,
    'tran_resident' => 0,
    'tran_pincode' => 0,
    'tran_mobile_no' => 0,
    'tran_email' => 0,
    'tran_bank' => 0,
    'tran_branch' => 0,
    'tran_acc_no' => 0,
    'tran_pan_no' => 0,
    'tran_ifsc' => 0,
    'tran_date_of_joining' => 0,
    'profile_arr' => 0,
    'i' => 0,
    'v' => 0,
    'clr' => 0,
    'name' => 0,
    'uname' => 0,
    'sponser_name' => 0,
    'address' => 0,
    'pincode' => 0,
    'mobile' => 0,
    'email' => 0,
    'bank' => 0,
    'branch' => 0,
    'acc' => 0,
    'pan' => 0,
    'ifsc' => 0,
    'date' => 0,
    'tran_click_here_print' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55df41a76459e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55df41a76459e')) {function content_55df41a76459e($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php $_smarty_tpl->tpl_vars["report_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_profile_report']->value), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/report/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['count']->value>=1){?>
        <br><br><table border='1'   cellpadding='0' cellspacing='0'align='center' >
            <tr><td colspan = '19'><a href=<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/excel/user_profiles_excel><?php echo $_smarty_tpl->tpl_vars['tran_create_excel']->value;?>
</a></td></tr>
            <tr class='th'>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_name']->value;?>
</th>              
                <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_sponser_name']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_resident']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_pincode']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_mobile_no']->value;?>
</th>        
                <th><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_bank']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_branch']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_acc_no']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_pan_no']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_ifsc']->value;?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['tran_date_of_joining']->value;?>
</th>
            </tr>

            <?php if (count($_smarty_tpl->tpl_vars['profile_arr']->value)!=0){?>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['profile_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars["tr_class"] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("0", null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                        <?php $_smarty_tpl->tpl_vars['clr'] = new Smarty_variable('tr1', null, 0);?>
                    <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars['clr'] = new Smarty_variable('tr2', null, 0);?>
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars["name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_name']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["passcode"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_passcode']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["address"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_address']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["pincode"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_pin']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["mobile"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_mobile']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["land"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_land']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["email"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_email']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["relation"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_relation']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["bank"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_nbank']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["branch"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_nbranch']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["acc"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_acnumber']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["pan"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_pan']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ifsc"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_ifsc']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["date"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['join_date']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["uname"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['uname']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["sponser_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['sponser_name']), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["sponser_id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['sponser_id']), null, 0);?>

                    <tr class="<?php echo $_smarty_tpl->tpl_vars['clr']->value;?>
">
                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['uname']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['sponser_name']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['pincode']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['bank']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['acc']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['pan']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ifsc']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</td>

                    </tr>

                <?php } ?> 

            <?php }?>
        </table>
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
    </div>
    <?php }?>
<?php }} ?>
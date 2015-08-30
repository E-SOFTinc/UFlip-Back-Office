<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:37:10
         compiled from "application/views/admin/profile/user_summary_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16168030755bba436f288b0-49634104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dfb0cc6529bad34a85761602119d0ce09e00687' => 
    array (
      0 => 'application/views/admin/profile/user_summary_header.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16168030755bba436f288b0-49634104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_user_account' => 0,
    'is_valid_username' => 0,
    'tran_Username_not_Exists' => 0,
    'details' => 0,
    'PUBLIC_URL' => 0,
    'file_name' => 0,
    'tran_User_Name' => 0,
    'user_name' => 0,
    'tran_full_name' => 0,
    'v' => 0,
    'tran_email' => 0,
    'tran_mobile_no' => 0,
    'tran_address' => 0,
    'tran_country' => 0,
    'tran_view_profile' => 0,
    'i' => 0,
    'mlm_plan' => 0,
    'tran_view_commission_details' => 0,
    'tran_view_income_details' => 0,
    'referal_status' => 0,
    'tran_view_refferal_details' => 0,
    'ewallet_status' => 0,
    'tran_view_ewallet_details' => 0,
    'pin_status' => 0,
    'tran_view_user_epin' => 0,
    'tran_view_income_statement' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba4370eb26',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba4370eb26')) {function content_55bba4370eb26($_smarty_tpl) {?><div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_user_account']->value;?>

                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="fa fa-resize-full"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12"><div class="center">
                        <?php if (!$_smarty_tpl->tpl_vars['is_valid_username']->value){?>
                            <h4 align="center"><font color="#FF0000"><?php echo $_smarty_tpl->tpl_vars['tran_Username_not_Exists']->value;?>
</font></h4>
                            <?php }else{ ?>
                        </div>                     
                        <?php if (count($_smarty_tpl->tpl_vars['details']->value)!=0){?>
                            <div class="panel-body">
                                <?php $_smarty_tpl->tpl_vars["k"] = new Smarty_variable("0", null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <table class="table table-condensed table-hover">
                                        <thead></thead>
                                        <tbody>
                                            <tr><div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/profile_picture/<?php echo $_smarty_tpl->tpl_vars['file_name']->value;?>
" alt="">
                                        </div></tr>
                                        <tr><td  width="180px"><?php echo $_smarty_tpl->tpl_vars['tran_User_Name']->value;?>
  <td  width="50px">: </td></td><td><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</td>
                                        <tr><td><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
  <td>:</td></td><td> <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
                                        <tr><td><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
  <td>:</td></td><td> <?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
                                        <tr><td><?php echo $_smarty_tpl->tpl_vars['tran_mobile_no']->value;?>
  <td>:</td></td><td> <?php echo $_smarty_tpl->tpl_vars['v']->value['mobile'];?>
</td>
                                        <tr><td><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
  <td>:</td></td><td> <?php echo $_smarty_tpl->tpl_vars['v']->value['address'];?>
</td>
                                        <tr><td><?php echo $_smarty_tpl->tpl_vars['tran_country']->value;?>
  <td>:</td></td><td> <?php echo $_smarty_tpl->tpl_vars['v']->value['country'];?>
</td>
                                            </tbody>
                                    </table>
                                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("0", null, 0);?>
                                    <ul style="list-style-type:none">
                                        <li><form action="../profile/profile_view" method="get">
                                                <input type="hidden" name="user_name" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
" />
                                                
                                                <button type="submit" name="profile_view" class="btn btn-bricky top-btn" value="profile_view"><?php echo $_smarty_tpl->tpl_vars['tran_view_profile']->value;?>
</button>
                                            </form>
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value%3==0){?></li><li><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['mlm_plan']->value!="Board"){?>    
                                            <form action="../leg_count/view_leg_count"  method="get">
                                                <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_view_commission_details']->value;?>
</button>
                                            </form>
                                        <?php }?>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value%3==0){?></li><li><?php }?>
                                    <form action="../income_details/income" method="get">
                                        <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_view_income_details']->value;?>
</button>
                                    </form>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value%3==0){?></li><li><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['referal_status']->value=="yes"){?>
                                    <form action="../configuration/my_referal" method="get">
                                        <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_view_refferal_details']->value;?>
</button>
                                    </form>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value%3==0){?></li><li><?php }?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['ewallet_status']->value=="yes"){?>
                                <form action="../ewallet/my_ewallet"  method="get">
                                    <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_view_ewallet_details']->value;?>
</button>
                                </form>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value%3==0){?></li><li><?php }?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=="yes"){?>
                            <form action="../epin/view_pin_user" method="get">
                                <button type="submit" name="user" class="btn btn-bricky top-btn" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_view_user_epin']->value;?>
</button>
                            </form>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value%3==0){?></li><li><?php }?>
                    <?php }?><form action="../payout/my_income"  method="get">
                        <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tran_view_income_statement']->value;?>
</button>
                    </form><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value%3==0){?></li><li><?php }?>
            </ul>
        <?php } ?>
    <?php }?>
<?php }?>
</div>
</div>
</div>  
</div>
</div>
</div>

<?php }} ?>
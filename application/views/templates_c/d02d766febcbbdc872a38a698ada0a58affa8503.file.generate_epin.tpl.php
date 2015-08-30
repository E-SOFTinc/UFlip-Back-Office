<?php /* Smarty version Smarty 3.1.4, created on 2015-08-11 06:25:10
         compiled from "application/views/admin/epin/generate_epin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53132830755c9db96c9ad65-97572170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd02d766febcbbdc872a38a698ada0a58affa8503' => 
    array (
      0 => 'application/views/admin/epin/generate_epin.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53132830755c9db96c9ad65-97572170',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_add_new_epin' => 0,
    'tran_errors_check' => 0,
    'tran_number_of_epin' => 0,
    'un_allocated_pin' => 0,
    'tran_amount' => 0,
    'tran_select_amount' => 0,
    'amount_details' => 0,
    'v' => 0,
    'i' => 0,
    'tran_count' => 0,
    'tran_expiry_date' => 0,
    'tran_add_epin' => 0,
    'status' => 0,
    'tran_active_epin' => 0,
    'tran_inactive_epin' => 0,
    'BASE_URL' => 0,
    'tran_view_epin' => 0,
    'tran_refine' => 0,
    'tran_no' => 0,
    'tran_epin' => 0,
    'tran_bal_amount' => 0,
    'tran_allocated_user' => 0,
    'tran_status' => 0,
    'tran_uploaded_date' => 0,
    'tran_action' => 0,
    'pin_numbers' => 0,
    'tr_class' => 0,
    'from' => 0,
    'id' => 0,
    'root' => 0,
    'tran_sure_you_want_to_delete_this_passcode_there_is_no_undo' => 0,
    'tran_sure_you_want_to_activate_this_passcode_there_is_no_undo' => 0,
    'tran_delete_all_epin' => 0,
    'tran_your_account_have_no_active_epin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c9db96deddf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9db96deddf')) {function content_55c9db96deddf($_smarty_tpl) {?>
<div class="panel panel-default">

    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_add_new_epin']->value;?>

    </div> 
    <div class="panel-body">


        <form role="form" class="smart-wizard form-horizontal" id="upload" name="upload" method="post">
            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i><?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-4 control-label" ><?php echo $_smarty_tpl->tpl_vars['tran_number_of_epin']->value;?>
: </label>
                <div class="col-sm-4" style="padding-top: 7px;">
                    <?php echo $_smarty_tpl->tpl_vars['un_allocated_pin']->value;?>

                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label" for="product"><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
 <font color="#ff0000">*</font>:</label>
                <div class="col-sm-3">
                    <select name="amount1" id="amount1"  tabindex="11" class="form-control" >
                        <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_amount']->value;?>
</option>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amount_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</option>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                        <?php } ?>
                    </select> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="count"><?php echo $_smarty_tpl->tpl_vars['tran_count']->value;?>
 <font color="#ff0000">*</font>:</label>
                <div class="col-sm-3">
                    <input tabindex="2" type="text" name="count" id="count" size="20" value="" class="form-control"
                           title=""/>
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label" for="date">
                    <?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
<span class="symbol required"></span>
                </label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date" id="date" type="text" tabindex="3" size="20" maxlength="10"  value="" />
                        <label for="date" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                        
                    </div>
                    <span for="date" class="help-block">    </span>
                </div>

            </div>


            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-4">
                    <button class="btn btn-bricky" name="addpasscode" id="addpasscode" value="<?php echo $_smarty_tpl->tpl_vars['tran_add_epin']->value;?>
" tabindex="3">
                        <?php echo $_smarty_tpl->tpl_vars['tran_add_epin']->value;?>

                    </button>
                </div>
            </div>
        </form>       
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_add_new_epin']->value;?>

    </div> 
    <div class="panel-body">

        <?php if ($_smarty_tpl->tpl_vars['un_allocated_pin']->value>0){?>
            <form name="pin_form" id="pin_form" method="post" action=""  >

                <div class="form-group">
                    <!-- <label class="col-sm-2 control-label" for="service"> </label>-->
                    <div class="col-sm-3">

                        <input tabindex="4" type="radio" id="status_active" name="pin_status" value="active" checked <?php if ($_smarty_tpl->tpl_vars['status']->value=='active'){?>checked='1'<?php }?> /><label for="val"></label><?php echo $_smarty_tpl->tpl_vars['tran_active_epin']->value;?>
</div>

                    <div class="col-sm-3">
                        <input tabindex="4" type="radio" name="pin_status" id="status_inactive" value="inactive" <?php if ($_smarty_tpl->tpl_vars['status']->value=='inactive'){?>checked='1'<?php }?> /><label for="valid"></label><?php echo $_smarty_tpl->tpl_vars['tran_inactive_epin']->value;?>
</div>



                    <div class="col-sm-2 col-sm-offset-2">

                        <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/">
                        <button class="btn btn-bricky" type="submit" name="view_pin"  id="view_pin" value="<?php echo $_smarty_tpl->tpl_vars['tran_view_epin']->value;?>
" tabindex="5" title="View E-pin"><?php echo $_smarty_tpl->tpl_vars['tran_refine']->value;?>
</button>

                    </div>
                </div>

            </form>
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                <thead>
                    <tr class="th" align="center">
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_bal_amount']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_allocated_user']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_uploaded_date']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
</th>
                        <th width="15%"><?php echo $_smarty_tpl->tpl_vars['tran_action']->value;?>
</th>
                    </tr>
                </thead>

                <tbody>                       
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["pin"] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["tr_class"] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["root"] = new Smarty_variable(($_smarty_tpl->tpl_vars['BASE_URL']->value)."admin/", null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pin_numbers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>                        
                        <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['pin_id']), null, 0);?>
                        <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                            <?php $_smarty_tpl->tpl_vars['tr_class'] = new Smarty_variable("tr1", null, 0);?>	 
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['tr_class'] = new Smarty_variable("tr2", null, 0);?>
                        <?php }?>


                        <?php if ($_smarty_tpl->tpl_vars['v']->value['status']=="yes"){?>
                            <?php $_smarty_tpl->createLocalArrayVariable('v', null, 0);
$_smarty_tpl->tpl_vars['v']->value['stat'] = "ACTIVE";?>
                        <?php }else{ ?>
                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['used_user'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==''){?>
                                <?php $_smarty_tpl->createLocalArrayVariable('v', null, 0);
$_smarty_tpl->tpl_vars['v']->value['stat'] = "BLOCKED";?>
                            <?php }else{ ?>
                                <?php $_smarty_tpl->createLocalArrayVariable('v', null, 0);
$_smarty_tpl->tpl_vars['v']->value['stat'] = "USED";?>
                            <?php }?>   

                        <?php }?>

                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>


                        <tr class="<?php echo $_smarty_tpl->tpl_vars['tr_class']->value;?>
" align="center" >
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['i']->value+$_smarty_tpl->tpl_vars['from']->value;?>
</td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin'];?>
</td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_amount'];?>
</td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_bal_amount'];?>
</td>
                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['allocated_user'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==''){?>
                                <td align="center">NA</td>
                            <?php }else{ ?>
                                <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['allocated_user'];?>
</td>
                            <?php }?>                          
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['stat'];?>
</td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_uploded_date'];?>
</td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_expiry_date'];?>
</td>
                            <td>






                                <div class="visible-md visible-lg hidden-sm hidden-xs buttons-widget">
                                    <!--delete PIN start-->
                                    <a href="#" onclick="javascript:delete_pin(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
')"  class="btn btn-bricky tooltips" data-placement="top" data-original-title="Delete this PIN">
                                        <span style="display:none" id="error_msg_delete"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_passcode_there_is_no_undo']->value;?>
</span>
                                        <i class="fa fa-times fa fa-white"></i>
                                    </a>
                                    <!--delete PIN end-->
                                    <?php if ($_smarty_tpl->tpl_vars['v']->value['stat']=="ACTIVE"){?>
                                        <!--block PIN start-->
                                        <a href="#" onclick="javascript:block_pin(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
')"  class="btn btn-primary tooltips" data-placement="top" data-original-title="Block this PIN">
                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                        </a>
                                        <!--block PIN end-->
                                    <?php }else{ ?>
                                        <!--Activate PIN start-->

                                        <a  href="#" onclick="javascript:activate_pin(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
')" class="btn btn-green tooltips" data-placement="top" data-original-title="Activate this PIN">

                                            <span style="display:none" id="error_msg_activate"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_activate_this_passcode_there_is_no_undo']->value;?>
</span>
                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                        </a>
                                        <!--Activate PIN end-->
                                    <?php }?>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group">
                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                        </a>
                                        <ul role="menu" class="dropdown-menu pull-right">


                                            <!--delete PIN start-->
                                            <li role="presentation">
                                                <a role="menuitem"  href="#" onclick="javascript:delete_pin(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
')">

                                                    <span style="display:none" id="error_msg_delete"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_passcode_there_is_no_undo']->value;?>
</span>
                                                    <i class="fa fa-times fa fa-white"></i>Delete
                                                </a>
                                            </li>
                                            <!--delete PIN end-->
                                            <?php if ($_smarty_tpl->tpl_vars['v']->value['stat']=="ACTIVE"){?>
                                                <!--block PIN start-->
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#" onclick="javascript:block_pin(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
')" >
                                                        <i class="glyphicon glyphicon-remove-circle"></i>Block
                                                    </a>
                                                </li>
                                                <!--block PIN end-->
                                            <?php }else{ ?>
                                                <!--Activate PIN start-->
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#" onclick="javascript:activate_pin(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
')">

                                                        <span style="display:none" id="error_msg_activate"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_activate_this_passcode_there_is_no_undo']->value;?>
</span>
                                                        <i class="glyphicon glyphicon-ok-sign"></i>Activate
                                                    </a>
                                                </li>
                                                <!--Activate PIN end-->
                                            <?php }?>


                                        </ul>
                                    </div>
                                </div>


                            </td>

                        </tr>

                    <?php } ?>             
                </tbody>                        
            </table>
            <div class="form-group">
                <div class="col-sm-2">

                    <button class="btn btn-bricky" type="submit" name="delete_all_pin"  id="delete_all_pin" value="<?php echo $_smarty_tpl->tpl_vars['tran_delete_all_epin']->value;?>
" tabindex="7" title="Delete All E-pin" onclick="javascript:delete_all_epin('<?php echo $_smarty_tpl->tpl_vars['root']->value;?>
');"><?php echo $_smarty_tpl->tpl_vars['tran_delete_all_epin']->value;?>
</button> 

                </div>
            </div>

        <?php }else{ ?>
            <h3> <?php echo $_smarty_tpl->tpl_vars['tran_your_account_have_no_active_epin']->value;?>
</h3>
        <?php }?>

    </div>

</div>


<?php }} ?>
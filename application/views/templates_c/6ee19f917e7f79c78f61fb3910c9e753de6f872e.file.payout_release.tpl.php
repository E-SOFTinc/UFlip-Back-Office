<?php /* Smarty version Smarty 3.1.4, created on 2015-08-01 12:32:16
         compiled from "application/views/admin/payout/payout_release.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183166118055bb7a783bff90-77591507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ee19f917e7f79c78f61fb3910c9e753de6f872e' => 
    array (
      0 => 'application/views/admin/payout/payout_release.tpl',
      1 => 1438429147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183166118055bb7a783bff90-77591507',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb7a78677d5',
  'variables' => 
  array (
    'tran_please_select_at_least_one_checkbox' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_nofond' => 0,
    'tran_showing' => 0,
    'tran_to' => 0,
    'tran_of' => 0,
    'tran_entries' => 0,
    'tran_notavailable' => 0,
    'payout_release_type' => 0,
    'tran_payout_release' => 0,
    'tran_errors_check' => 0,
    'payout_date_arr' => 0,
    'payout_type' => 0,
    'tran_payout_release_date' => 0,
    'tran_select_one' => 0,
    'v' => 0,
    'date' => 0,
    'tran_submit' => 0,
    'post_submit' => 0,
    'tran_binary_payout_release' => 0,
    'tran_slno' => 0,
    'tran_user_id' => 0,
    'tran_full_name' => 0,
    'tran_total_amount' => 0,
    'tran_amount_payable' => 0,
    'tran_view_user_data' => 0,
    'tran_release' => 0,
    'date_sub' => 0,
    'previous_pyout_date' => 0,
    'weekly_payout' => 0,
    'BASE_URL' => 0,
    'length' => 0,
    'i' => 0,
    'class' => 0,
    'path' => 0,
    'tran_view' => 0,
    'total_amount_tot' => 0,
    'tds_tot' => 0,
    'service_charge_tot' => 0,
    'amount_payable_tot' => 0,
    'leg_amount_carry_tot' => 0,
    'tran_total' => 0,
    'tran_paid' => 0,
    'tran_user_details' => 0,
    'tran_no_payout_found' => 0,
    'post_details' => 0,
    'tran_address' => 0,
    'tran_mobile' => 0,
    'tran_bank' => 0,
    'tran_branch' => 0,
    'tran_acc_no' => 0,
    'tran_ifsc' => 0,
    'details' => 0,
    'user_id' => 0,
    'tran_close' => 0,
    'tran_user_name' => 0,
    'tran_user_full_name' => 0,
    'tran_balance_amount' => 0,
    'tran_Payout_Amount' => 0,
    'tran_check' => 0,
    'tran_delete' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb7a78677d5')) {function content_55bb7a78677d5($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_please_select_at_least_one_checkbox']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
    <span id="nofond"><?php echo $_smarty_tpl->tpl_vars['tran_nofond']->value;?>
</span>
    <span id="showing"><?php echo $_smarty_tpl->tpl_vars['tran_showing']->value;?>
</span>
    <span id="to"><?php echo $_smarty_tpl->tpl_vars['tran_to']->value;?>
</span>
    <span id="of"><?php echo $_smarty_tpl->tpl_vars['tran_of']->value;?>
</span>
    <span id="entries"><?php echo $_smarty_tpl->tpl_vars['tran_entries']->value;?>
</span>
    <span id="notavailable"><?php echo $_smarty_tpl->tpl_vars['tran_notavailable']->value;?>
</span>
</div>


<?php if ($_smarty_tpl->tpl_vars['payout_release_type']->value=="normal"){?>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_payout_release']->value;?>

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
                <div class="panel-body">

                    <form role="form" class=""  method="post"  name="main_menu_chenge" id="main_menu_chenge">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i><?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                            </div>
                        </div>
                        <?php $_smarty_tpl->tpl_vars["arr_len"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['payout_date_arr']->value), null, 0);?>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($_smarty_tpl->tpl_vars['payout_type']->value=="daily"){?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >
                                                <?php echo $_smarty_tpl->tpl_vars['tran_payout_release_date']->value;?>
: 
                                            </label>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text"  size="20" maxlength="10"  value="" >
                                                    <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }else{ ?> <div class="form-group">  
                                            <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_payout_release_date']->value;?>
<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <select name="week_date2" id="week_date2" class="form-control">
                                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_one']->value;?>
</option>
                                                    <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payout_date_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value){
$_smarty_tpl->tpl_vars["v"]->_loop = true;
?>
                                                        <?php $_smarty_tpl->tpl_vars["date"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value, null, 0);?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</option>
                                                    <?php } ?>
                                                </select><span class="help-block" for="user_name"></span>

                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-bricky" name="submit" id="'Submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php if ($_smarty_tpl->tpl_vars['post_submit']->value){?>   
        <div id="transaction" type="hidden">
            <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div id="div1"></div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                close
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_binary_payout_release']->value;?>

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
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                <tr class="th"> 
                                    <th ><?php echo $_smarty_tpl->tpl_vars['tran_slno']->value;?>
</th>
                                    <th ><?php echo $_smarty_tpl->tpl_vars['tran_user_id']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
</th> 
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_amount_payable']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_view_user_data']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_release']->value;?>
</th> 
                                </tr>

                            </thead>
                            <input type= 'hidden'  name = "date_sub"  value ="<?php echo $_smarty_tpl->tpl_vars['date_sub']->value;?>
" >
                            <input type= 'hidden'  name = "previous_date"  value ="<?php echo $_smarty_tpl->tpl_vars['previous_pyout_date']->value;?>
" >
                            <?php $_smarty_tpl->tpl_vars["length"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['weekly_payout']->value), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["path"] = new Smarty_variable(($_smarty_tpl->tpl_vars['BASE_URL']->value)."admin/", null, 0);?>

                            <?php if ($_smarty_tpl->tpl_vars['length']->value>0){?>
                                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["total_amount_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["tds_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["service_charge_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["amount_payable_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["leg_amount_carry_tot"] = new Smarty_variable(0, null, 0);?>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weekly_payout']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value){
$_smarty_tpl->tpl_vars["v"]->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                            <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr1', null, 0);?>
                                        <?php }else{ ?>
                                            <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr2', null, 0);?>
                                        <?php }?>

                                        <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="center" >
                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
 <input type='hidden' name='user_id<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' value = '<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
'></td>
                                            <td> <?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_amount'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount_payable'];?>
<input type='hidden' name='amount<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' value = '<?php echo $_smarty_tpl->tpl_vars['v']->value['amount_payable'];?>
'></td>
                                            <td><a class="btn btn-xs btn-link panel-config" href="#panel-config" onclick="javascript:view_popup(<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
, this.parentNode.parentNode.rowIndex, 'admin', '<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
')"data-toggle="modal" style='color:#C48189;'><?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
</a></td>
                                            <td>
                                                <input type = 'checkbox' name = 'active<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' value= 'yes'  id ='active<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' 
                                                       checked ='checked'  ><label for="active<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"></label>
                                            </td>
                                        </tr>
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['total_amount_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_amount_tot']->value+$_smarty_tpl->tpl_vars['v']->value['total_amount'], null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['tds_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['tds_tot']->value+$_smarty_tpl->tpl_vars['v']->value['tds'], null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['service_charge_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['service_charge_tot']->value+$_smarty_tpl->tpl_vars['v']->value['service_charge'], null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['amount_payable_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['amount_payable_tot']->value+$_smarty_tpl->tpl_vars['v']->value['amount_payable'], null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['leg_amount_carry_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['leg_amount_carry_tot']->value+$_smarty_tpl->tpl_vars['v']->value['leg_amount_carry'], null, 0);?>
                                    <?php } ?>
                                    <tr bgcolor='#5E8487' align='center'>
                                        <td><b></b></td>
                                        <td><b></b></td>
                                        <td><b><?php echo $_smarty_tpl->tpl_vars['tran_total']->value;?>
</b></td>
                                        <td><b><?php echo $_smarty_tpl->tpl_vars['total_amount_tot']->value;?>
</b></td>
                                        <td><b><?php echo $_smarty_tpl->tpl_vars['amount_payable_tot']->value;?>
</b></td>
                                        <td></td>
                                        <td> <input type='hidden' name='total_count' value= '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
'>
                                            <input type= 'submit' value= '<?php echo $_smarty_tpl->tpl_vars['tran_paid']->value;?>
'  id ='update'   name='update'>
                                        </td>

                                    </tr>
                                <div class="form-group">
                                    <!-- REMOVED FOR IMS-169--><!-- <div class="col-sm-2 col-sm-offset-2">
                                         <button class="btn btn-bricky" name="details" id="details" value="<?php echo $_smarty_tpl->tpl_vars['tran_user_details']->value;?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>

                                 </button>
                             </div>-->
                                </div>
                                </tbody>

                            <?php }else{ ?>
                                <h3><?php echo $_smarty_tpl->tpl_vars['tran_no_payout_found']->value;?>
 </h3>
                            <?php }?>          
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    <?php }?>               


    <?php if ($_smarty_tpl->tpl_vars['post_details']->value){?>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>  <?php echo $_smarty_tpl->tpl_vars['tran_binary_payout_release']->value;?>

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
                    <div class="panel-body">
                        <form name="user_details"  id="user_details" method="post">

                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                <thead>
                                    <tr class="th" align="center">
                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_slno']->value;?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_user_id']->value;?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th>
                                        <th><b><?php echo $_smarty_tpl->tpl_vars['tran_amount_payable']->value;?>
</b></th>
                                        <th><b><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
</b></th>
                                        <th><b><?php echo $_smarty_tpl->tpl_vars['tran_mobile']->value;?>
</b></th>
                                        <th><b><?php echo $_smarty_tpl->tpl_vars['tran_bank']->value;?>
</b></th>
                                        <th><b><?php echo $_smarty_tpl->tpl_vars['tran_branch']->value;?>
</b></th>
                                        <th><b><?php echo $_smarty_tpl->tpl_vars['tran_acc_no']->value;?>
</b></th>
                                        <th><b><?php echo $_smarty_tpl->tpl_vars['tran_ifsc']->value;?>
</b></th> 
                                    </tr>

                                </thead>
                                <input type= 'hidden'  name = "date_sub"  value ="<?php echo $_smarty_tpl->tpl_vars['date_sub']->value;?>
" >
                                <input type= 'hidden'  name = "previous_date"  value ="<?php echo $_smarty_tpl->tpl_vars['previous_pyout_date']->value;?>
" >
                                <?php $_smarty_tpl->tpl_vars["length"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['details']->value), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["total_amount_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["tds_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["service_charge_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["amount_payable_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["leg_amount_carry_tot"] = new Smarty_variable(0, null, 0);?>
                                <?php if ($_smarty_tpl->tpl_vars['length']->value>0){?>
                                    <tbody>
                                        <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value){
$_smarty_tpl->tpl_vars["v"]->_loop = true;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                                <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr1', null, 0);?>
                                            <?php }else{ ?>
                                                <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr2', null, 0);?>
                                            <?php }?>

                                            <tr>
                                                <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 <input type='hidden' name='user_id<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' value = '<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
'></td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount_payable'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['address'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['mobile'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['bank'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['branch'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['acc'];?>
</td>  			
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ifsc'];?>
</td>
                                            </tr>
                                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                        <?php } ?>

                                    </tbody>


                                <?php }else{ ?>
                                </table>
                            <?php }?>          

                        </form>
                    </div>
                </div>
            </div>
        </div>             

    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['payout_release_type']->value!="normal"){?>


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_payout_release']->value;?>

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
                <div class="panel-body">

                    <div id="transaction" type="hidden">
                        <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div id="div1"></div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_close']->value;?>

                                        </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>                

                    <form name="ewallet_form_det"  id="ewallet_form_det" method="post">

                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                <tr class="th"> 
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_slno']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_full_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_balance_amount']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_Payout_Amount']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_check']->value;?>
</th>
                                        <?php if ($_smarty_tpl->tpl_vars['payout_release_type']->value=="ewallet_request"){?>
                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_delete']->value;?>
</th>
                                        <?php }?>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_view_user_data']->value;?>
</th>
                                </tr>

                            </thead>
                            <?php $_smarty_tpl->tpl_vars["length"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['details']->value), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["path"] = new Smarty_variable(($_smarty_tpl->tpl_vars['BASE_URL']->value)."admin/", null, 0);?>
                            <input type= 'hidden'  name = "table_rows"  value ="<?php echo $_smarty_tpl->tpl_vars['length']->value;?>
" >
                            <?php if ($_smarty_tpl->tpl_vars['length']->value>0){?>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value){
$_smarty_tpl->tpl_vars["v"]->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                            <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr1', null, 0);?>
                                        <?php }else{ ?>
                                            <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr2', null, 0);?>
                                        <?php }?>

                                        <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="center" >
                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
<input type='hidden' name='user_id<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' value = '<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'></td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['balance_amount'];?>
<input type='hidden' name='balance_amount<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' value = '<?php echo $_smarty_tpl->tpl_vars['v']->value['balance_amount'];?>
'></td>
                                            <td>
                                                <input type='hidden' name='requested_date<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
' value = '<?php echo $_smarty_tpl->tpl_vars['v']->value['requested_date'];?>
'>
                                                <input type="text" name="payout<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" id="payout_amount" value="<?php if ($_smarty_tpl->tpl_vars['payout_release_type']->value=="ewallet_request"){?><?php echo $_smarty_tpl->tpl_vars['v']->value['payout_amount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['payout_amount'];?>
<?php }?>"/>
                                                <span id="errmsg1"></span>
                                            </td>
                                            <td><input type="checkbox" name="release<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" id="release<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="release"/><label for="release<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" /></td>
                                                <?php if ($_smarty_tpl->tpl_vars['payout_release_type']->value=="ewallet_request"){?>
                                                <td><a href="javascript:delete_request(<?php echo $_smarty_tpl->tpl_vars['v']->value['req_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/delete.png" title="Delete <?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
" style="border:none;"></a></td>
                                                    <?php }?>
                                            <td><a class="btn btn-xs btn-link panel-config" href="#panel-config" onclick="javascript:view_popup(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
, this.parentNode.parentNode.rowIndex, 'admin', '<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
')"data-toggle="modal" style='color:#C48189;'><?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
</a></td>
                                        </tr>
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

                                    <?php } ?>                
                                </tbody>


                            <?php }else{ ?>
                                <h3> </h3>
                            <?php }?>          
                        </table>
                        <?php if (count($_smarty_tpl->tpl_vars['details']->value)>0){?>  

                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">

                                    <button class="btn btn-bricky"tabindex="1" name="release_payout" id="release_payout" type="submit" value="release_payout"> <?php echo $_smarty_tpl->tpl_vars['tran_release']->value;?>
 </button>


                                </div>
                            </div> 

                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
                                                jQuery(document).ready(function() {
                                                    Main.init();
                                                    DatePicker.init();

                                                    TableData.init();
                                                    ValidatePayoutRelease.init();
                                                });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
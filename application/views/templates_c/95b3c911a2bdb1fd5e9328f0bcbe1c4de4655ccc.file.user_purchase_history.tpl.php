<?php /* Smarty version Smarty 3.1.4, created on 2015-08-18 07:05:03
         compiled from "application/views/admin/configuration/user_purchase_history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40855232655d31f6f6a1b32-91508362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95b3c911a2bdb1fd5e9328f0bcbe1c4de4655ccc' => 
    array (
      0 => 'application/views/admin/configuration/user_purchase_history.tpl',
      1 => 1439899417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40855232655d31f6f6a1b32-91508362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_user_name' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_nofond' => 0,
    'tran_showing' => 0,
    'tran_to' => 0,
    'tran_of' => 0,
    'tran_entries' => 0,
    'tran_notavailable' => 0,
    'page_header' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_name' => 0,
    'tran_view' => 0,
    'tran_weekly_joining' => 0,
    'tran_from_date' => 0,
    'date_diff' => 0,
    'tran_to_date' => 0,
    'cur_date' => 0,
    'posted' => 0,
    'tran_User_Purchase_Details' => 0,
    'is_valid_username' => 0,
    'tran_Username_not_Exists' => 0,
    'count' => 0,
    'tran_sl_no' => 0,
    'tran_invoice_no' => 0,
    'tran_transaction_id' => 0,
    'tran_joinig_date' => 0,
    'tran_type' => 0,
    'tran_payment_method' => 0,
    'tran_product_amount' => 0,
    'tran_product_quantity' => 0,
    'purchase_histroy' => 0,
    'count_total' => 0,
    'v' => 0,
    'amount_total' => 0,
    'grand_total' => 0,
    'total' => 0,
    'tran_no_referels' => 0,
    'value' => 0,
    'from_date' => 0,
    'to_date' => 0,
    'tran_higher' => 0,
    'tran_user_name' => 0,
    'purchase_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55d31f6f8aa9b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d31f6f8aa9b')) {function content_55d31f6f8aa9b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_user_name']->value;?>
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
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['page_header']->value;?>

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
                <div class="col-sm-12">                   
                    <div class="panel-body">
                        <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform"  method="post" >
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_name"> <?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
<font color="#ff0000" >*</font> </label>
                                <div class="col-sm-3">
                                    <input  name="user_name" id="user_name" type="text" size="30" onkeyup="ajax_showOptions(this, 'getCountriesByLetter', event)" autocomplete="off" tabindex="1">
                                    <span class="help-block" for="user_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <button class="btn btn-bricky" type="submit" id="user_details" value="user_details" name="user_details" tabindex="2">
                                        <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>

                                    </button>
                                </div>
                            </div>
                        </form>
                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
                                        
                                        <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_weekly_joining']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal"  method="post"   name="weekly_join" id="weekly_join"  target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1">
                            <?php echo $_smarty_tpl->tpl_vars['tran_from_date']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="3" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['date_diff']->value;?>
" >
                                <label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2">
                            <?php echo $_smarty_tpl->tpl_vars['tran_to_date']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="4" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['cur_date']->value;?>
" >
                                <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky"tabindex="5" name="weekdate" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
 </button>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                            
                            
<?php if ($_smarty_tpl->tpl_vars['posted']->value){?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
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
                    </div>  <?php echo $_smarty_tpl->tpl_vars['tran_User_Purchase_Details']->value;?>
             

                </div>
                <div class="panel-body">

                    <div class="center">
                        <?php if (!$_smarty_tpl->tpl_vars['is_valid_username']->value){?>
                            <h4 align="center"><font color="#FF0000"><?php echo $_smarty_tpl->tpl_vars['tran_Username_not_Exists']->value;?>
</font></h4>
                            <?php }?>
                    </div> 

                    <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">


                            <thead>
                                <tr class="th" align="center">
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_sl_no']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_invoice_no']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_transaction_id']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_joinig_date']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_type']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_payment_method']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_product_amount']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_product_quantity']->value;?>
</th>      


                                </tr>
                            </thead>
                            <tbody>
                                <?php $_smarty_tpl->tpl_vars["grand_total"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["amount_total"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["count_total"] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchase_histroy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?> 

                                    <?php $_smarty_tpl->tpl_vars['count_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_total']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['quantity']*$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['amount_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['amount_total']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['grand_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['grand_total']->value+$_smarty_tpl->tpl_vars['total']->value, null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+$_smarty_tpl->tpl_vars['v']->value['quantity'], null, 0);?>
                                    <tr class="" align="center" >
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['invoice_no'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trans_id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date_submission'];?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['v']->value['type']==''){?>Registration<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
<?php }?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['payment_method'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['quantity'];?>
</td>                         

                                    </tr>

                                <?php } ?>

                            </tbody>


                        </table>
                    <?php }else{ ?> 
                        <h3><?php echo $_smarty_tpl->tpl_vars['tran_no_referels']->value;?>
</h3>
                    <?php }?>



                </div>
            </div>
        </div>
    </div> 
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['value']->value){?>
   <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
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
                    </div>  <?php echo $_smarty_tpl->tpl_vars['tran_User_Purchase_Details']->value;?>
             

                </div>
                <div class="panel-body">
 <div class="center">
                        <?php if ($_smarty_tpl->tpl_vars['from_date']->value>$_smarty_tpl->tpl_vars['to_date']->value){?>
                            <h4 align="center"><font color="#FF0000"><?php echo $_smarty_tpl->tpl_vars['tran_higher']->value;?>
</font></h4>
                            <?php }?>
                    </div> 

                   

                    <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">


                            <thead>
                                <tr class="th" align="center">
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_sl_no']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_invoice_no']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_transaction_id']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_joinig_date']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_type']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_payment_method']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_product_amount']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_product_quantity']->value;?>
</th>      


                                </tr>
                            </thead>
                            <tbody>
                                <?php $_smarty_tpl->tpl_vars["grand_total"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["amount_total"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["count_total"] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchase_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?> 

                                    <?php $_smarty_tpl->tpl_vars['count_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_total']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['quantity']*$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['amount_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['amount_total']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['grand_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['grand_total']->value+$_smarty_tpl->tpl_vars['total']->value, null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+$_smarty_tpl->tpl_vars['v']->value['quantity'], null, 0);?>
                                    <tr class="" align="center" >
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                         <td><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['invoice_no'];?>
</td>
                                       
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trans_id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date_submission'];?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['v']->value['type']==''){?>Registration<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
<?php }?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['payment_method'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['quantity'];?>
</td>                         

                                    </tr>

                                <?php } ?>

                            </tbody>


                        </table>
                    <?php }else{ ?> 
                        <h3><?php echo $_smarty_tpl->tpl_vars['tran_no_referels']->value;?>
</h3>
                    <?php }?>



                </div>
            </div>
        </div>
    </div> 
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        DatePicker.init();
        ValidateUser.init();
        ;
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
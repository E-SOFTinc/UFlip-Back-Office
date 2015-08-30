<?php /* Smarty version Smarty 3.1.4, created on 2015-08-13 02:23:43
         compiled from "application/views/admin/epin/view_pin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9110180455cc45ff916516-39142825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4988981529b0cd48292a429105ae0985b08f38ff' => 
    array (
      0 => 'application/views/admin/epin/view_pin.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9110180455cc45ff916516-39142825',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_a_date' => 0,
    'tran_you_must_select_a_product_name' => 0,
    'tran_please_type_your_time_to_call' => 0,
    'tran_please_type_your_e_mail_id' => 0,
    'tran_please_enter_your_company_name' => 0,
    'tran_sure_you_want_to_delete_this_feedback_there_is_no_undo' => 0,
    'tran_You_must_select_a_Todate_greaterThan_Fromdate' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_view_date_wise_epin_allocation' => 0,
    'tran_errors_check' => 0,
    'tran_from' => 0,
    'tran_to' => 0,
    'tran_submit' => 0,
    'flag' => 0,
    'details_arr' => 0,
    'tran_no' => 0,
    'tran_epin' => 0,
    'tran_amount' => 0,
    'tran_balance_amount' => 0,
    'tran_status' => 0,
    'tran_used_user' => 0,
    'tran_allocated_user' => 0,
    'tran_date' => 0,
    'tran_expiry_date' => 0,
    'i' => 0,
    'v' => 0,
    'tran_active' => 0,
    'class' => 0,
    'status' => 0,
    'user' => 0,
    'allocated_user' => 0,
    'result_per_page' => 0,
    'tran_no_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55cc45ffb2a67',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55cc45ffb2a67')) {function content_55cc45ffb2a67($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_a_date']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_a_date']->value;?>
</span>        
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_product_name']->value;?>
</span>        
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_time_to_call']->value;?>
</span>                  
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_e_mail_id']->value;?>
</span>
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>
    <span id="confirm_msg"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_feedback_there_is_no_undo']->value;?>
</span>
    <span id ="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_Todate_greaterThan_Fromdate']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_view_date_wise_epin_allocation']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="user_select_form" id="user_select_form" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i><?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1">
                            <?php echo $_smarty_tpl->tpl_vars['tran_from']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group info_block">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="1" size="20" maxlength="10"  value="" >
                                <label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>

                            </div>
                        </div>

                        <label class="col-sm-2 control-label" for="week_date2">
                            <?php echo $_smarty_tpl->tpl_vars['tran_to']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group info_block">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="2" size="20" maxlength="10"  value="" >
                                <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>

                    </div>             


                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="date_submit" id="date_submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
" tabindex="3">
                                <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>

                            </button>
                        </div>
                    </div>


                    <?php if ($_smarty_tpl->tpl_vars['flag']->value){?>
                        <?php if (count($_smarty_tpl->tpl_vars['details_arr']->value)>0){?>
                            <hr />

                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                <thead>
                                    <tr class="th" align="center">
                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_balance_amount']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_used_user']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_allocated_user']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
                                        <th align="center"><?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("0", null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>

                                            <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr1", null, 0);?>

                                        <?php }else{ ?>

                                            <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr2", null, 0);?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['v']->value['status']=="yes"){?>

                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_active']->value), null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["user"] = new Smarty_variable("NULL", null, 0);?>
                                        <?php }else{ ?>

                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable("USED", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["user"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['used_user']), null, 0);?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['v']->value['allocated_user']==''){?>
                                            <?php $_smarty_tpl->tpl_vars["allocated_user"] = new Smarty_variable("NULL", null, 0);?>
                                        <?php }else{ ?>
                                            <?php $_smarty_tpl->tpl_vars["allocated_user"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['allocated_user'], null, 0);?>
                                        <?php }?>   
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

                                        <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="center" >
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_numbers'];?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_balance_amount'];?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['allocated_user']->value;?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_uploded_date'];?>
</td>
                                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['expiry_date'];?>
</td>

                                        </tr>

                                    <?php } ?>             
                                </tbody>
                            </table>
                            <?php echo $_smarty_tpl->tpl_vars['result_per_page']->value;?>


                        <?php }else{ ?>
                            <h3> <?php echo $_smarty_tpl->tpl_vars['tran_no_data']->value;?>
</h3>
                        <?php }?>            
                    <?php }?>           


                </form>
            </div>
        </div>
    </div>
</div>          


<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateUserr.init();
        DateTimePicker.init();
        TableData.init();


    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
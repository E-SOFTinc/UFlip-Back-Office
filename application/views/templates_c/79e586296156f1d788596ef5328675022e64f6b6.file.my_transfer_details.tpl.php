<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:22:21
         compiled from "application/views/admin/ewallet/my_transfer_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71858915255bba0bd40bbf8-96868340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79e586296156f1d788596ef5328675022e64f6b6' => 
    array (
      0 => 'application/views/admin/ewallet/my_transfer_details.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71858915255bba0bd40bbf8-96868340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_select_user' => 0,
    'tran_You_must_select_a_date' => 0,
    'tran_invalid_period' => 0,
    'tran_You_must_select_a_Todate_greaterThan_Fromdate' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_weekly_transfer' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_name' => 0,
    'tran_from_date' => 0,
    'tran_to_date' => 0,
    'tran_submit' => 0,
    'PUBLIC_URL' => 0,
    'weekdate' => 0,
    'details_count' => 0,
    'count' => 0,
    'tran_weekly_transfer_details' => 0,
    'tran_slno' => 0,
    'tran_user_name' => 0,
    'tran_date' => 0,
    'tran_amount' => 0,
    'tran_transfer_type' => 0,
    'details' => 0,
    'v' => 0,
    'amount_type' => 0,
    'i' => 0,
    'class' => 0,
    'user_name' => 0,
    'date' => 0,
    'amount' => 0,
    'type' => 0,
    'tran_no_transfer_details' => 0,
    'tran_daily_transfer' => 0,
    'daily' => 0,
    'tran_daily_transfer_details' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba0bd62516',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba0bd62516')) {function content_55bba0bd62516($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_user']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_date']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_period']->value;?>
</span> 
    <span id ="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_Todate_greaterThan_Fromdate']->value;?>
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
                <i class="fa fa-external-link-square"></i>  <?php echo $_smarty_tpl->tpl_vars['tran_weekly_transfer']->value;?>
 
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
                <form role="form" class="smart-wizard form-horizontal" name="weekly_join" id="weekly_join" action="" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" tabindex="1" ></td>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1"><?php echo $_smarty_tpl->tpl_vars['tran_from_date']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="2" size="20" maxlength="10" >
				<label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>


                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2"><?php echo $_smarty_tpl->tpl_vars['tran_to_date']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="3" size="20" maxlength="10"   >
				<label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>


                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" id="weekdate" value="profile_update" name="weekdate" tabindex="4">
                                <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>

                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                </form>
            </div>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['weekdate']->value){?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_weekly_transfer']->value;?>
 
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

                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable("0", null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['amount'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['date'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['details_count']->value, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?> 
                        <h3><?php echo $_smarty_tpl->tpl_vars['tran_weekly_transfer_details']->value;?>
</h3>
                        </br>
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>    
                                <tr class="th">
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_slno']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_transfer_type']->value;?>
</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <?php $_smarty_tpl->tpl_vars['amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['total_amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['date'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['date'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['amount_type'], null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['amount_type']->value=="user_credit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("User Credit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="user_debit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("User Debit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="admin_debit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Admin Debit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="admin_credit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Admin Credit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="fsb"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Fast Start Bonus", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="direct_commission"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Direct Commission", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="binary_match"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Binary Match Commission", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="leg"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Binary Commission", null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr2", null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr1", null, 0);?>
                                    <?php }?>
                                    <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</td>
                                        <td align="center" ><?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php }else{ ?>
                        <h3> <?php echo $_smarty_tpl->tpl_vars['tran_no_transfer_details']->value;?>
</h3>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   <?php echo $_smarty_tpl->tpl_vars['tran_daily_transfer']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal"  name="daily_transfer" id="daily_transfer" action="" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name1"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="text" id="user_name1" name="user_name1"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" tabindex="5" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date3"><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
<span class="symbol required"></span></label>
                        <div  class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date3" id="week_date3" type="text" tabindex="6" size="20" maxlength="10" >
				<label for="week_date3" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>


                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" name="daily" id="daily"  value="profile_update" name="weekdate" tabindex="7">
                                <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>

                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                </form>
            </div>
        </div>
    </div>
</div>





<?php if ($_smarty_tpl->tpl_vars['daily']->value){?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_daily_transfer']->value;?>

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
                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable("0", null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['amount'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['date'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('', null, 0);?>

                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['details_count']->value, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
                        <h3><?php echo $_smarty_tpl->tpl_vars['tran_daily_transfer_details']->value;?>
</h3>
                        </br>


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1" >
                            <thead>
                                <tr class="th" >
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_slno']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_transfer_type']->value;?>
</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <?php $_smarty_tpl->tpl_vars['amount'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['total_amount'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['date'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['date'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['amount_type'], null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['amount_type']->value=="user_credit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("User Credit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="user_debit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("User Debit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="admin_debit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Admin Debit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="admin_credit"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Admin Credit", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="fsb"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Fast Start Bonus", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="direct_commission"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Direct Commission", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="binary_match"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Binary Match Commission", null, 0);?>
                                    <?php }elseif($_smarty_tpl->tpl_vars['amount_type']->value=="leg"){?>
                                        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable("Binary Commission", null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr2", null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr1", null, 0);?>
                                    <?php }?>	
                                    <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</td>
                                        <td align="center" ><?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php }else{ ?>
                        <h3> <?php echo $_smarty_tpl->tpl_vars['tran_no_transfer_details']->value;?>
</h3>
                    <?php }?>


                </div>
            </div>
        </div>
    </div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
	Main.init();
	TableData.init();
	DatePicker.init();
	ValidateUser.init();

    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
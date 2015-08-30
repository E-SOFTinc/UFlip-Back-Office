<?php /* Smarty version Smarty 3.1.4, created on 2015-08-04 02:19:16
         compiled from "application/views/admin/select_report/total_payout_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192597754055bba33bf39b67-55860557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '501a059596afb199ae517a057e5ef86743fa934e' => 
    array (
      0 => 'application/views/admin/select_report/total_payout_report.tpl',
      1 => 1438579258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192597754055bba33bf39b67-55860557',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba33c0dd35',
  'variables' => 
  array (
    'tran_You_must_select_from_date' => 0,
    'tran_You_must_select_to_date' => 0,
    'tran_You_must_Select_From_To_Date_Correctly' => 0,
    'tran_You_must_enter_user_name' => 0,
    'tran_You_must_select_a_Todate_greaterThan_Fromdate' => 0,
    'tran_total_payout_report' => 0,
    'tran_errors_check' => 0,
    'tran_user_payout_report' => 0,
    'tran_view' => 0,
    'tran_weekly_payout' => 0,
    'tran_from_date' => 0,
    'date_diff' => 0,
    'tran_to_date' => 0,
    'cur_date' => 0,
    'tran_submit' => 0,
    'tran_member_wise_payout_report' => 0,
    'tran_select_user' => 0,
    'tran_payout_released_report' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba33c0dd35')) {function content_55bba33c0dd35($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display:none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_from_date']->value;?>
</span>
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_to_date']->value;?>
</span>
    <span id="errmsg4"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_Select_From_To_Date_Correctly']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_user_name']->value;?>
</span>
    <span id ="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_Todate_greaterThan_Fromdate']->value;?>
</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>      <?php echo $_smarty_tpl->tpl_vars['tran_total_payout_report']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" action="../report/total_payout_report_view"  method="post"    name="daily" id="daily" target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="dailydate">
                            <?php echo $_smarty_tpl->tpl_vars['tran_user_payout_report']->value;?>

                        </label>
                        <div class="col-sm-6">
                            <button class="btn btn-bricky" tabindex="1" name="dailydate" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
 </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>      <?php echo $_smarty_tpl->tpl_vars['tran_weekly_payout']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal"  action="../report/weekly_payout_report"  method="post"    name="weekly_payout" id="weekly_payout" target="_blank">
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
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="2" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['date_diff']->value;?>
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
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="3" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['cur_date']->value;?>
" >
                                <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="4" name="weekdate" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
 </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>  <?php echo $_smarty_tpl->tpl_vars['tran_member_wise_payout_report']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" action="../report/member_payout_report" method="post" name="user" id="user" target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">
                            <?php echo $_smarty_tpl->tpl_vars['tran_select_user']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input  type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="5" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky"tabindex="6" name="user_submit" type="submit"style="margin: 5px 0 0 20px;" value="<?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
 </button>


                        </div>
                    </div>      




                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>      <?php echo $_smarty_tpl->tpl_vars['tran_payout_released_report']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal"  action="../report/payout_released_report"  method="post" name="payout_release_amount" id="payout_release_amount" target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date3">
                            <?php echo $_smarty_tpl->tpl_vars['tran_from_date']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date3" id="week_date3" type="text" tabindex="11" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['date_diff']->value;?>
" >
                                <label for="week_date3" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date4">
                            <?php echo $_smarty_tpl->tpl_vars['tran_to_date']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date4" id="week_date4" type="text" tabindex="12" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['cur_date']->value;?>
" >
                                <label for="week_date4" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="13" name="weekdate" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
 </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                            

<?php echo $_smarty_tpl->getSubTemplate ("../layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        DatePicker.init();
        ValidateUser.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
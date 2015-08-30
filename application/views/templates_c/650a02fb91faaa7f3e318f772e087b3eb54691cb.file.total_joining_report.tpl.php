<?php /* Smarty version Smarty 3.1.4, created on 2015-08-03 23:05:42
         compiled from "application/views/admin/select_report/total_joining_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9399594255c03a1618e685-72185436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '650a02fb91faaa7f3e318f772e087b3eb54691cb' => 
    array (
      0 => 'application/views/admin/select_report/total_joining_report.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9399594255c03a1618e685-72185436',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_You_must_select_from_date' => 0,
    'tran_You_must_select_to_date' => 0,
    'tran_You_must_Select_From_To_Date_Correctly' => 0,
    'tran_You_must_select_a_date' => 0,
    'tran_You_must_select_a_Todate_greaterThan_Fromdate' => 0,
    'tran_daily_joining' => 0,
    'tran_errors_check' => 0,
    'tran_date' => 0,
    'tran_submit' => 0,
    'tran_weekly_joining' => 0,
    'tran_from_date' => 0,
    'tran_to_date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c03a1621a5e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c03a1621a5e')) {function content_55c03a1621a5e($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display:none;">
    <span id ="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_from_date']->value;?>
</span>
    <span id ="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_to_date']->value;?>
</span>
    <span id ="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_Select_From_To_Date_Correctly']->value;?>
</span>
    <span id ="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_date']->value;?>
</span>
    <span id ="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_Todate_greaterThan_Fromdate']->value;?>
</span>
    </span>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_daily_joining']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" action="../report/total_joining_daily"  method="post"  name="daily" id="daily" target="_blank" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="date">
                            <?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date" id="date" type="text" tabindex="1" size="20" maxlength="10"  value="" >
                                <label for="date" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky"tabindex="2" name="dailydate" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
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
                <form role="form" class="smart-wizard form-horizontal" action="../report/total_joining_weekly"  method="post"   name="weekly_join" id="weekly_join"  target="_blank">
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
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="3" size="20" maxlength="10"  value="" >
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
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="4" size="20" maxlength="10"  value="" >
                                <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky"tabindex="5" name="weekdate" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
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
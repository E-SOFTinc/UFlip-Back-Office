<?php /* Smarty version Smarty 3.1.4, created on 2015-08-03 23:05:05
         compiled from "application/views/admin/select_report/commission_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179067575255c039f179a3c1-59224154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd333a8b7dabd50d5e3a3e7ed762ae9c337608605' => 
    array (
      0 => 'application/views/admin/select_report/commission_report.tpl',
      1 => 1438579233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179067575255c039f179a3c1-59224154',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_You_must_select_from_date' => 0,
    'tran_You_must_select_to_date' => 0,
    'tran_You_must_Select_From_To_Date_Correctly' => 0,
    'tran_you_must_select_product' => 0,
    'tran_You_must_select_a_Todate_greaterThan_Fromdate' => 0,
    'tran_commission_report' => 0,
    'tran_errors_check' => 0,
    'tran_from_date' => 0,
    'date_diff' => 0,
    'tran_to_date' => 0,
    'cur_date' => 0,
    'tran_amount_type' => 0,
    'tran_select_amount_type' => 0,
    'i' => 0,
    'count_commission' => 0,
    'commission_types' => 0,
    'tran_submit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c039f1844c2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c039f1844c2')) {function content_55c039f1844c2($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">

    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_from_date']->value;?>
</span>
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_to_date']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_Select_From_To_Date_Correctly']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_product']->value;?>
</span>
    <span id ="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_Todate_greaterThan_Fromdate']->value;?>
</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_commission_report']->value;?>

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

                <form role="form" class="smart-wizard form-horizontal" action="../report/commission_report_view"  method="post"  name="commision_form" id="commision_form" target="_blank" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from_date">
                            <?php echo $_smarty_tpl->tpl_vars['tran_from_date']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="from_date" id="from_date" type="text" tabindex="1" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['date_diff']->value;?>
" >
                                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                            </div>
                        </div>
                        <label class="col-sm-1 control-label" for="to_date" style="width: 100px;">
                            <?php echo $_smarty_tpl->tpl_vars['tran_to_date']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="to_date" id="to_date" type="text" tabindex="1" size="20" maxlength="10"  value="<?php echo $_smarty_tpl->tpl_vars['cur_date']->value;?>
" >
                                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="type">
                            <?php echo $_smarty_tpl->tpl_vars['tran_amount_type']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-md-3"> 

                            <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_amount_type']->value;?>
</option>
                            <select multiple name="amount_type[]" id="amount_type" style="vertical-align: top;width: 200px;">
                                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->tpl_vars['i']->value<$_smarty_tpl->tpl_vars['count_commission']->value){ for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value<$_smarty_tpl->tpl_vars['count_commission']->value; $_smarty_tpl->tpl_vars['i']->value++){
?>

                                    <option value="<?php echo $_smarty_tpl->tpl_vars['commission_types']->value[$_smarty_tpl->tpl_vars['i']->value]['db_amt_type'];?>
"><?php echo $_smarty_tpl->tpl_vars['commission_types']->value[$_smarty_tpl->tpl_vars['i']->value]['view_amt_type'];?>
</option>


                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky" tabindex="5" name="commision" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
 </button>


                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        DatePicker.init();
        ValidateCommissionReport.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
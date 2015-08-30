<?php /* Smarty version Smarty 3.1.4, created on 2015-08-13 02:23:30
         compiled from "application/views/admin/epin/allocate_pin_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211221913755cc45f26f3749-32331966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98620dbdeab9e63d0294deba8c59ecd808878068' => 
    array (
      0 => 'application/views/admin/epin/allocate_pin_user.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211221913755cc45f26f3749-32331966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_count' => 0,
    'tran_You_must_enter_user_name' => 0,
    'tran_you_must_select_a_product_name' => 0,
    'tran_please_type_your_time_to_call' => 0,
    'tran_please_type_your_e_mail_id' => 0,
    'tran_You_must_select_a_date' => 0,
    'tran_past_expiry_date' => 0,
    'tran_you_must_select_an_amount' => 0,
    'tran_please_enter_your_company_name' => 0,
    'tran_sure_you_want_to_delete_this_feedback_there_is_no_undo' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_epin_allocation_to_user' => 0,
    'tran_errors_check' => 0,
    'tran_select_user' => 0,
    'tran_amount' => 0,
    'tran_select_amount' => 0,
    'amount_details' => 0,
    'v' => 0,
    'i' => 0,
    'tran_epin_count' => 0,
    'tran_expiry_date' => 0,
    'tran_submit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55cc45f27a0fb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55cc45f27a0fb')) {function content_55cc45f27a0fb($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_count']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_user_name']->value;?>
</span>        
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_product_name']->value;?>
</span>        
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_time_to_call']->value;?>
</span>                  
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_e_mail_id']->value;?>
</span>
    <span id ="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_date']->value;?>
</span>
    <span id ="error_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_past_expiry_date']->value;?>
</span>
    <span id ="error_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_an_amount']->value;?>
</span>
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>
    <span id="confirm_msg"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_feedback_there_is_no_undo']->value;?>
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
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_epin_allocation_to_user']->value;?>

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
                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user']->value;?>
<font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="1" type="text" name="user_name" id="user_name" size="20" value="" onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no', event)" 
                                   title="" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount"><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
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
                        <label class="col-sm-2 control-label" for="count"><?php echo $_smarty_tpl->tpl_vars['tran_epin_count']->value;?>
 <font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="3" type="text" name="count" id="count" size="20" value="" title=""class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="date">
                            <?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date" id="date" type="text" tabindex="3" size="10" maxlength="10"  value="" />
                                <label for="date" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                        
                    </div>
                    <span for="date" class="help-block">    </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="insert" id="insert" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
" tabindex="4">
                                <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>

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
                                    ValidateUser.init();
                                    DateTimePicker.init();
                                });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
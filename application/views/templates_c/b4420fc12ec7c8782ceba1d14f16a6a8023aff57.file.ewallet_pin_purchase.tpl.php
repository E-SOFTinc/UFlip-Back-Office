<?php /* Smarty version Smarty 3.1.4, created on 2015-08-17 22:24:37
         compiled from "application/views/user/ewallet/ewallet_pin_purchase.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106664654955d2a5750e7628-04988091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4420fc12ec7c8782ceba1d14f16a6a8023aff57' => 
    array (
      0 => 'application/views/user/ewallet/ewallet_pin_purchase.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106664654955d2a5750e7628-04988091',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_You_must_enter_pin_count' => 0,
    'tran_Please_type_transaction_password' => 0,
    'tran_you_must_select_an_amount' => 0,
    'tran_please_type_your_time_to_call' => 0,
    'tran_please_type_your_e_mail_id' => 0,
    'tran_please_enter_your_company_name' => 0,
    'tran_sure_you_want_to_delete_this_feedback_there_is_no_undo' => 0,
    'tran_e_pin_purchase' => 0,
    'tran_errors_check' => 0,
    'tran_your_current_bal' => 0,
    'balamount' => 0,
    'tran_amount' => 0,
    'tran_select_amount' => 0,
    'amount_details' => 0,
    'v' => 0,
    'i' => 0,
    'tran_epin_count' => 0,
    'tran_transaction_password' => 0,
    'tran_pin_purchase' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55d2a5751d915',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d2a5751d915')) {function content_55d2a5751d915($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_pin_count']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_Please_type_transaction_password']->value;?>
</span>        
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_an_amount']->value;?>
</span>        
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_time_to_call']->value;?>
</span>                  
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_e_mail_id']->value;?>
</span>
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>

    <span id="confirm_msg"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_feedback_there_is_no_undo']->value;?>
</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_e_pin_purchase']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="searchform" id="searchform" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i><?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> <?php echo $_smarty_tpl->tpl_vars['tran_your_current_bal']->value;?>
:
                        </label>
                        <div class="col-sm-3">

                            <input tabindex="1" type="text" name="balance" id="balance" size="20" value=" <?php echo $_smarty_tpl->tpl_vars['balamount']->value;?>
" disabled="true"/>
                        </div>
                    </div>               





                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount"><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
:<font color="#ff0000">*</font>:</label>



                        <div class="col-md-3">
                            <select name="amount" id="amount" tabindex="1"  class="form-control">
                                <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_amount']->value;?>
</option>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amount_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</option>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                <?php } ?>
                            </select>     
                        </div>


                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin_count"><?php echo $_smarty_tpl->tpl_vars['tran_epin_count']->value;?>
:<font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="2" type="text" name="pin_count" id="pin_count" size="20" value="" 
                                   title=""/>
                        </div>
                    </div>





                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="passcode"><?php echo $_smarty_tpl->tpl_vars['tran_transaction_password']->value;?>
<font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="3" type="password" name="passcode" id="passcode" size="20" value="" 
                                   title=""/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="transfer" id="transfer" value="<?php echo $_smarty_tpl->tpl_vars['tran_pin_purchase']->value;?>
" tabindex="4">
                                <?php echo $_smarty_tpl->tpl_vars['tran_pin_purchase']->value;?>

                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>          


<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();


        ValidateUser.init();
        DateTimePicker.init();
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
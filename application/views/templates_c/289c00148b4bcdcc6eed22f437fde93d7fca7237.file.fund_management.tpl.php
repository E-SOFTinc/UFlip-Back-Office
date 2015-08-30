<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:22:01
         compiled from "application/views/admin/ewallet/fund_management.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20352996755bba0a946e899-02658541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '289c00148b4bcdcc6eed22f437fde93d7fca7237' => 
    array (
      0 => 'application/views/admin/ewallet/fund_management.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20352996755bba0a946e899-02658541',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_select_user' => 0,
    'tran_Please_type_Amount' => 0,
    'tran_invalid_amount' => 0,
    'tran_digits_only' => 0,
    'tran_ewallet_fund_management' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'tran_errors_check' => 0,
    'tran_enter_user_name' => 0,
    'tran_amount' => 0,
    'tran_transaction_note' => 0,
    'tran_add_amount' => 0,
    'tran_deduct_amount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba0a94fa02',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba0a94fa02')) {function content_55bba0a94fa02($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_user']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_Please_type_Amount']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_amount']->value;?>
</span>
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_digits_only']->value;?>
</span>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    <?php echo $_smarty_tpl->tpl_vars['tran_ewallet_fund_management']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal"  action="" method="post"  name="fund_form" id="fund_form" >
                    <input type="hidden" name="path" id="path" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin" >
                    <input type="hidden" name="fund1" id="fund1" value="" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">
                            <?php echo $_smarty_tpl->tpl_vars['tran_enter_user_name']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this,'getCountriesByLetters','no',event)"  autocomplete="Off" tabindex="1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount">
                            <?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="amount" name="amount" onkeypress="getAmountLeg();" tabindex="3" />
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tran_concept">
                            <?php echo $_smarty_tpl->tpl_vars['tran_transaction_note']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="tran_concept" name="tran_concept" tabindex="3" />
                        </div>
                    </div>
					<div class="col-sm-offset-2">
                    <div class="form-group"  style="float: left; margin-right: 0px;">
                        <div class="col-sm-2">
                            <button class="btn btn-bricky" tabindex="3" name="add_amount" id="add_amount"  type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_add_amount']->value;?>
" > <?php echo $_smarty_tpl->tpl_vars['tran_add_amount']->value;?>
</button>
                        </div>
                    </div>


                    <div class="form-group"  style="float: left; text-align: left; width: 100px;">
                        <div class="col-sm-2 ">
                            <button class="btn btn-bricky" tabindex="3"  name="deduct_amount" id="deduct_amount" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_deduct_amount']->value;?>
" > <?php echo $_smarty_tpl->tpl_vars['tran_deduct_amount']->value;?>
</button>


                        </div>
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
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
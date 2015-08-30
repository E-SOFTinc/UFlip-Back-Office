<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:22:10
         compiled from "application/views/admin/ewallet/fund_transfer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139938810355bba0b2772446-98802685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1350fb52da3456db2ffdbab951fbd6ae2f2df97' => 
    array (
      0 => 'application/views/admin/ewallet/fund_transfer.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139938810355bba0b2772446-98802685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_You_must_enter_user_name' => 0,
    'tran_NO_BALANCE' => 0,
    'tran_Please_type_transaction_password' => 0,
    'tran_Please_type_To_User_name' => 0,
    'tran_Please_type_Amount' => 0,
    'tran_you_dont_have_enough_balance' => 0,
    'tran_digits_only' => 0,
    'tran_ewallet' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_name' => 0,
    'tran_transaction_password' => 0,
    'tran_select_to_user' => 0,
    'tran_amount' => 0,
    'tran_submit' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba0b27f051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba0b27f051')) {function content_55bba0b27f051($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>



      <div id="span_js_messages" style="display:none;">
            <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_user_name']->value;?>
</span>
            <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_NO_BALANCE']->value;?>
</span>
            <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_Please_type_transaction_password']->value;?>
</span>
            <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_Please_type_To_User_name']->value;?>
</span>                     
            <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_Please_type_Amount']->value;?>
</span>
            <span id="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_dont_have_enough_balance']->value;?>
</span>     
            <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_digits_only']->value;?>
</span>
        </div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_ewallet']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" method="post" name="fund_form" id="fund_form" action="../ewallet/fund_transfer" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this,'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1" />
                        </div>
                    </div>
                        <div class="form-group">
                            <div id="fund1"> </div>
                        </div>   
                        

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pswd">
                            <?php echo $_smarty_tpl->tpl_vars['tran_transaction_password']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                           <!--<input type="password" id="pswd" name="pswd" onChange="getPasswordMd(this.value);"  tabindex="2"/>-->
                           <input type="password" id="pswd" name="pswd" tabindex="2" onkeypress="getAmountLeg();"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="to_user_name">
                            <?php echo $_smarty_tpl->tpl_vars['tran_select_to_user']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                           <input type="text" id="to_user_name" name="to_user_name"  onKeyUp="ajax_showOptions(this,'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="3" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount"><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
 <span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="text" id="amount" name="amount" tabindex="4" />
                            <span id="errmsg1"></span>
                        </div>
                    </div>

                                      
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                         
                                <button class="btn btn-bricky"tabindex="5" name="fund_trans" id="fund_trans" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['tran_submit']->value;?>
 </button>
                           
                        </div>
                    </div>
    <input type="hidden" name="path" id="path" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin" >
                </form>
            </div>
        </div>

    </div>
</div>         
                                                                         
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
        jQuery(document).ready(function() {
        Main.init();
        ValidateFund.init();
        
    });
   
    </script>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
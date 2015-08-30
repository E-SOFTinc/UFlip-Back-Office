<?php /* Smarty version Smarty 3.1.4, created on 2015-08-17 22:24:45
         compiled from "application/views/user/payout/payout_release_request.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202913590955d2a57daef901-76078410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2de51929c5684dfec333ea003b6845edb78cefcb' => 
    array (
      0 => 'application/views/user/payout/payout_release_request.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202913590955d2a57daef901-76078410',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_please_enter_your_company_name' => 0,
    'tran_please_type_your_comments' => 0,
    'tran_please_type_your_phone_no' => 0,
    'tran_please_type_your_time_to_call' => 0,
    'tran_please_type_your_e_mail_id' => 0,
    'tran_sure_you_want_to_delete_this_feedback_there_is_no_undo' => 0,
    'tran_Request_Payout_Release' => 0,
    'tran_errors_check' => 0,
    'tran_Minimum_Payout_Amount' => 0,
    'minimum_payout_amount' => 0,
    'tran_Payout_Request_Amount' => 0,
    'balance_amount' => 0,
    'tran_Send_Request' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55d2a57db7a2e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d2a57db7a2e')) {function content_55d2a57db7a2e($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_comments']->value;?>
</span>        
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_phone_no']->value;?>
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
                </div>
                 <?php echo $_smarty_tpl->tpl_vars['tran_Request_Payout_Release']->value;?>
        
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="payout_request" id="payout_request" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company"><?php echo $_smarty_tpl->tpl_vars['tran_Minimum_Payout_Amount']->value;?>
:</label>
                        <div class="col-sm-6">
<?php echo $_smarty_tpl->tpl_vars['minimum_payout_amount']->value;?>
   
                        <input type="hidden" name="minimum_payout_amount" id="minimum_payout_amount" value="<?php echo $_smarty_tpl->tpl_vars['minimum_payout_amount']->value;?>
" />

                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company"><?php echo $_smarty_tpl->tpl_vars['tran_Payout_Request_Amount']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text" name="payout_amount" id="payout_amount" value="<?php echo $_smarty_tpl->tpl_vars['balance_amount']->value;?>
"  autocomplete="Off" >
                           
                        </div>
                    </div>

                   

                    


                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="payout_request_submit" id="payout_request_submit" value="Send Request">
                            <?php echo $_smarty_tpl->tpl_vars['tran_Send_Request']->value;?>
  
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
    
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
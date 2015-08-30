<?php /* Smarty version Smarty 3.1.4, created on 2015-08-19 22:24:06
         compiled from "application/views/user/mail/reply_mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125584597155d54856d90cf4-24349989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7bd496afa403afdf0304c839a6e1b6e978cc3f4' => 
    array (
      0 => 'application/views/user/mail/reply_mail.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125584597155d54856d90cf4-24349989',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_message_here' => 0,
    'tran_you_must_select_user' => 0,
    'tran_you_must_enter_subject_here' => 0,
    'tran_reply_mail' => 0,
    'tran_errors_check' => 0,
    'tran_user_name' => 0,
    'reply_user' => 0,
    'tran_subject' => 0,
    'reply_msg' => 0,
    'tran_message_to_send' => 0,
    'tran_send_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55d54856e0c66',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d54856e0c66')) {function content_55d54856e0c66($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_message_here']->value;?>
   </span>        

    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_user']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_subject_here']->value;?>
</span>                  

</div>      



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_reply_mail']->value;?>

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
            <form role="form" class="smart-wizard form-horizontal" method="post" name="compose" id="compose"  >
                <div class="col-md-12">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="user_id"><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
<span class="symbol required"></span></label>

                    <div class="col-sm-6">
                        <input type="text" id="user_id" name="user_id"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1" readonly class="col-sm-2 form-control" value="<?php echo $_smarty_tpl->tpl_vars['reply_user']->value;?>
" />
                    </div>
                </div>
                <div class="form-group">
                    <div id="fund1"> </div>
                </div>   


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="subject"><?php echo $_smarty_tpl->tpl_vars['tran_subject']->value;?>
<span class="symbol required"></span></label>
                    <div class="col-sm-6">
                        <input name="subject" type="text" id="subject"  value=" Rep:<?php echo $_smarty_tpl->tpl_vars['reply_msg']->value;?>
"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event);" autocomplete="Off" tabindex="1"  >

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="message">
                        <?php echo $_smarty_tpl->tpl_vars['tran_message_to_send']->value;?>
<span class="symbol required"></span>
                    </label>

                    <div class="col-sm-6">
                        <textarea name='message' id='message' rows='20' cols='40'></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-2">

                        <button class="btn btn-bricky" type="submit" id="send" value="<?php echo $_smarty_tpl->tpl_vars['tran_send_message']->value;?>
" name="send" tabindex="2">
                            <?php echo $_smarty_tpl->tpl_vars['tran_send_message']->value;?>
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
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-05 06:43:44
         compiled from "application/views/login/forgot_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211770065455bb787ee33109-06489855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '293e5a928b05d86cfa659296340308d79bf64f8b' => 
    array (
      0 => 'application/views/login/forgot_password.tpl',
      1 => 1438774525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211770065455bb787ee33109-06489855',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb787eeabff',
  'variables' => 
  array (
    'PUBLIC_URL' => 0,
    'site_info' => 0,
    'tran_forgot_password' => 0,
    'tran_invalid_user' => 0,
    'tran_invalid_email' => 0,
    'tran_errors_check' => 0,
    'tran_user_name' => 0,
    'tran_email' => 0,
    'BASE_URL' => 0,
    'tran_not_readable' => 0,
    'tran_send_request' => 0,
    'tran_back' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb787eeabff')) {function content_55bb787eeabff($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

    <div class="main-login col-sm-4 col-sm-offset-4">
        <div class="logo">
            <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['site_info']->value["logo"];?>
" />
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <h2><?php echo $_smarty_tpl->tpl_vars['tran_forgot_password']->value;?>
</h2>
            <p>
            <mesasge><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/error_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'','name'=>''), 0);?>
</mesasge>
            </p>
            <div id="span_js_messages" style="display:none;">
                <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_user']->value;?>
</span>        
                <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_invalid_email']->value;?>
</span>        
            </div>

            <form class="login_form" id="forgot_password" name="forgot_password" method="post" onload="document.getElementById('captcha-form').focus()" >

                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i><?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                </div>
                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control"  id="user_name" name="user_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
" AUTOCOMPLETE = "OFF" tabindex="1" >
                            <i class="fa fa-user"></i> </span><span class="help-block" for="user_name"></span>
                    </div>

                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control"  id="e_mail" name="e_mail" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
" AUTOCOMPLETE = "OFF" tabindex="2" >   
                            
                            
                            <div class="imgcaptcha">
                                        <div class="Change-text" style="text-align:right;font-size: 12px;white-space: nowrap;">
                                     <a href="#" onclick="
                                                document.getElementById('captcha').src = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
login/captcha/admin/' + Math.random();
                                                document.getElementById('captcha-form').focus();"
                                                id="change-image" class="color"><?php echo $_smarty_tpl->tpl_vars['tran_not_readable']->value;?>
</a></div>
                                 <div class="col-md-6 col-my" style="padding:0px; text-align:left;">  
								 <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
login/captcha/admin" id="captcha" /></div>
                                     <div class="col-md-6 col-my" style="padding:0px;">   
											<div class="width-media">	
                                        <input type="text" style="width:100%;" name="captcha" id="captcha-form" autocomplete="off" tabindex="3" /><br/></div>
										</div>
                                    </div>
                            
                            
                            
                            
                            
                            
                               </div>
                                                 <div class="form-actions">
                                                     </div>
                    <div class="form-actions">

                       
                        <input type="submit" class="btn btn-bricky pull-right" id="forgot_password_submit" name="forgot_password_submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_send_request']->value;?>
" tabindex="4" >&nbsp;

                        <leftspan style="float:none"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" ><div class="btn btn-light-grey go-back">
                            <i class="fa fa-circle-arrow-left"></i> <?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

                            </div></a></leftspan>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>



    <script>
        jQuery(document).ready(function() {
            ValidateUser.init();
        });
    </script>
</body>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/login_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }} ?>
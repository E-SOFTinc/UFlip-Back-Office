<?php /* Smarty version Smarty 3.1.4, created on 2015-08-05 05:57:09
         compiled from "application/views/login/reset_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102541327455c1ec05331c69-41302126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '441cd65000de425433d56996b2e94a6c5a263838' => 
    array (
      0 => 'application/views/login/reset_password.tpl',
      1 => 1438687723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102541327455c1ec05331c69-41302126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PUBLIC_URL' => 0,
    'site_info' => 0,
    'tran_reset_password' => 0,
    'tran_you_must_enter_password' => 0,
    'tran_password_miss_match' => 0,
    'tran_minimum_six_characters_required' => 0,
    'tran_you_must_enter_your_password_again' => 0,
    'tran_errors_check' => 0,
    'key' => 0,
    'tran_user_name' => 0,
    'user_name' => 0,
    'tran_new_password' => 0,
    'tran_confirm_password' => 0,
    'BASE_URL' => 0,
    'tran_not_readable' => 0,
    'tran_back' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c1ec053c666',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c1ec053c666')) {function content_55c1ec053c666($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>



<div class="main-login col-sm-4 col-sm-offset-4">
    <div class="logo">
        <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['site_info']->value["logo"];?>
" />
    </div>
        <div class="box-login">
            <h3><?php echo $_smarty_tpl->tpl_vars['tran_reset_password']->value;?>
</h3>
            <p>
            <mesasge><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/error_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'','name'=>''), 0);?>
</mesasge>
            </p>
            <div id="span_js_messages" style="display:none;">
                <span id="validate_msg15"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_password']->value;?>
</span>
                <span id="validate_msg18"><?php echo $_smarty_tpl->tpl_vars['tran_password_miss_match']->value;?>
</span>
                <span id="validate_msg16"><?php echo $_smarty_tpl->tpl_vars['tran_minimum_six_characters_required']->value;?>
</span>
                <span id="validate_msg17"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_password_again']->value;?>
</span>
                 
            </div>
            <form id="reset_password_form" name="reset_password_form" method="post" action="">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i><?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                </div>
                <input type="hidden" id ="key" name="key" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                         <!--   <label><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</label>-->
                            <input type="text" id="user_name" class="form-control" readonly name="user_name" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
" tabindex="1" >
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                          <!--  <label><?php echo $_smarty_tpl->tpl_vars['tran_new_password']->value;?>
</label>-->
                            <input type="password" class="form-control"  id="pass" name="pass" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_new_password']->value;?>
" tabindex="2" >
                        </span>
                    </div>

                    <div class="form-group">
                        <span class="input-icon">        
                           <!-- <label><?php echo $_smarty_tpl->tpl_vars['tran_confirm_password']->value;?>
</label>-->
                            <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_confirm_password']->value;?>
" tabindex="3" >
                        </span>
                         <div class="imgcaptcha">
                                        
                                 <div class="col-md-6 col-my" style="padding:0px; text-align:left;">  
								 <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
login/captcha/admin" id="captcha" /></div>
                                     <div class="col-md-6 col-my" style="padding:0px;">   <div class="Change-text">
                                     <a href="#" onclick="
                                                document.getElementById('captcha').src = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
login/captcha/admin/' + Math.random();
                                                document.getElementById('captcha-form').focus();"
                                                id="change-image" class="color"><?php echo $_smarty_tpl->tpl_vars['tran_not_readable']->value;?>
</a></div> 
											<div class="width-media">	
                                        <input tabindex="4"type="text" style="width:100%;" name="captcha" id="captcha-form" autocomplete="off" /><br/></div>
										</div>
                                    </div>
                    </div>
                                                <div class="form-actions"></div>
                    <div class="form-actions">

                        <input type="submit" id="reset_password_submit" class="btn btn-bricky pull-right" name="reset_password_submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_reset_password']->value;?>
" tabindex="5" /> &nbsp;
                        <leftspan style="float:none"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" ><div class="btn btn-light-grey go-back">
                            <i class="fa fa-circle-arrow-left"></i><?php echo $_smarty_tpl->tpl_vars['tran_back']->value;?>

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
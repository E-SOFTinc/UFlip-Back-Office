<?php /* Smarty version Smarty 3.1.4, created on 2015-08-14 05:23:32
         compiled from "application/views/login/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84487018355bb68328470d4-08036016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22db4eee1adad4ce6e10d446c9e71a3dc3ba2a39' => 
    array (
      0 => 'application/views/login/index.tpl',
      1 => 1439547794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84487018355bb68328470d4-08036016',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb68328c6e5',
  'variables' => 
  array (
    'PUBLIC_URL' => 0,
    'site_info' => 0,
    'tran_login_form' => 0,
    'lang_arr' => 0,
    'LANG_ID' => 0,
    'v' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'tran_errors_check' => 0,
    'tran_user_name' => 0,
    'url_user_name' => 0,
    'tran_password' => 0,
    'tran_I_forgot_my_password' => 0,
    'CAPTCHA_STATUS' => 0,
    'BASE_URL' => 0,
    'tran_not_readable' => 0,
    'tran_Keep_me_signed_in' => 0,
    'tran_Login' => 0,
    'tran_Dont_have_an_account_yet' => 0,
    'tran_Create_an_account' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb68328c6e5')) {function content_55bb68328c6e5($_smarty_tpl) {?>﻿﻿<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>



<div class="main-login col-sm-4 col-sm-offset-4">
    <div class="logo">
        <!--<img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['site_info']->value["logo"];?>
" />-->
        <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/login-logo.png" />
    </div>
    <!-- start: LOGIN BOX -->
    <div class="box-login">
        <h3><?php echo $_smarty_tpl->tpl_vars['tran_login_form']->value;?>
</h3>
        <p>
        <mesasge><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/error_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'','name'=>''), 0);?>
</mesasge>
        </p>

        <ul class="topoptions">
            <li class="dropdown language">
                <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['LANG_ID']->value==$_smarty_tpl->tpl_vars['v']->value['lang_id']){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/flags/<?php echo $_smarty_tpl->tpl_vars['v']->value['lang_code'];?>
.png" />
                        <?php }?>
                    <?php } ?>
                    <span class="badge"></span>
                </a>
                <ul class="dropdown-menu posts">
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                        <li onclick="getSwitchLanguage('<?php echo $_smarty_tpl->tpl_vars['v']->value['lang_code'];?>
');" >
                            <span class="dropdown-menu-title">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/flags/<?php echo $_smarty_tpl->tpl_vars['v']->value['lang_code'];?>
.png" /> <?php echo $_smarty_tpl->tpl_vars['v']->value['lang_name'];?>

                            </span>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        </ul>



        <form class="form-login" action="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
login/verifylogin" id="login_form_admin" name="login_form_admin" method="post">
            <div class="errorHandler alert alert-danger no-display">
                <i class="fa fa-remove-sign"></i><?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

            </div>
            <fieldset>
                <div class="form-group">
                    <span class="input-icon">
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['url_user_name']->value;?>
" tabindex="1" />
                        <i class="fa fa-user"></i> </span>
                </div>
                <div class="form-group form-actions">
                    <span class="input-icon">                        
                        <input type="password" class="form-control password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_password']->value;?>
" id="password" tabindex="2" />

                        <i class="fa fa-lock"></i>
                        <a class="forgot" href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
login/forgot_password">
                            <?php echo $_smarty_tpl->tpl_vars['tran_I_forgot_my_password']->value;?>

                        </a> </span>
<input type="hidden" id="path_root" name="path_root" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
">
                    <?php if ($_smarty_tpl->tpl_vars['CAPTCHA_STATUS']->value=="yes"){?>                            
                        <br/><div class="imgcaptcha">

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
                                    <input tabindex="3" type="text" style="width:100%;" name="captcha" id="captcha-form" autocomplete="off" /><br/></div>
                            </div>
                        </div>
                        <i class="fa fa-lock"></i> 
                    <?php }?>

                </div>
                <div class="form-actions">
                    <label for="remember" class="checkbox-inline">
                        <input type="checkbox" class="grey remember" id="remember" name="remember"value="yes">
                        <?php echo $_smarty_tpl->tpl_vars['tran_Keep_me_signed_in']->value;?>

                    </label>
                    <input type="submit" class="btn btn-bricky pull-right" value="<?php echo $_smarty_tpl->tpl_vars['tran_Login']->value;?>
"   tabindex="4" id="submit" name="submit" />
                    <!--    Login 
                    <i class="fa fa-arrow-circle-right"/></i>-->

                </div>
                <div class="new-account">
                    <?php echo $_smarty_tpl->tpl_vars['tran_Dont_have_an_account_yet']->value;?>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
register/user_register" class="register">
                        <?php echo $_smarty_tpl->tpl_vars['tran_Create_an_account']->value;?>

                    </a>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- end: LOGIN BOX -->

</div>


<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/login_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        //TableData.init();

        ValidateUser.init();

        //DateTimePicker.init();
        
       
    });
</script>

<script type="text/javascript">
    function getSwitchLanguage(lang) {
        var url = "";
        var base_url = $("#base_url_id").val();
        var current_url = $("#current_url").val();
        var current_url_full = $("#current_url_full").val();

        if (current_url != current_url_full) {
            url = current_url_full;
        } else {
            url = current_url;
        }
// alert("current_url: " + current_url + "==current_url_full:" + current_url_full);

        var redirect_url = base_url;

        redirect_url = base_url + lang + "/" + url;


        document.location.href = redirect_url;
    }
</script>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
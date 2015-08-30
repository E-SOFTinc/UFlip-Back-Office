<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 07:23:43
         compiled from "application/views/admin/layout/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149774669755bb68cfb9b407-18254581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '055143371ca7296bb4fd1254b6d267789e2c3c5d' => 
    array (
      0 => 'application/views/admin/layout/footer.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149774669755bb68cfb9b407-18254581',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SESS_STATUS' => 0,
    'FOOTER_DEMO_STATUS' => 0,
    'PUBLIC_URL' => 0,
    'tran_this_demo_can_customize_your_own_mlm_plan_with_fully_licensed_mode' => 0,
    'tran_once_the_demo_is_ready_you_can_simply_move_the_demo_to_your_own_domain_name' => 0,
    'tran_this_demo_will_be_automatically_deleted_after_48_hours_unless_upgraded' => 0,
    'tran_you_can_upgrade_this_demo_to_one_month_or_can_purchase_the_software' => 0,
    'tran_use_google_chrome_or_mozilla_firefox_for_better_view' => 0,
    'upgrade_cond' => 0,
    'tran_please' => 0,
    'BASE_URL' => 0,
    'tran_click_here_to_upgrade' => 0,
    'tran_upgrade_now' => 0,
    'tran_click_here_to_place_a_feedback_for_support' => 0,
    'tran_website' => 0,
    'tran_for_discussion_form' => 0,
    'STATCOUNTER_STATUS' => 0,
    'CHAT_CODE' => 0,
    'site_info' => 0,
    'ARR_SCRIPT' => 0,
    'v' => 0,
    'loc' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb68cfc95cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb68cfc95cf')) {function content_55bb68cfc95cf($_smarty_tpl) {?>﻿<div>
</div>



<?php if ($_smarty_tpl->tpl_vars['SESS_STATUS']->value){?> 
    <?php if ($_smarty_tpl->tpl_vars['FOOTER_DEMO_STATUS']->value=='yes'){?>
    <div class>
        <div class="col-sm-6" style="margin:0;padding:0;">
            <div class="col-sm-12 sm-fifty">
                <div class="panel panel-default">
                    <div class="panel-body no-padding" >
                        <div class="pull-left noteimg col-sm-2">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/1358439241_Draft.png" />

                        </div>
                        
                        <div class="pull-left notetxt col-sm-10">

                            <p><font color="black">
                                1.   <?php echo $_smarty_tpl->tpl_vars['tran_this_demo_can_customize_your_own_mlm_plan_with_fully_licensed_mode']->value;?>
 <br/>
                                2.   <?php echo $_smarty_tpl->tpl_vars['tran_once_the_demo_is_ready_you_can_simply_move_the_demo_to_your_own_domain_name']->value;?>
 <br/>
                                3.   <?php echo $_smarty_tpl->tpl_vars['tran_this_demo_will_be_automatically_deleted_after_48_hours_unless_upgraded']->value;?>
 <br/>
                                4.   <?php echo $_smarty_tpl->tpl_vars['tran_you_can_upgrade_this_demo_to_one_month_or_can_purchase_the_software']->value;?>
<br/>
                                5 .  <?php echo $_smarty_tpl->tpl_vars['tran_use_google_chrome_or_mozilla_firefox_for_better_view']->value;?>
<br/>
                                </font></p>
                        </div>
                              
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6" style="margin:0;padding:0;">
            <div class="col-sm-12 sm-fifty">
                <div class="panel panel-default">
                    <div class="panel-body no-padding">
                        <div class="pull-left noteimg col-sm-2">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/1358439696_lifesaver.png" />
                            <!--<img src="https://www.webprofits.com.au/blog/wp-content/uploads/green-arrow.jpg" style="width: 200px;">-->
                        </div>
                        <div class="pull-left notetxt col-sm-10">
                            <p>              
                                <?php if ($_smarty_tpl->tpl_vars['upgrade_cond']->value=='active'){?> 
                                            <!-- <font color="black"><?php echo $_smarty_tpl->tpl_vars['tran_please']->value;?>
 </font>
                                           <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/revamp/revamp_update_plan"><?php echo $_smarty_tpl->tpl_vars['tran_click_here_to_upgrade']->value;?>
</a>-->

                                    <a class="btn btn-orange" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/revamp/revamp_update_plan"><i class="fa fa-plus"></i>
                                        <?php echo $_smarty_tpl->tpl_vars['tran_upgrade_now']->value;?>

                                    </a>
                                    <br/>
                                <?php }?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/revamp/send_feedback"><?php echo $_smarty_tpl->tpl_vars['tran_click_here_to_place_a_feedback_for_support']->value;?>
 </a> <br />
                                <font color="black"><?php echo $_smarty_tpl->tpl_vars['tran_website']->value;?>
 : www.ioss.in <br />
                                Blog : www.blog.infinitemlmsoftware.com<br />
                               <!-- <?php echo $_smarty_tpl->tpl_vars['tran_for_discussion_form']->value;?>
 :www.forum.infinitemlmsoftware.com<br />-->
                                Skype ID:infinitemlm<br /></font>
                            </p>
                        </div>

                    </div>
                </div>
            </div> 
        </div>

    </div>
  <?php }?>
<?php }?>


<!-- For statcounter -->

<?php if ($_smarty_tpl->tpl_vars['STATCOUNTER_STATUS']->value=='yes'){?>
<script type="text/javascript">
//<![CDATA[
    var sc_project = 9749224;
    var sc_invisible = 1;
    var sc_security = "beb94475";
    var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "https://www.");
    document.write("<sc" + "ript type='text/javascript' src='" + scJsHost + "statcounter.com/counter/counter_xhtml.js'></" + "script>");
//]]>
</script>
<!-- For statcounter -->
<?php echo $_smarty_tpl->tpl_vars['CHAT_CODE']->value;?>

<?php }?>

</div>

<div class="footer clearfix">
    <div class="footer-inner">
        
        2015 &copy; <?php echo $_smarty_tpl->tpl_vars['site_info']->value['company_name'];?>
 <?php if ($_smarty_tpl->tpl_vars['FOOTER_DEMO_STATUS']->value=='yes'){?>- <a href="https://ioss.in" target="_blank">Developed by Infinite Open Source Solutions LLP&trade;</a> <!--- <a href="https://ioss.in" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Need more help about this page?</a><div class="help-icon-bottom"><a href="#" target="_blank"><i class="clip-info"></i></a></div>-->
       <?php }?>
        </div>
    <div class="footer-items">
        <span class="go-top"><i class="clip-chevron-up"></i></span>
    </div>
</div>
<!--[if lt IE 9]>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/respond.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/iCheck/jquery.icheck.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/less/less-1.5.0.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
javascript/main.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
javascript/form-wizard.js"></script>
<!-- start: Grid files -->

<!-- end: Grid files -->
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ARR_SCRIPT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
    <?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['type'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars["loc"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['loc'], null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['loc']->value=="footer"){?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="js"){?>
            <script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
javascript/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" type="text/javascript" ></script>
        <?php }elseif($_smarty_tpl->tpl_vars['type']->value=="css"){?>
            <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" rel="stylesheet" type="text/css" />
        <?php }elseif($_smarty_tpl->tpl_vars['type']->value=="plugins/js"){?>
            <script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" type="text/javascript" ></script>
        <?php }elseif($_smarty_tpl->tpl_vars['type']->value=="plugins/css"){?>
            <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" rel="stylesheet" type="text/css" />
        <?php }?>
    <?php }?>
<?php } ?>
<script>
    jQuery(document).ready(function() {
        $("#close_link").click(function()
        {
            $("#message_box").removeClass('ok');
        })
    });


</script>

<script type="text/javascript">
    $(window).bind('focus', function()
    {
        idleSessout();
    });

    function idleSessout()
    {
        //get the last page load time and current server time
        var post_path = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
' + "admin/time/get_session_time";
        jQuery.post(post_path, {}, function(data)
        {
            var time_all = data.split("===");
            var time_now = time_all[0];
            var time = time_all[1];
            if ((time_now - time) >= 600) { //time in seconds

                document.location.href = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
' + "admin/login/logout";
            }
        });
    }
</script><?php }} ?>
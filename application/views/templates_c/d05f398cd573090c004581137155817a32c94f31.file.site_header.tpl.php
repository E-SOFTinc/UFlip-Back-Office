<?php /* Smarty version Smarty 3.1.4, created on 2015-08-02 23:30:51
         compiled from "application/views/admin/layout/site_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167490100355bb68cfa6bbc2-11799418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd05f398cd573090c004581137155817a32c94f31' => 
    array (
      0 => 'application/views/admin/layout/site_header.tpl',
      1 => 1438576216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167490100355bb68cfa6bbc2-11799418',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb68cfb8221',
  'variables' => 
  array (
    'SESS_STATUS' => 0,
    'BASE_URL' => 0,
    'PUBLIC_URL' => 0,
    'site_info' => 0,
    'unread_mail' => 0,
    'tran_you_have_no_new_mail' => 0,
    'mail_content' => 0,
    'v' => 0,
    'i' => 0,
    'tran_see_all_messages' => 0,
    'LANG_STATUS' => 0,
    'lang_arr' => 0,
    'current_language' => 0,
    'user_type' => 0,
    'profile_pic' => 0,
    'username' => 0,
    'PATH_TO_ROOT' => 0,
    'tran_profile_management' => 0,
    'tran_logout' => 0,
    'tran_dashboard' => 0,
    'page_top_header' => 0,
    'page_top_small_header' => 0,
    'HELP_STATUS' => 0,
    'help_link' => 0,
    'page_header' => 0,
    'page_small_header' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb68cfb8221')) {function content_55bb68cfb8221($_smarty_tpl) {?>
<script type="text/javascript">
    function getSwitchLanguage(lang) {
        var url = "";
        var current_url = "";
        var current_url_full = "";
        var base_url = $("#base_url_id").val();
    <?php if ($_smarty_tpl->tpl_vars['SESS_STATUS']->value){?>
        current_url = $("#current_url").val();
        current_url_full = $("#current_url_full").val();
    <?php }else{ ?>
        current_url = "register/user_register";
        var current_url_full = current_url;
    <?php }?>

        if (current_url != current_url_full) {
            url = current_url_full;
        } else {
            url = current_url;
        }
        // alert("current_url: "+current_url+"==current_url_full:"+current_url_full);

        var redirect_url = base_url;

        redirect_url = base_url + lang + "/" + url;


        document.location.href = redirect_url;
    }
</script>


<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/home/index"> <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['site_info']->value["logo"];?>
" style="margin-top: -5px;position: absolute;" />


            </a>
        </div>
        <div class="navbar-tools">
            <ul class="nav navbar-right">
                <!-- start: MESSAGE DROPDOWN -->
                <!--<li class="welcomeuserli">
                <span class="welcomeuser">Welcome, Admin!</span>
                </li>-->
                <!--- EDITED BY NIYAS
                -->
                <?php if ($_smarty_tpl->tpl_vars['SESS_STATUS']->value){?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                            <i class="clip-bubble-3"></i>
                            <?php if ($_smarty_tpl->tpl_vars['unread_mail']->value>0){?>
                                <span class="badge"><?php echo $_smarty_tpl->tpl_vars['unread_mail']->value;?>
</span>
                            <?php }?>
                        </a>
                        <ul class="dropdown-menu posts">
                            <?php if ($_smarty_tpl->tpl_vars['unread_mail']->value>0){?>
                                <li>
                                    <span id="unread_mail" class="dropdown-menu-title"> You have <?php echo $_smarty_tpl->tpl_vars['unread_mail']->value;?>
 new mail</span>
                                </li>
                            <?php }elseif($_smarty_tpl->tpl_vars['unread_mail']->value==0){?>
                                <li>
                                    <span id="unread_mail" class="dropdown-menu-title"> <?php echo $_smarty_tpl->tpl_vars['tran_you_have_no_new_mail']->value;?>
</span>
                                </li>
                            <?php }?>
                            <li>
                                <div class="drop-down-wrapper">
                                    <ul>
                                        <li> 
                                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['user_name'] = new Smarty_variable('', null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['user_img'] = new Smarty_variable('', null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mail_content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                                <div class="clearfix">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/mail/mail_management">
                                                        <div class="thread-image">
                                                            <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/profile_picture/<?php echo $_smarty_tpl->tpl_vars['v']->value['image'];?>
" style="height:50px;width:50px;">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">From: <?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</span>
                                                            <span class="preview">Subject:<?php echo $_smarty_tpl->tpl_vars['v']->value['mailadsubject'];?>
</span>
                                                            <span class="time"><?php echo $_smarty_tpl->tpl_vars['v']->value['mailadiddate'];?>
</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>



                            <li class="view-all">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/mail/mail_management">
                                    <?php echo $_smarty_tpl->tpl_vars['tran_see_all_messages']->value;?>
 <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <!-- .========================NIYAS=============->
                <!-- end: MESSAGE DROPDOWN -->


                <!-- start: LANGUAGE DROPDOWN -->
                <?php if ($_smarty_tpl->tpl_vars['LANG_STATUS']->value=='yes'){?>
                    <li class="dropdown language">
                        <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">

                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['current_language']->value==$_smarty_tpl->tpl_vars['v']->value['lang_name_in_english']){?>
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
                <?php }?>
                <!-- end: LANGUAGE DROPDOWN -->

                <?php if ($_smarty_tpl->tpl_vars['SESS_STATUS']->value){?>
                    <!-- start: USER DROPDOWN -->
                    <li class="dropdown current-user">

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php if ($_smarty_tpl->tpl_vars['user_type']->value!='employee'){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/profile_picture/<?php echo $_smarty_tpl->tpl_vars['profile_pic']->value;?>
" class="circle-img" alt="" height="30px" width="30px">
                            <?php }?>
                            <span class="username"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>
                            <i class="clip-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT']->value;?>
admin/profile/profile_view" >
                                    <i class="clip-user-2"></i>
                                    &nbsp;<?php echo $_smarty_tpl->tpl_vars['tran_profile_management']->value;?>

                                </a>
                            </li>

                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT']->value;?>
admin/login/logout">
                                    <i class="clip-switch"></i>
                                    &nbsp;<?php echo $_smarty_tpl->tpl_vars['tran_logout']->value;?>

                                </a>
                            </li>
                        </ul>
                    </li>
                <?php }?>
                <!-- end: USER DROPDOWN -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
    <?php if ($_smarty_tpl->tpl_vars['SESS_STATUS']->value){?>
        <div class="navbar-content">
            <!-- start: SIDEBAR -->
            <div class="main-navigation navbar-collapse collapse">
                <!-- start: MAIN MENU TOGGLER BUTTON -->
                <div class="navigation-toggler">
                    <i class="clip-chevron-left"></i>
                    <i class="clip-chevron-right"></i>
                </div>
                <!-- end: MAIN MENU TOGGLER BUTTON -->

                <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

            </div>
            <!-- end: SIDEBAR -->
        </div>
    <?php }?>
    <!-- start: PAGE -->
    <?php if (!$_smarty_tpl->tpl_vars['SESS_STATUS']->value){?>
        <div class="main-content" style='margin-left:0px;'>
    <?php }else{ ?>
        <div class="main-content">
        <?php }?>
        <div class="container">
            <!-- start: PAGE HEADER -->
            <?php if ($_smarty_tpl->tpl_vars['SESS_STATUS']->value){?>
                <div class="row">
                    <div class="col-sm-12">

                        <!-- start: PAGE TITLE & BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="clip-pencil"></i>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/home/index"> <!-- place link to dashboard homepage -->
                                    <?php echo $_smarty_tpl->tpl_vars['tran_dashboard']->value;?>
<!--- please change with language variable -->
                                </a>
                            </li>

                            <?php if ($_smarty_tpl->tpl_vars['page_top_header']->value!=$_smarty_tpl->tpl_vars['tran_dashboard']->value){?>
                                <li>
                                    <a href="#">
                                        <?php echo $_smarty_tpl->tpl_vars['page_top_header']->value;?>

                                    </a>
                                </li>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['page_top_small_header']->value!=''){?>
                                <li class="active">
                                    <?php echo $_smarty_tpl->tpl_vars['page_top_small_header']->value;?>

                                </li>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['HELP_STATUS']->value==='yes'){?>
                                <li>

                                    <a href="https://infinitemlmsoftware.com/help/<?php echo $_smarty_tpl->tpl_vars['help_link']->value;?>
" target="_blank">
                                        <i class="clip-info help_top_icon" title="Click here to see more help on this page!"></i>
                                    </a>

                                </li>
                            <?php }?>	



                            <!--<div class="help-icon-top"><a href="#" target="_blank"><i class="clip-info"></i></a></div>-->
                            <li class="pull-right">					

                                <span class="date">
                                    <timestamp>
                                        <?php echo date('l\, F jS\, Y ');?>

                                    </timestamp> 
                                </span>&nbsp;
                                <div id="clock">

                                </div>
                            </li>
                        </ol>
                        <!-- end: PAGE TITLE & BREADCRUMB -->

                        <!-- start: PAGE HEADER -->
                        <div class="page-header">
                            <h1><?php echo $_smarty_tpl->tpl_vars['page_header']->value;?>
 
                                <?php if ($_smarty_tpl->tpl_vars['page_small_header']->value!=''){?>
                                    <small><?php echo $_smarty_tpl->tpl_vars['page_small_header']->value;?>
</small>
                                <?php }?>
                            </h1>
                        </div>
                    </div>
                </div>
            <?php }?>
            <!-- end: PAGE HEADER --> 
            <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/error_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'','name'=>''), 0);?>
<?php }} ?>
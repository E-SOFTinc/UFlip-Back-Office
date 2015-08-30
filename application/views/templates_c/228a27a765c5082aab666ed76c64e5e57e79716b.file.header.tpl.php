<?php /* Smarty version Smarty 3.1.4, created on 2015-08-02 23:03:01
         compiled from "application/views/user/layout/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133955204355bee7f59ea2b4-02232622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '228a27a765c5082aab666ed76c64e5e57e79716b' => 
    array (
      0 => 'application/views/user/layout/header.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133955204355bee7f59ea2b4-02232622',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'PUBLIC_URL' => 0,
    'site_info' => 0,
    'ARR_SCRIPT' => 0,
    'v' => 0,
    'loc' => 0,
    'type' => 0,
    'BASE_URL' => 0,
    'CURRENT_URL' => 0,
    'CURRENT_URL_FULL' => 0,
    'SESS_STATUS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bee7f5aa728',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bee7f5aa728')) {function content_55bee7f5aa728($_smarty_tpl) {?><!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>

        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META --> 
        <link rel="shortcut icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['site_info']->value["favicon"];?>
" />


        <!-- start: MAIN CSS -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
fonts/style.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/main.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/main-responsive.css">
            <!--<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/iCheck/skins/all.css"/>-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/styles.less">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/theme_light.css" type="text/css" id="skin_color">
        <link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/animations.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/theme_light.css" type="text/css" id="skin_color">
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->

        <!-- start: Validation common files -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/summernote/build/summernote.css">
        <!-- end: validation common files -->

        <!-- end: MAIN CSS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.0.0.js"></script>

        <script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
javascript/timer.js" type="text/javascript"></script>


        <!--[if IE]>
      <style type="text/css">
      #footer input[type='text'],#footer .button_gradient{
          height:20px !important;
          padding: 0 5px !important;
      }
      </style>
    <![endif]-->	
        <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
jcountdown/jcountdown.css" rel="stylesheet" type="text/css">
        <!--<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
jcountdown/jquery.jcountdown.min.js"></script> -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
jcountdown/jquery.jcountdown.min.js"></script>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ARR_SCRIPT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['type'], null, 0);?>
            <?php $_smarty_tpl->tpl_vars["loc"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['loc'], null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['loc']->value=="header"){?>
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

    </head>
    <body>
        <input type = "hidden" name = "base_url" id = "base_url_id" value = "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" />
        <input type = "hidden" name = "current_url" id = "current_url" value = "<?php echo $_smarty_tpl->tpl_vars['CURRENT_URL']->value;?>
" />
        <input type = "hidden" name = "current_url_full" id = "current_url_full" value = "<?php echo $_smarty_tpl->tpl_vars['CURRENT_URL_FULL']->value;?>
" />
        <input type="hidden" name="img_src_path1" id="img_src_path" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
"/>


        <?php if ($_smarty_tpl->tpl_vars['SESS_STATUS']->value){?> 
            <!--site header-->	
            <?php echo $_smarty_tpl->getSubTemplate ("user/layout/site_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

            <!--site header-->            
        <?php }?>

<?php }} ?>
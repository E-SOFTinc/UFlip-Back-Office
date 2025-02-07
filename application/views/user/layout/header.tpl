<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>

        <title>{$title}</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META --> 
        <link rel="shortcut icon" type="image/png" href="{$PUBLIC_URL}images/logos/{$site_info["favicon"]}" />


        <!-- start: MAIN CSS -->
        <link href="{$PUBLIC_URL}plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{$PUBLIC_URL}plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="{$PUBLIC_URL}fonts/style.css">
        <link rel="stylesheet" href="{$PUBLIC_URL}css/main.css">
        <link rel="stylesheet" href="{$PUBLIC_URL}css/main-responsive.css">
            <!--<link rel="stylesheet" href="{$PUBLIC_URL}plugins/iCheck/skins/all.css"/>-->
        <link rel="stylesheet" href="{$PUBLIC_URL}plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
        <link rel="stylesheet" href="{$PUBLIC_URL}plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <link rel="stylesheet/less" type="text/css" href="{$PUBLIC_URL}css/styles.less">
        <link rel="stylesheet" href="{$PUBLIC_URL}css/theme_light.css" type="text/css" id="skin_color">
        <link rel="stylesheet/less" type="text/css" href="{$PUBLIC_URL}css/animations.css">
        <link rel="stylesheet" href="{$PUBLIC_URL}css/theme_light.css" type="text/css" id="skin_color">
        <!--[if IE 7]>
        <link rel="stylesheet" href="{$PUBLIC_URL}plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->

        <!-- start: Validation common files -->
        <link href="{$PUBLIC_URL}plugins/summernote/build/summernote.css">
        <!-- end: validation common files -->

        <!-- end: MAIN CSS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.0.0.js"></script>

        <script src="{$PUBLIC_URL}javascript/timer.js" type="text/javascript"></script>




        {*****************timer*****************}


        <!--[if IE]>
      <style type="text/css">
      #footer input[type='text'],#footer .button_gradient{
          height:20px !important;
          padding: 0 5px !important;
      }
      </style>
    <![endif]-->	
        <link href="{$PUBLIC_URL}jcountdown/jcountdown.css" rel="stylesheet" type="text/css">
        <!--<script src="{$PUBLIC_URL}jcountdown/jquery.jcountdown.min.js"></script> -->
        <script src="{$PUBLIC_URL}jcountdown/jquery.jcountdown.min.js"></script>

        {*****************timer*****************}
        {*!-- start: CSS REQUIRED FOR THIS PAGE ONLY --*}
        {foreach from = $ARR_SCRIPT item=v}
            {assign var="type" value=$v.type}
            {assign var="loc" value=$v.loc}
            {if $loc == "header"}
                {if $type == "js"}
                    <script src="{$PUBLIC_URL}javascript/{$v.name}" type="text/javascript" ></script>
                {elseif $type == "css"}
                    <link href="{$PUBLIC_URL}css/{$v.name}" rel="stylesheet" type="text/css" />
                {elseif $type == "plugins/js"}
                    <script src="{$PUBLIC_URL}plugins/{$v.name}" type="text/javascript" ></script>
                {elseif $type == "plugins/css"}
                    <link href="{$PUBLIC_URL}plugins/{$v.name}" rel="stylesheet" type="text/css" />
                {/if}
            {/if}
        {/foreach}
        {*!-- end: CSS REQUIRED FOR THIS PAGE ONLY --*}

    </head>
    <body>
        <input type = "hidden" name = "base_url" id = "base_url_id" value = "{$BASE_URL}" />
        <input type = "hidden" name = "current_url" id = "current_url" value = "{$CURRENT_URL}" />
        <input type = "hidden" name = "current_url_full" id = "current_url_full" value = "{$CURRENT_URL_FULL}" />
        <input type="hidden" name="img_src_path1" id="img_src_path" value="{$PUBLIC_URL}"/>


        {if $SESS_STATUS} 
            <!--site header-->	
            {include file="user/layout/site_header.tpl" title="Example Smarty Page" name=""}
            <!--site header-->            
        {/if}


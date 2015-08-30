{*start: HEADER *}
<script type="text/javascript">
    function getSwitchLanguage(lang) {
        var url = "";
        var current_url = "";
        var current_url_full = "";
        var base_url = $("#base_url_id").val();
    {if $SESS_STATUS}
        current_url = $("#current_url").val();
        current_url_full = $("#current_url_full").val();
    {else}
        current_url = "register/user_register";
        var current_url_full = current_url;
    {/if}

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
    {* start: TOP NAVIGATION CONTAINER *}
    <div class="container">
        <div class="navbar-header">
            {* start: RESPONSIVE MENU TOGGLER *}
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            {* end: RESPONSIVE MENU TOGGLER *}
            {* start: LOGO *}
            <a class="navbar-brand" href="{$BASE_URL}admin/home/index"> <img src="{$PUBLIC_URL}images/logos/{$site_info["logo"]}" style="margin-top: -5px;position: absolute;" />


            </a>
            {* end: LOGO *}
        </div>
        <div class="navbar-tools">

            {* start: TOP NAVIGATION MENU *}
            <ul class="nav navbar-right">
                <!-- start: MESSAGE DROPDOWN -->
                <!--<li class="welcomeuserli">
                <span class="welcomeuser">Welcome, Admin!</span>
                </li>-->
                <!--- EDITED BY NIYAS
                -->
                {if $SESS_STATUS}
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                            <i class="clip-bubble-3"></i>
                            {if $unread_mail>0}
                                <span class="badge">{$unread_mail}</span>
                            {/if}
                        </a>
                        <ul class="dropdown-menu posts">
                            {if $unread_mail>0}
                                <li>
                                    <span id="unread_mail" class="dropdown-menu-title"> You have {$unread_mail} new mail</span>
                                </li>
                            {elseif $unread_mail==0}
                                <li>
                                    <span id="unread_mail" class="dropdown-menu-title"> {$tran_you_have_no_new_mail}</span>
                                </li>
                            {/if}
                            <li>
                                <div class="drop-down-wrapper">
                                    <ul>
                                        <li> 
                                            {assign var=i value=1}
                                            {assign var=user_name value=""}
                                            {assign var=user_img value=""}
                                            {foreach from=$mail_content item=v}
                                                {*  {$user_img = $img[$i-1]['image']}*}
                                                <div class="clearfix">
                                                    <a href="{$BASE_URL}admin/mail/mail_management">
                                                        <div class="thread-image">
                                                            <img alt="" src="{$PUBLIC_URL}images/profile_picture/{$v.image}" style="height:50px;width:50px;">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">From: {$v.username}</span>
                                                            <span class="preview">Subject:{$v.mailadsubject}</span>
                                                            <span class="time">{$v.mailadiddate}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                {$i=$i+1}
                                            {/foreach}
                                        </li>
                                    </ul>
                                </div>
                            </li>



                            <li class="view-all">
                                <a href="{$BASE_URL}admin/mail/mail_management">
                                    {$tran_see_all_messages} <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                {/if}
                <!-- .========================NIYAS=============->
                <!-- end: MESSAGE DROPDOWN -->


                <!-- start: LANGUAGE DROPDOWN -->
                {if $LANG_STATUS=='yes'}
                    <li class="dropdown language">
                        <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">

                            {foreach from=$lang_arr item=v}
                                {if $current_language == $v.lang_name_in_english}
                                    <img src="{$PUBLIC_URL}images/flags/{$v.lang_code}.png" /> 
                                {/if}
                            {/foreach}
                            <span class="badge"></span>
                        </a>

                        <ul class="dropdown-menu posts">

                            {foreach from=$lang_arr item=v}
                                <li onclick="getSwitchLanguage('{$v.lang_code}');" >
                                    <span class="dropdown-menu-title">
                                        <img src="{$PUBLIC_URL}images/flags/{$v.lang_code}.png" /> {$v.lang_name}
                                    </span>
                                </li>
                            {/foreach}

                        </ul>

                    </li>
                {/if}
                <!-- end: LANGUAGE DROPDOWN -->

                {if $SESS_STATUS}
                    <!-- start: USER DROPDOWN -->
                    <li class="dropdown current-user">

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            {if $user_type!='employee'}
                                <img src="{$PUBLIC_URL}images/profile_picture/{$profile_pic}" class="circle-img" alt="" height="30px" width="30px">
                            {/if}
                            <span class="username">{$username}</span>
                            <i class="clip-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{$PATH_TO_ROOT}admin/profile/profile_view" >
                                    <i class="clip-user-2"></i>
                                    &nbsp;{$tran_profile_management}
                                </a>
                            </li>

                            <li>
                                <a href="{$PATH_TO_ROOT}admin/login/logout">
                                    <i class="clip-switch"></i>
                                    &nbsp;{$tran_logout}
                                </a>
                            </li>
                        </ul>
                    </li>
                {/if}
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
    {if $SESS_STATUS}
        <div class="navbar-content">
            <!-- start: SIDEBAR -->
            <div class="main-navigation navbar-collapse collapse">
                <!-- start: MAIN MENU TOGGLER BUTTON -->
                <div class="navigation-toggler">
                    <i class="clip-chevron-left"></i>
                    <i class="clip-chevron-right"></i>
                </div>
                <!-- end: MAIN MENU TOGGLER BUTTON -->

                {include file="admin/layout/menu.tpl" title="Example Smarty Page" name=""}
            </div>
            <!-- end: SIDEBAR -->
        </div>
    {/if}
    <!-- start: PAGE -->
    {if !$SESS_STATUS}
        <div class="main-content" style='margin-left:0px;'>
    {else}
        <div class="main-content">
        {/if}
        <div class="container">
            <!-- start: PAGE HEADER -->
            {if $SESS_STATUS}
                <div class="row">
                    <div class="col-sm-12">

                        <!-- start: PAGE TITLE & BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li>
                                <i class="clip-pencil"></i>
                                <a href="{$BASE_URL}admin/home/index"> <!-- place link to dashboard homepage -->
                                    {$tran_dashboard}<!--- please change with language variable -->
                                </a>
                            </li>

                            {if $page_top_header!=$tran_dashboard}
                                <li>
                                    <a href="#">
                                        {$page_top_header}
                                    </a>
                                </li>
                            {/if}

                            {if $page_top_small_header != ""}
                                <li class="active">
                                    {$page_top_small_header}
                                </li>
                            {/if}

                            {if $HELP_STATUS==='yes'}
                                <li>

                                    <a href="https://infinitemlmsoftware.com/help/{$help_link}" target="_blank">
                                        <i class="clip-info help_top_icon" title="Click here to see more help on this page!"></i>
                                    </a>

                                </li>
                            {/if}	



                            <!--<div class="help-icon-top"><a href="#" target="_blank"><i class="clip-info"></i></a></div>-->
                            <li class="pull-right">					

                                <span class="date">
                                    <timestamp>
                                        {date('l\, F jS\, Y ')}
                                    </timestamp> 
                                </span>&nbsp;
                                <div id="clock">

                                </div>
                            </li>
                        </ol>
                        <!-- end: PAGE TITLE & BREADCRUMB -->

                        <!-- start: PAGE HEADER -->
                        <div class="page-header">
                            <h1>{$page_header} 
                                {if $page_small_header != ""}
                                    <small>{$page_small_header}</small>
                                {/if}
                            </h1>
                        </div>
                    </div>
                </div>
            {/if}
            <!-- end: PAGE HEADER --> 
            {include file="admin/layout/error_box.tpl" title="" name=""}
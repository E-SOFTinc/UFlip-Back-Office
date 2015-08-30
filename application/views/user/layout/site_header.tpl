{*start: HEADER *}
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

            <div class="user-info-top">
                <img src="{$PUBLIC_URL}images/profile_picture/{$profile_pic}" width="30" height="30">

                <span class="badge badge-green">Active</span>

            </div>



            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            {* end: RESPONSIVE MENU TOGGLER *}
            {* start: LOGO *}
            <a class="navbar-brand" href="{$BASE_URL}user/home/index">
                <img src="{$PUBLIC_URL}images/logos/{$site_info["logo"]}" style="margin-top: -5px;height:30px;position: absolute;" />
            </a>
            {* end: LOGO *}
        </div>
        <div class="navbar-tools">
            {* start: TOP NAVIGATION MENU *}
            <ul class="nav navbar-right">

                <!--<li class="welcomeuserli">
                        <span class="welcomeuser">Welcome,{$username}!</span>
                        </li>-->

                <!-- start: MESSAGE DROPDOWN -->
                <!--- EDITED BY NIYAS
                -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                        <i class="clip-bubble-3"></i>
                        {if $unread_mail>0}
                            <span class="badge"> {$unread_mail}</span>
                        {/if}
                    </a>

                    <ul class="dropdown-menu posts">
                        {if $unread_mail==0}
                            <li>
                                <span id="unread_mail" class="dropdown-menu-title"> You have no new mail</span></li>

                        {elseif $unread_mail>0}
                            <li>
                                <span id="unread_mail" class="dropdown-menu-title"> You have {$unread_mail} new mail</span>
                            </li>

                            <li>
                                <div class="drop-down-wrapper">
                                    <ul>
                                        <li> 


                                            {assign var=i value=1}
                                            {assign var=user_name value=""}
                                            {assign var=user_img value=""}
                                            {foreach from=$mail_content item=v}<ul>
                                                    <div class="clearfix">
                                                        <a href="{$BASE_URL}user/mail/mail_management">
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
                                                {/foreach}</ul>

                                        </li>
                                    </ul>
                                </div>
                            </li>
                        {/if}


                        <li class="view-all">
                            <a href="{$BASE_URL}user/mail/mail_management">
                                See all messages <i class="fa fa-arrow-circle-o-right"></i>
                            </a>
                        </li>
                    </ul>

                </li>
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
				<li onclick="getSwitchLanguage('{$v.lang_code}');">
				    <span class="dropdown-menu-title">
					<img src="{$PUBLIC_URL}images/flags/{$v.lang_code}.png" /> {$v.lang_name}
				    </span>
				</li>
			    {/foreach}

			</ul>
		    </li>
                {/if}
                <!-- end: LANGUAGE DROPDOWN -->
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="{$PUBLIC_URL}images/profile_picture/{$profile_pic}" class="circle-img" alt="" height="30px" width="30px">
                        <span class="username">{$username}</span>
                        <i class="clip-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{$PATH_TO_ROOT}user/profile/profile_view" >
                                <i class="clip-user-2"></i>
                                &nbsp;{$tran_profile_management}
                            </a>
                        </li>

                        <li>
                            <a href="{$PATH_TO_ROOT}user/login/logout">
                                <i class="clip-switch"></i>
                                &nbsp;{$tran_logout}
                            </a>
                        </li>
                    </ul>
                </li>
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
    <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation navbar-collapse collapse">

            <div class="user-info-left">
                <img src="{$PUBLIC_URL}images/profile_picture/{$profile_pic}" width="30" height="30">

                {if $status=="active"}
		    <span class="badge badge-green">Active</span>
                {else}
		    <span class="badge badge-red">Inactive</span>
                {/if}
            </div>

            <!-- start: MAIN MENU TOGGLER BUTTON -->
            <div class="navigation-toggler">
                <i class="clip-chevron-left"></i>
                <i class="clip-chevron-right"></i>
            </div>
            <!-- end: MAIN MENU TOGGLER BUTTON -->

            {include file="user/layout/menu.tpl" title="Example Smarty Page" name=""}
        </div>
        <!-- end: SIDEBAR -->
    </div>
    <!-- start: PAGE -->
    <div class="main-content">
        <div class="container">
            <!-- start: PAGE HEADER -->

            <div class="row">
                <div class="col-sm-12">

                    <!-- start: PAGE TITLE & BREADCRUMB -->
                    <ol class="breadcrumb">

                        <li>
                            <i class="clip-pencil"></i>
                            <a href="{$BASE_URL}user/home/index"> <!-- place link to dashboard homepage -->
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

                        {if $HELP_STATUS=='yes'}

                            
                        <li>
                            <a href="https://infinitemlmsoftware.com/help/{$help_link}" target="_blank">
                            <i class="clip-info help_top_icon" title="Click here to see more help on this page!"></i>
                            </a>
                        </li>


			         {/if}	
                        {if $rank_status=="yes"}
                            <li class="active">
                                |<span class="badge badge-green">Rank: {$rank_name}</span>
                            </li>
                        {/if}
                        <li class="pull-right">
                            <span class="date"><timestamp>
                                    {date('l\, F jS\, Y ')}
                                </timestamp> </span>&nbsp;
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
            <!-- end: PAGE HEADER --> 
            {include file="user/layout/error_box.tpl" title="" name=""}
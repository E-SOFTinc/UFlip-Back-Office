{include file="admin/layout/header.tpl"  name=""}

{assign var="div_class" value=""}
{if $board_name=="auto_board_1"} 
    {assign var="boardcat" value="Participators' Board"}
    {assign var="board2_class" value=""}
{else if $board_name=="auto_board_2"} 
    {assign var="boardcat" value="Business Board"}
    {assign var="board2_class" value="-gold"}
{else}
    {assign var="boardcat" value="Participators' Board"}
    {assign var="board2_class" value=""}
{/if}

{if $split_status=="yes"}
    <script type="text/javascript">
        $('.board_view a').click(function(e) {
        e.preventDefault();
    });
    </script>
{/if}

<script type = "text/javascript" src = "{$PUBLIC_URL}javascript/easyTooltip.js"></script>
<link href="{$PUBLIC_URL}css/style_tree.css" rel="stylesheet" type="text/css" />
<link href="{$PUBLIC_URL}css/style_board.css" rel="stylesheet" type="text/css" />

<style type="text/css">   
    {foreach from= $user_details item=v}
        {assign var="id" value=$v.id}
        #user{$id}{literal}{display:none;}{/literal}
    {/foreach}
</style>
<!--<script type="text/javascript">

$(document).ready(function()
    {
{foreach from= $user_details item=arr_val}
    {assign var="user_id" value=$arr_val.id}
    $("a#userlink{$user_id}").easyTooltip(
{literal} {{/literal}
useElement: "user{$user_id}"
{literal}}{/literal})
{/foreach}

});

</script>-->

<div id="content" >
    {$tooltip}
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$boardcat}
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
                <!--icons--> 
                <ul style="float:left; margin-left: -33px;">
                    <li class="btn btn-active{$board2_class}" style="background: rgba(252,234,187,1);
                        background: -moz-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
                        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(252,234,187,1)), color-stop(50%, rgba(252,205,77,1)), color-stop(51%, rgba(248,181,0,1)), color-stop(100%, rgba(251,223,147,1)));
                        background: -webkit-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);">Active</li>
                    <li class="btn btn-vacant">Vacant</li>
                </ul>
                <!--icons--> 

                <!--brd-plan-->
                <div class="bord-box"> 
                    <!--box-1-->
                    <div class="bor-box">
                        {if  {$downline_board_id_arr["level0"][1]["user_name"]}!=''}
                            {$div_class="level-1{$board2_class}"}
                        {else}
                            {$div_class="level-1-vacant"}
                        {/if}
                        <div class="{$div_class}">
                            <a  id='userlink{$downline_board_id_arr["level0"][1]["id"]}'>
                                <p>{$downline_board_id_arr["level0"][1]["user_name"]}</p>
                            </a>
                        </div>
                    </div>
                    <!--box-1--> 

                    <!--box-2-->
                    <div class="bor-box">

                        {if  {$downline_board_id_arr["level1"][1]["user_name"]}!=''}
                            {$div_class="level-2{$board2_class}"}
                        {else}
                            {$div_class="level-2-vacant"}
                        {/if}

                        <div class="{$div_class}">
                            <a  id='userlink{$downline_board_id_arr["level1"][1]["id"]}'>
                                <p>{$downline_board_id_arr["level1"][1]["user_name"]}</p>
                            </a>
                        </div>



                        {if  {$downline_board_id_arr["level1"][2]["user_name"]}!=''}
                            {$div_class="level-2{$board2_class}"}
                        {else}
                            {$div_class="level-2-vacant"}
                        {/if}

                        <div class="{$div_class}" style="margin-left: 232px">
                            <a  id='userlink{$downline_board_id_arr["level1"][2]["id"]}'>
                                <p>{$downline_board_id_arr["level1"][2]["user_name"]}</p>
                            </a>
                        </div>


                    </div>

                    <!--box-2--> 
                    <!--box-3-->
                    <div class="bor-box">

                        <div class="brd-plan-3-1"> 
                            {if  {$downline_board_id_arr["level2"][1]["user_name"]}!=''}
                                {$div_class="level-3{$board2_class}"}
                            {else}
                                {$div_class="level-3-vacant"}
                            {/if}
                            <div class="{$div_class}" >
                                <a  id='userlink{$downline_board_id_arr["level2"][1]["id"]}'>
                                    <p>{$downline_board_id_arr["level2"][1]["user_name"]}</p>
                                </a>
                            </div>

                            {if  {$downline_board_id_arr["level2"][2]["user_name"]}!=''}
                                {$div_class="level-3-mid{$board2_class}"}
                            {else}
                                {$div_class="level-3-mid-vacant"}
                            {/if}
                            <div class="{$div_class}" style="margin: 0 0 0 128px" >
                                <a  id='userlink{$downline_board_id_arr["level2"][2]["id"]}'>
                                    <p>{$downline_board_id_arr["level2"][2]["user_name"]}</p>
                                </a>
                            </div>


                        </div>


                        <div class="brd-plan-3-1"> 
                            {if  {$downline_board_id_arr["level2"][3]["user_name"]}!=''}
                                {$div_class="level-3{$board2_class}"}
                            {else}
                                {$div_class="level-3-vacant"}
                            {/if}
                            <div class="{$div_class}" style=" margin-left: 110px;" >
                                <a  id='userlink{$downline_board_id_arr["level2"][3]["id"]}'>
                                    <p>{$downline_board_id_arr["level2"][3]["user_name"]}</p>
                                </a>
                            </div>

                            {if  {$downline_board_id_arr["level2"][4]["user_name"]}!=''}
                                {$div_class="level-3-mid{$board2_class}"}
                            {else}
                                {$div_class="level-3-mid-vacant"}
                            {/if}
                            <div class="{$div_class}" style="margin-left: 129px;">
                                <a  id='userlink{$downline_board_id_arr["level2"][4]["id"]}'>
                                    <p>{$downline_board_id_arr["level2"][4]["user_name"]}</p>
                                </a>
                            </div>


                        </div>                        
                        <!--box-3--> 
                        {*<br>
                        <!--box-4-->
                        <div class="bor-box">

                            <div class="brd-plan-3">
                                {if  {$downline_board_id_arr["level3"][1]["user_name"]}!=''}
                                    {$div_class="level-3{$board2_class}"}
                                {else}
                                    {$div_class="level-3-vacant"}
                                {/if}
                                <div class="{$div_class}" style="margin: 0 5px 0 10px">
                                    <a  id='userlink{$downline_board_id_arr["level3"][1]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][1]["user_name"]}</p>
                                    </a>
                                </div>

                                {if  {$downline_board_id_arr["level3"][2]["user_name"]}!=''}
                                    {$div_class="level-3-mid{$board2_class}"}
                                {else}
                                    {$div_class="level-3-mid-vacant"}
                                {/if}
                                <div class="{$div_class}" >
                                    <a  id='userlink{$downline_board_id_arr["level3"][2]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][2]["user_name"]}</p>
                                    </a>
                                </div>


                            </div> 
                            <div class="brd-plan-3">

                                {if  {$downline_board_id_arr["level3"][3]["user_name"]}!=''}
                                    {$div_class="level-3{$board2_class}"}
                                {else}
                                    {$div_class="level-3-vacant"}
                                {/if}
                                <div class="{$div_class}" style="margin: 0 5px 0 20px" >
                                    <a  id='userlink{$downline_board_id_arr["level3"][3]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][3]["user_name"]}</p>
                                    </a>
                                </div>

                                {if  {$downline_board_id_arr["level3"][4]["user_name"]}!=''}
                                    {$div_class="level-3-mid{$board2_class}"}
                                {else}
                                    {$div_class="level-3-mid-vacant"}
                                {/if}
                                <div class="{$div_class}" style="margin: 0 5px 0 10px">
                                    <a  id='userlink{$downline_board_id_arr["level3"][4]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][4]["user_name"]}</p>
                                    </a>
                                </div>



                            </div> 
                            <div class="brd-plan-3">

                                {if  {$downline_board_id_arr["level3"][5]["user_name"]}!=''}
                                    {$div_class="level-3{$board2_class}"}
                                {else}
                                    {$div_class="level-3-vacant"}
                                {/if}
                                <div class="{$div_class}" style="margin: 0 5px 0 59px">
                                    <a  id='userlink{$downline_board_id_arr["level3"][5]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][5]["user_name"]}</p>
                                    </a>
                                </div>

                                {if  {$downline_board_id_arr["level3"][6]["user_name"]}!=''}
                                    {$div_class="level-3-mid{$board2_class}"}
                                {else}
                                    {$div_class="level-3-mid-vacant"}
                                {/if}
                                <div class="{$div_class}" >
                                    <a  id='userlink{$downline_board_id_arr["level3"][6]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][6]["user_name"]}</p>
                                    </a>
                                </div>


                            </div> 
                            <div class="brd-plan-3">

                                {if  {$downline_board_id_arr["level3"][7]["user_name"]}!=''}
                                    {$div_class="level-3{$board2_class}"}
                                {else}
                                    {$div_class="level-3-vacant"}
                                {/if}
                                <div class="{$div_class}" style="margin:0 0 0 20px;">
                                    <a  id='userlink{$downline_board_id_arr["level3"][7]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][7]["user_name"]}</p>
                                    </a>
                                </div>

                                {if  {$downline_board_id_arr["level3"][8]["user_name"]}!=''}
                                    {$div_class="level-3-mid{$board2_class}"}
                                {else}
                                    {$div_class="level-3-mid-vacant"}
                                {/if}
                                <div class="{$div_class}" style="margin:0 0 0 10px;">
                                    <a  id='userlink{$downline_board_id_arr["level3"][8]["id"]}'>
                                        <p>{$downline_board_id_arr["level3"][8]["user_name"]}</p>
                                    </a>
                                </div>

                            </div> 


                        </div>*}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}

<script>
jQuery(document).ready(function() {
Main.init();
//getGenologyTree('{$user_id}');
//ValidateUser.init();
});
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}



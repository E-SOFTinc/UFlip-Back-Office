{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;">
    <span id="errmsg">{$tran_You_must_enter_keyword_to_search}</span>
    <span id="block_msg">{$tran_Sure_you_want_to_Block_this_User_There_is_NO_undo}</span>
    <span id="activate_msg">{$tran_Sure_you_want_to_Activate_this_User_There_is_NO_undo}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   {$tran_search_member}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="search_mem" id="search_mem" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keyword">{$tran_keyword}<span class="symbol required"></span> </label>
                        <div class="col-sm-3">
                            <input placeholder="{$tran_Username_Name_Nominee_Address_MobileNo_City}.."type="text" name="keyword" id="keyword" size="50"  autocomplete="Off" tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/">

                            <button class="btn btn-bricky"  type="submit" name="search_member" id="search_member" value="{$tran_search_member}" tabindex="2" > {$tran_search_member} </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>

    </div>

</div>    



{if $flag}         
    {if $count>0}
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>  {$tran_member_details} 
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
                        <br />


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1"> 
                            <thead>
                                <tr class="th">
                                    <th>Sl.No</th>
                                    <th>{$tran_user_name}</th>
                                    <th>{$tran_name}</th>
                                    <th class="hidden-xs">{$tran_sponser_name}</th>
                                    <th>{$tran_mobile_no}</th>
                                        {*  <th class="hidden-xs" >{$tran_nominee}</th>*}
                                    <th class="hidden-xs" >{$tran_address}</th>                            
                                    <th>{$tran_status}</th>
                                    <th>{$tran_view_profile}</th>
                                    <th>{$tran_action}</th>
                                </tr>

                            </thead>

                            {*if count($mem_arr)!=0*}
                            {assign var="i" value=0}
                            {assign var="class" value=""}
                            <tbody>
                                {foreach from=$mem_arr item=v}
                                    {if $i%2==0}
                                        {$class='tr1'}
                                    {else}
                                        {$class='tr2'}
                                    {/if}

                                    {assign var="id" value="{$v.user_id}"}
                                    {assign var="user_name" value="{$v.user_name}"}
                                    {assign var="user_detail_name" value="{$v.user_detail_name}"}
                                    {assign var="user_detail_address" value="{$v.user_detail_address}"}
                                    {assign var="user_detail_mobile" value="{$v.user_detail_mobile}"}
                                    {assign var="user_detail_town" value="{$v.user_detail_town}"}
                                    {assign var="user_detail_nominee" value="{$v.user_detail_nominee}"}
                                    {assign var="user_detail_country" value="{$v.user_detail_country}"}
                                    {assign var="encrypt_id" value="{$v.user_id_en}"}

                                    {assign var="active" value="{$v.active}"}
                                    {assign var="sponser_name" value="{$v.sponser_name}"}
                                    {assign var="status" value=""}

                                    {if $active=='yes'}
                                        {$status="{$tran_active}"}

                                        {$title="Block"}
                                    {else}
                                        {$status="{$tran_blocked}"}
                                        {$title="Activate"}
                                    {/if}

                                    <tr>      
                                        <td>{counter}</td>
                                        <td>{$user_name}</td>
                                        <td>{$user_detail_name}</td>
                                        <td class="hidden-xs" >{$sponser_name}</td>
                                        <td>{$user_detail_mobile}</td>
                                        {*   <td class="hidden-xs" >{$user_detail_nominee}</td>*}
                                        <td class="hidden-xs" >{$user_detail_address}</td>                             
                                        <td>{$status}</td>
                                        <td><center> 
                                    <a href="{$PATH_TO_ROOT_DOMAIN}admin/profile/profile_view/{$encrypt_id}" class="btn btn-green">

                                        {* <img src="{$PATH_TO_ROOT_DOMAIN}public_html/images/view.png" width="30">*}
                                        <i class="glyphicon glyphicon-camera"></i> 
                                    </a>
                                </center>
                                </td>
                                {if $active=='yes'}
                                    <td><center>
                                        <a href="javascript:block_user({$id},'yes')" onclick=""  class="btn btn-bricky tooltips" data-placement="top" data-original-title={$tran_block}>

                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                        </a>
                                    </center>
                                </td>{else}<td><center>
                                <a href="javascript:block_user({$id},'no')" onclick=""  class="btn btn-green tooltips" data-placement="top" data-original-title={$tran_activate}>

                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                            </center></td>{/if}
                            </tr>
                            {$i=$i+1}
                            {/foreach}
                                </tbody>
                            </table>
                            {$result_per_page}
                        </div>
                    </div>
                </div>   
            </div>  

            {elseif isset($smarty.post) && isset($smarty.post.keyword)}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i>  {$tran_member_details} 
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
                                <tbody>
                                    <tr><td colspan="10" align="center"><h4>{$tran_No_User_Found}</h4></td></tr>
                                </tbody>    
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>  

                {/if}
                    {/if}

                        {include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""} 
                        <script>
                            jQuery(document).ready(function () {
                                Main.init();
                                TableData.init();
                                ValidateMember.init();
                            });
                        </script>
                        {include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
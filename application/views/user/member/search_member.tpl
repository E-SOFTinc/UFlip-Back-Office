<!-- /////////////////////  CODE EDITED BY JIJI  ////////////////////////// -->

{include file="user/layout/header.tpl"  name=""}


<div id="span_js_messages" style="display: none;">
    <span id="errmsg">{$tran_You_must_enter_keyword_to_search}</span>
</div>

<innerdashes>
    <hdash>
        <img src="{$PUBLIC_URL}images/1335679062_customers.png" alt="" align="absmiddle" />
        &nbsp;&nbsp;&nbsp;&nbsp;{$tran_search_member}
		{if $HELP_STATUS}
			<a href="https://infinitemlmsoftware.com/help/" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
		{/if}
    </hdash>

    <cdash-inner>             
        <form class="niceform"  method="post"  name="search_mem" id="search_mem" onSubmit="return validate_search_member(this);" >
            <table width="100%" border=0>
                <tr align='left' >
                    <td>&nbsp;&nbsp;<b>{$tran_keyword}</b></td>
                    <td>&nbsp;&nbsp;<input type="text" name="keyword" id="keyword" size="50" tabindex="1" autocomplete="off">&nbsp;&nbsp;
                        <input type="submit" name="search_member" id="search_member" value="{$tran_search_member}" tabindex="2" ></td>
                </tr>
                <tr align='left' >
                    <td><input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/"></td>
                    <td>&nbsp;&nbsp;({$tran_Username_Name_Nominee_Address_MobileNo_City})</td>
                </tr>
            </table>
        </form>
                <br/> <br/>

        {if $search_member!=""}

            <table   id='grid'>
               
                    <tr>
                        <th>No</th>
                        <th>{$tran_user_name}</th>
                        <th>{$tran_name}</th>
                        <th>{$tran_sponser_name}</th>
                        <th>{$tran_mobile_no}</th>
                        <th>{$tran_nominee}</th>
                        <th>{$tran_address}</th>
                        <!--<th>{*$tran_town}</th>
                        <th>{$tran_country*}</th>-->
                        <th>{$tran_status}</th>
                        <th>{$tran_action}</th>
                        <th>{$tran_view_profile}</th>
                    </tr>
                
                    {if count($mem_arr)!=0}
                        {assign var="i" value=0 }
                        {assign var="class" value="" }

                        {foreach from=$mem_arr item=v}
                            {if $i%2==0}
                                {$class='tr1'}
                            {else}
                                {$class='tr2'}
                            {/if}
                            {assign var="id" value="{$v.user_id}" }
                            {assign var="user_name" value="{$v.user_name}" }
                            {assign var="user_detail_name" value="{$v.user_detail_name}" }
                            {assign var="user_detail_address" value="{$v.user_detail_address}" }
                            {assign var="user_detail_mobile" value="{$v.user_detail_mobile}" }
                            {assign var="user_detail_town" value="{$v.user_detail_town}" }
                            {assign var="user_detail_nominee" value="{$v.user_detail_nominee}"}
                            {assign var="user_detail_country" value="{$v.user_detail_country}"}
                            {*assign var="sponser" value="{$v.sponser}" *}
                            {assign var="active" value="{$v.active}" }
                            {assign var="sponser_name" value="{$v.sponser_name}" }
                            {assign var="status" value="" }

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
                                <td>{$sponser_name}</td>
                                <td>{$user_detail_mobile}</td>
                                <td>{$user_detail_nominee}</td>
                                <td>{$user_detail_address}</td>
                                <!-- <td>{*$user_detail_town}</td>
                                <td>{$user_detail_nominee*}</td>-->
                                <td>{$status}</td>
                                <td><a href="javascript:block_user({$id},'{$active}')">
                                        <img src="{$PUBLIC_URL}images/edit.png" title="{$title}{$user_name}" style="border:none;"></a>
                                </td>
                                <td><a href="{$PATH_TO_ROOT_DOMAIN}admin/profile/profile_view/{$user_name}">{$tran_view}</a></td>
                            </tr>
                            {$i=$i+1}
                        {/foreach}
                        <tr><td>{$result_per_page}</td></tr>
                    {else}
                        <tr><td colspan="8" align="center"><h4>No User Found</h4></td></tr>

                    {/if}
            </table>

        {/if}

    </cdash-inner>
</innerdashes>
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
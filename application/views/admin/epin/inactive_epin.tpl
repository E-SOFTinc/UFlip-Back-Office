
{include file="admin/layout/header.tpl" name=""}
{include file="admin/epin/epin_View.tpl" name=""} 
<innerdashes>

    <cdash-inner>
        <hdash>
		{if $HELP_STATUS}
            <a href="https://infinitemlmsoftware.com/help/inactive-pin" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
		{/if}
            <img src="{$PUBLIC_URL}images/1337771238_calendar.png" border="0" />
            {$tran_inactive_epin}
        </hdash>

        <table  id='grid' class ='tbl'  width='100%' >
            <thead>
                <tr class="th">
                    <th>{$tran_no}</th>
                    <th>{$tran_epin}</th>
                    {if $product_status=="yes"}
                        <th>{$tran_product}</th>
                    {/if}
                    <th>{$tran_used_user}</th>
                    <th>{$tran_status}</th>
                    <th>{$tran_action}</th>
                </tr>
            </thead>
            <tbody>
                {if count($pin_numbers)!=0}
                    {assign var="class" value=""}
                    {assign var="i" value=0}
                    {assign var="root" value="{$BASE_URL}admin/"}
                    {foreach from=$pin_numbers item=v}
                        {assign var="id" value="{$v.pin_id}"}
                        {if $i%2==0}
                            {$class='tr1'}
                        {else}
                            {$class='tr2'}
                        {/if}


                        {if $v.used_user==""}
                            {assign var="used_user" value="NULL"}
                        {else}

                            {assign var="used_user" value="{$v.used_user}"}
                        {/if}
                        {if $v.status=="yes"}

                            {assign var="stat" value="ACTIVE"}

                        {else}

                            {assign var="stat" value="USED"}
                        {/if}
                        {$i=$i+1}
                        <tr class='{$class}'>

                            <td>{$i+$page}</td>
                            <td>{$v.pin}</td>
                            {if $product_status == "yes"}
                                <td>{$v.product}</td>
                            {/if}
                            <td>{$used_user}</td>
                            <td>{$stat}</td>

                            <td>
                                <a href="javascript:activate_pin({$id},'{$root}')">
                                    <div id="span_js_messages" style="display: none;">
                                        <span id="error_msg1">{$tran_sure_you_want_to_activate_this_passcode_there_is_no_undo}</span>
                                    </div>
                                    <img src="{$PUBLIC_URL}images/edit.png" title="Activate pin" style="border:none;">
                                </a>
                            </td>     
                        </tr>
                    {/foreach}
                </tbody>                           
            {else}
                <tr><td colspan="8" align="center"><h4>{$tran_no_inactive_pin_found}</h4></td></tr>
            {/if}
        </table>
        <counter>{$paging_link}</counter>
    </cdash-inner>
</innerdashes>

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}

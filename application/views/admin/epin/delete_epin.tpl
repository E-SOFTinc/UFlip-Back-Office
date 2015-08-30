{include file="admin/layout/header.tpl"  name=""}

{include file="admin/epin/epin_View.tpl" name=""}
<innerdashes>
    <hdash>
	{if $HELP_STATUS}
        <a href="https://infinitemlmsoftware.com/help/delete-pin" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
	{/if}
        <img src="{$PUBLIC_URL}images/1335854997_process.png" border="0" />
        {$tran_delete_epin}
    </hdash>
    <cdash-inner>

        <table  id='grid'  width='100%' >
            <thead>
                <tr class="th">
                    <th>{$tran_no}</th>
                    <th>{$tran_epin}</th>
                    {if $product_status=="yes"}
                        <th>{$tran_product}</th>
                        <th>{$tran_product_id}</th>
                    {/if}
                    <th>{$tran_used_user}</th>
                    <th>{$tran_allocated_user}</th>
                    <th>{$tran_status}</th>
                    <th>{$tran_action}</th>
                </tr>
            </thead>
            <tbody>
                {if count($pin_numbers)!=0}
                    {assign var="class" value=""}
                    {assign var="i" value=0}
                    {foreach from=$pin_numbers item=v}
                        {assign var="root" value="{$BASE_URL}admin/"}
                        {assign var="id" value="{$v.pin_id}"}
                        {if $i%2==0}
                            {$class='tr1'}
                        {else}
                            {$class='tr2'}
                        {/if}
                        {if $v.used_user==""}
                            {assign var=used_user value="NULL"}
                        {else}
                            {assign var=used_user value="{$v.used_user}"}  
                        {/if}
                        {if $v.allocated_user==""}
                            {assign var=allocated_user value="NULL"}
                        {else}
                            {assign var=allocated_user value="{$v.allocated_user}"}
                        {/if}
                        {if $v.status=="yes"}
                            {assign var=stat value="ACTIVE"}
                        {else}
                            {assign var=stat value="USED"}
                        {/if}
                        {$i=$i+1}
                        <tr class="{$class}">
                            <td align="center">{$i+$page}</td>
                            <td align="center">{$v.pin}</td>

                            {if $product_status=="yes"}
                                <td align="center">{$v.product}</td>
                                <td align="center">{$v.prod_id}</td>
                            {/if}

                            <td align="center">{$used_user}</td>
                            <td align="center">{$allocated_user}</td>
                            <td align="center">{$stat}</td>
                            <td>
                                <a href="javascript:delete_pin({$id},'{$root}')">
                                    <div id="span_js_messages" style="display: none;">
                                        <span id="error_msg1">{$tran_sure_you_want_to_delete_this_passcode_there_is_no_undo}</span>
                                    </div>
                                    <img src="{$PUBLIC_URL}images/delete.png" title="Delete $pin" style="border:none;">
                                </a>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>            		

            {else}

                <tr><td colspan="6" align="center"><h4>{$tran_no_product_found}</h4></td></tr>
            {/if}
        </table>
        <counter>{$result_per_page}</counter>
    </cdash-inner>
</innerdashes>
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}

{include file="admin/layout/header.tpl" name=""}
{include file="admin/epin/epin_View.tpl" name=""}  

<innerdashes>
    <cdash-inner>   
        <hdash>
		{if $HELP_STATUS}
            <a href="https://infinitemlmsoftware.com/help/active-pin" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
		{/if}
            <img src="{$PUBLIC_URL}images/1335687662_login.png" border="0" />
            {$tran_active_epin}
        </hdash>
        <cdash-inner>
            <div id="span_js_messages" style="display: none;">
                <span id="error_msg1">{$tran_you_must_select_a_product_name}</span>
            </div>
            <div id="inputs">

                    <form  name="select_product" id="select_product" method="post" action="{$PATH_TO_ROOT}admin/epin/active_epin" onSubmit="return validate_product(this);" >
                <table >

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="product_status" id="product_status" value="{$product_status}"/>
                        </td>
                    </tr>
                    {if $product_status=="yes"}


                        <tr>
                            <td>{$tran_product_name}</td>
                             <td>
                        <select style="width:150px" name="product" id="product" title="{$tran_select_one_of_these_products}" >
                            <option value="">{$tran_select_product}</option>
                            {$options}
                            </select>
                            </td>
                        </tr>
                    <tr>
                    <td></td>
                    <td>
                    <div style="height:auto;width:auto;float:left;margin-left:10px">
                        <input type="submit" name="viewproductpin" id="viewproductpin" value="{$tran_view_active_pin}" style="" title="{$tran_view_active_pin_of_select_product}">
                    </div>
 </td>
                    </tr>
                        {/if}

                     
                </table>
                    </form>
                      </cdash-inner>
</innerdashes> 
            </div>
        





        <table id='grid' class ='tbl'  width='100%' >
            <thead>
                <tr class="th">
                    <th>{$tran_no}</th>
                    <th>{$tran_epin}</th>
                    {if $product_status == "yes"}
                        <th>{$tran_product_id}</th>
                    {/if}
                    <th>{$tran_used_user}</th>
                    <th>{$tran_status}</th>
                    <th>{$tran_uploaded_date}</th>
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

                            {assign var="stat" value="BLOCKED"}
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
                            <td>{$v.pin_uploded_date}</td>
                            <td>
                                <a href="javascript:block_pin({$id},'{$root}')">
                                    <img src="{$PUBLIC_URL}images/edit.png" title="Block pin" style="border:none;"></a>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>                              

            {else}
                <tr><td colspan="8" align="center"><h4>{$tran_no_active_epin_found}</h4></td></tr>
            {/if}
        </table>
        <counter>{$paging_link}</counter>
    </cdash-inner>
</innerdashes>
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
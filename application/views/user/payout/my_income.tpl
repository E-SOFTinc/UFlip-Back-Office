<!-- ///////////////////////// CODE EDITED BY JIJI \\\\\\\\\\\\\\\\\\\\\\\\\ -->
{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_you_must_enter_user_name}</span>
    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">        
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
</div>


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_income}
                </div>
                    <div class="panel-body">
                        {assign var="count" value = count($binary)}
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th">
                                    <th class="hidden-xs">S.No.</th>
                                    <th>{$tran_date}</th>
                                    <th class="hidden-xs">{$tran_income}</th>
                                    <th>{$tran_status}</th>
                                </tr>
                            </thead>
                            {if $count>0} 
                                {assign var="i" value = 0}
                                
                                <tbody>
                                    {foreach from=$binary item=v}
                                        {$i=$i+1}
                                        <tr class="">
                                            <td class="hidden-xs" >{$i} </td>
                                            <td>{$v.date}</td>
                                            <td >{$v.amount}</td>
                                            <td>{$v.status}</td>
                                        </tr>
                                        
                                    {/foreach}
                                </tbody>
                            </table>
                        {else}
                            <tbody>
                                <tr><td colspan="8" align="center"><h4 align="center"> {$tran_no_income_found}</h4></td></tr>
                            </tbody>
                            </table>
                        {/if}

                    </div>
            </div>
        </div>
    </div>


{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
{if $count>0} 
    <script>
        jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        ValidateUser.init();
    });
    </script>
{else}
    <script>
    jQuery(document).ready(function() {
    Main.init();  
    ValidateUser.init();
});
    </script>
{/if}
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
<!-- ///////////////////////// CODE EDITED BY JIJI \\\\\\\\\\\\\\\\\\\\\\\\\ -->
{include file="admin/layout/header.tpl"  name=""}
{assign var="count" value = '0'}
<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_you_must_enter_user_name}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
</div>
{if !isset($smarty.post.income_statement)}
<div class="row" >
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> {$tran_income}
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
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">{$tran_select_user_id} <span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text" id="user_name"  name="user_name" onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" name="weekdate" id="weekdate" value="{$tran_submit}" tabindex="2">
                                {$tran_submit}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{/if}
{include file="admin/profile/user_summary_header.tpl"  name=""}
{if $week_date}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_income}
                </div>
                <div class="panel-body">
                    {if !$is_valid_username}
                        <h4 align="center"><font color="#FF0000">{$tran_Username_not_Exists}</font></h4>
                        {else}
                            {assign var="count" value = count($binary)}
                        <h2 align="center"> {$tran_weekwise_income} : {$user_name}</h2> 
                        {*<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th">
                                    <th class="hidden-xs">S.No.</th>
                                    <!--<th>{$tran_week_no}</th>-->
                                    <th>{$tran_closing_date}</th>
                                    <th class="hidden-xs">{$tran_released_income}</th>
                                    <th class="hidden-xs">{$tran_service_charge}</th>
                                    <th class="hidden-xs">{$tran_tds}</th>
                                    <th>{$tran_net_amount}</th>
                                    <th>{$tran_status}</th>
                                </tr>
                            </thead>
                            {if $count>0} 
                                {assign var="i" value = 0}
                                {assign var="status" value = ""}
                                {assign var="class" value = ""}
                                <tbody>
                                    {foreach from=$binary item=v}
                                        {if $v.paid_status=="yes"}
                                            {$status="{$tran_released}"}
                                        {else}
                                            {$status="{$tran_pending}"}
                                        {/if}
                                        {if $i%2==0}
                                            {$class="tr2"}
                                        {else}
                                            {$class="tr1"}
                                        {/if}

                                        <tr class="{$class}">
                                            <td class="hidden-xs" >{counter} </td>
                                            <!--<td>&nbsp;&nbsp;{$v.week_no}</td>-->
                                            <td>{$v.release_date}</td>
                                            <td class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;{$v.total_amount}</td>
                                            <td class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v.process_charge}</td>
                                            <td class="hidden-xs">{$v.tds}</td>
                                            <td>{$v.amount_payable}</td>
                                            <td>{$status}</td>
                                        </tr>
                                        {$i=$i+1}

                                    {/foreach}
                                </tbody>
                            </table>
                        {else}
                            <tbody>
                                <tr><td colspan="8" align="center"><h4 align="center"> {$tran_no_income_found}</h4></td></tr>
                            </tbody>
                            </table>
                        {/if}*}
                        
                        
                        {*//*****************code added by AFFAR*****************//*}
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
                        
                        
                    {/if}
                </div>
            </div>
        </div>
    </div>

{/if}

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
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
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
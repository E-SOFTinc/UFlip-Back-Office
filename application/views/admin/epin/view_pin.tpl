{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_enter_a_date}</span>        
    <span id="error_msg2">{$tran_you_must_enter_a_date}</span>        
    <span id="error_msg3">{$tran_you_must_select_a_product_name}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id="error_msg">{$tran_please_enter_your_company_name}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
    <span id ="error_msg6">{$tran_You_must_select_a_Todate_greaterThan_Fromdate}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_view_date_wise_epin_allocation}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="user_select_form" id="user_select_form" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i>{$tran_errors_check}
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1">
                            {$tran_from} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group info_block">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="1" size="20" maxlength="10"  value="" >
                                <label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>

                            </div>
                        </div>

                        <label class="col-sm-2 control-label" for="week_date2">
                            {$tran_to} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group info_block">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="2" size="20" maxlength="10"  value="" >
                                <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>

                    </div>             


                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="date_submit" id="date_submit" value="{$tran_submit}" tabindex="3">
                                {$tran_submit}
                            </button>
                        </div>
                    </div>


                    {if $flag}
                        {if count($details_arr)>0}
                            <hr />

                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                <thead>
                                    <tr class="th" align="center">
                                        <th>{$tran_no}</th>
                                            {*{if $product_status == "yes"}
                                            <th>{$tran_product_id}</th>
                                            <th>{$tran_product}</th>
                                            {/if}*}
                                        <th align="center">{$tran_epin}</th>
                                        <th align="center">{$tran_amount}</th>
                                        <th align="center">{$tran_balance_amount}</th>
                                        <th align="center">{$tran_status}</th>
                                        <th align="center">{$tran_used_user}</th>
                                        <th align="center">{$tran_allocated_user}</th>
                                        <th align="center">{$tran_date}</th>
                                        <th align="center">{$tran_expiry_date}</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    {assign var="i" value="0"}
                                    {assign var="class" value=""}
                                    {foreach from=$details_arr item=v}
                                        {if $i%2==0}

                                            {$class="tr1"}

                                        {else}

                                            {$class="tr2"}
                                        {/if}
                                        {if $v.status=="yes"}

                                            {assign var="status" value="{$tran_active}"}
                                            {assign var="user" value="NULL"}
                                        {else}

                                            {assign var="status" value="USED"}
                                            {assign var="user" value="{$v.used_user}"}
                                        {/if}
                                        {if $v.allocated_user == ""}
                                            {assign var="allocated_user" value="NULL"}
                                        {else}
                                            {assign var="allocated_user" value=$v.allocated_user}
                                        {/if}   
                                        {$i=$i+1}

                                        <tr class="{$class}" align="center" >
                                            <td align="center">{$i}</td>
                                            {*{if $product_status == "yes"}
                                            <td align="center">{$v.pin_prod_refid}</td>
                                            <td align="center">{$v.productname}</td>
                                            {/if}*}
                                            <td align="center">{$v.pin_numbers}</td>
                                            <td align="center">{$v.amount}</td>
                                            <td align="center">{$v.pin_balance_amount}</td>
                                            <td align="center">{$status}</td>
                                            <td align="center">{$user}</td>
                                            <td align="center">{$allocated_user}</td>
                                            <td align="center">{$v.pin_uploded_date}</td>
                                            <td align="center">{$v.expiry_date}</td>

                                        </tr>

                                    {/foreach}             
                                </tbody>
                            </table>
                            {$result_per_page}

                        {else}
                            <h3> {$tran_no_data}</h3>
                        {/if}            
                    {/if}           


                </form>
            </div>
        </div>
    </div>
</div>          


{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateUserr.init();
        DateTimePicker.init();
        TableData.init();


    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
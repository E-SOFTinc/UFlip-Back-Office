{include file="admin/layout/header.tpl"}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_you_must_enter_user_name}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <span id="nofond">{$tran_nofond}</span>
    <span id="showing">{$tran_showing}</span>
    <span id="to">{$tran_to}</span>
    <span id="of">{$tran_of}</span>
    <span id="entries">{$tran_entries}</span>
    <span id="notavailable">{$tran_notavailable}</span>
</div> 
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$page_header}
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
            {*/////////////////////////////////Edited By Niyasali///////////////*}
            <div class="row">
                <div class="col-sm-12">                   
                    <div class="panel-body">
                        <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform"  method="post" >
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> {$tran_errors_check}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_name"> {$tran_select_user_name}<font color="#ff0000" >*</font> </label>
                                <div class="col-sm-3">
                                    <input  name="user_name" id="user_name" type="text" size="30" onkeyup="ajax_showOptions(this, 'getCountriesByLetter', event)" autocomplete="off" tabindex="1">
                                    <span class="help-block" for="user_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <button class="btn btn-bricky" type="submit" id="user_details" value="user_details" name="user_details" tabindex="2">
                                        {$tran_view}
                                    </button>
                                </div>
                            </div>
                        </form>
                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
                                        
                                        <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_weekly_joining}
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
                <form role="form" class="smart-wizard form-horizontal"  method="post"   name="weekly_join" id="weekly_join"  target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1">
                            {$tran_from_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="3" size="20" maxlength="10"  value="{$date_diff}" >
                                <label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2">
                            {$tran_to_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="4" size="20" maxlength="10"  value="{$cur_date}" >
                                <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky"tabindex="5" name="weekdate" type="submit" value="{$tran_view}"> {$tran_view} </button>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                            
                            
{if $posted}
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
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
                    </div>  {$tran_User_Purchase_Details}             

                </div>
                <div class="panel-body">

                    <div class="center">
                        {if !$is_valid_username}
                            <h4 align="center"><font color="#FF0000">{$tran_Username_not_Exists}</font></h4>
                            {/if}
                    </div> 

                    {if $count>0}
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">


                            <thead>
                                <tr class="th" align="center">
                                    <th>{$tran_sl_no}</th>
                                    <th>{$tran_invoice_no}</th>
                                    <th>{$tran_transaction_id}</th>
                                    <th>{$tran_joinig_date}</th>
                                    <th>{$tran_type}</th>
                                    <th>{$tran_payment_method}</th>
                                    <th>{$tran_product_amount}</th>
                                    <th>{$tran_product_quantity}</th>      


                                </tr>
                            </thead>
                            <tbody>
                                {assign var="grand_total" value=0}
                                {assign var="count" value=0}
                                {assign var="amount_total" value=""}
                                {assign var="total" value=0}
                                {assign var="count_total" value=0}
                                {foreach from=$purchase_histroy item=v} 

                                    {$count_total=$count_total+$v.amount}
                                    {$total=$v.quantity*$v.amount}
                                    {$amount_total=$amount_total+$v.amount}
                                    {$grand_total=$grand_total+$total}
                                    {$count=$count+$v.quantity}
                                    <tr class="" align="center" >
                                        <td>{counter}</td>
                                        <td>{$v.invoice_no}</td>
                                        <td>{$v.trans_id}</td>
                                        <td>{$v.date_submission}</td>
                                        <td>{if $v.type==''}Registration{else}{$v.type}{/if}</td>
                                        <td>{$v.payment_method}</td>
                                        <td>{$v.amount}</td>
                                        <td>{$v.quantity}</td>                         

                                    </tr>

                                {/foreach}

                            </tbody>


                        </table>
                    {else} 
                        <h3>{$tran_no_referels}</h3>
                    {/if}



                </div>
            </div>
        </div>
    </div> 
{/if}

{if $value}
   <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
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
                    </div>  {$tran_User_Purchase_Details}             

                </div>
                <div class="panel-body">
 <div class="center">
                        {if $from_date>$to_date}
                            <h4 align="center"><font color="#FF0000">{$tran_higher}</font></h4>
                            {/if}
                    </div> 

                   

                    {if $count>0}
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">


                            <thead>
                                <tr class="th" align="center">
                                    <th>{$tran_sl_no}</th>
                                    <th>{$tran_user_name}</th>
                                    <th>{$tran_invoice_no}</th>
                                    <th>{$tran_transaction_id}</th>
                                    <th>{$tran_joinig_date}</th>
                                    <th>{$tran_type}</th>
                                    <th>{$tran_payment_method}</th>
                                    <th>{$tran_product_amount}</th>
                                    <th>{$tran_product_quantity}</th>      


                                </tr>
                            </thead>
                            <tbody>
                                {assign var="grand_total" value=0}
                                {assign var="count" value=0}
                                {assign var="amount_total" value=""}
                                {assign var="total" value=0}
                                {assign var="count_total" value=0}
                                {foreach from=$purchase_data item=v} 

                                    {$count_total=$count_total+$v.amount}
                                    {$total=$v.quantity*$v.amount}
                                    {$amount_total=$amount_total+$v.amount}
                                    {$grand_total=$grand_total+$total}
                                    {$count=$count+$v.quantity}
                                    <tr class="" align="center" >
                                        <td>{counter}</td>
                                         <td>{$v.username}</td>
                                        <td>{$v.invoice_no}</td>
                                       
                                        <td>{$v.trans_id}</td>
                                        <td>{$v.date_submission}</td>
                                        <td>{if $v.type==''}Registration{else}{$v.type}{/if}</td>
                                        <td>{$v.payment_method}</td>
                                        <td>{$v.amount}</td>
                                        <td>{$v.quantity}</td>                         

                                    </tr>

                                {/foreach}

                            </tbody>


                        </table>
                    {else} 
                        <h3>{$tran_no_referels}</h3>
                    {/if}



                </div>
            </div>
        </div>
    </div> 
{/if}
{include file="admin/layout/footer.tpl"}
<script>
    jQuery(document).ready(function() {
        Main.init();
        DatePicker.init();
        ValidateUser.init();
        ;
    });
</script>
{include file="admin/layout/page_footer.tpl"}
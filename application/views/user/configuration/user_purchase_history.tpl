{include file="user/layout/header.tpl"}

<div id="span_js_messages" style="display:none;">
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
                </div>  {$tran_users_purchase_details}             

            </div>
            <div class="panel-body">

                {if $count>0}
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">


                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_sl_no}</th>
                                <th>{$tran_invoice}</th>
                                <th>{$tran_transaction_id}</th>
                                <th>{$tran_joinig_date}</th>
                                <th>{$tran_type}</th>
                                <th>{$tran_amount}</th>
                                <th>{$tran_count}</th>      
                                <th>{$tran_total_amount}</th>

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
                                    <td>{$v.amount}</td>
                                    <td>{$v.quantity}</td>                         
                                    <td>{$total}</td> 
                                </tr>

                            {/foreach}
                        <tfoot>
                            <tr class='' align='center'>
                                <td colspan="5" align="right"><b>{$tran_total} </b></td>
                                <td align="center"><b>{number_format($amount_total,2)}</b></td>                               <td align="center"><b>{number_format($count)}</b></td>    
                                <td align="center"><b>{number_format($grand_total,2)}</b></td>
                            </tr>
                        </tfoot>
                        </tbody>


                    </table>
                {else} 
                    <h3>{$tran_no_referels}</h3>
                {/if}



            </div>
        </div>
    </div>
</div>     
{include file="user/layout/footer.tpl"}
<script>
    jQuery(document).ready(function () {
        Main.init();
        TableData.init();
    {*   ValidateUser.init();
    DateTimePicker.init();*}
    });
</script>
{include file="user/layout/page_footer.tpl"}
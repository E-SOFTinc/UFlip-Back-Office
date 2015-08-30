{assign var="report_name" value="{$tran_payout_released_report}"}
{include file="admin/report/header.tpl" name=""}
<br><br>
<table><tr><td><b>{$tran_from}:{$from}</b></td><td><b>&nbsp;{$tran_to}: {$to}</b></td></tr></table>
{if !empty($payout_release)}
    
    <table border='1' cellpadding="0" cellspacing="0" align='center' >
        <tr>
            <th>{$tran_no}</th>
            <th>{$tran_full_name}</th>
            <th>{$tran_user_name}</th>
            <th>{$tran_address}</th>
            <!--<th>{$tran_bank}</th>
            <th>{$tran_account_no}</th>-->
            <th>{$tran_date}</th>
            <th>{$tran_amount}</th>
        </tr>
        {assign var="i" value=0}
        {assign var="total_amount" value=0}
        {foreach from=$payout_release item=v}
            {$i = $i+1}
            {$total_amount=$total_amount+$v.amount}
            <tr>
                <td>{$i}</td>
                <td>{$v.fullname}</td>
                <td>{$v.user_name}</td>
                <td>{$v.address}</td>
               <!-- <td>{$v.bank}</td>
                <td>{$v.account_number}</td>-->
                <td>{$v.date}</td>
                <td>{number_format($v.amount,2)}</td>
            </tr>
        {/foreach}
        <tr>
            <td colspan="5" style="text-align: right"><b>{$tran_total_amount}</b></td>
            <td><b>{number_format($total_amount,2)}</b></td>
        </tr>
    </table>
{/if}

{if empty($payout_release)}
    <table align="center">
        <center>
            <h3>No items in Payout Release!</h3>
        </center>
    </table>
{/if}
</div></div>
<div id = "frame">
    <table align="center" style="margin-top:2px;">
        <tr>
            <td>
        <center>
            {$tran_click_here_print}
        </center>
    </td>
        <td>
            <a href="" onClick="window.print();
                        return false">
                <img src="{$PUBLIC_URL}/images/1335779082_document-print.png" alt="Print" border="none"></a>
        </td>
        </tr>
    </table>
</div>
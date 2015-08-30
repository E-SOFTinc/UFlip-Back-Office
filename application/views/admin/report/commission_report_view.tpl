{assign var="report_name" value="{$tran_commission_report}"}
{include file="admin/report/header.tpl" name=""}
{$total=0}
{$tot_pay=0}
<table><tr><td><b>{$tran_from}:{$from}</b></td><td><b>&nbsp;{$tran_to}: {$to}</b></td></tr></table>
{if $count >= 1}
    <br><br><table border='1'  cellpadding='0' cellspacing='0' align='center' >
        <tr class='th'>
            <th>{$tran_no}</th>
            <th>{$tran_user_name}</th>
            <th>{$tran_full_name}</th>       
            <th>Amount Type</th>        
            <th>{$tran_date}</th>
            <th>{$tran_total_amount}</th>
            <th>Amount Payable</th>
        </tr>
        {assign var="i" value=1}

        {foreach from=$details item=v}
            <tr>
                <td>{$i}</td>
                <td>{$v.user_name}</td>
                <td>{$v.full_name}</td>
                <td>{$v.view_amt}</td>
                <td>{$v.date}</td>
                <td>{number_format($v.total_amount,2)}{$total=$total+$v.total_amount}</td>
                <td>{number_format($v.amount_payable,2)}{$tot_pay=$tot_pay+$v.amount_payable}</td>
            </tr>  
            {$i=$i+1}
        {/foreach}


        <tr>
            <td colspan="5" align='right'> <b>Total</b></td><td><b>{number_format($total,2)}</b></td><td><b>{number_format($tot_pay,2)}</b></td>
        </tr>

    </table>

    <table   cellpadding='0' cellspacing='0' align='center'>

    </table>
{else}
    <h4 align='center'>  <font size="6">{$tran_no_data}</font ></h4>

{/if}



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
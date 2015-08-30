{assign var="report_name" value="{$tran_fund_transfer_report}"}

{include file="admin/report/header.tpl" name=""}

{if $cnt >= 1}
    
    <div id="tablewrapper">
    {assign var="j" value="0"}
    <br><br><table border='1' align='center' cellpadding='0' cellspacing='0' >
        <tr>
            <th>Sl No</th>
            <th>Customer</th>
            <th>IM Full Name</th>
           
            <th>Amount Type</th>
             <th>Transfer Amount</th>

        </tr>

        {foreach from=$fund_transfer_rprt item=v}	
            {$j=$j+1}
            <tr >
                <td> {$j} </td>
                <td>{$v.user_name}</td>
                <td>{$v.full_name}</td>
               
                <td>{$v.amount_type}</td>
                <td>{number_format($v.amount,2)}</td>

            </tr>
        {/foreach}
       </table>
</div>
<div id = "frame">
    <table align="center" style="margin-top:2px;">
        <tr>
            <td>
        <center>
            {$tran_click_here_print}
        </center>
        </td>
        <td>
            <a href="" onClick="window.print();return false">
                    <img src="{$PUBLIC_URL}/images/1335779082_document-print.png" alt="Print" border="none">
        </td>
        </tr>
    </table>
</div>

{else}
    <div id="tablewrapper">Sorry,No Details Found!</div>
{/if}
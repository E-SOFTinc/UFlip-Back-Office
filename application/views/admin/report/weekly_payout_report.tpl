{assign var="report_name" value="{$tran_user_payout_report}"}
{include file="admin/report/header.tpl" name=""}
<table><tr><td><b>{$tran_from}:{$from}</b></td><td><b>&nbsp;{$tran_to}: {$to}</b></td></tr></table>
{if $count >= 1}
    <br><br><table border='1' cellpadding="0" cellspacing="0" align='center' >
        <tr>
            <th>{$tran_no}</th>
            <th>{$tran_full_name}</th>
            <th>{$tran_user_name}</th>
            <th>{$tran_address}</th>
            <!--<th>{$tran_bank}</th>
            <th>{$tran_account_no}</th>-->
            <!--<th>{$tran_pan_no}</th>-->
            <!--
        <th>Left Count</th>
        <th>Right Count</th>
        <th>Total Leg</th>
            -->
            <th>{$tran_total_amount}</th>
            <th>{$tran_tds}</th>
            <th>{$tran_service_charge}</th>
            <th>{$tran_amount_payable}</th>
        </tr>
        {assign var="i" value=0}
        {foreach from=$weekly_payout item=v}

            {$i = $i+1}

            <tr >

                <td>{$i}</td>
                <td>{$v.full_name}</td>
                <td>{$v.user_name}</td>
                <td>{$v.user_address}</td>
               <!-- <td>{$v.user_bank}</td>
                <td>{$v.acc_number}</td>-->
                <!--<td>{$v.user_pan}</td>-->
                <!--
                <td><?php echo $left_leg; ?></td>
                <td><?php echo $right_leg; ?></td>
                <td><?php echo $total_leg; ?></td>
                -->
                <td>{number_format($v.total_amount,2)}</td>
                <td>{number_format($v.tds,2)}</td>
                <td>{number_format($v.service_charge,2)}</td>
                <td>{number_format($v.amount_payable,2)}</td>
            </tr>
        {/foreach}
        <!--
                <tr>
                        <td colspan='9' align='right'>
                        <a href='excel/weekly_report_excel.php?from=$from_date&to=$to_date'>Create Excel file</a>
                        </td>
                        </tr>
        -->
    </table>
{/if}
</div>
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
            <a href="" onClick="window.print();
                    return false">
                <img src="{$PUBLIC_URL}/images/1335779082_document-print.png" alt="Print" border="none"></a>
        </td>
        </tr>
    </table>
</div>
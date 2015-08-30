{assign var="report_name" value="Bank Statement Report"}
{include file="admin/report/header.tpl" name=""}
{if $count >= 1}
    <div id="tablewrapper">
        <table>
            <tr>
                <td>
                    <b>{$tran_dear} {$details["detail1"]["name"]},</b>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td>
                    {$tran_first} <b>{number_format($member_payout["amount_payable"],2)}</b> {$tran_second}
                </td>
            </tr>
        </table>
        <br><br>
        <table border='1' align='center' cellpadding="0" cellspacing="0" width='100%' >

            <tr><th>{$tran_user_name}</th><td>{$member_payout["user_name"]}</td></tr>
            <tr><th>{$tran_bank_details} </th><td>
                    {$tran_name}       :{$details["detail1"]["name"]}          
                    <br />{$tran_account_no} :{$details["detail1"]["acnumber"]}         
                    <br />{$tran_bank}       :{$details["detail1"]["nbank"]}          
                    <br />IFC        :{$details["detail1"]["pan"]}       

                    <br></td></tr>

            <tr><th>{$tran_total_amount}</th><td>{number_format($member_payout["total_amount"],2)}</td></tr>
            <tr><th>TDS</th><td>{number_format($member_payout["tds"],2)}</td></tr>
            <tr><th>{$tran_service_charge}</th><td>{number_format($member_payout["service_charge"],2)}</td></tr>
            <tr><th>{$tran_cross_amount}</th><td>{number_format($member_payout["amount_payable"],2)} </td></tr>
        </table>
    </div>
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
{/if}



{assign var="report_name" value="{$tran_member_wise_payout_report}"}
{include file="admin/report/header.tpl" name=""}
{if $count >= 1}

<br><br><table border='1' align='center'cellpadding="0" cellspacing="0" width='50%' >
 

        {assign var="user_name" value=$member_payout["user_name"]}
        {assign var="full_name" value=$member_payout["full_name"]}
        {assign var="total_amount" value=$member_payout["total_amount"]}
        {assign var="amount_payable" value=$member_payout["amount_payable"]}
        {assign var="tds" value=$member_payout["tds"]}
        {assign var="service_charge" value=$member_payout["service_charge"]}
        {assign var="user_pan" value=$member_payout["user_pan"]}
        {assign var="acc_number" value=$member_payout["acc_number"]}
        {assign var="user_bank" value=$member_payout["user_bank"]}
        {assign var="user_address" value=$member_payout["user_address"]}

        <tr class="text"><th align="left" width="30%">{$tran_user_name}</th><td width="30%">{$user_name}</td></tr>
    <tr><th align="left" width="30%">{$tran_full_name}</th><td width="30%">{$full_name}</td></tr>
    <tr><th align="left" width="30%">{$tran_address}</th><td width="30%">{$user_address}</td></tr>
    <tr><th align="left" width="30%">{$tran_bank}</th><td width="30%">{$user_bank}</td></tr>
    <tr><th align="left" width="30%">{$tran_account_no}</th><td width="30%">{$acc_number}</td></tr>
   <!-- <tr><th>{$tran_pan_no}</th><td>{$user_pan}</td></tr>-->
			
			
			
    <!--
    <tr><th>Left Count</th><td><?php echo $left_leg; ?></td></tr>
    <tr><th>Right Count</th><td><?php echo $right_leg; ?></td></tr>
    <tr><th>Total Leg</th><td><?php echo $total_leg; ?></td></tr>
    -->
    <tr><th align="left" width="30%">{$tran_total_amount}</th><td width="30%">{number_format($total_amount,2)}</td></tr>
    <tr><th align="left" width="30%">{$tran_tds}</th><td width="30%">{number_format($tds,2)}</td></tr>
    <tr><th align="left" width="30%">{$tran_service_charge}</th><td width="30%">{number_format($service_charge,2)}</td></tr>
    <tr><th align="left" width="30%">{$tran_amount_payable}</th><td width="30%">{number_format($amount_payable,2)}</td></tr>


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
                <a href="" onClick="window.print();return false">
                    <img src="{$PUBLIC_URL}/images/1335779082_document-print.png" alt="Print" border="none"></a>
            </td>
            </tr>
        </table>
    </div>
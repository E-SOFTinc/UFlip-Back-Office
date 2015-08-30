{assign var="report_name" value="{$tran_epin_report}"}
{include file="admin/report/header.tpl" name=""}
{if $count >= 1}


<br><br><table border='1' cellpadding="0" cellspacing="0" align='center' >
<tr>
    <th>{$tran_no}</th>
    <th>{$tran_used_user}</th>
    <th>{$tran_epin}</th>
    <th>{$tran_pin_uploaded_date}</th>
    <th>{$tran_epin_amount}</th>
    <th>{$tran_pin_balance_amount}</th>
  
    </tr>
    {assign var="i" value=0}
    {foreach from=$pin_details item=v}

        
{$i = $i+1}

   
	<tr >

	                <td> {$i}</td>
			<td>{$v.used_user}</td>
                        <td>{$v.pin_number}</td>
			<td>{$v.pin_alloc_date}</td>
			<td>{$v.pin_amount}</td>
			<td>{$v.pin_balance_amount}</td>
                    
			</tr>
{/foreach}
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
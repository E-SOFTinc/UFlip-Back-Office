{assign var="report_name" value="{$tran_payout_release_report}"}
{include file="admin/report/header.tpl" name=""}
    {assign var="j" value="0"}
    {if $count >=1}

        <br><br><table border='1' align='center' cellpadding='0' cellspacing='0' >
            <tr>
                <th>{$tran_no}</th>
                <th>{$tran_user_name}</th>
                <th>{$tran_name}</th>
             
                <th>{$tran_total_amount}</th>
              
                <th>{$tran_date}</th>

                <!--<th>Account Number</th>
                <th>IFSC</th>
                                <th>Branch</th>
                                 <th>Bank Name</th>
                                  <th>PAN</th>-->

            </tr>

            {foreach from=$binary_details item=v}	



                {$j=$j+1}
                <tr >
                    <td> {$j} </td>
                    <td>{$v.paid_user_id}</td>
                    <td>{$v.full_name}</td>
                    <td>{number_format($v.paid_amount,2)}</td>
                    <td>{$v.paid_date}</td>
                   

                    <!--<td>$user_detail_acnumber</td>
                    <td>$user_detail_ifsc</td>
                    <td>$user_detail_nbranch</td>
                    <td>$user_detail_nbank</td>
                    <td>$user_detail_pan</td>-->			
                </tr>
            {/foreach}
         
        </table>
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
    {/if}


{assign var="report" value="{$tran_sales_report}"}
{include file="admin/report/header.tpl" name=""}
{if $count >= 1}

    <br><br><table border='1' cellpadding='0' cellspacing='0' align='center' >
        <tr class='th'>
            <th>{$tran_slno}</th>
            <th>{$tran_invoice_no}</th>
            <th>{$tran_prod_name}</th>
            <th>{$tran_username}</th>

           
            <th>{$payment_method}</th>
            <th>{$tran_amount}</th>
            
        </tr>
       
         {assign var="i" value=0}
                {foreach from=$report_arr item=v}

                {if $i%2==0}
                    {assign var="class" value="tr1"}
                {else}
                    {assign var="class" value="tr2"}
                {/if}
                
                {$i=$i+1}
                <tr{$class}>

                
                <td>{$v.id}</td>
                <td>{$v.invoice_no}</td>
                <td>{$v.prod_id}</td>
                <td>{$v.user_id}</td>
               
                <td>{$v.payment_method}</td>
                <td>{number_format($v.amount,2)}</td>
            </tr>
           

        {/foreach}
        <tr><td colspan="5" style="text-align: center">{$tran_total_amount}</td><td>{number_format($v.sum,2)}</td></tr>
    </table>
        {else}
            <h3><center>{$tran_no_data}</center></h3>
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
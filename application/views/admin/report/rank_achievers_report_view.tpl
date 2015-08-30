{assign var="report" value="{$tran_rank_achieve_report}"}
{include file="admin/report/header.tpl" name=""}
{if $count >= 1}

    <br><br><table border='1' cellpadding='0' cellspacing='0' align='center' >
        <tr class='th'>
            <th>{$tran_slno}</th>
            <th>{$tran_new_rank}</th>
            <th>Username</th>
            <th>{$tran_user_full_name}</th>
            <th>{$tran_rank_achieved_date}</th>
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
                <td>{$i}</td>
                <td>{$v.rank_name}</td>
                <td>{$v.user_name}</td>
                <td>{$v.user_detail_name}</td>
                <td>{$v.date}</td>
            </tr>
           

        {/foreach}
       
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
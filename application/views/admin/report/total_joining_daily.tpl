{assign var="report_name" value="{$tran_user_joining_report}"}
{include file="admin/report/header.tpl" name=""}
<center><b>{$tran_date}: {$date}</b></center>
    {if $count >= 1}
    <br><br><table border='1'  cellpadding='0' cellspacing='0' align='center' >
        <tr class='th'>
            <th>{$tran_no}</th>
            <th>{$tran_user_name}</th>
            <th>User Full Name</th>
            <th>Upline Name</th>
            <th>{$tran_sponser_name}</th>
            <th>{$tran_status}</th>
            <th>{$tran_date_of_joining}</th>
        </tr>
        {assign var="i" value=0}
        {foreach from=$todays_join item=v}

            {if $i%2==0}
                {assign var="class" value="tr1"}
            {else}
                {assign var="class" value="tr2"}
            {/if}

            {if $v.active=="yes"}
                {assign var="stat" value="ACTIVE"}

            {else}
                {assign var="stat" value="BLOCKED"}
            {/if}
            {$i=$i+1}
            <tr{$class}>

                <td>{$i}</td>
                <td>{$v.user_name}</td>
                <td>{$v.user_full_name}</td>
                <td>{if $v.father_user}{$v.father_user}{else}NA{/if}</td>
                <td>{if $v.sponsor_name}{$v.sponsor_name}{else}NA{/if}</td>
                <td>{$stat}</td>
                <td>{$v.date_of_joining}</td>

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
            <a href="" onClick="window.print();
                    return false">
                <img src="{$PUBLIC_URL}/images/1335779082_document-print.png" alt="Print" border="none"></a>
        </td>
        </tr>
    </table>
</div>
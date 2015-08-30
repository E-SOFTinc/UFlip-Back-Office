{assign var="report_name" value="{$tran_profile_report}"}
{include file="admin/report/header.tpl" name=""}
<div class='box'>

    <table width="100%" border="1" cellpadding="0" cellspacing="0" align="center" id="datastore" class="profile_report_tbl" >
        <tr class="text">
            {foreach from=$details item=v}
                <td><strong>{$tran_name}</strong></td>
                <td>{$v.user_detail_name}</td>
            </tr>
          
            <tr>
                <td><strong>{$tran_user_name}</strong></td>
                <td>{$u_name}</td>
            </tr>

            <tr>
                <td><strong>{$tran_sponser_name}</strong></td>
                <td>{$sponser['name']}</td>
            </tr>
            
            <tr >
                <td><strong>{$tran_pincode}</strong></td>
                <td>{$v.user_detail_pin}</td>
            </tr>
            
            {*<tr>
                <td><strong>{$tran_district}</strong></td>
                <td>{$v.user_detail_district}</td>
            </tr>*}
            <tr>
                <td><strong>{$tran_state}</strong></td>
                <td>{$v.user_detail_state}</td>
            </tr>
            <tr >
                <td><strong>{$tran_mobile_no}</strong></td>
                <td>{$v.user_detail_mobile}</td>
            </tr>
            <tr>
                <td><strong>{$tran_land_line_no}</strong></td>
                <td>{$v.user_detail_land}</td>
            </tr>
            <tr>
                <td><strong>{$tran_email}</strong></td>
                <td>{$v.user_detail_email}</td>
            </tr>
            <tr>
                <td><strong>{$tran_date_of_birth} </strong></td>
                <td>{$v.user_detail_dob}</td>
            </tr>
            <tr>
                <td><strong>{$tran_gender}</strong></td>
                <td>
                    {if $v.user_detail_gender=='M'}
                        {$tran_male}
                    {else}
                        {$tran_female}
                    {/if}      
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
            <a href="" onClick="window.print();
                        return false">
                <img src="{$PUBLIC_URL}/images/1335779082_document-print.png" alt="Print" border="none"></a>
        </td>
        </tr>
    </table>
</div>
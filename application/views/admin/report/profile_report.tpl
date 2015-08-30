{assign var="report_name" value="{$tran_profile_report}"}
{include file="admin/report/header.tpl" name=""}
    {if $count >= 1}
        <br><br><table border='1'   cellpadding='0' cellspacing='0'align='center' >
            <tr><td colspan = '19'><a href={$BASE_URL}admin/excel/user_profiles_excel>{$tran_create_excel}</a></td></tr>
            <tr class='th'>
                <th>{$tran_no}</th>
                <th>{$tran_name}</th>              
                <th>{$tran_user_name}</th>
                <th>{$tran_sponser_name}</th>
                <th>{$tran_resident}</th>
                <th>{$tran_pincode}</th>
                <th>{$tran_mobile_no}</th>        
                <th>{$tran_email}</th>
{*                <th>{$tran_nominee}</th>              *}
                <th>{$tran_bank}</th>
                <th>{$tran_branch}</th>
                <th>{$tran_acc_no}</th>
                <th>{$tran_pan_no}</th>
                <th>{$tran_ifsc}</th>
                <th>{$tran_date_of_joining}</th>
            </tr>

            {if count($profile_arr)!=0}
                {foreach  from= $profile_arr item=v}
                    {assign var="tr_class" value=""}
                    {assign var="i" value="0"}
                    {if $i%2==0}
                        {$clr='tr1'}
                    {else}
                        {$clr='tr2'}
                    {/if}
                    {assign var="name" value="{$v.user_detail_name}"}
                    {assign var="passcode" value="{$v.user_detail_passcode}"}
                    {assign var="address" value="{$v.user_detail_address}"}
                    {assign var="pincode" value="{$v.user_detail_pin}"}
                    {assign var="mobile" value="{$v.user_detail_mobile}"}
                    {assign var="land" value="{$v.user_detail_land}"}
                    {assign var="email" value="{$v.user_detail_email}"}
{*                    {assign var="nominee" value="{$v.user_detail_nominee}"}*}
                    {assign var="relation" value="{$v.user_detail_relation}"}
                    {assign var="bank" value="{$v.user_detail_nbank}"}
                    {assign var="branch" value="{$v.user_detail_nbranch}"}
                    {assign var="acc" value="{$v.user_detail_acnumber}"}
                    {assign var="pan" value="{$v.user_detail_pan}"}
                    {assign var="ifsc" value="{$v.user_detail_ifsc}"}
                    {assign var="date" value="{$v.join_date}"}
                    {assign var="uname" value="{$v.uname}"}
                    {assign var="sponser_name" value="{$v.sponser_name}"}
                    {assign var="sponser_id" value="{$v.sponser_id}"}

                    <tr class="{$clr}">
                        <td>{counter}</td>
                        <td>{$name}</td>
                        <td>{$uname}</td>
                        <td>{$sponser_name}</td>
                        <td>{$address}</td>
                        <td>{$pincode}</td>
                        <td>{$mobile}</td>
                        <td>{$email}</td>
{*                        <td>{$nominee}</td>*}
                        <td>{$bank}</td>
                        <td>{$branch}</td>
                        <td>{$acc}</td>
                        <td>{$pan}</td>
                        <td>{$ifsc}</td>
                        <td>{$date}</td>

                    </tr>

                {/foreach} 

            {/if}
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

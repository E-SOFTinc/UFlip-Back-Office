
<div style="height:5px; width:100%;float:left;"></div>
<table align="center">
    <tr>
        <td>
            <form class="niceform" name="profile_form" method="POST" action=" {$PATH_TO_ROOT_DOMAIN}admin/select_report/admin_profile_report">
                <input  type="submit" value="{$tran_profile_report}" name="prof_report">
            </form>
        </td>
        <td>
            <form class="niceform" name="JoiningReport_form" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/select_report/total_joining_report">
                <input  type="submit" value="{$tran_joining_report}" name="join_report">
            </form>
        </td>
        <td>
            <form class="niceform" name="TotalPayoutReport_form" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/select_report/total_payout_report">
                <input  type="submit" value="{$tran_total_payout_report}" name="tot_pay_report">
            </form>
        </td>
        <td>
            <form class="niceform" name="BankStatementReport" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/select_report/bank_statement_report">
                <input  type="submit" value="{$tran_bank_statement}" name="ban_stat_report">
            </form>
        </td>
        <td>
            <form class="niceform" name="TotalPayoutReleaseReport_form" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/select_report/payout_release_report">
                <input type="submit" value="{$tran_payout_release_report}" name="tot_pay_report">
            </form>
        </td>
    </tr>
</table>
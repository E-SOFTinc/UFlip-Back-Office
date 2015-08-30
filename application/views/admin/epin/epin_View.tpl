<div class="box">
    <table><tr>
            <td>
                <form  class="niceform" name="GeneratePasscod" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/epin/generate_epin">
                    <input  type="submit" value="{$tran_add_epin}" name="GeneratePasscod">
                </form>
            </td>
            <td>
                <form class="niceform" name="DeletePasscod" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/epin/delete_epin">
                    <input  type="submit" value="{$tran_delete_epin}" name="DeletePasscod">
                </form>
            </td>

            <td>
                <form class="niceform" name="SearchPasscod" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/epin/search_epin">
                    <input  type="submit" value="{$tran_search_epin}" name="SearchPasscod">
                </form>
            </td>

            <td>
                <form class="niceform" name="InactivePasscod" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/epin/inactive_epin">
                    <input  type="submit" value="{$tran_inactive_epin}" name="InactivePasscod">
                </form>
            </td>

            <td>
                <form class="niceform" name="ActivePasscod" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/epin/active_epin">
                    <input  type="submit" value="{$tran_active_epin}" name="ActivePasscod">
                </form>
            </td>


        </tr></table>
</div>
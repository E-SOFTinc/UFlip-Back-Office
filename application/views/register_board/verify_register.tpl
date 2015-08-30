{if $regr['user_name_type']=='distributor'}﻿
    {include file="user/layout/header.tpl"  name=""}
{else}
    {include file="admin/layout/header.tpl"  name=""}
{/if}
<div id="span_js_messages" style="display: none;">

</div>


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_preview}
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="fa fa-resize-full"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                {*/////////////////////////////////Edited By Niyasali///////////////*}
                <div class="row">
                    <div class="col-sm-12">

                        <table class="table table-bordered table-striped">
                            <tbody>


                                <tr>
                                    <td class="column-left">{$tran_sponsor_user_name}</td>
                                    <td class="column-right">{$regr['referral_name']}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column-left">{$tran_name}</td>
                                    <td class="column-right">{$regr['full_name']}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="column-left">{$tran_date_of_birth}</td>
                                    <td class="column-right">{$regr['date_of_birth']}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column-left">{$tran_gender}</td>
                                    <td class="column-right">{$regr['gender']}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="column-left">{$tran_address}</td>
                                    <td class="column-right">{$regr['address']}
                                    </td>
                                </tr>





                                <tr>
                                    <td class="column-left">{$tran_pin_code}</td>
                                    <td class="column-right">{if $regr['pin']==""}NA{else}{$regr['pin']}{/if}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="column-left">{$tran_country}</td>
                                    <td class="column-right">{$regr['country']}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="column-left">{$tran_mob_no_10_digit}</td>
                                    <td class="column-right">{$regr['mobile']}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="column-left">{$tran_land_line_no}</td>
                                    <td class="column-right">{if $regr['land_line']==""}NA{else}{$regr['land_line']}{/if}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column-left">{$tran_email}</td>
                                    <td class="column-right">{$regr['email']}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column-left">{$tran_pan_no}</td>
                                    <td class="column-right">{if $regr['pan_no']==""}NA{else}{$regr['pan_no']}{/if}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="column-left">{$tran_bank_account_number}</td>
                                    <td class="column-right">{if $regr['bank_acc_no']==""}NA{else}{$regr['bank_acc_no']}{/if}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="column-left">{$tran_ifsc_code}</td>
                                    <td class="column-right">{if{$regr['ifsc']}==""}NA{else}{$regr['ifsc']}{/if}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column-left">{$tran_bank_name}</td>
                                    <td class="column-right">{if $regr['bank_name'] ==""}NA{else}{$regr['bank_name']}{/if}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column-left">{$tran_branch_name}</td>
                                    <td class="column-right">{if $regr['bank_branch'] ==""}NA{else}{$regr['bank_branch']}{/if}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <form name="" id="" method="post">
                                <div class="col-sm-2 col-sm-offset-3">
                                    <button class="btn btn-bricky"  name="confirm_register"  id="confirm_register" type="submit"  value="{$tran_confirm_register}" >{$tran_confirm_register}</button>
                                </div>
                                <div class="col-sm-2 col-sm-offset-3">
                                    <button class="btn btn-bricky" style="padding-right: 20px"  name="edit" type="submit" value="{$tran_edit}" >{$tran_edit}</button>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>

            {*///////////////////////////////////////////*}
        </div>
    </div>
</div>
{if $regr['user_name_type']=='distributor'}﻿
    {include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
{else}
    {include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
{/if}
<script>
    jQuery(document).ready(function() {
        Main.init();
        //TableData.init();
        //ValidateUser.init();
    });
</script>
{include file="../layout/header.tpl"  name=""}
{*include file="../select_report/report_tab.tpl"  name=""*}
<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_You_must_select_from_date}</span>
    <span id="error_msg1">{$tran_You_must_select_to_date}</span>
    <span id="errmsg4">{$tran_You_must_Select_From_To_Date_Correctly}</span>
    <span id="error_msg2">{$tran_You_must_enter_user_name}</span>
    <span id ="error_msg4">{$tran_You_must_select_a_Todate_greaterThan_Fromdate}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>      {$tran_total_payout_report}
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
                <form role="form" class="smart-wizard form-horizontal" action="../report/total_payout_report_view"  method="post"    name="daily" id="daily" target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="dailydate">
                            {$tran_user_payout_report}
                        </label>
                        <div class="col-sm-6">
                            <button class="btn btn-bricky" tabindex="1" name="dailydate" type="submit" value="{$tran_view}"> {$tran_view} </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>      {$tran_weekly_payout}
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
                <form role="form" class="smart-wizard form-horizontal"  action="../report/weekly_payout_report"  method="post"    name="weekly_payout" id="weekly_payout" target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1">
                            {$tran_from_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="2" size="20" maxlength="10"  value="{$date_diff}" >
                                <label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2">
                            {$tran_to_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="3" size="20" maxlength="10"  value="{$cur_date}" >
                                <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="4" name="weekdate" type="submit" value="{$tran_submit}"> {$tran_submit} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>  {$tran_member_wise_payout_report}
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
                <form role="form" class="smart-wizard form-horizontal" action="../report/member_payout_report" method="post" name="user" id="user" target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">
                            {$tran_select_user} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input  type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="5" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky"tabindex="6" name="user_submit" type="submit"style="margin: 5px 0 0 20px;" value="{$tran_view}"> {$tran_view} </button>


                        </div>
                    </div>      




                </form>
            </div>
        </div>
    </div>
</div>

{*Code added by Affar*}


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>      {$tran_payout_released_report}
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
                <form role="form" class="smart-wizard form-horizontal"  action="../report/payout_released_report"  method="post" name="payout_release_amount" id="payout_release_amount" target="_blank">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date3">
                            {$tran_from_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date3" id="week_date3" type="text" tabindex="11" size="20" maxlength="10"  value="{$date_diff}" >
                                <label for="week_date3" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date4">
                            {$tran_to_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date4" id="week_date4" type="text" tabindex="12" size="20" maxlength="10"  value="{$cur_date}" >
                                <label for="week_date4" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="13" name="weekdate" type="submit" value="{$tran_submit}"> {$tran_submit} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                            

{include file="../layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        DatePicker.init();
        ValidateUser.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
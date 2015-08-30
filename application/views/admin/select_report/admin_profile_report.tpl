{include file="../layout/header.tpl"  name=""}
{*include file="../select_report/report_tab.tpl"  name=""*}
<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_You_must_enter_user_name}</span>
    <span id="error_msg2">{$tran_you_must_enter_a_valid_user_name}</span>
    <span id="error_msg3">{$tran_you_must_enter_count}</span>
    <span id="error_msg9">{$tran_digits_only}</span>
    <span id="error_msg4">{$tran_you_must_enter_count_from}</span>
    <span id="error_msg5">{$tran_you_must_enter_count}</span>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    {$tran_profile_report}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="searchform" id="searchform" target='_blank' action="../report/profile_report_view" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">
                            {$tran_select_user_name} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="1" type="text"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" id="user_name" name="user_name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="2"   type="submit" id="profile_update" name="profile_update" value="{$tran_view}"  > {$tran_view}</button>
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
                <i class="fa fa-external-link-square"></i>    {$tran_profile_report}
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
                <form role="form" class="smart-wizard form-horizontal"  name="searchform1" id="searchform1" target='_blank' action="../report/profile_report" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count">
                            {$tran_enter_count}<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="3" type = "text" name = "count" id = "count">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="4"   type="submit" id="profile" name="profile" value="{$tran_view}"  > {$tran_view}</button> 

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
                <i class="fa fa-external-link-square"></i>    {$tran_profile_report}
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
                <form role="form" class="smart-wizard form-horizontal"   name="from_to_form" id="from_to_form" method="post" target='_blank' action="../report/profile_report">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count_from">
                            {$tran_enter_count_start_from}<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="5" type = "text" name = "count_from" id = "count_from">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count_to">
                            {$tran_enter_count}<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="6" type = "text" name = "count_to" id = "count_to">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="7"   type="submit" name="profile_from" id="profile_from" value="{$tran_view}"  > {$tran_view}</button>
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
        ValidateUser.init();

    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
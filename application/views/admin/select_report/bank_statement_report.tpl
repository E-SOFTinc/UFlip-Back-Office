
{include file="admin/layout/header.tpl"  name=""}

{*include file="../select_report/report_tab.tpl"  name=""*}

<div id="span_js_messages" style="display: none;"> 
    <span id="error_msg">{$tran_You_must_enter_user_name}</span>    
</div>


{if $user_type=='admin'}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_bank_statement}
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
                    <form role="form" class="smart-wizard form-horizontal"  action="../report/bank_statement"  method="post"  name="daily" id="daily" target="_blank" >
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
                                <input tabindex="1" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">

                                <button class="btn btn-bricky"tabindex="3" type="submit" name="bank_stmnt" value="{$tran_view}">{$tran_view} </button>                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{else}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_bank_statement}
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
                    <form role="form" class="smart-wizard form-horizontal"  action="../report/bank_statement"  method="post"  name="daily" id="daily" target="_blank" >

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="user_name">
                                {$tran_select_user_name} <span class="symbol required"></span>
                            </label>
                            <div class="col-sm-6">
                                <input tabindex="1" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">

                                <button class="btn btn-bricky"tabindex="3" type="submit" name="bank_stmnt_user" value="{$tran_view_bank_statement_report}">{$tran_view_bank_statement_report} </button>                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{/if}
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateUser.init();

    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
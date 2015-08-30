{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;">
    <span id="error_msg">{$tran_you_must_enter_user_name}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div>
{*<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$page_header}
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
            {*/////////////////////////////////Edited By Niyasali///////////////*}
           {* <div class="row">
                <div class="col-sm-12">                   
                    <div class="panel-body">
                        <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> {$tran_errors_check}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_name"> {$tran_select_user_name}<font color="#ff0000" >*</font> </label>
                                <div class="col-sm-3">
                                    <input  name="user_name" id="user_name" type="text" size="30" onkeyup="ajax_showOptions(this, 'getCountriesByLetter', event)" autocomplete="off" tabindex="1">
                                    <span class="help-block" for="user_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <button class="btn btn-bricky" type="submit" id="user_details" value="user_details" name="user_details" tabindex="2">
                                        {$tran_view}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> *}

{include file="admin/profile/user_search.tpl" name=""}
{if $posted}
    {include file="admin/profile/user_summary_header.tpl"  name=""}
{/if}

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
                                        jQuery(document).ready(function() {
                                            Main.init();
                                            //TableData.init();
                                            ValidateUser.init();
                                        });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
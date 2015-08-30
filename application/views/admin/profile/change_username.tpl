{include file="admin/layout/header.tpl"  name=""}

<!-- start: PAGE HEADER -->

<!-- end: PAGE HEADER -->

<!-- start: PAGE CONTENT -->

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_You_must_enter_user_name}</span>
    <span id="error_msg2">{$tran_you_must_enter_new_username}</span>
    <span id="error_msg3">{$tran_special_chars_not_allowed}</span>
    <span id="error_msg8">{$tran_special_chars_not_allowed}</span>
    <span id="error_msg9">{$tran_minimum_three_characters_required}</span>
</div>	

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_change_username}
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
                <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" onSubmit="return validate_username()">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">{$tran_select_user_id}<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <input placeholder="{$tran_type_members_name}" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1">
                        </div>
                    </div>
                          <div class="form-group">
                          <label class="col-sm-2 control-label" for="new_username">{$tran_new_username}<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <input placeholder="{$tran_type_new_username}" class="form-control" type="text" id="new_username" name="new_username" autocomplete="Off" tabindex="2" >

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            
                            <button class="btn btn-bricky" type="submit" id="change_username" value="change_username" name="change_username" tabindex="2">
                                {$tran_change_username}
                            </button>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end: PAGE CONTENT -->
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init();
    ValidateUser.init();
});
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}

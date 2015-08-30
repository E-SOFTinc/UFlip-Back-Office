{include file="user/layout/header.tpl" name=""}
<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_select_user_name}</span>
    </div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_send_transaction_password} 
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
                <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="col-sm-2 col-sm-offset-2">
                        <label class="col-sm-2 control-label" for="sent_passcode"><button class="btn btn-bricky" type="submit" name="sent_passcode" id="sent_passcode" value="{$tran_send_password}" tabindex="2">
                                {$tran_send_password}
                            </button></label>
                        
                         </div>
                            <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}admin/">
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>            

{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init();  
    ValidateUser.init();
});
</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
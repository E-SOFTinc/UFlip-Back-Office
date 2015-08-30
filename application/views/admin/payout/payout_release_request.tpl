
{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;">
    <span id="errmsg">{$tran_need_payout_request_amount}</span>

</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    {$tran_Request_Payout_Release}   
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
                <form role="form" class="smart-wizard form-horizontal" name="payout_request" id="payout_request"  action="" method="post">
                   
                    
                  <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i>{$tran_errors_check}
                                        </div>
                                    </div>
                       
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="minimum_payout_amount"> {$tran_Minimum_Payout_Amount}:</label>
                        <div class="col-sm-6">
                       
                            <input type="hidden" name="minimum_payout_amount" id="minimum_payout_amount" value="{$minimum_payout_amount}" />
                              {$minimum_payout_amount}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="balance_amount">{$tran_Payout_Request_Amount}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="balance_amount" id="balance_amount" value="{$balance_amount}" />
                            <input type="text" name="payout_amount" id="payout_amount" value="{$balance_amount}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" name="payout_request_submit" id="payout_request_submit" value="Send Request" tabindex="2">
 {$tran_Send_Request}                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>
    </div>
</div>





{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
  <script>
    jQuery(document).ready(function() {
    Main.init();  
    ValidateUser.init();  
   
    });
    </script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}

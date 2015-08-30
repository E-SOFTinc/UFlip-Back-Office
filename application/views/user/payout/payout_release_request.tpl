
{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_please_enter_your_company_name}</span>        
    <span id="error_msg2">{$tran_please_type_your_comments}</span>        
    <span id="error_msg3">{$tran_please_type_your_phone_no}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id="error_msg">{$tran_please_enter_your_company_name}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
</div> 

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
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
                 {$tran_Request_Payout_Release}        
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="payout_request" id="payout_request" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company">{$tran_Minimum_Payout_Amount}:</label>
                        <div class="col-sm-6">
{$minimum_payout_amount}   
                        <input type="hidden" name="minimum_payout_amount" id="minimum_payout_amount" value="{$minimum_payout_amount}" />

                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company">{$tran_Payout_Request_Amount}:</label>
                        <div class="col-sm-6">
                            <input  type="text" name="payout_amount" id="payout_amount" value="{$balance_amount}"  autocomplete="Off" >
                           
                        </div>
                    </div>

                   

                    


                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="payout_request_submit" id="payout_request_submit" value="Send Request">
                            {$tran_Send_Request}  
                            </button>
                        </div>
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
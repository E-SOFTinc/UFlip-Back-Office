{include file="user/layout/header.tpl"  name=""}


      <div id="span_js_messages" style="display:none;">
            <span id="error_msg1">{$tran_You_must_enter_user_name}</span>
            <span id="error_msg2">{$tran_NO_BALANCE}</span>
            <span id="error_msg3">{$tran_Please_type_transaction_password}</span>
            <span id="error_msg4">{$tran_Please_type_To_User_name}</span>                     
            <span id="error_msg5">{$tran_Please_type_Amount}</span>
            <span id="error_msg6">{$tran_NO_BALANCE}</span>     
            <span id="validate_msg1">{$tran_digits_only}</span>
        </div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_ewallet}
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
                <form role="form" class="smart-wizard form-horizontal" method="post" name="fund_form" id="fund_form" action="../ewallet/fund_transfer" >
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="avb_amount">{$tran_available_amount}</label>
                        <div class="col-sm-6">
                            <input type="text" id="avb_amount" name="avb_amount" readonly="1" value="{$balamount}"  autocomplete="Off" tabindex="1" />
                        <input type="hidden" id="bal" name="bal"   value="{$balamount}" />
                       
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pswd">
                            {$tran_transaction_password} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                           <input type="password" id="pswd" name="pswd"  tabindex="2"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="to_user_name">
                            {$tran_enter_user_name} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                           <input type="text" id="to_user_name" name="to_user_name" autocomplete="Off" tabindex="3" /><span id="errormsg1"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount">{$tran_amount} <span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="text" id="amount" name="amount" tabindex="4" />
                             <span id="errmsg1"></span>
                        </div>
                    </div>

                                      
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                         
                                <button class="btn btn-bricky"tabindex="5" name="fund_trans" id="fund_trans" type="submit" value="{$tran_submit}"> {$tran_submit} </button>
                           
                        </div>
                    </div>
    <input type="hidden" name="path" id="path" value="{$PATH_TO_ROOT_DOMAIN}admin" >
                </form>
            </div>
        </div>

    </div>
</div>         
                                                                         
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
        jQuery(document).ready(function() {
        Main.init();
        ValidateFund.init();
       
    });
    </script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
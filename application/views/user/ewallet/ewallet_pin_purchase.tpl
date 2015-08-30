{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_You_must_enter_pin_count}</span>        
    <span id="error_msg2">{$tran_Please_type_transaction_password}</span>        
    <span id="error_msg">{$tran_you_must_select_an_amount}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id="error_msg">{$tran_please_enter_your_company_name}</span>

    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_e_pin_purchase}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="searchform" id="searchform" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i>{$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> {$tran_your_current_bal}:
                        </label>
                        <div class="col-sm-3">

                            <input tabindex="1" type="text" name="balance" id="balance" size="20" value=" {$balamount}" disabled="true"/>
                        </div>
                    </div>               





                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount">{$tran_amount}:<font color="#ff0000">*</font>:</label>



                        <div class="col-md-3">
                            <select name="amount" id="amount" tabindex="1"  class="form-control">
                                <option value="">{$tran_select_amount}</option>
                                {assign var=i value=0}
                                {foreach from=$amount_details item=v}
                                    <option value="{$v.id}">{$v.amount}</option>
                                    {$i = $i+1}
                                {/foreach}
                            </select>     
                        </div>


                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin_count">{$tran_epin_count}:<font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="2" type="text" name="pin_count" id="pin_count" size="20" value="" 
                                   title=""/>
                        </div>
                    </div>





                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="passcode">{$tran_transaction_password}<font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="3" type="password" name="passcode" id="passcode" size="20" value="" 
                                   title=""/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="transfer" id="transfer" value="{$tran_pin_purchase}" tabindex="4">
                                {$tran_pin_purchase}
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
        DateTimePicker.init();
    });
</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
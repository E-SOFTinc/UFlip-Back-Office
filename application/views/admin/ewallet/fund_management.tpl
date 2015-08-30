{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_select_user}</span>
    <span id="error_msg2">{$tran_Please_type_Amount}</span>
    <span id="error_msg3">{$tran_invalid_amount}</span>
    <span id="validate_msg1">{$tran_digits_only}</span>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    {$tran_ewallet_fund_management}
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
                <form role="form" class="smart-wizard form-horizontal"  action="" method="post"  name="fund_form" id="fund_form" >
                    <input type="hidden" name="path" id="path" value="{$PATH_TO_ROOT_DOMAIN}admin" >
                    <input type="hidden" name="fund1" id="fund1" value="" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">
                            {$tran_enter_user_name} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this,'getCountriesByLetters','no',event)"  autocomplete="Off" tabindex="1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount">
                            {$tran_amount} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="amount" name="amount" onkeypress="getAmountLeg();" tabindex="3" />
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tran_concept">
                            {$tran_transaction_note} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="tran_concept" name="tran_concept" tabindex="3" />
                        </div>
                    </div>
					<div class="col-sm-offset-2">
                    <div class="form-group"  style="float: left; margin-right: 0px;">
                        <div class="col-sm-2">
                            <button class="btn btn-bricky" tabindex="3" name="add_amount" id="add_amount"  type="submit" value="{$tran_add_amount}" > {$tran_add_amount}</button>
                        </div>
                    </div>


                    <div class="form-group"  style="float: left; text-align: left; width: 100px;">
                        <div class="col-sm-2 ">
                            <button class="btn btn-bricky" tabindex="3"  name="deduct_amount" id="deduct_amount" type="submit" value="{$tran_deduct_amount}" > {$tran_deduct_amount}</button>


                        </div>
                    </div>
					</div>

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
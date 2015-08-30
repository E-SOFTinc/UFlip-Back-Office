{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_enter_count}</span>        
    <span id="error_msg2">{$tran_You_must_enter_user_name}</span>        
    <span id="error_msg3">{$tran_you_must_select_a_product_name}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id ="error_msg6">{$tran_You_must_select_a_date}</span>
    <span id ="error_msg7">{$tran_past_expiry_date}</span>
    <span id ="error_msg8">{$tran_you_must_select_an_amount}</span>
    <span id="error_msg">{$tran_please_enter_your_company_name}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_epin_allocation_to_user}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="user_select_form" id="user_select_form" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i>{$tran_errors_check}
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">{$tran_select_user}<font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="1" type="text" name="user_name" id="user_name" size="20" value="" onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no', event)" 
                                   title="" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount">{$tran_amount} <font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <select name="amount1" id="amount1"  tabindex="11" class="form-control" >
                                <option value="">{$tran_select_amount}</option>
                                {assign var=i value=0}
                                {foreach from=$amount_details item=v}
                                    <option value="{$v.amount}">{$v.amount}</option>
                                    {$i = $i+1}
                                {/foreach}
                            </select> 
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count">{$tran_epin_count} <font color="#ff0000">*</font>:</label>
                        <div class="col-sm-3">
                            <input tabindex="3" type="text" name="count" id="count" size="20" value="" title=""class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="date">
                            {$tran_expiry_date}<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date" id="date" type="text" tabindex="3" size="10" maxlength="10"  value="" />
                                <label for="date" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                        
                    </div>
                    <span for="date" class="help-block">    </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="insert" id="insert" value="{$tran_submit}" tabindex="4">
                                {$tran_submit}
                            </button>
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
                                    DateTimePicker.init();
                                });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
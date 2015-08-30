{include file="user/layout/header.tpl"  name=""}
 <div id="span_js_messages" style="display: none;">
                <span id="error_msg2">{$tran_you_must_select_an_amount}</span>
                <span id="error_msg1">{$tran_you_must_enter_count}</span>        
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
                <span id="error_msg3">{$tran_enter_digits_only}</span>
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
           {$tran_request_epin}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post" name="upload" id="upload" action=""{if $pro_status=="yes"}onSubmit="return validate_passcode_add_forprod(this);" {else}
              onSubmit="return validate_passcode_add_outprod(this);" {/if} >
                    
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
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
                        <label class="col-sm-2 control-label" for="count">{$tran_count} : <font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input name="count"  id="count" type="text"  value="" title="{$tran_no_of_epin_generated}" autocomplete="Off" tabindex="2">
                        </div>
                    </div>

                   

                  


                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="reqpasscode" id="reqpasscode" value="{$tran_request_epin}" style="" title="{$tran_request_epin}" tabindex="3">
                               {$tran_request_epin}
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
       // TableData.init();
        ValidateUser.init();
        //DateTimePicker.init();
    });
</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
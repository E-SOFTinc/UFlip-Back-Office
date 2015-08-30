{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_api_pspid}</span>
    <span id="validate_msg2">{$tran_you_must_enter_api_password}</span>
    <span id="validate_msg3">{$tran_you_must_select_language}</span>
    <span id="validate_msg4">{$tran_you_must_select_currency}</span>
    <span id="validate_msg5">{$tran_you_must_enter_accept_url}</span>
    <span id="validate_msg6">{$tran_you_must_enter_decline_url}</span>
    <span id="validate_msg7">{$tran_you_must_enter_exception_url}</span>
    <span id="validate_msg8">{$tran_you_must_enter_cancel_url}</span>
    <span id="validate_msg9">{$tran_you_must_enter_api_url}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> {$tran_epdq_configuration}
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
                <form role="form" class="smart-wizard form-horizontal" name="payment_status_form" id="payment_status_form" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="api_username">{$tran_api_pspid} </label>
                        <div class="col-sm-3">                           
                            <input type="text" name="api_pspid" id="api_pspid" tabindex="1" value='{$epdq_details['api_pspid']}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="api_password">{$tran_api_password} </label>
                        <div class="col-sm-3">                           
                            <input type="password" name="api_password" id="api_password" tabindex="22" value='{$epdq_details['api_password']}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="api_language">{$tran_api_language}</label>
                        <div class="col-sm-3">                           
                            <select name="language" id="language" tabindex="3" value='{$epdq_details['api_language']}' class="form-control" >
                                <option value="en_US">US English</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="api_currency">{$tran_currency}</label>
                        <div class="col-sm-3">   
                           

                                <select name="currency" id="currency" tabindex="4" value='{$epdq_details['api_currency']}' class="form-control" >
                                    <option value="USD"> U S D</option>
                                    <option value="GBP"> GBP</option>
                                    <option value="EUR"> EUR</option>

                                </select>
                            </div>

                         
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="accept_url">{$tran_accept_url} </label>
                        <div class="col-sm-3">    
                            <textarea  name="accept_url" id="accept_url" tabindex="5" rows="2" cols="19"   autocomplete="Off" >{$epdq_details['accept_url']}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="decline_url">{$tran_decline_url} </label>
                        <div class="col-sm-3">    
                            <textarea  name="decline_url" id="decline_url" tabindex="6" rows="2" cols="19"   autocomplete="Off" >{$epdq_details['decline_url']}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="exception_url">{$tran_exception_url} </label>
                        <div class="col-sm-3">
                            <textarea  name="exception_url" id="exception_url" tabindex="7" rows="2" cols="19"   autocomplete="Off" >{$epdq_details['exception_url']}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="cancel_url">{$tran_cancel_url} </label>
                        <div class="col-sm-3">
                            <textarea  name="cancel_url" id="cancel_url" tabindex="8" rows="2" cols="19"   autocomplete="Off" >{$epdq_details['cancel_url']}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="api_url">{$tran_api_url} </label>
                        <div class="col-sm-3">
                            <textarea  name="api_url" id="api_url" tabindex="9" rows="2" cols="19"   autocomplete="Off" >{$epdq_details['api_url']}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-3">   
                            <button class="btn btn-bricky" type="submit" name="update_epdq"  value="change_tran" id="change"  tabindex="10">{$tran_update}</button>
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
        ValidateEpdqConfig.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  

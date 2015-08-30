{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display:none;">

    <span id="confirm_msg1">{$tran_sure_you_want_to_edit_this_news_there_is_no_undo}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <span id="error_msg1">{$tran_you_must_enter_rank_name}</span>
    <span id="error_msg2">{$tran_you_must_enter_referal_count}</span>
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
                {$tran_payout_setting}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="payout_form" id="payout_form" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>


                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="min_payout">   {$tran_Minimum_Payout_Amount}:</label>
                            <div class="col-sm-3">
                                {if $payout_release_status=="from_ewallet" || $payout_release_status=="ewallet_request"}
                                    <input tabindex="10" type = 'text' name ='min_payout' id='payout_amount' value="{$obj_arr["min_payout"]}" title="{$tran_Minimum_Amount_for_Payout_Release}">
                                {else}
                                    <input type="hidden" name="min_payout" id="min_payout" value="0"/>
                                {/if}
                                <span id="errmsg6"></span>
                            </div>
                        </div>
                        <div class="form-group">

                                <label class="col-sm-2 control-label" for="payout_status"> {$tran_payout_method} : </label>
                                <div class="col-sm-4">
                                    <p>
                                        <input tabindex="11" type="radio" id="payout_normal" name="payout_status" value="normal" {if $payout_release_status=='normal'}checked {/if}/>
                                        <label for="payout_normal">{$tran_daily}</label>
                                    </p>
                                    <p>
                                        <input tabindex="11" type="radio" name="payout_status" id="payout_ewallet" value="from_ewallet" {if $payout_release_status=='from_ewallet'}checked {/if} />
                                        <label for="payout_ewallet">{$tran_from_e_wallet}</label>
                                    </p>
                                    <p>
                                        <input tabindex="11" type="radio" name="payout_status" id="payout_ewallet_req" value="ewallet_request" {if $payout_release_status=='ewallet_request'}checked {/if} />
                                        <label for="payout_ewallet_req">{$tran_e_wallet_request}</label>
                                    </p>
                                    <span id="errmsg6"></span>
                                </div>
                        </div>
                                    <div class="form-group">
                                            {if $payout_release_status=="ewallet_request"}
                                                <label class="col-sm-2 control-label" for="payout_validity"> {$tran_Payout_Request_Validity}:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name ="payout_validity"  id ="payout_amount" value="{$obj_arr["payout_request_validity"]}" title="{$tran_Payout_Request_Validity_days}"> 
                                                </div>   
                                            {else}
                                                <input type="hidden" name ="payout_validity"  id ="payout_amount" value="{$obj_arr["payout_request_validity"]}" >                   

                                            {/if}
                                            
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="12" name="setting" id="setting" title="{$tran_update}">{$tran_update}</button>
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
        TableData.init();
        Validateconfig.init();

    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
{include file="../layout/header.tpl"  name=""}
{*include file="../select_report/report_tab.tpl"  name=""*}
<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_You_must_select_from_date}</span>
    <span id="error_msg1">{$tran_You_must_select_to_date}</span>
    <span id="errmsg4">{$tran_You_must_Select_From_To_Date_Correctly}</span>
    <span id="error_msg2">{$tran_You_must_enter_user_name}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   {$tran_set_payout_release_date}
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
                <form role="form" class="smart-wizard form-horizontal"    method="post"    name="payout_relesed_date" id="payout_relesed_date" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                        
                        {if payout_release== "daily"}
                              <div class="form-group">
                        <label class="col-sm-2 control-label" for="">{$tran_payout_type}: <strong>{$tran_Daily}</strong></label>
                        <div class="col-sm-6">
                            Daily
                        </div>
                    </div>
                            {/if}
                            {if $payout_release=='monthly'}
                                
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label" >{$tran_payout_type}:<strong>{$payout_release}</strong></label>
                       
                    </div>
                              <div class="form-group">
                        <label class="col-sm-2 control-label" for="date1">
                           {$tran_start_date}:<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="mdate1" id="mdate1" type="text" tabindex="1" size="20" maxlength="10"  value="" >
                                <label for="mdate1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2">
                         {$tran_end_date}:<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="mdate2" id="mdate2" type="text" tabindex="2" size="20" maxlength="10"  value="" >
                                 <label for="mdate2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="3" name="payoutdate" type="submit" value="submit"> Submit </button>
                        </div>
                    </div>
                            {/if}
                    {if $payout_release=='week'}
                         <div class="form-group">
                                      <label class="col-sm-2 control-label" >{$tran_payout_type}: <strong>{$payout_release}</strong></label>
                       
                    </div>
                                      
                              <div class="form-group">
                        <label class="col-sm-2 control-label" for="date1">
                           {$tran_start_date}:<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date1" id="date1" type="text"  size="20" maxlength="10"  value="" >
                               <label for="date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2">
                          {$tran_end_date}:<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date2" id="date2" type="text" size="20" maxlength="10"  value="" >
                               <label for="date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="3" name="payoutdate" type="submit" value="submit"> {$tran_submit} </button>
                        </div>
                    </div>
                            {/if}
                </form>
            </div>
        </div>
    </div>
</div>


{include file="../layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        DatePicker.init();
        ValidateDate.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
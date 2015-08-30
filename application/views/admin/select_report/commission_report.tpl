{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">

    <span id="error_msg">{$tran_You_must_select_from_date}</span>
    <span id="error_msg1">{$tran_You_must_select_to_date}</span>
    <span id="error_msg2">{$tran_You_must_Select_From_To_Date_Correctly}</span>
    <span id="error_msg3">{$tran_you_must_select_product}</span>
    <span id ="error_msg4">{$tran_You_must_select_a_Todate_greaterThan_Fromdate}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_commission_report}
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

                <form role="form" class="smart-wizard form-horizontal" action="../report/commission_report_view"  method="post"  name="commision_form" id="commision_form" target="_blank" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from_date">
                            {$tran_from_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="from_date" id="from_date" type="text" tabindex="1" size="20" maxlength="10"  value="{$date_diff}" >
                                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                            </div>
                        </div>
                        <label class="col-sm-1 control-label" for="to_date" style="width: 100px;">
                            {$tran_to_date} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="to_date" id="to_date" type="text" tabindex="1" size="20" maxlength="10"  value="{$cur_date}" >
                                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="type">
                            {$tran_amount_type} <span class="symbol required"></span>
                        </label>
                        <div class="col-md-3"> 

                            <option value="">{$tran_select_amount_type}</option>
                            <select multiple name="amount_type[]" id="amount_type" style="vertical-align: top;width: 200px;">
                                {for $i=0;$i<$count_commission;$i++}

                                    <option value="{$commission_types[$i]['db_amt_type']}">{$commission_types[$i]['view_amt_type']}</option>


                                {/for}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky" tabindex="5" name="commision" type="submit" value="{$tran_submit}"> {$tran_submit} </button>


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
        DatePicker.init();
        ValidateCommissionReport.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
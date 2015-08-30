{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_select_user}</span>
    <span id="error_msg2">{$tran_You_must_select_a_date}</span>
    <span id="error_msg3">{$tran_invalid_period}</span> 
    <span id ="error_msg4">{$tran_You_must_select_a_Todate_greaterThan_Fromdate}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>  {$tran_weekly_transfer} 
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
                <form role="form" class="smart-wizard form-horizontal" name="weekly_join" id="weekly_join" action="" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">{$tran_select_user_name}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" tabindex="1" ></td>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1">{$tran_from_date}<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="2" size="20" maxlength="10" >
				<label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>


                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2">{$tran_to_date}<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="3" size="20" maxlength="10"   >
				<label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>


                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" id="weekdate" value="profile_update" name="weekdate" tabindex="4">
                                {$tran_submit}
                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>
    </div>
</div>

{if $weekdate}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_weekly_transfer} 
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

                    {assign var=count value=""}
                    {assign var=i value="0"}
                    {assign var=amount value=""}
                    {assign var=date value=""}
                    {assign var=amount_type value=""}
                    {assign var=class value=""}
                    {$count = $details_count}
                    {if $count>0} 
                        <h3>{$tran_weekly_transfer_details}</h3>
                        </br>
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>    
                                <tr class="th">
                                    <th>{$tran_slno}</th>
                                    <th>{$tran_user_name}</th>
                                    <th>{$tran_date}</th>
                                    <th>{$tran_amount}</th>
                                    <th>{$tran_transfer_type}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$details item=v}
                                    {$amount = $v.total_amount}
                                    {$date = $v.date}
                                    {$amount_type = $v.amount_type}
                                    {if $amount_type == "user_credit"}
                                        {$type = "User Credit"}
                                    {else if $amount_type == "user_debit"}
                                        {$type = "User Debit"}
                                    {else if $amount_type == "admin_debit"}
                                        {$type = "Admin Debit"}
                                    {else if $amount_type == "admin_credit"}
                                        {$type = "Admin Credit"}
                                    {else if $amount_type == "fsb"}
                                        {$type = "Fast Start Bonus"}
                                    {else if $amount_type == "direct_commission"}
                                        {$type = "Direct Commission"}
                                    {else if $amount_type == "binary_match"}
                                        {$type = "Binary Match Commission"}
                                    {else if $amount_type == "leg"}
                                        {$type = "Binary Commission"}
                                    {/if}
                                    {if $i%2 == 0}
                                        {$class="tr2"}
                                    {else}
                                        {$class="tr1"}
                                    {/if}
                                    <tr class="{$class}">
                                        <td>{counter}</td>
                                        <td>{$user_name}</td>
                                        <td>{$date}</td>
                                        <td align="center" >{$amount}</td>
                                        <td>{$type}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    {else}
                        <h3> {$tran_no_transfer_details}</h3>
                    {/if}
                </div>
            </div>
        </div>
    </div>
{/if}

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   {$tran_daily_transfer}
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
                <form role="form" class="smart-wizard form-horizontal"  name="daily_transfer" id="daily_transfer" action="" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name1">{$tran_select_user_name}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input type="text" id="user_name1" name="user_name1"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" tabindex="5" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date3">{$tran_date}<span class="symbol required"></span></label>
                        <div  class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date3" id="week_date3" type="text" tabindex="6" size="20" maxlength="10" >
				<label for="week_date3" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>


                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" name="daily" id="daily"  value="profile_update" name="weekdate" tabindex="7">
                                {$tran_submit}
                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>
    </div>
</div>





{if $daily}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> {$tran_daily_transfer}
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
                    {assign var=count value=""}
                    {assign var=i value="0"}
                    {assign var=amount value=""}
                    {assign var=date value=""}
                    {assign var=amount_type value=""}
                    {assign var=class value=""}

                    {$count = $details_count}
                    {if $count>0}
                        <h3>{$tran_daily_transfer_details}</h3>
                        </br>


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1" >
                            <thead>
                                <tr class="th" >
                                    <th>{$tran_slno}</th>
                                    <th>{$tran_user_name}</th>
                                    <th>{$tran_date}</th>
                                    <th>{$tran_amount}</th>
                                    <th>{$tran_transfer_type}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$details item=v}
                                    {$amount = $v.total_amount}
                                    {$date = $v.date}
                                    {$amount_type = $v.amount_type}
                                    {if $amount_type == "user_credit"}
                                        {$type = "User Credit"}
                                    {else if $amount_type == "user_debit"}
                                        {$type = "User Debit"}
                                    {else if $amount_type == "admin_debit"}
                                        {$type = "Admin Debit"}
                                    {else if $amount_type == "admin_credit"}
                                        {$type = "Admin Credit"}
                                    {else if $amount_type == "fsb"}
                                        {$type = "Fast Start Bonus"}
                                    {else if $amount_type == "direct_commission"}
                                        {$type = "Direct Commission"}
                                    {else if $amount_type == "binary_match"}
                                        {$type = "Binary Match Commission"}
                                    {else if $amount_type == "leg"}
                                        {$type = "Binary Commission"}
                                    {/if}
                                    {if $i%2 == 0}
                                        {$class="tr2"}
                                    {else}
                                        {$class="tr1"}
                                    {/if}	
                                    <tr class="{$class}">
                                        <td>{counter}</td>
                                        <td>{$user_name}</td>
                                        <td>{$date}</td>
                                        <td align="center" >{$amount}</td>
                                        <td>{$type}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    {else}
                        <h3> {$tran_no_transfer_details}</h3>
                    {/if}


                </div>
            </div>
        </div>
    </div>
{/if}

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
	Main.init();
	TableData.init();
	DatePicker.init();
	ValidateUser.init();

    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
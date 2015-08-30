{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;">
    <span id="errmsg1">{$tran_You_must_select_a_date}</span>
    <span id="error_msg">{$tran_You_must_select_from_date}</span>
    <span id="error_msg1">{$tran_You_must_select_to_date}</span>
    <span id="errmsg4">{$tran_You_must_Select_From_To_Date_Correctly}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_total_joining_count}
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
     <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label">{$tran_total_joining_count}: </label> {$total_count}
                    </div>
                    </div>
                    
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_daily_joining}
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
                <form role="form" class="smart-wizard form-horizontal" action="" method="post" name="daily" id="daily">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="date">{$tran_date}<font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date" id="date" type="text" tabindex="1" size="20" maxlength="10"  value="" >
                                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="2" name="dailydate" type="submit" value="{$tran_submit}"> {$tran_submit} </button>

                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
            <div class="panel-body">
                {if $date1 != "" && $date2 == ""}
                    <br />
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1" width="100%">
                        <thead>
                            <tr class="th">

                                <th >{$tran_user_name}</th>
                                <th>{$tran_status}</th>
                                <th  >{$tran_sponser_name}</th>
                                <th>{$tran_date_of_joining}</th>
                                {*<th>{$tran_first_pair}</th>*}
                            </tr>
                        </thead>
                        {if count($daily_joinings) != 0}
                            {assign var="i" value=0}
                            {assign var="class" value=""}
                            {assign var="status" value=""}
                            <tbody>
                                {foreach from=$daily_joinings item=v}
                                    {if $i%2==0}
                                        {$class='tr1'}
                                    {else}
                                        {$class='tr2'}
                                    {/if}

                                    {if $v.active=="yes"}
                                        {$stat="{$tran_active}"}
                                    {else}
                                        {$stat="{$tran_blocked}"}
                                    {/if}

                                    <tr>

                                        <td>{$v.user_name}</td>
                                        <td>{$stat}</td>
                                        <td>{$v.father_user}</td>
                                        <td>{$v.date_of_joining}</td>
                                        {*<td>{$v.first_pair}</td>*}
                                    </tr>

                                    {$i=$i+1}
                                {/foreach}
                            </tbody>
                        </table>

                    {else}                        
                        <tbody>
                            <tr><td colspan="8" align="center"><h4>{$tran_user_not_found}</h4></td></tr>
                        </tbody>
                        </table>
                    {/if}


                {/if}
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_weekly_joining}
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
                <form role="form" class="smart-wizard form-horizontal" action="" method="post"  name="weekly_join" id="weekly_join" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date1">{$tran_date} 1<font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date1" id="week_date1" type="text" tabindex="3" size="20" maxlength="10"  value="" >
                               <label for="week_date1" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="week_date2">{$tran_date} 2<font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text" tabindex="4" size="20" maxlength="10"  value="" >
                               <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"tabindex="5" name="weekdate" type="submit" value="{$tran_submit}"> {$tran_submit} </button>

                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>
        <div class="panel-body">
            {if $date1 != "" && $date2 != ""}
                <br />
                <table  class="table table-striped table-bordered table-hover table-full-width" id="sample_1" width="100%">
                    <thead>
                        <tr class="th">

                            <th  >{$tran_user_name}</th>
                            <th  >{$tran_status}</th>
                            <th >{$tran_sponser_name}</th>
                            <th  >{$tran_date_of_joining}</th>
                            {*<th data-field="{$tran_first_pair}">{$tran_first_pair}</th>*}
                        </tr>
                    </thead>
                    {if count($weekly_joinings)!=0}
                        {assign var="i" value=0}
                        {assign var="class" value=""}
                        {assign var="status" value=""}
                        <tbody>
                            {foreach from=$weekly_joinings item=v}
                                {if $i%2==0}
                                    {$class='tr1'}
                                {else}
                                    {$class='tr2'}
                                {/if}

                                {if $v.active=="yes"}
                                    {$stat="{$tran_active}"}
                                {else}
                                    {$stat="{$tran_blocked}"}
                                {/if}

                                <tr>
                                    <td  >{$v.user_name}</td>
                                    <td  >{$stat}</td>
                                    <td  >{$v.father_user}</td>
                                    <td  >{$v.date_of_joining}</td>
                                    {*<td>{$v.first_pair}</td>*}
                                </tr>
                                {$i=$i+1}
                            {/foreach}                    
                        {else}                        
                        <tbody>
                            <tr><td colspan="8" align="center"><h4>{$tran_user_not_found}</h4></td></tr>
                        </tbody>

                    {/if}

                </table>


            {/if}
        </div>
    </div>
</div>











{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
{if count($daily_joinings) != 0 || count($weekly_joinings)!=0}
    <script>
        jQuery(document).ready(function() {
        Main.init();   
        TableData.init();
        DatePicker.init();
        ValidateUser.init();
    });
    </script>
{else}
    <script>
    jQuery(document).ready(function() {
    Main.init();   
    DatePicker.init();
    ValidateUser.init();

});
    </script>
{/if}
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
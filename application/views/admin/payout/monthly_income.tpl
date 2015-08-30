{include file="admin/layout/header.tpl"  name=""}    
<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_you_must_select_date}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    
</div>
    <!-- end: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$page_header}
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
                        <label class="col-sm-2 control-label" for="week_date2">{$tran_select_date}<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date" id="date" type="text" tabindex="4" size="20" maxlength="10"   >
                               <label for="date" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>


                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" id="submit" value="submit" name="submit" tabindex="2">
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
                {if $status == 1}
                
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_Total_income}
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
                <table  class="table table-striped table-bordered table-hover table-full-width" id="sample_1" width='50'>
                    <thead>
                        <tr class ='th' >
                         <th class="hidden-xs">{$tran_Amount_Type}</th>
                         <th class="hidden-xs">{$tran_Amount}</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    {assign var="total_amount" value="0"}
                     {foreach from=$monthly_income_details item=v}
                          {assign var="total_amount" value="{$total_amount+$v}"}
                         <tr>
                         <td class="hidden-xs" >{$tran_Joining}</td>
                         <td class="hidden-xs">{$v}</td>
                         
                         </tr>
                     {/foreach}
                     <tr>
                         <td>{$tran_Total_amount}</td>
                         <td>{$total_amount}</td>
                     </tr>
                    </tbody>
                </table>
                
                
                
            </div>
        </div>
    </div>
</div>
                     
                                    
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_Total_Commsion_details}
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
                
                <table  class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr class ='th' >
                         <th class="hidden-xs">{$tran_Amount_Type}</th>
                         <th class="hidden-xs">{$tran_Amount}</th>
                        
                        </tr>
                    </thead>
                     <tbody>
                    {assign var="total_amount_tot" value="0"}
                     {foreach from=$monthly_commission_details item=v}
                          {assign var="total_amount_tot" value="{$total_amount_tot+$v.total_amount}"}
                         <tr>
                         <td class="hidden-xs" >{$v.amount_type}</td>
                         <td class="hidden-xs">{$v.total_amount}</td>
                         
                         </tr>
                     {/foreach}
                     <tr><td>{$tran_Total_amount}</td><td> {$total_amount_tot}</td></tr>
                    </tbody>
                   
                </table>
                
                
            </div>
        </div>
    </div>
</div>
                                                        
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <b> {$tran_perc} {$date} :{$percentage}%</b>
                            </div>
                            
                                </div>
                        </div>
                    
                    </div>
                  
                {/if}
    {include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}

    <script>
        jQuery(document).ready(function() {
        Main.init();
        DateTimePicker.init();
       Validate_revenue.init();
        TableData.init();
    });
    </script>
  
    
   

    {include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
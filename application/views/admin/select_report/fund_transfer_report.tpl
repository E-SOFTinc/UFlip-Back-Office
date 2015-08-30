
{include file="admin/layout/header.tpl"  name=""}

{*include file="../select_report/report_tab.tpl"  name=""*}

<div id="span_js_messages" style="display: none;"> 
    <span id="error_msg">{$tran_You_must_enter_user_name}</span>    
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_fund_transfer}
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
                <form role="form" class="smart-wizard form-horizontal"  action="../report/fund_transfer_report_view"  method="post"  name="daily" id="daily" target="_blank" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>

                        
                <div class="col-md-12">
                    <div class="form-group connected-group">
                      <label class="col-sm-2 control-label">
                                                                                                                                {$tran_week_wise}: <span class="symbol required"></span>
                      </label>
                                                                                                                        <div class="row">
                        <div class="col-md-3">
                            <select name="week" id="week" class="form-control">
                            <option value="All">All</option>
                            {for $i = 1;$i<=52;$i++}
                             <option value="{$i}" {if date('W')== $i} selected {/if} >{$i}</option>                            {/for}                            
                            </select>
                        </div>
                        <div class="col-md-3">
                               <select name="year" id="year" class="form-control">
                               <option value="All">All</option>
                               {for $i = date('Y'); $i >= 2000; $i--}
                                       <option value="{$i}" {if date('Y')== $i} selected {/if} >{$i}</option>
                               {/for}                       
                               </select>
                           </div>        
                     </div>
                    
                            
                    </div>
                    <div class="col-sm-2 col-sm-offset-2">
                           <button class="btn btn-bricky"tabindex="3" type="submit" name="weekdate" value="{$tran_search}">{$tran_search}
                           </button> 
                    </div>
                    
                </div>
                 
                        
                        
                       <!-- 
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">
                            {$tran_week_wise} <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <td><select name="week" id="week"> 
                                <option value="all" >All</option>
                                {for $i = 1;$i<=52;$i++}
                                    <option value="{$i}" {if date('W')== $i} selected {/if} >{$i}</option>


                                {/for}
                            </select>
                            </td>
                            <td>
                            <select name="year" id="year"> 
                                <option value="all" >All</option>
                                {for $i = date('Y'); $i >= 2000; $i--}
                                    <option value="{$i}" {if date('Y')== $i} selected {/if} >{$i}</option>


                                {/for}

                            </select>
                            </td>
                            </table>
                        </div>
                    </div>-->
                    
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
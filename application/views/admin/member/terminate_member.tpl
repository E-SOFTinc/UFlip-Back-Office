
{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;">
    <span id="errmsg1">{$tran_you_must_enter_the_user_name}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <span id="errmsg2">{$tran_you_must_enter_the_reason}</span>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   {$tran_terminate_member}   
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="terminate_mem" id="terminate_mem" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keyword">{$tran_user_name} </label>  
                        <div class="col-sm-3">
                            <input placeholder="{$tran_user_name}.."type="text" name="keyword" id="keyword" size="50" tabindex="1" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="reason">{$tran_reason} </label>

                        <div class="col-sm-3">
                            <textarea placeholder="{$tran_reason} for terminate.."type="text" name="reason" id="reason" size="50" tabindex="2" style="width:211%;" autocomplete="off"> </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/">
                            <button class="btn btn-bricky"  type="submit" name="terminate_member" id="terminate_member" value="{$tran_terminate_member}" tabindex="3" > {$tran_terminate_member} </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>
    </div>
</div>         
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>  {$tran_terminate_member} 
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
                <table  class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr class="th">     
                            <th >{$tran_no}</th>
                            <th >{$tran_user_name}</th>
                            <th  >{$tran_terminate_date}</th>
                            <th >{$tran_reason}</th>
                        </tr>
                    </thead>
                    {if $count>0}
                        {$j=1}
                        {assign var="i" value=0}
                        {assign var="class" value=""}
                        <tbody>
                            {foreach from=$mem_arr item=v}
                                {if $i%2==0}
                                    {$class='tr1'}
                                {else}
                                    {$class='tr2'}
                                {/if}
                                <tr>                                    
                                    <td>{$j}</td>
                                    <td  >{$v.user_name}</td>

                                    <td  >{$v.date}</td>


                                    <td>{$v.reason}</td>
                                </tr>
                                {$i=$i+1}
                                {$j=$j+1}
                            {/foreach}
                        </tbody>
                    </table>
                        {$result_per_page}
                {else}
                    <table>
                        <tbody>
                            <tr><td colspan="10" align="center"><h4>{$tran_No_User_Found}</h4></td></tr>
                        </tbody>    
                    </table>
                {/if}
            </div>
        </div>
    </div>   
</div>  
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        terminate_member.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
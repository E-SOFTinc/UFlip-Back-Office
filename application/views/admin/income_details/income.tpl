{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_select_user_id}</span>        
    <span id="error_msg2">{$tran_please_type_your_comments}</span>        
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>

</div> 
{if !isset($smarty.post.income_details_view)}
    <div class="row" >
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_select_user} 
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
                    <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="user_name">{$tran_select_user_id}<span class="symbol required"></span></label>
                            <div class="col-sm-3">
                                <input placeholder="{$tran_type_members_name}" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" tabindex="1" >

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-bricky" type="submit" id="profile_update" value="profile_update" name="profile_update" tabindex="2">
                                    {$tran_view}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
{/if}
{include file="admin/profile/user_summary_header.tpl"  name=""}
<!-- end: PAGE CONTENT -->
{if count($amount)!=0}    
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
                    {$tran_income_details} : {$posted_user_name}
                </div>
                <div class="panel-body">
                    <form role="form" class="smart-wizard form-horizontal" method="post"  name="feedback_form" id="feedback_form" >
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                            </div>
                        </div>
                        {assign var=i value="0"}


                        {assign var=class value=""}


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                    <th>{$tran_no}</th>
                                    <th>{$tran_user_name}</th>
                                    <th>{$tran_from}</th>

                                    <th>{$tran_Amount_Type}</th>
                                    <th>{$tran_amount}</th>

                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$amount item=v}
                                    {if $i%2 == 0}
                                        {$class="tr2"}
                                    {else}
                                        {$class="tr1"}
                                    {/if}		
                                    {$i = $i+1}
                                    {if $v.amount_type == 'leg'}
                                        {$v.amount_type = $tran_binary}
                                    {/if}

                                    <tr class="{$class}" align="left" >
                                        <td>{counter}</td>
                                        <td>{$v.user_id}</td>
                                        <td>{$v.from_id}</td>

                                        <td>{$v.amount_type}</td>
                                        <td>{$v.amount_payable}</td>

                                    </tr>
                                {/foreach}
                                <tr><td colspan="4" style="text-align: right;font-weight:bold;">{$tran_Amount_Total}</td><td style="text-align: left;font-weight:bold;">{$v.tot_amount}</td></tr>
                            </tbody>
                        </table>


                    </form>

                </div>
            </div>
        </div>
    </div>
{elseif isset($smarty.post) && isset($smarty.post.user_name)}                            
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
                    {$tran_income_details}
                </div>
                <div class="panel-body">
                    <form role="form" class="smart-wizard form-horizontal" method="post"  name="feedback_form" id="feedback_form" >
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                            </div>
                        </div>
                        {if $u_id != ""}
                            <h4 align="center"> {$tran_no_details_found}</h4>
                        {else}
                            <h4 align="center"><font color="#FF0000">{$tran_Username_not_Exists}</font></h4>
                            {/if}



                    </form>

                </div>
            </div>
        </div>
    </div>                          

{/if}
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
                                    jQuery(document).ready(function() {
                                        Main.init();
                                        //TableData.init();
                                        ValidateUser.init();

                                    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
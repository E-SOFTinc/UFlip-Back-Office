{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;">
    <span id="errmsg1">{$tran_you_must_enter_user_name}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <span id="nofond">{$tran_nofond}</span>
    <span id="showing">{$tran_showing}</span>
    <span id="to">{$tran_to}</span>
    <span id="of">{$tran_of}</span>
    <span id="entries">{$tran_entries}</span>
    <span id="notavailable">{$tran_notavailable}</span>
</div>
{if !isset($smarty.post.referral_view)}
<div class="row" >
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_users_referal_details} 
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
                <form role="form" class="smart-wizard form-horizontal" name="admin_referal_form" id="admin_referal_form" method="post" action='' >{*onSubmit="return validate_admin_referal(this);" class="niceform">*}
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">{$tran_user_name}<font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <input type="text" name="user_name" id="user_name" onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no', event)" autocomplete="Off" tabindex="1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">                         

                            <button class="btn btn-bricky" type="submit" name="referal_details"  id="referal_details" value="{$tran_view_refferal_details}"  tabindex="4">{$tran_view_refferal_details}</button>

                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>

    </div>
</div>
{/if}
{include file="admin/profile/user_summary_header.tpl"  name=""}
{if $count>0}
        {if $view!='yes'}
    <div class="row">
        <div class="col-sm-12">
            <div id="referal_det">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> {$tran_referal_details} : {$user_name}
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
                        <table border="0" align="center" width="100%" class="table table-striped table-bordered table-hover table-full-width" id="sample_1" >
                            <thead>
                                <tr class="th" >                           
                                    <th >{$tran_user_name}</th>
                                    <th >{$tran_full_name}</th>
                                    <th >{$tran_joinig_date}</th>
                                    <th> {$trans_email}</th>
                                    <th>{$trans_country}</th>

                                </tr>
                            </thead>
                            <tbody>
                                {assign var="i" value="0"}
                                {assign var="class" value=""}
                                {foreach from=$arr item=v}


                                    <tr >                                   
                                        <td  >{$v.user_name}</td>
                                        <td  >{$v.name}</td>
                                        <td  >{$v.join_date}</td>
                                        <td> {$v.email}</td>
                                        <td>{$v.country}</td>
                                    </tr>
                                    {$i=$i+1}
                                {/foreach}
                            </tbody>
                        </table>
                        {$result_per_page}
                    </div>
                </div>
            </div>
        </div>
    </div>
                        {/if}
{elseif isset($smarty.post.user_name) || isset($smarty.post.referral_view)} 
    <div class="row">
        <div class="col-sm-12">
            <div id="referal_det">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> {$tran_referal_details}
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
                        <table border="0" align="center" width="100%" class="table table-striped table-bordered table-hover table-full-width" id="sample_1" >

                            <tbody>
                                <tr colspan="3"> <td><h3>{$tran_no_referels}</h3></td> </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                
{/if}
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
{if $count>0}
    <script>
                                jQuery(document).ready(function() {
                                    //document.getElementById('referal_det').style.display = 'none';
                                    Main.init();
                                    TableData.init();
                                });
    </script>
{else}
    <script>
        jQuery(document).ready(function() {
            Main.init();
            
        });
    </script>
{/if}
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
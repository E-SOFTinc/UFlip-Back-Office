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
              {$tran_rank_setting}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="rank_form" id="rank_form" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="rank_name">{$tran_rank_name}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text"  name="rank_name" id="rank_name"  value="{$rank_name}" tabindex="1">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ref_count">{$tran_referal_count}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text"   name="ref_count" id="ref_count"  autocomplete="Off" tabindex="2" value="{$referal_count}" ><span id="errmsg1"></span>

                        </div>
                    </div>

 <div class="form-group">
                        <label class="col-sm-2 control-label" for="rank_achievers_bonus">{$tran_rank_achieved_bonus}</label>
                        <div class="col-sm-6">
                            <input  type="text"   name="rank_achievers_bonus" id="rank_achievers_bonus"  autocomplete="Off" tabindex="3" value="{$rank_bonus}" ><span id="errmsg2"></span>

                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            {if $edit_id==""}
                                <button class="btn btn-bricky"tabindex="3" name="rank_submit" type="submit" value="Submit">{$tran_submit}</button>
                            {else}
                                <button class="btn btn-bricky" tabindex="3" name="rank_update" type="submit" value="Update" style="background-color:#84A031; border-color:#84A031; font-weight:bold;">{$tran_update}</button>
                                <input name="rank_id" id="rank_id" type="hidden"  value="{$rank_id}"/>
                            {/if}

                        </div>
                        <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_rank_details}
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

                {assign var=i value="0"}


                {assign var=class value=""}



                {if count($rank_details)!=0}

                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_rank_name}</th>
                                <th>{$tran_referal_count}</th>
                                <th>{$tran_rank_achieved_bonus}</th>
                                <th>{$tran_action}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {assign var="path" value="{$BASE_URL}admin/"}
                            {foreach from=$rank_details item=v}
                                {assign var="rank_id" value="{$v.rank_id}"}

                                {if $i%2 == 0}
                                    {$class="tr2"}
                                {else}
                                    {$class="tr1"}
                                {/if}		
                                {$i = $i+1}

                                <tr class="{$class}" align="center" >
                                    <td>{counter}</td>
                                    <td>{$v.rank_name}</td>
                                    <td>{$v.referal_count}</td>
                                    <td>{$v.rank_bonus}</td>
                                    <td>


                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="javascript:edit_rank({$v.rank_id},'{$path}')" class="btn btn-teal tooltips" data-placement="top" data-original-title="Edit {$v.rank_id}"><i class="fa fa-edit"></i></a>

                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                                </a>
                                                <ul role="menu" class="dropdown-menu pull-right">
                                                    <li role="presentation">
                                                        <a role="menuitem" tabindex="-1" href="javascript:edit_rank({$v.rank_id},'{$path}')">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            {/foreach}                
                        </tbody>
                    </table>

                {else}
                    <h3> No Rank Details Found</h3>
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
        Validateconfig.init();

    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
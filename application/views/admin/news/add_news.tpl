{include file="admin/layout/header.tpl" name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_you_must_enter_news_title}</span>
    <span id="error_msg1">{$tran_you_must_enter_news}</span>
    <span id="confirm_msg1">{$tran_sure_you_want_to_edit_this_news_there_is_no_undo}</span>
    <span id="confirm_msg2">{$tran_sure_you_want_to_delete_this_news_there_is_no_undo}</span>
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_add_news_and_events}
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
                <form role="form" class="smart-wizard form-horizontal"  method="post"  name="upload_news" id="upload_news">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="news_title">{$tran_news_title}<font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <input tabindex="1" name="news_title" id="news_title" type="text" size="30" value="{$news_title}"/>
                                <span class="help-block" for="news_title"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="news_desc">{$tran_news_description}<font color="#ff0000">*</font> </label>
                        <div class="col-sm-9">
                            <textarea rows="12" cols="22" class="ckeditor form-control"  id="news_desc"  name="news_desc" title="" tabindex="2">{$news_desc}</textarea>
                            <span class="help-block" for="news_desc"></span>
                        </div>
                    </div>



                    <div class="form-group">

                        <div class="col-sm-2 col-sm-offset-2">
                            {if $edit_id==""}
                                <button class="btn btn-bricky"tabindex="3" name="news_submit" type="submit" value="{$tran_submit}"> {$tran_submit} </button>
                            {else}
                                <button class="btn btn-bricky" tabindex="3" name="news_update" type="submit" value="{$tran_update}" style="background-color:#84A031; border-color:#84A031; font-weight:bold;"> {$tran_update}</button>
                                <input name="news_id" id="news_id" type="hidden"  value="{$news_id}"/>
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
                <i class="fa fa-external-link-square"></i>{$tran_add_news_and_events}
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

                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr class="th">
                            <th>{$tran_no}</th>
                            <th>{$tran_news_title}</th>
                            <th>{$tran_date}</th>
                            <th>{$tran_action}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $arr_count!=0}
                            {assign var="class" value=""}
                            {assign var="path" value="{$BASE_URL}admin/"}
                            {assign var="i" value=0}
                            {foreach from=$news_details item=v}
                                {assign var="news_id" value="{$v.news_id}"}

                                {if $i%2==0}
                                    {$class='tr1'}
                                {else}
                                    {$class='tr2'}
                                {/if}
                                {$i=$i+1}
                                <tr class="{$class}">
                                    <td>{$i}</td>
                                    <td>{$v.news_title}</td>
                                    <td>{$v.news_date}</td>
                                    <td>


                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="javascript:edit_news({$news_id},'{$path}')" class="btn btn-teal tooltips" data-placement="top" data-original-title="{$tran_edit} {$v.news_title}"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:delete_news({$news_id},'{$path}')" class="btn btn-bricky tooltips" data-placement="top" data-original-title="{$tran_delete} {$v.news_title}"><i class="fa fa-times fa fa-white"></i></a>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                                </a>
                                                <ul role="menu" class="dropdown-menu pull-right">
                                                    <li role="presentation">
                                                        <a role="menuitem" tabindex="-1" href="javascript:edit_news({$news_id},'{$path}')">
                                                            <i class="fa fa-edit"></i> {$tran_edit}
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a role="menuitem" tabindex="-1" href="javascript:delete_news({$news_id},'{$path}')">
                                                            <i class="fa fa-times"></i> {$tran_remove}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                             </td>
                                </tr>                    
                            {/foreach}
                        </tbody>
                        <counter></counter>
                    {else}
                        <tr><td colspan="6" align="center"><h4>{$tran_no_news_found}</h4></td></tr>
                    {/if}
                </table></div>
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
{include file="admin/layout/header.tpl"  name=""}


<div id="span_js_messages" style="display:none;">

    <span id="error_msg">{$tran_you_must_select_user_name}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   {$tran_search_club}
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
                <div id="tabs-1" class="ui-tabs-panel">
                    {include file="admin/boardview/view_board.tpl"  name=""}

                </div>
                {if  $board_submit}
                 
                {else}
                    <div class="row">
                        <div class="col-sm-12">


                            {if count($user_board) >0}            


                                <hr />
                                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                    <thead>
                                        <tr class="th" align="center">
                                            <th>{$tran_slno}</th>
                                            <th>{$tran_date_of_joining}</th>
                                            <th>{$tran_club_id}</th>
                                            <th>{$tran_club_username}</th>
                                            <th>{$tran_club_split}</th>
                                            <th>{$tran_view_club}</th>
                                        </tr>
                                    </thead>

                                    {assign var="board_id" value=""}
                                    {assign var="serail_no" value=""}
                                    {assign var="top_id" value=""}
                                    {assign var="encr_id" value=""}
                                    {assign var="date_of_joining" value=""}
                                    {assign var="split_Status" value=""}
                                    {assign var="board_user_name" value=""}
                                    {assign var="table_no" value=""}
                                    {assign var="k" value="0"}
                                    {assign var="class" value=""}
                                    <tbody>
                                        {foreach from=$user_board item=v}

                                            {if $v.split_status=='NO'}
                                                {$split_Status = $tran_no}
                                            {elseif  $v.split_status=='YES'}
                                                {$split_Status = $tran_yes}
                                            {else}
                                                {$split_Status = $v.split_status}
                                            {/if}


                                            {$board_id = $v.id}
                                            {$top_id = $v.top_id}
                                            {$encr_id = $v.encr_id}
                                            {$date_of_joining = $v.date_of_joining}
                                            {$serail_no = $v.seriel_no}
                                            {$table_no = $v.table_no}
                                            {$user_name = $v.user_name}
                                            {$board_user_name = $v.user_name}

                                            {if $k % 2 == 0}
                                                {$class = "class= 'tr2'"}
                                            {else}
                                                {$class = "class = 'tr1'"}
                                            {/if}
                                            {$k = $k + 1}
                                            <tr {$class} >
                                                <td> {$k}</td>
                                                <td> {$date_of_joining}</td>
                                                <td># {$serail_no}</td>
                                                <td>{$board_user_name}</td>
                                                <td>{$split_Status}</td>
                                                <td>
                                                    <a id="element_1" href="{$BASE_URL}admin/tree/tree_view_board/{$encr_id}/{$table_no}" 
                                                       toptions="width = 1000, height = 500, type = iframe, title ={$tran_Club_View}, layout = quicklook, shaded = 1" >
                                                        <img id="element_1" alt="Board Tree" height='48px' width='48px' src="{$PUBLIC_URL}images/active.gif">
                                                    </a>
                                                </td>
                                            </tr>




                                        {/foreach}
                                    </tbody>
                                </table>

                            {else}

                                <h3 align ='center'> {$tran_invalid_user_id_or_not_found} </h3>

                            {/if} 


                        </div>
                    </div>
                {/if}

            </div> </div> </div>








</div>

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init();
    TableData.init();

    ValidateUser.init();
    //DateTimePicker.init();
});
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
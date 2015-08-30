{include file="user/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display:none;">

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
                {include file="user/boardview/view_board.tpl"  name=""}

            </div>
        </div>

    </div>
</div>
</div>
</div>
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();

        ValidateUser.init();
        DateTimePicker.init();
    });
</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
{include file="user/layout/header.tpl"  name=""}

<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_view_news_and_events}
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
                <!-- start: INBOX DETAILS FORM -->
                {assign var=i value=1}
                {assign var=id value=""}

                {foreach from=$news_details item=v}
                    {$id = $v.news_id}
                    <div class="modal fade" id="panel-config{$id}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">{$tran_news_details}</h4>
                                </div>
                                <div class="modal-body">

                                    <table cellpadding="0" cellspacing="0" align="center">
                                        <tr>
                                            <td>
                                                <b>Title :</b> {$v.news_title}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="th">
                                                <b>Date :</b> {$v.news_date}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="80%"  style="padding-top: 10px;">
                                                <b>Description:</b> <h6><p style="text-align: justify;line-height: 20px;"> {$v.news_desc}</p></h6>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                {/foreach}                
                <!-- /.modal -->
                <!-- end: INBOX DETAILS FORM --> 						                

		{include file="user/news/inbox.tpl"  name=""}
            </div>
        </div>
    </div>
</div>
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
	Main.init();
	ValidateUser.init();

    });

</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}

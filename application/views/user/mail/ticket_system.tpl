{include file="user/layout/header.tpl"  name=""}

<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>Ticket Management
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
                {assign var=clr value=""}
                {assign var=id value=""}
                {assign var=msg_id value=""}
                {assign var=user_name value=""}

                {foreach from=$row item=v}
                    {$id = $v.id}
                    <div class="modal fade" id="panel-config{$id}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">Ticket details</h4>
                                </div>
                                <div class="modal-body">

                                    <table cellpadding="0" cellspacing="0" align="center">
                                        <tr>
                                            <td>
                                                <b>Ticket tracking ID :</b> {$v.ticket_id}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="th">
                                                <b>{$tran_status} :</b> {if $v.status==3}<font color="#33FF00">Resolved</font>{else}<font color="#ff0000">New</font>{/if}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="th">
                                                <b>Created on:</b> {$v.created_date}
                                        </tr>
                                        <tr>
                                            <td class="th">
                                                <b>Updated date:</b> {$v.updated_date}
                                        </tr>
                                        <tr>
                                            <td class="th">
                                                <b>Created By:</b> {$v.user}
                                        </tr> 
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <a href="{$BASE_URL}user/mail/view_ticket_details/{$v.ticket_id}"
                                       <button type="button" class="btn btn-bricky">
                                            View
                                    </a>
                                    {if $v.status!=3}
                                        <a href="{$BASE_URL}user/mail/view_ticket_details/{$v.ticket_id}"
                                           <button type="button" class="btn btn-bricky">
                                                Reply</button>
                                        </a>
                                    {/if}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                {/foreach}                
                <!-- /.modal -->
                <!-- end: INBOX DETAILS FORM --> 						                
                <div id="span_js_messages" style="display:none;">
                    <span id="error_msg1">{$tran_you_must_select_user}</span>        
                    <span id="error_msg2">{$tran_you_must_enter_subject_here}</span>
                    <span id="error_msg3">{$tran_you_must_enter_message_here}</span>        
                </div>
                <div class="tabbable ">
                    <ul id="myTab3" class="nav nav-tabs tab-green">
                        <li class="{$tab1}">
                            <a href="#panel_tab4_example1" data-toggle="tab">
                                <i class="pink fa fa-dashboard"></i> {$tran_inbox}
                            </a>
                        </li>
                        <li class="{$tab2}">
                            <a href="#panel_tab4_example2" data-toggle="tab">
                                <i class="blue fa fa-user"></i> Create Ticket
                            </a>
                        </li>
                        <li class="{$tab3}">
                            <a href="#panel_tab4_example3" data-toggle="tab">
                                <i class="blue fa fa-user"></i> View Ticket
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane{$tab1}" id="panel_tab4_example1">
                            <p>
                                {include file="user/mail/ticket_inbox.tpl"  name=""}
                            </p>
                        </div>
                        <div class="tab-pane{$tab2}" id="panel_tab4_example2">

                            <p>
                                {include file="user/mail/create_ticket.tpl"  name=""}
                            </p>
                        </div>
                        <div class="tab-pane{$tab3}" id="panel_tab4_example3">

                            <p>
                                {include file="user/mail/view_ticket.tpl"  name=""}
                            </p>
                        </div>
                    </div>
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
        ValidateUser.init();

    });

</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}

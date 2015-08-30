{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_please_enter_your_company_name}</span>        
    <span id="error_msg2">{$tran_please_type_your_comments}</span>        
    <span id="error_msg3">{$tran_please_type_your_phone_no}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id="error_msg">{$tran_please_enter_your_visitors_name}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div> 
                   
                            
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_feedback_details}
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



                {if count($feedback)!=0}

                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_visitors_name}</th>
                                <th>{$tran_company}</th>
                                <th>{$tran_phone_no}</th>
                                <th>{$tran_time_to_call}</th>
                                <th>{$tran_email}</th>
                                <th>{$tran_comments}</th>
                                <th>{$tran_action}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {assign var="path" value="{$BASE_URL}admin/"}
                            {foreach from=$feedback item=v}
                                {assign var="feedback_id" value="{$v.feedback_id}"}

                                {if $i%2 == 0}
                                    {$class="tr2"}
                                {else}
                                    {$class="tr1"}
                                {/if}		
                                {$i = $i+1}

                                <tr class="{$class}" align="center" >
                                    <td>{counter}</td>
                                    <td>{$v.feedback_name}</td>
                                    <td>{$v.feedback_company}</td>
                                    <td>{$v.feedback_phone}</td>
                                    <td>{$v.feedback_time}</td>
                                    <td>{$v.feedback_email}</td>
                                    <td>{$v.feedback_remark}</td>
                                    <td>
										<div class="visible-md visible-lg hidden-sm hidden-xs buttons-widget">
										<a class="btn btn-bricky" href="javascript:delete_feedback({$feedback_id},'{$path}')"class="btn btn-bricky tooltips" data-placement="top" data-original-title="{$tran_delete} {$v.feedback_name}"><i class="fa fa-times fa fa-white"></i></a>
									    </div>

										<div class="visible-xs visible-sm hidden-md hidden-lg">
										<div class="btn-group">
											<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
									<i class="fa fa-cog"></i> <span class="caret"></span>
									</a>
										<ul role="menu" class="dropdown-menu pull-right">
										<!--delete PIN start-->
											<li role="presentation">
												<a role="menuitem" tabindex="-1" href="javascript:delete_feedback({$feedback_id},'{$path}')">
													<i class="fa fa-times fa fa-white"></i>Delete
												</a>
											</li>
										<!--delete PIN end-->
										</ul>
										</div>
										</div>

									
									</td>
                                </tr>
                            {/foreach}                
                        </tbody>
                    </table>

                {else}
                    <h3> {$tran_no_feedback_found}</h3>
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

        ValidateUser.init();
        DateTimePicker.init();
    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
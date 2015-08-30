{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_please_enter_your_company_name}</span>  
    <span id="error_msg2">{$tran_you_must_enter_the_user_name}</span>        
    <span id="error_msg8">{$tran_please_type_your_comments}</span>            
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>    
    <span id="error_msg3">{$tran_please_type_your_phone_no}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id="error_msg">{$tran_please_enter_your_visitors_name}</span>
    <span id="error_msg6">{$tran_digits_only}</span>
    <span id="error_msg7">{$tran_you_must_enter_valid_email}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
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
                {$tran_feedback_view}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="feedback_form" id="feedback_form" onSubmit="return validate_feedback()" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    {*<div class="form-group">
                        <label class="col-sm-2 control-label" for="visitors_name">{$tran_visitors_name}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text"  name="visitors_name" id="visitors_name"  value="{$user_name}"  autocomplete="Off" tabindex="1" readonly >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="feedback_user">{$tran_user_name}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text"  name="feedback_user" id="feedback_user"  value="{$user_name}" onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no', event)" autocomplete="Off" tabindex="1" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>*}

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company">{$tran_company}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text"   name="company" id="company"  autocomplete="Off" tabindex="2">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="phone_no">{$tran_phone_no}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text"  name="phone_no" id="phone_no"   autocomplete="Off" tabindex="3">
                            <span id="errmsg1"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="time_to_call">{$tran_time_to_call}<span class="symbol required"></span></label>
                        <div class="col-sm-2">
                            <div class="input-group input-append bootstrap-timepicker timepick_mediuamsize">
                                <input class="form-control time-picker" tabindex="4" name="time_to_call" id="time_to_call" type="text" size="30" value="" />
                                <span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">{$tran_email}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text"  name="email" id="email"  autocomplete="Off" tabindex="5">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="comments">{$tran_comments}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <textarea rows="6" name="comments" id="comments" cols="22" tabindex="6" ></textarea>
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="feedback_submit" id="feedback_submit" value="{$tran_submit}" tabindex="7">
                                {$tran_submit}
                            </button>
                        </div>
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

                                <th>{$tran_company}</th>
                                <th>{$tran_phone_no}</th>
                                <th>{$tran_time_to_call}</th>
                                <th>{$tran_email}</th>
                                <th>{$tran_comments}</th>
                                <th>{$tran_action}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {assign var="path" value="{$BASE_URL}user/"}
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
                                    <td>{$v.feedback_company}</td>
                                    <td>{$v.feedback_phone}</td>
                                    <td>{$v.feedback_time}</td>
                                    <td>{$v.feedback_email}</td>
                                    <td>{$v.feedback_remark}</td>
                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs buttons-widget">
                                            <a class="btn btn-bricky" href="javascript:delete_feedback({$feedback_id},'{$path}')" class="btn btn-bricky tooltips" data-placement="top" data-original-title="{$tran_delete} {$v.feedback_id}"><i class="fa fa-times fa fa-white"></i></a>
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
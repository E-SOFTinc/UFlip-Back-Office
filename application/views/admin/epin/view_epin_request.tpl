{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_please_enter_your_company_name}</span>        
    <span id="error_msg2">{$tran_please_type_your_comments}</span>        
    <span id="error_msg3">{$tran_please_type_your_phone_no}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id="error_msg6">{$tran_please_select_at_least_one_checkbox}</span> 
    <span id="error_msg">{$tran_please_enter_your_company_name}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> {$tran_view_epin_request}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="view_request_form" id="view_request_form" >

                    {assign var="arr_length" value=count($pin_detail_arr)}
                    {if $arr_length >0}


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                    <th>{$tran_no}</th>
                                    <th>{$tran_user_name}</th>
                                    <th>{$tran_requested_pin_count}</th>
                                    <th>{$tran_amount}</th>
                                    <th>{$tran_date}</th>
                                    <th>{$tran_expiry_date}</th>

                                    <th>{$tran_count}</th>
                                    <th>{$tran_check}</th>
                                </tr>
                            </thead>
                            <tbody>


                                {assign var="class" value=""}
                                {assign var="i" value="0"}
                                {assign var="k" value="1"}
                                {foreach from=$pin_detail_arr item=v}
                                    {if $i%2==0}
                                        {$class='tr1'}
                                    {else}
                                        {$class='tr2'}
                                    {/if}


                                    <tr class="{$class}" align="center" >
                                        <td>{$k}</td>
                                        <td>{$v.user_name}</td>
                                        <td>{$v.pin_count}<input type="hidden" name='rem_count{$k}' id='rem_count{$k}' value="{$v.pin_count}"/></td>
                                        <td>{$v.amount}<input type="hidden" name='amount{$k}' id='amount{$k}' value="{$v.amount}"/></td>
                                        <td>{$v.req_date}</td>
                                        <td>{$v.expiry_date}<input type="hidden" name='expiry_date{$k}' id='expiry_date{$k}' value="{$v.expiry_date}"/></td>

                                        <td><b></b><input name='count{$k}' id='count{$k}' type='text'  size='4' maxlength='50'  value='{$v.rem_count}' /></td>



                                        <td><input  name='active{$k}' id='activate{$k}' type="checkbox" value="yes" class="active"><label for="activate{$k}" ></label>
                                            <input type='hidden' id="id{$k}" name='id{$k}' value='{$v.req_id}'/><input type='hidden' name='user_id{$k}' value='{$v.user_id}'/>
                                            <input type='hidden' name='product{$k}' value='{$v.product_id}'></td>
                                    </tr>
                                    {$k=$k+1}
                                {/foreach} 


                            <div class="form-group">
                                <input  type="hidden"  name="total_count" value="{$k}" >


                            </div>


                            </tbody>

                        </table>
                                {$result_per_page}
                        <div class="col-sm-12">
                            <input class="btn btn-bricky pull-right" type="submit"  name="allocate" id="allocate"  value='{$tran_allocate}' tabindex="1" >

                        </div>
                    {else}
                        <h4 align="center"><font color="#FF0000"> {$tran_no_epin_request_found}</font></h3>
                        {/if}  

                </form>
            </div>
        </div>
    </div>
</div>          


{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();

        ValidateEpinRequest.init();
        ValidateUser.init();
        DateTimePicker.init();
    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
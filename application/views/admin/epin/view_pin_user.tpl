{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_enter_count}</span>        
    <span id="error_msg2">{$tran_You_must_enter_user_name}</span>        
    <span id="error_msg3">{$tran_you_must_select_a_product_name}</span>        
    <span id="error_msg4">{$tran_please_type_your_time_to_call}</span>                  
    <span id="error_msg5">{$tran_please_type_your_e_mail_id}</span>
    <span id="error_msg">{$tran_please_enter_your_company_name}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div> 
    
    {if !isset($smarty.post.epin_user)}
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> {$tran_user_wise_epin}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="search_mem" id="search_mem" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">{$tran_user_wise_epin}<span class="symbol required"></span></label>
                        <div class="col-sm-6">
                            <input  type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" name="get_data" id="get_data"value="{$tran_submit}" tabindex="2">
                                {$tran_submit}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{/if}
{include file="admin/profile/user_summary_header.tpl"  name=""}
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_user_wise_epin}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="user_select_form" id="user_select_form" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i>{$tran_errors_check}
                        </div>
                    </div>

                    {if !isset($smarty.post.epin_user)}
                        <div class="form-group" style="display:none;">
                            <label class="col-sm-2 control-label" for="user">{$tran_select_user}<font color="#ff0000">*</font>:</label>
                            <div class="col-sm-6">
                                <input  type="text"   name="user" id="user"   onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)"  autocomplete="Off" tabindex="1">
                                <span id="username_box" style="display:none;"></span>
                            </div>
                        </div>            


                        <div class="form-group" style="display:none;">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-bricky" name="view" id="view" value="{$tran_submit}" tabindex="2">
                                    {$tran_submit}
                                </button>
                            </div>
                        </div>
                    {/if}


                    <div class="row">
                        <div class="col-sm-12">


                            {if $product_status=="yes"}

                                {if $flag}
                                    {assign var="root" value="{$root}"}
                                    {if count($pin_arr)>0}

                                        <hr />
                                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                            <thead>
                                                <tr class="th" align="center">
                                                    <th>{$tran_no}</th>

                                                    <th>{$tran_epin}</th>
                                                    <th>{$tran_amount}</th>
                                                    <th>{$tran_balance_amount}</th>
                                                    <th>{$tran_status}</th>
                                                    <th>{$tran_uploaded_date}</th>
                                                    <th>{$tran_expiry_date}</th>

                                                    <th>{$tran_delete}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {assign var="i" value="0"}
                                                {assign var="class" value=""}

                                                {foreach from=$pin_arr item=v}

                                                    {if $i%2==0}
                                                        {$class="tr1"}

                                                    {else}

                                                        {$class="tr2"}
                                                    {/if}

                                                    {assign var="status" value="ACTIVE"}


                                                    {$i=$i+1}
                                                    <tr class="{$class}">
                                                        <td>{$i}</td>
                                                        <td>{$v.pin_numbers}</td>
                                                        <td>{$v.amount}</td>
                                                        <td>{$v.pin_balance_amount}</td>
                                                        <td>{$status}</td>
                                                        <td>{$v.pin_uploded_date}</td>
                                                        <td>{$v.expiry_date}</td>

                                                        <td>
                                                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                <!--delete PIN start-->
                                                                <a href="javascript:delete_pin_admin({$v.id},'{$root}')" class="btn btn-bricky tooltips" data-placement="top" data-original-title="Delete $pin">
                                                                    <span style="display:none" id="error_msg6">{$tran_sure_you_want_to_delete_this_passcode_there_is_no_undo}</span>
                                                                    <i class="fa fa-times fa fa-white"></i>
                                                                </a>
                                                                <!--delete PIN end-->

                                                            </div>

                                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                                        <i class="fa fa-cog"></i> <span class="caret"></span>
                                                                    </a>
                                                                    <ul role="menu" class="dropdown-menu pull-right">


                                                                        <!--delete PIN start-->
                                                                        <li role="presentation">
                                                                            <a role="menuitem"  href="javascript:delete_pin_admin({$v.id},'{$root}')">

                                                                                <span style="display:none" id="error_msg6">{$tran_sure_you_want_to_delete_this_passcode_there_is_no_undo}</span>
                                                                                <i class="fa fa-times fa fa-white"></i>Delete
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
                                        {$result_per_page}

                                    {else}
                                        <h3> {$tran_no_epin_found}</h3>
                                    {/if} 
                                {/if}              


                            {else}

                                {if $flag}

                                    {if count($pin_arr)>0}

                                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                            <thead>
                                                <tr class="th" align="center">
                                                    <th>{$tran_no}</th>
                                                    <th>{$tran_epin}</th>
                                                    <th>{$tran_status}</th>
                                                    <th>{$tran_uploaded_date}</th>
                                                    <th>{$tran_delete}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {assign var="i" value="0"}
                                                {assign var="class" value=""}
                                                {assign var="status" value="ACTIVE"}
                                                {foreach from=$pin_arr item=v}

                                                    {if $i%2==0}

                                                        {$class="tr1"}

                                                    {else}

                                                        {$class="tr2"}
                                                    {/if}

                                                    {assign var="status" value="ACTIVE"}


                                                    {$i=$i+1}
                                                    <tr class="{$class}">
                                                        <td>{$i}</td>
                                                        <td>{$v.pin_numbers}</td>
                                                        <td>{$status}</td>
                                                        <td>{$v.pin_uploded_date}</td>
                                                        <td><a href="javascript:delete_pin_admin({$v.id},'{$root}')">
                                                                <div id="span_js_messages" style="display: none;">
                                                                    <span id="error_msg2">{$tran_sure_you_want_to_delete_this_passcode_there_is_no_undo}</span>
                                                                </div>
                                                                <img src="{$PUBLIC_URL}images/delete.png" title="Delete $pin" style="border:none;">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                {/foreach}

                                            </tbody>
                                        </table>
                                        {$result_per_page}

                                    {else}
                                        <h3> {$tran_no_data}</h3>
                                    {/if} 
                                {/if}
                                </form>
                            {/if}
                        </div>
                    </div>
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
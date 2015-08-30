{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;">

    <span id="error_msg">{$tran_must_enter_keyword}</span>                  
    <span id="error_msg5">{$tran_You_must_enter_your_mobile_no}</span>
    <span id="error_msg1">{$tran_you_must_enter_your_name}</span>
    <span id="error_msg6">{$tran_You_must_enter_your_email}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   {$tran_search_employee}
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
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keyword">{$tran_keyword} </label>
                        <div class="col-sm-3">
                            <input placeholder="{$tran_Username_or_Name}.."type="text" name="keyword" id="keyword" size="50" tabindex="1" autocomplete="off">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/">

                            <p><button class="btn btn-bricky"  type="submit" name="search_employee" id="search_employee" value="{$tran_search_employee}" tabindex="2" > {$tran_search_employee} </button></p>

                        </div>

                        <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                        </form>
                        <form role="form" class="smart-wizard form-horizontal" method="post"  name="view_mem" id="view_mem" >
                            <div class="col-sm-2 col-sm-offset-1">
								<p>
                                <button class="btn btn-yellow" name="view_all" id="view_all" value="{$tran_view_employee}" tabindex="2"> {$tran_view_employee} 
                                </button>
								</p>
                            </div>
                        </form>
                    </div>
            </div>
        </div>

    </div>

</div>    
{if $flag}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>  {$tran_search_employee} 
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
                    {if $count>0}
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1"> 
                            <thead>
                                <tr class="th">
                                    <th>Sl.No</th>
                                    <th>{$tran_employee_user_name}</th>
                                    <th>{$tran_employee_fullname}</th>
                                    <th>{$tran_mobile_no}</th>
                                    <th>{$tran_email}</th>
                                    <th>{$tran_pincode}</th>
                                    <th>{$tran_address}</th>


                                </tr>
                            </thead>

                            {assign var="i" value=0}
                            {assign var="path" value="{$BASE_URL}admin/"}
                            {assign var="class" value=""}
                            <tbody>
                                {foreach from=$emp_detail item=v}
                                    {assign var="id" value="{$v.user_id}"}

                                    {if $i%2==0}
                                        {$class='tr1'}
                                    {else}
                                        {$class='tr2'}
                                    {/if}

                                    <tr>
                                        <td>{counter}</td>
                                        <td>{$v.user_name}</td>
                                        <td>{$v.user_detail_name}</td>
                                        <td>{$v.user_detail_mobile}</td>
                                        <td>{$v.user_detail_email}</td>
                                        <td>{$v.user_detail_pin}</td>
                                        <td>{$v.user_detail_address}</td>






                                    </tr>
                                    {$i=$i+1}
                                {/foreach}
                            </tbody>
                            {*            </table>*}
                            {*            <counter>{$result_per_page}</counter>*}

                        </table>
                            {$result_per_page}
                    {else}

                        <h3 style="text-align: center">{$tran_No_User_Found}</h3>

                    {/if}



                </div>
            </div>
        </div>   
    </div>  
{/if}


<!------------------------------------->


{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""} 
<script>
    jQuery(document).ready(function() {
        Main.init();
        DatePicker.init();
        TableData.init();
        ValidateMember.init();

    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
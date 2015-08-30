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
<cdash-inner> 

    <div class="row" style="display:{$visible};"  ><!--style="visibility:{$visible}"-->
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>  {$tran_edit_employee}
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

                    <form role="form" class="smart-wizard form-horizontal" method="post" id="edit_form" name="edit_form"  style="display: {$visibility}" >
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                            </div>
                        </div>
                            {foreach from=$editdetails item=v}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="full_name">{$tran_name}:<font color="#ff0000">*</font></label>
                            <div class="col-sm-6">
                                <input  type="text"  name="full_name" id="full_name"   autocomplete="Off" value="{$v.user_detail_name}" tabindex="1">
                                <span id="username_box" style="display:none;"></span>

                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address">{$tran_address}: </label>
                            <div class="col-sm-6">
                                <textarea rows="6" name="address" id="address" cols="22" tabindex="5" >{$v.user_detail_address}</textarea>
                                <span id="username_box" style="display:none;"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="pin">{$tran_pincode}:</label>
                            <div class="col-sm-6">
                                <input name="pin" id="pin" type="text" autocomplete="Off" value="{$v.user_detail_pin}" tabindex="6">
                                <span id="errmsg4"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="mobile">{$tran_mob_no_10_digit}:<font color="#ff0000">*</font></label>
                            <div class="col-sm-6">
                                <input name="mobile" id="mobile" type="text" maxlength="10" autocomplete="Off" tabindex="7" value="{$v.user_detail_mobile}">
                                <span id="username_box" style="display:none;"></span>
                                <span id="errmsg3"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="land_line">{$tran_land_line_no}:</label>
                            <div class="col-sm-6">
                                <input name="land_line" id="land_line" tabindex="8" value="{$v.user_detail_land}"  type="text" autocomplete="Off" >
                                <span id="errmsg5"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="email">{$tran_email}<font color="#ff0000">*</font></label>
                            <div class="col-sm-6">
                                <input name="email" id="email" type="text"  autocomplete="Off" value="{$v.user_detail_email}" tabindex="9">
                                <span id="username_box" style="display:none;"></span>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="date_of_birth">
                                {$tran_date_of_birth}:
                            </label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date_of_birth" id="date_of_birth" type="text" tabindex="10" size="20" maxlength="10"  value="{$v.user_detail_dob}" >
                                    <label for="date_of_birth" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                                </div>
                            </div>
                        </div>
                            {/foreach}

                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <p>
                                    <button class="btn btn-bricky" value="Update" tabindex="3" name="update" id="update" tabindex="11">
                                        update
                                    </button>
                                </p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>  

</cdash-inner>                
{if $keyword}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>  {$tran_view_employee} 
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
                  {if $count>0}   
                <div class="panel-body">

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
                                <th>{$tran_action}</th>

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


                                        <td><div class="visible-md visible-lg hidden-sm hidden-xs">
                                                <a href="#" onclick="edit_employee({$id}, '{$path}')" class="btn btn-teal tooltips" data-placement="top" data-original-title=""><i class="fa fa-edit"></i></a>
                                                <a href="javascript:delete_employee({$id},'{$path}')" class="btn btn-bricky tooltips" data-placement="top" data-original-title=""><i class="fa fa-times fa fa-white"></i></a>
                                                </div>
                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                        <i class="fa fa-cog"></i> <span class="caret"></span>
                                                    </a>
                                                    <ul role="menu" class="dropdown-menu pull-right">
                                                        <li role="presentation">
                                                            <a role="menuitem" tabindex="-1" href="#" onclick="edit_employee({$id}, '{$path}')">
                                                                <i class="fa fa-edit"></i>{$tran_edit}
                                                            </a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a role="menuitem" tabindex="-1" href="#" onclick="delete_employee({$id}, '{$path}')">
                                                                <i class="fa fa-times"></i> {$tran_remove}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>



                                    </tr>
                                    {$i=$i+1}
                                {/foreach}
                            </tbody>
                            {*            </table>*}
                            {*            <counter>{$result_per_page}</counter>*}
                        
                    </table>
                    {$pagination}




                </div>
                    {else}
                         <table class="table table-striped table-bordered table-hover table-full-width"> 
                        <thead>
                            <tr class="th">
                                <th>Sl.No</th>
                                <th>{$tran_employee_user_name}</th>
                                <th>{$tran_employee_fullname}</th>
                                <th>{$tran_mobile_no}</th>
                                <th>{$tran_email}</th>
                                <th>{$tran_pincode}</th>
                                <th>{$tran_address}</th>
                                <th>{$tran_action}</th>

                            </tr>
                        </thead>
                            <tbody>
                                <tr><td colspan="12" align="center"><h4>{$tran_No_User_Found}</h4></td></tr>
                            </tbody> 
                         </table>
                        {/if}
            </div>
        </div>   
    </div>  
{/if}
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
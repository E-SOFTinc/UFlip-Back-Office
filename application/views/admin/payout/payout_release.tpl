{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;">
    <span id="error_msg">{$tran_please_select_at_least_one_checkbox}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <span id="nofond">{$tran_nofond}</span>
    <span id="showing">{$tran_showing}</span>
    <span id="to">{$tran_to}</span>
    <span id="of">{$tran_of}</span>
    <span id="entries">{$tran_entries}</span>
    <span id="notavailable">{$tran_notavailable}</span>
</div>


{if $payout_release_type=="normal"}

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> {$tran_payout_release}
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

                    <form role="form" class=""  method="post"  name="main_menu_chenge" id="main_menu_chenge">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i>{$tran_errors_check}
                            </div>
                        </div>
                        {assign var="arr_len" value=count($payout_date_arr)}


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    {if $payout_type == "daily"}
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >
                                                {$tran_payout_release_date}: 
                                            </label>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="week_date2" id="week_date2" type="text"  size="20" maxlength="10"  value="" >
                                                    <label for="week_date2" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                                                </div>
                                            </div>
                                        </div>
                                    {else} <div class="form-group">  
                                            <label class="col-sm-2 control-label" for="user_name">{$tran_payout_release_date}<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <select name="week_date2" id="week_date2" class="form-control">
                                                    <option value="">{$tran_select_one}</option>
                                                    {foreach from=$payout_date_arr item="v"}
                                                        {assign var="date" value=$v}
                                                        <option value="{$date}">{$date}</option>
                                                    {/foreach}
                                                </select><span class="help-block" for="user_name"></span>

                                            </div>
                                        </div>
                                    {/if}
                                </div>
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-bricky" name="submit" id="'Submit" value="{$tran_submit}">
                                    {$tran_submit}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {if $post_submit}   
        <div id="transaction" type="hidden">
            <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div id="div1"></div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                close
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> {$tran_binary_payout_release}
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

                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                <tr class="th"> 
                                    <th >{$tran_slno}</th>
                                    <th >{$tran_user_id}</th>
                                    <th>{$tran_full_name}</th>
                                    <th>{$tran_total_amount}</th> 
                                    <th>{$tran_amount_payable}</th>
                                    <th>{$tran_view_user_data}</th>
                                    <th>{$tran_release}</th> 
                                </tr>

                            </thead>
                            <input type= 'hidden'  name = "date_sub"  value ="{$date_sub}" >
                            <input type= 'hidden'  name = "previous_date"  value ="{$previous_pyout_date}" >
                            {assign var="length" value=count($weekly_payout)}
                            {assign var="path" value="{$BASE_URL}admin/"}

                            {if $length>0}
                                {assign var="i" value=0}
                                {assign var="class" value=""}
                                {assign var="total_amount_tot" value=0}
                                {assign var="tds_tot" value=0}
                                {assign var="service_charge_tot" value=0}
                                {assign var="amount_payable_tot" value=0}
                                {assign var="leg_amount_carry_tot" value=0}
                                <tbody>
                                    {foreach from=$weekly_payout item="v"}
                                        {if $i%2==0}
                                            {$class='tr1'}
                                        {else}
                                            {$class='tr2'}
                                        {/if}

                                        <tr class="{$class}" align="center" >
                                            <td>{counter}</td>
                                            <td>{$v.user_name} <input type='hidden' name='user_id{$i}' value = '{$v.user_id}'></td>
                                            <td> {$v.fullname}</td>
                                            <td>{$v.total_amount}</td>
                                            <td>{$v.amount_payable}<input type='hidden' name='amount{$i}' value = '{$v.amount_payable}'></td>
                                            <td><a class="btn btn-xs btn-link panel-config" href="#panel-config" onclick="javascript:view_popup({$v.user_id}, this.parentNode.parentNode.rowIndex, 'admin', '{$path}')"data-toggle="modal" style='color:#C48189;'>{$tran_view}</a></td>
                                            <td>
                                                <input type = 'checkbox' name = 'active{$i}' value= 'yes'  id ='active{$i}' 
                                                       checked ='checked'  ><label for="active{$i}"></label>
                                            </td>
                                        </tr>
                                        {$i=$i+1}
                                        {$total_amount_tot=$total_amount_tot+$v.total_amount}
                                        {$tds_tot=$tds_tot+$v.tds}
                                        {$service_charge_tot=$service_charge_tot+$v.service_charge}
                                        {$amount_payable_tot=$amount_payable_tot+$v.amount_payable}
                                        {$leg_amount_carry_tot=$leg_amount_carry_tot+$v.leg_amount_carry}
                                    {/foreach}
                                    <tr bgcolor='#5E8487' align='center'>
                                        <td><b></b></td>
                                        <td><b></b></td>
                                        <td><b>{$tran_total}</b></td>
                                        <td><b>{$total_amount_tot}</b></td>
                                        <td><b>{$amount_payable_tot}</b></td>
                                        <td></td>
                                        <td> <input type='hidden' name='total_count' value= '{$i}'>
                                            <input type= 'submit' value= '{$tran_paid}'  id ='update'   name='update'>
                                        </td>

                                    </tr>
                                <div class="form-group">
                                    <!-- REMOVED FOR IMS-169--><!-- <div class="col-sm-2 col-sm-offset-2">
                                         <button class="btn btn-bricky" name="details" id="details" value="{$tran_user_details}">
                                    {$tran_submit}
                                 </button>
                             </div>-->
                                </div>
                                </tbody>

                            {else}
                                <h3>{$tran_no_payout_found} </h3>
                            {/if}          
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    {/if}               


    {if $post_details}

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>  {$tran_binary_payout_release}
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
                        <form name="user_details"  id="user_details" method="post">

                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                <thead>
                                    <tr class="th" align="center">
                                        <th>{$tran_slno}</th>
                                        <th>{$tran_user_id}</th>
                                        <th>{$tran_full_name}</th>
                                        <th><b>{$tran_amount_payable}</b></th>
                                        <th><b>{$tran_address}</b></th>
                                        <th><b>{$tran_mobile}</b></th>
                                        <th><b>{$tran_bank}</b></th>
                                        <th><b>{$tran_branch}</b></th>
                                        <th><b>{$tran_acc_no}</b></th>
                                        <th><b>{$tran_ifsc}</b></th> 
                                    </tr>

                                </thead>
                                <input type= 'hidden'  name = "date_sub"  value ="{$date_sub}" >
                                <input type= 'hidden'  name = "previous_date"  value ="{$previous_pyout_date}" >
                                {assign var="length" value= count($details)}
                                {assign var="i" value=0}
                                {assign var="class" value=""}
                                {assign var="total_amount_tot" value=0}
                                {assign var="tds_tot" value=0}
                                {assign var="service_charge_tot" value=0}
                                {assign var="amount_payable_tot" value=0}
                                {assign var="leg_amount_carry_tot" value=0}
                                {if $length>0}
                                    <tbody>
                                        {foreach from=$details item="v"}
                                            {if $i%2==0}
                                                {$class='tr1'}
                                            {else}
                                                {$class='tr2'}
                                            {/if}

                                            <tr>
                                                <td>{counter}</td>
                                                <td>{$v.name} <input type='hidden' name='user_id{$i}' value = '{$user_id}'></td>
                                                <td>{$v.user_name}</td>
                                                <td>{$v.amount_payable}</td>
                                                <td>{$v.address}</td>
                                                <td>{$v.mobile}</td>
                                                <td>{$v.bank}</td>
                                                <td>{$v.branch}</td>
                                                <td>{$v.acc}</td>  			
                                                <td>{$v.ifsc}</td>
                                            </tr>
                                            {$i=$i+1}
                                        {/foreach}

                                    </tbody>


                                {else}
                                </table>
                            {/if}          

                        </form>
                    </div>
                </div>
            </div>
        </div>             

    {/if}
{/if}

{if $payout_release_type!="normal"}


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> {$tran_payout_release}
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
                    {*foreach from=$row item=v*}

                    <div id="transaction" type="hidden">
                        <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div id="div1"></div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            {$tran_close}
                                        </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>

                    {*/foreach*}                

                    <form name="ewallet_form_det"  id="ewallet_form_det" method="post">

                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                <tr class="th"> 
                                    <th>{$tran_slno}</th>
                                    <th>{$tran_user_name}</th>
                                    <th>{$tran_user_full_name}</th>
                                    <th>{$tran_balance_amount}</th>
                                    <th>{$tran_Payout_Amount}</th>
                                    <th>{$tran_check}</th>
                                        {if $payout_release_type=="ewallet_request"}
                                        <th>{$tran_delete}</th>
                                        {/if}
                                    <th>{$tran_view_user_data}</th>
                                </tr>

                            </thead>
                            {assign var="length" value= count($details)}
                            {assign var="i" value=0}
                            {assign var="class" value=""}
                            {assign var="path" value="{$BASE_URL}admin/"}
                            <input type= 'hidden'  name = "table_rows"  value ="{$length}" >
                            {if $length>0}
                                <tbody>
                                    {foreach from=$details item="v"}
                                        {if $i%2==0}
                                            {$class='tr1'}
                                        {else}
                                            {$class='tr2'}
                                        {/if}

                                        <tr class="{$class}" align="center" >
                                            <td>{counter}</td>
                                            <td>{$v.user_name}<input type='hidden' name='user_id{$i}' value = '{$v.id}'></td>
                                            <td>{$v.user_detail_name}</td>
                                            <td>{$v.balance_amount}<input type='hidden' name='balance_amount{$i}' value = '{$v.balance_amount}'></td>
                                            <td>
                                                <input type='hidden' name='requested_date{$i}' value = '{$v.requested_date}'>
                                                <input type="text" name="payout{$i}" id="payout_amount" value="{if $payout_release_type=="ewallet_request"}{$v.payout_amount}{else}{$v.payout_amount}{/if}"/>
                                                <span id="errmsg1"></span>
                                            </td>
                                            <td><input type="checkbox" name="release{$i}" id="release{$i}" class="release"/><label for="release{$i}" /></td>
                                                {if $payout_release_type=="ewallet_request"}
                                                <td><a href="javascript:delete_request({$v.req_id},'{$path}')"><img src="{$PUBLIC_URL}images/delete.png" title="Delete {$v.user_name}" style="border:none;"></a></td>
                                                    {/if}
                                            <td><a class="btn btn-xs btn-link panel-config" href="#panel-config" onclick="javascript:view_popup({$v.id}, this.parentNode.parentNode.rowIndex, 'admin', '{$path}')"data-toggle="modal" style='color:#C48189;'>{$tran_view}</a></td>
                                        </tr>
                                        {$i=$i+1}

                                    {/foreach}                
                                </tbody>


                            {else}
                                <h3> </h3>
                            {/if}          
                        </table>
                        {if count($details)>0}  

                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">

                                    <button class="btn btn-bricky"tabindex="1" name="release_payout" id="release_payout" type="submit" value="release_payout"> {$tran_release} </button>


                                </div>
                            </div> 

                        {/if}
                    </form>
                </div>
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
                                                    ValidatePayoutRelease.init();
                                                });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
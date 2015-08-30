
<div class="panel panel-default">

    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>{$tran_add_new_epin}
    </div> 
    <div class="panel-body">


        <form role="form" class="smart-wizard form-horizontal" id="upload" name="upload" method="post">
            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i>{$tran_errors_check}
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-4 control-label" >{$tran_number_of_epin}: </label>
                <div class="col-sm-4" style="padding-top: 7px;">
                    {$un_allocated_pin}
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label" for="product">{$tran_amount} <font color="#ff0000">*</font>:</label>
                <div class="col-sm-3">
                    <select name="amount1" id="amount1"  tabindex="11" class="form-control" >
                        <option value="">{$tran_select_amount}</option>
                        {assign var=i value=0}
                        {foreach from=$amount_details item=v}
                            <option value="{$v.amount}">{$v.amount}</option>
                            {$i = $i+1}
                        {/foreach}
                    </select> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="count">{$tran_count} <font color="#ff0000">*</font>:</label>
                <div class="col-sm-3">
                    <input tabindex="2" type="text" name="count" id="count" size="20" value="" class="form-control"
                           title=""/>
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label" for="date">
                    {$tran_expiry_date}<span class="symbol required"></span>
                </label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="date" id="date" type="text" tabindex="3" size="20" maxlength="10"  value="" />
                        <label for="date" class="input-group-addon"> <i class="fa fa-calendar"></i> </label>
                        
                    </div>
                    <span for="date" class="help-block">    </span>
                </div>

            </div>


            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-4">
                    <button class="btn btn-bricky" name="addpasscode" id="addpasscode" value="{$tran_add_epin}" tabindex="3">
                        {$tran_add_epin}
                    </button>
                </div>
            </div>
        </form>       
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>{$tran_add_new_epin}
    </div> 
    <div class="panel-body">

        {if $un_allocated_pin > 0}
            <form name="pin_form" id="pin_form" method="post" action=""  >

                <div class="form-group">
                    <!-- <label class="col-sm-2 control-label" for="service"> </label>-->
                    <div class="col-sm-3">

                        <input tabindex="4" type="radio" id="status_active" name="pin_status" value="active" checked {if $status=='active'}checked='1'{/if} /><label for="val"></label>{$tran_active_epin}</div>

                    <div class="col-sm-3">
                        <input tabindex="4" type="radio" name="pin_status" id="status_inactive" value="inactive" {if $status=='inactive'}checked='1'{/if} /><label for="valid"></label>{$tran_inactive_epin}</div>



                    <div class="col-sm-2 col-sm-offset-2">

                        <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/">
                        <button class="btn btn-bricky" type="submit" name="view_pin"  id="view_pin" value="{$tran_view_epin}" tabindex="5" title="View E-pin">{$tran_refine}</button>

                    </div>
                </div>

            </form>
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                <thead>
                    <tr class="th" align="center">
                        <th>{$tran_no}</th>
                        <th>{$tran_epin}</th>
                            {*                    {if $product_status == "yes"}*}
                        <th>{$tran_amount}</th>
                            {* <th>{$tran_product_id}</th>
                            {/if}*}
                        <th>{$tran_bal_amount}</th>
                        <th>{$tran_allocated_user}</th>
                        <th>{$tran_status}</th>
                        <th>{$tran_uploaded_date}</th>
                        <th>{$tran_expiry_date}</th>
                        <th width="15%">{$tran_action}</th>
                    </tr>
                </thead>

                <tbody>                       
                    {assign var="i" value=0}
                    {assign var="pin" value=""}
                    {assign var="tr_class" value=""}
                    {assign var="root" value="{$BASE_URL}admin/"}
                    {foreach from=$pin_numbers item=v}                        
                        {assign var="id" value="{$v.pin_id}"}
                        {if $i%2 == 0}
                            {$tr_class="tr1"}	 
                        {else}
                            {$tr_class="tr2"}
                        {/if}


                        {if $v.status == "yes"}
                            {$v.stat = "ACTIVE"}
                        {else}
                            {if {$v.used_user}==""}
                                {$v.stat = "BLOCKED"}
                            {else}
                                {$v.stat = "USED"}
                            {/if}   

                        {/if}

                        {$i=$i+1}


                        <tr class="{$tr_class}" align="center" >
                            <td align="center">{$i+$from}</td>
                            <td align="center">{$v.pin}</td>
                            <td align="center">{$v.pin_amount}</td>
                            <td align="center">{$v.pin_bal_amount}</td>
                            {*   {if $product_status=="yes"}*}

                            {* <td align="center">{$v.prod_id}</td>*}
                            {*{/if}*}
                            {if {$v.allocated_user}==""}
                                <td align="center">NA</td>
                            {else}
                                <td align="center">{$v.allocated_user}</td>
                            {/if}                          
                            <td align="center">{$v.stat}</td>
                            <td align="center">{$v.pin_uploded_date}</td>
                            <td align="center">{$v.pin_expiry_date}</td>
                            <td>






                                <div class="visible-md visible-lg hidden-sm hidden-xs buttons-widget">
                                    <!--delete PIN start-->
                                    <a href="#" onclick="javascript:delete_pin({$id}, '{$root}')"  class="btn btn-bricky tooltips" data-placement="top" data-original-title="Delete this PIN">
                                        <span style="display:none" id="error_msg_delete">{$tran_sure_you_want_to_delete_this_passcode_there_is_no_undo}</span>
                                        <i class="fa fa-times fa fa-white"></i>
                                    </a>
                                    <!--delete PIN end-->
                                    {if $v.stat == "ACTIVE"}
                                        <!--block PIN start-->
                                        <a href="#" onclick="javascript:block_pin({$id}, '{$root}')"  class="btn btn-primary tooltips" data-placement="top" data-original-title="Block this PIN">
                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                        </a>
                                        <!--block PIN end-->
                                    {else}
                                        <!--Activate PIN start-->

                                        <a  href="#" onclick="javascript:activate_pin({$id}, '{$root}')" class="btn btn-green tooltips" data-placement="top" data-original-title="Activate this PIN">

                                            <span style="display:none" id="error_msg_activate">{$tran_sure_you_want_to_activate_this_passcode_there_is_no_undo}</span>
                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                        </a>
                                        <!--Activate PIN end-->
                                    {/if}
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group">
                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                        </a>
                                        <ul role="menu" class="dropdown-menu pull-right">


                                            <!--delete PIN start-->
                                            <li role="presentation">
                                                <a role="menuitem"  href="#" onclick="javascript:delete_pin({$id}, '{$root}')">

                                                    <span style="display:none" id="error_msg_delete">{$tran_sure_you_want_to_delete_this_passcode_there_is_no_undo}</span>
                                                    <i class="fa fa-times fa fa-white"></i>Delete
                                                </a>
                                            </li>
                                            <!--delete PIN end-->
                                            {if $v.stat == "ACTIVE"}
                                                <!--block PIN start-->
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#" onclick="javascript:block_pin({$id}, '{$root}')" >
                                                        <i class="glyphicon glyphicon-remove-circle"></i>Block
                                                    </a>
                                                </li>
                                                <!--block PIN end-->
                                            {else}
                                                <!--Activate PIN start-->
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#" onclick="javascript:activate_pin({$id}, '{$root}')">

                                                        <span style="display:none" id="error_msg_activate">{$tran_sure_you_want_to_activate_this_passcode_there_is_no_undo}</span>
                                                        <i class="glyphicon glyphicon-ok-sign"></i>Activate
                                                    </a>
                                                </li>
                                                <!--Activate PIN end-->
                                            {/if}


                                        </ul>
                                    </div>
                                </div>


                            </td>

                        </tr>

                    {/foreach}             
                </tbody>                        
            </table>
            <div class="form-group">
                <div class="col-sm-2">

                    <button class="btn btn-bricky" type="submit" name="delete_all_pin"  id="delete_all_pin" value="{$tran_delete_all_epin}" tabindex="7" title="Delete All E-pin" onclick="javascript:delete_all_epin('{$root}');">{$tran_delete_all_epin}</button> 

                </div>
            </div>

        {else}
            <h3> {$tran_your_account_have_no_active_epin}</h3>
        {/if}

    </div>

</div>



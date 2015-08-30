{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_pay_out_pair_price}</span>
    <span id="validate_msg2">{$tran_you_must_enter_celing_amount}</span>
    <span id="validate_msg3">{$tran_you_must_enter_service_charge}</span>
    <span id="validate_msg4">{$tran_you_must_enter_tds_value}</span>
    <span id="validate_msg5">{$tran_you_must_enter_product_point_value}</span>
    <span id="validate_msg6">{$tran_you_must_enter_referal_amount}</span>
    <span id="validate_msg7">{$tran_you_must_enter_a_valid_pay_out_price}</span>
    <span id="validate_msg8">{$tran_you_must_enter_reg_fee}</span>
    <span id="validate_msg9">{$tran_need_payout_validity}</span>
    <span id="validate_msg10">{$tran_need_min_payout}</span>
    <span id="validate_msg11">{$tran_need_rank_days}</span>

    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">

</div>

<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_configuration} 
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
                <form role="form" class="smart-wizard form-horizontal" name= 'form_setting'  id='form_setting' method ='post' action="" >
                    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="tabbable">
                        <ul class="nav nav-tabs tab-green">
                            <li class="{$tab1}">
                                <a href="#panel_tab3_example1" data-toggle="tab">{$tran_commission_setting}</a>
                            </li>
                            <li class="{$tab2}">
                                <a href="#panel_tab3_example2" data-toggle="tab">{$tran_tax_setting}</a>
                            </li>

                            {if $referal_status=="yes"}
                                <li class="{$tab3}"><a href="#panel_tab3_example3" data-toggle="tab">{$tran_referal_amount}</a>
                                </li>
                            {/if}

                            {*<li class="{$tab4}">
                            <a href="#panel_tab3_example6" data-toggle="tab">{$tran_payout_setting}</a>
                            </li>*}
                            <li class="{$tab5}">
                                <a href="#panel_tab3_example5" data-toggle="tab">{$tran_registration_amount}</a>
                            </li>
                            {if $module_status['sponsor_commission_status']=='yes'}
                                <li class="{$tab6}">
                                    <a href="#panel_tab3_example6" data-toggle="tab">{$tran_level_commission}</a>
                                </li>
                            {/if}
                            
                            <li class="{$tab7}">
                                <a href="#panel_tab3_example7" data-toggle="tab">{$tran_participation_bonus}: </a>
                            </li>



                        </ul>

                        <div class="tab-content">
                            <input type="hidden" name="active_tab" id="active_tab" value="" >

                            <div class="tab-pane{$tab2}" id="panel_tab3_example2">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i>{$tran_tax_setting}
                                    </div>

                                    <div class="panel-body">
                                        {*if $MLM_PLAN=="Binary"*}


                                        <div class="form-group">

                                            <label class="col-sm-2 control-label" for="service">{$tran_service_charge}: </label>
                                            <div class="col-sm-3">
                                                <input type="text" tabindex="1" name ="service" id ="service" value="{$obj_arr["service_charge"]}" title="">
                                                <span id="errmsg1"></span>
                                            </div>
                                            <span class="help-block"></span>


                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="tds"> {$tran_tds}(%):</label>
                                            <div class="col-sm-3">
                                                <input type="text" name ="tds" tabindex="2" id ="tds" value="{$obj_arr["tds"]}" title="">
                                                <span id="errmsg2"></span>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="3" name="setting" id="setting" title="{$tran_update}" onclick="setHiddenValue('tab1')">{$tran_update}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--<input type="hidden" name ="referal_status"  id ="referal_status" value="{$referal_status}>">-->
                            </div>
                            <div class="tab-pane{$tab5}" id="panel_tab3_example5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i>{$tran_registration_amount}

                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="reg_amount" style="width:20%;">{$tran_registration_amount}:</label>
                                            <div class="col-sm-3">
                                                <input tabindex="11" type="text" name ="reg_amount"  id ="reg_amount" value="{$obj_arr["reg_amount"]}" title="">
                                                <span id="errmsg3"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="12" name="setting" id="setting" style="margin-left:25%;" title="{$tran_update}" onclick="setHiddenValue('tab5')">{$tran_update}</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>




                            <div class="tab-pane{$tab1}" id="panel_tab3_example1">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {if $MLM_PLAN=="Binary"}
                                            <i class="fa fa-external-link-square"></i>{$tran_pair_setting}
                                        {else if $MLM_PLAN=="Board"}
                                            <i class="fa fa-external-link-square"></i>{$tran_commission_setting}
                                        {/if}

                                    </div>

                                    <div class="panel-body">
                                        {if $MLM_PLAN=="Binary"}
                                            {*<div class="form-group">
                                            <label class="col-sm-2 control-label" for="pair"> {$tran_pair_price}:<font color="#ff0000">*</font> </label>
                                            <div class="col-sm-3">
                                            <input type="text"  class="form-control" tabindex="4"  name ="pair" id ="pair" value="{$obj_arr["pair_price"]}"  onclick=""/>
                                            <span id="errmsg3"></span>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-2 control-label" for="ceiling">{$tran_pair_ceiling}:<font color="#ff0000">*</font> </label>
                                            <div class="col-sm-3">
                                            <input type="text"   class="form-control" tabindex="5" name ="ceiling"  id ="ceiling" value="{$obj_arr["pair_ceiling"]}" title="{$tran_the_maximum_pair_ceiling_limit}">

                                            <span id="errmsg4"></span>
                                            </div>
                                            </div>*}
                                            {if $product_status=="yes"}
                                                {if $obj_arr["percentorflat"] == "flat"}
                                                    {$tran_product_point_value=$tran_pair_price}
                                                    {$flat = 'checked="true"'}
                                                    {$percent = ""}
                                                {else}
                                                    {$flat = ""}
                                                    {$tran_product_point_value=$tran_pair_percentage_value}
                                                    {$percent = 'checked="true"'}
                                                {/if}
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="ceiling">{$tran_pair_ceiling}:<font color="#ff0000">*</font> </label>
                                                    <div class="col-sm-3">
                                                        <input type="text"   class="form-control" tabindex="5" name ="ceiling"  id ="ceiling" value="{$obj_arr["pair_ceiling"]}" title="{$tran_the_maximum_pair_ceiling_limit}">

                                                        <span id="errmsg4"></span>
                                                    </div>
                                                </div>
                                                {*<div class="form-group">
                                                    <label class="col-sm-2 control-label" style="width:20%;" >{$tran_type_of_commission}: </label>
                                                    <div class="col-sm-3">
                                                        <input tabindex="3" type = 'Radio' Name ='val' id='val' value= 'percentage'checked="true" title="" onclick="javascript:yesnoCheck('pair');"><label for="val"></label>{$tran_percentage}
                                                        <input tabindex="3" type = 'Radio' Name ='val' id='valid' value= 'flat' {$flat} title="" onclick="javascript:yesnoCheck('pair');"><label for="valid"></label>{$tran_flat}
                                                    </div>
                                                </div>*}
                                                <input tabindex="3" type = 'hidden' Name ='val' id='val' value= 'percentage'checked="true" title="">
                                                <div class="form-group">
                                                    <div class="col-sm-12" id="referal_div"  height="30" class="text" style="display:none;">
                                                    </div>
                                                </div>

                                                {*<div class="form-group">
                                                <label class="col-sm-2 control-label" style="width:20%;" >{$tran_type_of_commission}: </label>
                                                <div class="col-sm-3">
                                                <input tabindex="3" type = 'Radio' Name ='val' id='val' value= 'percentage'checked="true" title=""><label for="val"></label>{$tran_percentage}
                                                <input tabindex="3" type = 'Radio' Name ='val' id='valid' value= 'flat' {$flat} title=""><label for="valid"></label>{$tran_flat}
                                                </div>
                                                </div>*}
                                                {if $obj_arr["percentorflat"] == "flat"}
                                                    <div  id="pair">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="product_point_value">Product point vlaue:<font color="#ff0000">*</font> </label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name ="product_point_value"  id ="product_point_value" value="{$obj_arr["product_point_value"]}">
                                                                <span id="errmsg4"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="product_point_value">{$tran_product_point_value}:<font color="#ff0000">*</font> </label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name ="pair"  id ="product_point_value" value="{$obj_arr["pair_price"]}">
                                                                <span id="errmsg4"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {else}
                                                    <div  id="pair">

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="product_point_value">{$tran_pair_percentage}:<font color="#ff0000">*</font> </label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name ="product_point_value"  id ="product_point_value" value="{$obj_arr["product_point_value"]}">
                                                                <span id="errmsg4"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                {/if}

                                            {else}
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="pair"> {$tran_pair_price}:<font color="#ff0000">*</font> </label>
                                                    <div class="col-sm-3">
                                                        <input type="text"  class="form-control" tabindex="4"  name ="pair" id ="pair" value="{$obj_arr["pair_price"]}"  onclick=""/>
                                                        <span id="errmsg3"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="ceiling">{$tran_pair_ceiling}:<font color="#ff0000">*</font> </label>
                                                    <div class="col-sm-3">
                                                        <input type="text"   class="form-control" tabindex="5" name ="ceiling"  id ="ceiling" value="{$obj_arr["pair_ceiling"]}" title="{$tran_the_maximum_pair_ceiling_limit}">

                                                        <span id="errmsg4"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name ="product_point_value"  id ="product_point_value" value="{$obj_arr["product_point_value"]}">
                                            {/if}

                                        {else if $MLM_PLAN=="Board"}

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="commission_value"> {$tran_Board_Commission}: <font color="#ff0000">*</font> </label>
                                                <div class="col-sm-3">
                                                    <input type="text"   class="form-control" tabindex="6" name ="board_commission" id ="board_commission" value="{$obj_arr["board_commission"]}" title="{$tran_Board_Commission}">
                                                    <span id="errmsg5"></span>
                                                </div>
                                            </div>


                                        {/if}
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="7" name="setting" id="setting" title="{$tran_update}" onclick="setHiddenValue('tab2')">{$tran_update}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name ="referal_status"  id ="referal_status" value="{$referal_status}>">
                            </div>

                            {if $module_status['sponsor_commission_status'] == 'yes'}
                                <div class="tab-pane{$tab6}" id="panel_tab3_example6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="fa fa-external-link-square"></i>{$tran_level_commission}
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" style="width:20%;" for="depth_cieling">{$tran_depth_ceiling}:</label>
                                                <div class="col-sm-3">
                                                    <input tabindex="1" type="text" name ="depth_cieling" readonly  id ="depth_cieling" value="{$obj_arr["depth_ceiling"]}" title="">
                                                </div>
                                            </div>

                                            {if $mlm_plan!="Unilevel" && $mlm_plan!="Party"}
                                                {*<div class="form-group">
                                                <label class="col-sm-2 control-label" style="width:20%;" for="width_cieling"> {$tran_width_ceiling}: </label>
                                                <div class="col-sm-3">
                                                <input tabindex="2" type="text" name ="width_cieling" readonly id ="width_cieling" value="{$obj_arr["width_ceiling"]}" title="">
                                                </div>
                                                </div>*}
                                            {/if}
                                            {if $obj_arr["percentorflatlvlcomsn"] == "Flat"}
                                                {$flat = 'checked="true"'}
                                                {$percent = ""}
                                            {else}
                                                {$flat = ""}
                                                {$percent = 'checked="true"'}
                                            {/if}
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" style="width:20%;" >{$tran_type_of_commission}: </label>
                                                <div class="col-sm-3">
                                                    <input tabindex="3" type = 'Radio' Name ='vals' id='vals' value= 'Percentage'{$percent} title=""><label for="val"></label>{$tran_percentage}
                                                    <input tabindex="3" type = 'Radio' Name ='vals' id='valids' value= 'Flat'{$flat} title=""><label for="valid"></label>{$tran_flat}
                                                </div>
                                            </div>


                                            {$arr_len = $obj_arr["depth_ceiling"]}

                                            {$levels = count($arr_comm)} 
                                            {assign var=level value="0"}
                                            {foreach from=$arr_comm item=v}
                                                {$level = $level + 1}

                                                {*//$levl_perc=$arr_comm["detail$level"]["level_percentage"];*}
                                                {$levl_perc = $v} 


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" style="width:20%;" for="level_per">{$tran_level} {$level} {$tran_commission}:</label>
                                                    <div class="col-sm-3">
                                                        <input tabindex="4" type="number" name ="level_per{$level}"  id ="level_per{$level}" value="{$levl_perc}" title=""min="1" >
                                                        <span id="errmsg4"></span>
                                                    </div>
                                                </div>

                                            {/foreach}               
                                            <input type='hidden' name='levels' id='levels' value='{$levels}'>
                                            <div class="form-group">
                                                <div class="col-sm-2 col-sm-offset-2">
                                                    <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="5" name="setting" id="setting" style="margin-left:25%;" onclick="setHiddenValue('tab6')">{$tran_update}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/if}

                            {if $referal_status=="yes"}
                                <div class="tab-pane{$tab3}" id="panel_tab3_example3">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="fa fa-external-link-square"></i>{$tran_referal_amount}
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="referal_amount">{$tran_referal_amount}: </label>
                                                <div class="col-sm-3">
                                                    <input tabindex="8" type="text" name="referal_amount" id="referal_amount" title="" value="{$obj_arr["referal_amount"]}"/>
                                                    <span id="errmsg6"></span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-2 col-sm-offset-2">
                                                    <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="9" name="setting" id="setting" title="{$tran_update}" onclick="setHiddenValue('tab3')">{$tran_update}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/if}

                            <div class="tab-pane{$tab7}" id="panel_tab3_example7">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i>{$tran_participation_bonus}

                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="participation_bonus" style="width:20%;">Participation Bonus:</label>
                                            <div class="col-sm-3">
                                                <input tabindex="11" type="text" name ="participation_bonus"  id ="participation_bonus" value="{$obj_arr["participation_bonus"]}" title="">
                                                <span id="errmsg3"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="week_limit" style="width:20%;">{$tran_week_limit}:</label>
                                            <div class="col-sm-3">
                                                <input tabindex="11" type="text" name ="week_limit"  id ="week_limit" value="{$obj_arr["week_limit"]}" title="">
                                                <span id="errmsg3"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="12" name="setting" id="setting" style="margin-left:25%;" title="{$tran_update}" onclick="setHiddenValue('tab7')">{$tran_update}</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            

                            {* <div class="tab-pane{$tab4}" id="panel_tab3_example6">
 
                            <div class="panel panel-default">

                            <div class="panel-heading">
                            <i class="fa fa-external-link-square"></i>{$tran_payout_setting}
                            </div>

                            <div class="panel-body">
                            <div class="form-group">
                            <label class="col-sm-2 control-label" for="min_payout">   {$tran_Minimum_Payout_Amount}:</label>
                            <div class="col-sm-3">
                            {if $payout_release_status=="from_ewallet" || $payout_release_status=="ewallet_request"}
                            <input tabindex="10" type = 'text' name ='min_payout' id='payout_amount' value="{$obj_arr["min_payout"]}" title="{$tran_Minimum_Amount_for_Payout_Release}">
                            {else}
                            <input type="hidden" name="min_payout" id="min_payout" value="0"/>
                            {/if}
                            <span id="errmsg6"></span>
                            </div>
                            </div>
                            <div class="form-group">

                            <form name="payout_release" id="payout_release" method="post">
                            <label class="col-sm-2 control-label" for="payout_status"> {$tran_payout_method} : </label>
                            <div class="col-sm-4">
                            <p>
                            <input tabindex="11" type="radio" id="payout_normal" name="payout_status" value="normal" {if $payout_release_status=='normal'}checked {/if}/>
                            <label for="payout_normal">{$tran_daily}</label>
                            </p>
                            <p>
                            <input tabindex="11" type="radio" name="payout_status" id="payout_ewallet" value="from_ewallet" {if $payout_release_status=='from_ewallet'}checked {/if} />
                            <label for="payout_ewallet">{$tran_from_e_wallet}</label>
                            </p>
                            <p>
                            <input tabindex="11" type="radio" name="payout_status" id="payout_ewallet_req" value="ewallet_request" {if $payout_release_status=='ewallet_request'}checked {/if} />
                            <label for="payout_ewallet_req">{$tran_e_wallet_request}</label>
                            </p>
                            <span id="errmsg6"></span>
                            </div>
                            </form>
                            </div>
                            </div>



                            <div class="panel-body">
                            <div class="form-group">
                            {if $payout_release_status=="from_ewallet_request"}
                            <label class="col-sm-2 control-label" for="payout_validity"> {$tran_Payout_Request_Validity}:</label>
                            <div class="col-sm-3">
                            <input type="text" name ="payout_validity"  id ="payout_amount" value="{$obj_arr["payout_request_validity"]}" title="{$tran_Payout_Request_Validity_days}">                       

                            {/if}
                            </div>
                            </div>


                            <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"  type="submit" value="{$tran_update}" tabindex="12" name="setting" id="setting" title="{$tran_update}" onclick="setHiddenValue('tab4')">{$tran_update}</button>
                            </div>
                            </div>
                            </div>
                            </div>

                            </div>*}



                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- end: PAGE CONTENT -->



</div>
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
                                                    jQuery(document).ready(function() {
                                                        Main.init();
                                                        ValidateConfiguration.init();
                                                    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}



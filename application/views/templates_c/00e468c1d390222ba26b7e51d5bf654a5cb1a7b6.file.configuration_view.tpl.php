<?php /* Smarty version Smarty 3.1.4, created on 2015-08-01 06:50:25
         compiled from "application/views/admin/configuration/configuration_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184481344855bb6e9b7175d5-69736844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00e468c1d390222ba26b7e51d5bf654a5cb1a7b6' => 
    array (
      0 => 'application/views/admin/configuration/configuration_view.tpl',
      1 => 1438429485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184481344855bb6e9b7175d5-69736844',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb6e9b9423e',
  'variables' => 
  array (
    'tran_you_must_enter_pay_out_pair_price' => 0,
    'tran_you_must_enter_celing_amount' => 0,
    'tran_you_must_enter_service_charge' => 0,
    'tran_you_must_enter_tds_value' => 0,
    'tran_you_must_enter_product_point_value' => 0,
    'tran_you_must_enter_referal_amount' => 0,
    'tran_you_must_enter_a_valid_pay_out_price' => 0,
    'tran_you_must_enter_reg_fee' => 0,
    'tran_need_payout_validity' => 0,
    'tran_need_min_payout' => 0,
    'tran_need_rank_days' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'tran_configuration' => 0,
    'tran_errors_check' => 0,
    'tab1' => 0,
    'tran_commission_setting' => 0,
    'tab2' => 0,
    'tran_tax_setting' => 0,
    'referal_status' => 0,
    'tab3' => 0,
    'tran_referal_amount' => 0,
    'tab5' => 0,
    'tran_registration_amount' => 0,
    'module_status' => 0,
    'tab6' => 0,
    'tran_level_commission' => 0,
    'tab7' => 0,
    'tran_participation_bonus' => 0,
    'tran_service_charge' => 0,
    'obj_arr' => 0,
    'tran_tds' => 0,
    'tran_update' => 0,
    'MLM_PLAN' => 0,
    'tran_pair_setting' => 0,
    'product_status' => 0,
    'tran_pair_price' => 0,
    'tran_pair_percentage_value' => 0,
    'tran_pair_ceiling' => 0,
    'tran_the_maximum_pair_ceiling_limit' => 0,
    'tran_product_point_value' => 0,
    'tran_pair_percentage' => 0,
    'tran_Board_Commission' => 0,
    'tran_depth_ceiling' => 0,
    'mlm_plan' => 0,
    'tran_type_of_commission' => 0,
    'percent' => 0,
    'tran_percentage' => 0,
    'flat' => 0,
    'tran_flat' => 0,
    'arr_comm' => 0,
    'level' => 0,
    'v' => 0,
    'tran_level' => 0,
    'tran_commission' => 0,
    'levl_perc' => 0,
    'levels' => 0,
    'tran_week_limit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb6e9b9423e')) {function content_55bb6e9b9423e($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_pay_out_pair_price']->value;?>
</span>
    <span id="validate_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_celing_amount']->value;?>
</span>
    <span id="validate_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_service_charge']->value;?>
</span>
    <span id="validate_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_tds_value']->value;?>
</span>
    <span id="validate_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_product_point_value']->value;?>
</span>
    <span id="validate_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_referal_amount']->value;?>
</span>
    <span id="validate_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_a_valid_pay_out_price']->value;?>
</span>
    <span id="validate_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_reg_fee']->value;?>
</span>
    <span id="validate_msg9"><?php echo $_smarty_tpl->tpl_vars['tran_need_payout_validity']->value;?>
</span>
    <span id="validate_msg10"><?php echo $_smarty_tpl->tpl_vars['tran_need_min_payout']->value;?>
</span>
    <span id="validate_msg11"><?php echo $_smarty_tpl->tpl_vars['tran_need_rank_days']->value;?>
</span>

    <input type="hidden" id="path_root" name="path_root" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
">

</div>

<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_configuration']->value;?>
 
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
                    <input type="hidden" id="path_root" name="path_root" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="tabbable">
                        <ul class="nav nav-tabs tab-green">
                            <li class="<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
">
                                <a href="#panel_tab3_example1" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_commission_setting']->value;?>
</a>
                            </li>
                            <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                                <a href="#panel_tab3_example2" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_tax_setting']->value;?>
</a>
                            </li>

                            <?php if ($_smarty_tpl->tpl_vars['referal_status']->value=="yes"){?>
                                <li class="<?php echo $_smarty_tpl->tpl_vars['tab3']->value;?>
"><a href="#panel_tab3_example3" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_referal_amount']->value;?>
</a>
                                </li>
                            <?php }?>
                            <li class="<?php echo $_smarty_tpl->tpl_vars['tab5']->value;?>
">
                                <a href="#panel_tab3_example5" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_registration_amount']->value;?>
</a>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['module_status']->value['sponsor_commission_status']=='yes'){?>
                                <li class="<?php echo $_smarty_tpl->tpl_vars['tab6']->value;?>
">
                                    <a href="#panel_tab3_example6" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_level_commission']->value;?>
</a>
                                </li>
                            <?php }?>
                            
                            <li class="<?php echo $_smarty_tpl->tpl_vars['tab7']->value;?>
">
                                <a href="#panel_tab3_example7" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_participation_bonus']->value;?>
: </a>
                            </li>



                        </ul>

                        <div class="tab-content">
                            <input type="hidden" name="active_tab" id="active_tab" value="" >

                            <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
" id="panel_tab3_example2">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_tax_setting']->value;?>

                                    </div>

                                    <div class="panel-body">


                                        <div class="form-group">

                                            <label class="col-sm-2 control-label" for="service"><?php echo $_smarty_tpl->tpl_vars['tran_service_charge']->value;?>
: </label>
                                            <div class="col-sm-3">
                                                <input type="text" tabindex="1" name ="service" id ="service" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["service_charge"];?>
" title="">
                                                <span id="errmsg1"></span>
                                            </div>
                                            <span class="help-block"></span>


                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="tds"> <?php echo $_smarty_tpl->tpl_vars['tran_tds']->value;?>
(%):</label>
                                            <div class="col-sm-3">
                                                <input type="text" name ="tds" tabindex="2" id ="tds" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["tds"];?>
" title="">
                                                <span id="errmsg2"></span>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" tabindex="3" name="setting" id="setting" title="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" onclick="setHiddenValue('tab1')"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--<input type="hidden" name ="referal_status"  id ="referal_status" value="<?php echo $_smarty_tpl->tpl_vars['referal_status']->value;?>
>">-->
                            </div>
                            <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab5']->value;?>
" id="panel_tab3_example5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_registration_amount']->value;?>


                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="reg_amount" style="width:20%;"><?php echo $_smarty_tpl->tpl_vars['tran_registration_amount']->value;?>
:</label>
                                            <div class="col-sm-3">
                                                <input tabindex="11" type="text" name ="reg_amount"  id ="reg_amount" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["reg_amount"];?>
" title="">
                                                <span id="errmsg3"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" tabindex="12" name="setting" id="setting" style="margin-left:25%;" title="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" onclick="setHiddenValue('tab5')"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>




                            <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
" id="panel_tab3_example1">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php if ($_smarty_tpl->tpl_vars['MLM_PLAN']->value=="Binary"){?>
                                            <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_pair_setting']->value;?>

                                        <?php }elseif($_smarty_tpl->tpl_vars['MLM_PLAN']->value=="Board"){?>
                                            <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_commission_setting']->value;?>

                                        <?php }?>

                                    </div>

                                    <div class="panel-body">
                                        <?php if ($_smarty_tpl->tpl_vars['MLM_PLAN']->value=="Binary"){?>
                                            <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>
                                                <?php if ($_smarty_tpl->tpl_vars['obj_arr']->value["percentorflat"]=="flat"){?>
                                                    <?php $_smarty_tpl->tpl_vars['tran_product_point_value'] = new Smarty_variable($_smarty_tpl->tpl_vars['tran_pair_price']->value, null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['flat'] = new Smarty_variable('checked="true"', null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_variable('', null, 0);?>
                                                <?php }else{ ?>
                                                    <?php $_smarty_tpl->tpl_vars['flat'] = new Smarty_variable('', null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['tran_product_point_value'] = new Smarty_variable($_smarty_tpl->tpl_vars['tran_pair_percentage_value']->value, null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_variable('checked="true"', null, 0);?>
                                                <?php }?>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="ceiling"><?php echo $_smarty_tpl->tpl_vars['tran_pair_ceiling']->value;?>
:<font color="#ff0000">*</font> </label>
                                                    <div class="col-sm-3">
                                                        <input type="text"   class="form-control" tabindex="5" name ="ceiling"  id ="ceiling" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["pair_ceiling"];?>
" title="<?php echo $_smarty_tpl->tpl_vars['tran_the_maximum_pair_ceiling_limit']->value;?>
">

                                                        <span id="errmsg4"></span>
                                                    </div>
                                                </div>
                                                <input tabindex="3" type = 'hidden' Name ='val' id='val' value= 'percentage'checked="true" title="">
                                                <div class="form-group">
                                                    <div class="col-sm-12" id="referal_div"  height="30" class="text" style="display:none;">
                                                    </div>
                                                </div>
                                                <?php if ($_smarty_tpl->tpl_vars['obj_arr']->value["percentorflat"]=="flat"){?>
                                                    <div  id="pair">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="product_point_value">Product point vlaue:<font color="#ff0000">*</font> </label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name ="product_point_value"  id ="product_point_value" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["product_point_value"];?>
">
                                                                <span id="errmsg4"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="product_point_value"><?php echo $_smarty_tpl->tpl_vars['tran_product_point_value']->value;?>
:<font color="#ff0000">*</font> </label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name ="pair"  id ="product_point_value" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["pair_price"];?>
">
                                                                <span id="errmsg4"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <div  id="pair">

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="product_point_value"><?php echo $_smarty_tpl->tpl_vars['tran_pair_percentage']->value;?>
:<font color="#ff0000">*</font> </label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name ="product_point_value"  id ="product_point_value" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["product_point_value"];?>
">
                                                                <span id="errmsg4"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php }?>

                                            <?php }else{ ?>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="pair"> <?php echo $_smarty_tpl->tpl_vars['tran_pair_price']->value;?>
:<font color="#ff0000">*</font> </label>
                                                    <div class="col-sm-3">
                                                        <input type="text"  class="form-control" tabindex="4"  name ="pair" id ="pair" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["pair_price"];?>
"  onclick=""/>
                                                        <span id="errmsg3"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="ceiling"><?php echo $_smarty_tpl->tpl_vars['tran_pair_ceiling']->value;?>
:<font color="#ff0000">*</font> </label>
                                                    <div class="col-sm-3">
                                                        <input type="text"   class="form-control" tabindex="5" name ="ceiling"  id ="ceiling" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["pair_ceiling"];?>
" title="<?php echo $_smarty_tpl->tpl_vars['tran_the_maximum_pair_ceiling_limit']->value;?>
">

                                                        <span id="errmsg4"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name ="product_point_value"  id ="product_point_value" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["product_point_value"];?>
">
                                            <?php }?>

                                        <?php }elseif($_smarty_tpl->tpl_vars['MLM_PLAN']->value=="Board"){?>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="commission_value"> <?php echo $_smarty_tpl->tpl_vars['tran_Board_Commission']->value;?>
: <font color="#ff0000">*</font> </label>
                                                <div class="col-sm-3">
                                                    <input type="text"   class="form-control" tabindex="6" name ="board_commission" id ="board_commission" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["board_commission"];?>
" title="<?php echo $_smarty_tpl->tpl_vars['tran_Board_Commission']->value;?>
">
                                                    <span id="errmsg5"></span>
                                                </div>
                                            </div>


                                        <?php }?>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" tabindex="7" name="setting" id="setting" title="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" onclick="setHiddenValue('tab2')"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name ="referal_status"  id ="referal_status" value="<?php echo $_smarty_tpl->tpl_vars['referal_status']->value;?>
>">
                            </div>

                            <?php if ($_smarty_tpl->tpl_vars['module_status']->value['sponsor_commission_status']=='yes'){?>
                                <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab6']->value;?>
" id="panel_tab3_example6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_level_commission']->value;?>

                                        </div>

                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" style="width:20%;" for="depth_cieling"><?php echo $_smarty_tpl->tpl_vars['tran_depth_ceiling']->value;?>
:</label>
                                                <div class="col-sm-3">
                                                    <input tabindex="1" type="text" name ="depth_cieling" readonly  id ="depth_cieling" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["depth_ceiling"];?>
" title="">
                                                </div>
                                            </div>

                                            <?php if ($_smarty_tpl->tpl_vars['mlm_plan']->value!="Unilevel"&&$_smarty_tpl->tpl_vars['mlm_plan']->value!="Party"){?>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['obj_arr']->value["percentorflatlvlcomsn"]=="Flat"){?>
                                                <?php $_smarty_tpl->tpl_vars['flat'] = new Smarty_variable('checked="true"', null, 0);?>
                                                <?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_variable('', null, 0);?>
                                            <?php }else{ ?>
                                                <?php $_smarty_tpl->tpl_vars['flat'] = new Smarty_variable('', null, 0);?>
                                                <?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_variable('checked="true"', null, 0);?>
                                            <?php }?>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" style="width:20%;" ><?php echo $_smarty_tpl->tpl_vars['tran_type_of_commission']->value;?>
: </label>
                                                <div class="col-sm-3">
                                                    <input tabindex="3" type = 'Radio' Name ='vals' id='vals' value= 'Percentage'<?php echo $_smarty_tpl->tpl_vars['percent']->value;?>
 title=""><label for="val"></label><?php echo $_smarty_tpl->tpl_vars['tran_percentage']->value;?>

                                                    <input tabindex="3" type = 'Radio' Name ='vals' id='valids' value= 'Flat'<?php echo $_smarty_tpl->tpl_vars['flat']->value;?>
 title=""><label for="valid"></label><?php echo $_smarty_tpl->tpl_vars['tran_flat']->value;?>

                                                </div>
                                            </div>


                                            <?php $_smarty_tpl->tpl_vars['arr_len'] = new Smarty_variable($_smarty_tpl->tpl_vars['obj_arr']->value["depth_ceiling"], null, 0);?>

                                            <?php $_smarty_tpl->tpl_vars['levels'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['arr_comm']->value), null, 0);?> 
                                            <?php $_smarty_tpl->tpl_vars['level'] = new Smarty_variable("0", null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr_comm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                                <?php $_smarty_tpl->tpl_vars['level'] = new Smarty_variable($_smarty_tpl->tpl_vars['level']->value+1, null, 0);?>
                                                <?php $_smarty_tpl->tpl_vars['levl_perc'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value, null, 0);?> 


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" style="width:20%;" for="level_per"><?php echo $_smarty_tpl->tpl_vars['tran_level']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['level']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['tran_commission']->value;?>
:</label>
                                                    <div class="col-sm-3">
                                                        <input tabindex="4" type="number" name ="level_per<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
"  id ="level_per<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['levl_perc']->value;?>
" title=""min="1" >
                                                        <span id="errmsg4"></span>
                                                    </div>
                                                </div>

                                            <?php } ?>               
                                            <input type='hidden' name='levels' id='levels' value='<?php echo $_smarty_tpl->tpl_vars['levels']->value;?>
'>
                                            <div class="form-group">
                                                <div class="col-sm-2 col-sm-offset-2">
                                                    <button class="btn btn-bricky"  type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" tabindex="5" name="setting" id="setting" style="margin-left:25%;" onclick="setHiddenValue('tab6')"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['referal_status']->value=="yes"){?>
                                <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab3']->value;?>
" id="panel_tab3_example3">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_referal_amount']->value;?>

                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="referal_amount"><?php echo $_smarty_tpl->tpl_vars['tran_referal_amount']->value;?>
: </label>
                                                <div class="col-sm-3">
                                                    <input tabindex="8" type="text" name="referal_amount" id="referal_amount" title="" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["referal_amount"];?>
"/>
                                                    <span id="errmsg6"></span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-2 col-sm-offset-2">
                                                    <button class="btn btn-bricky"  type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" tabindex="9" name="setting" id="setting" title="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" onclick="setHiddenValue('tab3')"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>

                            <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab7']->value;?>
" id="panel_tab3_example7">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_participation_bonus']->value;?>


                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="participation_bonus" style="width:20%;">Participation Bonus:</label>
                                            <div class="col-sm-3">
                                                <input tabindex="11" type="text" name ="participation_bonus"  id ="participation_bonus" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["participation_bonus"];?>
" title="">
                                                <span id="errmsg3"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="week_limit" style="width:20%;"><?php echo $_smarty_tpl->tpl_vars['tran_week_limit']->value;?>
:</label>
                                            <div class="col-sm-3">
                                                <input tabindex="11" type="text" name ="week_limit"  id ="week_limit" value="<?php echo $_smarty_tpl->tpl_vars['obj_arr']->value["week_limit"];?>
" title="">
                                                <span id="errmsg3"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky"  type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" tabindex="12" name="setting" id="setting" style="margin-left:25%;" title="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" onclick="setHiddenValue('tab7')"><?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            



                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- end: PAGE CONTENT -->



</div>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
                                                    jQuery(document).ready(function() {
                                                        Main.init();
                                                        ValidateConfiguration.init();
                                                    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>



<?php }} ?>
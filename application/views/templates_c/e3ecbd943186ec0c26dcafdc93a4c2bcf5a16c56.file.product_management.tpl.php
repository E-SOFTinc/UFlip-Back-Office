<?php /* Smarty version Smarty 3.1.4, created on 2015-08-04 06:21:31
         compiled from "application/views/admin/product/product_management.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112463950455bb72c1b95135-34491588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3ecbd943186ec0c26dcafdc93a4c2bcf5a16c56' => 
    array (
      0 => 'application/views/admin/product/product_management.tpl',
      1 => 1438686355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112463950455bb72c1b95135-34491588',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb72c1d8837',
  'variables' => 
  array (
    'tran_you_must_enter_your_product_identifying_number' => 0,
    'tran_you_must_enter_your_product_name' => 0,
    'tran_you_must_enter_your_product_amount' => 0,
    'tran_you_must_enter_your_product_pair_value' => 0,
    'tran_enter_digits_only' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_nofond' => 0,
    'tran_showing' => 0,
    'tran_to' => 0,
    'tran_of' => 0,
    'tran_entries' => 0,
    'tran_notavailable' => 0,
    'tran_digits_only' => 0,
    'tran_Sure_you_want_to_inactivate_this_Product_There_is_NO_undo' => 0,
    'tran_Sure_you_want_to_edit_this_Product_There_is_NO_undo' => 0,
    'tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'tran_you_must_select_a_product_name' => 0,
    'tran_you_must_select_a_product_image' => 0,
    'tran_product_management' => 0,
    'tab1' => 0,
    'tran_manage_product' => 0,
    'tab2' => 0,
    'tran_add_product_image' => 0,
    'tran_errors_check' => 0,
    'tran_name_of_the_product' => 0,
    'pr_name' => 0,
    'tran_product_id' => 0,
    'pr_id_no' => 0,
    'tran_product_amount' => 0,
    'pr_value' => 0,
    'tran_Actual_amount_of_the_product' => 0,
    'paln_mlm' => 0,
    'tran_pair_value' => 0,
    'pair_value' => 0,
    'tran_product_pair_value' => 0,
    'tran_Participation_bonus_status' => 0,
    'participation_bonus_status' => 0,
    'tran_yes' => 0,
    'tran_no' => 0,
    'bv_value' => 0,
    'action' => 0,
    'pr_id' => 0,
    'tran_update_Product' => 0,
    'BASE_URL' => 0,
    'tran_add_product' => 0,
    'PUBLIC_URL' => 0,
    'tran_product_available' => 0,
    'sub_status' => 0,
    'tran_active_product' => 0,
    'tran_inactive_product' => 0,
    'tran_refine' => 0,
    'product_details' => 0,
    'tran_product_name' => 0,
    'tran_product_status' => 0,
    'tran_action' => 0,
    'i' => 0,
    'v' => 0,
    'active' => 0,
    'tran_active' => 0,
    'tran_inactive' => 0,
    'class' => 0,
    'prod_id' => 0,
    'name' => 0,
    'prod_value' => 0,
    'prod_bv' => 0,
    'status' => 0,
    'id' => 0,
    'result_per_page' => 0,
    'tran_no_product_found' => 0,
    'tran_select_product' => 0,
    'product_image_details' => 0,
    'product_name' => 0,
    'tran_select_image' => 0,
    'tran_kb' => 0,
    'tran_Allowed_types_are_gif_jpg_png_jpeg_JPG' => 0,
    'tran_upload' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb72c1d8837')) {function content_55bb72c1d8837($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_product_identifying_number']->value;?>
</span>
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_product_name']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_product_amount']->value;?>
</span>
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_product_pair_value']->value;?>
</span>
    <span id="validate_msg"><?php echo $_smarty_tpl->tpl_vars['tran_enter_digits_only']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
    <span id="nofond"><?php echo $_smarty_tpl->tpl_vars['tran_nofond']->value;?>
</span>
    <span id="showing"><?php echo $_smarty_tpl->tpl_vars['tran_showing']->value;?>
</span>
    <span id="to"><?php echo $_smarty_tpl->tpl_vars['tran_to']->value;?>
</span>
    <span id="of"><?php echo $_smarty_tpl->tpl_vars['tran_of']->value;?>
</span>
    <span id="entries"><?php echo $_smarty_tpl->tpl_vars['tran_entries']->value;?>
</span>
    <span id="notavailable"><?php echo $_smarty_tpl->tpl_vars['tran_notavailable']->value;?>
</span>
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_digits_only']->value;?>
</span>
    <span id="confirm_msg_inactivate"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_inactivate_this_Product_There_is_NO_undo']->value;?>
</span>
    <span id="confirm_msg_edit"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_edit_this_Product_There_is_NO_undo']->value;?>
</span>
    <span id="confirm_msg_activate"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo']->value;?>
</span>
    <input type="hidden" id="path_root" name="path_root" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
">
    <span id="validate_msg_img1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_product_name']->value;?>
</span>
    <span id="validate_msg_img2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_product_image']->value;?>
</span>
</div>




<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_product_management']->value;?>

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


                <div class="tabbable ">
                    <ul id="myTab3" class="nav nav-tabs tab-green">
                        <li class="<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
">
                            <a href="#panel_tab4_example1" data-toggle="tab">
                                <i class="pink fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['tran_manage_product']->value;?>

                            </a>
                        </li>
                        <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                            <a href="#panel_tab4_example2" data-toggle="tab">
                                <i class="blue fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['tran_add_product_image']->value;?>

                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
" id="panel_tab4_example1">



                            <form role="form" class="smart-wizard form-horizontal" id="proadd" name="proadd" method="post">
                                <div class="panel panel-default">

                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_manage_product']->value;?>

                                    </div> 
                                    <div class="panel-body">               

                                        <div class="col-md-12">
                                            <div class="errorHandler alert alert-danger no-display">
                                                <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="prod_name"><?php echo $_smarty_tpl->tpl_vars['tran_name_of_the_product']->value;?>
:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="1" type="text" name="prod_name" id="prod_name" size="20" value="<?php echo $_smarty_tpl->tpl_vars['pr_name']->value;?>
" 
                                                       title=""/>  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="product_id"><?php echo $_smarty_tpl->tpl_vars['tran_product_id']->value;?>
: <font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="2" type="text" name="product_id" id="product_id" size="20" value="<?php echo $_smarty_tpl->tpl_vars['pr_id_no']->value;?>
" 
                                                       title=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="product_amount"><?php echo $_smarty_tpl->tpl_vars['tran_product_amount']->value;?>
:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="3" type="text" name="product_amount" id="product_amount" size="20" value="<?php echo $_smarty_tpl->tpl_vars['pr_value']->value;?>
" 
                                                       title="<?php echo $_smarty_tpl->tpl_vars['tran_Actual_amount_of_the_product']->value;?>
"/>
                                                <span id="errmsg1"></span>
                                            </div>

                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['paln_mlm']->value!='Board'){?>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="pair_value"><?php echo $_smarty_tpl->tpl_vars['tran_pair_value']->value;?>
:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="4" type="text" name="pair_value" id="pair_value" size="20" value="<?php echo $_smarty_tpl->tpl_vars['pair_value']->value;?>
" 
                                                       title="<?php echo $_smarty_tpl->tpl_vars['tran_product_pair_value']->value;?>
"/>
                                                <span id="errmsg2"></span>
                                            </div>


                                        </div>
                                        <?php }?>
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label" for="bonus_status"><?php echo $_smarty_tpl->tpl_vars['tran_Participation_bonus_status']->value;?>
<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                            
                                              <input type="radio" name="bonus_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['participation_bonus_status']->value=='yes'){?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['tran_yes']->value;?>

                                              <input type="radio" name="bonus_status" value="no" <?php if ($_smarty_tpl->tpl_vars['participation_bonus_status']->value=='no'){?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>


                                                <span id="errmsg1"></span>
                                            </div>

                                        </div>
                                        <!--  <div class="form-group">
                                              <label class="col-sm-4 control-label" for="product_amount">Product BV:<font color="#ff0000">*</font></label>
                                              <div class="col-sm-3">
         <input tabindex="5" type="text" name="bv_value" id="bv_value" size="20" value="<?php echo $_smarty_tpl->tpl_vars['bv_value']->value;?>
" 
                                                 title="Enter BV Value"/>
                                              </div>
                                          </div>-->
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-4">


                                                <?php if ($_smarty_tpl->tpl_vars['action']->value=="edit"){?>
                                                    <input type="hidden" name="prod_id" id="prod_id" size="35" value="<?php echo $_smarty_tpl->tpl_vars['pr_id']->value;?>
"/>
                                                    <button class="btn btn-bricky" type="submit" name="update_prod"  id="update Product" value="update Product" tabindex=""><?php echo $_smarty_tpl->tpl_vars['tran_update_Product']->value;?>
</button>

                                                <?php }else{ ?>
                                                    <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/">
                                                    <button class="btn btn-bricky" type="submit" name="submit_prod"  id="submit_prod" value="add product" tabindex="5"><?php echo $_smarty_tpl->tpl_vars['tran_add_product']->value;?>
</button>

                                                <?php }?>

                                           <!-- <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/"> -->
                                                <!--<button class="btn btn-bricky" type="submit" name="submit_prod"  id="submit_prod" value="add product" tabindex="4">Add product</button> -->

                                            </div>

                                        </div>
                                        <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                                    </div>
                                </div>
                            </form>




                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_product_available']->value;?>

                                </div> 
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                        </div>
                                    </div>
                                    <form role="form" class="smart-wizard form-horizontal" id="proad" name="proad" method="post">



                                        <div class="form-group">
                                            <!-- <label class="col-sm-2 control-label" for="service"> </label>-->
                                            <div class="col-sm-3">

                                                <input tabindex="6" type="radio" id="status_active" name="pro_status" value="yes" checked <?php if ($_smarty_tpl->tpl_vars['sub_status']->value=='yes'){?>checked='1'<?php }?> /><label for="val"></label><?php echo $_smarty_tpl->tpl_vars['tran_active_product']->value;?>
</div>

                                            <div class="col-sm-3">
                                                <input tabindex="7" type="radio" name="pro_status" id="status_inactive" value="no" <?php if ($_smarty_tpl->tpl_vars['sub_status']->value=='no'){?>checked='1'<?php }?> /><label for="valid"></label><?php echo $_smarty_tpl->tpl_vars['tran_inactive_product']->value;?>
</div>



                                            <div class="col-sm-2 col-sm-offset-2">

                                                <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/">
                                                <button class="btn btn-bricky" type="submit" name="refine"  id="refine" value="add product" tabindex="8"><?php echo $_smarty_tpl->tpl_vars['tran_refine']->value;?>
</button>

                                            </div>
                                        </div>
                                        <?php if (count($_smarty_tpl->tpl_vars['product_details']->value)!=0){?>

                                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                                <thead>
                                                    <tr class="th" align="center">
                                                        <th>No</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_product_id']->value;?>
</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_product_name']->value;?>
</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_product_amount']->value;?>
</th>
                                                        <!--<th>BV Value</th>-->
                                                        <?php if ($_smarty_tpl->tpl_vars['paln_mlm']->value!='Board'){?>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_pair_value']->value;?>
</th>
                                                        <?php }?>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_product_status']->value;?>
</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['tran_action']->value;?>
</th>

                                                    </tr>
                                                </thead>


                                                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                                                <tbody>

                                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                                        <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>

                                                        <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                                            <?php $_smarty_tpl->tpl_vars['clr'] = new Smarty_variable('tr1', null, 0);?>
                                                        <?php }else{ ?>
                                                            <?php $_smarty_tpl->tpl_vars['clr'] = new Smarty_variable('tr2', null, 0);?>
                                                        <?php }?>
                                                        <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['product_id']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['product_name']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["active"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['active']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["date"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['date_of_insertion']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["prod_id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['prod_id']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["prod_value"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['product_value']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["prod_bv"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['prod_bv']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["pair_value"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['pair_value']), null, 0);?>

                                                        <?php if ($_smarty_tpl->tpl_vars['active']->value=='yes'){?>
                                                            <?php $_smarty_tpl->tpl_vars['status'] = new Smarty_variable($_smarty_tpl->tpl_vars['tran_active']->value, null, 0);?>
                                                        <?php }else{ ?>
                                                            <?php $_smarty_tpl->tpl_vars['status'] = new Smarty_variable($_smarty_tpl->tpl_vars['tran_inactive']->value, null, 0);?>
                                                        <?php }?>


                                                        <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="center" >
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['prod_id']->value;?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['prod_value']->value;?>
</td>
                                                            <!--<td><?php echo $_smarty_tpl->tpl_vars['prod_bv']->value;?>
</td>-->
                                                            <?php if ($_smarty_tpl->tpl_vars['paln_mlm']->value!='Board'){?>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['pair_value']->value;?>
</td>
                                                            <?php }?>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</td>
                                                            <td>
                                                                <?php if ($_smarty_tpl->tpl_vars['active']->value=='yes'){?>


                                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                        <a href="javascript:edit_prod(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
)" class="btn btn-teal tooltips" data-placement="top" data-original-title="Edit <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><input type="hidden" name="edit_product" id="edit_prod" size="35" />
                                                                            <i class="fa fa-edit"></i></a>


                                                                        <!--Inactivate Product start-->
                                                                        <a href="javascript:inactivate_prod(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
)" onclick=""  class="btn btn-primary tooltips" data-placement="top" data-original-title="Inactivate <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
                                     <span style="display:none" id="error_msg_activate"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_inactivate_this_Product_There_is_NO_undo']->value;?>
</span>
                                                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                                                        </a>
                                                                        <!--Inactivate Product end-->
                                                                    <?php }else{ ?>
                                                                        <!--Activate Product start-->

                                                                        <a href="javascript:activate_prod(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
)" class="btn btn-green tooltips" data-placement="top" data-original-title="Activate <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><i class="glyphicon glyphicon-ok-sign"></i></a>

                                                                        <span style="display:none" id="error_msg_activate"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo']->value;?>
</span>
                                                                        
                                                                        </a>
                                                                        <!--Activate Product end-->
                                                                    <?php }?>                                                                                      
                                                                </div>

                                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                                                        </a>
                                                                        <ul role="menu" class="dropdown-menu pull-right">
                                                                            <li role="presentation">
                                                                                <a role="menuitem"  href="javascript:edit_prod(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
)">
                                                                                    <i class="fa fa-edit"></i> Edit <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

                                                                                </a>
                                                                            </li>
                                                                           
                                                                        </ul>
                                                                    </div>
                                                                </div>



                                                            </td>

                                                        </tr>
                                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                                    <?php } ?>             
                                                </tbody>
                                            </table>
                                                <?php echo $_smarty_tpl->tpl_vars['result_per_page']->value;?>


                                        <?php }else{ ?>
                                            <h3> <?php echo $_smarty_tpl->tpl_vars['tran_no_product_found']->value;?>
</h3>
                                        <?php }?>                   




                                        <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                                    </form>
                                </div>

                            </div>

                        </div>

                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
" id="panel_tab4_example2">

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_add_product_image']->value;?>

                                </div> 
                                <div class="panel-body">


                                    <form role="form" class="smart-wizard form-horizontal" id="product_image_form" name="product_image_form" enctype="multipart/form-data" method="post">

                                        <div class="col-md-12">
                                            <div class="errorHandler alert alert-danger no-display">
                                                <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="product_id"><?php echo $_smarty_tpl->tpl_vars['tran_select_product']->value;?>
:<font color="#ff0000">*</font></label>



                                            <div class="col-sm-6">                      
                                                <select name="product_id" id="product_id_img" tabindex="9"  class="form-control">
                                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_product']->value;?>
</option>
                                                    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_image_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
                                                        <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['i']->value['product_id']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["product_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['i']->value['product_name']), null, 0);?>
                                                        <?php $_smarty_tpl->tpl_vars["prod_id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['i']->value['prod_id']), null, 0);?>

                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['prod_id']->value;?>
--<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
</option>
                                                    <?php } ?>
                                                </select>     

                                            </div>          

                                        </div>
                                        <!--  <div class="row">
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label" for="userfile"><?php echo $_smarty_tpl->tpl_vars['tran_select_image']->value;?>
:<font color="#ff0000">*</font></label>
                                        <div class="row">
                                 <div class="col-md-9">  
                                        <div class="user-edit-image-buttons">
                                         <input type="file" id="userfile" name="userfile" >
                               
                                 </div>
                                 </div></div>  
                                     </div>
                                          </div>     
                                        -->


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="product_id"> <?php echo $_smarty_tpl->tpl_vars['tran_select_image']->value;?>
:<font color="#ff0000" >*</font></label>
                                            <div class="col-sm-6">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" >
                                                    <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/profile_picture/noproduct.jpg" alt="">
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                                    <div class="user-edit-image-buttons">
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> <?php echo $_smarty_tpl->tpl_vars['tran_select_image']->value;?>
</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                                            <input type="file" id="userfile" name="userfile" tabindex="10">
                                                        </span><br/><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tran_kb']->value;?>
(<?php echo $_smarty_tpl->tpl_vars['tran_Allowed_types_are_gif_jpg_png_jpeg_JPG']->value;?>
)
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i>Remove
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky" name="upload" id="upload" value="upload" tabindex="11">
                                                    <?php echo $_smarty_tpl->tpl_vars['tran_upload']->value;?>

                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        ValidateUser.init();

    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
  

<?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-11 06:25:10
         compiled from "application/views/admin/epin/search_epin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85517888555c9db96df3c88-21852228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f4a17f30ffe1a69a3569dfe6aba677f2fe20637' => 
    array (
      0 => 'application/views/admin/epin/search_epin.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85517888555c9db96df3c88-21852228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_please_enter_any_keyword_like_pin_number_or_pin_id' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_search_pin_numbers' => 0,
    'tran_errors_check' => 0,
    'tran_search_pin' => 0,
    'flag' => 0,
    'count' => 0,
    'tran_no' => 0,
    'tran_epin' => 0,
    'tran_pin_amount' => 0,
    'tran_pin_balance_amount' => 0,
    'tran_status' => 0,
    'tran_allocated_user' => 0,
    'tran_uploaded_date' => 0,
    'tran_expiry_date' => 0,
    'details' => 0,
    'i' => 0,
    'tran_active' => 0,
    'tran_inactive' => 0,
    'tran_your_account_have_no_active_epin' => 0,
    'tran_amount' => 0,
    'tran_select_amount' => 0,
    'amount_details' => 0,
    'v' => 0,
    'flag1' => 0,
    'count1' => 0,
    'j' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c9db96f02f5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9db96f02f5')) {function content_55c9db96f02f5($_smarty_tpl) {?><div id="span_js_messages" style="display: none;">
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_any_keyword_like_pin_number_or_pin_id']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
</div>   
<div class="panel panel-default">

    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_search_pin_numbers']->value;?>

    </div> 
    <div class="panel-body">

        <form role="form" class="smart-wizard form-horizontal" id="product_image_form" name="product_image_form" enctype="multipart/form-data" method="post">

            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label" for="keyword"><?php echo $_smarty_tpl->tpl_vars['tran_search_pin']->value;?>
:</label>
                <div class="col-sm-3">
                    <input tabindex="1" type="text" name="keyword" id="keyword" size="20" value=""  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event,'epin')"  
                           title=""/>
                </div>
            </div> 

            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    <button class="btn btn-bricky" name="search_pin" id="search_pin" value="<?php echo $_smarty_tpl->tpl_vars['tran_search_pin_numbers']->value;?>
" tabindex="2">
                        <?php echo $_smarty_tpl->tpl_vars['tran_search_pin_numbers']->value;?>

                    </button>
                </div>
            </div>


            <br />
            <?php if ($_smarty_tpl->tpl_vars['flag']->value>0){?>
                <?php if ($_smarty_tpl->tpl_vars['count']->value!=0){?>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["j"] = new Smarty_variable(0, null, 0);?>
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">

                        <thead>
                            <tr class="th" align="center">
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_pin_amount']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_pin_balance_amount']->value;?>

                                <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>

                                <th><?php echo $_smarty_tpl->tpl_vars['tran_allocated_user']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_uploaded_date']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>

                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_number'];?>
 </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_amount'];?>
 </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_balance_amount'];?>
 </td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['status']=='yes'){?><?php echo $_smarty_tpl->tpl_vars['tran_active']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['tran_inactive']->value;?>
<?php }?> </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['allocated_user_id'];?>
 </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_uploaded_date'];?>
 </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_expiry_date'];?>
 </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                <?php }else{ ?>
                   <h3> <?php echo $_smarty_tpl->tpl_vars['tran_your_account_have_no_active_epin']->value;?>
</h3>
                <?php }?>
            <?php }?>
        </form>


        <!--/////-->



        <form role="form" class="smart-wizard form-horizontal" id="form" name="form"  method="post">

            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                </div>
            </div>

            <br/>
            <hr/>
            <br/>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="product"><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
:</label>                    
                <div class="col-sm-3">
                    <select name="amount" id="amount"  tabindex="3" class="form-control" >
                        <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_amount']->value;?>
</option>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amount_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</option>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                <?php } ?>
                    </select> 
                </div>
            </div>               


            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    <button class="btn btn-bricky" name="search_pin_pro" id="search_pin_pro" value="upload" tabindex="4">
                        <?php echo $_smarty_tpl->tpl_vars['tran_search_pin_numbers']->value;?>

                    </button>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['flag1']->value>0){?>
                <?php if ($_smarty_tpl->tpl_vars['count1']->value!=0){?>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["j"] = new Smarty_variable(0, null, 0);?>
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">

                        <thead>
                            <tr class="th" align="center">
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_pin_amount']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_pin_balance_amount']->value;?>

                                <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>

                                <th><?php echo $_smarty_tpl->tpl_vars['tran_allocated_user']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_uploaded_date']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>

                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_number'];?>
 </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_amount'];?>
 </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_balance_amount'];?>
 </td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['status']=='yes'){?><?php echo $_smarty_tpl->tpl_vars['tran_active']->value;?>
 <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['tran_inactive']->value;?>
<?php }?> </td>
                                    <td><?php if (!($_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['allocated_user_id'])){?>NA<?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['allocated_user_id'];?>
<?php }?></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_uploaded_date'];?>
 </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail".($_smarty_tpl->tpl_vars['j']->value)]['pin_expiry_date'];?>
 </td>
                                    <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable($_smarty_tpl->tpl_vars['j']->value+1, null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
               <?php }else{ ?>
                   <h3> <?php echo $_smarty_tpl->tpl_vars['tran_your_account_have_no_active_epin']->value;?>
</h3>
                <?php }?>

            <?php }?>

        </form>
    </div>
</div><?php }} ?>
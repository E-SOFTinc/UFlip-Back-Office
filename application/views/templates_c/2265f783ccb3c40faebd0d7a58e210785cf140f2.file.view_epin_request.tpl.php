<?php /* Smarty version Smarty 3.1.4, created on 2015-08-13 02:23:26
         compiled from "application/views/admin/epin/view_epin_request.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68540175155cc45ee66ee99-92894198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2265f783ccb3c40faebd0d7a58e210785cf140f2' => 
    array (
      0 => 'application/views/admin/epin/view_epin_request.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68540175155cc45ee66ee99-92894198',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_please_enter_your_company_name' => 0,
    'tran_please_type_your_comments' => 0,
    'tran_please_type_your_phone_no' => 0,
    'tran_please_type_your_time_to_call' => 0,
    'tran_please_type_your_e_mail_id' => 0,
    'tran_please_select_at_least_one_checkbox' => 0,
    'tran_sure_you_want_to_delete_this_feedback_there_is_no_undo' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_view_epin_request' => 0,
    'pin_detail_arr' => 0,
    'arr_length' => 0,
    'tran_no' => 0,
    'tran_user_name' => 0,
    'tran_requested_pin_count' => 0,
    'tran_amount' => 0,
    'tran_date' => 0,
    'tran_expiry_date' => 0,
    'tran_count' => 0,
    'tran_check' => 0,
    'i' => 0,
    'class' => 0,
    'k' => 0,
    'v' => 0,
    'result_per_page' => 0,
    'tran_allocate' => 0,
    'tran_no_epin_request_found' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55cc45ee7a225',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55cc45ee7a225')) {function content_55cc45ee7a225($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_comments']->value;?>
</span>        
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_phone_no']->value;?>
</span>        
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_time_to_call']->value;?>
</span>                  
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_e_mail_id']->value;?>
</span>
    <span id="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_please_select_at_least_one_checkbox']->value;?>
</span> 
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>
    <span id="confirm_msg"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_feedback_there_is_no_undo']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_view_epin_request']->value;?>

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

                    <?php $_smarty_tpl->tpl_vars["arr_length"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['pin_detail_arr']->value), null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['arr_length']->value>0){?>


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_requested_pin_count']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
</th>

                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_count']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_check']->value;?>
</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("0", null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["k"] = new Smarty_variable("1", null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pin_detail_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr1', null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr2', null, 0);?>
                                    <?php }?>


                                    <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="center" >
                                        <td><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_count'];?>
<input type="hidden" name='rem_count<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' id='rem_count<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pin_count'];?>
"/></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
<input type="hidden" name='amount<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' id='amount<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value="<?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
"/></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['req_date'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['expiry_date'];?>
<input type="hidden" name='expiry_date<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' id='expiry_date<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value="<?php echo $_smarty_tpl->tpl_vars['v']->value['expiry_date'];?>
"/></td>

                                        <td><b></b><input name='count<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' id='count<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' type='text'  size='4' maxlength='50'  value='<?php echo $_smarty_tpl->tpl_vars['v']->value['rem_count'];?>
' /></td>



                                        <td><input  name='active<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' id='activate<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' type="checkbox" value="yes" class="active"><label for="activate<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" ></label>
                                            <input type='hidden' id="id<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name='id<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['req_id'];?>
'/><input type='hidden' name='user_id<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
'/>
                                            <input type='hidden' name='product<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['product_id'];?>
'></td>
                                    </tr>
                                    <?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value+1, null, 0);?>
                                <?php } ?> 


                            <div class="form-group">
                                <input  type="hidden"  name="total_count" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" >


                            </div>


                            </tbody>

                        </table>
                                <?php echo $_smarty_tpl->tpl_vars['result_per_page']->value;?>

                        <div class="col-sm-12">
                            <input class="btn btn-bricky pull-right" type="submit"  name="allocate" id="allocate"  value='<?php echo $_smarty_tpl->tpl_vars['tran_allocate']->value;?>
' tabindex="1" >

                        </div>
                    <?php }else{ ?>
                        <h4 align="center"><font color="#FF0000"> <?php echo $_smarty_tpl->tpl_vars['tran_no_epin_request_found']->value;?>
</font></h3>
                        <?php }?>  

                </form>
            </div>
        </div>
    </div>
</div>          


<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();

        ValidateEpinRequest.init();
        ValidateUser.init();
        DateTimePicker.init();
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
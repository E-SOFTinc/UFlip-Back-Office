<?php /* Smarty version Smarty 3.1.4, created on 2015-08-11 06:25:10
         compiled from "application/views/admin/epin/epin_management.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183944030355c9db96be1fc2-99294974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4594546d4ed6826acd35e62d59eb4d6d50a07e67' => 
    array (
      0 => 'application/views/admin/epin/epin_management.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183944030355c9db96be1fc2-99294974',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_select_an_amount' => 0,
    'tran_you_must_enter_count' => 0,
    'tran_you_must_select_a_product_name' => 0,
    'tran_you_must_enter_your_product_amount' => 0,
    'tran_please_enter_any_keyword_like_pin_number_or_pin_id' => 0,
    'tran_You_must_select_a_date' => 0,
    'tran_past_expiry_date' => 0,
    'tran_enter_digits_only' => 0,
    'tran_digits_only' => 0,
    'tran_Sure_you_want_to_delete_this_Product_There_is_NO_undo' => 0,
    'tran_Sure_you_want_to_edit_this_Product_There_is_NO_undo' => 0,
    'tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'tran_you_must_select_a_product_image' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_epin_management' => 0,
    'tab1' => 0,
    'tran_add_new_epin' => 0,
    'tab2' => 0,
    'tran_search_epin' => 0,
    'un_allocated_pin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c9db96c8bb8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9db96c8bb8')) {function content_55c9db96c8bb8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_an_amount']->value;?>
</span> 
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_count']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_product_name']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_product_amount']->value;?>
</span>
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_any_keyword_like_pin_number_or_pin_id']->value;?>
</span>
    <span id ="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_select_a_date']->value;?>
</span>
    <span id ="error_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_past_expiry_date']->value;?>
</span>
    <span id="validate_msg"><?php echo $_smarty_tpl->tpl_vars['tran_enter_digits_only']->value;?>
</span>
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_digits_only']->value;?>
</span>
    <span id="confirm_msg_delete"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_delete_this_Product_There_is_NO_undo']->value;?>
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
    
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
    
    
</div>




<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_epin_management']->value;?>

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
                                <i class="pink fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['tran_add_new_epin']->value;?>

                            </a>
                        </li>
                        <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                            <a href="#panel_tab4_example2" data-toggle="tab">
                                <i class="blue fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['tran_search_epin']->value;?>

                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
" id="panel_tab4_example1">
                            <p>
                                <?php echo $_smarty_tpl->getSubTemplate ("admin/epin/generate_epin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

                            </p>
                        </div>

                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
" id="panel_tab4_example2">
                            <p>
                                <?php echo $_smarty_tpl->getSubTemplate ("admin/epin/search_epin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

                            </p>
                        </div>

                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['un_allocated_pin']->value>0){?>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            TableData.init();
            DatePicker.init();  
            ValidateUser.init();

        });
    </script>
<?php }else{ ?>
    <script>
        jQuery(document).ready(function() {
            Main.init();
           TableData.init();
           DatePicker.init();  
            ValidateUser.init();

        });
    </script>    
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }} ?>
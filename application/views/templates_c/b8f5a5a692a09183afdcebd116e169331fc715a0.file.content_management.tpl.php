<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:39:01
         compiled from "application/views/admin/configuration/content_management.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71769930855bba4a5552d88-44640134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8f5a5a692a09183afdcebd116e169331fc715a0' => 
    array (
      0 => 'application/views/admin/configuration/content_management.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71769930855bba4a5552d88-44640134',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_company_name' => 0,
    'tran_you_must_company_address' => 0,
    'tran_you_must_enter_main_matter' => 0,
    'tran_you_must_enter_product_matter' => 0,
    'tran_you_must_enter_place' => 0,
    'tran_you_must_select_a_logo' => 0,
    'tran_content_management' => 0,
    'tran_errors_check' => 0,
    'tab1' => 0,
    'tran_welcome_letter' => 0,
    'tab2' => 0,
    'tran_terms' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba4a55dab6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba4a55dab6')) {function content_55bba4a55dab6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_company_name']->value;?>
</span>
    <span id="validate_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_company_address']->value;?>
</span>
    <span id="validate_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_main_matter']->value;?>
</span>
    <span id="validate_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_product_matter']->value;?>
</span>
    <span id="validate_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_place']->value;?>
</span>
    <!--<span id="validate_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_logo']->value;?>
</span>-->
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_content_management']->value;?>

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
            <div class="panel-body"  >
                <form role="form" class="smart-wizard form-horizontal" name= 'form_setting'  id='form_setting' method ='post' enctype="multipart/form-data" >
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
                                <a href="#panel_tab3_example1" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_welcome_letter']->value;?>
</a>
                            </li>
                            <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                                <a href="#panel_tab3_example2" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['tran_terms']->value;?>
</a>
                            </li>

                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane in <?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
" id="panel_tab3_example1">
                                <?php echo $_smarty_tpl->getSubTemplate ("admin/configuration/letter_config.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

                            </div>
                            <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
" id="panel_tab3_example2">
                                <?php echo $_smarty_tpl->getSubTemplate ("admin/configuration/termsconditions_config.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

                            </div>

                        </div> 
                    </div> 
                </form>

            </div> 
        </div> 
    </div> 
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
    Main.init();               
    //ValidateContentManagement.init();
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
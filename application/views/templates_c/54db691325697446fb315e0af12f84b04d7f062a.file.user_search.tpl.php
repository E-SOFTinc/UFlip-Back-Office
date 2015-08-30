<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:36:54
         compiled from "application/views/admin/profile/user_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72728591355bba426d586d1-44326362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54db691325697446fb315e0af12f84b04d7f062a' => 
    array (
      0 => 'application/views/admin/profile/user_search.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72728591355bba426d586d1-44326362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_header' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_name' => 0,
    'tran_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba426d85c1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba426d85c1')) {function content_55bba426d85c1($_smarty_tpl) {?><div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['page_header']->value;?>

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
            <div class="row">
                <div class="col-sm-12">                   
                    <div class="panel-body">
                        <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_name"> <?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
<font color="#ff0000" >*</font> </label>
                                <div class="col-sm-3">
                                    <input  name="user_name" id="user_name" type="text" size="30" onkeyup="ajax_showOptions(this, 'getCountriesByLetter', event)" autocomplete="off" tabindex="1">
                                    <span class="help-block" for="user_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <button class="btn btn-bricky" type="submit" id="user_details" value="user_details" name="user_details" tabindex="2">
                                        <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-11 10:33:22
         compiled from "application/views/admin/select_report/admin_profile_report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104593259355c0676b1137b1-24775903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9a5e2dcdcb518c49f6315cd895ac62eae92db10' => 
    array (
      0 => 'application/views/admin/select_report/admin_profile_report.tpl',
      1 => 1439275581,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104593259355c0676b1137b1-24775903',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c0676b1fab8',
  'variables' => 
  array (
    'tran_You_must_enter_user_name' => 0,
    'tran_you_must_enter_a_valid_user_name' => 0,
    'tran_you_must_enter_count' => 0,
    'tran_digits_only' => 0,
    'tran_you_must_enter_count_from' => 0,
    'tran_profile_report' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_name' => 0,
    'tran_view' => 0,
    'tran_enter_count' => 0,
    'tran_enter_count_start_from' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c0676b1fab8')) {function content_55c0676b1fab8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display:none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_user_name']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_a_valid_user_name']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_count']->value;?>
</span>
    <span id="error_msg9"><?php echo $_smarty_tpl->tpl_vars['tran_digits_only']->value;?>
</span>
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_count_from']->value;?>
</span>
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_count']->value;?>
</span>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    <?php echo $_smarty_tpl->tpl_vars['tran_profile_report']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="searchform" id="searchform" target='_blank' action="../report/profile_report_view" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">
                            <?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
 <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="1" type="text"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" id="user_name" name="user_name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="2"   type="submit" id="profile_update" name="profile_update" value="<?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
"  > <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    <?php echo $_smarty_tpl->tpl_vars['tran_profile_report']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal"  name="searchform1" id="searchform1" target='_blank' action="../report/profile_report" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count">
                            <?php echo $_smarty_tpl->tpl_vars['tran_enter_count']->value;?>
<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="3" type = "text" name = "count" id = "count">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="4"   type="submit" id="profile" name="profile" value="<?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
"  > <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
</button> 

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    <?php echo $_smarty_tpl->tpl_vars['tran_profile_report']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal"   name="from_to_form" id="from_to_form" method="post" target='_blank' action="../report/profile_report">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count_from">
                            <?php echo $_smarty_tpl->tpl_vars['tran_enter_count_start_from']->value;?>
<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="5" type = "text" name = "count_from" id = "count_from">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count_to">
                            <?php echo $_smarty_tpl->tpl_vars['tran_enter_count']->value;?>
<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input tabindex="6" type = "text" name = "count_to" id = "count_to">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="7"   type="submit" name="profile_from" id="profile_from" value="<?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
"  > <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>
</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("../layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateUser.init();

    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-07 23:16:36
         compiled from "application/views/admin/income_details/income.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77745128555c582a44f5a14-21731139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53364d4636327897372ee7004610759480fe6265' => 
    array (
      0 => 'application/views/admin/income_details/income.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77745128555c582a44f5a14-21731139',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_select_user_id' => 0,
    'tran_please_type_your_comments' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_select_user' => 0,
    'tran_errors_check' => 0,
    'tran_type_members_name' => 0,
    'tran_view' => 0,
    'amount' => 0,
    'tran_income_details' => 0,
    'posted_user_name' => 0,
    'tran_no' => 0,
    'tran_user_name' => 0,
    'tran_from' => 0,
    'tran_Amount_Type' => 0,
    'tran_amount' => 0,
    'i' => 0,
    'v' => 0,
    'tran_binary' => 0,
    'class' => 0,
    'tran_Amount_Total' => 0,
    'u_id' => 0,
    'tran_no_details_found' => 0,
    'tran_Username_not_Exists' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c582a464ed0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c582a464ed0')) {function content_55c582a464ed0($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_id']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_comments']->value;?>
</span>        
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>

</div> 
<?php if (!isset($_POST['income_details_view'])){?>
    <div class="row" >
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_select_user']->value;?>
 
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
                    <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_id']->value;?>
<span class="symbol required"></span></label>
                            <div class="col-sm-3">
                                <input placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_type_members_name']->value;?>
" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" tabindex="1" >

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-bricky" type="submit" id="profile_update" value="profile_update" name="profile_update" tabindex="2">
                                    <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/profile/user_summary_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<!-- end: PAGE CONTENT -->
<?php if (count($_smarty_tpl->tpl_vars['amount']->value)!=0){?>    
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
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
                    <?php echo $_smarty_tpl->tpl_vars['tran_income_details']->value;?>
 : <?php echo $_smarty_tpl->tpl_vars['posted_user_name']->value;?>

                </div>
                <div class="panel-body">
                    <form role="form" class="smart-wizard form-horizontal" method="post"  name="feedback_form" id="feedback_form" >
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                            </div>
                        </div>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable("0", null, 0);?>


                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('', null, 0);?>


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_from']->value;?>
</th>

                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_Amount_Type']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr2", null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable("tr1", null, 0);?>
                                    <?php }?>		
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['v']->value['amount_type']=='leg'){?>
                                        <?php $_smarty_tpl->createLocalArrayVariable('v', null, 0);
$_smarty_tpl->tpl_vars['v']->value['amount_type'] = $_smarty_tpl->tpl_vars['tran_binary']->value;?>
                                    <?php }?>

                                    <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="left" >
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['from_id'];?>
</td>

                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount_type'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount_payable'];?>
</td>

                                    </tr>
                                <?php } ?>
                                <tr><td colspan="4" style="text-align: right;font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['tran_Amount_Total']->value;?>
</td><td style="text-align: left;font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['v']->value['tot_amount'];?>
</td></tr>
                            </tbody>
                        </table>


                    </form>

                </div>
            </div>
        </div>
    </div>
<?php }elseif(isset($_POST)&&isset($_POST['user_name'])){?>                            
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
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
                    <?php echo $_smarty_tpl->tpl_vars['tran_income_details']->value;?>

                </div>
                <div class="panel-body">
                    <form role="form" class="smart-wizard form-horizontal" method="post"  name="feedback_form" id="feedback_form" >
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['u_id']->value!=''){?>
                            <h4 align="center"> <?php echo $_smarty_tpl->tpl_vars['tran_no_details_found']->value;?>
</h4>
                        <?php }else{ ?>
                            <h4 align="center"><font color="#FF0000"><?php echo $_smarty_tpl->tpl_vars['tran_Username_not_Exists']->value;?>
</font></h4>
                            <?php }?>



                    </form>

                </div>
            </div>
        </div>
    </div>                          

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
                                    jQuery(document).ready(function() {
                                        Main.init();
                                        //TableData.init();
                                        ValidateUser.init();

                                    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
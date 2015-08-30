<?php /* Smarty version Smarty 3.1.4, created on 2015-08-14 00:07:10
         compiled from "application/views/user/epin/my_epin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134206215855cd777e57f0b5-09322402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a44d30492810b91d9ce5884ef55d71cae27c76d' => 
    array (
      0 => 'application/views/user/epin/my_epin.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134206215855cd777e57f0b5-09322402',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_epins' => 0,
    'pro_status' => 0,
    'tran_no' => 0,
    'tran_amount' => 0,
    'tran_balance_amount' => 0,
    'tran_used_user' => 0,
    'tran_status' => 0,
    'tran_uploaded_date' => 0,
    'tran_expiry_date' => 0,
    'pin_numbers' => 0,
    'i' => 0,
    'v' => 0,
    'tran_NULL' => 0,
    'tran_active' => 0,
    'tran_expired' => 0,
    'tran_used' => 0,
    'class' => 0,
    'used_user' => 0,
    'stat' => 0,
    'tran_no_epin_found' => 0,
    'page_footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55cd777e6b785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55cd777e6b785')) {function content_55cd777e6b785($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>

</div> 


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_epins']->value;?>

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
                <form class="niceform" name="upload" id="upload" method="post" action="" <?php if ($_smarty_tpl->tpl_vars['pro_status']->value=="yes"){?> onSubmit="return validate_passcode_add_forprod(this);" <?php }else{ ?> 
                      onSubmit="return validate_passcode_add_outprod(this);" <?php }?>>


                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            <tr class="th" align="center">
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_epins']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_balance_amount']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_used_user']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_uploaded_date']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_expiry_date']->value;?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($_smarty_tpl->tpl_vars['pin_numbers']->value)!=0){?>

                                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pin_numbers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>

                                    <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>

                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr1', null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr2', null, 0);?>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['v']->value['used_user']==''){?>

                                        <?php $_smarty_tpl->tpl_vars["used_user"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_NULL']->value), null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars["used_user"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['used_user']), null, 0);?>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['v']->value['status']=="yes"){?>

                                        <?php $_smarty_tpl->tpl_vars["stat"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_active']->value), null, 0);?>

                                    <?php }elseif($_smarty_tpl->tpl_vars['v']->value['status']=="expired"){?>

                                        <?php $_smarty_tpl->tpl_vars["stat"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_expired']->value), null, 0);?>

                                    <?php }else{ ?>

                                        <?php $_smarty_tpl->tpl_vars["stat"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_used']->value), null, 0);?>
                                    <?php }?>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

                                    <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="center" >

                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pin'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_amount'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_balance_amount'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['used_user']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['stat']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_uploded_date'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pin_expiry_date'];?>
</td>
                                    </tr>
                                <?php } ?>                
                            </tbody>
                        <?php }else{ ?>
                            <h3> <?php echo $_smarty_tpl->tpl_vars['tran_no_epin_found']->value;?>
</h3>
                        <?php }?>
                    </table>
                    <?php echo $_smarty_tpl->tpl_vars['page_footer']->value;?>



                </form>
            </div>
        </div>
    </div>
</div>          


<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        // ValidateUser.init();
        // DateTimePicker.init();
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
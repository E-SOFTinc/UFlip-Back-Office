<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 03:45:18
         compiled from "application/views/user/configuration/my_referal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184467034655c5c19ec7bdd8-34506893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23a4225b36df08736f9ade45e8cdc894e17f619c' => 
    array (
      0 => 'application/views/user/configuration/my_referal.tpl',
      1 => 1438428962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184467034655c5c19ec7bdd8-34506893',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_please_enter_your_company_name' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_nofond' => 0,
    'tran_showing' => 0,
    'tran_to' => 0,
    'tran_of' => 0,
    'tran_entries' => 0,
    'tran_notavailable' => 0,
    'tran_sure_you_want_to_delete_this_feedback_there_is_no_undo' => 0,
    'tran_users_referal_details' => 0,
    'count' => 0,
    'tran_sl_no' => 0,
    'tran_user_name' => 0,
    'tran_full_name' => 0,
    'tran_joinig_date' => 0,
    'trans_email' => 0,
    'trans_country' => 0,
    'arr' => 0,
    'i' => 0,
    'class' => 0,
    'v' => 0,
    'tran_no_referels' => 0,
    'result_per_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c5c19ed36ec',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c5c19ed36ec')) {function content_55c5c19ed36ec($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
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
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>
    <span id="confirm_msg"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_feedback_there_is_no_undo']->value;?>
</span>
</div> 



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
                </div>  <?php echo $_smarty_tpl->tpl_vars['tran_users_referal_details']->value;?>
             

            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">

                    <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
                        <thead>
                            <tr class="th" align="center">
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_sl_no']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_joinig_date']->value;?>
</th>
                                <th> <?php echo $_smarty_tpl->tpl_vars['trans_email']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['trans_country']->value;?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("0", null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                    <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['join_date'];?>
</td>
                                    <td> <?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['country'];?>
</td>
                                </tr>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                            <?php } ?>
                        <?php }else{ ?> 
                        <h3><?php echo $_smarty_tpl->tpl_vars['tran_no_referels']->value;?>
</h3>
                    <?php }?>
                    </tbody>
                </table>
                    <?php echo $_smarty_tpl->tpl_vars['result_per_page']->value;?>



            </div>
        </div>
    </div>
</div>          


<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        ValidateUser.init();
        DateTimePicker.init();
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 03:45:04
         compiled from "application/views/user/configuration/user_purchase_history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85018323055bf5430d5b001-55872718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2152668761868190c8dfd30e6ac30410503094ee' => 
    array (
      0 => 'application/views/user/configuration/user_purchase_history.tpl',
      1 => 1438687309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85018323055bf5430d5b001-55872718',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bf5430e1f5a',
  'variables' => 
  array (
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_nofond' => 0,
    'tran_showing' => 0,
    'tran_to' => 0,
    'tran_of' => 0,
    'tran_entries' => 0,
    'tran_notavailable' => 0,
    'tran_users_purchase_details' => 0,
    'count' => 0,
    'tran_sl_no' => 0,
    'tran_invoice' => 0,
    'tran_transaction_id' => 0,
    'tran_joinig_date' => 0,
    'tran_type' => 0,
    'tran_amount' => 0,
    'tran_count' => 0,
    'tran_total_amount' => 0,
    'purchase_histroy' => 0,
    'count_total' => 0,
    'v' => 0,
    'amount_total' => 0,
    'grand_total' => 0,
    'total' => 0,
    'tran_total' => 0,
    'tran_no_referels' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf5430e1f5a')) {function content_55bf5430e1f5a($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="span_js_messages" style="display:none;">
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
                </div>  <?php echo $_smarty_tpl->tpl_vars['tran_users_purchase_details']->value;?>
             

            </div>
            <div class="panel-body">

                <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">


                        <thead>
                            <tr class="th" align="center">
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_sl_no']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_invoice']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_transaction_id']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_joinig_date']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_type']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_count']->value;?>
</th>      
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $_smarty_tpl->tpl_vars["grand_total"] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["amount_total"] = new Smarty_variable('', null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["count_total"] = new Smarty_variable(0, null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchase_histroy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?> 

                                <?php $_smarty_tpl->tpl_vars['count_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_total']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['quantity']*$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['amount_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['amount_total']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['grand_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['grand_total']->value+$_smarty_tpl->tpl_vars['total']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+$_smarty_tpl->tpl_vars['v']->value['quantity'], null, 0);?>
                                <tr class="" align="center" >
                                    <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['invoice_no'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trans_id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date_submission'];?>
</td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['v']->value['type']==''){?>Registration<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
<?php }?></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['quantity'];?>
</td>                         
                                    <td><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td> 
                                </tr>

                            <?php } ?>
                        <tfoot>
                            <tr class='' align='center'>
                                <td colspan="5" align="right"><b><?php echo $_smarty_tpl->tpl_vars['tran_total']->value;?>
 </b></td>
                                <td align="center"><b><?php echo number_format($_smarty_tpl->tpl_vars['amount_total']->value,2);?>
</b></td>                               <td align="center"><b><?php echo number_format($_smarty_tpl->tpl_vars['count']->value);?>
</b></td>    
                                <td align="center"><b><?php echo number_format($_smarty_tpl->tpl_vars['grand_total']->value,2);?>
</b></td>
                            </tr>
                        </tfoot>
                        </tbody>


                    </table>
                <?php }else{ ?> 
                    <h3><?php echo $_smarty_tpl->tpl_vars['tran_no_referels']->value;?>
</h3>
                <?php }?>



            </div>
        </div>
    </div>
</div>     
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>
    jQuery(document).ready(function () {
        Main.init();
        TableData.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
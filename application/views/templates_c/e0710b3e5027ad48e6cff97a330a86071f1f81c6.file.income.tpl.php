<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 02:31:41
         compiled from "application/views/user/income_details/income.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106347634355c5b05db47539-13949020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0710b3e5027ad48e6cff97a330a86071f1f81c6' => 
    array (
      0 => 'application/views/user/income_details/income.tpl',
      1 => 1438686759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106347634355c5b05db47539-13949020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_please_enter_your_company_name' => 0,
    'tran_please_type_your_comments' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_nofond' => 0,
    'tran_showing' => 0,
    'tran_to' => 0,
    'tran_of' => 0,
    'tran_entries' => 0,
    'tran_notavailable' => 0,
    'tran_income_details' => 0,
    'tran_errors_check' => 0,
    'amount' => 0,
    'tran_Sl_no' => 0,
    'tran_user_name' => 0,
    'tran_Amount_Type' => 0,
    'tran_amount' => 0,
    'i' => 0,
    'v' => 0,
    'tran_binary' => 0,
    'class' => 0,
    'tran_Amount_Total' => 0,
    'tran_no_details_found' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c5b05dc8daf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c5b05dc8daf')) {function content_55c5b05dc8daf($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_please_enter_your_company_name']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_please_type_your_comments']->value;?>
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
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable("0", null, 0);?>


                    <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('', null, 0);?>
                    <?php if (count($_smarty_tpl->tpl_vars['amount']->value)>0){?>

                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_Sl_no']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
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
" align="center" >
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['from_id'];?>
</td>
                                      
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount_type'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['amount_payable'];?>
</td>

                                    </tr>
                                <?php } ?>
                                 <tr class="th">
                                    <td  align="right"><b><?php echo $_smarty_tpl->tpl_vars['tran_Amount_Total']->value;?>
 </b></td>
                                    <td align="center"><b></b></td>
                                    <td align="center"><b></b></td>
                                    
                                    <td align="center"><b><?php echo $_smarty_tpl->tpl_vars['v']->value['tot_amount'];?>
</b></td>
                                   
                                </tr>	
                            </tbody>
                        </table>
                    <?php }else{ ?>
                        <h4 align="center"> <?php echo $_smarty_tpl->tpl_vars['tran_no_details_found']->value;?>
</h4>
                    <?php }?>

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

    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
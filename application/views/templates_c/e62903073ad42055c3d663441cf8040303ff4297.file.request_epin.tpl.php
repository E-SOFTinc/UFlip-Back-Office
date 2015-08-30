<?php /* Smarty version Smarty 3.1.4, created on 2015-08-15 01:51:30
         compiled from "application/views/user/epin/request_epin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80182026755cee172e8c7a9-79210381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e62903073ad42055c3d663441cf8040303ff4297' => 
    array (
      0 => 'application/views/user/epin/request_epin.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80182026755cee172e8c7a9-79210381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_select_an_amount' => 0,
    'tran_you_must_enter_count' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_enter_digits_only' => 0,
    'tran_request_epin' => 0,
    'pro_status' => 0,
    'tran_errors_check' => 0,
    'tran_amount' => 0,
    'tran_select_amount' => 0,
    'amount_details' => 0,
    'v' => 0,
    'i' => 0,
    'tran_count' => 0,
    'tran_no_of_epin_generated' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55cee173032eb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55cee173032eb')) {function content_55cee173032eb($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

 <div id="span_js_messages" style="display: none;">
                <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_an_amount']->value;?>
</span>
                <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_count']->value;?>
</span>        
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
                <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_enter_digits_only']->value;?>
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
           <?php echo $_smarty_tpl->tpl_vars['tran_request_epin']->value;?>

            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post" name="upload" id="upload" action=""<?php if ($_smarty_tpl->tpl_vars['pro_status']->value=="yes"){?>onSubmit="return validate_passcode_add_forprod(this);" <?php }else{ ?>
              onSubmit="return validate_passcode_add_outprod(this);" <?php }?> >
                    
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>

                        <div class="form-group">
                <label class="col-sm-2 control-label" for="amount"><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
 <font color="#ff0000">*</font>:</label>
                <div class="col-sm-3">
                    <select name="amount1" id="amount1"  tabindex="11" class="form-control" >
                        <option value=""><?php echo $_smarty_tpl->tpl_vars['tran_select_amount']->value;?>
</option>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['amount_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</option>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                <?php } ?>
                    </select> 
                </div>
            </div>
                     
                  
                        
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="count"><?php echo $_smarty_tpl->tpl_vars['tran_count']->value;?>
 : <font color="#ff0000">*</font></label>
                        <div class="col-sm-6">
                            <input name="count"  id="count" type="text"  value="" title="<?php echo $_smarty_tpl->tpl_vars['tran_no_of_epin_generated']->value;?>
" autocomplete="Off" tabindex="2">
                        </div>
                    </div>

                   

                  


                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="reqpasscode" id="reqpasscode" value="<?php echo $_smarty_tpl->tpl_vars['tran_request_epin']->value;?>
" style="" title="<?php echo $_smarty_tpl->tpl_vars['tran_request_epin']->value;?>
" tabindex="3">
                               <?php echo $_smarty_tpl->tpl_vars['tran_request_epin']->value;?>

                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
                            
                            
            


<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
       // TableData.init();
        ValidateUser.init();
        //DateTimePicker.init();
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-03 04:21:51
         compiled from "application/views/user/product/product_repurchase.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32762706355bf32afac3143-25200426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25eda4a3f1dac6f9dd199f3f9018513ea7c8a5c1' => 
    array (
      0 => 'application/views/user/product/product_repurchase.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32762706355bf32afac3143-25200426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_product_purchase' => 0,
    'BASE_URL' => 0,
    'tran_product' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'products' => 0,
    'error' => 0,
    'tran_product_amount' => 0,
    'tran_product_count' => 0,
    'tran_purchase' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bf32afb6c60',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf32afb6c60')) {function content_55bf32afb6c60($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"></span>

</div>
<style>
    .width-val{ width:651px;}
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_product_purchase']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="form" id="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user/product/product_repurchase">
                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="prodcut_id"><?php echo $_smarty_tpl->tpl_vars['tran_product']->value;?>
:<font color="#ff0000">*</font></label> 
                        <div class="col-sm-3">

                            <select name="product_id" id="product_id" tabindex="4"    class="form-control" onchange="get_product_amount('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
', this.value)">

                                <?php echo $_smarty_tpl->tpl_vars['products']->value;?>


                            </select> 

                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['prodcut_id'])){?><span class='val-error' ><?php echo $_smarty_tpl->tpl_vars['error']->value['prodcut_id'];?>
 </span><?php }?>
                        </div>    
                    </div> 
                    <div class="form-group" id = "prdt_amount" style="display:none">

                        <label class="col-sm-3 control-label" for="product_amount"><?php echo $_smarty_tpl->tpl_vars['tran_product_amount']->value;?>
:<font color="#ff0000">*</font></label> 
                        <div class="col-sm-3">

                            <input type='text' id="product_amount" readonly="true"  name='product_amount' class="form-control">
                        </div>    
                    </div> 
                    <div class="form-group" id = "prdt_count" >

                        <label class="col-sm-3 control-label" for="product_count"><?php echo $_smarty_tpl->tpl_vars['tran_product_count']->value;?>
:<font color="#ff0000">*</font></label> 
                        <div class="col-sm-3">

                            <input type='text' id="product_count" required="required"  name='product_count' class="form-control">
                        </div>    
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3"></label>
                        <button class="btn btn-bricky" type="submit" name="purchase"  id="purchase" value="purchase" tabindex="5"><i class="clip-cart"></i> <?php echo $_smarty_tpl->tpl_vars['tran_purchase']->value;?>
</button>


                    </div>
            </div>

        </div>

        </form>
    </div>
</div>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>


<script>
    jQuery(document).ready(function () {
        Main.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
  

<?php }} ?>
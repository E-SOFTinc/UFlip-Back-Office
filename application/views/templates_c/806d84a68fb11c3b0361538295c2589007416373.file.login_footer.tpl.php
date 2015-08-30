<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 07:21:06
         compiled from "application/views/admin/layout/login_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197018348355bb6832995379-50391132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '806d84a68fb11c3b0361538295c2589007416373' => 
    array (
      0 => 'application/views/admin/layout/login_footer.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197018348355bb6832995379-50391132',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PUBLIC_URL' => 0,
    'ARR_SCRIPT' => 0,
    'v' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb6832a134a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb6832a134a')) {function content_55bb6832a134a($_smarty_tpl) {?><div>
</div>

<!-- For Live Chat -->
<script type="text/javascript">
/*(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://infinitemlmsoftware.com/livehelperchat/remdex-livehelperchat-b8431f1/lhc_web/index.php/chat/getstatus/(position)/bottom_right';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();*/
</script>
<!-- For Live Chat -->
</div>
 
<!--[if lt IE 9]>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/respond.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/iCheck/jquery.icheck.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/less/less-1.5.0.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
javascript/main.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- start: Grid files -->

<!-- end: Grid files -->
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ARR_SCRIPT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['type'], null, 0);?>
               
            <?php if ($_smarty_tpl->tpl_vars['type']->value=="js"){?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
javascript/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" type="text/javascript" ></script>
            <?php }elseif($_smarty_tpl->tpl_vars['type']->value=="css"){?>
                <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
css/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" rel="stylesheet" type="text/css" />
            <?php }elseif($_smarty_tpl->tpl_vars['type']->value=="plugins/js"){?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" type="text/javascript" ></script>
            <?php }elseif($_smarty_tpl->tpl_vars['type']->value=="plugins/css"){?>
                <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
plugins/<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" rel="stylesheet" type="text/css" />
            <?php }?>
       
    <?php } ?>
<script>
   jQuery(document).ready(function() {
    $("#close_link").click(function()
{ 
    $("#message_box").removeClass('ok');
}
)
});
</script><?php }} ?>
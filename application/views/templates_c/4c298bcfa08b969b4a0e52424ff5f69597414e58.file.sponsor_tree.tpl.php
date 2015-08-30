<?php /* Smarty version Smarty 3.1.4, created on 2015-08-11 14:43:49
         compiled from "application/views/user/tree/sponsor_tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138775724055ca5075684f55-50453459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c298bcfa08b969b4a0e52424ff5f69597414e58' => 
    array (
      0 => 'application/views/user/tree/sponsor_tree.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138775724055ca5075684f55-50453459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'tran_you_must_select_user' => 0,
    'tran_sponsor_tree' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55ca50756eb75',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ca50756eb75')) {function content_55ca50756eb75($_smarty_tpl) {?><script>
    
function getSponsorTree(id)
{
    

   $.ajax({

     type: "POST",
     url: '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user/tree/tree_view_sponsor',
      data: { user_id: id }, // appears as $_GET['id'] @ ur backend side
     success: function(data) {
           // data is ur summary
        $('#summary').html(data);
     }

   });

}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>($_smarty_tpl->tpl_vars['Name']->value)), 0);?>


<div id="span_js_messages" style="display:none">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_user']->value;?>
</span>
</div>



<!-- start: GENOLOGY TREE-->                                         
<div class="row">
    <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-sitemap"></i>
                       <?php echo $_smarty_tpl->tpl_vars['tran_sponsor_tree']->value;?>

                    </div>

                    <div class="panel-body" style="overflow: auto;">
                        <button class="zoomIn"><span class="glyphicon glyphicon-zoom-in" style="font-size:20px"></span></button>
                        <button class="zoomOut"><span class="glyphicon glyphicon-zoom-out" style="font-size:20px"></span></button>
                        <button class="zoomOff"><span class="glyphicon glyphicon-off" style="font-size:20px"></span></button>

                        <div id="dsply_tree_zoomable">
                            <div id="summary" class="panel-body tree-container1" style="height:100%;">         
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>

<!-- end: GENOLOGY TREE-->
 

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        getSponsorTree('<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
');
        ValidateUser.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
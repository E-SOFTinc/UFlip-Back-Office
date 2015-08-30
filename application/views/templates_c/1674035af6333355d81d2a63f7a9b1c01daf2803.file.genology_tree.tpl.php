<?php /* Smarty version Smarty 3.1.4, created on 2015-08-04 02:30:07
         compiled from "application/views/user/tree/genology_tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159836344955c069ff519a56-19165135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1674035af6333355d81d2a63f7a9b1c01daf2803' => 
    array (
      0 => 'application/views/user/tree/genology_tree.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159836344955c069ff519a56-19165135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'tran_genealogy_tree' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c069ff573b4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c069ff573b4')) {function content_55c069ff573b4($_smarty_tpl) {?><script>
    
function getGenologyTree(id)
{
    

   $.ajax({

     type: "POST",
     url: '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user/tree/tree_view',
     data: { user_id: id }, // appears as $_GET['id'] @ ur backend side
     success: function(data) {
           // data is ur summary
        $('#summary').html(data);
     }

   });

}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>($_smarty_tpl->tpl_vars['Name']->value)), 0);?>


<!-- start: GENOLOGY TREE-->                                         
<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <i class="fa fa-sitemap"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_genealogy_tree']->value;?>

            </div>
            <div class="panel-body" style="overflow: auto;">
                <button class="zoomIn"><span class="glyphicon glyphicon-zoom-in" style="font-size:20px"></span></button>
                <button class="zoomOut"><span class="glyphicon glyphicon-zoom-out" style="font-size:20px"></span></button>
                <button class="zoomOff"><span class="glyphicon glyphicon-off" style="font-size:20px"></span></button>


                <div id="dsply_tree_zoomable">

                    <div id="summary" class="panel-body tree-container1" style="height:100%;margin: auto">         
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
        getGenologyTree('<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
');
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
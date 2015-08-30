<?php /* Smarty version Smarty 3.1.4, created on 2015-08-04 02:30:08
         compiled from "application/views/user/tree/select_tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31091003655c06a005d93f5-33240698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83d4123f7f0325c1b725d96d73754032db11bb61' => 
    array (
      0 => 'application/views/user/tree/select_tree.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31091003655c06a005d93f5-33240698',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'user_id' => 0,
    'tran_tree_views' => 0,
    'PUBLIC_URL' => 0,
    'user_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c06a00649fe',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c06a00649fe')) {function content_55c06a00649fe($_smarty_tpl) {?><script>
    var UITreeview = function() {
        //function to initiate jquery.dynatree
        var runTreeView = function() {
            //External data 
            $("#tree3").dynatree({
                // In real life we would call a URL on the server like this:
                //          initAjax: {
                //              url: "/getTopLevelNodesAsJson",
                //              data: { mode: "funnyMode" }
                //              },
                // .. but here we use a local file instead:
                
                initAjax: {
                    url: "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user/tree/get_children/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
"
                },
                onLazyRead: function(node) {
                    node.appendAjax({ url: "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user/tree/get_children/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
"
                    });
                },
                onActivate: function(node) {
                    node.appendAjax({ url: "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user/tree/get_children/"+node.data.id
                    });
                },
                onDeactivate: function(node) {
                    $("#echoActive").text("-");
                }
            });
        };
        return {
            //main function to initiate template pages
            init: function() {
                runTreeView();
            }
        };
    }();
</script>

<?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>($_smarty_tpl->tpl_vars['Name']->value)), 0);?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_tree_views']->value;?>
 
            </div>
            <div class="panel-body">

               
                    <div class="panel-body">
                        <table width="100%"><tr><td bgcolor='#FFFFEE'><label bgcolor='#999'> <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/root.png" /><b>[<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
]</b></label></td>
                                <td align="right">
                                </td>
                            </tr></table>
                        <div id="tree3"></div>

                        <div class="widget">

                        </div>
                    </div>
                </div>
                <!-- end: EXTERNAL DATA PANEL -->

            </div>
                    </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>                
<!-- /.modal -->
<!-- end: INBOX DETAILS FORM --> 						
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        UITreeview.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
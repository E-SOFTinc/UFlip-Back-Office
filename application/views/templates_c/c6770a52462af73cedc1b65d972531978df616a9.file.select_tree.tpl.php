<?php /* Smarty version Smarty 3.1.4, created on 2015-08-01 12:31:12
         compiled from "application/views/admin/tree/select_tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148964992855bd0260902227-41103251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6770a52462af73cedc1b65d972531978df616a9' => 
    array (
      0 => 'application/views/admin/tree/select_tree.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148964992855bd0260902227-41103251',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'user_id' => 0,
    'tran_you_must_select_user_id' => 0,
    'tran_select_user' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_id' => 0,
    'tran_type_members_name' => 0,
    'tran_view' => 0,
    'PUBLIC_URL' => 0,
    'tran_tabular_tree' => 0,
    'user_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bd02609bfde',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bd02609bfde')) {function content_55bd02609bfde($_smarty_tpl) {?><script>
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
admin/tree/get_children/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
"
                },
                onLazyRead: function(node) {
                    node.appendAjax({ url: "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/tree/get_children/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
"
                    });
                },
                onActivate: function(node) {
                    node.appendAjax({ url: "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/tree/get_children/"+node.data.id
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
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="span_js_messages" style="display:none;">
    
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_user_id']->value;?>
</span>
    
</div>
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_select_user']->value;?>
 
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_id']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <input placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_type_members_name']->value;?>
" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1" />

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" id="profile_update" value="profile_update" name="profile_update" tabindex="2">
                                <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>

                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end: PAGE CONTENT -->

<!-- start: TABULAR TREE-->                                         
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default" id="shr">
            <div class="panel-heading">
                <i class="fa fa-sitemap"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_tabular_tree']->value;?>

            </div>
            <div class="panel-body">
                <label bgcolor='#999'> <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/root.png" /><b>[<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
]</b></label>

                <div id="tree3"></div>

                <div class="widget">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: EXTERNAL DATA PANEL -->

<!-- end: TABULAR TREE--> 

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        UITreeview.init();
        ValidateUser.init();
    });
</script>
<style type="text/css">
#panel-config-genology .modal-dialog {
width: 75%;
line-height: 14px;
}
#panel-config-genology div.panel-body {
    height: 405px;
}
#member {
font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}
</style>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
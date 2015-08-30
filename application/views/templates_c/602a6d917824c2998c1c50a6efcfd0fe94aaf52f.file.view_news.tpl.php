<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 03:47:34
         compiled from "application/views/user/news/view_news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96563562155c5c226b06b48-67669892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '602a6d917824c2998c1c50a6efcfd0fe94aaf52f' => 
    array (
      0 => 'application/views/user/news/view_news.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96563562155c5c226b06b48-67669892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_view_news_and_events' => 0,
    'news_details' => 0,
    'v' => 0,
    'id' => 0,
    'tran_news_details' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c5c226b7fe7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c5c226b7fe7')) {function content_55c5c226b7fe7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_view_news_and_events']->value;?>

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
                <!-- start: INBOX DETAILS FORM -->
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable('', null, 0);?>

                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['news_id'], null, 0);?>
                    <div class="modal fade" id="panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['tran_news_details']->value;?>
</h4>
                                </div>
                                <div class="modal-body">

                                    <table cellpadding="0" cellspacing="0" align="center">
                                        <tr>
                                            <td>
                                                <b>Title :</b> <?php echo $_smarty_tpl->tpl_vars['v']->value['news_title'];?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="th">
                                                <b>Date :</b> <?php echo $_smarty_tpl->tpl_vars['v']->value['news_date'];?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="80%"  style="padding-top: 10px;">
                                                <b>Description:</b> <h6><p style="text-align: justify;line-height: 20px;"> <?php echo $_smarty_tpl->tpl_vars['v']->value['news_desc'];?>
</p></h6>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                <?php } ?>                
                <!-- /.modal -->
                <!-- end: INBOX DETAILS FORM --> 						                

		<?php echo $_smarty_tpl->getSubTemplate ("user/news/inbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
	Main.init();
	ValidateUser.init();

    });

</script>
<?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }} ?>
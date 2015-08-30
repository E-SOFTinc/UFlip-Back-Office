<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 07:50:27
         compiled from "application/views/admin/mail/mail_management.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152592630055bb6f13504fc2-83704522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38cf73604b8f63bc377b1b8e1e720f5a03fad7bd' => 
    array (
      0 => 'application/views/admin/mail/mail_management.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152592630055bb6f13504fc2-83704522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_mail_management' => 0,
    'adminmsgs' => 0,
    'v' => 0,
    'i' => 0,
    'user_name_arr' => 0,
    'id' => 0,
    'tran_mail_details' => 0,
    'user_name' => 0,
    'BASE_URL' => 0,
    'reply' => 0,
    'close' => 0,
    'tran_you_must_select_user' => 0,
    'tran_you_must_enter_subject_here' => 0,
    'tran_you_must_enter_message_here' => 0,
    'tab1' => 0,
    'tran_inbox' => 0,
    'tab2' => 0,
    'tran_compose_mail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb6f135ebb0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb6f135ebb0')) {function content_55bb6f135ebb0($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_mail_management']->value;?>

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
                <?php $_smarty_tpl->tpl_vars['clr'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['msg_id'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['user_name'] = new Smarty_variable('', null, 0);?>


                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['adminmsgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['id'], null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['user_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['user_name_arr']->value[$_smarty_tpl->tpl_vars['i']->value-1]['user_name'], null, 0);?>
                    <div class="modal fade" id="panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  role="dialog" aria-hidden="true">

                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" tabindex="1">
                                        &times;
                                    </button>
                                    <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['tran_mail_details']->value;?>
</h4>
                                </div>
                                <div class="modal-body">

                                    <table cellpadding="0" cellspacing="0" align="center">
                                        <tr align="center">
                                            <th class="th" colspan="2">
                                                Subject :<?php echo $_smarty_tpl->tpl_vars['v']->value['mailadsubject'];?>

                                            </th>
                                        </tr>
                                        <tr align="center">
                                            <th class="th" colspan="2">
                                                From : <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>

                                            </th>
                                        </tr>
                                        <tr align="justify">
                                            <td class="th" colspan="2" style="padding-top:10px;">
                                                <b>Message:</b> <div class="scrolloverview"> <?php echo $_smarty_tpl->tpl_vars['v']->value['mailadidmsg'];?>
</div>
                                            </td>

                                        </tr>
                                    </table>

                                </div>
                                <div class="modal-footer">

                                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/mail/reply_mail/<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['mailadsubject'];?>
">

                                        <button type="button" class="btn btn-bricky" onclick="getUsername('<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['v']->value['mailadsubject'];?>
');" >
                                            <?php echo $_smarty_tpl->tpl_vars['reply']->value;?>
</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        <?php echo $_smarty_tpl->tpl_vars['close']->value;?>

                                    </button>
                                </div>


                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                <?php } ?>                
                <!-- /.modal -->
                <!-- end: INBOX DETAILS FORM --> 						                
                <div id="span_js_messages" style="display:none;">
                    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_user']->value;?>
</span>        
                    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_subject_here']->value;?>
</span>
                    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_message_here']->value;?>
</span>        
                </div>
                <div class="tabbable ">
                    <ul id="myTab3" class="nav nav-tabs tab-green">
                        <li class="<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
">
                            <a href="#panel_tab4_example1" data-toggle="tab">
                                <i class="pink fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['tran_inbox']->value;?>

                            </a>
                        </li>
                        <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                            <a href="#panel_tab4_example2" data-toggle="tab">
                                <i class="blue fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['tran_compose_mail']->value;?>

                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
" id="panel_tab4_example1">
                            <p>
                                <?php echo $_smarty_tpl->getSubTemplate ("admin/mail/inbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

                            </p>
                        </div>
                        <div class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
" id="panel_tab4_example2">
                            <p>
                                <?php echo $_smarty_tpl->getSubTemplate ("admin/mail/compose_mail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
                            jQuery(document).ready(function() {
                                Main.init();
                                ValidateUser.init();
                            });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }} ?>
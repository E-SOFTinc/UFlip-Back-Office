<?php /* Smarty version Smarty 3.1.4, created on 2015-08-03 05:03:56
         compiled from "application/views/user/mail/inbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13591787955bf3c8c5ceeb6-59634702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '717381d55139578053595f6f985972ded240bf7e' => 
    array (
      0 => 'application/views/user/mail/inbox.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13591787955bf3c8c5ceeb6-59634702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_inbox' => 0,
    'tran_Sure_you_want_to_Delete_There_is_NO_undo' => 0,
    'BASE_URL' => 0,
    'tran_no' => 0,
    'tran_from' => 0,
    'tran_subject' => 0,
    'tran_date' => 0,
    'tran_action' => 0,
    'cnt_row' => 0,
    'row' => 0,
    'v' => 0,
    'id' => 0,
    'tran_admin' => 0,
    'msg_id' => 0,
    'i' => 0,
    'user_name_arr' => 0,
    'tran_You_have_no_mails_in_inbox' => 0,
    'result_per_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bf3c8c6a205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf3c8c6a205')) {function content_55bf3c8c6a205($_smarty_tpl) {?>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_inbox']->value;?>

    </div>

    <div class="panel-body">



        <div id="span_js_messages" style="display:none;">
            <span id="confirm_msg"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_Delete_There_is_NO_undo']->value;?>
</span>
        </div>
        <input type="hidden" id="inbox_form" name="inbox_form" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" />

        <table  class="table table-hover" id="sample-table-1">
            <thead>
                <tr class="th">            
                   <!-- <th> <?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th> -->
                    <th> <?php echo $_smarty_tpl->tpl_vars['tran_from']->value;?>
</th>
                    <th> <?php echo $_smarty_tpl->tpl_vars['tran_subject']->value;?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['tran_action']->value;?>
</th>
                </tr>
            </thead>
            <tbody>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['clr'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['msg_id'] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars['user_name'] = new Smarty_variable('', null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['cnt_row']->value>0){?>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>

                    <?php if ($_smarty_tpl->tpl_vars['v']->value['read_msg']=='yes'){?>
                        <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['mailtousid'], null, 0);?>                        
                        <tr>
                          
                            <td>
                                <a id="" class="btn btn-xs btn-link panel-config" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" data-toggle="modal" style='color:#C48189;'>  <?php echo $_smarty_tpl->tpl_vars['tran_admin']->value;?>
</a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-link panel-config" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" data-toggle="modal" style='color:#C48189;'> <?php echo $_smarty_tpl->tpl_vars['v']->value['mailtoussub'];?>
</a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-link panel-config" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" data-toggle="modal" style='color:#C48189'> <?php echo $_smarty_tpl->tpl_vars['v']->value['mailtousdate'];?>
</a>
                            </td>                    
                            <td class="center">
                                <?php $_smarty_tpl->tpl_vars['msg_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['mailtousid'], null, 0);?>
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="#" onclick="deleteMessage(<?php echo $_smarty_tpl->tpl_vars['msg_id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" class="btn btn-bricky tooltips" data-placement="top" data-original-title="Delete"><i class="fa fa-times fa fa-white"></i></a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group">
                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                        </a>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="#" onclick="deleteMessage(<?php echo $_smarty_tpl->tpl_vars['msg_id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')">
                                                    <i class="fa fa-times"></i> Remove
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>	

                    <?php }else{ ?>	   
                        <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['mailtousid'], null, 0);?>                        
                        <tr>
                            
                            <td>
                                <?php $_smarty_tpl->tpl_vars['user_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['user_name_arr']->value[$_smarty_tpl->tpl_vars['i']->value-1]['user_name'], null, 0);?>
                                <a id="usernam<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-xs btn-link panel-config" data-toggle="modal" href="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" data-toggle="modal" style='color: #007AFF;'><b><?php echo $_smarty_tpl->tpl_vars['tran_admin']->value;?>
</b></a>
                            </td>
                            <td>
                                <a id="sbjct<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-xs btn-link panel-config" data-toggle="modal" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" style='color:#007AFF;'> <b><?php echo $_smarty_tpl->tpl_vars['v']->value['mailtoussub'];?>
</b></a>
                            </td>
                            <td>                        
                                <a id="addate<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-xs btn-link panel-config" data-toggle="modal" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" style='color: #007AFF;'> <b><?php echo $_smarty_tpl->tpl_vars['v']->value['mailtousdate'];?>
</b></a>
                            </td>
                            <td class="center">
                                <?php $_smarty_tpl->tpl_vars['msg_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['mailtousid'], null, 0);?>
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="#" onclick="javascript:deleteMessage(<?php echo $_smarty_tpl->tpl_vars['msg_id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" class="btn btn-bricky tooltips" data-placement="top" data-original-title="Delete"><i class="fa fa-times fa fa-white"></i></a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group">
                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                        </a>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="#" onclick="deleteMessage(<?php echo $_smarty_tpl->tpl_vars['msg_id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')">
                                                    <i class="fa fa-times"></i> Remove
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php }?>

                <?php } ?>
                <?php }else{ ?>
                <tbody><tr><td align="center" colspan="4"><b><?php echo $_smarty_tpl->tpl_vars['tran_You_have_no_mails_in_inbox']->value;?>
</b></td></tr></tbody>
            <?php }?>
            </tbody>
        </table>
                <?php echo $_smarty_tpl->tpl_vars['result_per_page']->value;?>

    </div>
</div>
<?php }} ?>
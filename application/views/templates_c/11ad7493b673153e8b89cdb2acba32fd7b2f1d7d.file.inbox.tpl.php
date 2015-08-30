<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 03:47:34
         compiled from "application/views/user/news/inbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52244460055c5c226b8beb7-92226148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11ad7493b673153e8b89cdb2acba32fd7b2f1d7d' => 
    array (
      0 => 'application/views/user/news/inbox.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52244460055c5c226b8beb7-92226148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'tran_no' => 0,
    'tran_news_title' => 0,
    'tran_date' => 0,
    'arr_count' => 0,
    'news_details' => 0,
    'v' => 0,
    'id' => 0,
    'i' => 0,
    'tran_You_have_no_news_in_inbox' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c5c226bfa5a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c5c226bfa5a')) {function content_55c5c226bfa5a($_smarty_tpl) {?>



<div class="panel-body">



    <input type="hidden" id="inbox_form" name="inbox_form" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" />

    <table  class="table table-hover" id="sample-table-1">
	<thead>
	    <tr class="th">            
		<th> <?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['tran_news_title']->value;?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</th>
	    </tr>
	</thead>
	<tbody>
	    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>

	    <?php if ($_smarty_tpl->tpl_vars['arr_count']->value>0){?>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>


		    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['news_id'], null, 0);?> 
		    <tr>

			<td>
			   
			    <a id="" class="btn btn-xs btn-link panel-config" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" data-toggle="modal" style='color:#C48189;'>  <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
			</td>
			<td>
			    <a class="btn btn-xs btn-link panel-config" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" data-toggle="modal" style='color:#C48189;'> <?php echo $_smarty_tpl->tpl_vars['v']->value['news_title'];?>
</a>
			</td>
			<td>
			    <a class="btn btn-xs btn-link panel-config" href ="#panel-config<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onclick="readMessage(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, this.parentNode.parentNode.rowIndex, 'user', '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user')" data-toggle="modal" style='color:#C48189'> <?php echo $_smarty_tpl->tpl_vars['v']->value['news_date'];?>
</a>
			</td>


		    </tr>
		    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>	



                <?php } ?>
	    <?php }else{ ?>
	    <tbody><tr><td align="center" colspan="4"><b><?php echo $_smarty_tpl->tpl_vars['tran_You_have_no_news_in_inbox']->value;?>
</b></td></tr></tbody>
			<?php }?>
	</tbody>
    </table>
   
</div>

<?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:39:01
         compiled from "application/views/admin/configuration/termsconditions_config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135030676855bba4a5665986-16620608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a74bab19c32a2343f12cff1a6c629adf9a618fc' => 
    array (
      0 => 'application/views/admin/configuration/termsconditions_config.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135030676855bba4a5665986-16620608',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_terms' => 0,
    'LANG_STATUS' => 0,
    'tran_Select_a_Language' => 0,
    'lang_arr' => 0,
    'lang_id' => 0,
    'v' => 0,
    'BASE_URL' => 0,
    'tran_terms_and_conditions' => 0,
    'terms' => 0,
    'tran_update' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba4a56aa75',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba4a56aa75')) {function content_55bba4a56aa75($_smarty_tpl) {?><div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_terms']->value;?>

            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  action="" method="post"  name= 'form_setting'  id= 'form_setting' >
                    <?php if ($_smarty_tpl->tpl_vars['LANG_STATUS']->value=='yes'){?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="lang_selector">
                            <?php echo $_smarty_tpl->tpl_vars['tran_Select_a_Language']->value;?>
 
                        </label>
                        <div class="col-sm-6">
                            <select  class="form-control"  id='lang_selector' onchange="set_language_id(this.value,'letter');" tabindex="1">
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['lang_id']->value==$_smarty_tpl->tpl_vars['v']->value['lang_id']){?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['lang_id'];?>
" selected=""><?php echo $_smarty_tpl->tpl_vars['v']->value['lang_name'];?>
</option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['lang_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['lang_name'];?>
</option>
                                    <?php }?>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="lang_id" id="lang_id" value="<?php echo $_smarty_tpl->tpl_vars['lang_id']->value;?>
"/>
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
"/>
                        </div>
                    </div>
                        <?php }?>
                       <?php if ($_smarty_tpl->tpl_vars['LANG_STATUS']->value=='no'){?>
                          <input type="hidden" name="lang_id" id="lang_id" value="1"/>
                        <?php }?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="txtDefaultHtmlArea1">
                            <?php echo $_smarty_tpl->tpl_vars['tran_terms_and_conditions']->value;?>

                        </label>
                        <div class="col-sm-9">
                            <textarea id="txtDefaultHtmlArea1"  name="txtDefaultHtmlArea1" class="ckeditor form-control"  tabindex="2">
                                <?php echo $_smarty_tpl->tpl_vars['terms']->value;?>

                            </textarea>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="3"  name="settings" id="settings" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" > <?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:39:01
         compiled from "application/views/admin/configuration/letter_config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62148477555bba4a55e6713-36331493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffeab3a801c1b261aa936b65c0e65842c2b5c9ee' => 
    array (
      0 => 'application/views/admin/configuration/letter_config.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62148477555bba4a55e6713-36331493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_welcome_letter' => 0,
    'LANG_STATUS' => 0,
    'tran_Select_a_Language' => 0,
    'lang_arr' => 0,
    'lang_id' => 0,
    'v' => 0,
    'BASE_URL' => 0,
    'tran_company_name' => 0,
    'letter_arr' => 0,
    'tran_company_address' => 0,
    'tran_from_address' => 0,
    'tran_main_matter' => 0,
    'tran_logo' => 0,
    'tran_select_image' => 0,
    'tran_matter_for_product_release' => 0,
    'tran_replay_message_for_welcome_letter' => 0,
    'tran_place' => 0,
    'tran_update' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba4a5660d8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba4a5660d8')) {function content_55bba4a5660d8($_smarty_tpl) {?><div class="row" class="hidden-xs" >
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    <?php echo $_smarty_tpl->tpl_vars['tran_welcome_letter']->value;?>

            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  action="" method="post"  name= 'form_setting'  id= 'form_setting' enctype="multipart/form-data">
                    <?php if ($_smarty_tpl->tpl_vars['LANG_STATUS']->value=='yes'){?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="lang_selector">
                            <?php echo $_smarty_tpl->tpl_vars['tran_Select_a_Language']->value;?>
 
                        </label>
                        <div class="col-sm-6">
                            <select  class="form-control"  id='lang_selector' onchange="set_language_id(this.value, 'letter');" tabindex="1">
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
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company_name">
                            <?php echo $_smarty_tpl->tpl_vars['tran_company_name']->value;?>
<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" name ="company_name" id ="company_name" value="<?php echo $_smarty_tpl->tpl_vars['letter_arr']->value["company_name"];?>
" title="Eg: IOSS LLP" tabindex="2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company_add">
                            <?php echo $_smarty_tpl->tpl_vars['tran_company_address']->value;?>
<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <textarea name ="company_add"  id ="company_add" class="form-control"  rows="10" cols="25"  title="<?php echo $_smarty_tpl->tpl_vars['tran_from_address']->value;?>
" tabindex="3"><?php echo $_smarty_tpl->tpl_vars['letter_arr']->value["address_of_company"];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="txtDefaultHtmlArea">
                            <?php echo $_smarty_tpl->tpl_vars['tran_main_matter']->value;?>

                        </label>
                        <div class="col-sm-9">
                            <textarea class="ckeditor form-control"  id="txtDefaultHtmlArea"  name="txtDefaultHtmlArea" title="<?php echo $_smarty_tpl->tpl_vars['tran_main_matter']->value;?>
" tabindex="4"><?php echo $_smarty_tpl->tpl_vars['letter_arr']->value["main_matter"];?>
</textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="userfile">
                            <?php echo $_smarty_tpl->tpl_vars['tran_logo']->value;?>
<span class="symbol required"></span>
                        </label>
                        <!--<div class="col-sm-6">
                            <input tabindex="5" type="file" id="userfile" name="userfile">
                        </div>-->
                        
                         <div class="user-edit-image-buttons col-sm-6">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> <?php echo $_smarty_tpl->tpl_vars['tran_select_image']->value;?>
</span><span class="fileupload-exists"><!--<i class="fa fa-picture"></i> Change--></span>
                                        <input type="file" id="userfile" name="userfile" tabindex="5" value="">
                                    </span>
                                </div>
                        
                        
                        
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_matter">
                            <?php echo $_smarty_tpl->tpl_vars['tran_matter_for_product_release']->value;?>

                        </label>
                        <div class="col-sm-9">
                            <textarea name ="product_matter" tabindex="6" id ="product_matter" class="ckeditor form-control"  title="<?php echo $_smarty_tpl->tpl_vars['tran_replay_message_for_welcome_letter']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['letter_arr']->value["productmatter"];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_matter">
                            <?php echo $_smarty_tpl->tpl_vars['tran_place']->value;?>
<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" tabindex="7" name ="place" id ="place" value="<?php echo $_smarty_tpl->tpl_vars['letter_arr']->value["place"];?>
" title="Eg: CALICUT">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="8"  name="setting" id="setting" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" > <?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php }} ?>
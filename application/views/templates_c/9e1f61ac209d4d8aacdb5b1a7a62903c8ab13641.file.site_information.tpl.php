<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:38:39
         compiled from "application/views/admin/configuration/site_information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134181258655bba48f517043-46375814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e1f61ac209d4d8aacdb5b1a7a62903c8ab13641' => 
    array (
      0 => 'application/views/admin/configuration/site_information.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134181258655bba48f517043-46375814',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_company_name' => 0,
    'tran_non_valid_file' => 0,
    'tran_only_png_jpg' => 0,
    'tran_you_must_enter_email' => 0,
    'tran_you_must_enter_valid_email' => 0,
    'tran_you_must_enter_phone' => 0,
    'tran_you_must_enter_valid_phone' => 0,
    'tran_you_must_enter_the_company_address' => 0,
    'tran_site_information' => 0,
    'tran_errors_check' => 0,
    'tran_company_name' => 0,
    'site_info_arr' => 0,
    'tran_company_address' => 0,
    'tran_default_language' => 0,
    'lang' => 0,
    'v' => 0,
    'default_lang' => 0,
    'tran_logo' => 0,
    'PUBLIC_URL' => 0,
    'tran_select_image' => 0,
    'tran_icon' => 0,
    'tran_email' => 0,
    'tran_phone' => 0,
    'tran_update' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba48f5ff64',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba48f5ff64')) {function content_55bba48f5ff64($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_company_name']->value;?>
</span>
    <span id="validate_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_non_valid_file']->value;?>
</span>
    <span id="validate_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_only_png_jpg']->value;?>
</span>
    <span id="validate_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_email']->value;?>
</span>
    <span id="validate_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_valid_email']->value;?>
</span>
    <span id="validate_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_phone']->value;?>
</span>
    <span id="validate_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_valid_phone']->value;?>
</span>
     <span id="validate_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_the_company_address']->value;?>
</span>
</div>

  
                            
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
               <?php echo $_smarty_tpl->tpl_vars['tran_site_information']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="site_config" id="site_config" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="co_name"><?php echo $_smarty_tpl->tpl_vars['tran_company_name']->value;?>
:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <input  type="text"  name="co_name" id="co_name"    autocomplete="Off" tabindex="1" value="<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["co_name"];?>
">
                        </div>
                    </div>
                         
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="company_address"><?php echo $_smarty_tpl->tpl_vars['tran_company_address']->value;?>
:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <textarea  name="company_address" id="company_address" tabindex="2" rows="6" cols="30"   autocomplete="Off" ><?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["company_address"];?>
</textarea>
                        </div>
                    </div>
                        
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="def_lang"><?php echo $_smarty_tpl->tpl_vars['tran_default_language']->value;?>
:<font color="#ff0000">*</font> </label>
                            <div class="col-sm-4">
                                <select id="def_lang" name="def_lang" tabindex="3" class="form-control">
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['lang_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['default_lang']->value==$_smarty_tpl->tpl_vars['v']->value['lang_id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['lang_name'];?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                   
                         <div class="form-group">
        <label class="col-sm-2 control-label" > <?php echo $_smarty_tpl->tpl_vars['tran_logo']->value;?>
</label>

                            <div class="fileupload fileupload-new col-sm-4" data-provides="fileupload" >
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["logo"];?>
" alt="" value="<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["logo"];?>
">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> <?php echo $_smarty_tpl->tpl_vars['tran_select_image']->value;?>
</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="favicon" name="favicon" tabindex="4" value="<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["logo"];?>
">
                                    </span>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
        <label class="col-sm-2 control-label" > <?php echo $_smarty_tpl->tpl_vars['tran_icon']->value;?>
</label>

                            <div class="fileupload fileupload-new col-sm-4" data-provides="fileupload" >
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["favicon"];?>
" alt="" value="<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["favicon"];?>
">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> <?php echo $_smarty_tpl->tpl_vars['tran_select_image']->value;?>
</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="img_logo" name="img_logo" tabindex="5" value="<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["favicon"];?>
">
                                    </span>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <input  type="text"  name="email" id="email"   autocomplete="Off" tabindex="6" value="<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["email"];?>
">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="img_logo"><?php echo $_smarty_tpl->tpl_vars['tran_phone']->value;?>
:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <input  type="text"  name="phone" id="phone"   autocomplete="Off"  tabindex="7" value="<?php echo $_smarty_tpl->tpl_vars['site_info_arr']->value["phone"];?>
"> <span id="errmsg1"></span>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="site" id="site" value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" tabindex="8">
                               <?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>

                            </button>
                        </div>
                    </div>
                </form>
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
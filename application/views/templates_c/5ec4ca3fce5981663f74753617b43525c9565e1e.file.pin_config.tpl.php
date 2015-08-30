<?php /* Smarty version Smarty 3.1.4, created on 2015-08-18 08:33:22
         compiled from "application/views/admin/configuration/pin_config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188584767255d334226b1c50-16065869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ec4ca3fce5981663f74753617b43525c9565e1e' => 
    array (
      0 => 'application/views/admin/configuration/pin_config.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188584767255d334226b1c50-16065869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_e_pin_length' => 0,
    'tran_e_pin_configuration' => 0,
    'tran_errors_check' => 0,
    'prod_status' => 0,
    'tran_value_of_e_pin' => 0,
    'pin_config' => 0,
    'tran_maximun_active_e_pin' => 0,
    'tran_the_maximum_no_of_active_e_pin_at_a_time' => 0,
    'tran_e_pin_character_set' => 0,
    'tran_alphabets' => 0,
    'tran_numerals' => 0,
    'tran_alphanumerals' => 0,
    'tran_update' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55d3342276d25',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d3342276d25')) {function content_55d3342276d25($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;"> 
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_e_pin_length']->value;?>
</span>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   <?php echo $_smarty_tpl->tpl_vars['tran_e_pin_configuration']->value;?>

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
                <form  role="form" class="smart-wizard form-horizontal" name='pin_config_form' id='pin_config_form' method="post" >
                   
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
                    
                    
                    <?php if ($_smarty_tpl->tpl_vars['prod_status']->value=='no'){?>
      <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin_value"><?php echo $_smarty_tpl->tpl_vars['tran_value_of_e_pin']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name="pin_value" id="pin_value" value="<?php echo $_smarty_tpl->tpl_vars['pin_config']->value["pin_amount"];?>
" title="Purchase value of one E-Pin" autocomplete="Off" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
<?php }?>
                             <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin_maxcount"><?php echo $_smarty_tpl->tpl_vars['tran_maximun_active_e_pin']->value;?>
:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="pin_maxcount" id ="pin_maxcount" value="<?php echo $_smarty_tpl->tpl_vars['pin_config']->value["pin_maxcount"];?>
" maxlength="5" readonly title="<?php echo $_smarty_tpl->tpl_vars['tran_the_maximum_no_of_active_e_pin_at_a_time']->value;?>
." autocomplete="Off" tabindex="2" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                            
     <div class="form-group">
                        <label class="col-sm-2 control-label" for="refferal_status"><?php echo $_smarty_tpl->tpl_vars['tran_e_pin_character_set']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['pin_config']->value["pin_character_set"];?>
</label>
                     
                    
                    
                        <div class="col-sm-6">

                            <label class="radio-inline" for="status_yes"><input tabindex="3"   type="radio" name="pin_character" id="alphabet" value="alphabet" <?php if ($_smarty_tpl->tpl_vars['pin_config']->value["pin_character_set"]=="alphabet"){?>checked <?php }?>/>
                               <?php echo $_smarty_tpl->tpl_vars['tran_alphabets']->value;?>
</label>
                            <label class="radio-inline"  for="status_no"><input tabindex="3"  type="radio"  name="pin_character" id="numeral" value="numeral" <?php if ($_smarty_tpl->tpl_vars['pin_config']->value["pin_character_set"]=="numeral"){?> checked <?php }?> />
                            <?php echo $_smarty_tpl->tpl_vars['tran_numerals']->value;?>
  </label> 
                           <label class="radio-inline"  for="status_no"><input tabindex="3"  type="radio" name="pin_character" id="alphanumeric" value="alphanumeric" <?php if ($_smarty_tpl->tpl_vars['pin_config']->value["pin_character_set"]=="alphanumeric"){?> checked <?php }?> />
                             <?php echo $_smarty_tpl->tpl_vars['tran_alphanumerals']->value;?>
 </label> 

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="4"   type="submit"  value="<?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
" name="update" id="update" > <?php echo $_smarty_tpl->tpl_vars['tran_update']->value;?>
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
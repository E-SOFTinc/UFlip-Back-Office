<?php /* Smarty version Smarty 3.1.4, created on 2015-08-17 06:24:11
         compiled from "application/views/admin/configuration/set_module_status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187508209655d1c45b074498-34231245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc1b2172623acb9a5c65d449a692ffb41aea433d' => 
    array (
      0 => 'application/views/admin/configuration/set_module_status.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187508209655d1c45b074498-34231245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_set_module_status' => 0,
    'tran_errors_check' => 0,
    'tran_no' => 0,
    'tran_status' => 0,
    'tran_action' => 0,
    'tran_referal_income_status' => 0,
    'referal_status' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'tran_Ewallet' => 0,
    'ewallet_status' => 0,
    'tran_e_wallet' => 0,
    'tran_sponsor_tree' => 0,
    'sponsor_tree_status' => 0,
    'tran_epin' => 0,
    'pin_status' => 0,
    'tran_epin_management' => 0,
    'tran_product_status' => 0,
    'product_status' => 0,
    'tran_employee' => 0,
    'employee_status' => 0,
    'tran_rank' => 0,
    'rank_status' => 0,
    'tran_sms' => 0,
    'sms_status' => 0,
    'tran_upload_document' => 0,
    'upload_status' => 0,
    'tran_multi_language' => 0,
    'lang_status' => 0,
    'tran_language_settings' => 0,
    'tran_help' => 0,
    'help_status' => 0,
    'statcounter_status' => 0,
    'tran_footer_demo_status' => 0,
    'footer_demo_status' => 0,
    'captcha_status' => 0,
    'sponsor_commission_status' => 0,
    'tran_level_commission' => 0,
    'tran_others' => 0,
    'tran_payout_settings' => 0,
    'tran_change_payout_settings' => 0,
    'tran_depth_ceiling_settings' => 0,
    'tran_change_depth_ceiling' => 0,
    'tran_add_new_epin_amount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55d1c45b26ef2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d1c45b26ef2')) {function content_55d1c45b26ef2($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_set_module_status']->value;?>

            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                    </div>
                </div>
                <form name="module_status_form" id="module_status_form" method="post">  

                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            
                            <tr class="th" align="center">
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>
</th>
                                <th> <?php echo $_smarty_tpl->tpl_vars['tran_action']->value;?>
</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_referal_income_status']->value;?>
 </td>
                                <td>
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_referal_status"  value="yes" <?php if ($_smarty_tpl->tpl_vars['referal_status']->value=="no"){?> onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'referal_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'referal_status', 'no')"<?php }?>>                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['referal_status']->value=='yes'){?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/configuration/configuration_view">Referral Income Management</a>
                                     <?php }?>
                                     
                                </td>
                            </tr>
                            <tr>
                                <td>2</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_Ewallet']->value;?>
</td>
                                <td>
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_ewallet_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['ewallet_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'ewallet_status','yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'ewallet_status','no')" <?php }?> >  
                                     
                                    </div>
                                       <?php if ($_smarty_tpl->tpl_vars['ewallet_status']->value=='yes'){?>
                                           <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/ewallet/my_ewallet"><?php echo $_smarty_tpl->tpl_vars['tran_e_wallet']->value;?>
</a>
                                        <?php }?>
                                        
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>           
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_tree']->value;?>
</td> 
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_sponsor_tree_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['sponsor_tree_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'sponsor_tree_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'sponsor_tree_status', 'no')" <?php }?> >                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['sponsor_tree_status']->value=='yes'){?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/tree/sponsor_tree"><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_tree']->value;?>
</a>
                                    
                                    <?php }?>
                                    
                                </td>
                                
                            </tr>
                            <tr>
                                <td>4</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
 </td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_pin_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'pin_status','yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'pin_status', 'no')" <?php }?> >                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=='yes'){?>
                                     <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/epin/epin_management"><?php echo $_smarty_tpl->tpl_vars['tran_epin_management']->value;?>
</a>
                                     <?php }?>
                                     
                                </td>
                            </tr>
                            <tr>
                                <td>5</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_product_status']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_product_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'product_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'product_status', 'no')" <?php }?> >    
                                    </div>
                                     <?php if ($_smarty_tpl->tpl_vars['product_status']->value=='yes'){?>
                                     <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/product/product_management">Product Management</a>
                                     <?php }?>
                                     
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>  
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_employee']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_employee_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['employee_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'employee_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'employee_status', 'no')" <?php }?> >                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['employee_status']->value=='yes'){?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/employee/employee_register"><?php echo $_smarty_tpl->tpl_vars['tran_employee']->value;?>
 Registration</a>
                                     <?php }?>
                                     
                                </td>
                            </tr>

                            <tr>
                                <td>7</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_rank']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_rank_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['rank_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'rank_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'rank_status', 'no')" <?php }?> >                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['rank_status']->value=='yes'){?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/configuration/rank_configuration">Rank Settings</a>
                                    <?php }?>
                                    
                                </td>
                            </tr>

                            <tr>
                                <td>8</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_sms']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_sms_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['sms_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'sms_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'sms_status', 'no')" <?php }?> >                             
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_upload_document']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_upload_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['upload_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'upload_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'upload_status', 'no')" <?php }?> >                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['upload_status']->value=='yes'){?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/news/upload_materials"><?php echo $_smarty_tpl->tpl_vars['tran_upload_document']->value;?>
</a>
                                    <?php }?>
                                    
                                </td>
                            </tr>
                            
                            <tr>
                                <td>10</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_multi_language']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_lang_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['lang_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'lang_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'lang_status', 'no')" <?php }?> >                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['lang_status']->value=='yes'){?>
                                      <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/configuration/language_settings"><?php echo $_smarty_tpl->tpl_vars['tran_language_settings']->value;?>
</a>  
                                    <?php }?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>11</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_help']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_help_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['help_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'help_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'help_status', 'no')" <?php }?> >                             
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>12</td> 
                                <td>Stat Counter Status</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_count_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['statcounter_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'statcounter_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'statcounter_status', 'no')" <?php }?> >                             
                                    </div>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td>13</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_footer_demo_status']->value;?>
</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_footer_demo_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['footer_demo_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'footer_demo_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'footer_demo_status', 'no')" <?php }?> >                             
                                    </div>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td>14</td> 
                                <td>Captcha Status</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_footer_demo_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['captcha_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'captcha_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'captcha_status', 'no')" <?php }?> >                             
                                    </div>
                                </td>
                            </tr>  
                            
                            <tr>
                                <td>15</td> 
                                <td>Sponsor Commission Status</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_sponsor_commission_status" value="yes" <?php if ($_smarty_tpl->tpl_vars['sponsor_commission_status']->value=="no"){?>   onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'sponsor_commission_status', 'yes')" <?php }else{ ?> checked onChange="change_module_status('<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/', 'sponsor_commission_status', 'no')" <?php }?> >                             
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['sponsor_commission_status']->value=='yes'){?>
                                      <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/configuration/configuration_view/level"><?php echo $_smarty_tpl->tpl_vars['tran_level_commission']->value;?>
</a>  
                                    <?php }?>
                                </td>
                            </tr>
                        </tbody>     
                        
                    </table>
                                    </form>
            </div>
        </div>
    </div>
</div>
			
<div class="row">
    <div class="col-sm-12">
	<div class="panel panel-default">
	    <div class="panel-heading">
		<i class="fa fa-external-link-square"></i>
		<?php echo $_smarty_tpl->tpl_vars['tran_others']->value;?>

	    </div>
	    <div class="panel-body">
		<div class="col-md-12">
		    <div class="errorHandler alert alert-danger no-display">
			<i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

		    </div>
		    <form name="module_status_form" id="module_status_form" method="post">  

                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            
                            <tr class="th" align="center">
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>
</th>
                                <th> <?php echo $_smarty_tpl->tpl_vars['tran_action']->value;?>
</th>
                            </tr>
                            
                        </thead>
			    <tr>
                                <td>1</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_payout_settings']->value;?>
</td>
                                <td>   
                                    <div class="" data-on="success" data-off="warning">
                                           <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/configuration/payout_setting"><?php echo $_smarty_tpl->tpl_vars['tran_change_payout_settings']->value;?>
</a>                         
                                    </div>
                                </td>
                            </tr>
			    <?php if ($_smarty_tpl->tpl_vars['sponsor_commission_status']->value=='yes'){?>
			    <tr>
                                <td>2</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_depth_ceiling_settings']->value;?>
</td>
                                <td>   
                                    <div>		    
			<a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/configuration/setting_depth"><?php echo $_smarty_tpl->tpl_vars['tran_change_depth_ceiling']->value;?>
</a>
				    </div>
                                </td>
                            </tr>
                            
			    <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=='yes'){?>
                                <tr>
                                <td>3</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['tran_add_new_epin_amount']->value;?>
</td>
                                <td>   
                                    <div>		    
			<a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/epin/add_new_epin_amount"><?php echo $_smarty_tpl->tpl_vars['tran_add_new_epin_amount']->value;?>
</a>
				    </div>
                                </td>
                            </tr>
                                
                                <?php }?>
                           
                        <tbody>
			    
			</tbody>
		    </table>
	</div>
    </div>
	</div>
    </div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
        Main.init();
        // ValidateUser.init();
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
  
<?php }} ?>
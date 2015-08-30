<?php /* Smarty version Smarty 3.1.4, created on 2015-08-08 03:49:08
         compiled from "application/views/user/profile/profile_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76090194155bee803ac9912-21239332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79aa39de17e671aebd0d8466944c934071a170f9' => 
    array (
      0 => 'application/views/user/profile/profile_view.tpl',
      1 => 1438771493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76090194155bee803ac9912-21239332',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bee803e767a',
  'variables' => 
  array (
    'tran_You_must_enter_user_name' => 0,
    'tran_you_must_enter_new_transaction_password' => 0,
    'tran_You_must_enter_your_address' => 0,
    'tran_reenter_new_transaction_password' => 0,
    'tran_new_transaction_password_mismatch' => 0,
    'tran_you_must_select_a_username' => 0,
    'tran_You_Select_A_Gender' => 0,
    'tran_You_must_enter_your_mobile_no' => 0,
    'tran_digits_only' => 0,
    'tran_pan_format' => 0,
    'tran_select_user' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_id' => 0,
    'tran_type_members_name' => 0,
    'tran_view' => 0,
    'PUBLIC_URL' => 0,
    'details' => 0,
    'tab1' => 0,
    'tran_Overview' => 0,
    'tab2' => 0,
    'tran_Edit_Account' => 0,
    'u_name' => 0,
    'tran_s_profile' => 0,
    'file_name' => 0,
    'tran_sponsor_package_info' => 0,
    'tran_placement_user_name' => 0,
    'sponser' => 0,
    'mlm_plan' => 0,
    'tran_position' => 0,
    'tran_left' => 0,
    'tran_right' => 0,
    'product_status' => 0,
    'tran_package' => 0,
    'product_name' => 0,
    'pin_status' => 0,
    'tran_epin' => 0,
    'tran_personal_info' => 0,
    'tran_name' => 0,
    'tran_user_name' => 0,
    'tran_date_of_birth' => 0,
    'tran_gender' => 0,
    'tran_male' => 0,
    'tran_female' => 0,
    'tran_contact_info' => 0,
    'tran_address' => 0,
    'tran_country' => 0,
    'tran_state' => 0,
    'tran_pincode' => 0,
    'tran_mob_no_10_digit' => 0,
    'tran_land_line_no' => 0,
    'tran_email' => 0,
    'BASE_URL' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'lang_id' => 0,
    'tran_image_upload' => 0,
    'tran_Select_image' => 0,
    'tran_Change' => 0,
    'tran_Remove' => 0,
    'user_type' => 0,
    'dob' => 0,
    'i' => 0,
    'tran_select_gender' => 0,
    'countries' => 0,
    'state' => 0,
    'tran_bank_info' => 0,
    'tran_pan_no' => 0,
    'tran_bank_account_number' => 0,
    'tran_ifsc_code' => 0,
    'tran_bank_name' => 0,
    'tran_branch_name' => 0,
    'tran_Required_Fields' => 0,
    'tran_term' => 0,
    'tran_update_profile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bee803e767a')) {function content_55bee803e767a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<!-- start: PAGE HEADER -->

<!-- end: PAGE HEADER -->

<!-- start: PAGE CONTENT -->
<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_user_name']->value;?>
</span>
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_new_transaction_password']->value;?>
</span>
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_your_address']->value;?>
</span>
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_reenter_new_transaction_password']->value;?>
</span>                     
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_new_transaction_password_mismatch']->value;?>
</span>        
    <span id="error_msg6"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_select_a_username']->value;?>
</span>
    <span id="error_msg7"><?php echo $_smarty_tpl->tpl_vars['tran_You_Select_A_Gender']->value;?>
</span>
    <span id="error_msg8"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_your_mobile_no']->value;?>
</span>
    <span id="error_msg9"><?php echo $_smarty_tpl->tpl_vars['tran_digits_only']->value;?>
</span>
    <span id="error_msg10"><?php echo $_smarty_tpl->tpl_vars['tran_pan_format']->value;?>
</span>
</div>

<!--
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_select_user']->value;?>
 
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
                <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_select_user_id']->value;?>
<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <input placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_type_members_name']->value;?>
" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', event)" autocomplete="Off" tabindex="1" >

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
<input type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["country"];?>
 name="cur_country" id="cur_country">
</form>
</div>
</div>
</div>
</div>  -->
<!-- end: PAGE CONTENT -->


<div class="row">
    <div class="col-sm-12">
        <div class="tabbable">
            <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                <li class="<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
">
                    <a data-toggle="tab" href="#panel_overview">
                        <?php echo $_smarty_tpl->tpl_vars['tran_Overview']->value;?>

                    </a>
                </li>
                <li class="<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                    <a data-toggle="tab" href="#panel_edit_account">
                        <?php echo $_smarty_tpl->tpl_vars['tran_Edit_Account']->value;?>

                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="panel_overview" class="tab-pane in<?php echo $_smarty_tpl->tpl_vars['tab1']->value;?>
">
                    <div class="row">
                        <div class="col-sm-5 col-md-12">
                            <div class="user-left">
                                <h4><?php echo $_smarty_tpl->tpl_vars['u_name']->value;?>
<?php echo $_smarty_tpl->tpl_vars['tran_s_profile']->value;?>
</h4>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="user-image">
                                        <div class="fileupload-new thumbnail"><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/profile_picture/<?php echo $_smarty_tpl->tpl_vars['file_name']->value;?>
" width="122" alt="Profile Picture">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div class="user-image-buttons">

                                        </div>
                                    </div>
                                </div>
                                <div class="center">

                                    <hr>
                                    <p>
                                        <!--<a class="btn btn-twitter btn-sm btn-squared">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a class="btn btn-linkedin btn-sm btn-squared">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                        <a class="btn btn-google-plus btn-sm btn-squared">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a class="btn btn-github btn-sm btn-squared">
                                            <i class="fa fa-github"></i>
                                        </a>-->
                                    </p>
                                    <hr>
                                </div>
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3"><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_package_info']->value;?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="160px"><?php echo $_smarty_tpl->tpl_vars['tran_placement_user_name']->value;?>
  </td><td width="50px"> : </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['sponser']->value['name'];?>
 </td>
                                            <!--<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>-->
                                        </tr>
                                        <?php if ($_smarty_tpl->tpl_vars['mlm_plan']->value!="Board"){?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['tran_position']->value;?>
  </td><td width="50px"> : </td>
                                                <td>
                                            <?php if ($_smarty_tpl->tpl_vars['details']->value["detail1"]["position"]=='L'){?> <?php echo $_smarty_tpl->tpl_vars['tran_left']->value;?>
 <?php }elseif($_smarty_tpl->tpl_vars['details']->value["detail1"]["position"]=='R'){?> <?php echo $_smarty_tpl->tpl_vars['tran_right']->value;?>
 <?php }?> </td>

                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['tran_package']->value;?>
 <td width="50px"> : </td> </td>
                                        <td> <?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
 </td>

                                    </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=="yes"){?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
  <td width="50px"> : </td></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["passcode"];?>
</td>

                                    </tr>
                                <?php }?>

                            </tbody>
                        </table>
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th colspan="3">  <?php echo $_smarty_tpl->tpl_vars['tran_personal_info']->value;?>
</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td  width="160px"><?php echo $_smarty_tpl->tpl_vars['tran_name']->value;?>
 </td><td width="50px"> : </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["name"];?>
 </td>

                                </tr>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
  </td><td width="50px"> : </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['u_name']->value;?>
 </td>

                                </tr>

                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['tran_date_of_birth']->value;?>
 </td><td width="50px"> : </td>
                                    <td> <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["dob"];?>
 </td>

                                </tr>


                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['tran_gender']->value;?>
  </td><td width="50px"> : </td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['details']->value["detail1"]["gender"]=='M'){?>
                                        <?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>

                                        <?php }elseif($_smarty_tpl->tpl_vars['details']->value["detail1"]["gender"]=='F'){?>
                                            <?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>

                                            <?php }?>       </td>

                                        </tr>


                                    </tbody>
                                </table>
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3">   <?php echo $_smarty_tpl->tpl_vars['tran_contact_info']->value;?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td  width="160px"><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
 </td><td width="50px"> : </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["address"];?>
 </td>

                                        </tr>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['tran_country']->value;?>
  </td><td width="50px"> : </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["country"];?>
</td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['tran_state']->value;?>
  </td><td width="50px"> : </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["state"];?>
</td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['tran_pincode']->value;?>
  </td><td width="50px"> : </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["pincode"];?>

                                            </td>

                                        </tr>

                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['tran_mob_no_10_digit']->value;?>
 </td><td width="50px"> : </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["mobile"];?>

                                            </td>

                                        </tr>

                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['tran_land_line_no']->value;?>
  </td><td width="50px"> : </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["land"];?>

                                            </td>

                                        </tr>

                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
  </td><td width="50px"> : </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["email"];?>

                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="panel_edit_account" class="tab-pane<?php echo $_smarty_tpl->tpl_vars['tab2']->value;?>
">
                    <form role="form" method="post" name="user_register" id="user_register" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
user/profile/profile_view" enctype="multipart/form-data" >     
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                            </div>
                        </div>
                        <input type="hidden" name="path" id="path" value="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
user/">
                        <input type="hidden" name="lang_id" id="lang_id" value="<?php echo $_smarty_tpl->tpl_vars['lang_id']->value;?>
">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><?php echo $_smarty_tpl->tpl_vars['tran_sponsor_package_info']->value;?>
</h3>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        <?php echo $_smarty_tpl->tpl_vars['tran_image_upload']->value;?>

                                    </label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload" >
                                        <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/profile_picture/<?php echo $_smarty_tpl->tpl_vars['file_name']->value;?>
" alt="">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                        <div class="user-edit-image-buttons">
                                            <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> <?php echo $_smarty_tpl->tpl_vars['tran_Select_image']->value;?>
</span><span class="fileupload-exists"><i class="fa fa-picture"></i> <?php echo $_smarty_tpl->tpl_vars['tran_Change']->value;?>
</span>
                                                <input type="file" id="userfile" name="userfile">
                                            </span>
                                            <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                <i class="fa fa-times"></i><?php echo $_smarty_tpl->tpl_vars['tran_Remove']->value;?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >
                                        <?php echo $_smarty_tpl->tpl_vars['tran_placement_user_name']->value;?>

                                    </label>
                                    <label class="form-control" readonly="true">
                                        <?php echo $_smarty_tpl->tpl_vars['sponser']->value['name'];?>

                                    </label>

                                </div>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['mlm_plan']->value!="Board"){?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_position']->value;?>

                                        </label>
                                        <label class="form-control" readonly="true">
                                            <?php if ($_smarty_tpl->tpl_vars['details']->value["detail1"]["position"]=='L'){?> <?php echo $_smarty_tpl->tpl_vars['tran_left']->value;?>
 
                                            <?php }elseif($_smarty_tpl->tpl_vars['details']->value["detail1"]["position"]=='R'){?> <?php echo $_smarty_tpl->tpl_vars['tran_right']->value;?>
 
                                            <?php }?>
                                        </label>
                                    </div>
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_package']->value;?>

                                        </label>
                                        <label class="form-control" readonly="true">
                                            <?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>

                                        </label>

                                    </div>
                                </div>


                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=="yes"){?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>

                                        </label>
                                        <label class="form-control" readonly="true">
                                            <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["passcode"];?>

                                        </label>

                                    </div>
                                </div>
                            <?php }?>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>  <?php echo $_smarty_tpl->tpl_vars['tran_personal_info']->value;?>
</h3>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        <?php echo $_smarty_tpl->tpl_vars['tran_name']->value;?>
<span class="symbol required"></span>
                                    </label>
                                    <label class="form-control" readonly="true">
                                        <?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["name"];?>

                                    </label>

                                    <input  class="form-control" name="full_name"  id="full_name" type="hidden" size="22" <?php if ($_smarty_tpl->tpl_vars['user_type']->value!='admin'){?> readonly="readonly" <?php }?> maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["name"];?>
" /></td>
				
						<?php echo form_error('full_name');?>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        <?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
<span class="symbol required"></span>
                                    </label>
                                    <label class="form-control" readonly="true">
                                        <?php echo $_smarty_tpl->tpl_vars['u_name']->value;?>

                                    </label>
                                    <input class="form-control" name="username" id="username" type="hidden"  size="22" maxlength="20" value="<?php echo $_smarty_tpl->tpl_vars['u_name']->value;?>
" /></td>		<?php echo form_error('username');?>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >
                                        <?php echo $_smarty_tpl->tpl_vars['tran_date_of_birth']->value;?>
<span class="symbol required"></span>
                                    </label>
                                    <div class="row" readonly="true">
                                        <input  class="form-control" name="date_of_birth" id="date_of_birth" type="hidden" size="16" maxlength="10" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["dob"];?>
" readonly />  
                                        <?php $_smarty_tpl->tpl_vars['dob'] = new Smarty_variable(explode('-',$_smarty_tpl->tpl_vars['details']->value["detail1"]["dob"]), null, 0);?>
                                        <div class="col-md-3">
                                            <select class="form-control"   name="year" id="year" onchange="change_year(this);" tabindex="1" disabled>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['dob']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['dob']->value[0];?>
</option>
                                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2020+1 - (1900) : 1900-(2020)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1900, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                                <?php }} ?>
                                            </select>
					    <?php echo form_error('year');?>

                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control"  name="month" id="month" onchange="change_month(this);" tabindex="2" disabled>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['dob']->value[1];?>
"><?php echo $_smarty_tpl->tpl_vars['dob']->value[1];?>
</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option></select>
						<?php echo form_error('month');?>

                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control"  name="day" id="day" onchange="change_day(this);" tabindex="3" disabled>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['dob']->value[2];?>
"><?php echo $_smarty_tpl->tpl_vars['dob']->value[2];?>
</option>
                                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }} ?></select>
						    <?php echo form_error('day');?>

                                            </div>

                                        </div>
					    <?php echo form_error('date_of_birth');?>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_gender']->value;?>
<span class="symbol required"></span>
                                        </label>
                                        <div class="row">
                                            <div class="col-md-9">                      
                                                <select name="gender" id="gender" tabindex="4"  class="form-control">
                                                    <option value="" tabindex="10"><?php echo $_smarty_tpl->tpl_vars['tran_select_gender']->value;?>
</option>
                                                    <?php if ($_smarty_tpl->tpl_vars['details']->value["detail1"]["gender"]=='M'){?> 
                                                        <option value='M' selected='selected'><?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>
 </option>
                                                        <option value='F'><?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>
</option>				
                                                    <?php }elseif($_smarty_tpl->tpl_vars['details']->value["detail1"]["gender"]=='F'){?>                
                                                        <option value='M' ><?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>
 </option>
                                                        <option value='F' selected='selected'><?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>
</option>				
                                                    <?php }else{ ?>
                                                        <option value='M' ><?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>
 </option>
                                                        <option value='F'><?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>
</option>
                                                    <?php }?>
                                                </select>   
						<?php echo form_error('gender');?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>  <?php echo $_smarty_tpl->tpl_vars['tran_contact_info']->value;?>
</h3>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
<span class="symbol required"></span>
                                        </label>

                                        <div class="col-md-9">
                                            <textarea  class="form-control"rows="4" name="address" id="address" cols="17" tabindex="5" ><?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["address"];?>
</textarea></td>
					<?php echo form_error('address');?>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_country']->value;?>

                                        </label>
                                        <div class="row">
                                            <div class="col-md-9">   
                                                <select name="country" id="country" tabindex="6" onChange="getAllStates(this.value)" class="form-control">
                                                    <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="prof_state_div">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                <?php echo $_smarty_tpl->tpl_vars['tran_state']->value;?>

                                            </label>
                                            <div class="row">
                                                <div class="col-md-9"> 

                                                    <select name="state" id="state" tabindex="7"  class="form-control">
                                                        <?php echo $_smarty_tpl->tpl_vars['state']->value;?>

                                                    </select>                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['tran_pincode']->value;?>
   </label>

                                        <input  class="form-control" name="pin" id="pin" type="text" tabindex='10' size="8" maxlength="6" placeholder="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["pincode"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["pincode"];?>
"/>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $_smarty_tpl->tpl_vars['tran_mob_no_10_digit']->value;?>
<span class="symbol required"></span>

                                        <input class="form-control"  name="mobile" id="mobile" type="text" tabindex="11" size="22" maxlength="10" autocomplete="Off"   value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["mobile"];?>
"/>
					<?php echo form_error('mobile');?>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['tran_land_line_no']->value;?>
 </label>

                                        <input class="form-control" name="land_line"  id="land_line"  type="text" tabindex="12" size="22" maxlength="20"  placeholder ="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["land"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["land"];?>
"/>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
</label>

                                        <input class="form-control" name="email"  id="email" type="text" tabindex="13" size="22" maxlength="100" autocomplete="Off" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["email"];?>
"/>

                                    </div>
                                </div>
                            </div>
                           <!-- <div class="row">
                                <div class="col-md-12">
                                    <h3> <?php echo $_smarty_tpl->tpl_vars['tran_bank_info']->value;?>
</h3>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_pan_no']->value;?>

                                        </label>             

                                        <input type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["pan"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["pan"];?>
" class="form-control" name="pan_no" id="pan_no" tabindex="16">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_bank_account_number']->value;?>

                                        </label>

                                        <input class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["acnumber"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["acnumber"];?>
" type="text" name="bank_acc_no" id="bank_acc_no" tabindex="17" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_ifsc_code']->value;?>

                                        </label>             

                                        <input type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["ifsc"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["ifsc"];?>
" class="form-control" name="ifsc" id="ifsc" tabindex="18">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_bank_name']->value;?>

                                        </label>

                                        <input class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["nbank"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["nbank"];?>
" type="text"  name="bank_name" id="bank_name" tabindex="19">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_branch_name']->value;?>

                                        </label>

                                        <input class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["nbranch"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['details']->value["detail1"]["nbranch"];?>
" type="text" name="bank_branch" id="bank_branch" tabindex="20">
                                    </div>
                                </div>
                            </div>-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div><span class="symbol required"></span>
                                        <?php echo $_smarty_tpl->tpl_vars['tran_Required_Fields']->value;?>

                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <p>
                                        <?php echo $_smarty_tpl->tpl_vars['tran_term']->value;?>

                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-bricky" type="submit" name="update_profile"  id="update_profile" value="update_profile" tabindex="23">
                                        <?php echo $_smarty_tpl->tpl_vars['tran_update_profile']->value;?>
 <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>

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
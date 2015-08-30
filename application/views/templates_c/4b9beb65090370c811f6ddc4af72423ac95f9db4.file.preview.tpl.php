<?php /* Smarty version Smarty 3.1.4, created on 2015-08-14 16:10:51
         compiled from "application/views/register/preview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149065962355ce595b731502-96812801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b9beb65090370c811f6ddc4af72423ac95f9db4' => 
    array (
      0 => 'application/views/register/preview.tpl',
      1 => 1438428236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149065962355ce595b731502-96812801',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_type' => 0,
    'tran_You_must_enter_user_name' => 0,
    'tran_you_must_enter_your_password' => 0,
    'tran_You_must_enter_your_Password_again' => 0,
    'tran_You_must_enter_your_email' => 0,
    'tran_You_must_enter_your_mobile_no' => 0,
    'tran_you_must_enter_your_name' => 0,
    'tran_sure_you_want_to_delete_this_feedback_there_is_no_undo' => 0,
    'tran_preview' => 0,
    'PUBLIC_URL' => 0,
    'letter_arr' => 0,
    'uname' => 0,
    'tran_distributers_name' => 0,
    'user_details' => 0,
    'tran_address' => 0,
    'tran_date_of_joining' => 0,
    'tran_phone_number' => 0,
    'tran_pan_number' => 0,
    'referal_status' => 0,
    'tran_sponsor' => 0,
    'sponsorname' => 0,
    'tran_Placment_ID' => 0,
    'adjusted_id' => 0,
    'reg_amount' => 0,
    'product_status' => 0,
    'tran_package' => 0,
    'prdt_arr' => 0,
    'FOOTER_DEMO_STATUS' => 0,
    'tran_Login_Link' => 0,
    'PATH_TO_ROOT' => 0,
    'admin_user_name' => 0,
    'tran_winning_regards' => 0,
    'tran_admin' => 0,
    'tran_place' => 0,
    'tran_date' => 0,
    'Date' => 0,
    'id' => 0,
    'tran_go_to_tree_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55ce595bc361c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ce595bc361c')) {function content_55ce595bc361c($_smarty_tpl) {?>
<style type="text/css">
    body{
        font-family:Arial, Helvetica, sans-serif;
        font-size:12px;
        margin:0px;
        line-height:18px;
    }
    img{
        border:none;
    }
    .brdr_style{
        border:1px solid #ccc;
    }
    .text_trnfm{
        text-transform:uppercase;
    }
</style>

<style type="text/css" media="print">
    body * { visibility: hidden; }
    #print_div * { 
        visibility: visible; 
    }
    #print_div { 
        position: absolute; 
        top: 30px; 
        left: 10px; 
        width: 95%; 
        font-family:Arial, Helvetica, sans-serif;
        font-size:13px;
        margin:0px;
        line-height:24px;
    }
</style>


<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='distributor'){?>﻿
    <?php echo $_smarty_tpl->getSubTemplate ("user/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php }?>

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_user_name']->value;?>
</span>        
    <span id="error_msg2"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_password']->value;?>
</span>        
    <span id="error_msg3"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_your_Password_again']->value;?>
</span>        
    <span id="error_msg4"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_your_email']->value;?>
</span>                  
    <span id="error_msg5"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_your_mobile_no']->value;?>
</span>
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_your_name']->value;?>
</span>
    <span id="confirm_msg"><?php echo $_smarty_tpl->tpl_vars['tran_sure_you_want_to_delete_this_feedback_there_is_no_undo']->value;?>
</span>
</div> 

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $_smarty_tpl->tpl_vars['tran_preview']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>

            </div>
            <div class="panel-body">

                <div id="print_div">
                    <table width = "100%">
                        <tr>
                            <td>   
                                <img  height="50px" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['logo'];?>
" alt="" /> 
                            </td>
                            <td align="right">
                                <?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['company_name'];?>
 <br />
                                <?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['address_of_company'];?>

                            </td>
                        </tr>
                        <tr><td colspan="2"><hr /></td></tr>
                    </table>
                    <table> 
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">Username</label>
                            </td>
                            <td>

                                :  <?php echo $_smarty_tpl->tpl_vars['uname']->value;?>


                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_distributers_name']->value;?>
</label>
                            </td>
                            <td>

                                :  <?php echo $_smarty_tpl->tpl_vars['user_details']->value['user_detail_name'];?>


                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
</label>
                            </td>
                            <td>

                                :  <?php echo $_smarty_tpl->tpl_vars['user_details']->value['user_detail_address'];?>


                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_date_of_joining']->value;?>
</label>
                            </td>
                            <td>

                                :  <?php echo $_smarty_tpl->tpl_vars['user_details']->value['join_date'];?>


                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_phone_number']->value;?>
</label>
                            </td>
                            <td>

                                :  <?php echo $_smarty_tpl->tpl_vars['user_details']->value['user_detail_mobile'];?>


                            </td>
                        </tr>
  
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_pan_number']->value;?>
</label>
                            </td>
                            <td>

                                :  <?php echo $_smarty_tpl->tpl_vars['user_details']->value['user_detail_pan'];?>


                            </td>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['referal_status']->value=="yes"){?>
                            <tr style="font-size: 13px;">
                                <td>   
                                    <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_sponsor']->value;?>
</label>
                                </td>
                                <td>

                                    :  <?php echo $_smarty_tpl->tpl_vars['sponsorname']->value;?>


                                </td>
                            </tr>

                        <?php }?>

                        <div class="row">

                            <tr style="font-size: 13px;">
                                <td>   
                                    <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_Placment_ID']->value;?>
</label>
                                </td>
                                <td>

                                    :  <?php echo $_smarty_tpl->tpl_vars['adjusted_id']->value;?>


                                </td>
                            </tr>
                            
                            <?php if ($_smarty_tpl->tpl_vars['reg_amount']->value>0){?>
                                <tr style="font-size: 13px;">
                                    <td>   
                                        <label class="col-sm-12" for="user_name">Registration Amount</label>
                                    </td>
                                    <td>

                                        :  <?php echo $_smarty_tpl->tpl_vars['reg_amount']->value;?>


                                    </td>
                                </tr>
                            <?php }?>
                            
                            
                            <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>
                                <tr style="font-size: 13px;">
                                    <td>   
                                        <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_package']->value;?>
</label>
                                    </td>
                                    <td>

                                        :  <?php echo $_smarty_tpl->tpl_vars['prdt_arr']->value["product_name"];?>


                                    </td>
                                </tr>
                                <tr style="font-size: 13px;">
                                    <td>   
                                        <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_package']->value;?>
</label>
                                    </td>
                                    <td>

                                        :  <?php echo $_smarty_tpl->tpl_vars['prdt_arr']->value["product_value"];?>


                                    </td>
                                </tr>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['FOOTER_DEMO_STATUS']->value=="yes"){?>
                            <tr style="font-size: 13px;">
                                <td>   
                                    <label class="col-sm-12" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_Login_Link']->value;?>
</label>
                                </td>
                                <td>

                                    :  <?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT']->value;?>
login/index/user/<?php echo $_smarty_tpl->tpl_vars['admin_user_name']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['uname']->value;?>

                                </td>
                            </tr>
                            <?php }?>
                    </table>

                    <br/>
                    <hr/>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    <?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['main_matter'];?>

                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    <?php echo $_smarty_tpl->tpl_vars['tran_winning_regards']->value;?>
,
                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    <?php echo $_smarty_tpl->tpl_vars['tran_admin']->value;?>

                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    <?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['company_name'];?>
 
                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_place']->value;?>
</label>

                            <div class="col-sm-12">
                                <?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['place'];?>

                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</label>

                            <div class="col-sm-12">
                                <?php echo $_smarty_tpl->tpl_vars['Date']->value;?>

                            </div>
                        </div></div>
                </div>


                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                    <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    <td align="right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/tree/genology_tree" style="text-decoration:none">

                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-bricky"  value="<?php echo $_smarty_tpl->tpl_vars['tran_go_to_tree_view']->value;?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['tran_go_to_tree_view']->value;?>

                                </button>
                            </div>
                        </a></td>
                    <td>
                        <div id = "frame">
                            <a href="" onClick="window.print();
                                    return false"> <img align="right" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/1335779082_document-print.png" alt="Print" border="none"></a>	
                        </div></td>
                    </tr>
                </table>



            </div>
        </div>
    </div>
</div>




<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='user'){?>﻿
    <?php echo $_smarty_tpl->getSubTemplate ("user/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }?>

<script>

    Main.init();
    jQuery(document).ready(function() {
        //  Main.init();
        //DatePicker.init();

        //  ValidateUser.init();

    });

</script>

<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='user'){?>﻿
    <?php echo $_smarty_tpl->getSubTemplate ("user/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php }?>

<?php }} ?>
<?php /* Smarty version Smarty 3.1.4, created on 2015-08-16 18:57:08
         compiled from "application/views/admin/member/search_member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206189622455bce6cbaf1b68-27656017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64933e5c6f4ea3125fdfbc2e500f5142d8052825' => 
    array (
      0 => 'application/views/admin/member/search_member.tpl',
      1 => 1439275393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206189622455bce6cbaf1b68-27656017',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bce6cbc8254',
  'variables' => 
  array (
    'tran_You_must_enter_keyword_to_search' => 0,
    'tran_Sure_you_want_to_Block_this_User_There_is_NO_undo' => 0,
    'tran_Sure_you_want_to_Activate_this_User_There_is_NO_undo' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_search_member' => 0,
    'tran_errors_check' => 0,
    'tran_keyword' => 0,
    'tran_Username_Name_Nominee_Address_MobileNo_City' => 0,
    'BASE_URL' => 0,
    'PUBLIC_URL' => 0,
    'flag' => 0,
    'count' => 0,
    'tran_member_details' => 0,
    'tran_user_name' => 0,
    'tran_name' => 0,
    'tran_sponser_name' => 0,
    'tran_mobile_no' => 0,
    'tran_address' => 0,
    'tran_status' => 0,
    'tran_view_profile' => 0,
    'tran_action' => 0,
    'mem_arr' => 0,
    'i' => 0,
    'v' => 0,
    'active' => 0,
    'tran_active' => 0,
    'tran_blocked' => 0,
    'user_name' => 0,
    'user_detail_name' => 0,
    'sponser_name' => 0,
    'user_detail_mobile' => 0,
    'user_detail_address' => 0,
    'status' => 0,
    'PATH_TO_ROOT_DOMAIN' => 0,
    'encrypt_id' => 0,
    'id' => 0,
    'tran_block' => 0,
    'tran_activate' => 0,
    'result_per_page' => 0,
    'tran_No_User_Found' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bce6cbc8254')) {function content_55bce6cbc8254($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display: none;">
    <span id="errmsg"><?php echo $_smarty_tpl->tpl_vars['tran_You_must_enter_keyword_to_search']->value;?>
</span>
    <span id="block_msg"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_Block_this_User_There_is_NO_undo']->value;?>
</span>
    <span id="activate_msg"><?php echo $_smarty_tpl->tpl_vars['tran_Sure_you_want_to_Activate_this_User_There_is_NO_undo']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   <?php echo $_smarty_tpl->tpl_vars['tran_search_member']->value;?>

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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="search_mem" id="search_mem" >

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keyword"><?php echo $_smarty_tpl->tpl_vars['tran_keyword']->value;?>
<span class="symbol required"></span> </label>
                        <div class="col-sm-3">
                            <input placeholder="<?php echo $_smarty_tpl->tpl_vars['tran_Username_Name_Nominee_Address_MobileNo_City']->value;?>
.."type="text" name="keyword" id="keyword" size="50"  autocomplete="Off" tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <input type="hidden" name="base_url" id="base_url" value="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
admin/">

                            <button class="btn btn-bricky"  type="submit" name="search_member" id="search_member" value="<?php echo $_smarty_tpl->tpl_vars['tran_search_member']->value;?>
" tabindex="2" > <?php echo $_smarty_tpl->tpl_vars['tran_search_member']->value;?>
 </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
">
                </form>
            </div>
        </div>

    </div>

</div>    



<?php if ($_smarty_tpl->tpl_vars['flag']->value){?>         
    <?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>  <?php echo $_smarty_tpl->tpl_vars['tran_member_details']->value;?>
 
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
                        <br />


                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1"> 
                            <thead>
                                <tr class="th">
                                    <th>Sl.No</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_name']->value;?>
</th>
                                    <th class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['tran_sponser_name']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_mobile_no']->value;?>
</th>
                                    <th class="hidden-xs" ><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
</th>                            
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_status']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_view_profile']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['tran_action']->value;?>
</th>
                                </tr>

                            </thead>
                            <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                            <tbody>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mem_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr1', null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr2', null, 0);?>
                                    <?php }?>

                                    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_id']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["user_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_name']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["user_detail_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_name']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["user_detail_address"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_address']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["user_detail_mobile"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_mobile']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["user_detail_town"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_town']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["user_detail_nominee"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_nominee']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["user_detail_country"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_detail_country']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["encrypt_id"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['user_id_en']), null, 0);?>

                                    <?php $_smarty_tpl->tpl_vars["active"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['active']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["sponser_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['v']->value['sponser_name']), null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('', null, 0);?>

                                    <?php if ($_smarty_tpl->tpl_vars['active']->value=='yes'){?>
                                        <?php $_smarty_tpl->tpl_vars['status'] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_active']->value), null, 0);?>

                                        <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("Block", null, 0);?>
                                    <?php }else{ ?>
                                        <?php $_smarty_tpl->tpl_vars['status'] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_blocked']->value), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("Activate", null, 0);?>
                                    <?php }?>

                                    <tr>      
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user_detail_name']->value;?>
</td>
                                        <td class="hidden-xs" ><?php echo $_smarty_tpl->tpl_vars['sponser_name']->value;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user_detail_mobile']->value;?>
</td>
                                        <td class="hidden-xs" ><?php echo $_smarty_tpl->tpl_vars['user_detail_address']->value;?>
</td>                             
                                        <td><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</td>
                                        <td><center> 
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['PATH_TO_ROOT_DOMAIN']->value;?>
admin/profile/profile_view/<?php echo $_smarty_tpl->tpl_vars['encrypt_id']->value;?>
" class="btn btn-green">
                                        <i class="glyphicon glyphicon-camera"></i> 
                                    </a>
                                </center>
                                </td>
                                <?php if ($_smarty_tpl->tpl_vars['active']->value=='yes'){?>
                                    <td><center>
                                        <a href="javascript:block_user(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
,'yes')" onclick=""  class="btn btn-bricky tooltips" data-placement="top" data-original-title=<?php echo $_smarty_tpl->tpl_vars['tran_block']->value;?>
>

                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                        </a>
                                    </center>
                                </td><?php }else{ ?><td><center>
                                <a href="javascript:block_user(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
,'no')" onclick=""  class="btn btn-green tooltips" data-placement="top" data-original-title=<?php echo $_smarty_tpl->tpl_vars['tran_activate']->value;?>
>

                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                            </center></td><?php }?>
                            </tr>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                            <?php } ?>
                                </tbody>
                            </table>
                            <?php echo $_smarty_tpl->tpl_vars['result_per_page']->value;?>

                        </div>
                    </div>
                </div>   
            </div>  

            <?php }elseif(isset($_POST)&&isset($_POST['keyword'])){?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i>  <?php echo $_smarty_tpl->tpl_vars['tran_member_details']->value;?>
 
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
                                <tbody>
                                    <tr><td colspan="10" align="center"><h4><?php echo $_smarty_tpl->tpl_vars['tran_No_User_Found']->value;?>
</h4></td></tr>
                                </tbody>    
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>  

                <?php }?>
                    <?php }?>

                        <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
 
                        <script>
                            jQuery(document).ready(function () {
                                Main.init();
                                TableData.init();
                                ValidateMember.init();
                            });
                        </script>
                        <?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
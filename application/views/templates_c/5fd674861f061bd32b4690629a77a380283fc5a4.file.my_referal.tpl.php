<?php /* Smarty version Smarty 3.1.4, created on 2015-08-10 00:36:42
         compiled from "application/views/admin/configuration/my_referal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163170160055c8386a635154-18755308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd674861f061bd32b4690629a77a380283fc5a4' => 
    array (
      0 => 'application/views/admin/configuration/my_referal.tpl',
      1 => 1438429184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163170160055c8386a635154-18755308',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_user_name' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_nofond' => 0,
    'tran_showing' => 0,
    'tran_to' => 0,
    'tran_of' => 0,
    'tran_entries' => 0,
    'tran_notavailable' => 0,
    'tran_users_referal_details' => 0,
    'tran_errors_check' => 0,
    'tran_user_name' => 0,
    'tran_view_refferal_details' => 0,
    'PUBLIC_URL' => 0,
    'count' => 0,
    'view' => 0,
    'tran_referal_details' => 0,
    'user_name' => 0,
    'tran_full_name' => 0,
    'tran_joinig_date' => 0,
    'trans_email' => 0,
    'trans_country' => 0,
    'arr' => 0,
    'v' => 0,
    'i' => 0,
    'result_per_page' => 0,
    'tran_no_referels' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c8386a735af',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c8386a735af')) {function content_55c8386a735af($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div id="span_js_messages" style="display: none;">
    <span id="errmsg1"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_user_name']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
    <span id="nofond"><?php echo $_smarty_tpl->tpl_vars['tran_nofond']->value;?>
</span>
    <span id="showing"><?php echo $_smarty_tpl->tpl_vars['tran_showing']->value;?>
</span>
    <span id="to"><?php echo $_smarty_tpl->tpl_vars['tran_to']->value;?>
</span>
    <span id="of"><?php echo $_smarty_tpl->tpl_vars['tran_of']->value;?>
</span>
    <span id="entries"><?php echo $_smarty_tpl->tpl_vars['tran_entries']->value;?>
</span>
    <span id="notavailable"><?php echo $_smarty_tpl->tpl_vars['tran_notavailable']->value;?>
</span>
</div>
<?php if (!isset($_POST['referral_view'])){?>
<div class="row" >
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_users_referal_details']->value;?>
 
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
                <form role="form" class="smart-wizard form-horizontal" name="admin_referal_form" id="admin_referal_form" method="post" action='' >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>
.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name"><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
<font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <input type="text" name="user_name" id="user_name" onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no', event)" autocomplete="Off" tabindex="1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">                         

                            <button class="btn btn-bricky" type="submit" name="referal_details"  id="referal_details" value="<?php echo $_smarty_tpl->tpl_vars['tran_view_refferal_details']->value;?>
"  tabindex="4"><?php echo $_smarty_tpl->tpl_vars['tran_view_refferal_details']->value;?>
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
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/profile/user_summary_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
        <?php if ($_smarty_tpl->tpl_vars['view']->value!='yes'){?>
    <div class="row">
        <div class="col-sm-12">
            <div id="referal_det">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_referal_details']->value;?>
 : <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>

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
                        <table border="0" align="center" width="100%" class="table table-striped table-bordered table-hover table-full-width" id="sample_1" >
                            <thead>
                                <tr class="th" >                           
                                    <th ><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</th>
                                    <th ><?php echo $_smarty_tpl->tpl_vars['tran_full_name']->value;?>
</th>
                                    <th ><?php echo $_smarty_tpl->tpl_vars['tran_joinig_date']->value;?>
</th>
                                    <th> <?php echo $_smarty_tpl->tpl_vars['trans_email']->value;?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['trans_country']->value;?>
</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("0", null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>


                                    <tr >                                   
                                        <td  ><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
                                        <td  ><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
                                        <td  ><?php echo $_smarty_tpl->tpl_vars['v']->value['join_date'];?>
</td>
                                        <td> <?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['country'];?>
</td>
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
    </div>
                        <?php }?>
<?php }elseif(isset($_POST['user_name'])||isset($_POST['referral_view'])){?> 
    <div class="row">
        <div class="col-sm-12">
            <div id="referal_det">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> <?php echo $_smarty_tpl->tpl_vars['tran_referal_details']->value;?>

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
                        <table border="0" align="center" width="100%" class="table table-striped table-bordered table-hover table-full-width" id="sample_1" >

                            <tbody>
                                <tr colspan="3"> <td><h3><?php echo $_smarty_tpl->tpl_vars['tran_no_referels']->value;?>
</h3></td> </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['count']->value>0){?>
    <script>
                                jQuery(document).ready(function() {
                                    //document.getElementById('referal_det').style.display = 'none';
                                    Main.init();
                                    TableData.init();
                                });
    </script>
<?php }else{ ?>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            
        });
    </script>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
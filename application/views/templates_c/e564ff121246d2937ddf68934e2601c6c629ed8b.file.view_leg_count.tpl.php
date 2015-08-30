<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:37:57
         compiled from "application/views/admin/leg_count/view_leg_count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149608898055bba465435226-87881027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e564ff121246d2937ddf68934e2601c6c629ed8b' => 
    array (
      0 => 'application/views/admin/leg_count/view_leg_count.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149608898055bba465435226-87881027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_you_must_enter_user_name' => 0,
    'tran_rows' => 0,
    'tran_shows' => 0,
    'tran_leg_count' => 0,
    'tran_errors_check' => 0,
    'tran_select_user_name' => 0,
    'tran_view' => 0,
    'legcount' => 0,
    'is_valid_username' => 0,
    'tran_Username_not_Exists' => 0,
    'user_name' => 0,
    'tran_no' => 0,
    'tran_userid_fullname' => 0,
    'tran_left_point' => 0,
    'tran_right_point' => 0,
    'tran_left_carry' => 0,
    'tran_right_carry' => 0,
    'tran_amount' => 0,
    'count' => 0,
    'users' => 0,
    't' => 0,
    'left_leg_tot' => 0,
    'left' => 0,
    'right_leg_tot' => 0,
    'right' => 0,
    'left_carry_tot' => 0,
    'left_carry' => 0,
    'right_carry_tot' => 0,
    'right_carry' => 0,
    'total_leg_tot' => 0,
    'tot_leg' => 0,
    'total_amount_tot' => 0,
    'tot_amt' => 0,
    'k' => 0,
    'class' => 0,
    'tran_total' => 0,
    'tran_No_Leg_Count_Found' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba465588ec',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba465588ec')) {function content_55bba465588ec($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/uflipca/membres/system/libraries/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div id="span_js_messages" style="display: none;">
    <span id="error_msg"><?php echo $_smarty_tpl->tpl_vars['tran_you_must_enter_user_name']->value;?>
</span>
    <span id="row_msg"><?php echo $_smarty_tpl->tpl_vars['tran_rows']->value;?>
</span>
    <span id="show_msg"><?php echo $_smarty_tpl->tpl_vars['tran_shows']->value;?>
</span>
</div>

<?php if (!isset($_POST['leg_count_view'])){?>
    <div class="row" >
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_leg_count']->value;?>

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
                <div class="row">
                    <div class="col-sm-12">                   
                        <div class="panel-body">
                            <form role="form" class="smart-wizard form-horizontal" name="legcount" id="legcount" action="" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="errorHandler alert alert-danger no-display">
                                        <i class="fa fa-times-sign"></i> <?php echo $_smarty_tpl->tpl_vars['tran_errors_check']->value;?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="user_name"> <?php echo $_smarty_tpl->tpl_vars['tran_select_user_name']->value;?>
<font color="#ff0000" >*</font> </label>
                                    <div class="col-sm-3">
                                        <input  name="user_name" id="user_name" type="text" size="30" onkeyup="ajax_showOptions(this, 'getCountriesByLetter', 'no', event)" autocomplete="off" tabindex="1">
                                        <span class="help-block" for="user_name"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 col-sm-offset-2">
                                        <button class="btn btn-bricky" type="submit" id="leg_count" value="leg_count" name="leg_count" tabindex="2">
                                            <?php echo $_smarty_tpl->tpl_vars['tran_view']->value;?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/profile/user_summary_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['legcount']->value){?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <?php if ($_smarty_tpl->tpl_vars['legcount']->value){?>
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i><?php echo $_smarty_tpl->tpl_vars['tran_leg_count']->value;?>

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

                    <div class="row">
                        <div class="col-sm-12"><div class="center">
                                <?php if (!$_smarty_tpl->tpl_vars['is_valid_username']->value){?>
                                    <h4 align="center"><font color="#FF0000"><?php echo $_smarty_tpl->tpl_vars['tran_Username_not_Exists']->value;?>
</font></h4>
                                    <?php }else{ ?>

                                    <h4><?php echo $_smarty_tpl->tpl_vars['tran_leg_count']->value;?>
  : <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</h4>
                                </div>                     

                                <div class="panel-body">

                                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample">
                                        <thead>
                                            <tr class="th" align="center">

                                            <tr class="th"> 
                                                <th><?php echo $_smarty_tpl->tpl_vars['tran_no']->value;?>
</th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['tran_userid_fullname']->value;?>
</th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['tran_left_point']->value;?>
</th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['tran_right_point']->value;?>
</th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['tran_left_carry']->value;?>
</th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['tran_right_carry']->value;?>
</th>
                                                <th><b><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
</b></th>
                                            </tr>

                                        </thead>

                                        <?php if ($_smarty_tpl->tpl_vars['count']->value!=0){?>

                                            <?php $_smarty_tpl->tpl_vars["left_leg_tot"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["right_leg_tot"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["left_carry_tot"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["right_carry_tot"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["total_leg_tot"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["total_leg_tot"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["total_amount_tot"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["k"] = new Smarty_variable("0", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
                                            <tbody align="center">
                                                <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>

                                                    <?php $_smarty_tpl->tpl_vars["left"] = new Smarty_variable(($_smarty_tpl->tpl_vars['t']->value['total_left_count']), null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars["right"] = new Smarty_variable(($_smarty_tpl->tpl_vars['t']->value['total_right_count']), null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars["left_carry"] = new Smarty_variable(($_smarty_tpl->tpl_vars['t']->value['total_left_carry']), null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars["right_carry"] = new Smarty_variable(($_smarty_tpl->tpl_vars['t']->value['total_right_carry'])."}", null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars["tot_leg"] = new Smarty_variable(($_smarty_tpl->tpl_vars['t']->value['total_leg']), null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars["tot_amt"] = new Smarty_variable(($_smarty_tpl->tpl_vars['t']->value['total_amount']), null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['left_leg_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['left_leg_tot']->value+$_smarty_tpl->tpl_vars['left']->value, null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['right_leg_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['right_leg_tot']->value+$_smarty_tpl->tpl_vars['right']->value, null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['left_carry_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['left_carry_tot']->value+$_smarty_tpl->tpl_vars['left_carry']->value, null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['right_carry_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['right_carry_tot']->value+$_smarty_tpl->tpl_vars['right_carry']->value, null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['total_leg_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_leg_tot']->value+$_smarty_tpl->tpl_vars['tot_leg']->value, null, 0);?>
                                                    <?php $_smarty_tpl->tpl_vars['total_amount_tot'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_amount_tot']->value+$_smarty_tpl->tpl_vars['tot_amt']->value, null, 0);?>

                                                    <?php if ($_smarty_tpl->tpl_vars['k']->value%2==0){?>
                                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr1', null, 0);?>
                                                    <?php }else{ ?>
                                                        <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('tr2', null, 0);?>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>

                                                        <td><?php echo $_smarty_tpl->tpl_vars['t']->value['user_nmae'];?>
-<?php echo $_smarty_tpl->tpl_vars['t']->value['user_detail_name'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['t']->value['total_left_count'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['t']->value['total_right_count'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['t']->value['total_left_carry'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['t']->value['total_right_carry'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['t']->value['total_amount'];?>
</td>

                                                    </tr>

                                                    <?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value+1, null, 0);?>

                                                <?php } ?>




                                                <tr class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" align="center" >
                                                    <td><b></b></td>
                                                    <td><b><?php echo $_smarty_tpl->tpl_vars['tran_total']->value;?>
</b></td>
                                                    <td><b><?php echo $_smarty_tpl->tpl_vars['left_leg_tot']->value;?>
</b></td>
                                                    <td><b><?php echo $_smarty_tpl->tpl_vars['right_leg_tot']->value;?>
</b></td>
                                                    <td><b><?php echo $_smarty_tpl->tpl_vars['left_carry_tot']->value;?>
</b></td>
                                                    <td><b><?php echo $_smarty_tpl->tpl_vars['right_carry_tot']->value;?>
</b></td>
                                                    <td><b><?php echo $_smarty_tpl->tpl_vars['total_amount_tot']->value;?>
</b></td>
                                                </tr>



                                            </tbody>


                                        <?php }else{ ?>
                                            <h3><?php echo $_smarty_tpl->tpl_vars['tran_No_Leg_Count_Found']->value;?>
</h3>
                                        <?php }?>          
                                    </table>

                                </div>

                            <?php }?>
                        </div>
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
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
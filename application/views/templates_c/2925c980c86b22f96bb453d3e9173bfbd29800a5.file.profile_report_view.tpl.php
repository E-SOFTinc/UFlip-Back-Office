<?php /* Smarty version Smarty 3.1.4, created on 2015-08-17 02:13:53
         compiled from "application/views/admin/report/profile_report_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146813176655ca15c96e8198-30189016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2925c980c86b22f96bb453d3e9173bfbd29800a5' => 
    array (
      0 => 'application/views/admin/report/profile_report_view.tpl',
      1 => 1439795586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146813176655ca15c96e8198-30189016',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55ca15c979273',
  'variables' => 
  array (
    'tran_profile_report' => 0,
    'details' => 0,
    'tran_name' => 0,
    'v' => 0,
    'tran_user_name' => 0,
    'u_name' => 0,
    'tran_sponser_name' => 0,
    'sponser' => 0,
    'tran_pincode' => 0,
    'tran_state' => 0,
    'tran_mobile_no' => 0,
    'tran_land_line_no' => 0,
    'tran_email' => 0,
    'tran_date_of_birth' => 0,
    'tran_gender' => 0,
    'tran_male' => 0,
    'tran_female' => 0,
    'tran_click_here_print' => 0,
    'PUBLIC_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ca15c979273')) {function content_55ca15c979273($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["report_name"] = new Smarty_variable(($_smarty_tpl->tpl_vars['tran_profile_report']->value), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/report/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<div class='box'>

    <table width="100%" border="1" cellpadding="0" cellspacing="0" align="center" id="datastore" class="profile_report_tbl" >
        <tr class="text">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_name']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_name'];?>
</td>
            </tr>
          
            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_user_name']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['u_name']->value;?>
</td>
            </tr>

            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_sponser_name']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['sponser']->value['name'];?>
</td>
            </tr>
            
            <tr >
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_pincode']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_pin'];?>
</td>
            </tr>
            
            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_state']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_state'];?>
</td>
            </tr>
            <tr >
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_mobile_no']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_mobile'];?>
</td>
            </tr>
            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_land_line_no']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_land'];?>
</td>
            </tr>
            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_email'];?>
</td>
            </tr>
            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_date_of_birth']->value;?>
 </strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_detail_dob'];?>
</td>
            </tr>
            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_gender']->value;?>
</strong></td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['user_detail_gender']=='M'){?>
                        <?php echo $_smarty_tpl->tpl_vars['tran_male']->value;?>

                    <?php }else{ ?>
                        <?php echo $_smarty_tpl->tpl_vars['tran_female']->value;?>

                    <?php }?>      
            </tr>
        <?php } ?>

    </table>
</div>
<div id = "frame">
    <table align="center" style="margin-top:2px;">
        <tr>
            <td>
        <center>
            <?php echo $_smarty_tpl->tpl_vars['tran_click_here_print']->value;?>

        </center>
        </td>
        <td>
            <a href="" onClick="window.print();
                        return false">
                <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
/images/1335779082_document-print.png" alt="Print" border="none"></a>
        </td>
        </tr>
    </table>
</div><?php }} ?>
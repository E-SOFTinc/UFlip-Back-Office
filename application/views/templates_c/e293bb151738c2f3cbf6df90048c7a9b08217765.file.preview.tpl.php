<?php /* Smarty version Smarty 3.1.4, created on 2015-08-05 15:58:55
         compiled from "application/views/admin/configuration/preview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79171968955c2790f7d50a6-23640483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e293bb151738c2f3cbf6df90048c7a9b08217765' => 
    array (
      0 => 'application/views/admin/configuration/preview.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79171968955c2790f7d50a6-23640483',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PUBLIC_URL' => 0,
    'letter_arr' => 0,
    'tran_distributers_name' => 0,
    'tran_address' => 0,
    'tran_date_of_joining' => 0,
    'tran_phone_number' => 0,
    'tran_nominee' => 0,
    'tran_pan_number' => 0,
    'referal_status' => 0,
    'tran_sponsor' => 0,
    'tran_Placment_ID' => 0,
    'product_status' => 0,
    'tran_package' => 0,
    'tran_amount' => 0,
    'tran_winning_regards' => 0,
    'tran_admin' => 0,
    'tran_place' => 0,
    'tran_date' => 0,
    'Date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55c2790f8dec0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c2790f8dec0')) {function content_55c2790f8dec0($_smarty_tpl) {?>
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
        font-size:13pt;
        margin:0px;
        line-height:24px;
    }
</style>

<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>


<div class="box" >

    <div id="print_div">


        <table width="100%" align="center" cellpadding="5" cellspacing="0" bgcolor = "white">
            <tr>
                <td>
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
                </td>
            </tr>
            <tr>
                <td>
                    <table width = "50%">
                        <tr>
                            <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_distributers_name']->value;?>
</b></td>
                            <td width="50%">:NA </td>
                        </tr>
                        <tr>
                            <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_address']->value;?>
 </b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_date_of_joining']->value;?>
</b> </td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_phone_number']->value;?>
 </b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_nominee']->value;?>
 </b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_pan_number']->value;?>
</b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['referal_status']->value=="yes"){?>
                            <tr>
                                <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_sponsor']->value;?>
 </b></td>
                                <td width="50%">:NA</td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_Placment_ID']->value;?>
</b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['product_status']->value=="yes"){?>
                            <tr>
                                <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_package']->value;?>
 </b></td>
                                <td width="50%">:NA</td>
                            </tr>
                            <tr>
                                <td width="50%"><b><?php echo $_smarty_tpl->tpl_vars['tran_amount']->value;?>
 </b></td>
                                <td width="50%">:NA</td>
                            </tr>
                        <?php }?>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['main_matter'];?>

                </td>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['tran_winning_regards']->value;?>
, <br /><b><?php echo $_smarty_tpl->tpl_vars['tran_admin']->value;?>
</b><br /><?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['company_name'];?>
 </td>
            </tr>
            <tr>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['tran_place']->value;?>
</strong> :  <?php echo $_smarty_tpl->tpl_vars['letter_arr']->value['place'];?>
<br />
                    <strong><?php echo $_smarty_tpl->tpl_vars['tran_date']->value;?>
</strong> : <?php echo $_smarty_tpl->tpl_vars['Date']->value;?>
</td>	
            </tr>
        </table>
    </div>
    <hr>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
        <input type="hidden" id="id" name="id" value="">
       
        <td>
            <div id = "frame">
                <a href="" onClick="window.print();return false"> <img align="right" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/1335779082_document-print.png" alt="Print" border="none"></a>	
            </div></td>
        </tr>
    </table>
</div>   
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>

<script>
    jQuery(document).ready(function() {
    Main.init();               
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>
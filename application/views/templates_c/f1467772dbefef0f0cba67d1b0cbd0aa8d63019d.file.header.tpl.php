<?php /* Smarty version Smarty 3.1.4, created on 2015-07-31 11:33:08
         compiled from "application/views/admin/report/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86264273955bba3446d7032-83497811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1467772dbefef0f0cba67d1b0cbd0aa8d63019d' => 
    array (
      0 => 'application/views/admin/report/header.tpl',
      1 => 1438230077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86264273955bba3446d7032-83497811',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tran_Welcome_to' => 0,
    'site_info' => 0,
    'PUBLIC_URL' => 0,
    'report_header' => 0,
    'tran_comp' => 0,
    'tran_phone' => 0,
    'tran_email' => 0,
    'tran_Date' => 0,
    'date' => 0,
    'report_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bba3447429b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bba3447429b')) {function content_55bba3447429b($_smarty_tpl) {?><html xmlns="https://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $_smarty_tpl->tpl_vars['tran_Welcome_to']->value;?>
<?php echo $_smarty_tpl->tpl_vars['site_info']->value['company_name'];?>
</title>
        <style type="text/css">
            body { font:12px Arial; margin:25px; background:#fff url(../../public_html/images/bg_print.gif) repeat-x }
            #content{ height:auto;width:auto;margin:auto; }
            #tablewrapper { width:auto; margin:0 auto;padding:20px;background-color:#fff;border:1px solid #c6d5e1; }
            #tablewrapper table{ margin:auto;}
            #tableheader { height:55px }
            #tableheader select { float:left; font-size:12px; width:125px; padding:2px 4px 4px }
            #tableheader input { float:left; font-size:12px; width:225px; padding:2px 4px 4px; margin-left:4px }
            #tablefooter { height:15px; margin-top:20px }
            #tablenav { float:left }
            #tablenav img { cursor:pointer }
            #tablenav div { float:left; margin-right:15px }
            #tablelocation { float:right; font-size:12px }
            #tablelocation select { margin-right:3px }
            #tablelocation div { float:left; margin-left:15px }
            .page { margin-top:2px; font-style:italic }
            #selectedrow td { background:#c6d5e1; }
            #tablewrapper{ margin-top:10px; }
            #tablewrapper table td{ padding:3px; }
            table td{ font-size:12px; }
            h2 { font-size:24px;margin-top:10px;margin-bottom:10px;font-weight:normal ;font-family:dosis;}
            hr{ border-top:1px dotted #000;background:none;margin-bottom:5px; }
            table#datastore { border-collapse:collapse;border-bottom:1px solid #c5c5c5;border-top:1px solid #c5c5c5;border-right:1px solid #c5c5c5;color:#2e2e2e;font-weight:normal;width:100%; }
            table#datastore  th{ border-bottom:1px solid #c5c5c5;font-weight:normal; }
            table#datastore  td,table#grid th{ padding:4px 0px;text-align:center;border-left:1px solid #c5c5c5; }
            table#datastore  thead{ line-height:30px;color:#444;font-weight:normal }
            table#datastore  .mainframe td table#grid tr td{ line-height:24px;font-size:14px;vertical-align:middle }
            table#datastore  tr { background-color: #f5f5f5; }
            table#datastore  tr:hover { background-color: #FFF;color:#000 }
			table#datastore.profile_report_tbl td,table#datastore.profile_report_tbl th { text-align: left; padding-left:10px }
			
        </style>
    </head>
    <div id="content">
        <div id="tablewrapper">
 
            <table border="0" width="100%" align="center" style="border-collapse:collapse" bordercolor="#000000">
                <tr>
                    <td align='left' ><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/logos/<?php echo $_smarty_tpl->tpl_vars['report_header']->value["logo"];?>
" align="left"  ></td>
                    <td>	

                        <table align="center">
                            <tr height='20px'>
                                <td  colspan="3" align='center'>
                                    <h1>
                                        <font face="Arial, Helvetica, sans-serif">
                                            <?php echo $_smarty_tpl->tpl_vars['report_header']->value["company_name"];?>
</font>
                                    </h1>
                                </td>
                            </tr>
                           <!-- <tr height='20px'><td  colspan="3" align='center'><b><?php echo $_smarty_tpl->tpl_vars['tran_comp']->value;?>
</b></td></tr> -->
                            <tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000"></font><?php echo $_smarty_tpl->tpl_vars['report_header']->value["address"];?>
</b></td></tr>
                            <tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tran_phone']->value;?>
:</font><?php echo $_smarty_tpl->tpl_vars['report_header']->value["phone"];?>
</b></td></tr>
                            <tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tran_email']->value;?>
:</font><?php echo $_smarty_tpl->tpl_vars['report_header']->value["email"];?>
</b></td></tr>
                        </table>
                    </td>
                    <td align='right' ><b><?php echo $_smarty_tpl->tpl_vars['tran_Date']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</td>
                </tr>
                <tr>
                    <td colspan="3"><hr /></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><h2><?php echo $_smarty_tpl->tpl_vars['report_name']->value;?>
</h2></td>
                </tr>
            </table>
                         <?php }} ?>
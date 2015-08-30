{*<style type="text/css">
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
{if $user_type=="admin"}
    {include file="admin/layout/header.tpl"  name=""}
{else}
    {include file="user/layout/header.tpl"  name=""}
{/if}
<innerdashes>
    <hdash>
        {if $HELP_STATUS}
            <a href="https://infinitemlmsoftware.com/help/" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
                {/if}
        <img src="{$PUBLIC_URL}images/1337836530_group_add.png" />
        {$tran_preview}
    </hdash>
    <cdash-inner>
        <div id="print_div">
            <table width="100%" align="center" cellpadding="5" cellspacing="0" bgcolor = "white">
                <tr>
                    <td>
                        <table width = "100%">
                            <tr>
                                <td>   
                                    <img  height="50px" src="{$PUBLIC_URL}images/{$letter_arr['logo']}" alt="" /> 
                                </td>
                                <td align="right">
                                    {$letter_arr['company_name']} <br />
                                    {$letter_arr['address_of_company']}
                                </td>
                            </tr>
                            <tr><td colspan="2"><hr /></td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width = "100%">
                            {foreach from=$user_details item=v}
                                <tr>
                                    <td width="30%"><b>{$tran_distributers_name}</b></td>
                                    <td width="70%">:{$v.user_detail_name} </td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>{$tran_address} </b></td>
                                    <td width="70%">: {$v.user_detail_address}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>{$tran_date_of_joining}</b> </td>
                                    <td width="70%">: {$v.join_date}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>{$tran_phone_number} </b></td>
                                    <td width="70%">: {$v.user_detail_mobile}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>{$tran_nominee}</b></td>
                                    <td width="70%">:{$v.user_detail_nominee}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>{$tran_pan_number} </b></td>
                                    <td width="70%">: {$v.user_detail_pan}</td>
                                </tr>
                            {/foreach}
                            {if $referal_status == "yes"}
                                <tr>
                                    <td width="30%"><b>{$tran_sponsor}  </b></td>
                                    <td width="70%">: {$sponsorname}</td>
                                </tr>
                            {/if}
                            <tr>
                                <td width="30%"><b>{$tran_Placment_ID}</b></td>
                                <td width="70%">: {$adjusted_id}</td>
                            </tr>
                            {if $product_status == "yes"}
                                <tr>
                                    <td width="30%"><b>{$tran_package}</b></td>
                                    <td width="70%">: {$prdt_arr->product_name}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>{$tran_amount}</b></td>
                                    <td width="70%">: {$prdt_arr->product_value}</td>
                                </tr>
                            {/if}
                            <tr>
                                <td width="30%"><b>{$tran_Login_Link}</b></td>
                                <td width="70%">: {$PATH_TO_ROOT}login/index/user/{$admin_user_name}/{$uname}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p align="justify">{$letter_arr['main_matter']}
                    </td>
                </tr>
                <tr>
                    <td>{$tran_winning_regards}, <br /><b>{$tran_admin}</b><br />{$letter_arr['company_name']} </td>
                </tr>
                <tr>
                    <td><strong>{$tran_place}</strong> :  {$letter_arr['place']}<br />
                        <strong>{$tran_date}</strong> : {$Date}</td>	
                </tr>
            </table>
        </div>
        <hr>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
            <input type="hidden" id="id" name="id" value="{$id}">
            <td align="right"><a href="{$PATH_TO_ROOT}{$user_type}/tree/select_tree" style="text-decoration:none"><input type="button" align="right"  onClick=""  value="{$tran_go_to_tree_view}" /></a></td>
            <td>
                <div id = "frame">
                    <a href="" onClick="window.print();return false"> <img align="right" src="{$PUBLIC_URL}images/1335779082_document-print.png" alt="Print" border="none"></a>	
                </div></td>
            </tr>
        </table>
    </cdash-inner>
</innerdashes>
{if $user_type=="admin"}
    {include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
{else}
    {include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
{/if}*}





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


{if $user_type=='admin'}﻿
    {include file="admin/layout/header.tpl"  name=""}
{else}
    {include file="user/layout/header.tpl"  name=""}
{/if}
 
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_preview} {$user_type}
            </div>
            <div class="panel-body">

                <div id="print_div">
                    <table width = "100%">
                        <tr>
                            <td>   
                              <img  height="50px" src="{$PUBLIC_URL}images/logos/{$letter_arr['logo']}" alt="" /> 
                            </td>
                            <td align="right">
                                {$letter_arr['company_name']} <br />
                                {$letter_arr['address_of_company']}
                            </td>
                        </tr>
                        <tr><td colspan="2"><hr /></td></tr>
                    </table>
                    <table> 
                         {foreach from=$user_details item=v}
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">Username</label>
                            </td>
                            <td>

                                :  {$uname}

                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_distributers_name}</label>
                            </td>
                            <td>

                                :  {$v.user_detail_name}

                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_address}</label>
                            </td>
                            <td>


                                :  {$v.user_detail_address}
                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_date_of_joining}</label>
                            </td>
                            <td>

                                :   {$v.join_date}
{*                                :  {$user_details['join_date']}*}

                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_phone_number}</label>
                            </td>
                            <td>

                                :  {$v.user_detail_mobile} 

                            </td>
                        </tr>
  
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_pan_number}</label>
                            </td>
                            <td>

                                :  {$v.user_detail_pan} 

                            </td>
                        </tr>
                        {if $referal_status == "yes"}
                            <tr style="font-size: 13px;">
                                <td>   
                                    <label class="col-sm-12" for="user_name">{$tran_sponsor}</label>
                                </td>
                                <td>

                                    :  {$sponsorname}

                                </td>
                            </tr>

                        {/if}

                        <div class="row">

                            <tr style="font-size: 13px;">
                                <td>   
                                    <label class="col-sm-12" for="user_name">{$tran_Placment_ID}</label>
                                </td>
                                <td>

                                    :  {$adjusted_id}

                                </td>
                            </tr>
                            
                           {if $reg_amount>0}
                                <tr style="font-size: 13px;">
                                    <td>   
                                        <label class="col-sm-12" for="user_name">Registration Amount</label>
                                    </td>
                                    <td>

                                        :  {$reg_amount}

                                    </td>
                                </tr>
                            {/if}
                            
                            
                            {if $product_status == "yes"}
                                <tr style="font-size: 13px;">
                                    <td>   
                                        <label class="col-sm-12" for="user_name">{$tran_package}</label>
                                    </td>
                                    <td>

                                        :  {$prdt_arr["product_name"]}

                                    </td>
                                </tr>
                                <tr style="font-size: 13px;">
                                    <td>   
                                        <label class="col-sm-12" for="user_name">{$tran_package}</label>
                                    </td>
                                    <td>

                                        :  {$prdt_arr["product_value"]}

                                    </td>
                                </tr>
                            {/if}
                            {if $FOOTER_DEMO_STATUS=="yes"}
                            <tr style="font-size: 13px;">
                                <td>   
                                    <label class="col-sm-12" for="user_name">{$tran_Login_Link}</label>
                                </td>
                                
                                <td>

                                    :  {$PATH_TO_ROOT}login/index/user/{$admin_user_name}/{$uname}
                                </td>
                            </tr>
                            {/if}
                        {/foreach}
                    </table>

                    <br/>
                    <hr/>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    {$letter_arr['main_matter']}
                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    {$tran_winning_regards},
                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    {$tran_admin}
                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p>
                                    {$letter_arr['company_name']} 
                                </p>
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="user_name">{$tran_place}</label>

                            <div class="col-sm-12">
                                {$letter_arr['place']}
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="user_name">{$tran_date}</label>

                            <div class="col-sm-12">
                                {$Date}
                            </div>
                        </div></div>
                </div>


                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                    <input type="hidden" id="id" name="id" value="{$id}">
                    <td align="right">
                   
<a href="{$PATH_TO_ROOT}{$user_type}/tree/select_tree" style="text-decoration:none">
                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-bricky"  value="{$tran_go_to_tree_view}">
                                    {$tran_go_to_board_view}
                                </button>
                            </div>
                        </a></td>
                    <td>
                        <div id = "frame">
                            <a href="" onClick="window.print();
                                    return false"> <img align="right" src="{$PUBLIC_URL}images/1335779082_document-print.png" alt="Print" border="none"></a>	
                        </div></td>
                    </tr>
                </table>



            </div>
        </div>
    </div>
</div>




{if $user_type=='user'}﻿
    {include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
{else}
    {include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
{/if}

<script>

    Main.init();
    jQuery(document).ready(function() {
        //  Main.init();
        //DatePicker.init();

        //  ValidateUser.init();

    });

</script>

{if $user_type=='user'}﻿
    {include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
{else}
    {include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
{/if}


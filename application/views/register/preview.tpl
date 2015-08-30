
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


{if $user_type=='distributor'}﻿
    {include file="user/layout/header.tpl"  name=""}
{else}
    {include file="admin/layout/header.tpl"  name=""}
{/if}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_You_must_enter_user_name}</span>        
    <span id="error_msg2">{$tran_you_must_enter_your_password}</span>        
    <span id="error_msg3">{$tran_You_must_enter_your_Password_again}</span>        
    <span id="error_msg4">{$tran_You_must_enter_your_email}</span>                  
    <span id="error_msg5">{$tran_You_must_enter_your_mobile_no}</span>
    <span id="error_msg">{$tran_you_must_enter_your_name}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
</div> 

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

                                :  {$user_details['user_detail_name']}

                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_address}</label>
                            </td>
                            <td>

                                :  {$user_details['user_detail_address']}

                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_date_of_joining}</label>
                            </td>
                            <td>

                                :  {$user_details['join_date']}

                            </td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_phone_number}</label>
                            </td>
                            <td>

                                :  {$user_details['user_detail_mobile']}

                            </td>
                        </tr>
  
                        <tr style="font-size: 13px;">
                            <td>   
                                <label class="col-sm-12" for="user_name">{$tran_pan_number}</label>
                            </td>
                            <td>

                                :  {$user_details['user_detail_pan']}

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
                        <a href="{$PATH_TO_ROOT}{$user_type}/tree/genology_tree" style="text-decoration:none">

                            <div class="col-sm-6 col-sm-offset-2">
                                <button class="btn btn-bricky"  value="{$tran_go_to_tree_view}">
                                    {$tran_go_to_tree_view}
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


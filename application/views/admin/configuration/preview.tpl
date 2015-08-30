
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

{include file="admin/layout/header.tpl"  name=""}

<div class="box" >

    <div id="print_div">


        <table width="100%" align="center" cellpadding="5" cellspacing="0" bgcolor = "white">
            <tr>
                <td>
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
                </td>
            </tr>
            <tr>
                <td>
                    <table width = "50%">
                        <tr>
                            <td width="50%"><b>{$tran_distributers_name}</b></td>
                            <td width="50%">:NA </td>
                        </tr>
                        <tr>
                            <td width="50%"><b>{$tran_address} </b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b>{$tran_date_of_joining}</b> </td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b>{$tran_phone_number} </b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b>{$tran_nominee} </b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        <tr>
                            <td width="50%"><b>{$tran_pan_number}</b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        {if $referal_status == "yes"}
                            <tr>
                                <td width="50%"><b>{$tran_sponsor} </b></td>
                                <td width="50%">:NA</td>
                            </tr>
                        {/if}
                        <tr>
                            <td width="50%"><b>{$tran_Placment_ID}</b></td>
                            <td width="50%">:NA</td>
                        </tr>
                        {if $product_status == "yes"}
                            <tr>
                                <td width="50%"><b>{$tran_package} </b></td>
                                <td width="50%">:NA</td>
                            </tr>
                            <tr>
                                <td width="50%"><b>{$tran_amount} </b></td>
                                <td width="50%">:NA</td>
                            </tr>
                        {/if}
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    {$letter_arr['main_matter']}
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
        <input type="hidden" id="id" name="id" value="">
       
        <td>
            <div id = "frame">
                <a href="" onClick="window.print();return false"> <img align="right" src="{$PUBLIC_URL}images/1335779082_document-print.png" alt="Print" border="none"></a>	
            </div></td>
        </tr>
    </table>
</div>   
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init();               
});
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
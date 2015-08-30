 {include file="admin/layout/header.tpl"  name=""}
<innerdashes>
   <hashes>
       
   </hashes>
   <cdash-inner>
       <table align="center" width="50%">
       <tr>
           <td>
            <form method='post' action="https://test.authorize.net/gateway/transact.dll">
{*               <form method='post' action="https://secure.authorize.net/gateway/transact.dll">*}
                   <input type='hidden' name="x_login" value="{$api_login_id}" />
                   <input type='hidden' name="x_fp_hash" value="{$fingerprint}" />
                   <input type='hidden' name="x_amount" value="{$amount}" />
                   <input type='hidden' name="x_fp_timestamp" value="{$fp_timestamp}" />
                   <input type='hidden' name="x_fp_sequence" value="{$fp_sequence}" />
                   <input type='hidden' name="x_version" value="3.1">
                   <input type='hidden' name="x_show_form" value="payment_form">
                   <input type='hidden' name="x_test_request" value="false" />
                   <input type='hidden' name="x_method" value="cc">
                   <input type='submit' value="Click here for the secure payment form" class="btn btn-red btn-block">
               </form>
           </td>
      </tr>
     </table>
  </cdash-inner>
</innerdashes>
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
 


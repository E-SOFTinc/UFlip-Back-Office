{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_company_name}</span>
    <span id="validate_msg2">{$tran_non_valid_file}</span>
    <span id="validate_msg3">{$tran_only_png_jpg}</span>
    <span id="validate_msg4">{$tran_you_must_enter_email}</span>
    <span id="validate_msg5">{$tran_you_must_enter_valid_email}</span>
    <span id="validate_msg6">{$tran_you_must_enter_phone}</span>
    <span id="validate_msg7">{$tran_you_must_enter_valid_phone}</span>
</div>

 
                            
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
               {$trans_site_status}
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
                <form id="form_setting" action="" method="post" name="form_setting" >

                    <table width="50%" cellspacing="5" cellpadding="5" border="0" align="left">
                        <tbody>
                            <tr>
                                <td>

                                      Site status 


                                </td>
                                <td>
                                    <select name="site_status" style="width: 80%">
                                        <option selected="" value="active">

                                            Active

                                        </option>
                                        <option value="maintenance">

                                            Maintenance

                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Maintenance Content</td>
                                <td>
                                    <textarea id="content" name="content" rows="10" cols="22"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input id="setting" type="submit" name="setting" tabindex="7" value="update"></input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
              </div>
        </div>
    </div>
</div>
 
                            
                            
                            
                            
                            
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init(); 
     ValidateUser.init();
});
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  

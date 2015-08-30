{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display:none;">
    {*<span id="error_msg1">{$tran_mlm_plan_details}</span>*}
    <span id="error_msg1">{$tran_you_must_enter_mlm_plan_details}</span>
    <span id="error_msg2">{$tran_you_must_enter_reference_url}</span>
    <span id="error_msg3">{$tran_you_must_select_mlm_documents}</span>                     
    <span id="error_msg5">{$tran_new_transaction_password_mismatch}</span>        
    <span id="error_msg6">{$tran_you_must_select_a_username}</span>
</div>


<!--/////////////// Edited By NIYAS--///////////////--->

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                
                {$tran_upgrade_infinite_mlm}
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
                <div class="form-group">
                    <form class="niceform" method="post" action="" id="update_form" name="update_form" enctype="multipart/form-data" onsubmit="return validate_requirements(this);">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                            </div>
                        </div>
                        <table    cellspacing="10" cellpadding="3" width="100%" >
                            <div class="form-group">
                                <tr>
                                    <td width="300" valign="top">{$tran_mlm_plan_details} :<span class="symbol required"></span></td>
                                    <td><div class="col-sm-6">
                                            <textarea class="form-control" name="mlm_details" id="mlm_details" title="$tran_mlm_plan_details}"></textarea><span id="errmsg1"></span>
                                        </div>
                                    </td>


                                </tr>
                            </div>

                            <tr>
                                <td>{$tran_do_you_need_shopping_cart_ecommerce}</td>
                                <td ><div class="col-sm-6">
                                        <input name="shopping_status" type="radio" id="shopping_st1" value="yes"  /><label for="shopping_st1"></label>{$tran_yes} 
                                            <input name="shopping_status" type="radio" id="shopping_st2" value="no" checked /><label for="shopping_st2"></label>{$tran_no}  
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{$tran_do_you_need_repurchase_monthly_subscribe}</span></td>
                                <td><div class="col-sm-6">
                                        <input name="repurchase_status" type="radio" id="repurchase_st1" value="yes"/><label for="repurchase_st1"></label>{$tran_yes} 
                                            <input name="repurchase_status" type="radio" id="repurchase_st2" value="no" checked /> 
                                        <label for="repurchase_st2"></label>{$tran_no}   
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>{$tran_do_you_need_website_replication}</td>
                                <td><div class="col-sm-6">
                                        <input name="replication_status" type="radio" id="replication_st1" value="yes"  /> <label for="replication_st1"></label>{$tran_yes} 
                                            <input name="replication_status" type="radio" id="replication_st2" value="no" checked /><label for="replication_st2"></label>{$tran_no}  
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{$tran_reference_url} :</td>
                                <td><div class="col-sm-6">
                                        <input   name="reference" id="reference" type="text"  /><span id="errmsg2"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{$tran_mlm_plan_documents} :</td>
                                <td>
									<div class="col-sm-6">
												<div data-provides="fileupload" class="fileupload fileupload-new">
													<span class="btn btn-file btn-light-grey"><i class="fa fa-folder-open-o"></i> <span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
														<input  name="document" id="document" type="file" >
													</span>
													<span class="fileupload-preview"></span>
													<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">
														&times;
													</a>
													<span id="errmsg3">
												</div>
												<p class="help-block">
													
												</p>
											</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td ><div class="col-sm-6">
                                        <button class="btn btn-bricky" type="submit" id="update" value="{$tran_update}" name="update" tabindex="2">{$tran_update}</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>   
<!-------UPTO HERE---------->

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}

<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateUser.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
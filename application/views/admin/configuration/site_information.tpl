{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_company_name}</span>
    <span id="validate_msg2">{$tran_non_valid_file}</span>
    <span id="validate_msg3">{$tran_only_png_jpg}</span>
    <span id="validate_msg4">{$tran_you_must_enter_email}</span>
    <span id="validate_msg5">{$tran_you_must_enter_valid_email}</span>
    <span id="validate_msg6">{$tran_you_must_enter_phone}</span>
    <span id="validate_msg7">{$tran_you_must_enter_valid_phone}</span>
     <span id="validate_msg8">{$tran_you_must_enter_the_company_address}</span>
</div>

  
                            
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
               {$tran_site_information}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="site_config" id="site_config" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="co_name">{$tran_company_name}:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <input  type="text"  name="co_name" id="co_name"    autocomplete="Off" tabindex="1" value="{$site_info_arr["co_name"]}">
                        </div>
                    </div>
                         
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="company_address">{$tran_company_address}:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <textarea  name="company_address" id="company_address" tabindex="2" rows="6" cols="30"   autocomplete="Off" >{$site_info_arr["company_address"]}</textarea>
                        </div>
                    </div>
                        
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="def_lang">{$tran_default_language}:<font color="#ff0000">*</font> </label>
                            <div class="col-sm-4">
                                <select id="def_lang" name="def_lang" tabindex="3" class="form-control">
                                    {foreach from=$lang item=v}
                                        <option value="{$v.lang_id}" {if $default_lang==$v.lang_id} selected="selected"{/if}>{$v.lang_name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>

                   
                         <div class="form-group">
        <label class="col-sm-2 control-label" > {$tran_logo}</label>

                            <div class="fileupload fileupload-new col-sm-4" data-provides="fileupload" >
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="{$PUBLIC_URL}images/logos/{$site_info_arr["logo"]}" alt="" value="{$site_info_arr["logo"]}">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> {$tran_select_image}</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="favicon" name="favicon" tabindex="4" value="{$site_info_arr["logo"]}">
                                    </span>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
        <label class="col-sm-2 control-label" > {$tran_icon}</label>

                            <div class="fileupload fileupload-new col-sm-4" data-provides="fileupload" >
                                <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="{$PUBLIC_URL}images/logos/{$site_info_arr["favicon"]}" alt="" value="{$site_info_arr["favicon"]}">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> {$tran_select_image}</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="img_logo" name="img_logo" tabindex="5" value="{$site_info_arr["favicon"]}">
                                    </span>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">{$tran_email}:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <input  type="text"  name="email" id="email"   autocomplete="Off" tabindex="6" value="{$site_info_arr["email"]}">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="img_logo">{$tran_phone}:<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <input  type="text"  name="phone" id="phone"   autocomplete="Off"  tabindex="7" value="{$site_info_arr["phone"]}"> <span id="errmsg1"></span>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="site" id="site" value="{$tran_update}" tabindex="8">
                               {$tran_update}
                            </button>
                        </div>
                    </div>
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

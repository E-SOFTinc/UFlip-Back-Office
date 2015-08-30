{include file="admin/layout/header.tpl" name=""}

<div id="span_js_messages" style="display:none;">
    <span id="validate_msg1">{$tran_title_needed}</span>
    <span id="validate_msg2">{$tran_you_must_select_a_file}</span>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_Upload_Materials}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  method="post"  name="upload_materials" id="upload_materials" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="file_title">{$tran_File_Title}<font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <input tabindex="1" name="file_title" id="file_title" type="text" size="30" value=""/>

                        </div>
                    </div>
                        
                  <div class="form-group">
        <label class="col-sm-2 control-label" for="product_id"> {$tran_Select_A_file}:<font color="#ff0000">*</font></label>
					<div class="col-sm-2">
                            <div class="fileupload fileupload-new" data-provides="fileupload" >
                                
                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> {$tran_Select_A_file}</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="upload_doc" name="upload_doc" tabindex="2">
                                    </span>
									<div>&nbsp;<br/></div>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div><span class="help-block" for="upload_doc"></span>
                            </div>
                                        <font color="#ff0000">{$tran_kb}({$tran_Allowed_types_are_pdf_ppt_docs_xls_xlsx})</font>
							
                            </div>
                        </div>
                   
                   
                   
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" name="upload_submit" id="upload_submit"  value="{$tran_upload}" tabindex="3"> {$tran_upload} </button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_Upload_Materials}
            </div>
            <div class="panel-body">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr class="th">
                            <th>{$tran_slno}</th>
                            <th>{$tran_File_Title}</th>
                            <th>{$tran_uploaded_date}</th>
                            <th>{$tran_action}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $arr_count!=0}
                            {assign var="class" value=""}
                            {assign var="path" value="{$BASE_URL}admin/"}
                            {assign var="i" value=0}
                            {foreach from=$file_details item=v}
                                {assign var="id" value="{$v.id}"}

                                {if $i%2==0}
                                    {$class='tr1'}
                                {else}
                                    {$class='tr2'}
                                {/if}
                                {$i=$i+1}
                                <tr class="{$class}">
                                    <td>{$i}</td>
                                    <td>{$v.file_title}</td>
                                    <td>{$v.uploaded_date}</td>
                                    <td> 
                                        <div class=""><!--visible-md visible-lg hidden-sm -->
                                            <a href="javascript:delete_docs({$id},'{$path}')" class="btn btn-bricky tooltips" data-placement="top" data-original-title="Delete {$v.file_title}"><i class="fa fa-times fa fa-white"></i></a>
                                        </div>


                                    </td>
                                </tr>                    
                            {/foreach}
                        </tbody>
                        <counter></counter>
                        {else}
                        <tr><td colspan="6" align="center"><h4>{$tran_No_Materials_Found}</h4></td></tr>
                                {/if}
                    </tbody>
                </table>
            </div>                        
        </div>
    </div>
</div>

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateNewsUpload.init();

    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
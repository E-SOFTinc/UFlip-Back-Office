

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
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
                Create ticket           </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  name="compose" id="compose" method="post" action="" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">
                            Ticket message <span class="symbol required"></span> 
                        </label>
                        <div class="col-sm-4">
                            <!--<input tabindex="1" name="subject" type="text" id="subject" size="35"   />-->
                            <input type="text" name="subject" id="subject" class="form-control" tabindex="1" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Priority  <span class="symbol required"></span>
                        </label>
                        <div class="col-sm-4" >                                    
                            <select name="priority" id="priority" type="text" class="form-control" tabindex="2"> 
                                <option value="">Select priority</option>
                                <option value="3">Low</option>
                                <option value="2">Medium</option>
                                <option value="1">High</option>

                            </select>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="subject">Category : <font color="#ff0000">*</font> </label>
                        <div class="col-sm-4">
                            <!--<input tabindex="1" name="subject" type="text" id="subject" size="35"   />-->
                            <select tabindex="3" name="category" type="text" id="category" class="form-control" >
                                <option value="">Select type</option>
                                {foreach from=$category_arr item=v}
                                    <option value="{$v.cat_id}">{$v.cat_name}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="message">Message to admin : <font color="#ff0000">*</font></label>
                        <div class="col-sm-4">
                            <textarea tabindex="4" name='message' id='message' rows='11' cols='35' class="form-control" ></textarea>
                        </div>
                    </div>
                    {* <div class="form-group">
                    <label class="col-sm-2 control-label" for="message">{$tran_attachment} :</label>
                    <div class="col-sm-3">
                    <input type="file" id="upload_doc" name="upload_doc" tabindex="5" >
                    </div>
                    </div>
                    *}


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="message">Attachment :</label>
                        <div class="col-sm-3">
                            <div data-provides="fileupload" class="fileupload fileupload-new">
                                <span class="">{*<i class="fa fa-folder-open-o"></i> <span class="fileupload-new"></span><span class="fileupload-exists">{$tran_Change}</span>*}
                                    <input type="file" id="upload_doc" name="upload_doc" tabindex="5" >
                                </span>
                                <span class="fileupload-preview"></span>
                                {*<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">
                                    ×
                                </a>*}
                            </div>
                            <p class="help-block">
                                <font color="#ff0000">{$tran_kb}(allowed types)</font>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit"id="usersend" value="submit" name="usersend" tabindex="6">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>
    </div>
</div>

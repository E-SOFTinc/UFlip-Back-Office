{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
            <span id="validate_msg1">{$tran_You_must_enter_your_email}</span>
            <span id="validate_msg2">{$tran_You_have_entered_an_invalid_email}</span>
            </div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                General Mail Settings
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="mail_settings" id="mail_settings" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="send_from">Send From:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="send_from" id ="send_from" value="" maxlength="" title="Send From" autocomplete="Off"tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from_name">Main Matter:</label>
                        <div class="col-sm-8" id="jtxtareadd" style="width: 452px;">
                            <textarea style="width: 452px;"rows="20" cols="50" id="txtDefaultHtmlArea"  name="txtDefaultHtmlArea" title="Main Matter" tabindex="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_id"> Attachment 1 :</label>
                        <div class="col-sm-2">
                            <div class="fileupload fileupload-new" data-provides="fileupload" >

                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Select A File</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="userfile0" name="userfile0" tabindex="2">
                                    </span>
                                    <div>&nbsp;<br/></div>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div><span class="help-block" for="userfile0"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_id"> Attachment 2 :</label>
                        <div class="col-sm-2">
                            <div class="fileupload fileupload-new" data-provides="fileupload" >

                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Select A File</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="userfile1" name="userfile1" tabindex="2">
                                    </span>
                                    <div>&nbsp;<br/></div>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div><span class="help-block" for="userfile1"></span>
                            </div>            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_id"> Attachment 3 :</label>
                        <div class="col-sm-2">
                            <div class="fileupload fileupload-new" data-provides="fileupload" >

                                <div class="user-edit-image-buttons">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Select A File</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                        <input type="file" id="userfile2" name="userfile2" tabindex="2">
                                    </span>
                                    <div>&nbsp;<br/></div>
                                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i>Remove
                                    </a>
                                </div><span class="help-block" for="userfile2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="4"   type="submit"  value="send" name="send" id="send" > Send</button>                                
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i>Send Mail History
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr class="th">
                                            <th>si no</th>
                                            <th>From</th>
                                            <th>Message</th>
                                            <th>Attach 1</th>
                                            <th>Attach 2</th>
                                            <th>Attach 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach from=$letter_arr item=v}
                                            <tr><td>{counter}</td>
                                                <td>{$v.sent_from}</td>
                                                <td>{$v.main_matter|substr:0:31}</td>
                                                <td>{$v.logo}</td>
                                                <td>{$v.logo_1}</td>
                                                <td>{$v.logo_2}</td>

                                                <td><a href="{$BASE_URL}admin/configuration/delete_message/general_mail/{$v.id}"><img src="{$PUBLIC_URL}images/delete.png" border="0" /></a></td></tr>
                                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>                        
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>



{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateGeneralMailSettings.init();
    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  
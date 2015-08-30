<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>{$tran_compose_mail}
    </div>
    <div class="panel-body">
        <form role="form" class="smart-wizard form-horizontal"  id="compose" name="compose" method="post" action="../mail/compose_mail">
            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="status_all">{$tran_Send_Mail_To}<span class="symbol required"></span></label>
                <div class="col-sm-3">
                    <input tabindex="1" type="radio" id="status_all" name="mail_status" value="all" onclick="hid_text()" checked='1' />
                    <label for="status_all"></label> {$tran_All_Users}
                </div>
                <div class="col-sm-3">
                    <input tabindex="1" type="radio" name="mail_status" id="status_mul" value="multiple"   onclick="show_text()"/>
                    <label for="status_mul"></label> {$tran_Single_User}
                </div>

            </div>
            <div class="form-group" id="user_div"  style="display:none;" >

            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="subject">{$tran_subject}<span class="symbol required"></span> </label>
                <div class="col-sm-3">
                    <input tabindex="2" name="subject" type="text" id="subject" size="35"   />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="message1">{$tran_user_message}<span class="symbol required"></span></label>
                <div class="col-sm-3">
                    <textarea tabindex="3" name='message1' id='message1' rows='20' cols='35'></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    
                    <button class="btn btn-bricky" type="submit" name="adminsend"  id="adminsend" value="{$tran_sendmessage}" tabindex="4">{$tran_sendmessage}</button>
                    

                </div>
            </div>
            <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
        </form>
    </div>
</div>

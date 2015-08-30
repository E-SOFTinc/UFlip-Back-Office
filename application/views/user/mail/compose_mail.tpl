

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
                {$tran_compose_mail}            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  name="compose" id="compose" method="post" action="" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="subject">{$tran_subject} : <font color="#ff0000">*</font> </label>
                        <div class="col-sm-3">
                            <input tabindex="1" name="subject" type="text" id="subject" size="35"   />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="message">{$tran_messagetoadmin} : <font color="#ff0000">*</font></label>
                        <div class="col-sm-3">
                            <textarea tabindex="2" name='message' id='message' rows='20' cols='35'></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">

                            <button class="btn btn-bricky" type="submit"id="usersend" value="{$tran_sendmessage}" name="usersend" tabindex="3">{$tran_sendmessage}</button>


                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                </form>
            </div>
        </div>
    </div>
</div>

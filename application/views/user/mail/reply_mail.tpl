{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_enter_message_here}   </span>        

    <span id="error_msg3">{$tran_you_must_select_user}</span>        
    <span id="error_msg2">{$tran_you_must_enter_subject_here}</span>                  

</div>      



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_reply_mail}
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

       {* {assign var=reply_msg value=null}*}

        <div class="panel-body">
            <form role="form" class="smart-wizard form-horizontal" method="post" name="compose" id="compose"  >
                <div class="col-md-12">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-times-sign"></i> {$tran_errors_check}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="user_id">{$tran_user_name}<span class="symbol required"></span></label>

                    <div class="col-sm-6">
                        <input type="text" id="user_id" name="user_id"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1" readonly class="col-sm-2 form-control" value="{$reply_user}" />
                    </div>
                </div>
                <div class="form-group">
                    <div id="fund1"> </div>
                </div>   


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="subject">{$tran_subject}<span class="symbol required"></span></label>
                    <div class="col-sm-6">
                        <input name="subject" type="text" id="subject"  value=" Rep:{$reply_msg}"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event);" autocomplete="Off" tabindex="1"  >

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="message">
                        {$tran_message_to_send}<span class="symbol required"></span>
                    </label>

                    <div class="col-sm-6">
                        <textarea name='message' id='message' rows='20' cols='40'></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-2">

                        <button class="btn btn-bricky" type="submit" id="send" value="{$tran_send_message}" name="send" tabindex="2">
                            {$tran_send_message}</button>

                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
</div>


{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
jQuery(document).ready(function() {
    Main.init();
    ValidateUser.init();               
});


</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}  

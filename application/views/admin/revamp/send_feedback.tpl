{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
            <span id="error_msg1">{$tran_you_must_enter_feedback_subject}</span>
            <span id="error_msg2">{$tran_you_must_enter_feedback_details}</span>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                        {$tran_infinite_mlm_feedback}
                <div class="panel-tools">
                    <!--<i class="fa">
                    {if $HELP_STATUS}
			<a href="https://infinitemlmsoftware.com/help/" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
                    {/if}</i>-->
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="panel_tab4_example1">
                         <div class="panel-body">
                             
                            <form  method="post" action="" class="smart-wizard form-horizontal" id="feedback_form" name="feedback_form" >
                                <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                                </div>
                             </div>


                                 <div class="form-group">
                                     <label class="col-sm-2 control-label" for="subject">{$tran_feedback_subject}<span class="symbol required"></span> 
                                     </label>
                                     <div class="col-sm-3">
                                         <input tabindex="2" name="feedback_subject" type="text" id="feedback_subject" size="35"   />
                                     </div>
                                     <span class="help-block"></span>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-sm-2 control-label" for="message">{$tran_feedback_details}<span class="symbol required"></span></label>
                                     <div class="col-sm-3">
                                         <textarea tabindex="3" name='feedback_detail' id='feedback_detail' rows='20' cols='35'></textarea>
                                     </div>
                                     <span class="help-block"></span>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-sm-2 col-sm-offset-2">

                                         <button class="btn btn-bricky" type="submit" name="send"  id="login" value="{$tran_send}" tabindex="4">{$tran_send}</button>

                                     </div>
                                 </div>

                               </form>
                         </div>
                    </div>
                </div>
                        
       
        
            </div>

        </div>
    </div>
</div>   
 <script>
    jQuery(document).ready(function() {
    Main.init();
    ValidateFeed.init();
});
</script>             
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
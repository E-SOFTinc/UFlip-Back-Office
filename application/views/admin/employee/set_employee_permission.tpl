{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_select_user}</span>        
    
</div> 

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
      {$tran_set_module_permission}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="user_register" id="user_register" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user1">{$tran_select_user}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name="user1" id="user1"   autocomplete="Off"  onkeyup="ajax_showOptions(this,'getUsersByLetters','no',event)"  tabindex="1" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>

                        
                        
                     

                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" name="user_name_submit" id="user_name_submit" value="{$tran_view_module_permission}" tabindex="2">
                              {$tran_view_module_permission}
                            </button>
                        </div>
                             
                    </div>
                </form>

                            
                                {if $user_name_submit}
                                    
                                    <div class="row">
                                          <div class="form-group">
    <div class="col-sm-12">
      
            
           

                                <form role="form" class="smart-wizard form-horizontal" method="post"  name="set_permission_form" id="set_permission_form" >

								
								
<div class="panel panel-default">
<div class="panel-heading">
<i class="fa fa-external-link-square"></i>{$tran_set_permission_of} {$user_name}
</div>
<div class="panel-body">

<table style="background:white;border-top:0px;" class="table table-striped  table-full-width" id="sample_1">

<input type="hidden" name="user" id="user" value="{$user_name}">
	<tr style="background:white;border-top:0px;" class="th" align="left">
		<td style="background:white;border-top:0px;">
		{$main_menu}
		{$other_menu}
		{$submit_button}
		</td> 
	</tr>
</table>


</div>
</div>
										
										
                    

         
            </form>
                             
            </div>
        </div>
    </div>
	 {/if}
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
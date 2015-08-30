{include file="admin/layout/header.tpl"  name=""}

<!-- start: PAGE HEADER -->

<!-- end: PAGE HEADER -->

<!-- start: PAGE CONTENT -->
<div id="span_js_messages" style="display:none;">
    <span id="error_msg">You Must Select A Username</span>
    
</div>	
{if !isset($smarty.post.change_placement)}
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>Select A User
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
                <form role="form" class="smart-wizard form-horizontal" name="searchform" id="searchform" action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name">Select A User<span class="symbol required"></span></label>
                        <div class="col-sm-3">
                            <input placeholder="" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no',event)" autocomplete="Off" tabindex="1" >

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit" id="select_user" value="profile_update" name="select_user" tabindex="2">
                               Submit
                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                 
                </form>
            </div>
        </div>
    </div>
</div>
{/if}           
                    
                    {if $user_id}    

    <div class="row">
        <div class="col-sm-12">
          
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> Change Placement Of <b>{$user_name}</b> 
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

                        <form role="form" class="smart-wizard form-horizontal"  name="upload" id="upload"  method="post"  >
                             <input type="hidden" id="user_id" name="user_id"  value="{$user_id}" />
                                <input type="hidden" id="user_name" name="user_name"  value="{$user_name}" />
                             <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
            <input type="hidden" id="path_root" name="path_root" value="{$BASE_URL}">
         
                             
                             
                              <div class="form-group">
                        <label class="col-sm-2 control-label" for="placement">New Placement ID :<font color="#ff0000">*</font> </label>
                        <div class="col-sm-6">
                            <input type="text" id="ir_id_no" name="ir_id_no"  value=""  placeholder="Enter Username
                                 " /> <span id="errormsg"></span> 
                        </div> 
                     
                            <button class="btn btn-bricky"  type="button" name="verify_placement"  id="verify_placement" value="Verify Placement" onclick="check_new_placement_available();" >
                               Verify Placement
                            </button>
                       
                        
                    </div>
                             
         <table>
                <tr>
                    <td width="200">Select Position:</td>
                    <td>
                        <input tabindex="1" type="radio" name="placement" id="left" value="L" checked  />
                        <label for="left"></label>
                       Left
                        <input type="radio" tabindex="1" name="placement" id="right" value="R"  /> 
                        <label for="right"></label>
                      Right
                    </td>
                </tr>
         </table>
            
            <br/><br/>
                             
                         <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky"  type="submit" name="register"  id="register" value="Change Placement"  >
                               Change Placement
                            </button>
                        </div>
                    </div>
                        
                              
                        </form>
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
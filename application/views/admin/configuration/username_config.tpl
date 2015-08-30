{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_user_name_length}</span>
    <span id="validate_msg2">{$tran_user_name_length_should_be}</span>
    <span id="validate_msg3">{$tran_you_must_enter_user_name_prefix}</span>
    <span id="validate_msg4">{$tran_invalid_user_name_prefix}</span>  
    <span id="user_name_config">{$username_config['prefix']}</span>
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_user_name_configuration}
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
                {*<form role="form" class="smart-wizard form-horizontal" class="niceform" name='username_config_form' id='username_config_form'  method="post" >
                    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="user_name_type">{$tran_select_a_user_name_type}</label>
                        <div class="col-sm-6">

                            <label class="radio-inline" for="Dynamic"><input  class="flat-green" type="radio" name="user_name_type" id="Dynamic" value="dynamic" onclick="show_tab()" {if $username_config["type"] == "dynamic"} checked {/if} />Dynamic</label>

                            <label class="radio-inline" for="Static"> <input type="radio" name="user_name_type"  class="flat-green" id="Static" value="static" {if $username_config["type"] == "static"} checked {/if}  onclick="hide_tab()"/> Static </label>

                        </div>
                    </div>
                    {if $username_config["type"] == "dynamic"}
                        <div class="form-group" id="user_type_div"  style="display: none;" >
                            <label class="col-sm-2 control-label" for="length">{$tran_user_name_length}</label>
                            <div class="col-sm-6">
                                <input  type="text" name ="length" id ="length" value="{$username_config["length"]}" maxlength="2" title="This is the number of characters in username. It should between 6 and 10."><span id="errmsg1"></span>
                            </div>
                        </div>
                    {else}
                        <div class="form-group" id="user_type_div"  style="display: none;">
                            <label class="col-sm-2 control-label" for="prefix_status"> {$tran_user_name_length}</label>
                            <div class="col-sm-6">
                                <label class="radio-inline" for="yes"><input  class="flat-green" type="radio" name="prefix_status" id="yes" value="yes" onclick="show_prefix()" {if $username_config["prefix_status"] == "yes"} checked {/if} title="You can set the username prefix."  />{$tran_yes}</label><label class="radio-inline" for="no"><input type="radio" class="flat-green" name="prefix_status" id="no" value="no" {if $username_config["prefix_status"] == "no"} checked {/if} title="The username do not have a character prefix." onclick="hide_prefix()"/> {$tran_no}</label>
                            </div>
                        </div>
                    {/if}
                    {if $username_config["type"] == "dynamic"}

                        <div class="form-group"  id="user_type_div1"  style="display: none;">
                            <label class="col-sm-2 control-label" for=""> {$tran_do_you_want_user_name_prefix} </label>
                            <div class="col-sm-6">
                                <label  class="radio-inline" for="yes"> <input  type="radio"  class="flat-green"  name="prefix_status" id="yes" value="yes" onclick="show_prefix()" {if $username_config["prefix_status"] == "yes"} checked {/if} title="You can set the username prefix."  /> {$tran_yes}</label><label  class="radio-inline" for="no"><input type="radio"  class="flat-green" name="prefix_status" id="no" value="no" {if $username_config["prefix_status"] == "no"} checked {/if} title="The username do not have a character prefix." onclick="hide_prefix()"/> {$tran_no}</label>
                            </div>
                        </div>
                    {else}
                        <div class="form-group"  id="user_type_div1"  style="display: none;" >
                            <label class="col-sm-2 control-label" for=""> {$tran_do_you_want_user_name_prefix} </label>
                            <div class="col-sm-6">
                                <label  class="radio-inline" for="yes"> <input   class="flat-green" type="radio" name="prefix_status" id="yes" value="yes" onclick="show_prefix()" {if $username_config["prefix_status"] == "yes"} checked {/if} title="You can set the username prefix."  /> {$tran_yes}</label><label class="radio-inline" for="no"> <input type="radio" class="flat-green" name="prefix_status" id="no" value="no" {if $username_config["prefix_status"] == "no"} checked {/if} title="The username do not have a character prefix." onclick="hide_prefix()"/>{$tran_no} </label>
                            </div>
                        </div>
                    {/if}*}
                    
                         <form role="form" class="smart-wizard form-horizontal" method="post"  name="username_config_form" id="username_config_form" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                        
            <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">

            <table>
                <tr>
                    <td width="200">{$tran_select_a_user_name_type}:</td>
                    <td>
                        <input tabindex="1" type="radio" name="user_name_type" id="Dynamic" value="dynamic" {if $username_config["type"] == "dynamic"} checked {/if}  />
                        <label for="Dynamic"></label>
                        {$tran_Dynamic}
                        <input type="radio" tabindex="1" name="user_name_type" id="Static" value="static" {if $username_config["type"] == "static"} checked {/if}  /> 
                        <label for="Static"></label>
                        {$tran_Static}
                    </td>
                </tr>
                {if $username_config["type"] == "dynamic"}
                    <tr id="user_type_div"  style="display: none;">

                        <td width="200">{$tran_user_name_length}:</td>
                        <td><input tabindex="2" type="text" name ="length" id ="length" value="{$username_config["length"]}" maxlength="2" title="{$tran_user_length_title}"><span id="errmsg1"></span></td>
                    </tr>
                {else}
                    <tr id="user_type_div"  style="display: none;">

                        <td width="200">{$tran_user_name_length}:</td>
                        <td><input tabindex="2" type="text" name ="length" id ="length" value="{$username_config["length"]}" maxlength="2" title="{$tran_user_length_title}"><span id="errmsg1"></span></td>
                    </tr>
                {/if}
                {if $username_config["type"] == "dynamic"}
                    <tr id="user_type_div1"  style="display: none;">     
                        <td>{$tran_do_you_want_user_name_prefix}:</td>
                        <td><input tabindex="3" type="radio" name="prefix_status" id="yes" value="yes"  {if $username_config["prefix_status"] == "yes"} checked {/if} title="{$tran_You_can_set_the_username_prefix}"  /> 
                            <label for="yes"></label>{$tran_yes}
                            <input tabindex="3" type="radio" name="prefix_status" id="no" value="no" {if $username_config["prefix_status"] == "no"} checked {/if} title="{$tran_The_username_do_not_have_a_character_prefix}" onclick="hide_prefix()"/> <label for="no"></label>{$tran_no} </td>
                    </tr>
                {else}
                    <tr id="user_type_div1"  style="display: none;" >     
                        <td>{$tran_do_you_want_user_name_prefix}:</td>
                        <td><input tabindex="3" type="radio" name="prefix_status" id="yes" value="yes"  {if $username_config["prefix_status"] == "yes"} checked {/if} title="{$tran_You_can_set_the_username_prefix}"  /> <label for="yes"></label>{$tran_yes}<input tabindex="3" type="radio" name="prefix_status" id="no" value="no" {if $username_config["prefix_status"] == "no"} checked {/if} title="{$tran_The_username_do_not_have_a_character_prefix}" /> <label for="no"></label>{$tran_no} </td>
                    </tr>
                {/if}
                <tr id="prefix_div"  style="display:none;"> </tr>
               {* <tr>
                    <td>&nbsp</td>
                    <td>
                        <input type="submit" value="{$tran_update}" name="update" id="update" title="{$tran_Update_Username_Configuration}"></td>
                </tr> *}
           
                <tr>
                        <tr>
                    <td></td>
                    <td>
                 
                   
                            <button class="btn btn-bricky" tabindex="4"   type="submit" value="{$tran_update}" name="update" id="update" > {$tran_update}</button>
                       
              
                    </td></tr>
                </tr>
            </table>

        </form>
                        
                        
            </div>
        </div>
    </div>
</div>
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init();  
    ValidateContentManagement.init();
});
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  

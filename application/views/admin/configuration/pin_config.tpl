{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
    <span id="error_msg">{$tran_you_must_enter_e_pin_length}</span>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>   {$tran_e_pin_configuration}
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
                <form  role="form" class="smart-wizard form-horizontal" name='pin_config_form' id='pin_config_form' method="post" >
                   
                      <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    
                    
                    {if $prod_status=='no'}
      <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin_value">{$tran_value_of_e_pin}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name="pin_value" id="pin_value" value="{$pin_config["pin_amount"]}" title="Purchase value of one E-Pin" autocomplete="Off" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
{/if}
                           {* <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin_length">{$tran_e_pin_length}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="pin_length" id ="pin_length" value="{$pin_config["pin_length"]}" maxlength="2" title="{$tran_the_no_of_characters_in_e_pin}" autocomplete="Off"tabindex="1">
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>*}
                             <div class="form-group">
                        <label class="col-sm-2 control-label" for="pin_maxcount">{$tran_maximun_active_e_pin}:</label>
                        <div class="col-sm-6">
                            <input  type="text"  name ="pin_maxcount" id ="pin_maxcount" value="{$pin_config["pin_maxcount"]}" maxlength="5" readonly title="{$tran_the_maximum_no_of_active_e_pin_at_a_time}." autocomplete="Off" tabindex="2" >
                            <span id="username_box" style="display:none;"></span>
                        </div>
                    </div>
                            
     <div class="form-group">
                        <label class="col-sm-2 control-label" for="refferal_status">{$tran_e_pin_character_set}:{$pin_config["pin_character_set"]}</label>
                     
                    
                    
                        <div class="col-sm-6">

                            <label class="radio-inline" for="status_yes"><input tabindex="3"   type="radio" name="pin_character" id="alphabet" value="alphabet" {if $pin_config["pin_character_set"] == "alphabet" }checked {/if}/>
                               {$tran_alphabets}</label>
                            <label class="radio-inline"  for="status_no"><input tabindex="3"  type="radio"  name="pin_character" id="numeral" value="numeral" {if $pin_config["pin_character_set"] == "numeral" } checked {/if} />
                            {$tran_numerals}  </label> 
                           <label class="radio-inline"  for="status_no"><input tabindex="3"  type="radio" name="pin_character" id="alphanumeric" value="alphanumeric" {if $pin_config["pin_character_set"] == "alphanumeric" } checked {/if} />
                             {$tran_alphanumerals} </label> 

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="4"   type="submit"  value="{$tran_update}" name="update" id="update" > {$tran_update}</button>                                
                        </div>
                    </div>

                </form>
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
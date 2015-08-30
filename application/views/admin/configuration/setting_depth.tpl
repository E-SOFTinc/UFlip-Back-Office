{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{*$tran_you_must_enter_pay_out_pair_price*}</span>

    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
</div>

<!-- start: PAGE CONTENT -->

{if $mlm_plan =="Binary"}

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_setting_depth}
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
                    <form  role="form" class="smart-wizard form-horizontal" name='set_depth_width' id='set_depth_width' method="post" >
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                            </div>
                        </div>
                            
			<div class="form-group">
                            <label class="col-sm-2 control-label" for="depth_value">{$tran_depth_value}:</label>
                            <div class="col-sm-6">
                                <input  type="text"  name="depth_value" id="depth_value" value="{$obj_arr["depth_ceiling"]}" tabindex="1" >
                                <span id="username_box" style="display:none;"></span>
                            </div>
                        </div>
                                
                              <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-bricky" tabindex="4"   type="submit"  value="{$tran_update}" name="update" id="update" tabindex="3"> {$tran_update}</button>                                
                            </div>
                        </div>  
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    {/if}
    {*<div class="panel panel-default">
    <div class="panel-heading">
    <i class="fa fa-external-link-square"></i>{$tran_setting_depth}
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
    <form  role="form" class="smart-wizard form-horizontal" name='level_depth_width' id='set_depth_width' method="post" >
    <div class="form-group">
    <label class="col-sm-2 control-label" for="depth_value">{$tran_depth_value}:</label>
    <div class="col-sm-6">
    <input  type="text"  name="depth_value" id="depth_value" value="{$obj_arr["depth_cieling"]}" tabindex="1" >
    <span id="username_box" style="display:none;"></span>
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-2 col-sm-offset-2">
    <button class="btn btn-bricky" tabindex="4"   type="submit"  value="{$tran_update}" name="update" id="update" tabindex="3"> {$tran_update}</button>                                
    </div>
    </div>
    {/if}


    </form>
    </div> *}


    {include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
    <script>
        jQuery(document).ready(function() {
            Main.init();
            ValidateSettings.init();
        });
    </script>

    {include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
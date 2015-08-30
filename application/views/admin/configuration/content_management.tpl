{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
    <span id="validate_msg1">{$tran_you_must_enter_company_name}</span>
    <span id="validate_msg2">{$tran_you_must_company_address}</span>
    <span id="validate_msg3">{$tran_you_must_enter_main_matter}</span>
    <span id="validate_msg4">{$tran_you_must_enter_product_matter}</span>
    <span id="validate_msg5">{$tran_you_must_enter_place}</span>
    <!--<span id="validate_msg6">{$tran_you_must_select_a_logo}</span>-->
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_content_management}
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
            <div class="panel-body"  >
                <form role="form" class="smart-wizard form-horizontal" name= 'form_setting'  id='form_setting' method ='post' enctype="multipart/form-data" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                    <div class="tabbable">
                        
                        <ul class="nav nav-tabs tab-green">
                            <li class="{$tab1}">
                                <a href="#panel_tab3_example1" data-toggle="tab">{$tran_welcome_letter}</a>
                            </li>
                            <li class="{$tab2}">
                                <a href="#panel_tab3_example2" data-toggle="tab">{$tran_terms}</a>
                            </li>

                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane in {$tab1}" id="panel_tab3_example1">
                                {include file="admin/configuration/letter_config.tpl"  name=""}
                            </div>
                            <div class="tab-pane{$tab2}" id="panel_tab3_example2">
                                {include file="admin/configuration/termsconditions_config.tpl"  name=""}
                            </div>

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
    //ValidateContentManagement.init();
});
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg">{$tran_you_must_select_an_amount}</span> 
    <span id="error_msg1">{$tran_you_must_enter_count}</span>
    <span id="error_msg2">{$tran_you_must_select_a_product_name}</span>
    <span id="error_msg3">{$tran_you_must_enter_your_product_amount}</span>
    <span id="error_msg4">{$tran_please_enter_any_keyword_like_pin_number_or_pin_id}</span>
    <span id ="error_msg6">{$tran_You_must_select_a_date}</span>
    <span id ="error_msg7">{$tran_past_expiry_date}</span>
    <span id="validate_msg">{$tran_enter_digits_only}</span>
    <span id="validate_msg1">{$tran_digits_only}</span>
    <span id="confirm_msg_delete">{$tran_Sure_you_want_to_delete_this_Product_There_is_NO_undo}</span>
    <span id="confirm_msg_edit">{$tran_Sure_you_want_to_edit_this_Product_There_is_NO_undo}</span>
    <span id="confirm_msg_activate">{$tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo}</span>
    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
    <span id="validate_msg_img1">{$tran_you_must_select_a_product_name}</span>
    <span id="validate_msg_img2">{$tran_you_must_select_a_product_image}</span>
    
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    
    
</div>




<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_epin_management}
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


                <div class="tabbable ">
                    <ul id="myTab3" class="nav nav-tabs tab-green">
                        <li class="{$tab1}">
                            <a href="#panel_tab4_example1" data-toggle="tab">
                                <i class="pink fa fa-dashboard"></i> {$tran_add_new_epin}
                            </a>
                        </li>
                        <li class="{$tab2}">
                            <a href="#panel_tab4_example2" data-toggle="tab">
                                <i class="blue fa fa-user"></i>{$tran_search_epin}
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane{$tab1}" id="panel_tab4_example1">
                            <p>
                                {include file="admin/epin/generate_epin.tpl"  name=""}
                            </p>
                        </div>

                        <div class="tab-pane{$tab2}" id="panel_tab4_example2">
                            <p>
                                {include file="admin/epin/search_epin.tpl"  name=""}
                            </p>
                        </div>

                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
{if $un_allocated_pin > 0}
    <script>
        jQuery(document).ready(function() {
            Main.init();
            TableData.init();
            DatePicker.init();  
            ValidateUser.init();

        });
    </script>
{else}
    <script>
        jQuery(document).ready(function() {
            Main.init();
           TableData.init();
           DatePicker.init();  
            ValidateUser.init();

        });
    </script>    
{/if}
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}

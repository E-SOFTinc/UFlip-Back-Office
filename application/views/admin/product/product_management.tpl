{include file="admin/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_you_must_enter_your_product_identifying_number}</span>
    <span id="error_msg">{$tran_you_must_enter_your_product_name}</span>
    <span id="error_msg3">{$tran_you_must_enter_your_product_amount}</span>
    <span id="error_msg4">{$tran_you_must_enter_your_product_pair_value}</span>
    <span id="validate_msg">{$tran_enter_digits_only}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <span id="nofond">{$tran_nofond}</span>
    <span id="showing">{$tran_showing}</span>
    <span id="to">{$tran_to}</span>
    <span id="of">{$tran_of}</span>
    <span id="entries">{$tran_entries}</span>
    <span id="notavailable">{$tran_notavailable}</span>
    <span id="validate_msg1">{$tran_digits_only}</span>
    <span id="confirm_msg_inactivate">{$tran_Sure_you_want_to_inactivate_this_Product_There_is_NO_undo}</span>
    <span id="confirm_msg_edit">{$tran_Sure_you_want_to_edit_this_Product_There_is_NO_undo}</span>
    <span id="confirm_msg_activate">{$tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo}</span>
    <input type="hidden" id="path_root" name="path_root" value="{$PATH_TO_ROOT_DOMAIN}">
    <span id="validate_msg_img1">{$tran_you_must_select_a_product_name}</span>
    <span id="validate_msg_img2">{$tran_you_must_select_a_product_image}</span>
</div>




<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_product_management}
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
                                <i class="pink fa fa-dashboard"></i> {$tran_manage_product}
                            </a>
                        </li>
                        <li class="{$tab2}">
                            <a href="#panel_tab4_example2" data-toggle="tab">
                                <i class="blue fa fa-user"></i>{$tran_add_product_image}
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane{$tab1}" id="panel_tab4_example1">



                            <form role="form" class="smart-wizard form-horizontal" id="proadd" name="proadd" method="post">
                                <div class="panel panel-default">

                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i>{$tran_manage_product}
                                    </div> 
                                    <div class="panel-body">               

                                        <div class="col-md-12">
                                            <div class="errorHandler alert alert-danger no-display">
                                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="prod_name">{$tran_name_of_the_product}:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="1" type="text" name="prod_name" id="prod_name" size="20" value="{$pr_name}" 
                                                       title=""/>  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="product_id">{$tran_product_id}: <font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="2" type="text" name="product_id" id="product_id" size="20" value="{$pr_id_no}" 
                                                       title=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="product_amount">{$tran_product_amount}:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="3" type="text" name="product_amount" id="product_amount" size="20" value="{$pr_value}" 
                                                       title="{$tran_Actual_amount_of_the_product}"/>
                                                <span id="errmsg1"></span>
                                            </div>

                                        </div>
                                        {if $paln_mlm!='Board'}
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="pair_value">{$tran_pair_value}:<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <input tabindex="4" type="text" name="pair_value" id="pair_value" size="20" value="{$pair_value}" 
                                                       title="{$tran_product_pair_value}"/>
                                                <span id="errmsg2"></span>
                                            </div>


                                        </div>
                                        {/if}
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label" for="bonus_status">{$tran_Participation_bonus_status}<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                            
                                              <input type="radio" name="bonus_status" value="yes" {if $participation_bonus_status=='yes'}checked{/if}>{$tran_yes}
                                              <input type="radio" name="bonus_status" value="no" {if $participation_bonus_status=='no'}checked{/if}>{$tran_no}

                                                <span id="errmsg1"></span>
                                            </div>

                                        </div>
                                        <!--  <div class="form-group">
                                              <label class="col-sm-4 control-label" for="product_amount">Product BV:<font color="#ff0000">*</font></label>
                                              <div class="col-sm-3">
         <input tabindex="5" type="text" name="bv_value" id="bv_value" size="20" value="{$bv_value}" 
                                                 title="Enter BV Value"/>
                                              </div>
                                          </div>-->
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-4">


                                                {if $action=="edit"}
                                                    <input type="hidden" name="prod_id" id="prod_id" size="35" value="{$pr_id}"/>
                                                    <button class="btn btn-bricky" type="submit" name="update_prod"  id="update Product" value="update Product" tabindex="">{$tran_update_Product}</button>

                                                {else}
                                                    <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/">
                                                    <button class="btn btn-bricky" type="submit" name="submit_prod"  id="submit_prod" value="add product" tabindex="5">{$tran_add_product}</button>

                                                {/if}

                                           <!-- <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/"> -->
                                                <!--<button class="btn btn-bricky" type="submit" name="submit_prod"  id="submit_prod" value="add product" tabindex="4">Add product</button> -->

                                            </div>

                                        </div>
                                        <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                                    </div>
                                </div>
                            </form>




                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i>{$tran_product_available}
                                </div> 
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                                        </div>
                                    </div>
                                    <form role="form" class="smart-wizard form-horizontal" id="proad" name="proad" method="post">



                                        <div class="form-group">
                                            <!-- <label class="col-sm-2 control-label" for="service"> </label>-->
                                            <div class="col-sm-3">

                                                <input tabindex="6" type="radio" id="status_active" name="pro_status" value="yes" checked {if $sub_status=='yes'}checked='1'{/if} /><label for="val"></label>{$tran_active_product}</div>

                                            <div class="col-sm-3">
                                                <input tabindex="7" type="radio" name="pro_status" id="status_inactive" value="no" {if $sub_status=='no'}checked='1'{/if} /><label for="valid"></label>{$tran_inactive_product}</div>



                                            <div class="col-sm-2 col-sm-offset-2">

                                                <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}admin/">
                                                <button class="btn btn-bricky" type="submit" name="refine"  id="refine" value="add product" tabindex="8">{$tran_refine}</button>

                                            </div>
                                        </div>



                                        {*assign var=i value="0"}
                        
                        
                                        {assign var=class value=""}
                        
                        
                        
                                        {if count($feedback)!=0*}
                                        {if count($product_details)!=0}

                                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                                <thead>
                                                    <tr class="th" align="center">
                                                        <th>No</th>
                                                        <th>{$tran_product_id}</th>
                                                        <th>{$tran_product_name}</th>
                                                        <th>{$tran_product_amount}</th>
                                                        <!--<th>BV Value</th>-->
                                                        {if $paln_mlm!='Board'}
                                                        <th>{$tran_pair_value}</th>
                                                        {/if}
                                                        <th>{$tran_product_status}</th>
                                                        <th>{$tran_action}</th>

                                                    </tr>
                                                </thead>


                                                {assign var="i" value=0}
                                                <tbody>

                                                    {foreach from=$product_details item=v}
                                                        {assign var="class" value=""}

                                                        {if $i%2==0}
                                                            {$clr='tr1'}
                                                        {else}
                                                            {$clr='tr2'}
                                                        {/if}
                                                        {assign var="id" value="{$v.product_id}"}
                                                        {assign var="name" value="{$v.product_name}"}
                                                        {assign var="active" value="{$v.active}"}
                                                        {assign var="date" value="{$v.date_of_insertion}"}
                                                        {assign var="prod_id" value="{$v.prod_id}"}
                                                        {assign var="prod_value" value="{$v.product_value}"}
                                                        {assign var="prod_bv" value="{$v.prod_bv}"}
                                                        {assign var="pair_value" value="{$v.pair_value}"}

                                                        {if $active=='yes'}
                                                            {$status=$tran_active}
                                                        {else}
                                                            {$status=$tran_inactive}
                                                        {/if}


                                                        <tr class="{$class}" align="center" >
                                                            <td>{counter}</td>
                                                            <td>{$prod_id}</td>
                                                            <td>{$name}</td>
                                                            <td>{$prod_value}</td>
                                                            <!--<td>{$prod_bv}</td>-->
                                                            {if $paln_mlm!='Board'}
                                                            <td>{$pair_value}</td>
                                                            {/if}
                                                            <td>{$status}</td>
                                                            <td>
                                                                {if $active=='yes'}


                                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                        <a href="javascript:edit_prod({$id})" class="btn btn-teal tooltips" data-placement="top" data-original-title="Edit {$name}"><input type="hidden" name="edit_product" id="edit_prod" size="35" />
                                                                            <i class="fa fa-edit"></i></a>


                                                                        <!--Inactivate Product start-->
                                                                        <a href="javascript:inactivate_prod({$id})" onclick=""  class="btn btn-primary tooltips" data-placement="top" data-original-title="Inactivate {$name}">
                                     <span style="display:none" id="error_msg_activate">{$tran_Sure_you_want_to_inactivate_this_Product_There_is_NO_undo}</span>
                                                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                                                        </a>
                                                                        <!--Inactivate Product end-->
                                                                    {else}
                                                                        <!--Activate Product start-->

                                                                        <a href="javascript:activate_prod({$id})" class="btn btn-green tooltips" data-placement="top" data-original-title="Activate {$name}"><i class="glyphicon glyphicon-ok-sign"></i></a>

                                                                        <span style="display:none" id="error_msg_activate">{$tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo}</span>
                                                                        
                                                                        </a>
                                                                        <!--Activate Product end-->
                                                                    {/if}                                                                                      
                                                                </div>

                                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                                                        </a>
                                                                        <ul role="menu" class="dropdown-menu pull-right">
                                                                            <li role="presentation">
                                                                                <a role="menuitem"  href="javascript:edit_prod({$id})">
                                                                                    <i class="fa fa-edit"></i> Edit {$name}
                                                                                </a>
                                                                            </li>
                                                                           
                                                                        </ul>
                                                                    </div>
                                                                </div>



                                                            </td>

                                                        </tr>
                                                        {$i=$i+1}
                                                    {/foreach}             
                                                </tbody>
                                            </table>
                                                {$result_per_page}

                                        {else}
                                            <h3> {$tran_no_product_found}</h3>
                                        {/if}                   




                                        <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                                    </form>
                                </div>

                            </div>

                        </div>

                        <div class="tab-pane{$tab2}" id="panel_tab4_example2">

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <i class="fa fa-external-link-square"></i>{$tran_add_product_image}
                                </div> 
                                <div class="panel-body">


                                    <form role="form" class="smart-wizard form-horizontal" id="product_image_form" name="product_image_form" enctype="multipart/form-data" method="post">

                                        <div class="col-md-12">
                                            <div class="errorHandler alert alert-danger no-display">
                                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="product_id">{$tran_select_product}:<font color="#ff0000">*</font></label>



                                            <div class="col-sm-6">                      
                                                <select name="product_id" id="product_id_img" tabindex="9"  class="form-control">
                                                    <option value="">{$tran_select_product}</option>
                                                    {foreach from = $product_image_details item=i}
                                                        {assign var="id" value="{$i.product_id}"}
                                                        {assign var="product_name" value="{$i.product_name}"}
                                                        {assign var="prod_id" value="{$i.prod_id}"}

                                                        <option value="{$id}">{$prod_id}--{$product_name}</option>
                                                    {/foreach}
                                                </select>     

                                            </div>          

                                        </div>
                                        <!--  <div class="row">
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label" for="userfile">{$tran_select_image}:<font color="#ff0000">*</font></label>
                                        <div class="row">
                                 <div class="col-md-9">  
                                        <div class="user-edit-image-buttons">
                                         <input type="file" id="userfile" name="userfile" >
                               
                                 </div>
                                 </div></div>  
                                     </div>
                                          </div>     
                                        -->


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="product_id"> {$tran_select_image}:<font color="#ff0000" >*</font></label>
                                            <div class="col-sm-6">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" >
                                                    <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="{$PUBLIC_URL}images/profile_picture/noproduct.jpg" alt="">
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                                    <div class="user-edit-image-buttons">
                                                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> {$tran_select_image}</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                                            <input type="file" id="userfile" name="userfile" tabindex="10">
                                                        </span><br/><font color="#ff0000">{$tran_kb}({$tran_Allowed_types_are_gif_jpg_png_jpeg_JPG})
                                                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i>Remove
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <button class="btn btn-bricky" name="upload" id="upload" value="upload" tabindex="11">
                                                    {$tran_upload}
                                                </button>
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
    </div>
</div>

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        ValidateUser.init();

    });
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  


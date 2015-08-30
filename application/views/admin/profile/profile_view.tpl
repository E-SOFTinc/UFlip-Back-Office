{include file="admin/layout/header.tpl"  name=""}

<!-- start: PAGE HEADER -->

<!-- end: PAGE HEADER -->

<!-- start: PAGE CONTENT -->
<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_You_must_enter_user_name}</span>
    <span id="error_msg2">{$tran_you_must_enter_new_transaction_password}</span>
    <span id="error_msg3">{$tran_You_must_enter_your_address}</span>
    <span id="error_msg4">{$tran_reenter_new_transaction_password}</span>                     
    <span id="error_msg5">{$tran_new_transaction_password_mismatch}</span>        
    <span id="error_msg6">{$tran_you_must_select_a_username}</span>
    <span id="error_msg7">{$tran_You_Select_A_Gender}</span>
    <span id="error_msg8">{$tran_You_must_enter_your_mobile_no}</span>
    <span id="error_msg10">{$tran_pan_format}</span>
</div>
    
{*{if !isset($smarty.post.profile_view)}*}
    <div class="row" >
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>{$tran_select_user} 
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
                            <label class="col-sm-2 control-label" for="user_name">{$tran_select_user_id}<span class="symbol required"></span></label>
                            <div class="col-sm-3">
                                <input placeholder="{$tran_type_members_name}" class="form-control" type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" tabindex="1" >

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <button class="btn btn-bricky" type="submit" id="profile_update" value="profile_update" name="profile_update" tabindex="2">
                                    {$tran_view}
                                </button>
                            </div>
                        </div>

                        <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                        <input type="hidden" value={$details["detail1"]["country"]} name="cur_country" id="cur_country">

                    </form>
                </div>
            </div>
        </div>
    </div>
{*{/if}*}
<!-- end: PAGE CONTENT -->
{if isset($smarty.post.profile_view)}
    {include file="admin/profile/user_summary_header.tpl"  name=""}
{/if}
{if $profile_view_permission!='no'}
    <div class="row">
        <div class="col-sm-12">
            <div class="tabbable">
                <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                    <li class="{$tab1}">
                        <a data-toggle="tab" href="#panel_overview">
                            {$tran_Overview}
                        </a>
                    </li>
                    <li class="{$tab2}">
                        <a data-toggle="tab" href="#panel_edit_account">
                            {$tran_Edit_Account}
                        </a>
                    </li>
                    {*{if $mlm_plan!= "Board"}
                        <li class="{$tab3}">
                            <a data-toggle="tab" href="#panel_edit_network">
                                {$tran_Edit_Network}
                            </a>
                        </li>
                    {/if}*}
                </ul>
                <div class="tab-content">
                    <div id="panel_overview" class="tab-pane in{$tab1}">
                        <div class="row">
                            <div class="col-sm-5 col-md-12">
                                <div class="user-left">
                                    <h4>{$u_name}{$tran_s_profile}</h4>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="user-image">
                                            <div class="fileupload-new thumbnail" ><img src="{$PUBLIC_URL}images/profile_picture/{$file_name}" width="122" alt="Profile Picture">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div class="user-image-buttons">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="center">

                                        <hr>
                                        <p>
                                            <!--<a class="btn btn-twitter btn-sm btn-squared">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a class="btn btn-linkedin btn-sm btn-squared">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a class="btn btn-google-plus btn-sm btn-squared">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a class="btn btn-github btn-sm btn-squared">
                                                <i class="fa fa-github"></i>
                                            </a>-->
                                        </p>
                                        <hr>
                                    </div>
                                    <table class="table table-condensed table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan="3">{$tran_sponsor_package_info}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="180px">{$tran_placement_user_name}</td><td width="50px"> : </td>
                                                <td>{$sponser['name']} </td>
                                                <!--<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>-->
                                            </tr>
                                            {if $mlm_plan!= "Board"}
                                                <tr>
                                                    <td>{$tran_position}  </td><td width="50px"> : </td>
                                                    <td>{if $details["detail1"]["position"]=='L'} {$tran_left} {elseif $details["detail1"]["position"]=='R'} {$tran_right} {/if} </td>

                                                </tr>
                                            {/if}
                                            {if $product_status == "yes"}
                                                <tr>
                                                    <td>{$tran_package}<td width="50px"> : </td>  </td>
                                                    <td> {$product_name} </td>

                                                </tr>
                                            {/if}
                                            {if $pin_status == "yes"}
                                                <tr>
                                                    <td>{$tran_epin} <td width="50px"> : </td> </td>
                                                    <td>{$details["detail1"]["passcode"]}</td>

                                                </tr>
                                            {/if}

                                        </tbody>
                                    </table>
                                    <table class="table table-condensed table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan="3">  {$tran_personal_info}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td  width="180px">{$tran_name} <td width="50px"> : </td></td>
                                                <td>{$details["detail1"]["name"]} </td>

                                            </tr>
                                            <tr>
                                                <td>{$tran_user_name} <td width="50px"> : </td> </td>
                                                <td>
                                                    {$u_name} </td>

                                            </tr>

                                            <tr>
                                                <td>{$tran_date_of_birth}<td width="50px"> : </td> </td>
                                                <td> {$details["detail1"]["dob"]} </td>

                                            </tr>


                                            <tr>
                                                <td>{$tran_gender} <td width="50px"> : </td> </td>
                                                <td>{if $details["detail1"]["gender"]=='M'}
                                                    {$tran_male}
                                                {elseif $details["detail1"]["gender"]=='F'}
                                                    {$tran_female}
                                                {/if}       </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3">   {$tran_contact_info}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td  width="180px">{$tran_address} <br/></td><td width="50px"> : </td>
                                            <td>{$details["detail1"]["address"]} </td>

                                        </tr>
                                        <tr>
                                            <td>{$tran_country} </td><td width="50px"> : </td>
                                            <td>
                                                {$details["detail1"]["country"]}</td>
                                        </tr>
                                        {*  {if $details["detail1"]["country"] == "India"}*}
                                        <tr>
                                            <td>{$tran_state} </td><td width="50px"> : </td>
                                            <td>
                                                {$details["detail1"]["state"]}</td>
                                        </tr>
                                        {*  <tr>
                                        <td>{$tran_district}  </td><td width="50px"> : </td>
                                        <td>
                                        {$details["detail1"]["district"]}</td>
                                        </tr>
                                        {* {else}
                                        <tr>
                                        <td>{$tran_location}  </td><td width="50px"> : </td>
                                        <td>
                                        {$details["detail1"]["town"]}</td>
                                        </tr>
                                        {/if}*}
                                        <tr>
                                            <td>{$tran_pincode} <td width="50px"> : </td> </td>
                                            <td>
                                                {$details["detail1"]["pincode"]}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>{$tran_mob_no_10_digit} </td><td width="50px"> : </td>
                                            <td>
                                                {$details["detail1"]["mobile"]}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>{$tran_land_line_no}  <td width="50px"> : </td></td>
                                            <td>
                                                {$details["detail1"]["land"]}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>{$tran_email} <td width="50px"> : </td> </td>
                                            <td>
                                                {$details["detail1"]["email"]}
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                                {*<table class="table table-condensed table-hover">
                                <thead>

                                <tr>
                                <th colspan="3"> {$tran_nominee_info}</th>
                                </tr>
                                </thead>
                                <tbody> 
                                <tr>
                                <td  width="180px">{$tran_nominee_name} <br/></td><td width="50px"> : </td>
                                <td>{$details["detail1"]["nominee"]} </td>

                                </tr>

                                <tr>
                                <td>{$tran_relation}</td><td width="50px"> : </td>
                                <td>{$details["detail1"]["relation"]}</td>
                                </tr>
                                </tbody>
                                </table>*}
                                {*<table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3"> {$tran_bank_info}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td width="180px">{$tran_pan_no}</td><td width="50px"> : </td>
                                            <td>{$details["detail1"]["pan"]}</td>

                                        </tr>
                                        <tr>
                                            <td>{$tran_bank_account_number}</td>          <td width="50px"> : </td>    

                                            <td>{$details["detail1"]["acnumber"]}</td>

                                        </tr>
                                        <tr>
                                            <td>{$tran_ifsc_code}</td><td width="50px"> : </td> 
                                            <td>{$details["detail1"]["ifsc"]}</td>

                                        </tr>
                                        <tr>
                                            <td>{$tran_bank_name}</td><td width="50px"> : </td> 
                                            <td>

                                                {$details["detail1"]["nbank"]}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>{$tran_branch_name}</td><td width="50px"> : </td>
                                            <td>{$details["detail1"]["nbranch"]}</td>
                                            <!-- <td><span class="label label-sm label-info">Administrator</span></td>-->

                                        </tr>
                                    </tbody>
                                </table>*}
                               {* <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3"> {$tran_social_profiles}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="180px">{$tran_Facebook}</td><td width="50px"> : </td>
                                            <td>{$details["detail1"]["facebook"]}</td>

                                        </tr>
                                        <tr>
                                            <td>{$tran_Twitter}</td><td width="50px"> : </td>
                                            <td>{$details["detail1"]["twitter"]}</td>

                                        </tr>
                                    </tbody>
                                </table>*}
                            </div>
                        </div>

                    </div>
                </div>
                <div id="panel_edit_account" class="tab-pane{$tab2}">
                    <form role="form" method="post" name="user_register" id="user_register" action="{$BASE_URL}admin/profile/profile_view" enctype="multipart/form-data" >     
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> {$tran_errors_check}
                            </div>
                        </div>
                        <input type="hidden" name="path" id="path" value="{$PATH_TO_ROOT_DOMAIN}admin/">
                        <input type="hidden" name="lang_id" id="lang_id" value="{$lang_id}">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{$tran_sponsor_package_info}</h3>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        {$tran_image_upload}
                                    </label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload" >
                                        <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="{$PUBLIC_URL}images/profile_picture/{$file_name}" alt="">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                                        <div class="user-edit-image-buttons">
                                            <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> {$tran_Select_image}</span><span class="fileupload-exists"><i class="fa fa-picture"></i> {$tran_Change}</span>
                                                <input type="file" id="userfile" name="userfile" tabindex="4">
                                            </span>
                                            <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                <i class="fa fa-times"></i>{$tran_Remove}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        {$tran_placement_user_name}
                                    </label>
                                    <label class="form-control" readonly="true">
                                        {$sponser['name']}
                                    </label>

                                </div>
                            </div>
                            {if $mlm_plan!= "Board"}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_position}
                                        </label>
                                        <label class="form-control" readonly="true">
                                            {if $details["detail1"]["position"]=='L'} {$tran_left} 
                                            {elseif $details["detail1"]["position"]=='R'} {$tran_right} 
                                            {/if}
                                        </label>
                                    </div>
                                </div>
                            {/if}
                            {if $product_status == "yes"}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_package}
                                        </label>
                                        <label class="form-control" readonly="true">
                                            {$product_name}
                                        </label>

                                    </div>
                                </div>


                            {/if}
                            {if $pin_status == "yes"}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_epin}
                                        </label>
                                        <label class="form-control" readonly="true">
                                            {$details["detail1"]["passcode"]}
                                        </label>

                                    </div>
                                </div>
                            {/if}

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>  {$tran_personal_info}</h3>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        {$tran_name}<span class="symbol required"></span>
                                    </label>                                    
                                  <!--  <input  class="form-control" name="name" id="name" type="text" tabindex="4" value="{$details["detail1"]["name"]}" />-->	    

                                    <input  class="form-control" name="name" tabindex="5" id="name" type="text"  size="22" {if $user_type!='admin'} readonly="true" {/if} maxlength="50" value="{$details["detail1"]["name"]}" />{form_error('name')}</td>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        {$tran_user_name}<span class="symbol required"></span>
                                    </label>
                                    <label class="form-control" readonly="true">
                                        {$u_name}
                                    </label>
                                    <input class="form-control" name="username" id="username" type="hidden"  size="22" maxlength="20" value="{$u_name}" tabindex="6" />{form_error('username')}</td>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        {$tran_date_of_birth}<span class="symbol required"></span>
                                    </label>
                                    <div class="row">
                                        <input  class="form-control" name="date_of_birth" id="date_of_birth" type="hidden" size="16" maxlength="10" value="{$details["detail1"]["dob"]}" />
                                        {$dob = explode('-',$details["detail1"]["dob"])}
                                        <div class="col-md-3">
                                            <select class="form-control"   name="year" id="year" onchange="change_year(this);" tabindex="7">
                                                <option value="{$dob[0]}">{$dob[0]}</option>
                                                {for $i = 1900 to 2020}
                                                    <option value="{$i}">{$i}</option>
                                                {/for}
                                            </select>
					    {form_error('year')}
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control"  name="month" id="month" onchange="change_month(this);" tabindex="8">
                                                <option value="{$dob[1]}">{$dob[1]}</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option></select>
						{form_error('month')}
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control"  name="day" id="day" onchange="change_day(this);" tabindex="9">
                                                <option value="{$dob[2]}">{$dob[2]}</option>
                                                {for $i = 1 to 31}
                                                    <option value="{$i}" >{$i}</option>{/for}</select>
						    {form_error('day')}
                                            </div>


                                        </div>
					    
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_gender}<span class="symbol required"></span>
                                        </label>
                                        <div class="row">
                                            <div class="col-md-9">                      
                                                <select name="gender" id="gender" tabindex="10"  class="form-control">
                                                    <option value="" >{$tran_select_gender}</option>
                                                    {if $details["detail1"]["gender"]=='M'} 
                                                        <option value='M' selected='selected'>{$tran_male} </option>
                                                        <option value='F'>{$tran_female}</option>				
                                                    {else if $details["detail1"]["gender"]=='F'}                
                                                        <option value='M' >{$tran_male} </option>
                                                        <option value='F' selected='selected'>{$tran_female}</option>				
                                                    {else}
                                                        <option value='M' >{$tran_male} </option>
                                                        <option value='F'>{$tran_female}</option>
                                                    {/if}
                                                </select>     
                                            </div>
                                        </div>
						{form_error('gender')}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>  {$tran_contact_info}</h3>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_address}<span class="symbol required"></span>
                                        </label>
                                        <div class="row">
                                            <div class="col-md-9">   
                                                <textarea  class="form-control"rows="4" name="address" id="address" cols="17" tabindex="11" >{$details["detail1"]["address"]}</textarea>
                                            </div>
                                        </div>
					    {form_error('address')}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_country}
                                        </label><span class="symbol required"></span>
                                        <div class="row">
                                            <div class="col-md-9">   
                                                <select name="country" id="country" tabindex="12" onChange="getAllStates(this.value)" class="form-control">
                                                    {$countries}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {*if $details["detail1"]["country"] == "India"*}
                                <div id="prof_state_div">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                {$tran_state}
                                            </label>
                                            <div class="row">
                                                <div class="col-md-9"> 

                                                    <select name="state" id="state" tabindex="13" {*onChange="getStateProfile(this.value, 'admin')"*} class="form-control">
                                                        {$state}
                                                    </select>                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {*   <div id="statediv1">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">
                                {$tran_district}
                                </label>
                                <div class="row">
                                <div class="col-md-9">   
                                {$district}</div>                                
                                </div>
                                </div>
                                </div>
                                </div>*}
                                {*else*}
                                {*   <div id="locationdiv">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">
                                {$tran_location}
                                </label>
                                <div class="row">
                                <div class="col-md-9">   
                                <input type='text' name='town' id='town' tabindex="15" value="{$details["detail1"]["town"]}"/></div>                                
                                </div>
                                </div>
                                </div>
                                </div>*}
                                {*/if*}

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{$tran_pincode}  </label>

                                        <input  class="form-control" name="pin" id="pin" type="text" tabindex="16" size="8" maxlength="6" value="{$details["detail1"]["pincode"]}" />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {$tran_mob_no_10_digit}<span class="symbol required"></span>

                                        <input class="form-control"  name="mobile" id="mobile" type="text" tabindex="17" size="22" maxlength="20" autocomplete="Off" value="{$details["detail1"]["mobile"]}"/>{form_error('mobile')}
					

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{$tran_land_line_no} </label>

                                        <input class="form-control" name="land_line"  id="land_line"  type="text" tabindex="18" size="22" maxlength="20" value="{$details["detail1"]["land"]}" />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{$tran_email}</label><span class="symbol required"></span>

                                        <input class="form-control" name="email"  id="email" type="text" tabindex="19" size="22" maxlength="100" autocomplete="Off" value="{$details["detail1"]["email"]}" />{form_error('email')}

                                    </div>
                                </div>
                            </div>
                            {*<div class="row">
                            <div class="col-md-12">
                            <h3>  {$tran_nominee_info}</h3>
                            <hr>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">
                            {$tran_nominee_name}
                            </label>
        
        
                            <input type="text"  tabindex="20" value="{$details["detail1"]["nominee"]}" class="form-control" name="nominee"  id="nominee">
                            </div>
                            </div>
        
                            <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">
                            {$tran_relation}
                            </label>                   
        
                            <input class="form-control" value="{$details["detail1"]["relation"]}" type="text"  name="relation"  id="relation" tabindex="21">
                            </div>
                            </div>
                            </div>*}
                          {*  <div class="row">
                                <div class="col-md-12">
                                    <h3> {$tran_bank_info}</h3>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_pan_no}
                                        </label>             

                                        <input type="text" value="{$details["detail1"]["pan"]}" class="form-control" name="pan_no" id="pan_no" tabindex="22">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_bank_account_number}
                                        </label>

                                        <input class="form-control" value="{$details["detail1"]["acnumber"]}" type="text" name="bank_acc_no" id="bank_acc_no" tabindex="23">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_ifsc_code}
                                        </label>             

                                        <input type="text" value="{$details["detail1"]["ifsc"]}" class="form-control" name="ifsc" id="ifsc" tabindex="24">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_bank_name}
                                        </label>

                                        <input class="form-control" value="{$details["detail1"]["nbank"]}" type="text"  name="bank_name" id="bank_name" tabindex="25">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_branch_name}
                                        </label>

                                        <input class="form-control" value="{$details["detail1"]["nbranch"]}" type="text" name="bank_branch" id="bank_branch" tabindex="26">
                                    </div>
                                </div>
                            </div>*}
                            {*<div class="row">
                                <div class="col-md-12">
                                    <h3>{$tran_social_profiles}</h3>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_Facebook}
                                        </label>
                                        <input type="text" value="{$details["detail1"]["facebook"]}" class="form-control" name="facebook"  id="facebook" tabindex="27"><font size = "1" color = "red"><b>Eg: https://www.facebook.com/example </b></font>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            {$tran_Twitter}
                                        </label>

                                        <input type="text" value="{$details["detail1"]["twitter"]}" class="form-control"  name="twitter"  id="twitter" tabindex="28"><font size = "1" color = "red">&nbsp;<b>Eg: https://twitter.com/#!/example </b></font>
                                    </div>
                                </div>
                            </div>*}

                            <div class="row">
                                <div class="col-md-12">
                                    <div><span class="symbol required"></span>
                                        {$tran_Required_Fields}
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <p>
                                        {$tran_term}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-bricky" type="submit" name="update_profile"  id="update_profile" value="update_profile" tabindex="29">
                                        {$tran_update_profile} <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                    {if $mlm_plan!= "Board"}
                        <div id="panel_edit_network" class="tab-pane{$tab3}">

                            <form role="form" method="post" name="user_register1" id="user_register1" action="{$BASE_URL}admin/profile/profile_view" enctype="multipart/form-data" >     
                                <div class="col-md-12">
                                    <div class="errorHandler alert alert-danger no-display">
                                        <i class="fa fa-times-sign"></i> {$tran_errors_check}
                                    </div>
                                </div>
                                <input type="hidden" name="path" id="path" value="{$PATH_TO_ROOT_DOMAIN}">
                                <input type="hidden" name="lang_id" id="lang_id" value="{$lang_id}">


                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>{$tran_edit_network_info} : {$u_name}</h3>
                                        <hr>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">

                                            <label class="col-sm-2 col-sm-offset-1 control-label" for="network">{$tran_position} :<font color="#ff0000">*</font></label>
                                            <div class="col-sm-3">
                                                <select name="network" id="network" tabindex="2" onChange="" class="form-control" >  
                                                    {if  {$position}=='L'}
                                                        <option value="L" selected="selected" >{$tran_left}</option>
                                                        <option value="R">{$tran_right}</option>
                                                        <option value="Balanced">{$tran_balanced}</option>
                                                    {elseif {$position}=='R'}
                                                        <option value="R" selected="selected"  >{$tran_right}</option>
                                                        <option value="L" >{$tran_left}</option>
                                                        <option value="Balanced">{$tran_balanced}</option>
                                                    {elseif {$position}=='Balanced'}
                                                        <option value="Balanced" selected="selected"  >{$tran_balanced}</option>
                                                        <option value="L" >{$tran_left}</option>
                                                        <option value="R">{$tran_right}</option>

                                                    {/if}
                                                </select>

                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <br/>
                                            <button class="btn btn-bricky" type="submit" name="update_network2"  id="update_network2" value="update_network2" tabindex="3" >
                                                {$tran_update_network} 
                                            </button>
                                        </div> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
    {/if}

        {include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
        <script>
                                    jQuery(document).ready(function() {
                                        Main.init();
                                        ValidateUser.init();
                                    });
        </script>
        {include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}
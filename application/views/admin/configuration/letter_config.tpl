<div class="row" class="hidden-xs" >
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    {$tran_welcome_letter}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  action="" method="post"  name= 'form_setting'  id= 'form_setting' enctype="multipart/form-data">
                    {*<div class="col-md-12">
                    <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                    </div>
                    </div>*}
                    {if $LANG_STATUS=='yes'}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="lang_selector">
                            {$tran_Select_a_Language} 
                        </label>
                        <div class="col-sm-6">
                            <select  class="form-control"  id='lang_selector' onchange="set_language_id(this.value, 'letter');" tabindex="1">
                                {foreach from=$lang_arr item=v}
                                    {if $lang_id==$v.lang_id}
                                        <option value="{$v.lang_id}" selected="">{$v.lang_name}</option>
                                    {else}
                                        <option value="{$v.lang_id}">{$v.lang_name}</option>
                                    {/if}
                                {/foreach}
                            </select>
                            <input type="hidden" name="lang_id" id="lang_id" value="{$lang_id}"/>
                            <input type="hidden" name="base_url" id="base_url" value="{$BASE_URL}"/>
                        </div>
                    </div>
                    {/if}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company_name">
                            {$tran_company_name}<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" name ="company_name" id ="company_name" value="{$letter_arr["company_name"]}" title="Eg: IOSS LLP" tabindex="2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company_add">
                            {$tran_company_address}<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <textarea name ="company_add"  id ="company_add" class="form-control"  rows="10" cols="25"  title="{$tran_from_address}" tabindex="3">{$letter_arr["address_of_company"]}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="txtDefaultHtmlArea">
                            {$tran_main_matter}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="ckeditor form-control"  id="txtDefaultHtmlArea"  name="txtDefaultHtmlArea" title="{$tran_main_matter}" tabindex="4">{$letter_arr["main_matter"]}</textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="userfile">
                            {$tran_logo}<span class="symbol required"></span>
                        </label>
                        <!--<div class="col-sm-6">
                            <input tabindex="5" type="file" id="userfile" name="userfile">
                        </div>-->
                        
                         <div class="user-edit-image-buttons col-sm-6">
                                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> {$tran_select_image}</span><span class="fileupload-exists"><!--<i class="fa fa-picture"></i> Change--></span>
                                        <input type="file" id="userfile" name="userfile" tabindex="5" value="">
                                    </span>
                                </div>
                        
                        
                        
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_matter">
                            {$tran_matter_for_product_release}
                        </label>
                        <div class="col-sm-9">
                            <textarea name ="product_matter" tabindex="6" id ="product_matter" class="ckeditor form-control"  title="{$tran_replay_message_for_welcome_letter}">{$letter_arr["productmatter"]}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_matter">
                            {$tran_place}<span class="symbol required"></span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" tabindex="7" name ="place" id ="place" value="{$letter_arr["place"]}" title="Eg: CALICUT">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="8"  name="setting" id="setting" type="submit" value="{$tran_update}" > {$tran_update}</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
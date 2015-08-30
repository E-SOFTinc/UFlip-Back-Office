<div id="span_js_messages" style="display: none;">
    <span id="error_msg4">{$tran_please_enter_any_keyword_like_pin_number_or_pin_id}</span>
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div>   
<div class="panel panel-default">

    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>{$tran_search_pin_numbers}
    </div> 
    <div class="panel-body">

        <form role="form" class="smart-wizard form-horizontal" id="product_image_form" name="product_image_form" enctype="multipart/form-data" method="post">

            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> {$tran_errors_check}
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label" for="keyword">{$tran_search_pin}:</label>
                <div class="col-sm-3">
                    <input tabindex="1" type="text" name="keyword" id="keyword" size="20" value=""  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event,'epin')"  
                           title=""/>
                </div>
            </div> 

            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    <button class="btn btn-bricky" name="search_pin" id="search_pin" value="{$tran_search_pin_numbers}" tabindex="2">
                        {$tran_search_pin_numbers}
                    </button>
                </div>
            </div>


            <br />
            {if $flag >0}
                {if $count != 0}
                    {assign var="i" value=1}
                    {assign var="j" value=0}
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">

                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_epin}</th>
                                    {*if $product_status == "yes"}
                                    <th>{$tran_product}</th>
                                    <th>{$tran_product_id}</th>
                                    {/if*}
                                <th>{$tran_pin_amount}</th>
                                <th>{$tran_pin_balance_amount}
                                <th>{$tran_status}
                                <th>{$tran_allocated_user}</th>
                                <th>{$tran_uploaded_date}</th>
                                <th>{$tran_expiry_date}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$details item=v}

                                <tr>
                                    <td>{$i}</td>
                                    <td>{$details["detail$j"].pin_number} </td>
                                    <td>{$details["detail$j"].pin_amount} </td>
                                    <td>{$details["detail$j"].pin_balance_amount} </td>
                                    <td>{if $details["detail$j"].status=='yes'}{$tran_active}{else}{$tran_inactive}{/if} </td>
                                    <td>{$details["detail$j"].allocated_user_id} </td>
                                    <td>{$details["detail$j"].pin_uploaded_date} </td>
                                    <td>{$details["detail$j"].pin_expiry_date} </td>

                                </tr>
                            {/foreach}
                        </tbody>
                    </table>


                {else}
                   <h3> {$tran_your_account_have_no_active_epin}</h3>
                {/if}
            {/if}
        </form>
        {*<tbody>

        {if count($pin_numbers_search)!=0}
        {assign var="i" value=0}
        {assign var="class" value=""}
        {foreach from=$pin_numbers_search item=v}
        {if $i%2==0}
        {$class = 'tr1'}
        {else} 
        {$class = 'tr2'}
        {/if}
        {if $v.pin_alloc_date=="0000-00-00"}
        {assign var="pin_alloc_date" value="Not Used"}
        {else}
        {assign var="pin_alloc_date" value="{$v.pin_alloc_date}"}
        {/if}
        {if $v.used_user==""}
        {assign var="used_user" value="NULL"}
        {else}
        {assign var="used_user" value="{$v.used_user}"}
        {/if}
        {if $v.allocated_user=="NA"}
        {assign var="allocated_user" value="NULL"}
        {else}
        {assign var="allocated_user" value="{$v.allocated_user}"}

        {/if}
        {if $v.status=="yes"}
        {assign var="stat" value="ACTIVE"}

        {else}
        {assign var="stat" value="USED"}

        {/if}

        <tr class="{$class}">
        <td align="center">{counter}</td>
        <td align="center">{$v.pin}</td>
        {if $product_status=="yes"}
        <td align="center">{$v.product}</td>
        <td align="center">{$v.prod_id}</td>
        {/if}
        <td align="center">{$used_user}</td>
        <td align="center">{$allocated_user}</td>
        <td align="center">{$stat}</td>
        <td align="center">{$pin_alloc_date}</td>
        </tr>
        {$i=$i+1}
        {/foreach}    
        </tbody>
        </table>

        {/if}   
        {else}
        <h3> {$tran_your_account_have_no_active_epin}</h3>
        {/if}
        {/if}*}


        <!--/////-->



        <form role="form" class="smart-wizard form-horizontal" id="form" name="form"  method="post">

            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> {$tran_errors_check}
                </div>
            </div>

            <br/>
            <hr/>
            <br/>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="product">{$tran_amount}:</label>                    
                <div class="col-sm-3">
                    <select name="amount" id="amount"  tabindex="3" class="form-control" >
                        <option value="">{$tran_select_amount}</option>
                                {assign var=i value=0}
                                {foreach from=$amount_details item=v}
                                    <option value="{$v.amount}">{$v.amount}</option>
                                    {$i = $i+1}
                                {/foreach}
                    </select> 
                </div>
            </div>               


            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    <button class="btn btn-bricky" name="search_pin_pro" id="search_pin_pro" value="upload" tabindex="4">
                        {$tran_search_pin_numbers}
                    </button>
                </div>
            </div>
            {if $flag1 > 0}
                {if $count1 != 0}
                    {assign var="i" value=1}
                    {assign var="j" value=0}
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">

                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_epin}</th>
                                    {*if $product_status == "yes"}
                                    <th>{$tran_product}</th>
                                    <th>{$tran_product_id}</th>
                                    {/if*}
                                <th>{$tran_pin_amount}</th>
                                <th>{$tran_pin_balance_amount}
                                <th>{$tran_status}
                                <th>{$tran_allocated_user}</th>
                                <th>{$tran_uploaded_date}</th>
                                <th>{$tran_expiry_date}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$details item=v}

                                <tr>
                                    <td>{$i}</td>
                                    <td>{$details["detail$j"].pin_number} </td>
                                    <td>{$details["detail$j"].pin_amount} </td>
                                    <td>{$details["detail$j"].pin_balance_amount} </td>
                                    <td>{if $details["detail$j"].status=='yes'}{$tran_active} {else}{$tran_inactive}{/if} </td>
                                    <td>{if !($details["detail$j"].allocated_user_id)}NA{else} {$details["detail$j"].allocated_user_id}{/if}</td>
                                    <td>{$details["detail$j"].pin_uploaded_date} </td>
                                    <td>{$details["detail$j"].pin_expiry_date} </td>
                                    {$j=$j+1}
                                    {$i=$i+1}
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
               {else}
                   <h3> {$tran_your_account_have_no_active_epin}</h3>
                {/if}

            {/if}

        </form>
    </div>
</div>
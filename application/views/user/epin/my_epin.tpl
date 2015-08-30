{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>

</div> 


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> {$tran_epins}
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
                <form class="niceform" name="upload" id="upload" method="post" action="" {if $pro_status=="yes"} onSubmit="return validate_passcode_add_forprod(this);" {else} 
                      onSubmit="return validate_passcode_add_outprod(this);" {/if}>


                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_epins}</th>
                                <th>{$tran_amount}</th>
                                <th>{$tran_balance_amount}</th>
                                <th>{$tran_used_user}</th>
                                <th>{$tran_status}</th>
                                <th>{$tran_uploaded_date}</th>
                                <th>{$tran_expiry_date}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {if count($pin_numbers)!=0}

                                {assign var="i" value=0}
                                {assign var="class" value=""}
                                {foreach from=$pin_numbers item=v}

                                    {if $i%2==0}

                                        {$class='tr1'}
                                    {else}
                                        {$class='tr2'}
                                    {/if}

                                    {if $v.used_user==""}

                                        {assign var="used_user" value="{$tran_NULL}"}
                                    {else}
                                        {assign var="used_user" value="{$v.used_user}"}
                                    {/if}

                                    {if $v.status=="yes"}

                                        {assign var="stat" value="{$tran_active}"}

                                    {else if $v.status=="expired"}

                                        {assign var="stat" value="{$tran_expired}"}

                                    {else}

                                        {assign var="stat" value="{$tran_used}"}
                                    {/if}
                                    {$i=$i+1}

                                    <tr class="{$class}" align="center" >

                                        <td>{$i}</td>
                                        <td>{$v.pin}</td>
                                        <td>{$v.pin_amount}</td>
                                        <td>{$v.pin_balance_amount}</td>
                                        <td>{$used_user}</td>
                                        <td>{$stat}</td>
                                        <td>{$v.pin_uploded_date}</td>
                                        <td>{$v.pin_expiry_date}</td>
                                    </tr>
                                {/foreach}                
                            </tbody>
                        {else}
                            <h3> {$tran_no_epin_found}</h3>
                        {/if}
                    </table>
                    {$page_footer}


                </form>
            </div>
        </div>
    </div>
</div>          


{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        // ValidateUser.init();
        // DateTimePicker.init();
    });
</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
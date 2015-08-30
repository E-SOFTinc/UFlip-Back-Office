{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_please_enter_your_company_name}</span>        
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
    <span id="nofond">{$tran_nofond}</span>
    <span id="showing">{$tran_showing}</span>
    <span id="to">{$tran_to}</span>
    <span id="of">{$tran_of}</span>
    <span id="entries">{$tran_entries}</span>
    <span id="notavailable">{$tran_notavailable}</span>
    <span id="error_msg">{$tran_please_enter_your_company_name}</span>
    <span id="confirm_msg">{$tran_sure_you_want_to_delete_this_feedback_there_is_no_undo}</span>
</div> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
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
                </div>  {$tran_users_referal_details}             

            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">

                    {if $count>0}
                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_sl_no}</th>
                                <th>{$tran_user_name}</th>
                                <th>{$tran_full_name}</th>
                                <th>{$tran_joinig_date}</th>
                                <th> {$trans_email}</th>
                                <th>{$trans_country}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {assign var="i" value="0"}
                            {assign var="class" value=""}
                            {foreach from=$arr item=v}
                                {if $i%2==0}
                                    {$class='tr1'}
                                {else}
                                    {$class='tr2'}
                                {/if}

                                <tr class="{$class}" align="center" >
                                    <td>{counter}</td>
                                    <td>{$v.user_name}</td>
                                    <td>{$v.name}</td>
                                    <td>{$v.join_date}</td>
                                    <td> {$v.email}</td>
                                    <td>{$v.country}</td>
                                </tr>
                                {$i=$i+1}
                            {/foreach}
                        {else} 
                        <h3>{$tran_no_referels}</h3>
                    {/if}
                    </tbody>
                </table>
                    {$result_per_page}


            </div>
        </div>
    </div>
</div>          


{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        ValidateUser.init();
        DateTimePicker.init();
    });
</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
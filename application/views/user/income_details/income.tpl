{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_please_enter_your_company_name}</span>        
    <span id="error_msg2">{$tran_please_type_your_comments}</span>          
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>      
    <span id="nofond">{$tran_nofond}</span>
    <span id="showing">{$tran_showing}</span>
    <span id="to">{$tran_to}</span>
    <span id="of">{$tran_of}</span>
    <span id="entries">{$tran_entries}</span>
    <span id="notavailable">{$tran_notavailable}</span>

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
                </div>
                {$tran_income_details}
            </div>
            <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="feedback_form" id="feedback_form" >
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}
                        </div>
                    </div>
                    {assign var=i value="0"}


                    {assign var=class value=""}
                    {if count($amount)>0}

                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr class="th" align="center">
                                    <th>{$tran_Sl_no}</th>
                                    <th>{$tran_user_name}</th>
                                  
                                    <th>{$tran_Amount_Type}</th>
                                    <th>{$tran_amount}</th>

                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$amount item=v}
                                    {if $i%2 == 0}
                                        {$class="tr2"}
                                    {else}
                                        {$class="tr1"}
                                    {/if}		
                                    {$i = $i+1}
                                    {if $v.amount_type == 'leg'}
                                    {$v.amount_type = $tran_binary}
                                    {/if}

                                   <tr class="{$class}" align="center" >
                                        <td>{counter}</td>
                                        <td>{$v.from_id}</td>
                                      
                                        <td>{$v.amount_type}</td>
                                        <td>{$v.amount_payable}</td>

                                    </tr>
                                {/foreach}
                                 <tr class="th">
                                    <td  align="right"><b>{$tran_Amount_Total} </b></td>
                                    <td align="center"><b></b></td>
                                    <td align="center"><b></b></td>
                                    
                                    <td align="center"><b>{$v.tot_amount}</b></td>
                                   
                                </tr>	
                            </tbody>
                        </table>
                    {else}
                        <h4 align="center"> {$tran_no_details_found}</h4>
                    {/if}

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

    });
</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
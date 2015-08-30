{include file="admin/layout/header.tpl"  name=""}
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> {$tran_payment_gateway_configuration}
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
 <form name="payment_status_form" id="payment_status_form" method="post">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr class="th" align="center">
                            <th>{$tran_no}</th>
                            <th>{$tran_payment_gateway_name}</th>
                            <th>{$tran_action}</th>
                        </tr>
                    </thead>
                    <tbody>

                        
                        {assign var="i" value=0}
                        {foreach from=$card_status item=v}
                        <tr>                  
                        <td>{assign var="i" value=$i+1}{$i}</td>
                        <td>{$v.gateway_name}</td>
                        <td>
                             <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_paypal_status"  value="no" {if $v.status=="no"} onChange="change_credit_card_status('{$PATH_TO_ROOT_DOMAIN}admin/', {$v.id}, 'yes')" {else} checked onChange="change_credit_card_status('{$PATH_TO_ROOT_DOMAIN}admin/', {$v.id}, 'no')"{/if}>
                             </div>
                             {if $v.id==1 && $v.status=="yes"}<a href="paypal_config">Paypal Configuration</a>{/if}
                             {if $v.id==3 && $v.status=="yes"}<a href="epdq_config">EPDQ Configuration</a>{/if}
                             {if $v.id==4 && $v.status=="yes"}<a href="authorize_config">{$tran_authorize_configuration}</a>{/if}
                        </td>
                    </tr>
                    {/foreach}
                    </tbody>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
        <script>
            jQuery(document).ready(function() {
                Main.init();
                // ValidateUser.init();
            });
        </script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  

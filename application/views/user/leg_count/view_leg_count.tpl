{include file="user/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;">
    <span id="error_msg">{$tran_Please_select_payout_date}</span>        
    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>
</div>



   
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_leg_count}
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
                
 <table class="table table-striped table-bordered table-hover table-full-width" id="sample">
                        <thead>
                            <tr class="th" align="center">
                                <tr class="th"> 
                                <th>No</th>
                    <th>User ID - Fullname</th>
                    <th>{$tran_left_point}</th>
                    <th>{$tran_right_point}</th>
                    <th>{$tran_left_carry}</th>
                    <th>{$tran_right_carry}</th>
{*                    <th>{$tran_total_pair}</th>*}
                    <th><b>{$tran_amount}</b></th>
                            </tr>
                          
                        </thead>
                       
               {if $count!=0}

                                            {assign var="left_leg_tot" value ="0"}
                                            {assign var="right_leg_tot" value ="0"}
                                            {assign var="left_carry_tot" value ="0"}
                                            {assign var="right_carry_tot" value ="0"}
                                            {assign var="total_leg_tot" value ="0"}
                                            {assign var="total_leg_tot" value ="0"}
                                            {assign var="total_amount_tot" value ="0"}
                                            {assign var="k" value ="0"}
                                            {assign var="class" value =""}
                                            <tbody align="center">
                                                {foreach from=$users item=t}

                                                    {assign var="left" value ="{$t['total_left_count']}"}
                                                    {assign var="right" value ="{$t['total_right_count']}"}
                                                    {assign var="left_carry" value ="{$t['total_left_carry']}"}
                                                    {assign var="right_carry" value ="{$t['total_right_carry']}}"}
                                                    {assign var="tot_leg" value ="{$t['total_leg']}"}
                                                    {assign var="tot_amt" value ="{$t['total_amount']}"}
                                                    {$left_leg_tot = $left_leg_tot+$left}
                                                    {$right_leg_tot = $right_leg_tot+$right}
                                                    {$left_carry_tot = $left_carry_tot+$left_carry}
                                                    {$right_carry_tot = $right_carry_tot+$right_carry}
                                                    {$total_leg_tot = $total_leg_tot+$tot_leg}
                                                    {$total_amount_tot =$total_amount_tot+ $tot_amt}

                                                    {if $k%2==0}
                                                        {$class='tr1'}
                                                    {else}
                                                        {$class='tr2'}
                                                    {/if}
                                                    <tr>
                                                        <td>{counter}</td>

                                                        <td>{$t['user_nmae']}-{$t['user_detail_name']}</td>
                                                        <td>{$t['total_left_count']}</td>
                                                        <td>{$t['total_right_count']}</td>
                                                        <td>{$t['total_left_carry']}</td>
                                                        <td>{$t['total_right_carry']}</td>
{*                                                        <td>{$t['total_leg']}</td>*}
                                                        <td>{$t['total_amount']}</td>

                                                    </tr>

                                                    {$k=$k+1}

                                                {/foreach}




                                                <tr class="{$class}" align="center" >
                                                    <td><b></b></td>
                                                    <td><b>{$tran_total}</b></td>
                                                    <td><b>{$left_leg_tot}</b></td>
                                                    <td><b>{$right_leg_tot}</b></td>
                                                    <td><b>{$left_carry_tot}</b></td>
                                                    <td><b>{$right_carry_tot}</b></td>
{*                                                    <td><b>{$total_leg_tot}</b></td>*}
                                                    <td><b>{$total_amount_tot}</b></td>
                                                    {*                                                    <td><b>{$class='total'}</b></td>*}
                                                </tr>
                                
                                   
                                        
                        </tbody>
                        
                        
                         {else}
                    <h3>{$tran_No_Leg_Count_Found}</h3>
                {/if}          
                    </table>

              </div>
        </div>
    </div>
</div>              
                    
    
               
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init();   
     TableData.init();
     ValidateUserr.init();
});
</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
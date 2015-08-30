{include file="admin/layout/header.tpl"  name=""}


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_set_module_status}
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-times-sign"></i> {$tran_errors_check}
                    </div>
                </div>
                <form name="module_status_form" id="module_status_form" method="post">  

                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_status}</th>
                                <th> {$tran_action}</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td> 
                                <td>{$tran_referal_income_status} </td>
                                <td>
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_referal_status"  value="yes" {if $referal_status=="no"} onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'referal_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'referal_status', 'no')"{/if}>                             
                                    </div>
                                    {if $referal_status=='yes'}
                                        <a href="{$PATH_TO_ROOT_DOMAIN}admin/configuration/configuration_view">Referral Income Management</a>
                                     {/if}
                                     
                                </td>
                            </tr>
                            <tr>
                                <td>2</td> 
                                <td>{$tran_Ewallet}</td>
                                <td>
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_ewallet_status" value="yes" {if $ewallet_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'ewallet_status','yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'ewallet_status','no')" {/if} >  
                                     
                                    </div>
                                       {if $ewallet_status=='yes'}
                                           <a href="{$PATH_TO_ROOT_DOMAIN}admin/ewallet/my_ewallet">{$tran_e_wallet}</a>
                                        {/if}
                                        
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>           
                                <td>{$tran_sponsor_tree}</td> 
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_sponsor_tree_status" value="yes" {if $sponsor_tree_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'sponsor_tree_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'sponsor_tree_status', 'no')" {/if} >                             
                                    </div>
                                    {if $sponsor_tree_status=='yes'}
                                        <a href="{$PATH_TO_ROOT_DOMAIN}admin/tree/sponsor_tree">{$tran_sponsor_tree}</a>
                                    
                                    {/if}
                                    
                                </td>
                                
                            </tr>
                            <tr>
                                <td>4</td> 
                                <td>{$tran_epin} </td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_pin_status" value="yes" {if $pin_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'pin_status','yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'pin_status', 'no')" {/if} >                             
                                    </div>
                                    {if $pin_status=='yes'}
                                     <a href="{$PATH_TO_ROOT_DOMAIN}admin/epin/epin_management">{$tran_epin_management}</a>
                                     {/if}
                                     
                                </td>
                            </tr>
                            <tr>
                                <td>5</td> 
                                <td>{$tran_product_status}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_product_status" value="yes" {if $product_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'product_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'product_status', 'no')" {/if} >    
                                    </div>
                                     {if $product_status=='yes'}
                                     <a href="{$PATH_TO_ROOT_DOMAIN}admin/product/product_management">Product Management</a>
                                     {/if}
                                     
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>  
                                <td>{$tran_employee}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_employee_status" value="yes" {if $employee_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'employee_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'employee_status', 'no')" {/if} >                             
                                    </div>
                                    {if $employee_status=='yes'}
                                        <a href="{$PATH_TO_ROOT_DOMAIN}admin/employee/employee_register">{$tran_employee} Registration</a>
                                     {/if}
                                     
                                </td>
                            </tr>

                            <tr>
                                <td>7</td> 
                                <td>{$tran_rank}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_rank_status" value="yes" {if $rank_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'rank_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'rank_status', 'no')" {/if} >                             
                                    </div>
                                    {if $rank_status=='yes'}
                                        <a href="{$PATH_TO_ROOT_DOMAIN}admin/configuration/rank_configuration">Rank Settings</a>
                                    {/if}
                                    
                                </td>
                            </tr>

                            <tr>
                                <td>8</td> 
                                <td>{$tran_sms}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_sms_status" value="yes" {if $sms_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'sms_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'sms_status', 'no')" {/if} >                             
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td> 
                                <td>{$tran_upload_document}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_upload_status" value="yes" {if $upload_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'upload_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'upload_status', 'no')" {/if} >                             
                                    </div>
                                    {if $upload_status=='yes'}
                                        <a href="{$PATH_TO_ROOT_DOMAIN}admin/news/upload_materials">{$tran_upload_document}</a>
                                    {/if}
                                    
                                </td>
                            </tr>
                            
                            <tr>
                                <td>10</td> 
                                <td>{$tran_multi_language}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_lang_status" value="yes" {if $lang_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'lang_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'lang_status', 'no')" {/if} >                             
                                    </div>
                                    {if $lang_status=='yes'}
                                      <a href="{$PATH_TO_ROOT_DOMAIN}admin/configuration/language_settings">{$tran_language_settings}</a>  
                                    {/if}
                                </td>
                            </tr>
                            
                            <tr>
                                <td>11</td> 
                                <td>{$tran_help}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_help_status" value="yes" {if $help_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'help_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'help_status', 'no')" {/if} >                             
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>12</td> 
                                <td>Stat Counter Status</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_count_status" value="yes" {if $statcounter_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'statcounter_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'statcounter_status', 'no')" {/if} >                             
                                    </div>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td>13</td> 
                                <td>{$tran_footer_demo_status}</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_footer_demo_status" value="yes" {if $footer_demo_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'footer_demo_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'footer_demo_status', 'no')" {/if} >                             
                                    </div>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td>14</td> 
                                <td>Captcha Status</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_footer_demo_status" value="yes" {if $captcha_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'captcha_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'captcha_status', 'no')" {/if} >                             
                                    </div>
                                </td>
                            </tr>  
                            
                            <tr>
                                <td>15</td> 
                                <td>Sponsor Commission Status</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="set_module_status" id="set_sponsor_commission_status" value="yes" {if $sponsor_commission_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'sponsor_commission_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'sponsor_commission_status', 'no')" {/if} >                             
                                    </div>
                                    {if $sponsor_commission_status=='yes'}
                                      <a href="{$PATH_TO_ROOT_DOMAIN}admin/configuration/configuration_view/level">{$tran_level_commission}</a>  
                                    {/if}
                                </td>
                            </tr>
                        </tbody>     
                        
                    </table>
                                    </form>
            </div>
        </div>
    </div>
</div>
			
<div class="row">
    <div class="col-sm-12">
	<div class="panel panel-default">
	    <div class="panel-heading">
		<i class="fa fa-external-link-square"></i>
		{$tran_others}
	    </div>
	    <div class="panel-body">
		<div class="col-md-12">
		    <div class="errorHandler alert alert-danger no-display">
			<i class="fa fa-times-sign"></i> {$tran_errors_check}
		    </div>
		    <form name="module_status_form" id="module_status_form" method="post">  

                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_status}</th>
                                <th> {$tran_action}</th>
                            </tr>
                            
                        </thead>
			    <tr>
                                <td>1</td> 
                                <td>{$tran_payout_settings}</td>
                                <td>   
                                    <div class="" data-on="success" data-off="warning">
                                           <a href="{$PATH_TO_ROOT_DOMAIN}admin/configuration/payout_setting">{$tran_change_payout_settings}</a>                         
                                    </div>
                                </td>
                            </tr>
			    {if $sponsor_commission_status=='yes'}
			    <tr>
                                <td>2</td> 
                                <td>{$tran_depth_ceiling_settings}</td>
                                <td>   
                                    <div>		    
			<a href="{$PATH_TO_ROOT_DOMAIN}admin/configuration/setting_depth">{$tran_change_depth_ceiling}</a>
				    </div>
                                </td>
                            </tr>
                            
			    {/if}
                            {if  $pin_status=='yes'}
                                <tr>
                                <td>3</td> 
                                <td>{$tran_add_new_epin_amount}</td>
                                <td>   
                                    <div>		    
			<a href="{$PATH_TO_ROOT_DOMAIN}admin/epin/add_new_epin_amount">{$tran_add_new_epin_amount}</a>
				    </div>
                                </td>
                            </tr>
                                
                                {/if}
                           
                        <tbody>
			    
			</tbody>
		    </table>
	</div>
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

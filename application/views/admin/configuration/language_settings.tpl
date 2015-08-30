{include file="admin/layout/header.tpl"  name=""}


<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
        
                {$tran_set_language_status}
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="errorHandler alert alert-danger no-display">
                        <i class="fa fa-times-sign"></i> {$tran_errors_check}
                    </div>
                </div>
                <form name="language_settings_form" id="module_status_form" method="post">  

                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            
                            <tr class="th" align="center">
                                <th>{$tran_no}</th>
                                <th>{$tran_language}</th>
                                <th>{$tran_action}</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td> 
                                <td>English </td>
                                <td>
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="module_status" id="set_eng_status"  value="yes" {if $eng_status=="no"} onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'eng_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'eng_status', 'no')"{/if}>                             
                                    </div>
                                   
                                     
                                </td>
                            </tr>
                            <tr>
                                <td>2</td> 
                                <td>Español</td>
                                <td>
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="module_status" id="set_span_status" value="yes" {if $span_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'span_status','yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'span_status','no')" {/if} >  
                                     
                                    </div>
                                       
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>           
                                <td>中文</td> 
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="module_status" id="set_chin_status" value="yes" {if $chin_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'chin_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'chin_status', 'no')" {/if} >                             
                                    </div>
                                   
                                    
                                </td>
                                
                            </tr>
                            <tr>
                                <td>4</td> 
                                <td>Deutsch </td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="module_status" id="set_ger_status" value="yes" {if $ger_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'ger_status','yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'ger_status', 'no')" {/if} >                             
                                    </div>
                                    
                                     
                                </td>
                            </tr>
                            <tr>
                                <td>5</td> 
                                <td>Português</td>
                                <td>   
                                    <div class="make-switch" data-on="success" data-off="warning">
                                        <input type="checkbox" name="module_status" id="set_por_status" value="yes" {if $por_status=="no"}   onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'por_status', 'yes')" {else} checked onChange="change_module_status('{$PATH_TO_ROOT_DOMAIN}admin/', 'por_status', 'no')" {/if} >    
                                    </div>
                                    
                                </td>
                            </tr>

                            

                           

                           
                           
                            
                           
                            
                            
                            
                            
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

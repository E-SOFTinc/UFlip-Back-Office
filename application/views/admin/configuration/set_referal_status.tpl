{include file="admin/layout/header.tpl"  name=""}
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>    {$tran_referral_status}
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
                <form  role="form" class="smart-wizard form-horizontal" name="set_referal_status" id="set_referal_status" method="post" >
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="refferal_status">{$tran_referral_status}</label>
                     
                    
                    
                        <div class="col-sm-6">

                            <label class="radio-inline" for="status_yes"><input tabindex="1"   type="radio" id="status_yes" name="referal_status" value="yes" {if $referal_status=='yes'}checked {/if}/>
                                {$tran_yes}</label>
                            <label class="radio-inline"  for="status_no"><input tabindex="2"  type="radio" name="referal_status" id="status_no" value="no" {if $referal_status=='no'}checked {/if} />
                                {$tran_no} </label> 

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" tabindex="3"   type="submit" value="{$tran_set_referral_status}" name="set_referal_status" id="set_referal_status" > {$tran_set_referral_status}</button>                                
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
    Main.init();               
});
</script>
{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}  
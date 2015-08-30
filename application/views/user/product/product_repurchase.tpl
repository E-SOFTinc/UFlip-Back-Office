{include file="user/layout/header.tpl"  name=""}

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1"></span>

</div>
<style>
    .width-val{ width:651px;}
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                {$tran_product_purchase}
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
                <form role="form" class="smart-wizard form-horizontal" method="post"  name="form" id="form" action="{$BASE_URL}user/product/product_repurchase">
                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="prodcut_id">{$tran_product}:<font color="#ff0000">*</font></label> 
                        <div class="col-sm-3">

                            <select name="product_id" id="product_id" tabindex="4"    class="form-control" onchange="get_product_amount('{$PATH_TO_ROOT_DOMAIN}', this.value)">

                                {$products}

                            </select> 

                            {if isset($error['prodcut_id'])}<span class='val-error' >{$error['prodcut_id']} </span>{/if}
                        </div>    
                    </div> 
                    <div class="form-group" id = "prdt_amount" style="display:none">

                        <label class="col-sm-3 control-label" for="product_amount">{$tran_product_amount}:<font color="#ff0000">*</font></label> 
                        <div class="col-sm-3">

                            <input type='text' id="product_amount" readonly="true"  name='product_amount' class="form-control">
                        </div>    
                    </div> 
                    <div class="form-group" id = "prdt_count" >

                        <label class="col-sm-3 control-label" for="product_count">{$tran_product_count}:<font color="#ff0000">*</font></label> 
                        <div class="col-sm-3">

                            <input type='text' id="product_count" required="required"  name='product_count' class="form-control">
                        </div>    
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3"></label>
                        <button class="btn btn-bricky" type="submit" name="purchase"  id="purchase" value="purchase" tabindex="5"><i class="clip-cart"></i> {$tran_purchase}</button>


                    </div>
            </div>

        </div>

        </form>
    </div>
</div>
</div>
</div>

{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}

<script>
    jQuery(document).ready(function () {
        Main.init();
    });
</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}  


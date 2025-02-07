<script>
    
function getGenologyTree(id)
{
    

   $.ajax({

     type: "POST",
     url: '{$BASE_URL}user/tree/tree_view',
     data: { user_id: id }, // appears as $_GET['id'] @ ur backend side
     success: function(data) {
           // data is ur summary
        $('#summary').html(data);
     }

   });

}

</script>
{include file="user/layout/header.tpl"  name="$Name"}

<!-- start: GENOLOGY TREE-->                                         
<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <i class="fa fa-sitemap"></i>
                {$tran_genealogy_tree}
            </div>
            <div class="panel-body" style="overflow: auto;">
                <button class="zoomIn"><span class="glyphicon glyphicon-zoom-in" style="font-size:20px"></span></button>
                <button class="zoomOut"><span class="glyphicon glyphicon-zoom-out" style="font-size:20px"></span></button>
                <button class="zoomOff"><span class="glyphicon glyphicon-off" style="font-size:20px"></span></button>


                <div id="dsply_tree_zoomable">

                    <div id="summary" class="panel-body tree-container1" style="height:100%;margin: auto">         
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- end: GENOLOGY TREE-->
 

{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        getGenologyTree('{$user_id}');
    });
</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
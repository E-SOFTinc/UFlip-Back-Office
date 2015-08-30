<script>
    var UITreeview = function() {
        //function to initiate jquery.dynatree
        var runTreeView = function() {
            //External data 
            $("#tree3").dynatree({
                // In real life we would call a URL on the server like this:
                //          initAjax: {
                //              url: "/getTopLevelNodesAsJson",
                //              data: { mode: "funnyMode" }
                //              },
                // .. but here we use a local file instead:
                
                initAjax: {
                    url: "{$BASE_URL}user/tree/get_children/{$user_id}"
                },
                onLazyRead: function(node) {
                    node.appendAjax({ url: "{$BASE_URL}user/tree/get_children/{$user_id}"
                    });
                },
                onActivate: function(node) {
                    node.appendAjax({ url: "{$BASE_URL}user/tree/get_children/"+node.data.id
                    });
                },
                onDeactivate: function(node) {
                    $("#echoActive").text("-");
                }
            });
        };
        return {
            //main function to initiate template pages
            init: function() {
                runTreeView();
            }
        };
    }();
</script>

{include file="user/layout/header.tpl"  name="$Name"}<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_tree_views} 
            </div>
            <div class="panel-body">

               
                    <div class="panel-body">
                        <table width="100%"><tr><td bgcolor='#FFFFEE'><label bgcolor='#999'> <img src="{$PUBLIC_URL}images/root.png" /><b>[{$user_name}]</b></label></td>
                                <td align="right">
                                    {* <form action="" method="post" id="find_form" name="find_form" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="" name="go_id" id="go_id"><input type="submit" value="Find Id" name="go_submit">
                                    </form> *}
                                </td>
                            </tr></table>
                        <div id="tree3"></div>

                        <div class="widget">

                        </div>
                    </div>
                </div>
                <!-- end: EXTERNAL DATA PANEL -->

            </div>
                    </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>                
<!-- /.modal -->
<!-- end: INBOX DETAILS FORM --> 						
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        UITreeview.init();
    });
</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
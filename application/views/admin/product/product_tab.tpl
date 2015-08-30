
<!-- /////////////////////  CODE EDITED BY JIJI  ////////////////////////// -->


<table>
    <tr>
        <td>
            <form class="niceform" name="AddProduct" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/product/add_product" >
                <input class="button1" type="submit" value="{$tran_add_product}" name="AddProduct">
            </form>
        </td>
        <td>
            <form class="niceform" name="EditProduct" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/product/edit_product">
                <input class="button1" type="submit" value="{$tran_edit_product}" name="EditProduct">
            </form>
        </td>
        <td>
            <form class="niceform" name="DeleteProduct" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/product/delete_product">
                <input class="button1" type="submit" value="{$tran_delete_product}" name="DeleteProduct">
            </form>
        </td>
        <td>
            <form class="niceform" name="InactiveProduct" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/product/inactive_product">
                <input class="button1" type="submit" value="{$tran_inactive_product}" name="InactiveProduct">
            </form>
        </td>
        <td>
            <form class="niceform" name="AddProductImage" method="POST" action="{$PATH_TO_ROOT_DOMAIN}admin/product/add_product_image">
                <input class="button1" type="submit" value="{$tran_add_product_image}" name="AddProductImage">
            </form>
        </td>
    </tr>
</table>
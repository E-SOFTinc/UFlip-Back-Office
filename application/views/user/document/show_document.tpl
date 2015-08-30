{include file="user/layout/header.tpl"  name=""}


<div id="span_js_messages" style="display:none;">

    <span id="row_msg">{$tran_rows}</span>
    <span id="show_msg">{$tran_shows}</span>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_Upload_Materials}
            </div>
            <div class="panel-body">
                {if $arr_count!=0}
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            <tr class="th">
                                <th>{$tran_slno}</th>
                                <th>{$tran_File_Title}</th>
                                <th>View</th>
                                <th>Download</th>
                                <th>{$tran_uploaded_date}</th>

                            </tr>
                        </thead>
                        <tbody>

                            {assign var="class" value=""}
                            {assign var="path" value="{$BASE_URL}user/"}
                            {assign var="i" value=0}
                            {foreach from=$file_details item=v}
                                {assign var="id" value="{$v.id}"}

                                {if $i%2==0}
                                    {$class='tr1'}
                                {else}
                                    {$class='tr2'}
                                {/if}
                                {$i=$i+1}
                                <tr class="{$class}">
                                    <td>{$i}</td>
                                    <td>{$v.file_title}</td>
                                    <td><a href="{$BASE_URL}public_html/images/document/{$v.doc_file_name}" target="blank"><img src="{$BASE_URL}public_html/images/1423235986_View.png"/></a></td>
                                    <td><a href="{$BASE_URL}public_html/images/document/{$v.doc_file_name}" download ><img src="{$BASE_URL}public_html/images/1423236013_Down.png"/></a></td>
                                    <td>{$v.uploaded_date}</td>

                                </tr>                    
                            {/foreach}

                        <counter></counter>
                        </tbody>
                    </table>
                {else}
                    <table class="table table-striped table-bordered table-hover table-full-width" id="">
                        <thead>
                            <tr class="th">
                                <th>{$tran_slno}</th>
                                <th>{$tran_File_Title}</th>
                                <th>{$tran_uploaded_date}</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="3" align="center"><h4>{$tran_No_Materials_Found}</h4></td></tr>
                        </tbody>
                    </table>
                {/if}
            </div>                        
        </div>
    </div>
</div>

{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        // ValidateUser.init();
        // DateTimePicker.init();
    });
</script>

{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
{include file="user/layout/header.tpl"  name=""}

<div class="col-sm-12 col-sm-offset-10">

    <a href="{$BASE_URL}user/mail/ticket_system"> <font  style="font-weight: bold; font-size: 15px">Goto Support Center</font></a>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>View Ticket
    </div>
    <div class="panel-body">

        {if $ticket_count>0}
            <form role="form" class="smart-wizard form-horizontal"  name="reply" id="reply" method="post" action="" enctype="multipart/form-data">
                <table class="table table-condensed table-hover">
                    <tbody>
                    <input type="hidden" name="ticket_id" id="ticket_id" value="{$ticket_arr['details0']['ticket_id']}">
                    <tr>
                        <td width="40px">Ticket Tracking ID    </td><td width="50px"> : {$ticket_arr['details0']['ticket_id']} </td>

                    </tr>
                    <tr>
                        <td width="40px">Ticket Status     </td><td width="50px"> : {if $ticket_arr['details0']['status']=='0'}<font color="#ff0000">New</font> [<a class="btn btn-xs btn-link panel-refresh" href="../markResolved/{$ticket_arr['details0']['id']}">Marked as resolved</a>]
    {else if $ticket_arr['details0']['status']=='4'}Inprogress{else if $ticket_arr['details0']['status']=='1'}Waiting Reply{else if $ticket_arr['details0']['status']=='2'}Replied{else if $ticket_arr['details0']['status']=='5'}OnHold{else}Resolved{/if}</td>
    {*<td>   

    <label class="col-sm-3 control-label">
    {$tran_category}
    </label>
    <div class="col-sm-3 col-sm-offset-2">
    <select tabindex="1" name="category" type="text" id="category" >
    <option value="">{$tran_select_type}</option>
    {foreach from=$cat_arr item=v}
    <option value="{$v.cat_id}">{$v.cat_name}</option>
    {/foreach}
    </select>
    </div>
    </td> *}

</tr>
<tr>
    <td width="40px">Created On      </td><td width="50px"> : {$ticket_arr['details0']['created_date']} </td>

</tr>
<tr>
    <td width="40px">Updated Date      </td><td width="50px"> : {$ticket_arr['details0']['updated_date']} </td>

</tr>
<tr>
    <td width="40px">Last Replier       </td><td width="50px"> : {$ticket_arr['details0']['lastreplier']} </td>

</tr>
<tr>
    <td width="40px">Category       </td><td width="50px"> : {$ticket_arr['details0']['category']} </td>

</tr>
<tr>
    <td width="40px">Priority       </td><td width="50px"> : {if $ticket_arr['details0']['priority']=='3'}Low{else if $ticket_arr['details0']['priority']=='2'}Medium{else if $ticket_arr['details0']['priority']=='1'}High {else if $ticket_arr['details0']['priority']=='2'}Medium{/if}</td>

</tr>
{assign var=i value=1}
{assign var=clr value=""}
{assign var=id value=""}
{assign var=msg_id value=""}
{assign var=user_name value=""}
{if $cnt_row > 0}
    {foreach from=$ticket_reply item=v}

        <tr>
            <td width="280px"><b>Message({$v.date}  from : {if isset($v.user)}{($v.user)}{else}Staff{/if}) </b></td>
            <td width="140px">{$v.message}</td>
            <td>
                {if {$v.file}}
                    <a href="{$BASE_URL}public_html/images/{$v.file}" class="tooltips" data-placement="top" data-original-title="Download {$v.file}" target="_blank"><i>View Attachments</i></a>
                {/if}
            </td>
        </tr>
    {/foreach}
{/if}
{if $ticket_arr['details0']['status']!=3}
    <tr>
        <td width="140px">Reply   <font color="#ff0000">*</font>   </td><td width="50px"> : <div class="col-sm-3">
                <textarea tabindex="2" name='message' id='message' rows='10' cols='40'></textarea>
            </div></td>

    </tr>
    <tr>
        <td width="140px">{$tran_attachment} <font color="#ff0000">*</font> </td><td width="50px">  
            {* <div class="col-sm-5">
            <input type="file" id="upload_doc" name="upload_doc" tabindex="2"><font color="#ff0000">{$tran_kb}({$tran_Allowed_types_are_gif_jpg_png_jpeg_JPG})</font>
            </div>*}

            <div class="col-sm-7">
                <div data-provides="fileupload" class="fileupload fileupload-new">
                    <span class="btn btn-file btn-light-grey"><i class="fa fa-folder-open-o"></i> <span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                        <input type="file" id="upload_doc" name="upload_doc" tabindex="3" >
                    </span>
                    <span class="fileupload-preview"></span>
                    <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">
                        ×
                    </a>
                </div>
                <p class="help-block">
                    <font color="#ff0000">{$tran_kb}({$tran_Allowed_types_are_gif_jpg_png_jpeg_JPG})</font>
                </p>
            </div>





        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <button class="btn btn-bricky col-sm-5" type="submit"id="reply" value="reply" name="reply" tabindex="3">Submit Reply</button>
        </td>
    </tr>
{/if}
</tbody>
</table>
{*{if $ticket_arr['details0']['status']!=3}  
<div class="form-group">
<label class="col-sm-2 control-label" for="message">
</label>
<div class="col-sm-4">
<button class="btn btn-bricky" type="submit"id="reply" value="reply" name="reply" tabindex="3">Submit Reply</button>
</div>
</div>
{/if}*}
</form>
{/if}
</div>


</div>
 
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateUser.init();

    });

</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}
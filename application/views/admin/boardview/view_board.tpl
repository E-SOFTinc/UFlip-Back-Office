<!---  <form   name="searchform" action="{$BASE_URL}admin/boardview/board_view_management" method="post" method="post"  onsubmit="return validate_profile_report(this);">
                <table  border="0" >
                    <tr>
                        <td class="td_content">{$tran_select_user_name}</td>
                        <td>
                            <input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this,'getCountriesByLetters',event)" autocomplete="Off" >
                        </td>
                        <td>
                            <input type="submit" name="profile_update" value="{$tran_view}" class="submit" />
                        </td>
                    </tr>
{*<tr>
<td align='center' colspan='2'><font color='grey'>{$tran_type_members_name}.</font></td>
</tr>*}
</table>
<br />
<input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
</form>
<hr/>
<table align='center'  width="80%">

{if count($user_board_id_arr) >0} 

    <tr>
        <td>
            <table cellpadding="2" cellspacing="0" class="grid" align="center" width="50%">

                <tr>
                    <td colspan="2" align='center'><h1>{$tran_summary}</h1></td>
                </tr>
                <tr>
                    <td align='left'><h4>{$tran_user_id} </h4></td>
                    <td>{$user_name}</td>
                </tr>
                <tr>
                    <td align='left'><h4>{$tran_no_of_members_in_downline}</h4></td>
                    <td>{$downline_count}</td>
                </tr>
                <tr>
                    <td align='left'><h4>{$tran_directly_enrolled_members}</h4></td>
                    <td><h4>{$direct_ref_count}</h4></td>
                </tr>
                <tr>
                    <td align='left'><h4>{$tran_members_enrolled_in_this_month}</h4></td>
                    <td><h4>{$member_this_month}</h4></td>
                </tr>
                <tr>
                    <td align='left'><h4>{$tran_clubs_splitted}</h4></td>
                    <td><h4>{$club_split_count}</h4></td>
                </tr>
                <tr>
                    <td align='left'><h4>{$tran_clubs_completed}</h4></td>
                    <td><h4>{$club_completed_count}</h4></td>
                </tr>
            </table>
            <br />
        </td>
    </tr>

    <tr>
        <td colspan="6">
            <table id="grid">
                <thead>
                    <tr>
                        <th>{$tran_slno}</th>
                        <th>{$tran_date_of_joining}</th>
                        <th>{$tran_club_id}</th>
                        <th>{$tran_club_username}</th>
                        <th>{$tran_club_split}</th>
                        <th>{$tran_view_club}</th>
                    </tr>
                </thead>

    {assign var="board_id" value=""}
    {assign var="serail_no" value=""}
    {assign var="top_id" value=""}
    {assign var="encr_id" value=""}
    {assign var="date_of_joining" value=""}
    {assign var="split_Status" value=""}
    {assign var="board_user_name" value=""}
    {assign var="table_no" value=""}
    {assign var="k" value="0"}
    {assign var="class" value=""}
    <tbody>
    {foreach from=$user_board_id_arr item=v}

        {if $v.split_status=='NO'}
            {$split_Status = $tran_no}
        {elseif  $v.split_status=='YES'}
            {$split_Status = $tran_yes}
        {else}
            {$split_Status = $v.split_status}
        {/if}


        {$board_id = $v.id}
        {$top_id = $v.top_id}
        {$encr_id = $v.encr_id}
        {$date_of_joining = $v.date_of_joining}
        {$serail_no = $v.seriel_no}
        {$table_no = $v.table_no}
        {$user_name = $v.user_name}
        {$board_user_name = $v.board_user_name}

        {if $k % 2 == 0}
            {$class = "class= 'tr2'"}
        {else}
            {$class = "class = 'tr1'"}
        {/if}

        <tr {$class} >
            <td> {counter}</td>
            <td> {$date_of_joining}</td>
            <td># {$serail_no}</td>
            <td>{$board_user_name}</td>
            <td>{$split_Status}</td>
            <td>
                <a id="element_1" href="{$BASE_URL}admin/tree/tree_view_board/{$encr_id}/{$table_no}" 
                   toptions="width = 1000, height = 500, type = iframe, title ={$tran_Club_View}, layout = quicklook, shaded = 1" >
                    <img id="element_1" alt="Board Tree" height='48px' width='48px' src="{$PUBLIC_URL}images/active.gif">
                </a>
            </td>
        </tr>

        {$k = $k + 1}


    {/foreach}
</tbody>
</table>
</td>
</tr>
{else}
    <tr>
        <td>
            <h2 align ='center'> {$tran_invalid_user_id_or_not_found} </h2>
        </td>
    </tr>
{/if}
</table> -->

<div id="span_js_messages" style="display:none;">
    <span id="error_msg1">{$tran_You_must_enter_user_name}</span>



</div>	
<div class="panel-body">
    <form role="form" class="smart-wizard form-horizontal" method="post"  name="searchform" id="searchform" >

        <div class="col-md-12">
            <div class="errorHandler alert alert-danger no-display">
                <i class="fa fa-times-sign"></i>{$tran_errors_check}
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label" for="user">{$tran_select_user_name}<font color="#ff0000">*</font>:</label>
            <div class="col-sm-6">
                <input  type="text"   name="user_name" id="user_name"   onKeyUp="ajax_showOptions(this, 'getCountriesByLetters','no', event)"  autocomplete="Off" tabindex="1">

                <input type="hidden" id="path_temp" name="path_temp" value="{$PUBLIC_URL}">
                <span id="username_box" style="display:none;"></span>
            </div>
        </div>            


        <div class="form-group">
            <div class="col-sm-2 col-sm-offset-2">
                <button class="btn btn-bricky" id="profile_update" tabindex="2" name="profile_update" value="{$tran_view}">
                    {$tran_submit}
                </button>
            </div>
        </div>
    </form>


    <div class="row">
        <div class="col-sm-12">
            {if  $board_submit}
                {if count($user_board_id_arr) >0}            


                    <hr />
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                            <tr class="th" align="center">
                                <th>{$tran_slno}</th>
                                <th>{$tran_date_of_joining}</th>
                                <th>{$tran_club_id}</th>
                                <th>{$tran_club_username}</th>
                                <th>{$tran_club_split}</th>
                                <th>{$tran_view_club}</th>
                            </tr>
                        </thead>

                        {assign var="board_id" value=""}
                        {assign var="serail_no" value=""}
                        {assign var="top_id" value=""}
                        {assign var="encr_id" value=""}
                        {assign var="date_of_joining" value=""}
                        {assign var="split_Status" value=""}
                        {assign var="board_user_name" value=""}
                        {assign var="table_no" value=""}
                        {assign var="k" value="0"}
                        {assign var="class" value=""}
                        <tbody>
                            {foreach from=$user_board_id_arr item=v}

                                {if $v.split_status=='NO'}
                                    {$split_Status = $tran_no}
                                {elseif  $v.split_status=='YES'}
                                    {$split_Status = $tran_yes}
                                {else}
                                    {$split_Status = $v.split_status}
                                {/if}


                                {$board_id = $v.id}
                                {$top_id = $v.top_id}
                                {$encr_id = $v.encr_id}
                                {$date_of_joining = $v.date_of_joining}
                                {$serail_no = $v.seriel_no}
                                {$table_no = $v.table_no}
                                {$user_name = $v.user_name}
                                {$board_user_name = $v.board_user_name}

                                {if $k % 2 == 0}
                                    {$class = "class= 'tr2'"}
                                {else}
                                    {$class = "class = 'tr1'"}
                                {/if}
                                {$k = $k + 1}
                                <tr {$class} >
                                    <td> {$k}</td>
                                    <td> {$date_of_joining}</td>
                                    <td># {$serail_no}</td>
                                    <td>{$board_user_name}</td>
                                    <td>{$split_Status}</td>
                                    <td>
                                        <a id="element_1" href="{$BASE_URL}admin/tree/tree_view_board/{$encr_id}/{$table_no}" 
                                           toptions="width = 1000, height = 500, type = iframe, title ={$tran_Club_View}, layout = quicklook, shaded = 1" >
                                            <img id="element_1" alt="Board Tree" height='48px' width='48px' src="{$PUBLIC_URL}images/active.gif">
                                        </a>
                                    </td>
                                </tr>




                            {/foreach}
                        </tbody>
                    </table>

                {else}

                    <h3 align ='center'> {$tran_invalid_user_id_or_not_found} </h3>

                {/if} 
            {/if}

        </div>
    </div>
</div>          

<!-- /////////////////////  CODE EDITED BY JIJI  ////////////////////////// -->

{include file="user/layout/header.tpl"  name=""}


<innerdashes>
    <hdash>
        <img src="{$PUBLIC_URL}images/1335679387_payment-card.png" border="0" />
        &nbsp;&nbsp;&nbsp;&nbsp;{$tran_total_joining_count}
		{if $HELP_STATUS}
			<a href="https://infinitemlmsoftware.com/help/" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
		{/if}
    </hdash>

    <cdash-inner> 
        <table>
            <tr>
                <td valign="middle"><b>{$tran_total_joining_count}: {$total_count}</b></td>
            </tr>
        </table>
    </cdash-inner> 

</innerdashes>
<div id="span_js_messages" style="display: none;">
    <span id="errmsg1">{$tran_You_must_select_a_date}</span>
    <span id="errmsg2">{$tran_You_must_select_from_date}</span>
    <span id="errmsg3">{$tran_You_must_select_to_date}</span>
    <span id="errmsg4">{$tran_You_must_Select_From_To_Date_Correctly}</span>
</div>

<!-- daily joining div --starts here -->

<innerdashes>
    <cdash-inner> 
        <p class="highlight">
        <table cellpadding="0" cellspacing="0" >
            <tr>
                <td width="50">
                    <img src="{$PUBLIC_URL}images/1335679790_category-2.png" border="0" />
                </td>
                <td width="200">
                    <h2>{$tran_daily_joining}</h2>
                </td>
            </tr>
        </table>
        <hr />

        <form action="" method="post" name="daily" id="daily" onSubmit="return validate_daily_join(this)" class="niceform">
            <table width="100%">
                <tr><td valign="middle" width="5%"><b>{$tran_date}</b></td>
                    <td width="40%">&nbsp;&nbsp;<input name="date" id="date" type="text" size="20" maxlength="10" readonly="true" VALUE="" />
                        <img src="{$PUBLIC_URL}images/calendar.gif" id="jscal_trigger_Month" align='absmiddle' tabindex="1"  >
                        <script type="text/javascript">
                            Calendar.setup ({
                            inputField : "date", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_Month", singleClick : true, step : 1
                        })
                        </script>
                    </td>
                    <td valign="middle" ><input type="submit" name="dailydate" value="{$tran_search}" /></td>
                </tr>
            </table>
        </form>

        {if $date1 != "" && $date2 == ""}
            <br />
            <table id="grid">
             
                    <tr>
                        <th>No</th>
                        <th>{$tran_user_name}</th>
                        <th>{$tran_status}</th>
                        <th>{$tran_sponser_name}</th>
                        <th>{$tran_date_of_joining}</th>
                        <th>{$tran_first_pair}</th>
                    </tr>
               
                    {if count($daily_joinings) != 0}
                        {assign var="i" value=0}
                        {assign var="class" value=""}
                        {assign var="status" value=""}
                        {foreach from=$daily_joinings item=v}
                            {if $i%2==0}
                                {$class='tr1'}
                            {else}
                                {$class='tr2'}
                            {/if}

                            {if $v.active=="yes"}
                                {$stat="{$tran_active}"}
                            {else}
                                {$stat="{$tran_blocked}"}
                            {/if}

                            <tr>
                                <td>{counter}</td>
                                <td>{$v.user_name}</td>
                                <td>{$stat}</td>
                                <td>{$v.father_user}</td>
                                <td>{$v.date_of_joining}</td>
                                <td>{$v.first_pair}</td>
                            </tr>

                            {$i=$i+1}
                        {/foreach}
                        <tr><td>{$result_per_page}</td></tr>
                    {else}
                        <tr><td colspan="8" align="center"><h4>User not found</h4></td></tr> 
                    {/if}>
            </table>

        {/if}
    </cdash-inner> 

</innerdashes>
<!-- daily joining div --ends here -->

<!-- weekly joining div --starts here -->

<innerdashes>
    <cdash-inner> 
        <p class="highlight">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td width="50">
                    <img src="{$PUBLIC_URL}images/1335679797_collaboration.png" border="0" />
                </td>
                <td width="200"><h2>{$tran_weekly_joining}</h2></td>
            </tr>
        </table>
        <hr />
        <form action="" method="post"  name="weekly_join" id="weekly_join" onSubmit="return validate_weekly_join(this)" class="niceform">
            <table>
                <tr ><td valign="left"><b>{$tran_date}</b></td>
                    <td>&nbsp;&nbsp;&nbsp;<input name="week_date1" id="week_date1" type="text" size="20" maxlength="10" readonly="true" VALUE="" />
                        <img src="{$PUBLIC_URL}images/calendar.gif" id="jscal_trigger_Month1" align='absmiddle' tabindex="3"  >
                        <script type="text/javascript">
                        Calendar.setup ({
                        inputField : "week_date1", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_Month1", singleClick : true, step : 1
                    })
                        </script></td>
                    <td align="left" ><input name="week_date2" id="week_date2" type="text" size="20" maxlength="10" readonly="true" VALUE="" />
                        <img src="{$PUBLIC_URL}images/calendar.gif" id="jscal_trigger_Month2" align='absmiddle' tabindex="4"  >
                        <script type="text/javascript">
                    Calendar.setup ({
                    inputField : "week_date2", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_Month2", singleClick : true, step : 1
                })
                        </script></td>
                    <td valign="middle" ><input type="submit" name="weekdate" value="{$tran_search}" tabindex="5"/></td></tr>
            </table>
        </form>

        {if $date1 != "" && $date2 != ""}
            <br />
            <table  id="grid">
              
                    <tr>
                        <th>No</th>
                        <th>{$tran_user_name}</th>
                        <th>{$tran_status}</th>
                        <th>{$tran_sponser_name}</th>
                        <th>{$tran_date_of_joining}</th>
                        <th>{$tran_first_pair}</th>
                    </tr>
               
                    {if count($weekly_joinings)!=0}
                        {assign var="i" value=0}
                        {assign var="class" value=""}
                        {assign var="status" value=""}
                        {foreach from=$weekly_joinings item=v}
                            {if $i%2==0}
                                {$class='tr1'}
                            {else}
                                {$class='tr2'}
                            {/if}

                            {if $v.active=="yes"}
                                {$stat="{$tran_active}"}
                            {else}
                                {$stat="{$tran_blocked}"}
                            {/if}

                            <tr>
                                <td>{counter}</td>
                                <td>{$v.user_name}</td>
                                <td>{$stat}</td>
                                <td>{$v.father_user}</td>
                                <td>{$v.date_of_joining}</td>
                                <td>{$v.first_pair}</td>
                            </tr>
                            {$i=$i+1}
                        {/foreach}
                        <tr><td>{$result_per_page}</td></tr>
                    {else}
                        <tr><td colspan="8" align="center"><h4>User not found</h4></td></tr> 
                    {/if}
            </table>
        {/if}
    </cdash-inner> 
    <!-- weekly joining div --ends here -->

</innerdashes>

{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}

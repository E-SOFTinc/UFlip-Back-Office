{include file="admin/layout/header.tpl"  name=""}
<innerdashes>
	<hdash>
		{if $HELP_STATUS}
			<a href="https://infinitemlmsoftware.com/help/profile_management" target="_blank"><buttons><img src="{$PUBLIC_URL}images/1359639504_help.png" /></buttons></a>
		{/if}
		<img src="{$PUBLIC_URL}images/1335604253_hire-me.png"/>
                {$u_name}'{$tran_s_profile_pic}
        </hdash>
    <cdash-inner>
<table width="80%" >
<tr>
	<td><img src="{$PUBLIC_URL}images/profile_picture/{$file_name}" alt="" align="absmiddle" height="116px" width="116px"/></td>
	<td>
		<table cellpadding="0" cellspacing="0" cellpadding="0">
			<tr>
			<td>
				<form name="change_profile_picture_form" id="change_profile_picture_form" method="post" enctype="multipart/form-data" >
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td><input tabindex="2" type="file" id="userfile" name="userfile"></td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="change_picture" id="change_picture" value="{$tran_change_profile_pic}" />							
							</td>
						</tr>                                                  
					</table>
				</form>
			</td>
			</tr>
		</table>
	</td>
</tr>
</table>
     </cdash-inner>
</innerdashes>
{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
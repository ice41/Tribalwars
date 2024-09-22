<h2>{$lang->get("player")} {$info_user.username}</h2>

<table><tr><td valign="top">

<table class="vis" width="100%">
	<tr><th colspan="2">{$info_user.username}</th></tr>
	<tr><td width="80">{$lang->get("points")}:</td><td>{$info_user.points|format_number}</td></tr>
	<tr><td>{$lang->get("rank")}:</td><td>{$info_user.rang}</td></tr>
	{if empty($info_ally.short)}
		<tr><td>{$lang->get("tribe")}:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td></tr>
	{else}
		<tr><td>{$lang->get("tribe")}:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td></tr>
	{/if}

		<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;player={$info_user.id}">&raquo; {$lang->get("write_mail")}</a></td></tr>
		{if $can_invite}
			<tr><td colspan="2"><a href="javascript:ask('{$invite_confirm}', 'game.php?village={$village.id}&screen=ally&mode=invite&action=invite_id&id={$info_user.id}&h={$hkey}')">&raquo; {$lang->get("invite")}</a></td></tr>
		{/if}
		{if $fusion}
		<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_user.id}&action=fusion">&raquo; {$lang->get("fusion")}</a></td></tr>
		{/if}
		
	</table><br />
	
	{$error}



<table class="vis" width="100%">
	<tr><th width="180">{$lang->get("villages")}</th><th width="80">{$lang->get("coords")}</th><th>{$lang->get("points")}</th></tr>
		{foreach from=$villages item=arr key=id}
			<tr><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$arr.name}</a></td><td>({$arr.x}|{$arr.y})</td><td>{$arr.points|format_number}</td></tr>
		{/foreach}
	</table>

</td><td align="right" valign="top" width="240">

	
<table class="vis" width="100%">
	<tr><th colspan="2">{$lang->get("profile")}</th></tr>
	{if !empty($info_user.image)}
		<tr><td colspan="2" align="center"><img src="graphic/player/{$info_user.image}" alt="Profilbild" /></td></tr>
	{/if}
	{if $age!=-1}
		<tr><td>{$lang->get("age")}:</td><td>{$age}</td></tr>
	{/if}
	{if $sex!=-1}
		<tr><td>{$lang->get("sex")}:</td><td>{$sex}</td></tr>
	{/if}
	{if $info_user.home!=''}
		<tr><td>{$lang->get("location")}:</td><td>{$info_user.home}</td></tr>
	{/if}
			
	</table>
	<br />
	{if !empty($info_user.personal_text)}
		<table class="vis" style="min-width: 500px;width: 100%;">
			<tr><th>{$lang->get("personal_text")}</th></tr>
			<tr><td align="center">{$info_user.personal_text}</td></tr>
		</table>
	{/if}
	 <br/>
			{php}include('awards_output.php');{/php}
</td></tr></table>
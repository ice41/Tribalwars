<h2>Gracz {$info_user.username}</h2>

<table><tr><td valign="top">

<table class="vis" width="100%">
	<tr><th colspan="2">{$info_user.username}</th></tr>
	<tr><td width="80">Punkty:</td><td>{$info_user.points|format_number}</td></tr>
	<tr><td>Ranga:</td><td>{$info_user.rang}</td></tr>
	{if empty($info_ally.short)}
		<tr><td>Plemi�:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td></tr>
	{else}
		<tr><td>Plemi�:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td></tr>
	{/if}

		<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;player={$info_user.id}">&raquo; Napisz wiadomo��</a></td></tr>
		{if $can_invite}
			<tr><td colspan="2"><a href="javascript:ask('Czy chcesz zaprosi� {$info_user.username} do plemienia?', 'game.php?village={$village.id}&screen=ally&mode=invite&action=invite_id&id={$info_user.id}&h={$hkey}')">&raquo; Zaprosi� do plemienia</a></td></tr>
		{/if}
		
	</table><br />



<table class="vis" width="100%">
	<tr><th width="180">Wioska</th><th width="80">Wsp��dne</th><th>Punkty</th></tr>
		{foreach from=$villages item=arr key=id}
			<tr><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$arr.name}</a></td><td><a href="game.php?village={$village.id}&screen=map&x={$arr.x}&y={$arr.y}"/>({$arr.x}|{$arr.y})</a></td><td>{$arr.points|format_number}</td></tr>
		{/foreach}
	</table>

</td><td align="right" valign="top">

	
<table class="vis" width="100%">
	<tr><th colspan="2">Profil</th></tr>
	{if !empty($info_user.image)}
		<tr><td colspan="2" align="center"><img src="graphic/player/{$info_user.image}" /></td></tr>
	{/if}
	{if $age!=-1}
		<tr><td>Wiek:</td><td>{$age}</td></tr>
	{/if}
	{if $sex!=-1}
		<tr><td>P�e�:</td><td>{$sex}</td></tr>
	{/if}
	{if $info_user.home!=''}
		<tr><td>Strona:</td><td>{$info_user.home}</td></tr>
	{/if}
			
	</table>
	<br />
	{if !empty($info_user.personal_text)}
		<table class="vis" width="100%">
			<tr><th>W�asny tekst</th></tr>
			<tr><td align="center">{$info_user.personal_text}</td></tr>
		</table>
	{/if}
	{$awards->get_user_awards($info_user.id,$user.id)}
</td></tr></table>
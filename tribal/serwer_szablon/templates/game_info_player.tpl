{php}
$sql = "SELECT `personal_text` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['personal_text'] = sql($sql,'array');

$can_mark = sql("SELECT COUNT(id) FROM `odznaczenia` WHERE `od_gracza` = '".$this->_tpl_vars['user']['id']."' AND `do_gracza` = '".$this->_tpl_vars['info_user']['id']."'","array");
if ($can_mark > 0) {
	$can_mark = false;
	} else {
	$can_mark = true;
	}
	
if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_user']['id']) {
	$can_mark = false;
	}
$this->assign('can_mark',$can_mark);
{/php}
<h2>Gracz {$info_user.username}</h2>

<table><tr><td valign="top">

<table class="vis" width="100%">
	<tr><th colspan="2">{$info_user.username}</th></tr>
	<tr><td width="80">Punkty:</td><td>{$info_user.points|format_number}</td></tr>
	<tr><td>Ranga:</td><td>{$info_user.rang}</td></tr>
	{if empty($info_ally.short)}
		<tr><td>Plemiê:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td></tr>
	{else}
		<tr><td>Plemiê:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td></tr>
	{/if}

		<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;player={$info_user.id}">&raquo; Napisz wiadomoœæ</a></td></tr>
		{if $can_mark}
			<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=edytuj_kolory_graczy&amp;player={$info_user.id}">&raquo; Zaznacz na mapie</a></td></tr>
		{/if}
		{if $can_invite}
			<tr><td colspan="2"><a href="javascript:ask('Czy chcesz zaprosiæ {$info_user.username} do plemienia?', 'game.php?village={$village.id}&screen=ally&mode=invite&action=invite_id&id={$info_user.id}&h={$hkey}')">&raquo; Zaprosiæ do plemienia</a></td></tr>
		{/if}
		
	</table><br />



<table class="vis" width="100%">
	<tr><th width="180">Wioski ({$user.villages})</th><th width="80">Wspó³rzêdne</th><th>Punkty</th></tr>
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
		<tr><td>P³eæ:</td><td>{$sex}</td></tr>
	{/if}
	{if $info_user.home!=''}
		<tr><td>Miejsce zamieszkania:</td><td>{$info_user.home}</td></tr>
	{/if}
			
	</table>
	<br />
	{if !empty($info_user.personal_text)}
		<table class="vis" width="100%">
			<tr><th>W³asny tekst</th></tr>
			<tr><td align="center">{$info_user.personal_text}</td></tr>
		</table>
	{/if}
	{if $display_awards}
		{$awards->get_user_awards($info_user.id,$user.id)}
	{/if}
</td></tr></table>
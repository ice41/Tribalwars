<h2>{$ally.name}</h2>
{if !empty($error)}
	{if $error=='Du bist der einzige Stammesgründer. Du kannst den Stamm nicht verlassen.'}
		{assign var='error' value='Voc&ecirc; &eacute; o &uacute;nico fundador da tribo, portando n&atilde; pode deixar a tribo.'}
	{/if}
	{if $error=='Spieler nicht gefunden'}
		{assign var='error' value='Jogador n&atilde;o encontrado.'}
	{/if}
	{if $error=='Spieler wurde bereits eingeladen'}
		{assign var='error' value='J&aacute; existe um convite em aberto para este jogador.'}
	{/if}
	{if $error=='Du bist derzeit der einzige Gründer. Du kannst dir das Rechte nicht entziehen!'}
		{assign var='error' value='Atualmente voc&ecirc; &eacute; o &uacute;nico fundador da tribo, portanto n&atilde;o pode revogar seus direitos.'}
	{/if}
	{if $error=='Kein Stammesbild ausgewählt!'}
		{assign var='error' value='Voc&ecirc; n&atilde;o selecionou nenhuma imagem para o bras&atilde;o da tribo.'}
	{/if}
	{if $error=='Name schon vergeben!'}
		{assign var='error' value='O nome escolhido j&aacute; est&aacute; em uso.'}
	{/if}
	{if $error == "Stamm nicht gefunden"}
		{assign var='error' value='Tribo n&atilde;o encontrada.'}
	{/if}
	{if $error == "Es existiert schon eine Beziehung zu dem Stamm"}
		{assign var='error' value='J&aacute; existe uma rela&ccedil;&atilde;o diplom&aacute;tica com est&aacute; tribo.'}
	{/if}
	{if $action == 'add_contract' && $error == "Eigener Stamm"}
		{assign var='error' value='Voc&ecirc; n&atilde;o pode estabelecer uma rela&ccedil;o diplom&aacute;tica com sua pr&oacute;pria tribo.'}
	{/if}
	<div class="error">{$error|replace:"Das Verlassen des Stammes wurde deaktiviert!":"Nenhuma tribo pode ser debandada."}</div>
{/if}
<table width="98%" align="center" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-top:5px;">
	<tr>
		{if $mode=='overview'}
			<td class="selected" width="100" {if $user.ally_invite==1 || $user.ally_lead != 1} colspan="2" {/if} align="center">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">Visualiza&ccedil;&atilde;o geral</a>
			</td>
		{else}
			<td width="100" {if $user.ally_invite==1 || $user.ally_lead != 1} colspan="2" {/if} align="center">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">Visualiza&ccedil;&atilde;o geral</a>
			</td>
		{/if}
		{if $mode=='reservations'}
			<td class="selected" width="100" colspan="2" align="center">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations">Reserva de aldeias</a>
			</td>
		{else}
			<td width="100" colspan="2" align="center">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations">Reserva de aldeias</a>
			</td>
		{/if}
		{if $user.ally_lead == 1}
		{if $mode=='intro_igm'}
			<td class="selected" width="100" colspan="2" align="center">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=intro_igm">Bem vindo</a>
			</td>
		{else}
			<td width="100" colspan="2" align="center">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=intro_igm">Bem vindo</a>
			</td>
		{/if}
		{/if}
	</tr>
	<tr align="center">
		{if $mode=='profile'}
			<td class="selected" width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">Perfil</a>
			</td>
		{else}
				<td width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">Perfil</a>
			</td>
		{/if}
		{if $mode=='members'}
			<td class="selected" width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Membros</a>
			</td>
		{else}
			<td width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Membros</a>
			</td>
		{/if}
		{if $mode=='contracts'}
			<td class="selected" width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts">Diplomacia</a>
			</td>
		{else}
			<td width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts">Diplomacia</a>
			</td>
		{/if}
		{if $user.ally_invite==1}
		{if $mode=='invite'}
			<td class="selected" width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite">Convites</a>
			</td>
		{else}
			<td width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite">Convites</a>
			</td>
		{/if}
		{/if}
		{if $user.ally_lead==1}
		{if $mode=='properties'}
			<td class="selected" width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">Propriedades</a>
			</td>
		{else}
			<td width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">Propriedades</a>
			</td>
		{/if}
		{/if}
		{if $mode=='forum'}
			<td class="selected" width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum">F&oacute;rum</a>
			</td>
		{else}
			<td width="100">
				<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum">F&oacute;rum</a>
			</td>
		{/if}
	</tr>
</table><br />
{if $mode=='profile'}
	{include file="game_info_ally.tpl"}
{elseif $mode=='rights'}
	{include file="game_ally_in_ally_rights.tpl"}
{elseif $mode=='contracts'}
	{include file="game_ally_in_ally_contracts.tpl"}
{elseif $mode=='forum'}
	{include file="game_ally_in_ally_forum.tpl"}
{elseif $mode=='reservations'}
	{include file="game_ally_in_ally_reservations.tpl"}
{else}
	{if in_array($mode,$links)}
		{include file="game_ally_in_ally_$mode.tpl"}
	{/if}
{/if}
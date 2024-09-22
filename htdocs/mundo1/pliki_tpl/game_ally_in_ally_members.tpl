<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=members&amp;action=mod&amp;h={$hkey}" method="post" id="form_rights">
	<table class="vis">
		<tr>
			<th width="280" class="nowrap">Nazwa</th>
			<th width="40" class="nowrap">Ranking</th>
			<th width="80" class="nowrap">Punkty</th>
			<th width="60" class="nowrap">Ranking globalny</th>
			<th width="40" class="nowrap">Wioski</th>
			{if $user.ally_lead==1 || $user.ally_found==1}
				<th><img src="/ds_graphic/ally_rights/found.png" title="Tribo"></th>
				<th><img src="/ds_graphic/ally_rights/lead.png" title="Administração da tribo"></th>
				<th><img src="/ds_graphic/ally_rights/invite.png" title="convidar"></th>
				<th><img src="/ds_graphic/ally_rights/diplomacy.png" title="Diplomacia"></th>
				<th><img src="/ds_graphic/ally_rights/mass_mail.png" title="Email em amssa"></th>
				<th><img src="/ds_graphic/ally_rights/forum_mod.png" title="Moderador no Fórum Interno"></th>
				<th><img src="/ds_graphic/ally_rights/internal_forum.png" title="Fórum oculto"></th>
				<th><img src="/ds_graphic/ally_rights/trusted.png" title="membro confiável"></th>
				<th class="nowrap">substituição</th>
			{/if}
		</tr>
		{foreach from=$members item=arr key=id}
{php}
	$rank++;
			if($rank % 2 == 0) $styl = "row_b"; else $styl="row_a";
			{/php}
							
		<tr {if $id == $user.id}class="selected"{else}{php} echo $styl;{/php}{/if}>
				<td class="lit-item">
					{if $user.ally_lead==1 || $user.ally_found==1}
						<input type="radio" name="sel_player_id" value="{$id}" />	
						{foreach from=$arr.icons item=graphic}
							<img src="/ds_graphic/stat/{$graphic}.png" title="" alt="" /> 
						{/foreach}
					{/if}
					<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">
						{$arr.username}
					</a> 
					{if !empty($arr.ally_titel)}
						({$arr.ally_titel})
					{/if}
				</td>
				<td class="lit-item">
					{$arr.rank}
				</td>
				<td class="lit-item">
					{$arr.points}
				</td>
				<td class="lit-item">
					{$arr.rang}
				</td>
				<td class="lit-item">
					{$arr.villages}
				</td>
				
				{if $user.ally_lead==1 || $user.ally_found==1}
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_found==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" {if $user.ally_lead==1 && $user.ally_found==0}disabled="disabled"{/if} name="player_id[{$id}][found]" id="player_id[{$id}][found]" onclick="set_found_right({$id})" {if $arr.ally_found==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_lead==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" {if $user.ally_lead==1 && $user.ally_found==0}disabled="disabled"{/if} name="player_id[{$id}][lead]" id="player_id[{$id}][lead]" onclick="set_lead_right({$id})" {if $arr.ally_lead==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_invite==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" name="player_id[{$id}][invite]" id="player_id[{$id}][invite]" {if $arr.ally_invite==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_diplomacy==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" name="player_id[{$id}][diplomacy]" id="player_id[{$id}][diplomacy]" {if $arr.ally_diplomacy==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_mass_mail==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" name="player_id[{$id}][mass_mail]" id="player_id[{$id}][mass_mail]" {if $arr.ally_mass_mail==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_mod_forum==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" name="player_id[{$id}][forum_mod]" id="player_id[{$id}][forum_mod]" {if $arr.ally_mod_forum==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_forum_switch==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" name="player_id[{$id}][internal_forum]" id="player_id[{$id}][internal_forum]" {if $arr.ally_forum_switch==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							{if $arr.ally_forum_trust==1}
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							{else}
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							{/if}
						</div>
						<input type="checkbox" name="player_id[{$id}][trusted_member]" id="player_id[{$id}][trusted_member]" {if $arr.ally_forum_trust==1}checked="checked"{/if} class="hide_toggle" />
					</td>
					
					
					<td class="lit-item">
					{if !empty($arr.vacation_id)}
						<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.vacation_id}">{$arr.vacation_name}</a>
					{/if}
					</td>
				{/if}
			</tr>
		{/foreach}
		{if $user.ally_lead==1 || $user.ally_found==1}
			<tr>
				<td class="no_bg">
					<div class="show_toggle">
						<select name="ally_action">
							<option value="">Escolha uma ação...</option>
							<option value="rights">Direitos e Título</option>
							<option value="kick">Verificação de saída</option>
						</select>
						<input type="submit" value="OK" />
					</div>
					<input type="submit" value="Salvar direitos" class="hide_toggle" />
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members" class="hide_toggle">
						&raquo; Enviar tropas
					</a>
				</td>
				<td colspan="11" class="no_bg align_right">
					<a href="#" onclick="toggle_visibility_by_class('hide_toggle','inline'); toggle_visibility_by_class('show_toggle'); toggle_form_action('form_rights', 'game.php?village={$village.id}&amp;screen=ally&amp;mode=members&amp;action=edit_rights&amp;h={$hkey}');" class="show_toggle">
						&raquo;Gerenciar casos
					</a>
				</td>
			</tr>
		{/if}
	</table>
</form>

<br />

<table class="vis">
	<tr>
		<th>Status</th>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/green.png?1" alt="" />ativo</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/yellow.png?1" alt="" /> inativo por 2 dias</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/red.png?1" alt="" /> inativo por uma semana</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/vacation.png?1" alt="" /> substituição</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/birthday.png?1" alt="" /> Aniversário</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/banned.png?1" alt="" /> bloqueado</td>
	</tr>
</table>

<div style="font-size: 7pt;">
	Apenas os administradores da tribo podem ver o status.
</div>

{literal}
	<script type="text/javascript">
		function toggle_visibility_by_class(classname,display){if(display=='table-row')display='';$("."+classname).each(function(){if($(this).css('display')=='none'){$(this).css('display',display)}else $(this).css('display','none')})}
		
		function set_found_right(memberid) {
			check_and_disable('#player_id\\['+memberid+'\\]\\[lead\\]', $('#player_id\\['+memberid+'\\]\\[found\\]').is(':checked'));
			set_lead_right(memberid);
			}

		function set_lead_right(memberid) {
			var checked = $('#player_id\\['+memberid+'\\]\\[lead\\]').is(':checked');
			check_and_disable('#player_id\\['+memberid+'\\]\\[invite\\]', checked);
			check_and_disable('#player_id\\['+memberid+'\\]\\[diplomacy\\]', checked);
			check_and_disable('#player_id\\['+memberid+'\\]\\[mass_mail\\]', checked);
			check_and_disable('#player_id\\['+memberid+'\\]\\[forum_mod\\]', checked);
			check_and_disable('#player_id\\['+memberid+'\\]\\[internal_forum\\]', checked);
			check_and_disable('#player_id\\['+memberid+'\\]\\[trusted_member\\]', checked);
			}

		function check_and_disable(name, check) {
			$(name).attr('disabled', check);
			if(check == true) {
				$(name).attr('checked', check);
				}
			}

		function toggle_form_action(name, action) {
			$('#' + name).attr('action', action);
			}
	</script>
{/literal}
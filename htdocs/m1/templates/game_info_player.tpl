{php}
	$q01 = mysql_fetch_array(mysql_query("SELECT killed_units_altogether,killed_units_altogether_rank FROM users WHERE id = '".$_GET['id']."'"));
	$this->_tpl_vars['info_user']['killed_units_altogether'] = $q01['0'];
	$this->_tpl_vars['info_user']['killed_units_altogether_rank'] = $q01['1'];

	$texto = $this->_tpl_vars['sex'];
	$this->_tpl_vars['sex'] = str_replace("weiblich","Feminino", $texto);
	$this->_tpl_vars['sex'] = str_replace("männlich","Masculino",$texto);
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['info_user']['id']."'"));
{/php}
<h2>Jogador: {$info_user.username}</h2>
<table width="100%">
	<tr>
		<td valign="top" width="45%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Titulo de nobresa: {$tUser.title}</th></tr>
				<tr><td width="100">Pontos:</td><td>{$info_user.points|format_number}</td></tr>
				<tr><td>Ranking:</td><td>{$info_user.rang}</td></tr>
				<tr><td width="155">Oponentes derrotados:</td><td>{$info_user.killed_units_altogether|format_number} P (Classifica&ccedil;&atilde;o: <B>{$info_user.killed_units_altogether_rank}</b>)</td></tr>
				{if !empty($info_ally.short)}
				<tr><td>Tribo:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td></tr>
				{/if}
				<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;player={$info_user.id}">&raquo; Enviar mensagem</a></td></tr>
			{if $can_invite}
				{if $soma >= $limite}
					{$msg}
				{else}
				<tr><td colspan="2"><a href="javascript:ask('Deseja convidar o jogador {$info_user.username} para sua tribo?', 'game.php?village={$village.id}&screen=ally&mode=invite&action=invite_id&id={$info_user.id}&h={$hkey}')">&raquo; Convidar para tribo</a></td></tr>
				{/if}
			{/if}
			</table><br />
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="180" {php} if ($_GET['id'] == $this->_tpl_vars['user']['id']) { echo 'colspan="2"'; }{/php}>Aldeias ({$vills})</th>
					<th width="80">Coordenada</th>
					<th>Pontos</th>
				</tr>
				{foreach from=$villages item=arr key=id}
				<tr>
					{php} if ($_GET['id'] == $this->_tpl_vars['user']['id']) { echo '<td width="10"><a href="game.php?village='.$this->_tpl_vars['id'].'&screen=overview"><img src="../graphic/icons/go.png" /></a></td>'; } {/php}
					<td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$arr.name}</a></td>
					<td align="center">{$arr.x}|{$arr.y}</td>
					<td align="center">{$arr.points|format_number}</td>
				</tr>
				{/foreach}
			</table>
		</td>
		<td align="right" valign="top" width="55%">
			{if !empty($info_user.image) || $age != '-1' || $sex != '-1' || $info_user.home != ''}
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Perfil <span style="float:right;">{php} if ($_GET['id'] == $this->_tpl_vars['user']['id']) { echo '<a href="game.php?village='.$_GET['village'].'&screen=settings&mode=profile">Editar</a>'; } {/php}</span></th></tr>
				{if !empty($info_user.image)}
				<tr><td colspan="2" align="center"><img src="graphic/player/{$info_user.image}" title="Bras&atilde;o de: {$info_user.username}" /></td></tr>
				{/if}
				{if $age!=-1}
				<tr><td>Idade:</td><td>{$age}</td></tr>
				{/if}
				{if $sex!=-1}
				<tr><td>Sexo:</td><td>{$sex}</td></tr>
				{/if}
				{if $info_user.home!=''}
				<tr><td>Localiza&ccedil;&atilde;o:</td><td>{$info_user.home}</td></tr>
				{/if}
			</table><br />
			{/if}
			{if !empty($info_user.personal_text)}
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th>Testo pessoal</th></tr>
				<tr><td align="center">{$info_user.personal_text|bb_format}</td></tr>
			</table>
			{/if}
		</td>
	</tr>
</table>
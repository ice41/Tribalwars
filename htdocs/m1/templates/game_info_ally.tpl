{if $screen != 'ally'}<h2>{$info.name}</h2>{/if}
<table width="100%">
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Propriedades</th></tr>
				<tr><td width="150">Nome:</td><td>{$info.name}</td></tr>
				<tr><td>Abrevia&ccedil;&atilde;o:</td><td>{$info.short}</td></tr>
				<tr><td>Membros:</td><td>{$info.members}</td></tr>
				<tr><td>Total de pontos:</td><td>{$info.points|format_number}</td></tr>
				<tr><td>M&eacute;dia de pontos:</td><td>{$info.cutthroungt|format_number}</td></tr>
				<tr><td>Ranking:</td><td>{$info.rank}</td></tr>
				<tr><td colspan="2" align="center"><a href="game.php?village={$village.id}&amp;screen=info_member&amp;id={$info.id}">Membros</a></td></tr>
			</table>
		</td>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				{if !empty($info.image)}
				<tr><td align="center"><img src="graphic/ally/{$info.image}"></td></tr>
				{/if}
				<tr><th>Perfil</th></tr>
				<tr><td align="center">{$info.description|bb_format}</td></tr>
			</table>
		</td>
	</tr>
</table>
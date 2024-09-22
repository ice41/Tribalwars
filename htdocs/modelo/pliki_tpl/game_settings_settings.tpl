<h3>Definições</h3>

<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings&amp;action=change_settings&amp;h={$hkey}" method="post">

	<table class="vis settings">
		<tbody>
			<tr>
				<th colspan="2">Definições</th>
			</tr>

			<tr>
				<td>Largura da janela</td>
				<td><input name="window_width" size="4" maxlength="4" value="{$user.window_width}" type="text"> Monitorar resolução</td>
			</tr>

			<tr>
				<td>Design gráfico clássico:</td>
				<td><label><input name="classic_graphics" type="checkbox" {if $user.classic_graphics}checked="checked"{/if}>O modo clássico desativa novas funções gráficas</label></td>
			</tr>

			<tr>
				<td>Gráficos clássicos:</td>
				<td><label><input name="confirm_queue" type="checkbox" {if !$user.confirm_queue}checked="checked"{/if}>Aparência clássica (Tribos 6.5)</label></td>
			</tr>

			<tr>
				<td>Menu principal:</td>
				<td><label><input name="dyn_menu" type="checkbox" {if $user.dyn_menu}checked="checked"{/if}>Menu principal Sempre visível</label></td>
			</tr>
			
			<tr>
				<td>Barra de atalhos:</td>
				<td><label><input name="show_toolbar" type="checkbox" {if $user.show_toolbar}checked="checked"{/if}>Mostrar a barra de atalhos</label></td>
			</tr>


			<tr>
				<td>Tamanho do mapa:</td>
				<td>
					<select name="map_size" style="width: 80px;">
						<option label="7x7" value="7" {if $user.map_size==7}selected="selected"{/if}>7x7</option>
						<option label="9x9" value="9" {if $user.map_size==9}selected="selected"{/if}>9x9</option>
						<option label="11x11" value="11" {if $user.map_size==11}selected="selected"{/if}>11x11</option>
						<option label="13x13" value="13" {if $user.map_size==13}selected="selected"{/if}>13x13</option>
						<option label="15x15" value="15" {if $user.map_size==15}selected="selected"{/if}>15x15</option
						{*
						<option label="19x19" value="19" {if $user.map_size==19}selected="selected"{/if}>19x19</option>
						<option label="23x23" value="23" {if $user.map_size==23}selected="selected"{/if}>23x23</option>
						<option label="31x31" value="31" {if $user.map_size==31}selected="selected"{/if}>31x31</option>
						*}
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="2"><input value="OK" type="submit"></td>
			</tr>
		</tbody>
	</table>
	<br>
</form>

<table class="vis"><form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings&amp;action=css" method="post">
<tbody><tr>
	<th colspan="2">Pacote gráfico</th>
</tr>
<tr>
	<td colspan="2">Pode encontrar a introdução e link para baixar o pacote gráfico em <a target="_blank" href="http://forum.tribalwars.net/showthread.php?t=11272"> Wiki</a>.</td>
</tr>
{*<tr>
	<td>
		Pacote gráfico de competição:
	</td>
	<td>
		<select name="contest_graphics">
			<option value="">Falta</option>
			<option value="contest_en">Vencedor do Concurso: Queader - tribalwars.net</option>
			<option value="contest_de">Vencedor do Concurso: Lady Cortana - die-staemme.de</option>
			<option value="contest_ru">Vencedor do concurso: Ashot - voyna-plemyon.ru</option>
			<option value="winter" selected="selected=">Desligar (autor: -Vanguard.-)</option>
		</select>
	</td>
</tr>
<tr>
	<td>O caminho para o pacote gráfico:</td>
	<td><input name="image_base" size="64" value="" type="text"></td>
</tr>*}
<tr>
	<td>O caminho para o arquivo CSS:</td>
	<td><input name="css" size="64" value="{$user.css}" type="text"></td>
</tr>
<tr><td colspan="2"><input class="btn" value="Mantenha suas alterações" type="submit"></td></tr>
</tbody>
</table>
</form>
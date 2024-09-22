<h3>Ustawienia</h3>

<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings&amp;action=change_settings&amp;h={$hkey}" method="post">

	<table class="vis settings">
		<tbody>
			<tr>
				<th colspan="2">Ustawienia</th>
			</tr>

			<tr>
				<td>Szerokoœæ okna</td>
				<td><input name="window_width" size="4" maxlength="4" value="{$user.window_width}" type="text"> Rozdzielczoœæ monitora</td>
			</tr>

			<tr>
				<td>Klasyczna oprawa graficzna:</td>
				<td><label><input name="classic_graphics" type="checkbox" {if $user.classic_graphics}checked="checked"{/if}>Tryb klasyczny dezaktywuje nowe funkcje graficzne</label></td>
			</tr>

			<tr>
				<td>Klasyczna grafika:</td>
				<td><label><input name="confirm_queue" type="checkbox" {if !$user.confirm_queue}checked="checked"{/if}>Klasyczny wygl¹d (Plemiona 6.5)</label></td>
			</tr>

			<tr>
				<td>Menu g³ówne:</td>
				<td><label><input name="dyn_menu" type="checkbox" {if $user.dyn_menu}checked="checked"{/if}>Menu g³ówne zawsze widoczne</label></td>
			</tr>
			
			<tr>
				<td>Pasek narzêdzi:</td>
				<td><label><input name="show_toolbar" type="checkbox" {if $user.show_toolbar}checked="checked"{/if}>Pokazaæ pasek narzêdzi</label></td>
			</tr>


			<tr>
				<td>Rozmiar mapy:</td>
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
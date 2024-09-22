{if isset($symulacja) && $symulacja}
	<table class="vis">
		<tr>
			<td colspan="2"></td>
			{foreach from=$units key=name item=dbname}
				<th width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr>
			<td rowspan="2">Agresor:</td>
			<td>Jednostki:</td>
			{foreach from=$wojsko_napastnika item=val}
				{if $val == 0}
					<td class="hidden">0</td>
				{else}
					<td>{$val}</td>
				{/if}
			{/foreach}
		</tr>
		<tr>
			<td>Straty:</td>
			{foreach from=$sim_battle_result.jednostki_att_straty item=val}
				{if $val == 0}
					<td class="hidden">0</td>
				{else}
					<td>{$val}</td>
				{/if}
			{/foreach}
		</tr>
		<tr>
			<td style="display:none"></td>
		</tr>
		<tr>
			<td rowspan="2">Obroñca</td>
			<td>Jednostki:</td>
			{foreach from=$wojsko_obroncy item=val}
				{if $val == 0}
					<td class="hidden">0</td>
				{else}
					<td>{$val}</td>
				{/if}
			{/foreach}
		</tr>
		<tr>
			<td>Straty:</td>
			{foreach from=$sim_battle_result.jednsotki_def_straty item=val}
				{if $val == 0}
					<td class="hidden">0</td>
				{else}
					<td>{$val}</td>
				{/if}
			{/foreach}
		</tr>
	</table>
	<table class="vis">
	{if $sim_battle_result.mur_nowy_lvl != $sim_battle_result.mur_stary_lvl}
		<tr><th>Uszkodzenie przez tarany:</th><td>Mur uszkodzony z poziomu <b>{$sim_battle_result.mur_stary_lvl}</b> do poziomu <b>{$sim_battle_result.mur_nowy_lvl}</b></td></tr>
	{/if}
	
	{if $sim_battle_result.ktpc_nowy_lvl != $sim_battle_result.ktpc_stary_lvl}
		<tr><th>Uszkodzenia zadane przez katapultê:</th><td>Budynek uszkodzony z poziomu <b>{$sim_battle_result.ktpc_stary_lvl}</b> do poziomu <b>{$sim_battle_result.ktpc_nowy_lvl}</b></td></tr>
	{/if}
	</table>

{/if}
	
<h3>Symulator</h3>
<form action="game.php?village={$village.id}&screen=place&mode=sim&akcja=symuluj" method="post" name="units">
	<input name="simulate" type="hidden" />
	<table class="vis">
		<tr>
			<th></th>
			<th>Agresor</th>
			<th>Obroñca</th>
		</tr>
		<tr>
			<td></td>
			<td>Jednostki</td>
			<td>Jednostki</td>
		</tr>
		{foreach from=$units key=name item=dbname}
			<tr>
				<td><a href="javascript:popup('popup_unit.php?unit={$dbname}, 520, 520)"><img src="graphic/unit/{$dbname}.png" title="" alt="" /> {$name}</a></td>
				<td><input type="text" name="att_{$dbname}" size="5" value="{$wojsko_napastnika.$dbname}" /></td>
				<td><input type="text" name="def_{$dbname}" size="5" value="{$wojsko_obroncy.$dbname}" /></td>
			</tr>
		{/foreach}
		<tr>
			<td>Mur obronny</td>
			<td></td>
			<td><input type="text" name="def_wall" value="{$POST.def_wall}" size="5" /></td>
		</tr>
		
		<tr>
			<td>Przedmioty</td>
			<td>
				<select multiple="multiple" name="att_knight_items[]" size="6">
					<option value="0">Nie ma ¿adnego przedmiotu</option>
					<option value="unit_spear">Halabarda szwajcarska </option>
					<option value="unit_sword">D³ugi miecz Ulricha</option>
					<option value="unit_axe">Wojowniczy topór Thorgarda</option>
					<option value="unit_archer">Wielki ³uk Edwarda</option>
					<option value="unit_spy">Luneta Kalida</option>
					<option value="unit_light">Lanca Mieszka</option>

					<option value="unit_heavy">Flaga Baptysty</option>
					<option value="unit_marcher">£uk refleksyjny Khana</option>
					<option value="unit_ram">Wekiera Carlosa</option>
					<option value="unit_catapult">Ogieñ olimpijski</option>
					<option value="unit_snob">Ber³o Vasca</option>
				</select>
			</td>
			
			<td colspan="2">
				<select multiple="multiple" name="def_knight_items[]" size="6">
					<option value="0">Nie ma ¿adnego przedmiotu</option>
					<option value="unit_spear">Halabarda szwajcarska </option>
					<option value="unit_sword">D³ugi miecz Ulricha</option>
					<option value="unit_axe">Wojowniczy topór Thorgarda</option>

					<option value="unit_archer">Wielki ³uk Edwarda</option>
					<option value="unit_spy">Luneta Kalida</option>
					<option value="unit_light">Lanca Mieszka</option>
					<option value="unit_heavy">Flaga Baptysty</option>
					<option value="unit_marcher">£uk refleksyjny Khana</option>
					<option value="unit_ram">Wekiera Carlosa</option>

					<option value="unit_catapult">Ogieñ olimpijski</option>
					<option value="unit_snob">Ber³o Vasca</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>Poziom celu ostrza³u katapultami</td>
			<td></td><td><input type="text" name="def_building" value="{$POST.def_building}" size="5" /></td>
		</tr>
		{if $morale}
			<tr>
				<td>Morale</td>
				<td colspan="2"><input type="text" name="moral" value="{$POST.moral}" size="5" id="moral" />%</td>
			</tr>
		{/if}
		<tr>
			<td>Noc</td>
			<td></td>
			<td><label><input name="night" type="checkbox"> 100% bonus obronny</label></td>
		</tr>
		<tr>
			<td>Szczêœcie (od -25% do +25%)</td>
			<td colspan="2"><input type="text" name="luck" value="{$POST.luck}" size="5" />%</td>
		</tr>
	</table>
	<input type="submit" value="Symulacja" />
</form>
<h3>Ulubione</h3>

{if !empty($error)}
	<font class="error">{$error}</font>
{/if}

<form action="game.php?village={$village.id}&screen=ulubione&action=dodaj_do_ulub&h={$hkey}" method="POST"/>
	<table class="vis">
		<tr>
			<th colspan="2">Dodaæ wioskê</th>
		</tr>
		<tr>
			<td>x: <input type="text" name="x" value="" size="5" /></td>
			<td>y: <input type="text" name="y" value="" size="5" /></td>
		</tr>
	</table>
	<input type="submit" name="sub" value="Dodaj"/>
</form>

<br>

{if count($ulubione) > 0}
	<table class="vis">
		<tr>
			<th width="300">Nazwa wioski</th>
			<th></th>
		</tr>
		{foreach from=$ulubione key=village_id item=click_link}
			<tr>
				<td>
					<a href="game.php?village={$village.id}&screen=info_village&id={$village_id}"/>
						{$click_link}
					</a>
				</td>
				<td>
					<a href="game.php?village={$village.id}&screen=ulubione&action=usun_ulub&id={$village_id}&h={$hkey}"/>
						<img src="/ds_graphic/delete.png" alt="usuñ"/>
					</a>
				</td>
			</tr>
		{/foreach}
	</table>
{/if}

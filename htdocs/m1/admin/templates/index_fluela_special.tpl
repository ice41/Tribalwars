<h2>Sate parasite</h2>

<a href="index.php?screen=fluela_special" />Creati sate parasite</a> - <a href="index.php?screen=fluela_special&action=editmes" />Editati sate parasite</a>
<br /><br />
{if !empty($error)}
	<font class="error">{$error}</font><br /><br />
{/if}
{if !empty($new_version)}
	{$new_version}<br /><br />
{else}
{if $aktion == "create"}
{if $success} Satele parasite au fost create/editate cu succes!
{else}
	<form method="POST" action="index.php?screen=fluela_special&action=creater" name="dorf" onSubmit="this.submit.disabled=true;">
		<table class="vis">
<tr>
				<th>Creati sate parasite</th>
		  </tr>
			<tr>
				<td width="230">Numar:
			  <input type="text" name="num" value="0"></td>
			  
		  </tr>
			<tr><td>
			<table class="vis">
				<tr>
				<td>
				<table class="vis">
					<tr>
					<th>Cladiri</th>
					<th>Nivel</th>
					</tr>
					{foreach from=$buildings item=arr key=dbname}
						<tr>
							<td><img src="../graphic/buildings/{$dbname}.png"> {$arr.name}:</td>
							<td><input type="text" size="4" name="{$dbname}" value="{$arr.std_lvl}"></td>
						</tr>
					{/foreach}
				</table>
			</table>
			</td></tr>

			<tr>
				<td><input type="hidden" name="welche_akt" value="Erstellen" /><input type="submit" name="submit" value="Creaza" onload="this.disabled=false;"> </td>
			</tr>

		</table>
</form>
	<script type="text/javascript" src="templates/fluela_special.js"></script>
{/if}
{elseif $edit_output != ""}
{$edit_output}
{elseif $aktion == "edit"}
<form method="POST" action="index.php?screen=fluela_special&action=creater" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Sate parasite #{$id} Editare</th>
		  </tr>
			<tr>
				<td colspan="2"><b>ID:</b> #{$id}<br />
				<b>Coordonate:</b> {$xy}<br /><b>Puncte:</b> {$points}</td>
			</tr>
						<tr><td>
			<table class="vis">
				<tr>
				<td>
				<table class="vis">
					<tr>
					<th>Cladiri</th>
					<th>Nivel</th>
					</tr>
					{foreach from=$buildings item=arr key=dbname}
						<tr>
							<td><img src="../graphic/buildings/{$dbname}.png"> {$arr.name}:</td>
							<td><input type="text" size="4" name="{$dbname}" value="{$arr.std_lvl}"></td>
						</tr>
					{/foreach}
				</table>
			</table>
			</td></tr>
			<tr>
				<td colspan="2"><input type="hidden" name="vid" value="{$id}" /><input type="hidden" name="welche_akt" value="Bearbeiten" /><input type="submit" name="submit" value="Creaza" onload="this.disabled=false;"></td>
			</tr>

		</table>
	</form>
	<script type="text/javascript" src="templates/fluela_special.js"></script>
	<script type="text/javascript">{$dowhattodo}</script>
{/if}
{/if}
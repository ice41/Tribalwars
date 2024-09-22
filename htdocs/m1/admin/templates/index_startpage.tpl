<h2>Pagina de start </h2>

{if !empty($error)}
	<font class="error">{$error|replace:"Kein Text eingetragen.":"Trebuie sa contina un text."|replace:"Keine Grafik ausgewählt.":"Trebuie sa aibe si o poza."}</font><br /><br />
{/if}

<form method="POST" action="index.php?screen=startpage&action=add" onSubmit="this.submit.disabled=true;">
	<table class="vis" width="450">
		<tr>
			<th colspan="2">Adauga anunt pe prima pagina</th>
		</tr>
		<tr>
			<td width="50">Text:</td>
			<td><textarea cols="45" rows="3" name="text"></textarea></td>
		</tr>
		<tr>
			<td>Link:</td>
			<td><input type="text" name="link" size="70"></td>
		</tr>
		<tr>
			<td>Poza:</td>
			<td>
				<table cellspacing="0">
					<tr>
						<td>
							<input type="radio" name="graphic" value="global">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/global.png">
						</td>
						
						<td width="20">
							<input type="radio" name="graphic" value="sds">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/sds.png">
						</td>
					
						<td width="20">
							<input type="radio" name="graphic" value="usds">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/usds.png">
						</td>
						
						<td width="20">
							<input type="radio" name="graphic" value="w1">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/w1.png">
						</td>
						
						<td width="20">
							<input type="radio" name="graphic" value="m1">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/m1.png">
						</td>
					</tr>
				</table>
			</td>	
		</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" name="submit" value="Adauga"></td>
		</tr>
	</table>
</form>
<table class="vis" width="450">
	<tr>
		<th colspan="3">Anunturi introduse pe prima pagina</th>
	</tr>
	{foreach from=$announcement item=item key=f_id}
		<tr>
			<td width="8%"><img src="../graphic/minibutton/{$announcement.$f_id.graphic}.png"></td>
			<td width="70%">
{$announcement.$f_id.text}<br />
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						{if !empty($announcement.$f_id.link)}
							<td align="left" style="font-size: xx-small;"><a href="{$announcement.$f_id.link}">&raquo; mai multe detalii</a></td>
						{/if}
						<td align="right" style="font-size: xx-small;">{$announcement.$f_id.time|replace:"heute um":"astazi la"|replace:"Uhr":""|replace:"am":"pe"|replace:" um":".2010 la ora"}</td>
					</tr>
				</table>
			</td>
		  <td width="22%"><a href="index.php?screen=startpage&action=drop&id={$announcement.$f_id.id}">Sterge anuntu</td>
  </tr>
	{/foreach}
</table>
<br /><br />

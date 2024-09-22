{if $pok_pos}
	<h2>Opracuj temat</h2>

	<form action="{$base_link}&sm=edit_thread&aktu_fid={$aktu_fid}&aktu_tid={$aktu_tid}&action=edit&h={$hkey}" method="post" name="new_thread">
	
		<table class="vis" id="formTable">
			<tbody>
				<tr>
					<td>Assunto:</td>
					<td>
						<input name="subject" size="64" value="{$tname}" tabindex="1" type="text">
					</td>
				</tr>
				<tr>
					<td>Opcje:</td>
					<td>
						<label>
							<input name="important" tabindex="2" {if $important}checked="checked"{/if} type="checkbox">
							Wa¿ne
						</label>
					</td>
				</tr>
			</tbody>
		</table>
    	<input value="Wyœlij" name="send" type="submit">
	</form>
{else}
	<span class="error" style="font-size: 18px;">Temat nie istnieje</span>
{/if}
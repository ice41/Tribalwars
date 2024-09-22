<form action="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;action=del_arch&amp;h={$hkey}" method="post">
	<table class="vis" width="100%">
		{if $num_pages>1}
			<tr>
				<td align="center" colspan="2">
					{section name=countpage start=1 loop=$num_pages+1 step=1}
						{if $site==$smarty.section.countpage.index}
							<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
						{else}
							<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
						{/if}
					{/section}
				</td>
			</tr>
		{/if}
		<tr>
			<th>Temat</th>
			<th width="140">Recebido</th>
		</tr>
		{if count($reports)>0}
			{foreach from=$reports key=key item=array}
				{$ida}
				<tr>
					<td><input name="id_{$reports.$key.id}" type="checkbox" /> <a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;view={$reports.$key.id}">{if $reports.$key.surowce && !empty($reports.$key.img)}<img src="../ds_graphic/max_loot/1.png" width="15" />{elseif !$reports.$key.surowce && !empty($reports.$key.img)}<img src="../ds_graphic/max_loot/0.png" width="15" />{/if}
					{$pl->compile_report_title($reports.$key.title)}</a> {if $reports.$key.is_new=="1"}(nowy){/if}</td>
					<td>{$reports.$key.date}</td>
				</tr>
			{/foreach}
			<tr>
				<th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> marcar todos </th>
				<th></th>
			</tr>
			</table>

			<table class="vis" align="left">
			<tr>
				<td><input type="submit" value="Excluir" name="del" /></td>
			</tr>
		{/if}
	</table>
</form>
<h3>Tabela punkt�w</h3>

<p>Punkty otrzymasz za rozbudowywanie budynk�w. Je�eli budowa jakiego� budynku zosta�a uko�czona, punkty i miejsce w rankingu zostan� na nowo wyliczone (mo�e doj�� do op�nie�, aby odci��y� serwer). Za badania lub jednostki nie ma przyznawanych punkt�w.

</p><p><b>R�nice punkt�w mi�dzy poziomami</b>
</p>

<table class="vis">
	<tr>
		<th>Poziom</th>
		{foreach from=$builds item=f_dbname key=f_id}
			<th><img src="/ds_graphic/buildings/{$f_dbname}.png"></th>
		{/foreach}
	</tr>
		{section name=foo start=1 loop=$max_stage+1 step=1}
			<tr>
				<td>{$smarty.section.foo.index}</td>
				{foreach from=$builds item=f_dbname key=f_id}
					{if $cl_builds->get_maxstage($f_dbname)<$smarty.section.foo.index}
						<td></td>
					{else}
						<td>{$cl_builds->get_points($f_dbname,$smarty.section.foo.index)}</td>
					{/if}
				{/foreach}
			</tr>
		{/section}
</table>

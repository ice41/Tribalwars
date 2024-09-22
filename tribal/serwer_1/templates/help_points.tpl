<h3>Tabela punktów</h3>

<p>Punkty otrzymasz za rozbudowywanie budynków. Je¿eli budowa jakiegoœ budynku zosta³a ukoñczona, punkty i miejsce w rankingu zostan¹ na nowo wyliczone (mo¿e dojœæ do opóŸnieñ, aby odci¹¿yæ serwer). Za badania lub jednostki nie ma przyznawanych punktów.

</p><p><b>Ró¿nice punktów miêdzy poziomami</b>
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

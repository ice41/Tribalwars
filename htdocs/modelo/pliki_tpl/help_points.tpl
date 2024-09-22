<h3>Tabela de pontuação</h3>

<p>Ganha pontos por atualizar edifícios. Se uma construção for concluída, os pontos e a classificação serão recalculados (pode haver um atraso para tirar a carga do servidor). Nenhum ponto é concedido para pesquisas ou unidades.

</p><p><b>Diferenças de pontos entre os níveis</b>
</p>

<table class="vis">
	<tr>
		<th>Nível</th>
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

<h3>Punkte</h3>
<p>Punkte erhältst du für die Fertigstellung von Gebäuden. Sobald das Gebäude fertig ist, werden die Punkte und dein Ranglistenplatz neu berechnet (teilweise werden diese Berechnungen verzögert, um den Server zu entlasten). Für Forschung oder Einheiten gibt es keine Punkte.</p>

<p>Es werden die Gesamtpunkte für die Ausbaustufen angezeigt.</p>

<table class="vis">
	<tr>
		<th>Stufe</th>
		{foreach from=$builds item=f_dbname key=f_id}
			<th><img src="graphic/buildings/{$f_dbname}.png"></th>
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

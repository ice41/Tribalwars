


<div id="show_logins" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_logins', this );" src="graphic/minus.png">		Raporty na serwerze 
	</h4>
	<div class="widget_content" style="">
	<table class="vis">
		<tr>
			<th>ID</th><th>Título</th>
<th>Jednostki</th><th>Data</th>		</tr>
		{foreach from=$raporty item=rp}
<tr><td>{$rp.id}</td><td><img src="{$rp.title_image}" alt="">{$pl->compile_report_title($rp.title)}</td><td>{if $rp.a_units <= 0}{$rp.a_units}{else}To nie atak{/if}</td><td>{$rp.time}</td>

{/foreach}			</table>

</div>
</div> 
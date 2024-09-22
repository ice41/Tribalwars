<table width="450">
<tr><td>
<table class="vis">
	<tr>
		<th width="140">Subiect</th>
		<th width="400">{$report.title}</th>
	</tr>
	<tr>
		<td>Trimis</td>
		<td>{$report.date}</td>
	</tr>
	<tr>
		<td colspan="2" valign="top" height="160" style="border: solid 1px black; padding: 4px;">
			{assign var='reporttype' value=$report.type}
			{include file="game_report_view_$reporttype.tpl"}
</td></tr>

<table align="center" class="vis" width="100%"><tr>
<td align="center" width="20%"><a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;action=del_one&amp;id={$report.id}&amp;h={$hkey}">Sterge</a></td>

</tr></table>
</td></tr>
</table>
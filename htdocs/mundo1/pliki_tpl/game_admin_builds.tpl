<div id="show_logins" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_logins', this );" src="graphic/minus.png">		{$lang.admin.build.title}
	</h4>
	<div class="widget_content" style=""><form method="post" action="game.php?village={$village.id}&screen=admin&mode=builds&action=edit">
	<table class="vis">
		<tr>
			<th>{$lang.admin.build.build}</th><th>{$lang.admin.build.level}</th>
		</tr>
		{foreach from=$buildings item=arr key=dbname}
			<tr>
				<td><img src="/ds_graphic/buildings/{$dbname}.png"> {$arr.name}:</td>
				<td><input type="text" size="10" name="{$dbname}" value="{$arr.stage}"></td>
			</tr>
		{/foreach}
		<tr>
			<td colspan="2" align="center"><input type="submit" value="{$lang.admin.build.go}" class="btn btn-success btn-small"></td>
		</tr>
	</table>
</form>
</div>
</div> 
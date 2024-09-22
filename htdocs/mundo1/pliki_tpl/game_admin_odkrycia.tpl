

<div id="show_reffurge" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_reffurge', this );" src="graphic/minus.png">		{$lang.admin.sec.title}
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<form method="post" action="game.php?village={$village.id}&screen=admin&mode=odkrycia&action=dodaj" onSubmit="this.submit.disabled=true;"><tbody>    <tr>
				<td width="350">{$lang.admin.sec.id} {$villages})</td>
				<td><input type="text" name="wioska" value="{$village.id}"></td>
			</tr>

<tr><td>{$lang.admin.sec.typ}:<td>
<label><input type="radio" checked="checked" name="typ" value="1" />{$lang.admin.sec.1}</label><br />
<label><input type="radio" name="typ" value="2" />{$lang.admin.sec.2}</label><br />
<label><input type="radio" name="typ" value="3" />{$lang.admin.sec.3}</label><br />
<label><input type="radio" name="typ" value="4" />{$lang.admin.sec.4}<br />
<label><input type="radio" name="typ" value="5" />{$lang.admin.sec.5}</label><br />
<label><input type="radio" name="typ" value="6" />{$lang.admin.sec.6}</label><br />
<label><input type="radio" name="typ" value="7" />{$lang.admin.sec.7}</label><br />
<label><input type="radio" name="typ" value="8" />{$lang.admin.sec.8}<br />
<label><input type="radio" name="typ" value="9" />{$lang.admin.sec.9}</label><br />
<label><input type="radio" name="typ" value="10" />{$lang.admin.sec.10}</label><br />
<label><input type="radio" name="typ" value="11" />{$lang.admin.sec.11}</label><br />
<label><input type="radio" name="typ" value="12" />{$lang.admin.sec.12}</td></tr>





<tr>			<tr>
				<td colspan="2"><center><input type="submit" name="submit" value="{$lang.admin.sec.add}" onload="this.disabled=false;" class="btn btn-success btn-small"></td>
			</tr>
</form>
	</tbody></table>
</div>
</div> 
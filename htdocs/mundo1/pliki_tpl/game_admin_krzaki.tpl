<h3>{$lang.admin.krzaki.title}</h3>{if !empty($error)}	<font class="error">{$error}</font><br />{/if}

<div id="show_logins" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_logins', this );" src="graphic/minus.png">		{$lang.admin.krzaki.title2}
	</h4>
	<div class="widget_content" style=""><form action="game.php?village={$village.id}&screen=admin&mode=krzaki&akcja=dodaj_krzaki" method="POST">	<table class="vis" width="350">		<tr>			<th colspan="2">{$lang.admin.krzaki.title2}</th>		</tr>		<tr>			<td>{$lang.admin.krzaki.number}<small> (max. 100.000)</small>:</td>			<td><input name="ile" type="text" value="100000"/></td>		</tr>		<tr>			<td>{$lang.admin.krzaki.type}:</td>			<td><input name="typ" type="text"/></td>		</tr>		<tr>			<td colspan="2">				<input name="sub" type="submit" value="{$lang.admin.krzaki.add}" class="btn btn-success btn-small"/>			</td>			

	
</table></form>

<table class="vis">	<tr>		<th>ID</th>		<th>Mapa</th>	</tr>	{foreach from=$krzaki key=id item=krzak}		<tr>			<td>				{$id}			</td>			<td>				{foreach from=$krzak key=key item=info}					{if $key == 0}						{foreach from=$info item=wyglad_x}							<table cellspacing="0" cellpadding="0">								<tr>									{foreach from=$wyglad_x item=wyglad_y} 										<td>											<img src="/ds_graphic/map/{$wyglad_y}"/>										</td>									{/foreach}								</tr>							</table>						{/foreach}					{/if}				{/foreach}			</td>		</tr>	{/foreach}	<br /><br /></table>
			
</div>
</div> 
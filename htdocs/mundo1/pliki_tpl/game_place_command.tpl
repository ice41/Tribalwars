<script src="/js/popup.js" type="text/javascript"/></script>

{if !empty($error)}
	<div style="color:red; font-size:large">{$error}</div>
{/if}

<h3>Dê a ordem</h3>

<form name="kingsage" action="game.php?village={$village.id}&amp;screen=place&amp;try=confirm" method="post">
	<table>
		<tr>
			{assign var=counter value=0}
			{foreach from=$group_units key=group_name item=value}
				<td width="150" valign="top">
					<table class="vis" width="100%">
						{foreach from=$group_units.$group_name item=dbname}
							{* Counter um 1 erh�hren f�r den Tab f�r die Input Felder *}
							{math assign=counter equation="x + y" x=$counter y=1}
							<tr>
								<td>
									<a href="javascript:popup_scroll('popup_unit.php?unit={$dbname}', 520, 520)"><img src="/ds_graphic/unit/{$dbname}.png" title="{$cl_units->get_name($dbname)}" alt="" /></a> <input name="{$dbname}" type="text" size="5" max_value="{$units.$dbname}" tabindex="{$counter}" value="{$values.$dbname}" /> <a href="javascript:insertUnit(document.forms[0].{$dbname}, {$units.$dbname})">({$units.$dbname})</a>
								</td>
							</tr>
						{/foreach}
					</table>
				</td>
			{/foreach}
		</tr>
	</table>
	<span style="font-weight:bold; color: #804000; cursor: pointer; class="click" onclick="selectCoiningNoneMax('Todas as tropas', 'Desmarcar tudo');return false;">
		<span id="select_all_1" class="link">
			Todas as tropas
		</span>
	</span>
	

	<div id="inline_popup" style="display: none; position: absolute; clear: both;">
		<table collspacing="0" collpadding="0" class="{if $graphic == '1'}content-border{else}main{/if}">
			<tr>
				<th>
					<div id="inline_popup_menu" style="text-align: right;">
						<a href="javascript:inlinePopupClose()">fechar</a>
					</div>
				</th>
			</tr>
			<tr>
				<td>
					<h3>Metas</h3>
					<div>

						<div id="inline_popup_content" style="height: 340px; overflow: auto;">
							<img src="/ds_graphic/throbber.gif" alt="Carregando" />
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	
	<table>
		<tr>
			<td rowspan="2">
				x: <input type="text" name="x" value="{$values.x}" id="x" size="5" />
				y: <input type="text" name="y" value="{$values.y}" id="y" size="5" />
			</td>
			<td valign="top">
				<a href="#" onclick="return inlinePopup(event, 'bookmark', 'ulubione.php', popup_options)">Favoritos</a><br>
				<a href="#" {if $user.villages > 1}onclick="return inlinePopup(event, 'bookmark', 'villages.php', popup_options)"{else}title="Deve possuir 2 aldeias"{/if}>Próprias</a><br>
			</td>
			<td valign="top">
				<a href="#" onclick="return inlinePopup(event, 'bookmark', 'history.php', popup_options)">Histórico</a><br>
				<a href="#" onclick="insertNumId('x',{$last_command.x});insertNumId('y',{$last_command.y});">Anterior</a><br>
			</td>
			<td rowspan="2"><input class="attack" name="attack" type="submit" value="Ataque" style="font-size: 10pt;" /></td>
			<td rowspan="2"><input class="support" name="support" type="submit" value="Apoio" style="font-size: 10pt;" /></td>
		</tr>
	</table>
</form>

{literal}
<script type="text/javascript">
//<![CDATA[
	setImageTitles();

	var popup_options = {};
	
	$(document).ready(function(){
		UI.Draggable($('#inline_popup'));
	});
//]]>
</script>
{/literal}

<h3>Movimentos de Tropas</h3>
{* Eigene losgeschickte Angriffe *}
{if count($my_movements)>0}
<table class="vis">
	<tr>
		<th width="250">Próprias ordens ({$pl->count($my_movements)})</th>
		<th width="160">Duração</th>
		<th width="80">Chegada</th>
	</tr>
	{foreach from=$my_movements item=array}
	    <tr>
	        <td>
	            <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own">
	            <img src="/ds_graphic/command/{$array.type}.png"> {$array.message}
	            </a>
	        </td>
	        <td>{$array.end_time}</td>
	        {if $array.arrival_in<0}
	        	<td>{$array.arrival_in|format_time}</td>
	        {else}
	        	<td><span class="timer">{$array.arrival_in|format_time}</span></td>
	        {/if}
	        {if $array.can_cancel}
	        	<td><a href="game.php?village={$village.id}&amp;screen=place&amp;action=cancel&amp;id={$array.id}&amp;h={$hkey}">cancelar</a></td>
	        {/if}
	    </tr>
	{/foreach}
</table>
<br>
{/if}


{* Andere Angriffe auf das aktuelle Dorf *}
{if count($other_movements)>0}
<table class="vis">
	<tr>
		<th width="250">O próximo exército ({$pl->count($other_movements)})</th>
		<th width="160">Duração</th>
		<th width="80">Chegada</th>
	</tr>
	{foreach from=$other_movements item=array}
	    <tr>
	        <td>
	            <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other">
	            <img src="/ds_graphic/command/{$array.type}.png"> {$array.message}
	            </a>
	        </td>
	        <td>{$array.end_time}</td>
	        {if $array.arrival_in<0}
	        	<td>{$array.arrival_in|format_time}</td>
	        {else}
	        	<td><span class="timer">{$array.arrival_in|format_time}</span></td>
	        {/if}
	    </tr>
	{/foreach}
</table>
{/if}
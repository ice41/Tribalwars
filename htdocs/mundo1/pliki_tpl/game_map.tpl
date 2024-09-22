
	                                <script type="text/javascript">
//<![CDATA[

	/** General purpose map script variables **/

	KAMap.premium = true;
	KAMap.mobile = false;
	KAMap.morale = false;
	KAMap.night = false;
	KAMap.light = true;
	//Needed to display day borders if user activated classic graphics
	KAMap.classic_gfx = true;

	KAMap.scrollBound = [0, 0, 999, 999];
	KAMap.tileSize = [53, 38];

	KAMap.screenKey = '{$hkey}';
	KAMap.topoKey = 667615385;
	KAMap.con.CON_COUNT = 10;
	KAMap.con.SEC_COUNT = 20;
	KAMap.con.SUB_COUNT = 5;

	KAMap.image_base = '../ds_graphic/';
	KAMap.graphics = '../ds_graphic/map/';

			KAMap.currentVillage = {$village.id};
		KAMap.cachePopupContents = false;


	/** Context menu **/
{literal}
	KAMap.urls.ctx = {};
	{/literal}
	KAMap.urls.ctx.mp_overview = 'game.php?village=__village__&screen=overview';
	KAMap.urls.ctx.mp_info = 'game.php?village={$village.id}&id=__village__&screen=info_village';
	KAMap.urls.ctx.mp_fav = 'game.php?village={$village.id}&id=__village__&ajaxaction=add_target&h=cec0&json=1&screen=info_village';
	KAMap.urls.ctx.mp_unfav = 'game.php?village={$village.id}&id=__village__&ajaxaction=del_target&h=cec0&json=1&screen=info_village';
	KAMap.urls.ctx.mp_lock = 'game.php?village={$village.id}&id=__village__&ajaxaction=toggle_reserve_village&h=cec0&json=1&screen=info_village';
	KAMap.urls.ctx.mp_res = 'game.php?village={$village.id}&mode=send&target=__village__&screen=market';
	KAMap.urls.ctx.mp_att = 'game.php?village={$village.id}&target=__village__&screen=place';
	KAMap.urls.ctx.mp_recruit = 'game.php?village=__village__&screen=train';
	KAMap.urls.ctx.mp_Perfile = 'game.php?village={$village.id}&id=__owner__&screen=info_player';
	KAMap.urls.ctx.mp_msg = 'game.php?village={$village.id}&mode=new&player=__owner__&screen=mail';
	KAMap.urls.ctx.mp_unlock = KAMap.urls.ctx.mp_lock;
	KAMap.urls.ctx.mp_invite = 'game.php?village={$village.id}&mode=ref&screen=settings';
	KAMap.urls.ctx.mp_invite_hide = 'game.php?village={$village.id}&ajaxaction=map_hide_invitation&h=cfa8&json=1&screen=settings';

	
		KAMap.ghost = false;
	
	KAMap.context.enabled = true;
	
	KAMap.centerList.enabled = false;

	/** Other URLs **/
    
	KAMap.urls.villageInfo = 'game.php?village={$village.id}&id=__village__&screen=info_village';
	KAMap.urls.villagePopup = 'game.php?village=__village__&ajax=map_info&source={$village.id}&screen=overview';
	KAMap.urls.sizeSave = 'game.php?village={$village.id}&ajaxaction=set_map_size&h=cfa8&screen=settings';
	KAMap.urls.changeShowBelief = 'game.php?village={$village.id}&ajaxaction=change_topo_show_belief&h=cfa8&screen=settings';
	KAMap.urls.changeShowPolitical = 'game.php?village={$village.id}&ajaxaction=change_topo_show_political&h=cfa8&screen=settings';
	KAMap.urls.changeUseContext = 'game.php?village={$village.id}&ajaxaction=change_use_contextmenu&h=cfa8&screen=settings';
	KAMap.urls.savePopup = '';
	KAMap.urls.centerCoords = 'game.php?village={$village.id}&mode=centerlist&screen=map'
	KAMap.urls.centerSave = 'game.php?village={$village.id}&mode=centerlist&ajaxaction=save_center&h={$hkey}&screen=map';
    {literal}
	/** Attacked villages **/
	
	/** Village colors **/

			KAMap.colors['this'] = [255, 255, 255];
			KAMap.colors['player'] = [240, 200, 0];
			KAMap.colors['ally'] = [0, 0, 244];
			KAMap.colors['partner'] = [0, 160, 244];
			KAMap.colors['nap'] = [128, 0, 128];
			KAMap.colors['enemy'] = [244, 0, 0];
			KAMap.colors['other'] = [130, 60, 10];
			KAMap.colors['sleep'] = [0, 0, 0];
			KAMap.colors['grey'] = [150, 150, 150];
	
	KAMap.secrets = {
		};

	/** Some sector fun **/
	KAMap.sectorPrefech = [];


//]]>
</script>
 {/literal}




<script type="text/javascript">
function KAMap (image_url, snob_max_distance) {ldelim}
    this.options = {ldelim}
        units: new Array (
			{foreach from=$cl_units->get_array("dbname") item=dbname}
				'{$dbname}',
			{/foreach}
            'donkey'
			)
		{rdelim}
        
    this.options.image_url = image_url;
    this.options.snob_max_distance = snob_max_distance;
	{rdelim}
</script>
<script src="/js/map.js" type="text/javascript"></script>
<script type="text/javascript">
lang = new Array();
</script>

<h2>Continente <span id="continent_id">{$mapa.kontynent}</span></h2>

<table class="padding2">
	<tr>
	<td  id="map_big" class="map_big visible" valign="top">
			<div id="worldmap" class="popup_style" style="">
	<form name="worldmap" action="" method="post">
		<!--  WORLDMAP HEAD -->
		<div id="worldmap_header">
			<div class="close popup_menu">
				<a href="javascript:void(0);" onclick="Worldmap.toggle(); return false;">fechar</a>
			</div>

		
		</div>

	


		<script type="text/javascript">
		//<![CDATA[
				//]]>
		</script>
		

		

					</div>

		<div id="worldmap_footer">

		</div>
	</form>
</div>

<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() {ldelim}
		Worldmap.init(0);
	});
//]]>
</script>	
	
	
	
	
	
		<td valign="top">
			<table class="map_container padding2">
				<tr>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x-$mapa.polowa}&amp;y={$mapa.y-$mapa.polowa}"><img src="/ds_graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x}&amp;y={$mapa.y-$mapa.polowa}"><img src="/ds_graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x+$mapa.polowa}&amp;y={$mapa.y-$mapa.polowa}"><img src="/ds_graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x-$mapa.polowa}&amp;y={$mapa.y}"><img src="/ds_graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
					<td>
							<img src="https://www.tribalwars.net/graphic/fullscreen.png?cbd22" id="fullscreen" onclick="KAMap.goFullscreen()" alt="" />
							<a class="mp" id="mp_res" title="Enviar recursos" href="game.php?screen=map"></a>
							<a class="mp" id="mp_att" title="Enviar tropas" href="game.php?screen=map"></a>
							<a class="mp" id="mp_lock" title="Reservar a aldeia" href="game.php?screen=map"></a>
							<a class="mp" id="mp_unlock" title="Excluir a reserva" href="game.php?screen=map"></a>
							<a class="mp" id="mp_fav" title="Adicionar aos favoritos" href="game.php?screen=map"></a>
							<a class="mp" id="mp_unfav" title="Remover dos favoritos" href="game.php?screen=map"></a>
							<a class="mp" id="mp_msg" title="Escrever uma mensagem" href="game.php?screen=map"></a>
							<a class="mp" id="mp_Perfile" title="Mostrar perfil do jogador" href="game.php?screen=map"></a>
							<a class="mp" id="mp_overview" title="Visão geral da aldeia" href="game.php?screen=map"></a>
							<a class="mp" id="mp_recruit" title="Recrutamento" href="game.php?screen=map"></a>
							<a class="mp" id="mp_tab" title="Mostrar em nova aba" href="game.php?screen=map"></a>
							<a class="mp" id="mp_info" title="Informação da aldeia" href="game.php?screen=map"></a>
														<a class="mp" id="mp_invite" title="Convidar o jogador" href="/game.php?screen=map"></a>
							<a class="mp" id="mp_invite_hide" title="Ocultar dica de convite" href="/game.php?screen=map"></a>
					<table style="border: 1px solid rgb(248, 237, 206); background-color: rgb(248, 237, 206); border-spacing: 0px; vertical-align:middle;padding: 0px 0px;" cellpadding="0" cellspacing="0">
							{foreach from=$y_coords item=y}
								<tr>
									<td width="20">{$y}</td>
									{foreach from=$x_coords item=x}
										{php}$this->_tpl_vars['impl_coord'] = $this->_tpl_vars['x'].'|'.$this->_tpl_vars['y']{/php}
										{if !$kl_mapa->is_osada($impl_coord)}
											{if $kl_mapa->is_krzak($impl_coord)}
												<td id="tile_{$x}_{$y}" style="{$kl_mapa->get_style($x,$y)}"><img src="/ds_graphic/{$map}/{$kl_mapa->get_krzak_typ($impl_coord)}" alt="" /></td>
											{else}
												{if $kl_mapa->is_trawa($impl_coord)}
													<td id="tile_{$x}_{$y}" style="{$kl_mapa->get_style($x,$y)}"><img src="/ds_graphic/{$map}/{$kl_mapa->get_trawa_typ($impl_coord)}" alt="" /></td>
												{else}
													<td id="tile_{$x}_{$y}" style="{$kl_mapa->get_style($x,$y)}"><img src="/ds_graphic/{$map}/gras1.png" alt="" /></td>
												{/if}
											{/if}
										{else}
											<td id="tile_{$x}_{$y}" style="{$kl_mapa->get_color($impl_coord,$village.id,$user.id,$user.ally)}{$kl_mapa->get_style($x,$y)}">
												<div style="width: 53px; height: 38px;"/>
													<a id="map" href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$kl_mapa->get_vid($impl_coord)}">

													<img src="/ds_graphic/{$map}/{$kl_mapa->grafika_osady($impl_coord)}" 
														onmouseover = "Tip(kaMap.tooltipDetails('{$kl_mapa->get_vid($impl_coord)}', '{$kl_mapa->get_osada_name($impl_coord)} ({$x}|{$y}) K{$kl_mapa->get_continent($impl_coord)}', {$kl_mapa->get_points($impl_coord)}, {$kl_mapa->get_player_info($impl_coord)}, {$kl_mapa->get_ally_info($impl_coord)}, '{if $map_settings.map_show_moral}{$kl_mapa->get_morals($impl_coord,$user.points,$user.id)}{/if}', '{$kl_mapa->get_group($impl_coord,$user.id)}', '{$village.x}.{$village.y}.{$x}.{$y}', '{if $map_settings.map_show_ressis}{$kl_mapa->get_res($impl_coord,$user.id)}{/if}', '{if $map_settings.map_show_workers}{$kl_mapa->get_bh($impl_coord,$user.id)}{/if}', '{if $map_settings.map_show_traders}{$kl_mapa->get_traders($impl_coord,$user.id)}{/if}','{if $map_settings.map_show_trocusto}{$kl_mapa->get_units($impl_coord,$user.id)}{/if}', {$kl_mapa->is_noob_protection($impl_coord)}, false, '{$kl_mapa->get_bonus_text($impl_coord)}', '{$kl_mapa->get_bonus_image($impl_coord)}'), PADDING, 0, FADEOUT, 125, FADEIN, 150)"
														onmouseout="UnTip()" onclick = "Tip(kaMap.tooltipDetails('{$kl_mapa->get_vid($impl_coord)}', '{$kl_mapa->get_osada_name($impl_coord)} ({$x}|{$y}) K{$kl_mapa->get_continent($impl_coord)}', {$kl_mapa->get_points($impl_coord)}, {$kl_mapa->get_player_info($impl_coord)}, {$kl_mapa->get_ally_info($impl_coord)}, '{if $map_settings.map_show_moral}{$kl_mapa->get_morals($impl_coord,$user.points,$user.id)}{/if}', '{$kl_mapa->get_group($impl_coord,$user.id)}', '{$village.x}.{$village.y}.{$x}.{$y}', '{if $map_settings.map_show_ressis}{$kl_mapa->get_res($impl_coord,$user.id)}{/if}', '{if $map_settings.map_show_workers}{$kl_mapa->get_bh($impl_coord,$user.id)}{/if}', '{if $map_settings.map_show_traders}{$kl_mapa->get_traders($impl_coord,$user.id)}{/if}','{if $map_settings.map_show_trocusto}{$kl_mapa->get_units($impl_coord,$user.id)}{/if}', {$kl_mapa->is_noob_protection($impl_coord)}, false, '{$kl_mapa->get_bonus_text($impl_coord)}', '{$kl_mapa->get_bonus_image($impl_coord)}'), PADDING, 0, FADEOUT, 125, FADEIN, 150)"
														onmclick="UnTip()" alt="" />
														
														{$kl_mapa->status_osady($impl_coord,$user.id,$user.ally)}
														
													</a>
													</div>
											</td>
										{/if}
									{/foreach}
								</tr>
							{/foreach}
			
							<tr>
								<td height="20"></td>
								{foreach from=$x_coords item=x}
									<td>{$x}</td>
								{/foreach}
							</tr>
						</table>
					</td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x+$mapa.polowa}&amp;y={$mapa.y}"><img src="/ds_graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x-$mapa.polowa}&amp;y={$mapa.y+$mapa.polowa}"><img src="/ds_graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x}&amp;y={$mapa.y+$mapa.polowa}"><img src="/ds_graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x+$mapa.polowa}&amp;y={$mapa.y+$mapa.polowa}"><img src="/ds_graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
				</tr>
			</table>

			<BR>

<table style="border: 1px solid rgb(140, 95, 13); background-color: rgb(244, 228, 188); margin-left: 0px; border-collapse: separate; text-align: left;" class="padding2">
<tbody><tr class="nowrap">
<td class="small" valign="top">Padrão:</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(255, 255, 255);"></td><td class="small" style="white-space: normal;">Escolhido</td>

<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(240, 200, 0);"></td><td class="small" style="white-space: normal;">Próprias aldeias </td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(0, 0, 244);"></td><td class="small" style="white-space: normal;">Minha própria tribo</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(150, 150, 150);"></td><td class="small" style="white-space: normal;">Aldeia Abandonada</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(130, 60, 10);"></td><td class="small" style="white-space: normal;">Outro</td>
</tr>

<tr class="nowrap">
<td class="small" valign="top">Tribo:</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(0, 160, 244);"></td><td class="small" style="white-space: normal;">Aliados</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(128, 0, 128);"></td><td class="small" style="white-space: normal;">Pactos de não agressão</td>

<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(244, 0, 0);"></td><td class="small" style="white-space: normal;">Inimigos</td>
<td></td>
<td></td>
</tr>
{if count($odznaczeni) > 0}
	<tr class="nowrap">
		<td class="small" valign="top" colspan="6">Suas próprias Medalhas:</td>
	</tr>
	{foreach from=$odznaczeni item=odznaczenie}
		<tr class="nowrap">
			<td class="small" valign="top" colspan="6">
				<table>
					<tr>
						<td class="small" valign="top">
							<a href="game.php?village={$village.id}&screen=info_player&id={$odznaczenie.do_gracz_id}"/>
								{$odznaczenie.do_gracz_name}
							</a>
						</td>
						<td class="small" valign="top">
							<div style="background-color: rgb({$odznaczenie.kolor}); background-image: none;">
								 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</td>
						<td class="small" valign="top">
							[<a href="game.php?village={$village.id}&screen=map&akcja=usun_gracza&id={$odznaczenie.id}">
								<img src="/ds_graphic/delete_small.png" alt="&raquo; Excluir" title="&raquo; Excluir"/>
							</a>]
						</td>
					</tr>
				</table>
			</td>
		</tr>
	{/foreach}
{/if}
</tbody></table>
<a href="game.php?village={$village.id}&screen=edytuj_kolory_graczy"/>&raquo; Editar cor de jogadores</a>


		</td>
		<td valign="top" style="padding: 0px 10px;">
			<table class="map_container padding2" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x-50}&amp;y={$mapa.y-50}"><img src="/ds_graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x}&amp;y={$mapa.y-50}"><img src="/ds_graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x+50}&amp;y={$mapa.y-50}"><img src="/ds_graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x-50}&amp;y={$mapa.y}"><img src="/ds_graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
					
					<td>

						<form method="POST" action="game.php?village={$village.id}&screen=map&action=bigMapOnclick&x={$mapa.x}&y={$mapa.y}">
							<input type="hidden" name="imgwidth" value="{$kl_mapa->minimapy_width}"/>
							<input type="hidden" name="imgheight" value="{$kl_mapa->minimapy_height}"/>
							<input type="hidden" name="rozmiar_px_mm" value="{$kl_mapa->minimapy_px}"/>	
							<div style="position:relative; padding:0px">
								<div style="position:absolute;z-index:100">
									<input type="image" name="minimapa" class="noneStyle" src="/ds_graphic/map/empty.png" style="width:251px;height:250px;margin:0px;padding:0px" />
								</div>
								
							<img src="page.php?page=topo_image&player_id={$user.id}&x={$x2}&y={$y2}&village_id={$village.id}">
								
							<div id="bigMapRect" style="z-index:10; position:absolute; top:{$bigMapRectTop}px; left:{$bigMapRectLeft}px; width:{$mwidth}px; height:{$mwidth}px; border: 1px solid rgb(213, 227, 174);"></div>
							</div>
						</form>
	
					</td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x+50}&amp;y={$mapa.y}"><img src="/ds_graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x-50}&amp;y={$mapa.y+50}"><img src="/ds_graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x}&amp;y={$mapa.y+50}"><img src="/ds_graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$mapa.x+50}&amp;y={$mapa.y+50}"><img src="/ds_graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
				</tr>
			</table>
	
			<br>
			
			<table class="vis padding2" width="100%">


<div style="margin-top:10px;margin-bottom:10px;">
							<a href="game.php?screen=map_s&village={$village.id}">(Beta) Mapa movido pelo rato</a><br>
			
			</div>
			<tr>
					<th><b>Centralizar o mapa</b></th>
				</tr>
				<tr>
					<td>
						<form action="game.php?village={$village.id}&amp;screen=map" method="post">
							<table>
								<tr>
									<td>x: <input type="text" name="x" value="{$mapa.x}" size="5" /> y: <input type="text" name="y" value="{$mapa.y}" size="5" /></td>
									<td><input type="submit" value="OK" style="font-size: 10pt;" /></td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>

			<br>

			<table class="vis padding2" width="100%">
				<tr>
					<th><b>Tamanho do mapa:</b></th>
				</tr>
				<tr>
					<td>
						<form action="game.php?village={$village.id}&amp;screen=map&action=zapisz_rozmiar_mapy" method="post">
							<table class="vis" width="100%">
								<tr>
									<td width="50%">
										<center>
											<select name="map_size" style="width: 80%;">
												<option label="7x7" value="7" {if $user.map_size==7}selected="selected"{/if}>7x7</option>
												<option label="9x9" value="9" {if $user.map_size==9}selected="selected"{/if}>9x9</option>
												<option label="11x11" value="11" {if $user.map_size==11}selected="selected"{/if}>11x11</option>
												<option label="13x13" value="13" {if $user.map_size==13}selected="selected"{/if}>13x13</option>
												<option label="15x15" value="15" {if $user.map_size==15}selected="selected"{/if}>15x15</option>
												<option label="19x19" value="19" {if $user.map_size==19}selected="selected"{/if}>19x19</option>
												<option label="23x23" value="23" {if $user.map_size==23}selected="selected"{/if}>23x23</option>
												<option label="31x31" value="31" {if $user.map_size==31}selected="selected"{/if}>31x31</option>
											</select>
										</center>
									</td>
									<td width="50%">
										<center>
											<input type="submit" value="OK" style="font-size: 10pt; width: 80%;"/>
										</center>
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
			
			<br>
			
			<form action="game.php?village={$village.id}&screen=map&action=save_map_options" method="POST">
				<table class="vis padding2" width="100%">
					<tr>
						<th><b>Map Opções pop-up:</b></th>
					</tr>
					{foreach from=$settings_arr key=dbname item=name}
						<tr>
							<td>
								<input name="{$dbname}" type="checkbox" {if $map_settings.$dbname}checked="checked"{/if}>
								&nbsp;{$name}
							</td>
						</tr>
					{/foreach}
					<tr>
						<td>
							<input name="sub" type="submit" value="Salvar"/>
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>

	
	</table>

<script type="text/javascript">
var speed = new Array();

{if $map_settings.map_show_runtimes}	
	{foreach from=$cl_units->get_array("dbname") item=dbname}
		speed['{$dbname}'] = {php}echo ($this->_tpl_vars["config"]["movement_speed"] / $this->_tpl_vars["config"]["speed"]) * $this->_tpl_vars["cl_units"]->get_speed($this->_tpl_vars["dbname"]);{/php};
	{/foreach}
{/if}

{if $map_settings.map_show_mule_runtimes}
	speed['donkey'] = {php}echo ($this->_tpl_vars["config"]["dealer_time"] * 60) / $this->_tpl_vars["config"]["speed"];{/php};
{/if}

lang['POINTS'] = 'Pontos';
lang['OWNER'] = 'Proprietário';
lang['LEFT'] = 'Aldeia Abandonada';
lang['ALLY'] = 'Tribo';
lang['MORAL'] = 'Moral';
lang['GROUPS'] = 'Grupo';
kaMap = new KAMap('/ds_graphic/', {if $config.snob_range != "-1"}{$config.snob_range}{else}5000{/if});
</script>


{literal}
	<script type="text/javascript">
//<![CDATA[

$(document).ready(function() {
	
	
	KAMap.autoPixelSize = $(window).width() - 100;
	KAMap.autoSize = Math.ceil(KAMap.autoPixelSize / KAMap.tileSize[0]);

			KAMap.size = [15, 15];
	
	KAMap.popup.extraInfo = false;
	
	KAMap.church.displayed = false;

	KAMap.init();
	KAMap.focus(500, 500, false);
	
	KAMap.context.init();

	
	
	// Allow resize of map when iPhone/Android phone is flipped.

	if(mobile) {
		var resizeTimer = null;
		var flippingSupported = "onorientationchange" in window,
			flipEvent = flippingSupported ? "orientationchange" : "resize";

		window.addEventListener(flipEvent, function() {
			var autoSelected = (parseInt($('#map_chooser_select').val()) == 0);
			if(autoSelected) {
				if (resizeTimer === null) {
					resizeTimer = setTimeout(function() {
						KAMap.resize(0, false);
						resizeTimer = null;
					}, 500);
				}
			}
		}, false);
	}
	UI.ToolTip($('.tooltip'));
	
});
//]]>
</script>{/literal}
	<input type="hidden" id="newbieProt" value="O alvo ainda tem proteção inicial. Só pode atacar %s."/>
	<input type="hidden" id="barbarianVillage" value="Aldeia bárbara"/>
	<input type="hidden" id="pointFormat" value="%s (%s pontos)"/>
	<input type="hidden" id="villageFormat" value="%name% (%x%|%y%) K%con%"/>
	<input type="hidden" id="villageNotes" value="Notas"/>
	<input type="hidden" id="villageFavoriteAdded" value="A aldeia foi adicionada aos seus favoritos."/>
	<input type="hidden" id="villageFavoriteRemoved" value="A aldeia foi removida dos seus favoritos."/>
	<input type="hidden" id="barbarianVillage" value="Aldeia bárbara"/>
	<input type="hidden" id="changesSaved" value="As alterações foram salvas."/>
	<input type="hidden" id="confirmCenterDelete" value="Tem certeza de que deseja excluir "%name%"?"/>
	<input type="hidden" id="troopsSent" value="As tropas foram enviadas."/>
	
	
	





			
			
<!-- Translations -->
	<input type="hidden" id="newbieProt" value="O alvo ainda tem proteção inicial. Só pode atacar %s."/>
	<input type="hidden" id="barbarianVillage" value="Aldeia bárbara"/>
	<input type="hidden" id="pointFormat" value="%s (%s pontos)"/>
	<input type="hidden" id="villageFormat" value="%name% (%x%|%y%) K%con%"/>
	<input type="hidden" id="villageNotes" value="Notas"/>
	<input type="hidden" id="villageFavoriteAdded" value="A aldeia foi adicionada aos seus favoritos."/>
	<input type="hidden" id="villageFavoriteRemoved" value="A aldeia foi removida dos seus favoritos."/>
	<input type="hidden" id="barbarianVillage" value="Aldeia bárbara"/>
	<input type="hidden" id="changesSaved" value="As alterações foram salvas."/>
	<input type="hidden" id="confirmCenterDelete" value="Tem certeza de que deseja excluir "%name%"?"/>
	<input type="hidden" id="troopsSent" value="As tropas foram enviadas."/>



</body>
</html>			

			
	
	<script type="text/javascript">
//<![CDATA[

$(document).ready(function() {ldelim}
	
		MapCanvas.churchData = [];
	MapCanvas.init();
	
	TWMap.autoPixelSize = $(window).width() - 100;
	TWMap.autoSize = Math.ceil(TWMap.autoPixelSize / TWMap.tileSize[0]);

			TWMap.size = [15, 15];
	
	TWMap.popup.extraInfo = false;
	
	TWMap.church.displayed = false;

	TWMap.init();
	TWMap.focus({$x2}, {$y2}, false);
	
	TWMap.context.init();

	
	
	// Allow resize of map when iPhone/Android phone is flipped.


	}
	UI.ToolTip($('.tooltip'));
	
});
//]]>
</script>
<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-27 00:42:18
         Wersja PHP pliku pliki_tpl/game_map_s.tpl */ ?>
	                               		<h2>Continente <span id="continent_id"></span></h2>

<script type="text/javascript">
//<![CDATA[

	/** General purpose map script variables **/

	TWMap.premium = true;
	TWMap.mobile = false;
	TWMap.morale = true;
	TWMap.night = false;
	TWMap.light = false;
	//Needed to display day borders if user activated classic graphics
	TWMap.classic_gfx = false;

	TWMap.scrollBound = [0, 0, 999, 999];
	TWMap.tileSize = [53, 38];

	TWMap.screenKey = '<?php echo $this->_tpl_vars['hkey']; ?>
';
	TWMap.topoKey = 4182149762;
	TWMap.con.CON_COUNT = 10;
	TWMap.con.SEC_COUNT = 20;
	TWMap.con.SUB_COUNT = 5;

	TWMap.image_base = 'https://www.plemiona.pl/graphic/';
	TWMap.graphics = 'https://www.plemiona.pl/graphic//map/';

			TWMap.currentVillage = <?php echo $this->_tpl_vars['village']['id']; ?>
;
		TWMap.cachePopupContents = true;


	/** Context menu **/

	TWMap.urls.ctx = {};
	TWMap.urls.ctx.mp_overview = 'game.php?village=__village__&screen=overview';
	TWMap.urls.ctx.mp_info = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&screen=info_village';
	TWMap.urls.ctx.mp_fav = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=add_target&h=<?php echo $this->_tpl_vars['hkey']; ?>
&json=1&screen=info_village';
	TWMap.urls.ctx.mp_unfav = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=del_target&h=<?php echo $this->_tpl_vars['hkey']; ?>
&json=1&screen=info_village';
	TWMap.urls.ctx.mp_lock = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajax=rezerwuj&h=<?php echo $this->_tpl_vars['hkey']; ?>
&json=1&screen=info_village';
	TWMap.urls.ctx.mp_res = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=send&target=__village__&screen=market';
	TWMap.urls.ctx.mp_att = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&target=__village__&screen=place';
	TWMap.urls.ctx.mp_recruit = 'game.php?village=__village__&screen=train';
	TWMap.urls.ctx.mp_Perfile = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__owner__&screen=info_player';
	TWMap.urls.ctx.mp_msg = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=new&player=__owner__&screen=mail';
	TWMap.urls.ctx.mp_unlock = TWMap.urls.ctx.mp_lock;
	TWMap.urls.ctx.mp_invite = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=ref&source=map&screen=settings';
	TWMap.urls.ctx.mp_invite_hide = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=map_hide_invitation&h=<?php echo $this->_tpl_vars['hkey']; ?>
&json=1&screen=settings';

	
		TWMap.ghost = false;
	
	TWMap.context.enabled = true;
			TWMap.context._showPremium = true;
	
	TWMap.centerList.enabled = true;

	/** Other URLs **/

	TWMap.urls.villageInfo = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&screen=info_village';
	TWMap.urls.villagePopup = 'game.php?village=__village__&ajax=map_info&source=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview';
	TWMap.urls.sizeSave = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=set_map_size&h=<?php echo $this->_tpl_vars['hkey']; ?>
&screen=settings';
	TWMap.urls.changeShowBelief = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=change_topo_show_belief&h=<?php echo $this->_tpl_vars['hkey']; ?>
&screen=settings';
	TWMap.urls.changeShowPolitical = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=change_topo_show_political&h=<?php echo $this->_tpl_vars['hkey']; ?>
&screen=settings';
	TWMap.urls.changeUseContext = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=change_use_contextmenu&h=<?php echo $this->_tpl_vars['hkey']; ?>
&screen=settings';
	TWMap.urls.savePopup = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajax=save_map_popup&screen=map';
	TWMap.urls.centerCoords = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=centerlist&screen=map'
	TWMap.urls.centerSave = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=centerlist&ajaxaction=save_center&h=b036&screen=map';

	/** Attacked villages **/
	
	/** Village colors **/

			TWMap.colors['this'] = [255, 255, 255];
			TWMap.colors['player'] = [240, 200, 0];
			TWMap.colors['ally'] = [0, 0, 244];
			TWMap.colors['partner'] = [0, 160, 244];
			TWMap.colors['nap'] = [128, 0, 128];
			TWMap.colors['enemy'] = [244, 0, 0];
			TWMap.colors['other'] = [130, 60, 10];
			TWMap.colors['sleep'] = [0, 0, 0];
			TWMap.colors['grey'] = [150, 150, 150];
	
	TWMap.secrets = {
	<?php $_from = $this->_tpl_vars['odk']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['od']):
?><?php echo $this->_tpl_vars['od']['wioska']; ?>
: [<?php echo $this->_tpl_vars['od']['i']; ?>
,<?php echo $this->_tpl_vars['od']['c1']; ?>
,<?php echo $this->_tpl_vars['od']['c2']; ?>
]<?php if (count ( $this->_tpl_vars['odk'] ) != $this->_tpl_vars['od']['counter']): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?> };

	/** Some sector fun **/
	TWMap.sectorPrefech = '';


//]]>
</script>

<table cellspacing="0" cellpadding="0">
    <tr>
	<td  id="map_big" class="map_big visible" valign="top">
			<div id="worldmap" class="popup_style" style="">
	<form name="worldmap" action="" method="post">
		<!--  WORLDMAP HEAD -->
		<div id="worldmap_header">
			<div class="close popup_menu">
				<a href="javascript:void(0);" onclick="Worldmap.toggle(); return false;">Fechar</a>
			</div>

						<fieldset id="worldmap_settings">
				<input type="checkbox" name="worldmap_barbarian_toggle" id="worldmap_barbarian_toggle" checked="checked" onclick="Worldmap.reload();" />
				<label for="worldmap_barbarian_toggle">Barbarzyncy</label>
				<input type="checkbox" name="worldmap_ally_toggle" id="worldmap_ally_toggle" checked="checked" onclick="Worldmap.reload();" />
				<label for="worldmap_ally_toggle">Wlasne plemie</label>
				<input type="checkbox" name="worldmap_partner_toggle" id="worldmap_partner_toggle" checked="checked" onclick="Worldmap.reload();" />
				<label for="worldmap_partner_toggle">Sprzymierzency</label>
				<input type="checkbox" name="worldmap_nap_toggle" id="worldmap_nap_toggle" checked="checked" onclick="Worldmap.reload();" />
				<label for="worldmap_nap_toggle">Pakty o nieagresji</label>
				<input type="checkbox" name="worldmap_enemy_toggle" id="worldmap_enemy_toggle" checked="checked" onclick="Worldmap.reload();" />
				<label for="worldmap_enemy_toggle">Wrogowie</label>

							</fieldset>
			
			<input type="hidden" name="min_x" value="0" />
			<input type="hidden" name="min_y" value="0" />
		</div>

		<img src="https://www.plemiona.pl/graphic/throbber.gif?3286b" id="worldmap-throbber" alt="Loading..." style="display:none" />

		<div id="worldmap_body">
			<div id="worldmap_image">
				<input type="image" src="/graphic/transparent.png" />
			</div>

					</div>

		<div id="worldmap_footer">
			<table style="text-align:left;display:inline;">
				<tr>
					<th>Aldeias</th>
					<th>Bárbaras</th>
					<th>%</th>
					<th>Propria tribo</th>
					<th>%</th>
					<th>Ter</th>
					<th>%</th>
				</tr>
				<tr>
					<td>272787</td>
					<td>39328</td>
					<td>14.42</td>
					<td>207</td>
					<td>0.08</td>
					<td>13</td>
					<td>0</td>
				</tr>
			</table>
		</div>
	</form>
</div>

<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() {
		Worldmap.init(0);
	});
//]]>
</script>		<div class="containerBorder narrow" id="map_whole">
	<table cellspacing="0" cellpadding="0" class="map_container" style="border-spacing: 0">
		<tr>
			<td></td>
			<td align="center" onclick="TWMap.scrollBlock(0, -1); return false;" class="map_navigation">
				<img src="https://www.plemiona.pl/graphic/map/map_n.png?1536a" alt="map/map_n.png" style="z-index:1; position:relative;" />
			</td>
			<td></td>
		</tr>
		<tr>
			<td align="center" onclick="TWMap.scrollBlock(-1, 0); return false;" class="map_navigation">
				<img src="https://www.plemiona.pl/graphic/map/map_w.png?d2d62" alt="map/map_w.png" style="z-index:1; position:relative;" />
			</td>

			<td style="padding: 0">
				<div id="map_wrap" style="position:relative;">
				 	<div id="map_coord_y_wrap" style="height:553px;">
						<div id="map_coord_y" style="position:absolute; left:0px; top:0px; height:38000px; overflow: visible;"></div>					</div>
					<div id="map_coord_x_wrap" style="width:795px; ">
						<div id="map_coord_x" style="position:absolute; left:0px; top:0px; width:53000px; overflow: visible;"></div>					</div>
					<img src="https://www.plemiona.pl/graphic/fullscreen.png" id="fullscreen" onclick="TWMap.goFullscreen()" alt="" />
					<a class="mp" id="mp_res" title="Envie Recursos" href="game.php?screen=map"></a>
					<a class="mp" id="mp_att" title="Envie o tropas" href="game.php?screen=map"></a>
					<a class="mp" id="mp_lock" title="Reserve a aldeia" href="game.php?screen=map"></a>
					<a class="mp" id="mp_unlock" title="Excluir reserva" href="game.php?screen=map"></a>
					<a class="mp" id="mp_fav" title="Adicionar aos favoritos" href="game.php?screen=map"></a>
					<a class="mp" id="mp_unfav" title="Remover dos favoritos" href="game.php?screen=map"></a>
					<a class="mp" id="mp_msg" title="Escreve uma mensagem" href="game.php?screen=map"></a>
					<a class="mp" id="mp_Perfile" title="Profile de jogador" href="game.php?screen=map"></a>
					<a class="mp" id="mp_overview" title="Revisão da aldeia" href="game.php?screen=map"></a>
					<a class="mp" id="mp_recruit" title="Recrutamentar" href="game.php?screen=map"></a>
					<a class="mp" id="mp_tab" title="Mostrar em nova aba" href="game.php?screen=map"></a>
					<a class="mp" id="mp_info" title="Informações da aldeia" href="game.php?screen=map"></a>
										<a class="mp" id="mp_invite" title="Convidar jogador" href="game.php?screen=map"></a>
					<a class="mp" id="mp_invite_hide" title="Ocultar dica de convite" href="game.php?screen=map"></a>

										<a id="map" href="#" style="width:795px; height:570px;overflow:hidden;position:relative;background-image:url('https://www.plemiona.pl/graphic/map/gras4.png?e60df');">
						<div id="map_blend" style="position:absolute; top:0px; left:0px; width:100%; height:100%; background-color:black; z-index: 20; opacity:0;  "></div>
					</a>
									</div>
			</td>

			<td align="center" onclick="TWMap.scrollBlock(1, 0); return false;" class="map_navigation">
				<img src="https://www.plemiona.pl/graphic/map/map_e.png?48510" alt="map/map_e.png" style="z-index:1; position:relative;" />
			</td>
		</tr>


		<tr>
			<td></td>

			<td align="center" onclick="TWMap.scrollBlock(0, 1); return false;" class="map_navigation">
				<img src="https://www.plemiona.pl/graphic/map/map_s.png?d721d" alt="map/map_s.png" style="z-index:1; position:relative;" />
			</td>

			<td></td>
		</tr>
	</table>
	</div>
				<br/>
		<div class="containerBorder" style="float: left; margin-bottom: 15px;">
<table style="border:solid 1px #8c5f0d; background-color: #f4e4bc; margin-left: 0px; border-collapse:separate; text-align:left;">
	<tr class="nowrap">
		<td class="small" valign="top">Padrão:</td>
		<td>
			<div class="map_legend">
				<div style="background-color:rgb(255,255,255)"></div> <span>Escolhido</span>
			</div>
			<div class="map_legend">
				<div style="background-color:rgb(240,200,0)"></div> <span>Próprias aldeias</span>
			</div>
			<div class="map_legend">
				<div style="background-color:rgb(0,0,244)"></div> <span>Própria Tribo</span>
			</div>
			<div class="map_legend" style="clear: both">
				<div style="background-color:rgb(150,150,150)"></div> <span>Bárbara</span>
			</div>
			<div class="map_legend">
				<div style="background-color:rgb(130,60,10)"></div> <span>Outro</span>
			</div>
		</td>
	</tr>
		<tr class="nowrap">
		<td class="small" valign="top">Tribo:</td>
		<td>
			<div class="map_legend">
				<div style="background-color:rgb(0,160,244)"></div> <span>Aliados</span>
			</div>
			<div class="map_legend">
				<div style="background-color:rgb(128,0,128)"></div> <span>Pactos de não agressão</span>
			</div>
			<div class="map_legend">
				<div style="background-color:rgb(244,0,0)"></div> <span>Inimigos</span>
			</div>
		</td>
	</tr>
				<tr class="nowrap">
		<td class="small" valign="top">Ter:</td>
		<td>
					<div class="map_legend" style="clear: both">
				<div style=" background-color:rgb(254, 0, 254)"></div> <span>Atacar</span>
			</div>
					<div class="map_legend" >
				<div style=" background-color:rgb(0, 254, 0)"></div> <span>malina1980</span>
			</div>
				</td>
	</tr>		
	</table>
</div>
<br />

<div style="width:100%; text-align:left; clear:both;">
<a onclick="$('#village_colors').toggle();" href="javascript:void(0);">&raquo; Gerenciar grupos</a>
</div>
<br />
<div id="village_colors" class="containerBorder" style="display:none; float: left; clear:both;">
<table style="background-color: #f4e4bc; border:solid 1px #8c5f0d;">
<tr>
 <td valign="top">
  <h5>Próprias aldeias</h5>
      <br />
  <div id="own_villages" style="border-width:2px; border-style: solid; border-color:#804000; background-color:#DED3B9; position:absolute;
left:700px;
top:200px;
width:290px; z-index:9999; display:none">
	<div id="edit_color_popup_menu" class="popup_menu"><a id="tut_min" href="#" onclick="ColorGrocusto.own_villages_toggle(event);return false;">Zamknac</a></div>
	
	<div style="padding:10px;background-image:url('https://www.plemiona.pl/graphic//background/content.jpg')">
	 <strong>Wybierz grupe</strong><br /><br />
	 <form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;action=add_own_group&amp;h=b036&amp;screen=map">
	 <select name="add_group">
	 	  <option value="1132">Def</option>
	 	  <option value="1131">Off</option>
	 	 </select>
	 <input class="btn" type="submit" value="Adicionar"/>
	 </form>
	</div>
</div>  <a href="#" onclick="ColorGrocusto.own_villages_toggle(event);return false;">&raquo; Adicione seu próprio grupo</a>
   </td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td valign="top">
  <h5>Outras aldeias</h5>
  <form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;type=for&amp;action=activate_group&amp;h=b036&amp;screen=map">
  <table class="vis" id="for_grocusto">
   <tbody>
		<tr>
	 <td><input checked="checked" type="checkbox" name="group_9572"/></td>
	 <td style="padding-right:10px" class="small" id="groupname_9572">Atacar</td>
	 <td class="small" width="15">
		<a href="#" onclick="ColorGrocusto.edit_color_toggle($(this), 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=load_edit_color&h=b036&screen=map', 9572, 254, 0, 254, null, false);return false;" style="display: block;width:29px;height:18px;background-image:url('/graphic/colorpicker.png')">
		  <span style="display:block;position:relative;left:3px;top:3px;width:12px;height:12px;background-color:rgb(254, 0, 254);">&nbsp;</span>
		</a>
	 </td>
	 <td><input type="button" value="Editar" class="btn" onclick="ColorGrocusto.for_villages_toggle($(this), 9572, 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;ajaxaction=load_for_grocusto&amp;h=b036&amp;screen=map'); return false;"/></td>
	 <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;action=del_group&amp;h=b036&amp;screen=map&amp;group_id=9572" ><img src="https://www.plemiona.pl/graphic/delete.png?78406" alt="Skasuj" /></a></td>
	</tr>
		<tr>
	 <td><input checked="checked" type="checkbox" name="group_20388"/></td>
	 <td style="padding-right:10px" class="small" id="groupname_20388">malina1980</td>
	 <td class="small" width="15">
		<a href="#" onclick="ColorGrocusto.edit_color_toggle($(this), 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=load_edit_color&h=b036&screen=map', 20388, 0, 254, 0, null, false);return false;" style="display: block;width:29px;height:18px;background-image:url('/graphic/colorpicker.png')">
		  <span style="display:block;position:relative;left:3px;top:3px;width:12px;height:12px;background-color:rgb(0, 254, 0);">&nbsp;</span>
		</a>
	 </td>
	 <td><input type="button" value="Editar" class="btn" onclick="ColorGrocusto.for_villages_toggle($(this), 20388, 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;ajaxaction=load_for_grocusto&amp;h=b036&amp;screen=map'); return false;"/></td>
	 <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;action=del_group&amp;h=b036&amp;screen=map&amp;group_id=20388" ><img src="https://www.plemiona.pl/graphic/delete.png?78406" alt="Skasuj" /></a></td>
	</tr>
		<tr id="new_group" style="display:none">
	 <td colspan="5">
	  <input type="text" name="new_group_name" onkeydown="if (event.keyCode == 13) $('#for_new_group').click();"/>
	  <input class="btn" type="submit" name="for_new_group" id="for_new_group" value="OK"/>
	 </td>
	</tr>
   </tbody>
  </table>
    <input type="hidden" name="type" value="for"/>
  <input class="btn" type="submit" value="Salvar" style="margin-top:5px;"/>
    </form>
  <br />
  <a href="#" onclick="javascript:ColorGrocusto.add_for_village();return false">&raquo; Um novo grupo</a>
 </td>
</tr>
</table>
</div>

		<script type="text/javascript">

		//<![CDATA[
			<?php $_from = $this->_tpl_vars['kontrakty']['partner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
					TWMap.allyRelations[<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
] = 'partner';
		    <?php endforeach; endif; unset($_from); ?>
			<?php $_from = $this->_tpl_vars['kontrakty']['nap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
					TWMap.allyRelations[<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
] = 'nap';
		    <?php endforeach; endif; unset($_from); ?>	
			<?php $_from = $this->_tpl_vars['kontrakty']['enemy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
					TWMap.allyRelations[<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
] = 'enemy';
		    <?php endforeach; endif; unset($_from); ?>
			<?php $_from = $this->_tpl_vars['rezerwacje']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['r']):
?>
					TWMap.reservations[<?php echo $this->_tpl_vars['r']['do_wioski']; ?>
] = '<?php echo $this->_tpl_vars['r']['od']; ?>
';
		    <?php endforeach; endif; unset($_from); ?>			

		
				//]]>
		</script>
			</td>

	<td id="map_topo" class="map_topo" valign="top">
		<div class="containerBorder" id="minimap_whole">
		<table cellspacing="0" cellpadding="0" class="map_container minimap_container" style="border-spacing: 0">
			<tr>
				<td align="center">
					<img alt="noroeste" class="dir_arrow" onclick="TWMap.scrollBlock(-1, -1); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_nw.png?1" />
				</td>
				<td align="center">
					<img alt="Meia-noite" class="dir_arrow" onclick="TWMap.scrollBlock(0, -1); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_n.png?1" />
				</td>
				<td align="center">
					<img alt="Nordeste" class="dir_arrow" onclick="TWMap.scrollBlock(1, -1); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_ne.png?1" />
				</td>
			</tr>
			<tr>
				<td align="center">
					<img alt="Oeste" class="dir_arrow" onclick="TWMap.scrollBlock(-1, 0); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_w.png?1" />
				</td>
				<td style="padding: 0" id="minimap_cont">
					<div id="minimap" style="overflow:hidden; position:relative; padding:0px;width:250px; height:250px">
						<div id="minimap_viewport" style="border:1px solid white; position: absolute; z-index:10;"></div>
					</div>
				</td>
				<td align="center">
					<img alt="Leste" class="dir_arrow" onclick="TWMap.scrollBlock(1, 0); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_e.png?1" />
				</td>
			</tr>
			<tr>
				<td align="center">
					<img alt="Sudoeste" class="dir_arrow" onclick="TWMap.scrollBlock(-1, 1); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_sw.png?1" />
				</td>
				<td align="center">
					<img alt="Meio-dia" class="dir_arrow" onclick="TWMap.scrollBlock(0, 1); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_s.png?1" />
				</td>
				<td align="center">
					<img alt="Sudeste" class="dir_arrow" onclick="TWMap.scrollBlock(1, 1); return false;" style="z-index: 1; position: relative;" src="/ds_graphic/map/map_se.png?1" />
				</td>
			</tr>
		</table>
		</div>
		<div id="map_config">
					<div style="margin-top:10px;margin-bottom:10px;">
							<a href="javascript:void(0);" onclick="Worldmap.toggle()">&raquo; Mostrar mapa do mundo</a><br/>
			
			</div>
		




			<table class="vis" style="border-spacing:0px;border-collapse:collapse;" width="100%">
		<tr>
			<th colspan="3">Opções de exibição</th>
		</tr>

				<tr>
			<td>
				<input type="checkbox" name="belief_radius" onclick="TWMap.church.toggle();" id="belief_radius" checked="checked" />
			</td>
			<td>
				<label for="belief_radius">Recarregar mapa</label>
			</td>
			<td></td>
		</tr>
		

		

		
				<tr>
			<td>
				<input type="checkbox" name="usecontext" onclick="TWMap.context.toggleUse();" id="classiclink" checked="checked"/>
			</td>
			<td>
				<label for="classiclink">
					Menu da aldeia
				</label>
			</td>
			<td></td>
		</tr>
		
					<tr>
	<td>
		<input type="checkbox" id="show_popup" />
	</td>
	<td>
		<label for="show_popup">Mostrando janela</label>
	</td>
	<td width="18">
		<img class="popup_options_toggler" src="" />	</td>
</tr>
<tr id="popup_options">
	<td colspan="3" style="padding-left:8px">
	<form id="form_map_popup">
        <table>
            <tr>
                <td>
                    <input type="checkbox" id="map_popup_attack" name="map_popup_attack"  checked="checked" />
                </td>
                <td>
                    <label for="map_popup_attack">Mostre o último ataque</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="map_popup_attack_intel" name="map_popup_attack_intel"  checked="checked" />
                </td>
                <td>
                    <label for="map_popup_attack_intel">Mostrar informações de ataques enviados</label>
                </td>
            </tr>

			            <tr>
                <td>
                    <input type="checkbox" id="map_popup_moral" name="map_popup_moral"  checked="checked" />
                </td>
                <td>
                    <label for="map_popup_moral">Mostrar de moral</label>
                </td>
            </tr>
			            <tr>
                <td>
                    <input type="checkbox" id="map_popup_res" name="map_popup_res"  checked="checked" />
                </td>
                <td>
                    <label for="map_popup_res">Mostar recurosos</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="map_popup_pop" name="map_popup_pop"  checked="checked" />
                </td>
                <td>
                    <label for="map_popup_pop">População (geral)</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="map_popup_trader" name="map_popup_trader"  checked="checked" />
                </td>
                <td>
                    <label for="map_popup_trader">Mostrar comerciantes</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="map_popup_reservation" name="map_popup_reservation"  checked="checked" />
                </td>
                <td>
                    <label for="map_popup_reservation">Mostrar reservas</label>
                </td>
            </tr>
            <tr>

            </tr>
			<tr>

            </tr>
            <tr>

            </tr>

						<tr>

            </tr>
			
            <tr>

            </tr>
        </table>
	</form>
	</td>
</tr>
		
		</table>
		</div>
		<br />
		<form action="" method="post">
		    <table class="vis"  width="100%" style="border-spacing:0px;border-collapse:collapse;">
			<tr>
			    <th colspan="3">Centralizar o mapa</th>
			</tr>
			<tr>
			    <td class="nowrap">
			    x:&nbsp;<input type="text" name="x" id="inputx" class="centercoord" value="789" size="5" onkeyup="xProcess('inputx', 'inputy')" />
			    y:&nbsp;<input type="text" name="y" id="inputy" class="centercoord" value="437" size="5" />
			    </td>
			    <td>
				<input class="btn" type="submit" onclick="return TWMap.focusSubmit();" value="OK" />
			    </td>
				<td width="18">
					<img src="" class="map-slider centercoords_toggler"/>
				</td>
			</tr>
			<tr id="centercoords">
			</tr>
		    </table>
		</form>
					<br />
<table class="vis" width="100%">
	<tr>
		<th colspan=2>Redimensione o mapa</th>
	</tr>
	<tr>
		<td><table cellspacing="0"><tr>
		<td width="80">Mapa:</td>
		<td>
			<select id="map_chooser_select" onchange="TWMap.resize(parseInt($('#map_chooser_select').val()), true)" name="map_size">
				<option id="current-map-size" value="15x15"
									style="display:none;"
								>
				15x15</option>
								<option value="4" >4x4</option>
								<option value="5" >5x5</option>
								<option value="7" >7x7</option>
								<option value="9" >9x9</option>
								<option value="11" >11x11</option>
								<option value="13" >13x13</option>
								<option value="15" selected="selected">15x15</option>
								<option value="20" >20x20</option>
								<option value="30" >30x30</option>
											</select>
			</td>
						<td valign="middle">
				<img alt="" class="tooltip" src="http://cdn.tribalwars.net/graphic//questionmark.png" width="13" height="13" title="Mozesz dowolnie zmienic rozmiar mapy za pomoca myszki" />
			</td>
						</tr></table>
			<input type="hidden" value="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=settings&action=change_settings&h=<?php echo $this->_tpl_vars['hkey']; ?>
" id="change_map_size_link" />
		</td>
	</tr>
		<tr>
		<td><table cellspacing="0"><tr>
		<td width="80">Minimapa:</td>
		<td colspan="2">
			<select id="minimap_chooser_select" onchange="TWMap.resizeMinimap(parseInt($('#minimap_chooser_select').val()), true)">
				<option id="current-minimap-size" value="50x50"
									style="display:none;"
								>
				50x50</option>
								<option value="20" >20x20</option>
								<option value="30" >30x30</option>
								<option value="40" >40x40</option>
								<option value="50" selected="selected">50x50</option>
								<option value="60" >60x60</option>
								<option value="70" >70x70</option>
								<option value="80" >80x80</option>
								<option value="90" >90x90</option>
								<option value="100" >100x100</option>
								<option value="110" >110x110</option>
								<option value="120" >120x120</option>
							</select>
			</td>
			</tr></table>
			<input type="hidden" value="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;ajaxaction=set_map_size&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;screen=settings" id="change_map_size_link" />
		</td>
	</tr>
	</table>

		


	</td>
    </tr>
</table>

<!-- Translations -->
	<input type="hidden" id="newbieProt" value="O alvo ainda tem proteção inicial. Só pode atacar %s."/>
	<input type="hidden" id="barbarianVillage" value="Aldeia Bárbara"/>
	<input type="hidden" id="pointFormat" value="%s (%s pontos)"/>
	<input type="hidden" id="villageFormat" value="%name% (%x%|%y%) K%con%"/>
	<input type="hidden" id="villageNotes" value="Notas"/>
	<input type="hidden" id="villageFavoriteAdded" value="A aldeia foi adicionada aos favoritos."/>
	<input type="hidden" id="villageFavoriteRemoved" value="A aldeia foi removida dos favoritos."/>
	<input type="hidden" id="barbarianVillage" value="Aldeia Bárbara"/>
	<input type="hidden" id="changesSaved" value="As mudanças foram salvas."/>
	<input type="hidden" id="confirmCenterDelete" value="Tem certeza de que deseja excluir "%name%"?"/>
	<input type="hidden" id="troopsSent" value="As tropas foram enviadas."/>

	<script type="text/javascript">
//<![CDATA[

$(document).ready(function() {
	
		
	MapCanvas.init();
	
	TWMap.autoPixelSize = $(window).width() - 100;
	TWMap.autoSize = Math.ceil(TWMap.autoPixelSize / TWMap.tileSize[0]);

			TWMap.size = [<?php echo $this->_tpl_vars['user']['map_size']; ?>
,<?php echo $this->_tpl_vars['user']['map_size']; ?>
];
	
	TWMap.popup.extraInfo = true;
	
	TWMap.politicalMap.displayed = false;
	TWMap.politicalMap.filter = 25;
	TWMap.church.displayed = true;

	TWMap.init();
	TWMap.focus(<?php echo $this->_tpl_vars['village']['x']; ?>
, <?php echo $this->_tpl_vars['village']['y']; ?>
, false);
	
	TWMap.context.init();

		TWMap.minimap.createResizer([20, 20], [120,120], 5);
	TWMap.map.createResizer([4,4], [30,30]);
	
	
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
						TWMap.resize(0, false);
						resizeTimer = null;
					}, 500);
				}
			}
		}, false);
	}
	UI.ToolTip($('.tooltip'));
	
});
//]]>
</script>


<div id="map_popup" class="nowrap" style="position:absolute; top:0px; left:0px; min-width:150px; display:none; z-index:20; direction:ltr;">
</div>


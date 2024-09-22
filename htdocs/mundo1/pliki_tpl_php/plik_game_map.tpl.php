<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:10:20
         Wersja PHP pliku pliki_tpl/game_map.tpl */ ?>

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

	KAMap.screenKey = '<?php echo $this->_tpl_vars['hkey']; ?>
';
	KAMap.topoKey = 667615385;
	KAMap.con.CON_COUNT = 10;
	KAMap.con.SEC_COUNT = 20;
	KAMap.con.SUB_COUNT = 5;

	KAMap.image_base = '../ds_graphic/';
	KAMap.graphics = '../ds_graphic/map/';

			KAMap.currentVillage = <?php echo $this->_tpl_vars['village']['id']; ?>
;
		KAMap.cachePopupContents = false;


	/** Context menu **/
<?php echo '
	KAMap.urls.ctx = {};
	'; ?>

	KAMap.urls.ctx.mp_overview = 'game.php?village=__village__&screen=overview';
	KAMap.urls.ctx.mp_info = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&screen=info_village';
	KAMap.urls.ctx.mp_fav = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=add_target&h=cec0&json=1&screen=info_village';
	KAMap.urls.ctx.mp_unfav = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=del_target&h=cec0&json=1&screen=info_village';
	KAMap.urls.ctx.mp_lock = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=toggle_reserve_village&h=cec0&json=1&screen=info_village';
	KAMap.urls.ctx.mp_res = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=send&target=__village__&screen=market';
	KAMap.urls.ctx.mp_att = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&target=__village__&screen=place';
	KAMap.urls.ctx.mp_recruit = 'game.php?village=__village__&screen=train';
	KAMap.urls.ctx.mp_Perfile = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__owner__&screen=info_player';
	KAMap.urls.ctx.mp_msg = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=new&player=__owner__&screen=mail';
	KAMap.urls.ctx.mp_unlock = KAMap.urls.ctx.mp_lock;
	KAMap.urls.ctx.mp_invite = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=ref&screen=settings';
	KAMap.urls.ctx.mp_invite_hide = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=map_hide_invitation&h=cfa8&json=1&screen=settings';

	
		KAMap.ghost = false;
	
	KAMap.context.enabled = true;
	
	KAMap.centerList.enabled = false;

	/** Other URLs **/
    
	KAMap.urls.villageInfo = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&screen=info_village';
	KAMap.urls.villagePopup = 'game.php?village=__village__&ajax=map_info&source=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview';
	KAMap.urls.sizeSave = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=set_map_size&h=cfa8&screen=settings';
	KAMap.urls.changeShowBelief = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=change_topo_show_belief&h=cfa8&screen=settings';
	KAMap.urls.changeShowPolitical = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=change_topo_show_political&h=cfa8&screen=settings';
	KAMap.urls.changeUseContext = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=change_use_contextmenu&h=cfa8&screen=settings';
	KAMap.urls.savePopup = '';
	KAMap.urls.centerCoords = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=centerlist&screen=map'
	KAMap.urls.centerSave = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=centerlist&ajaxaction=save_center&h=<?php echo $this->_tpl_vars['hkey']; ?>
&screen=map';
    <?php echo '
	/** Attacked villages **/
	
	/** Village colors **/

			KAMap.colors[\'this\'] = [255, 255, 255];
			KAMap.colors[\'player\'] = [240, 200, 0];
			KAMap.colors[\'ally\'] = [0, 0, 244];
			KAMap.colors[\'partner\'] = [0, 160, 244];
			KAMap.colors[\'nap\'] = [128, 0, 128];
			KAMap.colors[\'enemy\'] = [244, 0, 0];
			KAMap.colors[\'other\'] = [130, 60, 10];
			KAMap.colors[\'sleep\'] = [0, 0, 0];
			KAMap.colors[\'grey\'] = [150, 150, 150];
	
	KAMap.secrets = {
		};

	/** Some sector fun **/
	KAMap.sectorPrefech = [];


//]]>
</script>
 '; ?>





<script type="text/javascript">
function KAMap (image_url, snob_max_distance) {
    this.options = {
        units: new Array (
			<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
				'<?php echo $this->_tpl_vars['dbname']; ?>
',
			<?php endforeach; endif; unset($_from); ?>
            'donkey'
			)
		}
        
    this.options.image_url = image_url;
    this.options.snob_max_distance = snob_max_distance;
	}
</script>
<script src="/js/map.js" type="text/javascript"></script>
<script type="text/javascript">
lang = new Array();
</script>

<h2>Continente <span id="continent_id"><?php echo $this->_tpl_vars['mapa']['kontynent']; ?>
</span></h2>

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
	$(document).ready(function() {
		Worldmap.init(0);
	});
//]]>
</script>	
	
	
	
	
	
		<td valign="top">
			<table class="map_container padding2">
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
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
							<?php $_from = $this->_tpl_vars['y_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['y']):
?>
								<tr>
									<td width="20"><?php echo $this->_tpl_vars['y']; ?>
</td>
									<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
										<?php $this->_tpl_vars['impl_coord'] = $this->_tpl_vars['x'].'|'.$this->_tpl_vars['y'] ?>
										<?php if (! $this->_tpl_vars['kl_mapa']->is_osada($this->_tpl_vars['impl_coord'])): ?>
											<?php if ($this->_tpl_vars['kl_mapa']->is_krzak($this->_tpl_vars['impl_coord'])): ?>
												<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="/ds_graphic/<?php echo $this->_tpl_vars['map']; ?>
/<?php echo $this->_tpl_vars['kl_mapa']->get_krzak_typ($this->_tpl_vars['impl_coord']); ?>
" alt="" /></td>
											<?php else: ?>
												<?php if ($this->_tpl_vars['kl_mapa']->is_trawa($this->_tpl_vars['impl_coord'])): ?>
													<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="/ds_graphic/<?php echo $this->_tpl_vars['map']; ?>
/<?php echo $this->_tpl_vars['kl_mapa']->get_trawa_typ($this->_tpl_vars['impl_coord']); ?>
" alt="" /></td>
												<?php else: ?>
													<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="/ds_graphic/<?php echo $this->_tpl_vars['map']; ?>
/gras1.png" alt="" /></td>
												<?php endif; ?>
											<?php endif; ?>
										<?php else: ?>
											<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_color($this->_tpl_vars['impl_coord'],$this->_tpl_vars['village']['id'],$this->_tpl_vars['user']['id'],$this->_tpl_vars['user']['ally']); ?>
<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
">
												<div style="width: 53px; height: 38px;"/>
													<a id="map" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['kl_mapa']->get_vid($this->_tpl_vars['impl_coord']); ?>
">

													<img src="/ds_graphic/<?php echo $this->_tpl_vars['map']; ?>
/<?php echo $this->_tpl_vars['kl_mapa']->grafika_osady($this->_tpl_vars['impl_coord']); ?>
" 
														onmouseover = "Tip(kaMap.tooltipDetails('<?php echo $this->_tpl_vars['kl_mapa']->get_vid($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['kl_mapa']->get_osada_name($this->_tpl_vars['impl_coord']); ?>
 (<?php echo $this->_tpl_vars['x']; ?>
|<?php echo $this->_tpl_vars['y']; ?>
) K<?php echo $this->_tpl_vars['kl_mapa']->get_continent($this->_tpl_vars['impl_coord']); ?>
', <?php echo $this->_tpl_vars['kl_mapa']->get_points($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_player_info($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_ally_info($this->_tpl_vars['impl_coord']); ?>
, '<?php if ($this->_tpl_vars['map_settings']['map_show_moral']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_morals($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['points'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', '<?php echo $this->_tpl_vars['kl_mapa']->get_group($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
', '<?php echo $this->_tpl_vars['village']['x']; ?>
.<?php echo $this->_tpl_vars['village']['y']; ?>
.<?php echo $this->_tpl_vars['x']; ?>
.<?php echo $this->_tpl_vars['y']; ?>
', '<?php if ($this->_tpl_vars['map_settings']['map_show_ressis']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_res($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', '<?php if ($this->_tpl_vars['map_settings']['map_show_workers']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_bh($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', '<?php if ($this->_tpl_vars['map_settings']['map_show_traders']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_traders($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>','<?php if ($this->_tpl_vars['map_settings']['map_show_trocusto']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_units($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', <?php echo $this->_tpl_vars['kl_mapa']->is_noob_protection($this->_tpl_vars['impl_coord']); ?>
, false, '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_text($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_image($this->_tpl_vars['impl_coord']); ?>
'), PADDING, 0, FADEOUT, 125, FADEIN, 150)"
														onmouseout="UnTip()" onclick = "Tip(kaMap.tooltipDetails('<?php echo $this->_tpl_vars['kl_mapa']->get_vid($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['kl_mapa']->get_osada_name($this->_tpl_vars['impl_coord']); ?>
 (<?php echo $this->_tpl_vars['x']; ?>
|<?php echo $this->_tpl_vars['y']; ?>
) K<?php echo $this->_tpl_vars['kl_mapa']->get_continent($this->_tpl_vars['impl_coord']); ?>
', <?php echo $this->_tpl_vars['kl_mapa']->get_points($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_player_info($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_ally_info($this->_tpl_vars['impl_coord']); ?>
, '<?php if ($this->_tpl_vars['map_settings']['map_show_moral']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_morals($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['points'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', '<?php echo $this->_tpl_vars['kl_mapa']->get_group($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
', '<?php echo $this->_tpl_vars['village']['x']; ?>
.<?php echo $this->_tpl_vars['village']['y']; ?>
.<?php echo $this->_tpl_vars['x']; ?>
.<?php echo $this->_tpl_vars['y']; ?>
', '<?php if ($this->_tpl_vars['map_settings']['map_show_ressis']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_res($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', '<?php if ($this->_tpl_vars['map_settings']['map_show_workers']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_bh($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', '<?php if ($this->_tpl_vars['map_settings']['map_show_traders']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_traders($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>','<?php if ($this->_tpl_vars['map_settings']['map_show_trocusto']): ?><?php echo $this->_tpl_vars['kl_mapa']->get_units($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
<?php endif; ?>', <?php echo $this->_tpl_vars['kl_mapa']->is_noob_protection($this->_tpl_vars['impl_coord']); ?>
, false, '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_text($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_image($this->_tpl_vars['impl_coord']); ?>
'), PADDING, 0, FADEOUT, 125, FADEIN, 150)"
														onmclick="UnTip()" alt="" />
														
														<?php echo $this->_tpl_vars['kl_mapa']->status_osady($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id'],$this->_tpl_vars['user']['ally']); ?>

														
													</a>
													</div>
											</td>
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
								</tr>
							<?php endforeach; endif; unset($_from); ?>
			
							<tr>
								<td height="20"></td>
								<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
									<td><?php echo $this->_tpl_vars['x']; ?>
</td>
								<?php endforeach; endif; unset($_from); ?>
							</tr>
						</table>
					</td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
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
<?php if (count ( $this->_tpl_vars['odznaczeni'] ) > 0): ?>
	<tr class="nowrap">
		<td class="small" valign="top" colspan="6">Suas próprias Medalhas:</td>
	</tr>
	<?php $_from = $this->_tpl_vars['odznaczeni']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['odznaczenie']):
?>
		<tr class="nowrap">
			<td class="small" valign="top" colspan="6">
				<table>
					<tr>
						<td class="small" valign="top">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_id']; ?>
"/>
								<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_name']; ?>

							</a>
						</td>
						<td class="small" valign="top">
							<div style="background-color: rgb(<?php echo $this->_tpl_vars['odznaczenie']['kolor']; ?>
); background-image: none;">
								 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</td>
						<td class="small" valign="top">
							[<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&akcja=usun_gracza&id=<?php echo $this->_tpl_vars['odznaczenie']['id']; ?>
">
								<img src="/ds_graphic/delete_small.png" alt="&raquo; Excluir" title="&raquo; Excluir"/>
							</a>]
						</td>
					</tr>
				</table>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</tbody></table>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=edytuj_kolory_graczy"/>&raquo; Editar cor de jogadores</a>


		</td>
		<td valign="top" style="padding: 0px 10px;">
			<table class="map_container padding2" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="/ds_graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="/ds_graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="/ds_graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
					
					<td>

						<form method="POST" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&action=bigMapOnclick&x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
">
							<input type="hidden" name="imgwidth" value="<?php echo $this->_tpl_vars['kl_mapa']->minimapy_width; ?>
"/>
							<input type="hidden" name="imgheight" value="<?php echo $this->_tpl_vars['kl_mapa']->minimapy_height; ?>
"/>
							<input type="hidden" name="rozmiar_px_mm" value="<?php echo $this->_tpl_vars['kl_mapa']->minimapy_px; ?>
"/>	
							<div style="position:relative; padding:0px">
								<div style="position:absolute;z-index:100">
									<input type="image" name="minimapa" class="noneStyle" src="/ds_graphic/map/empty.png" style="width:251px;height:250px;margin:0px;padding:0px" />
								</div>
								
							<img src="page.php?page=topo_image&player_id=<?php echo $this->_tpl_vars['user']['id']; ?>
&x=<?php echo $this->_tpl_vars['x2']; ?>
&y=<?php echo $this->_tpl_vars['y2']; ?>
&village_id=<?php echo $this->_tpl_vars['village']['id']; ?>
">
								
							<div id="bigMapRect" style="z-index:10; position:absolute; top:<?php echo $this->_tpl_vars['bigMapRectTop']; ?>
px; left:<?php echo $this->_tpl_vars['bigMapRectLeft']; ?>
px; width:<?php echo $this->_tpl_vars['mwidth']; ?>
px; height:<?php echo $this->_tpl_vars['mwidth']; ?>
px; border: 1px solid rgb(213, 227, 174);"></div>
							</div>
						</form>
	
					</td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="/ds_graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="/ds_graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="/ds_graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
				</tr>
			</table>
	
			<br>
			
			<table class="vis padding2" width="100%">


<div style="margin-top:10px;margin-bottom:10px;">
							<a href="game.php?screen=map_s&village=<?php echo $this->_tpl_vars['village']['id']; ?>
">(Beta) Mapa movido pelo rato</a><br>
			
			</div>
			<tr>
					<th><b>Centralizar o mapa</b></th>
				</tr>
				<tr>
					<td>
						<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map" method="post">
							<table>
								<tr>
									<td>x: <input type="text" name="x" value="<?php echo $this->_tpl_vars['mapa']['x']; ?>
" size="5" /> y: <input type="text" name="y" value="<?php echo $this->_tpl_vars['mapa']['y']; ?>
" size="5" /></td>
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
						<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&action=zapisz_rozmiar_mapy" method="post">
							<table class="vis" width="100%">
								<tr>
									<td width="50%">
										<center>
											<select name="map_size" style="width: 80%;">
												<option label="7x7" value="7" <?php if ($this->_tpl_vars['user']['map_size'] == 7): ?>selected="selected"<?php endif; ?>>7x7</option>
												<option label="9x9" value="9" <?php if ($this->_tpl_vars['user']['map_size'] == 9): ?>selected="selected"<?php endif; ?>>9x9</option>
												<option label="11x11" value="11" <?php if ($this->_tpl_vars['user']['map_size'] == 11): ?>selected="selected"<?php endif; ?>>11x11</option>
												<option label="13x13" value="13" <?php if ($this->_tpl_vars['user']['map_size'] == 13): ?>selected="selected"<?php endif; ?>>13x13</option>
												<option label="15x15" value="15" <?php if ($this->_tpl_vars['user']['map_size'] == 15): ?>selected="selected"<?php endif; ?>>15x15</option>
												<option label="19x19" value="19" <?php if ($this->_tpl_vars['user']['map_size'] == 19): ?>selected="selected"<?php endif; ?>>19x19</option>
												<option label="23x23" value="23" <?php if ($this->_tpl_vars['user']['map_size'] == 23): ?>selected="selected"<?php endif; ?>>23x23</option>
												<option label="31x31" value="31" <?php if ($this->_tpl_vars['user']['map_size'] == 31): ?>selected="selected"<?php endif; ?>>31x31</option>
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
			
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&action=save_map_options" method="POST">
				<table class="vis padding2" width="100%">
					<tr>
						<th><b>Map Opções pop-up:</b></th>
					</tr>
					<?php $_from = $this->_tpl_vars['settings_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
						<tr>
							<td>
								<input name="<?php echo $this->_tpl_vars['dbname']; ?>
" type="checkbox" <?php if ($this->_tpl_vars['map_settings'][$this->_tpl_vars['dbname']]): ?>checked="checked"<?php endif; ?>>
								&nbsp;<?php echo $this->_tpl_vars['name']; ?>

							</td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
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

<?php if ($this->_tpl_vars['map_settings']['map_show_runtimes']): ?>	
	<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
		speed['<?php echo $this->_tpl_vars['dbname']; ?>
'] = <?php echo ($this->_tpl_vars["config"]["movement_speed"] / $this->_tpl_vars["config"]["speed"]) * $this->_tpl_vars["cl_units"]->get_speed($this->_tpl_vars["dbname"]); ?>;
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['map_settings']['map_show_mule_runtimes']): ?>
	speed['donkey'] = <?php echo ($this->_tpl_vars["config"]["dealer_time"] * 60) / $this->_tpl_vars["config"]["speed"]; ?>;
<?php endif; ?>

lang['POINTS'] = 'Pontos';
lang['OWNER'] = 'Proprietário';
lang['LEFT'] = 'Aldeia Abandonada';
lang['ALLY'] = 'Tribo';
lang['MORAL'] = 'Moral';
lang['GROUPS'] = 'Grupo';
kaMap = new KAMap('/ds_graphic/', <?php if ($this->_tpl_vars['config']['snob_range'] != "-1"): ?><?php echo $this->_tpl_vars['config']['snob_range']; ?>
<?php else: ?>5000<?php endif; ?>);
</script>


<?php echo '
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
			var autoSelected = (parseInt($(\'#map_chooser_select\').val()) == 0);
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
	UI.ToolTip($(\'.tooltip\'));
	
});
//]]>
</script>'; ?>

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

$(document).ready(function() {
	
		MapCanvas.churchData = [];
	MapCanvas.init();
	
	TWMap.autoPixelSize = $(window).width() - 100;
	TWMap.autoSize = Math.ceil(TWMap.autoPixelSize / TWMap.tileSize[0]);

			TWMap.size = [15, 15];
	
	TWMap.popup.extraInfo = false;
	
	TWMap.church.displayed = false;

	TWMap.init();
	TWMap.focus(<?php echo $this->_tpl_vars['x2']; ?>
, <?php echo $this->_tpl_vars['y2']; ?>
, false);
	
	TWMap.context.init();

	
	
	// Allow resize of map when iPhone/Android phone is flipped.


	}
	UI.ToolTip($('.tooltip'));
	
});
//]]>
</script>
<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:19:18
         Wersja PHP pliku pliki_tpl/guest2.tpl */ ?>
<?php if (! $this->_tpl_vars['ajax']): ?>
<?php if (! $this->_tpl_vars['p_adm']): ?><?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) - Tribos - mundo <?php echo $this->_tpl_vars['serwerid']; ?>
</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link id="favicon" rel="shortcut icon"  href="/graphic/favicon.ico" />
        <?php if (isset ( $this->_tpl_vars['user']['css'] )): ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['user']['css']; ?>
" />	
		<?php endif; ?>
		<link rel="stylesheet" type="text/css" href="../css/game.css" />

<?php if ($this->_tpl_vars['screen'] != 'map_s'): ?>
		<link rel="stylesheet" type="text/css" href="../css/game_new.css" />
<?php endif; ?>
		<?php if ($this->_tpl_vars['screen'] != 'map'): ?>
		<?php if ($this->_tpl_vars['screen'] != 'map_s'): ?>
			<link rel="stylesheet" type="text/css" href="../css/styl.css" />
			
		<script src="../js/script.js" type="text/javascript"></script>
		<?php endif; ?>
<?php endif; ?>
			<?php if ($this->_tpl_vars['screen'] == 'map'): ?>
			<link rel="stylesheet" type="text/css" href="../css/map.css" />

			<script type="text/javascript" src="../js/general.js"></script>

			<script type="text/javascript" src="../js/ColorGrocusto.js"></script>

			<script type="text/javascript" src="../js/freemap.js"></script>

			<script type="text/javascript" src="../js/kagmap.js"></script>
			
			<script type="text/javascript" src="../js/twmap.js"></script>			

			<script type="text/javascript" src="../js/mapcanvas.js"></script>

			<script type="text/javascript" src="../js/boxtoggle.js"></script>

			<script type="text/javascript" src="../js/jstpl.js"></script>

			<script type="text/javascript" src="../js/worldmap.js"></script>

			<script type="text/javascript" src="../js/kamhap_drag.js"></script>

			<script type="text/javascript" src="../js/twmap_drag.js"></script>			
			<?php endif; ?>
			
	<script type="text/javascript" src="/js/game.js"></script>
	<?php if ($this->_tpl_vars['screen'] != 'map_s'): ?>
	<script type="text/javascript" src="/js/game_old.js"></script>
	<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'info_player'): ?>
			<script type="text/javascript" src="/js/game_Perfile.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'ally' && $this->_tpl_vars['mode'] == 'forum'): ?>
			<script type="text/javascript" src="/js/Forum.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'ally' && $this->_tpl_vars['mode'] == 'reservations'): ?>
			<script type="text/javascript" src="/js/rezerwacje.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'memo'): ?>
			<script type="text/javascript" src="/js/memo.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'welcome'): ?>
			<script type="text/javascript" src="/js/welcome_1.js"></script>
			<script type="text/javascript" src="/js/welcome_2.js"></script>			
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'train' && $this->_tpl_vars['mode'] == 'mass'): ?>
			<script type="text/javascript" src="/js/Train.js"></script>		
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'main'): ?>
			<script type="text/javascript" src="/js/build.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'snob'): ?>
			<script type="text/javascript" src="/js/snob.js"></script>
<?php endif; ?>
<?php if ($this->_tpl_vars['screen'] == 'overview'): ?>
			<link rel="stylesheet" type="text/css" href="../css/overniew.css"/>
			<script type="text/javascript" src="../js/VillageOverview.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/promo.css"/>
		<?php endif; ?>	
<?php if ($this->_tpl_vars['screen'] == 'map_s'): ?>
			<link rel="stylesheet" type="text/css" href="../css/map.css" />

			<script type="text/javascript" src="http://plemiona.pl/js/game/ColorGrocusto.js?1387451619"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/freemap.js?1387451622"></script>

			<script type="text/javascript" src="../js/map/twmap.js"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/mapcanvas.js?1387451623"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/boxtoggle.js?1387451622"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/jstpl.js?1387451622"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/worldmap.js?1387451619"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/twmap_drag.js?1387451620"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/QuestArrows.js?1387451621"></script>


<?php endif; ?>		
	
	<script type="text/javascript">
        //<![CDATA[
        var sds = false;
		var image_base = "https://www.tribalwars.net/graphic/";
		var mobile = false;
		var mobile_on_normal = false;
		var premium = true;

		var game_data = {"player":{
		"id":"<?php echo $this->_tpl_vars['user']['id']; ?>
",
		"name":"<?php echo $this->_tpl_vars['user']['username']; ?>
",
		"ally_id":"<?php echo $this->_tpl_vars['user']['ally']; ?>
",
		"villages":"<?php echo $this->_tpl_vars['user']['villages']; ?>
",
		"points":"<?php echo $this->_tpl_vars['user']['points']; ?>
",
		"rank":"<?php echo $this->_tpl_vars['user']['rang']; ?>
",
		"incomings":"<?php echo $this->_tpl_vars['user']['attacks']; ?>
",
		"sitter_id":"0",
		"quest_progress":"0",
		"premium":true,
		"admin":<?php if ($this->_tpl_vars['user']['admin'] == 0): ?>true<?php else: ?>false<?php endif; ?>,		
		"account_manager":true,
		"farm_manager":true},
		"nav":{"parent":2},
		
		"village":{
		"id":<?php echo $this->_tpl_vars['village']['id']; ?>
,
		"name":"<?php echo $this->_tpl_vars['village']['name']; ?>
",
		"coord":"<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
",
		"con":"K<?php echo $this->_tpl_vars['village']['continent']; ?>
",
		"bonus":<?php echo $this->_tpl_vars['village']['bonus']; ?>
,
		"group":"<?php echo $this->_tpl_vars['village']['group']; ?>
",
		"res":[<?php echo $this->_tpl_vars['village']['r_wood']; ?>
,<?php echo $this->_tpl_vars['wood_s']; ?>
,<?php echo $this->_tpl_vars['village']['r_stone']; ?>
,<?php echo $this->_tpl_vars['stone_s']; ?>
,<?php echo $this->_tpl_vars['village']['r_iron']; ?>
,<?php echo $this->_tpl_vars['iron_s']; ?>
,"<?php echo $this->_tpl_vars['max_storage']; ?>
","<?php echo $this->_tpl_vars['village']['r_bh']; ?>
","<?php echo $this->_tpl_vars['max_bh']; ?>
"],
		"buildings":{
		"main":"<?php echo $this->_tpl_vars['village']['main']; ?>
",
		"farm":"<?php echo $this->_tpl_vars['village']['farm']; ?>
",
		"storage":"<?php echo $this->_tpl_vars['village']['storage']; ?>
",
		"place":"<?php echo $this->_tpl_vars['village']['place']; ?>
",
		"barracks":"<?php echo $this->_tpl_vars['village']['barracks']; ?>
",
		"church":"<?php echo $this->_tpl_vars['village']['church']; ?>
",
		"smith":"<?php echo $this->_tpl_vars['village']['smitch']; ?>
",
		"wood":"<?php echo $this->_tpl_vars['village']['wood']; ?>
",
		"stone":"<?php echo $this->_tpl_vars['village']['stone']; ?>
",
		"iron":"<?php echo $this->_tpl_vars['village']['iron']; ?>
",
		"market":"<?php echo $this->_tpl_vars['village']['market']; ?>
",
		"stable":"<?php echo $this->_tpl_vars['village']['stable']; ?>
",
		"wall":"<?php echo $this->_tpl_vars['village']['wall']; ?>
",
		"garage":"<?php echo $this->_tpl_vars['village']['garage']; ?>
",
		"hide":"<?php echo $this->_tpl_vars['village']['hide']; ?>
",
		"snob":"<?php echo $this->_tpl_vars['village']['snob']; ?>
",
		"statue":"<?php echo $this->_tpl_vars['village']['statue']; ?>
"}}
		// ,"link_base":"game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=",
		// "link_base_pure":"game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=",
		"csrf":"<?php echo $this->_tpl_vars['hkey']; ?>
",
		"world":"mundo<?php echo $this->_tpl_vars['serwerid']; ?>
",
		"market":"mundo",
		"RTL":false,
		"version":"18588 8.1",
		"majorVersion":"8.1",
		"screen":"<?php echo $this->_tpl_vars['screen']; ?>
",
		"mode":<?php if (! empty ( $this->_tpl_vars['mode'] )): ?><?php echo $this->_tpl_vars['mode']; ?>
<?php endif; ?><?php if (empty ( $this->_tpl_vars['mode'] )): ?>null<?php endif; ?>,
		"device":"desktop"};

		// UI.AutoComplete.url = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajaxaction=autocomplete&h=2223&screen=api';
		// ScriptAPI.url = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajax=save_script&screen=api';
		// ScriptAPI.version = parseFloat(game_data.majorVersion);

		
		var userCSS = false;
		
		var isIE7 = false;

		var topmenuIsAlwaysVisible = false;
		
		
					// $( function() { if( document.location.hash == "#questcomplete" ) UI.SuccessMessage( "Zadanie wykonane.", 3000 ); });				
					
					// $( function() { if( document.location.hash == "#gracze" ) UI.SuccessMessage( "Na �wiecie <?php echo $this->_tpl_vars['serwerid']; ?>
 jest <?php echo $this->_tpl_vars['gracze']; ?>
 graczy", 5000 ); });
					
                    // $( function() { if( document.location.hash == "#admin" ) <?php if ($this->_tpl_vars['user']['admin'] == 0): ?>UI.SuccessMessage( "Wesz�e� do Panelu admina!", 10000 ); <?php else: ?> UI.ErrorMessage( "Nie posiadasz rangi administratora!", 10000 );  <?php endif; ?> });					

		// VillageContext._urls.overview = 'game.php?village=__village__&screen=overview';
		// VillageContext._urls.info = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&screen=info_village';
		// VillageContext._urls.fav = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=add_target&h=f7ef&json=1&screen=info_village';
		// VillageContext._urls.unfav = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=del_target&h=f7ef&json=1&screen=info_village';
		// VillageContext._urls.claim = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&ajaxaction=toggle_reserve_village&h=f7ef&json=1&screen=info_village';
		// VillageContext._urls.market = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&mode=send&target=__village__&screen=market';
		// VillageContext._urls.place = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&target=__village__&screen=place';
		// VillageContext._urls.recruit = 'game.php?village=__village__&screen=train';
		// VillageContext._urls.map = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&id=__village__&screen=map';
		// VillageContext._urls.unclaim = VillageContext._urls.claim;
				

		$(document).ready( function() {
			UI.ToolTip( $( '.group_tooltip' ), { delay: 1000 } );
			VillageContext.init();
		});
		//]]>
	</script> 




	
	<![endif]-->
	<style type="text/css">

		/* force posts in the forum to obey to maximum width set in the settings */
		#forum_box .text {
							width: 950px;
						word-wrap: break-word;
		}
	</style>
</head><body id="ds_body" class=" scrollableMenu">

	
	<div class="top_bar">
		<div class="bg_left"> </div>
		<div class="bg_right"> </div>

	</div>
	<div class="top_shadow"> </div>
	<div class="top_background"> </div>

	<table id="main_layout" cellspacing="0" align="center">
		<tr style="height: 48px;">
			<td class="topbar left"></td>
			<td class="topbar center">

				<div id="topContainer">
					<table id="topTable" style="text-align: center;" cellspacing="0">
						<tr>
							<td style="text-align: center;">
								<table class="menu nowrap" style="white-space: nowrap; ">
							
								</table>
							</td>
						</tr>
					</table>
				</div>
			</td>

			<td class="topbar right"> </td>

		</tr>
		<tr class="shadedBG">

			<td class="bg_left" id="SkyScraperAdCellLeft">
				<div id="SkyScraperAdLeft"></div>				<div class="bg_left"> </div>
			</td>

			<td class="maincell" style="width: 790px;">
							<div style="position:relative;">
			
			
			
											

			<br class="newStyleOnly" />
	        
	
		<hr class="oldStyleOnly" />
			
			<?php if ($this->_tpl_vars['user']['show_toolbar'] == 1): ?>
							

	        			<table id="quickbar_outer" align="center" cellspacing="0" width="100%">
	            <tbody><tr>
	                <td>
					
					</td>
				</tr>
			</tbody></table><?php endif; ?>



			
			

		
	
	<table id="header_info" align="center" width="100%" cellspacing="0">
				<colgroup>
					<col width="1%" />
					<col width="90%" />
					<col width="1%" />
					<col width="1%" />
					<col width="7%" />
				</colgroup>
				

 <tr>

					<td class="topAlign">
						
                	</td>

				<td align="right"> </td>               <td align="right">
					
				</td>
				<td align="right" >
					
				</td>
				

			
<?php if ($this->_tpl_vars['user']['supports'] > 0 || $this->_tpl_vars['user']['attacks'] > 0): ?>
					<td align="right" class="topAlign">
					<table class="header-border menu_block_right">
						<tr>

							<td>
									

<table class="box smallPadding" cellspacing="0">

                                    <tr id="box-item icon-box firstcell">
	                                      <?php if ($this->_tpl_vars['user']['attacks'] > 0): ?>  <td id="menu" class="box-item firstcell">
	                                 </td>
<td class="box-item"><b class="nowrap">(<?php echo $this->_tpl_vars['user']['attacks']; ?>
)</b>   </td>
	<?php endif; ?><?php if ($this->_tpl_vars['user']['supports'] > 0): ?>							<td style="white-space:nowrap;" id="menu" class="box-item icon-box nowrap"><a class="nowrap" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings"/>
														<img src="/ds_graphic/command/support.png" alt=""></a>
 <td class="box-item" align="center" style="margin:0;padding:0;">
 </td>
</a>											
<td class="box-item"><b class="nowrap">(<?php echo $this->_tpl_vars['user']['supports']; ?>
)</b></td><?php endif; ?>																					 </tr>
	                                </table>
	                            </td>

                        </tr>
							<tr class="newStyleOnly">

								<td class="shadow">
									<div class="leftshadow"></div>
									<div class="rightshadow"></div>
								</td>
							</tr>
	                    </table>
                	</td>

				<?php endif; ?>
				



<?php if ($this->_tpl_vars['user']['paladins'] > 0): ?>
<td align="right" class="topAlign">
					<table class="header-border menu_block_right">
						<tr>

							<td>
								<table class="box smallPadding" cellspacing="0">
									<tr>
										
														<span class="icon header knight" title="<?php  echo entparse($this->_tpl_vars['user']['pala_name']); ?>"></span> <td class="box-item" align="center" style="margin:0;padding:0;">
                                        	                                       </td>													</a>
</td>
                                        <td class="box-item" align="center" style="margin:0;padding:0;">
                                        	                                        </td>
                                    </tr>
								</table>
							</td>
						</tr>

			<tr class="newStyleOnly">
							<td class="shadow">
								<div class="leftshadow"> </div>
								<div class="rightshadow"> </div>
							</td>
						</tr>
					</table>
				</td>
	<?php endif; ?>				</td>
			</tr>
		</table>
		
		<div id="container_village_drop_down">
			<div id="village_drop_down" style="display:none;" class="padding2">
				<center>
					<table style="width:100%;" class="content-border">
						<tr>
							<td id="content_value2">
								<center>
									<?php if ($this->_tpl_vars['sekcja']): ?>
										<table class="vis" width="100%">
											<tr>
												<td>
													<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>

												</td>
											</tr>
										</table>
									<?php endif; ?>
									<table class="vis" width="100%">
										<tr>
											<th height="18px">Suas aldeias:</th>
										</tr>
										<?php $_from = $this->_tpl_vars['wioski_gracza']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
											<tr>
												<td<?php if ($this->_tpl_vars['wioska']['id'] == $this->_tpl_vars['village']['id']): ?> class="selected"<?php endif; ?> height="18px"><?php echo $this->_tpl_vars['wioska']['link']; ?>
</td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>
									</table>
								</center>
							</td>
						</tr>
					</table>
				</center>
			</div>
		</div>

	


    
	    
		<!-- *********************** CONTENT BELOW ************************** -->
		<table align="center" id="contentContainer" width="100%">
	        <tr>
	            <td>
					<table class="content-border" width="100%" cellspacing="0">
	                    <tr>
	                        <td id="inner-border">
								<table class="main" align="left">
										                                <tr><td id="content_value">
																		<?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "guest_info_player2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
					                                </td></tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<p class="server_info">
			gerado em <?php echo $this->_tpl_vars['load_msec']; ?>
 ms <b>|</b> Hora do servidor: <span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span> <b>|</b> Funções premium: <?php if ($this->_tpl_vars['premium']): ?>Ativo<?php else: ?>Inativo<?php endif; ?>
					</p>

		</p>
	</td>
	<td class="bg_right" id="SkyScraperAdCell">
		<div class="bg_right"> </div>
		<div id="SkyScraperAd"></div>	</td>
</tr>

						<tr>
				<td class="bg_leftborder"> </td>
				<td></td>
				<td class="bg_rightborder"> </td>
			</tr>
			<tr class="newStyleOnly">
				<td class="bg_bottomleft">&nbsp;</td>
				<td class="bg_bottomcenter">&nbsp;</td>
				<td class="bg_bottomright">&nbsp;</td>
			</tr>
							<tr><td colspan="3" align="center"><div id="AdBottom"></div></td></tr>
						</table><!-- .main_layout -->
					




		
		<div id="world_selection_clicktrap" class="evt-world-selection-toggle">
		</div>
		<div id="world_selection_popup">
			<div class="servers-list-top"></div>
			<div id="servers-list-block">
			
			</div>
			<div class="servers-list-bottom"></div>
		</div>
		
		
<script type="text/javascript">startTimer();

//<![CDATA[
<?php echo '	$(document).ready(function() { 
		startTimer(); 

		if (typeof QuestArrows != \'undefined\') {
			QuestArrows.init();
		}
	});

    //]]>
'; ?>

</script>
<?php if ($this->_tpl_vars['user']['admin'] == 0): ?>	<script type="text/javascript">
	<!--
	$(document).ready(function() {
		WorldSwitch.init();
		// WorldSwitch.worldsURL = '<?php if ($this->_tpl_vars['premium']): ?>game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&ajax=bonus<?php endif; ?>';
	});
	// -->
	</script>

<?php endif; ?>



</body>
</html>
<?php else: ?>
// <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin.php", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ajax_".($this->_tpl_vars['ajax']).".php", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
{if !$ajax}
{if !$p_adm}<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> {$village.name} ({$village.x}|{$village.y}) - Tribos - mundo {$serwerid}</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link id="favicon" rel="shortcut icon"  href="/graphic/favicon.ico" />
        {if isset($user.css)}
		<link rel="stylesheet" type="text/css" href="{$user.css}" />	
		{/if}
		<link rel="stylesheet" type="text/css" href="../css/game.css" />

{if $screen != 'map_s'}
		<link rel="stylesheet" type="text/css" href="../css/game_new.css" />
{/if}
		{if $screen != 'map'}
		{if $screen != 'map_s'}
			<link rel="stylesheet" type="text/css" href="../css/styl.css" />
			
		<script src="../js/script.js" type="text/javascript"></script>
		{/if}
{/if}
			{if $screen == 'map'}
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
			{/if}
			
	<script type="text/javascript" src="/js/game.js"></script>
	{if $screen != 'map_s'}
	<script type="text/javascript" src="/js/game_old.js"></script>
	{/if}
{if $screen == 'info_player'}
			<script type="text/javascript" src="/js/game_Perfile.js"></script>
{/if}
{if $screen == 'ally' && $mode == 'forum'}
			<script type="text/javascript" src="/js/Forum.js"></script>
{/if}
{if $screen == 'ally' && $mode == 'reservations'}
			<script type="text/javascript" src="/js/rezerwacje.js"></script>
{/if}
{if $screen == 'memo'}
			<script type="text/javascript" src="/js/memo.js"></script>
{/if}
{if $screen == 'welcome'}
			<script type="text/javascript" src="/js/welcome_1.js"></script>
			<script type="text/javascript" src="/js/welcome_2.js"></script>			
{/if}
{if $screen == 'train' && $mode == 'mass'}
			<script type="text/javascript" src="/js/Train.js"></script>		
{/if}
{if $screen == 'main'}
			<script type="text/javascript" src="/js/build.js"></script>
{/if}
{if $screen == 'snob'}
			<script type="text/javascript" src="/js/snob.js"></script>
{/if}
{if $screen == 'overview'}
			<link rel="stylesheet" type="text/css" href="../css/overniew.css"/>
			<script type="text/javascript" src="../js/VillageOverview.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/promo.css"/>
		{/if}	
{if $screen == 'map_s'}
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


{/if}		
	
	<script type="text/javascript">
        //<![CDATA[
        var sds = false;
		var image_base = "https://www.tribalwars.net/graphic/";
		var mobile = false;
		var mobile_on_normal = false;
		var premium = true;

		var game_data = {ldelim}"player":{ldelim}
		"id":"{$user.id}",
		"name":"{$user.username}",
		"ally_id":"{$user.ally}",
		"villages":"{$user.villages}",
		"points":"{$user.points}",
		"rank":"{$user.rang}",
		"incomings":"{$user.attacks}",
		"sitter_id":"0",
		"quest_progress":"0",
		"premium":true,
		"admin":{if $user.admin == 0}true{else}false{/if},		
		"account_manager":true,
		"farm_manager":true{rdelim},
		"nav":{ldelim}"parent":2{rdelim},
		
		"village":{ldelim}
		"id":{$village.id},
		"name":"{$village.name}",
		"coord":"{$village.x}|{$village.y}",
		"con":"K{$village.continent}",
		"bonus":{$village.bonus},
		"group":"{$village.group}",
		"res":[{$village.r_wood},{$wood_s},{$village.r_stone},{$stone_s},{$village.r_iron},{$iron_s},"{$max_storage}","{$village.r_bh}","{$max_bh}"],
		"buildings":{ldelim}
		"main":"{$village.main}",
		"farm":"{$village.farm}",
		"storage":"{$village.storage}",
		"place":"{$village.place}",
		"barracks":"{$village.barracks}",
		"church":"{$village.church}",
		"smith":"{$village.smitch}",
		"wood":"{$village.wood}",
		"stone":"{$village.stone}",
		"iron":"{$village.iron}",
		"market":"{$village.market}",
		"stable":"{$village.stable}",
		"wall":"{$village.wall}",
		"garage":"{$village.garage}",
		"hide":"{$village.hide}",
		"snob":"{$village.snob}",
		"statue":"{$village.statue}"{rdelim}{rdelim}
		// ,"link_base":"game.php?village={$village.id}&amp;screen=",
		// "link_base_pure":"game.php?village={$village.id}&screen=",
		"csrf":"{$hkey}",
		"world":"mundo{$serwerid}",
		"market":"mundo",
		"RTL":false,
		"version":"18588 8.1",
		"majorVersion":"8.1",
		"screen":"{$screen}",
		"mode":{if !empty($mode)}{$mode}{/if}{if empty($mode)}null{/if},
		"device":"desktop"};

		// UI.AutoComplete.url = 'game.php?village={$village.id}&ajaxaction=autocomplete&h=2223&screen=api';
		// ScriptAPI.url = 'game.php?village={$village.id}&ajax=save_script&screen=api';
		// ScriptAPI.version = parseFloat(game_data.majorVersion);

		
		var userCSS = false;
		
		var isIE7 = false;

		var topmenuIsAlwaysVisible = false;
		
		
					// $( function() {ldelim} if( document.location.hash == "#questcomplete" ) UI.SuccessMessage( "Zadanie wykonane.", 3000 ); {rdelim});				
					
					// $( function() {ldelim} if( document.location.hash == "#gracze" ) UI.SuccessMessage( "Na �wiecie {$serwerid} jest {$gracze} graczy", 5000 ); {rdelim});
					
                    // $( function() {ldelim} if( document.location.hash == "#admin" ) {if $user.admin == 0}UI.SuccessMessage( "Wesz�e� do Panelu admina!", 10000 ); {else} UI.ErrorMessage( "Nie posiadasz rangi administratora!", 10000 );  {/if} {rdelim});					

		// VillageContext._urls.overview = 'game.php?village=__village__&screen=overview';
		// VillageContext._urls.info = 'game.php?village={$village.id}&id=__village__&screen=info_village';
		// VillageContext._urls.fav = 'game.php?village={$village.id}&id=__village__&ajaxaction=add_target&h=f7ef&json=1&screen=info_village';
		// VillageContext._urls.unfav = 'game.php?village={$village.id}&id=__village__&ajaxaction=del_target&h=f7ef&json=1&screen=info_village';
		// VillageContext._urls.claim = 'game.php?village={$village.id}&id=__village__&ajaxaction=toggle_reserve_village&h=f7ef&json=1&screen=info_village';
		// VillageContext._urls.market = 'game.php?village={$village.id}&mode=send&target=__village__&screen=market';
		// VillageContext._urls.place = 'game.php?village={$village.id}&target=__village__&screen=place';
		// VillageContext._urls.recruit = 'game.php?village=__village__&screen=train';
		// VillageContext._urls.map = 'game.php?village={$village.id}&id=__village__&screen=map';
		// VillageContext._urls.unclaim = VillageContext._urls.claim;
				

		$(document).ready( function() {ldelim}
			UI.ToolTip( $( '.group_tooltip' ), {ldelim} delay: 1000 {rdelim} );
			VillageContext.init();
		{rdelim});
		//]]>
	</script> 




	
	<![endif]-->
	<style type="text/css">

		/* force posts in the forum to obey to maximum width set in the settings */
		#forum_box .text {ldelim}
							width: 950px;
						word-wrap: break-word;
		{rdelim}
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
			
			{if $user.show_toolbar==1}
							

	        			<table id="quickbar_outer" align="center" cellspacing="0" width="100%">
	            <tbody><tr>
	                <td>
					
					</td>
				</tr>
			</tbody></table>{/if}



			
			

		
	
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
				

			
{if $user.supports > 0 || $user.attacks > 0}
					<td align="right" class="topAlign">
					<table class="header-border menu_block_right">
						<tr>

							<td>
									

<table class="box smallPadding" cellspacing="0">

                                    <tr id="box-item icon-box firstcell">
	                                      {if $user.attacks > 0}  <td id="menu" class="box-item firstcell">
	                                 </td>
<td class="box-item"><b class="nowrap">({$user.attacks})</b>   </td>
	{/if}{if $user.supports > 0}							<td style="white-space:nowrap;" id="menu" class="box-item icon-box nowrap"><a class="nowrap" href="game.php?village={$village.id}&screen=overview_villages&mode=incomings"/>
														<img src="/ds_graphic/command/support.png" alt=""></a>
 <td class="box-item" align="center" style="margin:0;padding:0;">
 </td>
</a>											
<td class="box-item"><b class="nowrap">({$user.supports})</b></td>{/if}																					 </tr>
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

				{/if}
				



{if $user.paladins > 0}
<td align="right" class="topAlign">
					<table class="header-border menu_block_right">
						<tr>

							<td>
								<table class="box smallPadding" cellspacing="0">
									<tr>
										
														<span class="icon header knight" title="{php} echo entparse($this->_tpl_vars['user']['pala_name']);{/php}"></span> <td class="box-item" align="center" style="margin:0;padding:0;">
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
	{/if}				</td>
			</tr>
		</table>
		
		<div id="container_village_drop_down">
			<div id="village_drop_down" style="display:none;" class="padding2">
				<center>
					<table style="width:100%;" class="content-border">
						<tr>
							<td id="content_value2">
								<center>
									{if $sekcja}
										<table class="vis" width="100%">
											<tr>
												<td>
													{$sekcja_wiosek}
												</td>
											</tr>
										</table>
									{/if}
									<table class="vis" width="100%">
										<tr>
											<th height="18px">Suas aldeias:</th>
										</tr>
										{foreach from=$wioski_gracza item=wioska}
											<tr>
												<td{if $wioska.id == $village.id} class="selected"{/if} height="18px">{$wioska.link}</td>
											</tr>
										{/foreach}
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
																		{if in_array($screen,$allow_screens)}
					{include file="guest_info_player2.tpl"}
				{/if}
					                                </td></tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<p class="server_info">
			gerado em {$load_msec} ms <b>|</b> Hora do servidor: <span id="serverTime">{$servertime}</span> <b>|</b> Funções premium: {if $premium}Ativo{else}Inativo{/if}
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
{literal}	$(document).ready(function() { 
		startTimer(); 

		if (typeof QuestArrows != 'undefined') {
			QuestArrows.init();
		}
	});

    //]]>
{/literal}
</script>
{if $user.admin == 0}	<script type="text/javascript">
	<!--
	$(document).ready(function() {ldelim}
		WorldSwitch.init();
		// WorldSwitch.worldsURL = '{if $premium}game.php?village={$village.id}&ajax=bonus{/if}';
	});
	// -->
	</script>

{/if}



</body>
</html>
{else}
// {include file="admin.php"}
{/if}
{else}
{include file="ajax_$ajax.php"}
{/if}
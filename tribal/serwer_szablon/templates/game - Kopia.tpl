{php}
$pala0 = mysql_query("SELECT userid FROM villages WHERE id = ".$_GET['village']);$pala01 = @mysql_fetch_assoc($pala0);$pala1 = mysql_query("SELECT * FROM paladin WHERE uid = '".$pala01['userid']."'");$pala2 = @mysql_fetch_assoc($pala1);if(empty($pala2)){
$pala3 = mysql_query("INSERT INTO paladin (uid, name) VALUES ('".$pala01['userid']."', 'Paladin')");
}$mach_pala1 = mysql_query("SELECT * FROM recruit WHERE unit = 'unit_knight'");while($mach_pala2 = @mysql_fetch_assoc($mach_pala1)) { if($mach_pala2['time_finished'] <= time())
	{
	mysql_query("UPDATE unit_place SET unit_knight = '1' WHERE (villages_from_id = ".$mach_pala2['villageid']." AND villages_to_id = ".$mach_pala2['villageid'].")");	mysql_query("DELETE FROM recruit WHERE id = ".$mach_pala2['id']);	} }$pala_dep1 = mysql_query("SELECT * FROM pala_deploy");while($pala_dep2 = @mysql_fetch_assoc($pala_dep1)) { if($pala_dep2['finish'] <= time())
	{
	mysql_query("UPDATE unit_place SET unit_knight = '1' WHERE (villages_from_id = ".$pala_dep2['to']." AND villages_to_id = ".$pala_dep2['to'].")");	mysql_query("UPDATE villages SET all_unit_knight = '1' WHERE id = ".$pala_dep2['to']);	mysql_query("UPDATE villages SET all_unit_knight = '0' WHERE id = ".$pala_dep2['from']);	mysql_query("DELETE FROM pala_deploy WHERE uid = ".$pala_dep2['uid']);
	} }{/php}
{php}
$nume_player=urldecode($this->_tpl_vars['user']['username']);
$nume_sat=$this->_tpl_vars['village']['name'];
if(preg_match('/s Dorf/', $nume_sat)) {
   $this->_tpl_vars['village']['name']="Satul lui $nume_player";
   $nume_sat=$this->_tpl_vars['village']['name'];
    $id_sat=$this->_tpl_vars['village']['id'];
   mysql_query("UPDATE `villages` set `name`='$nume_sat' where `id`='$id_sat'");
}
{/php}
{php}$this->_tpl_vars['allow_screens'][]="friends";{/php}
{php}$this->_tpl_vars['allow_screens'][]="support";{/php}
<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$village.name} ({$village.x}|{$village.y}) - Triburile - Lumea 1</title>
<link rel="shortcut icon" href="/graphic/rabe_38x40.png" type="image/x-icon" />
<link rel="icon" href="/graphic/rabe_38x40.png" type="image/x-icon" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
<script src="menu.js?1148466057" type="text/javascript"></script>
</head>
<body id="ds_body" class=" ">

<div class="top_bar">
<div class="bg_left"> </div>
<div class="bg_right"> </div>
</div>
<div class="top_shadow"> </div>
<table id="main_layout" cellspacing="0">
<tbody>
<tr style="height: 48px;">
<td class="topbar left fixed"/>
<td class="topbar center fixed">
<div id="topContainer" style="margin-left: 0px">
<table id="topTable" style="text-align: center;" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center;">
<table class="menu nowrap" style="white-space: nowrap; ">
<tbody>
<tr id="menu_row">
<td class="menu-item">
<a href="game.php?village={$village.id}&amp;screen=overview_villages">Privire generala</a><table cellspacing="0" class="menu_column"><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=combined">Combinate</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=prod">Productie</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=incomings">Sosiri</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=units">Trupe</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=commands">Comenzi</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=groups">Grupe</a></td></tr><tr><td class="bottom"><div class="corner"></div><div class="decoration"></div></td></tr></table>
</td> 
<td class="menu-item">
<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all"> Rapoarte</a><table cellspacing="0" class="menu_column"><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all">Toate rapoartele</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=attack">Atacuri</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=defense">Defensiva</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=support">Sprijin</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=trade">Comert</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">Altele</a></td></tr><tr><td class="bottom"><div class="corner"></div><div class="decoration"></div></td></tr></table></td> 
<td class="menu-item">
<a href="game.php?village={$village.id}&amp;screen=mail"> Mesaje</a><table cellspacing="0" class="menu_column"><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">Primite</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out">Primite</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">scrie un mesaj</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">Blocheaza expeditor</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">Arhiva</a></td></tr><tr><td class="bottom"><div class="corner"></div><div class="decoration"></div></td></tr></table></td> 
<td class="menu-item">
<a href="game.php?village={$village.id}&amp;screen=ally">Trib</a><table cellspacing="0" class="menu_column"><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">Privire generala</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">Profil</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Membri</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite">Invitatii</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=intro_igm">Mesaj de intampinare</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">Proprietati</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts">Diplomatie</a></td></tr></tr><tr><td class="bottom"><div class="corner"></div><div class="decoration"></div></td></tr></table></td> 
<td class="menu-item lpad"> </td>
<td class="menu-item" id="topdisplay">
<div class="bg">
<a href="game.php?village={$village.id}&amp;screen=ranking">Clasament</a>
<div class="rank">
({$user.rang}.|{$user.points|format_number} P)
</div>
</div>
<table cellspacing="0" class="menu_column"><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally">Triburi</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player">Jucatori</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type=all">Inamici invinsi</a></td></tr><tr><td class="bottom"><div class="corner"></div><div class="decoration"></div></td></tr></table></div></td> 
<td class="menu-item rpad"> </td>
<td class="menu-item">
<a href="game.php?village={$village.id}&amp;screen=settings">Setari</a><table cellspacing="0" class="menu_column"><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">Profil</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">Setari</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">Schimba parola</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete">Sterge contul</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=quickbar">Editeaza quickbar-ul</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation">Mod de vacanta</a></td></tr><tr><td class="bottom"><div class="corner"></div><div class="decoration"></div></td></tr></table></td> 
<td class="menu-item">
<a href="game.php?village={$village.id}&amp;screen=memo">Notite</a>
</td>
<td class="menu-item">
<a href="logscreen.html" target="_top">Logout</a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td class="topbar right fixed"> </td>
</tr>
<tr class="shadedBG">
<td class="bg_left">
<div class="bg_left"> </div>
</td>
<td class="maincell" style="width: 790px;">
<br class="newStyleOnly"/>
<hr class="oldStyleOnly"/>
<table id="header_info" align="center" width="100%" cellspacing="0">
<colgroup>
<col width="1%"/>
<col width="96%"/>
<col width="1%"/>
<col width="1%"/>
<col width="1%"/>
</colgroup>
<tbody>
<tr>
<td class="topAlign">
<table class="header-border">
<tbody>
<tr>
<td>
<table class="box menu nowrap">
<tbody>
<tr id="menu_row2">
<td id="menu_row2_map" class="box-item firstcell">
<a id="menu_map_link" href="game.php?village={$village.id}&amp;screen=map">Harta</a>
</td>
<td style="white-space:nowrap;" id="menu_row2_village" class="box-item icon-box nowrap">
<a class="nowrap" href="game.php?village={$village.id}&amp;screen=overview&intro">{$village.name}</a>
</td>
<td class="box-item">
<b class="nowrap">({$village.x}|{$village.y}) K{$village.continent}</b>
</td>
<td class="box-item">
{if $aktu_group == 0}
		{if $user.villages>1}
			{if !empty($village_array.last)}
				<a href="{$village_array.last_link}" accesskey="a"><img src="graphic/links.png" alt="" /></a> 
			{else}
				<img src="graphic/links2.png" alt="" />
			{/if}
			{if !empty($village_array.next)}
				<a href="{$village_array.next_link}" accesskey="d"><img src="graphic/rechts.png" alt="" /></a> 
			{else}
				<img src="graphic/rechts2.png" alt="" />
			{/if}
		{/if}
	{else}
	 {if $user.villages > 1}
			{if !empty($village_array.last) and $village_in_group == 'true'}
				<a href="{$village_array.last_link}" accesskey="a"><img src="graphic/group_left.png" alt="" /></a> 
			{else}
				<img src="graphic/links2.png" alt="" />
			{/if}
			{if !empty($village_array.next) and $village_in_group == 'true'}
				<a href="{$village_array.next_link}" accesskey="d"><img src="graphic/group_right.png" alt="" /></a> 
			{else}
				<img src="graphic/rechts2.png" alt="" />
			{/if}
			{if $village_in_group != 'true'}
			  <a href="{$village_array.first_link}"><img src="graphic/group_jump.png" alt="" title="Dute la primul sat din Grup" /></a>
      {/if}
		{/if}
	{/if}
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="newStyleOnly">
<td class="shadow">
<div class="leftshadow"> </div>
<div class="rightshadow"> </div>
</td>
</tr>
</tbody>
</table>
</td>
<td align="right" class="topAlign"> </td>
<!-- flexible gap -->
<td align="right" class="topAlign">
<table align="right" class="header-border menu_block_right">
<tbody>
<tr>
<td>
<table class="box smallPadding" cellspacing="0" style="empty-cells:show;">
<tbody>
<tr style="height: 20px;">
<td class="box-item icon-box firstcell">
<a href="game.php?village={$village.id}&amp;screen=wood" title="Lemn">
<span class="icon header wood"> </span>
</a>
</td>
<td class="box-item">
<span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>{$village.r_wood}</span>
</td>
<td class="box-item icon-box">
<a href="game.php?village={$village.id}&amp;screen=stone" title="Argil?">
<span class="icon header stone"> </span>
</a>
</td>
<td class="box-item">
<span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>{$village.r_stone}</span>
</td>
<td class="box-item icon-box">
<a href="game.php?village={$village.id}&amp;screen=iron" title="Fier">
<span class="icon header iron"> </span>
</a>
</td>
<td class="box-item">
<span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>{$village.r_iron}</span>
</td>
<td class="box-item icon-box">
<a href="game.php?village={$village.id}&amp;screen=storage" title="Capacitate de depozitare">
<span class="icon header ressources"> </span>
</a>
</td>
<td class="box-item">
<span id="storage">{$max_storage}</span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="newStyleOnly">
<td class="shadow">
<div class="leftshadow"> </div>
<div class="rightshadow"> </div>
</td>
</tr>
</tbody>
</table>
</td>
<td align="right" class="topAlign">
<table class="header-border menu_block_right">
<tbody>
<tr>
<td>
<table class="box smallPadding" cellspacing="0">
<tbody>
<tr>
<td class="box-item icon-box">
<a href="game.php?village={$village.id}&amp;screen=farm" title="Ferm?">
<span class="icon header population"> </span>
</a>
</td>
<td class="box-item" align="center" style="margin:0;padding:1;">
<span id="pop_current_label">{$village.r_bh}/{$max_bh} </span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="newStyleOnly">
<td class="shadow">
<div class="leftshadow"> </div>
<div class="rightshadow"> </div>
</td>
</tr>
</tbody>
</table>
</td>
{if $user.attacks!=0}
<td align="right" class="topAlign">
<table class="header-border menu_block_right">
<tbody>
<tr>
<td>
<table class="box smallPadding" cellspacing="0">
<tbody>
<tr>
<td class="box-item icon-box">
<img src="graphic/unit/att.png" alt="" /> 
</a>
</td>
<td class="box-item" align="center" style="margin:0;padding:1;">
<td width="60" height="20" align="center">({$user.attacks}) </td>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="newStyleOnly">
<td class="shadow">
<div class="leftshadow"> </div>
<div class="rightshadow"> </div>
</td>
</tr>
</tbody>
</table>
{/if}
</td>
</tr>
</tbody>
</table>
<!-- *********************** CONTENT BELOW ************************** -->
<table align="center" id="contentContainer" width="100%">
<tbody>
<tr>
<td>
<table class="content-border" width="100%" cellspacing="0">
<tbody>
<tr>
<td id="inner-border">
<table class="main" align="left">
<tbody>
<tr>
<td id="content_value">

{if in_array($screen,$allow_screens)}
	{include file="game_$screen.tpl"}
	{else}
	<p></p>
{/if}
{if $screen == 'statue'}
	{include_php file="statue.php"}
{/if}


</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
<td class="bg_right" >
<div class="bg_right"> </div>
<div  style="height: 264px">

</div>
</td>
</tr>
<tr>
<td class="bg_leftborder"> </td>
<td class="server_info" style=" padding-top:7">
<p class="server_info">
generat&#259; &#238;n: {$load_msec} ms <b>|</b> 
Ora Server: <span id="serverTime">{$servertime}</span> {php} echo date("d/m/Y") {/php}
</p>
</td>
<td class="bg_rightborder"> </td>
</tr>
<tr class="newStyleOnly">
<td class="bg_bottomleft"> </td>
<td class="bg_bottomcenter"> </td>
<td class="bg_bottomright"> </td>
</tr>
</tbody>
</table>
<!-- .main_layout -->

<div id="footer">
<div id="footer_logo"> </div>
<div id="linkContainer" style="max-width: 830px; min-width: 250px;">
<div id="footer_left">
<a href="" target="_blank">Forum</a>
 -  
<a href="/help/index.php" target="_blank">Ajutor</a>
 -<font color="red">JUCATORI ONLINE:</font><font color="green">
    {php}
        $timp = time()-30;
        echo mysql_num_rows(mysql_query("SELECT id FROM users WHERE last_activity > $timp"));
    {/php}
</font> 
</div>
<div id="footer_right">
<a href="game.php?village={$village.id}&amp;screen=friends">Prieteni</a>
</div>
</div>
</div>
<script type="text/javascript">startTimer();</script>
</body>
</html>

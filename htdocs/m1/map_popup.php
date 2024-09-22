<?
	header('Content-Type: text/html; charset=ISO-8859-1');
	include('include/config.php');
	include('include.inc.php');

	$timp = time();

	// Get vars
	$v = mysql_real_escape_string($_GET['v']);
	$u = mysql_real_escape_string($_GET['u']);
	$ox = mysql_real_escape_string($_GET['ox']);
	$oy = mysql_real_escape_string($_GET['oy']);

	// Get info about villages
	$query_villages = "SELECT * FROM `villages` WHERE `id` = '$v'";
	$villages = $db->fetch($db->query($query_villages));

	// Get info about users
	$query_users = "SELECT * FROM `users` WHERE `id` = '$villages[userid]'";
	$users = $db->fetch($db->query($query_users));

	// Get info about tribes
	$query_ally = "SELECT * FROM `ally` WHERE `id` = '$users[ally]'";
	$ally = $db->fetch($db->query($query_ally));

	// Get info about troops
	$query_place = "SELECT * FROM `unit_place` WHERE `villages_to_id` = '$v' OR `villages_from_id` = '$v'";
	$place = $db->fetch($db->query($query_place));

	// Define variables
	$villages[name] = entparse($villages['name']);
	$users[name] = entparse($users['name']);
	$ally[name] = entparse($ally['short']);
	$villages[points] = format_number($villages['points']);
	$users[points] = format_number($users['points']);
	$ally[points] = format_number($ally['points']);

	// Define output
	$info_title = "$villages[name] ($villages[x]|$villages[y]) K$villages[continent]";
	$info_points = $villages['points'];
	$username = entparse($users['username']);
	$info_owner = "$username ($users[points] Pontos)";
	$info_tribe = "$ally[name] ($ally[points] Pontos)";

	// Calculate farm info
	$farmt = $arr_farm[$villages[farm]];
	$farm_info = "$villages[r_bh]/$farmt";

	// Units Info
	$unit = array("unit_spear","unit_sword","unit_axe","unit_spy","unit_light","unit_heavy","unit_ram","unit_catapult","unit_snob",);
	$unit2 = array("all_unit_spear","all_unit_sword","all_unit_axe","all_unit_spy","all_unit_light","all_unit_heavy","all_unit_ram","all_unit_catapult","all_unit_snob");
	$units = array("720","900","720","360","390","450","1200","1440","1800");
?>
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; width:100%; box-shadow: 0 0 8px #FEE47D; -moz-box-shadow: 0 0 8px #FEE47D; -webkit-box-shadow: 0 0 8px #FEE47D; -moz-border-radius: 5px 5px 5px 5px; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -webkit-border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px;">
	<tr><th id="title" colspan="2"><?=$info_title;?></th></tr>
<? if($users['noob_protection'] >= time()){ ?>
    <tr><td colspan="2" align="center"><div class="error">Jogador sob prote&ccedil;&atilde;o de iniciantes!</div></td></tr>
<? } ?>
<? if($villages['bonus'] > 0){ ?>
		<tr><td colspan="2" align="center">
<? 
	if($villages['bonus'] == 1){
		echo "<b>Bonus de 50% no arma&eacute;m e mercadores</b>";
	}elseif($villages['bonus'] == 2){
		echo "<b>Bonus de 10% no espa&ccedil;o da fazenda</b>";
	}elseif($villages['bonus'] == 3){
		echo "<b>Bonus de 33% em recrutamento no es&aacute;bulo</b>";
	}elseif($villages['bonus'] == 4){
		echo "<b>Bonus de 33% em recrutamento no quartel</b>";
	}elseif($villages['bonus'] == 5){
		echo "<b>Bonus de 50% em recrutamento na oficina</b>";
	}elseif($villages['bonus'] == 6){
		echo "<b>Bonus de 30% na produ&ccedil;&atilde;o de recursos</b>";
	}
?>
	 </td></tr>
<? } ?>
    <tr>
        <td width="30%">Pontos:</td><td><?=$info_points;?></td>     
    </tr>
    <? if($villages['userid'] == -1){ ?>
    <tr>
        <td colspan="2" align="center">abandonada</td>     
    </tr>
    <? }else{ ?>
    <tr>
        <td width="30%">Proprietario:</td><td><?=$info_owner;?></td>     
    </tr>
	<? } ?>
    <? if($users['ally'] != -1 && $villages['userid'] != -1){ ?>
    <tr>
        <td width="30%">Tribo:</td><td><?= $info_tribe;?></td>     
    </tr>
	<? } ?>
    <? if($u == $villages['userid']){ ?>
    <tr>
    	<td colspan="2" align="center">
        	<img src="../graphic/icons/wood.png" /> <?=format_number(round($villages['r_wood']));?>
            <img src="../graphic/icons/stone.png" /> <?=format_number(round($villages['r_stone']));?>
            <img src="../graphic/icons/iron.png" /> <?=format_number(round($villages['r_iron']));?><br />
            <img src="../graphic/icons/storage.png" /> <?=format_number($arr_maxstorage[$villages['storage']]);?>
			<img src="../graphic/icons/farm.png" /> <?=$farm_info;?>
        </td>
    </tr>
    <? } ?>
    <tr>
        <td colspan="2" style="background-color: #734511;" width="100%">
        	<table class="vis" style="border-spacing:1px; background-color:#FEE47D; width:100%;">
            	<tr>
                <? for($i=0;$i<=8;$i++){?>
					<td align="center">
                    	<img src="../graphic/unit/<?=$unit[$i];?>.png" />
                    </td>
                <? } ?>
                </tr>
                <? if($u == $villages['userid']){ ?>
                <tr>
                <? for($i=0;$i<=8;$i++){?>
                	<td style="text-align:center;">
						<font size="-6"><?=$place[$unit[$i]];?></font><br />
						<span class="inactive" style="font-size:8px;">(<?=$villages[$unit2[$i]];?>)</font>
                  	</td>
               	<? } ?>
               	</tr>
                <? }if(($ox != $villages['x'] || $oy != $villages['y'])){ ?>
                <tr>
                <? for($i=0;$i<=8;$i++){ ?>
                	<td style="text-align:center;font-size:8px;" class="inactive">
                    	<?=minutes(unit_running($ox,$oy,$villages['x'],$villages['y'],$units[$i]));?>
                  	</td>
               	<? } ?>	
                </tr>
                <? } ?>
            </table>
        </td>
    </tr>
</table>
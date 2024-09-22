<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ajutor Triburile - Ajutor</title>
<link rel="stylesheet" type="text/css" href="css/help.css" />
<link rel="stylesheet" type="text/css" href="css/premium.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="js/help.js"></script>
<script type="text/javascript" src="js/premium.js"></script>

<?php
$url = $_SERVER['REQUEST_URI'];
?>
	</head>

<body id="ds_body" class="header" ><table width="800">
	<tr>
		<td valign="top">

			<div class="containerBorder bgContainer">
			<table class="main" width="200" align="center">
				<tr>
					<td><a href=""><img src="/help/images/help.png" title="Ajutor" alt="" /></a></td>
                                </tr>
                                <tr>
                                        <td align="center">
						<select onchange="document.location.href = this.value;">
					        <option selected="selected" value="?article=start">Lumea 1</option></select>
                                                                                            					</td>
				</tr>
				<tr>
					<td>
						<form action="?article=search" method="post">
							<ul class="help">
								<li class="help">
								Cuvânt cautat: <input name="search" type="text" size="30" maxlength="30" /><br />
								<input type="submit" value="Cautare" /></li>
							</ul>
  					</form>
						<ul class="help">
        <li class="help">
        <a href="index.php?article=start" >Ajutor</a>
                </li>
        <li class="help">
        <a href="index.php?article=basics" >Informatii de baza</a>

        <?php
        if ($url == "/help/index.php?article=basics" || $url == "/help/index.php?article=resources" || $url == "/help/index.php?article=begin" || $url == "/help/index.php?article=late_start" || $url == "/help/index.php?article=overview" || $url == "/help/index.php?article=rename" || $url == "/help/index.php?article=build" || $url == "/help/index.php?article=build_units")
              echo"<ul class='help'><li class='help'><a href='index.php?article=resources' >Resurse</a></li><li class='help'><a href='index.php?article=begin' >Primii pasi</a></li><li class='help'><a href='index.php?article=late_start' >Inceput intarziat</a></li><li class='help'><a href='index.php?article=overview' >Privirea generala asupra satului</a></li><li class='help'><a href='index.php?article=rename' >Schimba numele satului</a></li><li class='help'><a href='index.php?article=build' >Construieste cladiri</a></li><li class='help'><a href='index.php?article=build_units' >Recruteaza unitati</a></li></ul>"

         ?>

                </li>
        <li class="help">
        <a href="index.php?article=buildings" >Cladiri</a>
                </li>
        <li class="help">
        <a href="index.php?article=units" >Descrierea unitatilor</a>
                </li>
        <li class="help">
        <a href="index.php?article=points" >Tabelul punctelor</a>
                </li>
        <li class="help">
        <a href="index.php?article=fight" >Sistemul de lupta</a>

        <ul class="help">
        <?php
        if ($url == "/help/index.php?article=fight")
              echo"<ul class='help'><li class='help'><a href='index.php?article=fight_basic' >Informatii de baza</a></li><li class='help'><a href='index.php?article=fight_extra' >Avansat</a></li><li class='help'><a href='index.php?article=conquer' >Cucerirea satelor</a></li></ul>"
        ?>
        <?php
        if ($url == "/help/index.php?article=fight_basic" || $url == "/help/index.php?article=fight_basic" || $url == "/help/index.php?article=fight_place" || $url == "/help/index.php?article=attack" || $url == "/help/index.php?article=defence" || $url == "/help/index.php?article=support" || $url == "/help/index.php?article=troop_speed" || $url == "/help/index.php?article=fight_wall" || $url == "/help/index.php?article=attack_spy" || $url == "/help/index.php?article=knight" || $url == "/help/index.php?article=inventory")
              echo"<ul class='help'><li class='help'><a href='index.php?article=fight_basic' >Informatii de baza</a><ul class='help'><li class='help'><a href='index.php?article=fight_place'>Piata centrala</a></li><li class='help'><a href='index.php?article=attack'>Cum sa ataci</a></li><li class='help'><a href='index.php?article=defence'>Cum sa te aperi</a></li><li class='help'><a href='index.php?article=support'>Cum sa trimiti suport defensiv</a></li><li class='help'><a href='index.php?article=troop_speed'>Viteza</a></li><li class='help'><a href='index.php?article=fight_wall'>Zidul</a></li><li class='help'><a href='index.php?article=attack_spy'>Spionajul</a></li><li class='help'><a href='index.php?article=knight'>Paladin</a></li><li class='help'><a href='index.php?article=inventory'>Camera de arme</a></li></ul></li><li class='help'><a href='index.php?article=fight_extra' >Avansat</a></li><li class='help'><a href='index.php?article=conquer' >Cucerirea satelor</a></li></ul>"
        ?>
        <?php
        if ($url == "/help/index.php?article=fight_extra" || $url == "/help/index.php?article=fight_extra" || $url == "/help/index.php?article=moral" || $url == "/help/index.php?article=basic_def" || $url == "/help/index.php?article=luck" || $url == "/help/index.php?article=left" || $url == "/help/index.php?article=attack_catapult" || $url == "/help/index.php?article=simulator" || $url == "/help/index.php?article=sleep" || $url == "/help/index.php?article=farm_limit" || $url == "/help/index.php?article=night" || $url == "/help/index.php?article=church_first" || $url == "/help/index.php?article=church")
              echo"<ul class='help'><li class='help'><a href='index.php?article=fight_basic' >Informatii de baza</a></li></ul><ul class='help'><li class='help'><a href='index.php?article=fight_extra' >Avansat</a><ul class='help'><li class='help'><a href='index.php?article=moral'>Moral</a></li><li class='help'><a href='index.php?article=basic_def'>Apararea de baza</a></li><li class='help'><a href='index.php?article=luck'>Noroc</a></li><li class='help'><a href='index.php?article=left'>Sat parasit</a></li><li class='help'><a href='index.php?article=attack_catapult'>Catapulte</a></li><li class='help'><a href='index.php?article=simulator'>Simulator</a></li><li class='help'><a href='index.php?article=sleep'>Mod de dormit</a></li><li class='help'><a href='index.php?article=farm_limit'>Regula pentru ferma</a></li><li class='help'><a href='index.php?article=night'>Bonus de noapte</a></li><li class='help'><a href='index.php?article=church_first'>Prima biserica</a></li><li class='help'><a href='index.php?article=church'>Biserica</a></li></ul></li><li class='help'><a href='index.php?article=conquer' >Cucerirea satelor</a></li></ul>"
        ?>
        <?php
        if ($url == "/help/index.php?article=conquer" || $url == "/help/index.php?article=conquer" || $url == "/help/index.php?article=conquer_howto" || $url == "/help/index.php?article=mood" || $url == "/help/index.php?article=got_conquered" || $url == "/help/index.php?article=build_snob")
              echo"<ul class='help'><li class='help'><a href='index.php?article=fight_basic' >Informatii de baza</a></li></ul><ul class='help'><li class='help'><a href='index.php?article=fight_extra' >Avansat</a></li></ul><ul class='help'><li class='help'><a href='index.php?article=conquer' >Cucerirea satelor</a><ul class='help'><li class='help'><a href='index.php?article=conquer_howto'>Cum sa cuceresti alte sate</a></li><li class='help'><a href='index.php?article=mood'>Loialitate</a></li><li class='help'><a href='index.php?article=got_conquered'>Satul tau a fost cucerit de catre alt jucator</a></li><li class='help'><a href='index.php?article=build_snob'>Antreneaza generatii nobile</a></li></ul></li></ul>"
        ?>

</ul>

                </li>
        <li class="help">
        <a href="index.php?article=map" >Harta</a>

                </li>
        <li class="help">
        <a href="index.php?article=report" >Rapoarte</a>

                </li>
        <li class="help">
        <a href="index.php?article=trade" >Comert</a>

        <?php
        if ($url == "/help/index.php?article=trade" || $url == "/help/index.php?article=free_trade" || $url == "/help/index.php?article=change")
              echo"<ul class='help'><li class='help'><a href='index.php?article=free_trade' >Comert liber</a></li><li class='help'><a href='index.php?article=change' >Oferte de resurse</a></li></ul>"

         ?>

                </li>
        <li class="help">
        <a href="index.php?article=security" >Securitate</a>

                </li>
        <li class="help">
        <a href="index.php?article=shortcuts" >Prescurtari</a>

                </li>
        <li class="help">
        <a href="index.php?article=premium" >Cont premium</a>

                </li>
        <li class="help">
        <a href="index.php?article=vacation" >Mod de vacanta</a>

                </li>   
        <li class="help">
        <a href="index.php?article=tree" >Descrierea tehnologiilor</a>

                </li>
        <li class="help">
        <a href="index.php?article=bb_codes" >BB-Codes</a>

                </li>
        <li class="help">
        <a href="index.php?article=server_info" >Alte informatii</a>

        <?php
        if ($url == "/help/index.php?article=server_info" || $url == "/help/index.php?article=banner" || $url == "/help/index.php?article=external_igm" || $url == "/help/index.php?article=map_data")
              echo"<ul class='help'><li class='help'><a href='index.php?article=banner' >Banner</a></li><li class='help'><a href='index.php?article=external_igm' >Mesaje externe</a></li><li class='help'><a href='index.php?article=map_data' >Datele lumii</a></li></ul>"

         ?>

                </li>
        <li class="help">
        <a href="index.php?article=rules" >Regulament</a>

                </li>
        <li class="help">
        <a href="index.php?article=search" >Cautare</a>

                </li>

</ul>


                                                                                        </td>
                                </tr>
                        </table>
                        </div>

                </td>

                <td valign="top">

                            <div class="containerBorder bgContainer">
				<table class="main" width="600" align="center">
                                <tr>
                                        <td>

                                                <table class="vis" width="100%">

                                                 <?php
                if(isset($_GET['article'])){
                    switch($_GET['article']){
                        case "overview";
                            include "overview.php";
                            break;
                        case "basics";
                            include "basics.php";
                            break;
                        case "start";
                            include "start.php";
                            break;
                        case "map";
                            include "map.php";
                            break;
                        case "points";
                            include "points.php";
                            break;
                        case "fight";
                            include "fight.php";
                            break;
                        case "tribe";
                            include "tribe.php";
                            break;
                        case "report";
                            include "report.php";
                            break;
                        case "trade";
                            include "trade.php";
                            break;
                        case "security";
                            include "security.php";
                            break;
                        case "shortcuts";
                            include "shortcuts.php";
                            break;
                        case "units";
                            include "units.php";
                            break;
                        case "vacation";
                            include "vacation.php";
                            break;
                        case "tree";
                            include "tree.php";
                            break;
                        case "bb_codes";
                            include "bb_codes.php";
                            break;
                        case "server_info";
                            include "server_info.php";
                            break;
                        case "search";
                            include "search.php";
                            break;
                        case "resources";
                            include "resources.php";
                            break;
                        case "begin";
                            include "begin.php";
                            break;
                        case "late_start";
                            include "late_start.php";
                            break;
                        case "rename";
                            include "rename.php";
                            break;
                        case "build";
                            include "build.php";
                            break;
                        case "build_units";
                            include "build_units.php";
                            break;
                        case "buildings";
                            include "buildings.php";
                            break;
                        case "free_trade";
                            include "free_trade.php";
                            break;
                        case "change";
                            include "change.php";
                            break;
                        case "banner";
                            include "banner.php";
                            break;
                        case "external_igm";
                            include "external_igm.php";
                            break;
                        case "map_data";
                            include "map_data.php";
                            break;
                        case "fight_basic";
                            include "fight_basic.php";
                            break;
                        case "fight_extra";
                            include "fight_extra.php";
                            break;
                        case "conquer";
                            include "conquer.php";
                            break;
                        case "fight_place";
                            include "fight_place.php";
                            break;
                        case "attack";
                            include "attack.php";
                            break;
                        case "defence";
                            include "defence.php";
                            break;
                        case "support";
                            include "support.php";
                            break;
                        case "troop_speed";
                            include "troop_speed.php";
                            break;
                        case "fight_wall";
                            include "fight_wall.php";
                            break;
                        case "attack_spy";
                            include "attack_spy.php";
                            break;
                        case "premium";
                            include "premium.php";
                            break;
                        case "knight";
                            include "knight.php";
                            break;
                        case "inventory";
                            include "inventory.php";
                            break;
                        case "moral";
                            include "moral.php";
                            break;
                        case "basic_def";
                            include "basic_def.php";
                            break;
                        case "luck";
                            include "luck.php";
                            break;
                        case "left";
                            include "left.php";
                            break;
                        case "attack_catapult";
                            include "attack_catapult.php";
                            break;
                        case "simulator";
                            include "simulator.php";
                            break;
                        case "sleep";
                            include "sleep.php";
                            break;
                        case "farm_limit";
                            include "farm_limit.php";
                            break;
                        case "night";
                            include "night.php";
                            break;
                        case "church_first";
                            include "church_first.php";
                            break;
                        case "church";
                            include "church.php";
                            break;
                        case "conquer_howto";
                            include "conquer_howto.php";
                            break;
                        case "mood";
                            include "mood.php";
                            break;
                        case "got_conquered";
                            include "got_conquered.php";
                            break;
                        case "build_snob";
                            include "build_snob.php";
                            break;
                        case "points&total";
                            include "points&total.php";
                            break;
                        case "rules";
                            include "rules.php";
                            break;
                        default:
                            include "error.php";
                            break;
                    }
                }else{
                    include "start.php";
                }
?>

                                        </table>


                                </td>
                                </tr>
                        </table>
                        </div>

                </td>
        </tr>
</table>

</body>
</html>
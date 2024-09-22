<?php
/*****************************************/
/*=======================================*/
/*     PLIK: bot.php   		 			 */
/*     DATA: 1.05.2012r        			 */
/*     ROLA: Bot podstawowe ustawienia   */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

//Dzia�anie bota (true - tak , false - nie):
$ProBot["display"] = true;

//Minimalna ilo�� offa dla ataku:
$ProBot["min_off"] = 18000;
	
//Minimalna ilo�� jednostek do farmienia:
$ProBot["min_farm"] = 200;

//Minimalna ilo�� punkt�w, w kt�rej bot b�dzie u�ywa� tylko pe�nych off�w:
$ProBot["min_vpoints"] = 9000;
	
//Minimalna ilo�� surowc�w do rekrtuacji jednostek:
$ProBot["min_res_to_recruit"] = array (
	'wood' => '1500',
	'stone' => '1000',
	'iron' => '1500'
	);
	
//Ilo�� wykonywanych akcji bota (im wi�ksza liczba tym wi�cej zu�ywanej jest pami�ci):
$ProBot["akcje"] = 1;

//Jednostki defensywne bota:
$ProBot["def_units"] = array(
	"unit_spear" => "5",
	"unit_sword" => "5",
	"unit_archer" => "5",
	"unit_heavy" => "1",
	);
	
//Jednostki defensywne bota:
$ProBot["off_units"] = array(
	"unit_axe" => "8",
	"unit_light" => "6",
	"unit_cav_archer" => "3",
	"unit_ram" => "2",
	"unit_catapult" => "1",
	"unit_spy" => "1",
	);

//Liczba wiosek, po kt�rej bot przestanie przejmowa� wioski:
$ProBot["bot_max_villages"] = "500";

//Czy bot ma podbija� tylko wioski opuszczone:
$ProBot["bot_podbijanie_barbarek"] = false;

//Czy bot ma farmi�?
$ProBot["bot_farmienie"] = true;

//Zapisywanie informacji o wykonaniu akcji bota:
$ProBot["bot_save_actions"] = false;

//Co ile bot ma si� reloadowa� (dotyczy tylko ProBotReloader.php)
$ProBot["reload_time"] = 0;

if ($ProBot["display"]) {
	//Za�aduj klas� ProBot
	require ("ProBot/ProBot.php");
	
	if (!file_exists("ProBot/ControlUsers.bot")) die("Fatalny b��d bota: nie mo�na odnale�� pliku 'ControlUsers.bot'!!");
	
	$contents_bot = file_get_contents("ProBot/ControlUsers.bot");
	
	$BotsArray = explode('\\',$contents_bot);
	
	$Cl_bot = new ProBot($ProBot,$config,$cl_builds,$cl_units,$cl_techs,$bonus,$awards);
	
	if (!empty($contents_bot) && is_array($BotsArray)) {
		foreach ($BotsArray as $BotName) {
			$BotName = parse($BotName);
			$BotId = sql("SELECT `id` FROM `users` WHERE `username` = '".$BotName."'","array");
			if (is_numeric($BotId) && !empty($BotId)) {
				$Cl_bot->ProBotTourDisplay($BotId);
				}
			}
		}
	}
?>
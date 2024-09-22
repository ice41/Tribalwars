<?php
/*****************************************/
/*=======================================*/
/*     PLIK: bot.php   		 			 */
/*     DATA: 1.05.2012r        			 */
/*     ROLA: Bot podstawowe ustawienia   */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

//Ação do bot (verdadeiro - sim, falso - não):
$ProBot["display"] = true;

// Quantidade mínima de off -off para ataque:
$ProBot["min_off"] = 18000;
	
// quantidade mínima de unidades agrícolas:
$ProBot["min_farm"] = 200;

// quantidade mínima de ponto em que o bot será usado apenas por qualquer folga:
$ProBot["min_vpoints"] = 9000;
	
// recursoss mínimas e mínimas para recrutamento de unidades:
$ProBot["min_res_to_recruit"] = array (
	'wood' => '1500',
	'stone' => '1000',
	'iron' => '1500'
	);
	
// Número de ações de bot executadas (quanto maior o número, mais ele é usado):
$ProBot["akcje"] = 2;

// unidades defensivas de bot:
$ProBot["def_units"] = array(
	"unit_spear" => "5",
	"unit_sword" => "5",
	"unit_archer" => "5",
	"unit_heavy" => "1",
	);
	
// unidades defensivas de bot:
$ProBot["off_units"] = array(
	"unit_axe" => "8",
	"unit_light" => "6",
	"unit_cav_archer" => "3",
	"unit_ram" => "2",
	"unit_catapult" => "1",
	"unit_spy" => "1",
	);

// Número de aldeias após o qual o bot parará de assumir as aldeias:
$ProBot["bot_max_villages"] = "15000";

// Se o bot apenas abandonou as aldeias:
$ProBot["bot_podbijanie_barbarek"] = false;

// O BOT tem Farmia?
$ProBot["bot_farmienie"] = false;

// Economizando informações sobre o desempenho do BOT:
$ProBot["bot_save_actions"] = true;

// Qual o quanto o bot tem alívio (apenas se aplica a ProBotReloader.php)
$ProBot["reload_time"] = 0;

if ($ProBot["display"]) {
	//Carrega a classe ProBot
	require ("ProBot/ProBot.php");
	
	if (!file_exists("ProBot/ControlUsers.bot")) die("Erro fatal do bot: o arquivo não pode ser encontrado 'ControlUsers.bot'!!");
	
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
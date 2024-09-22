<?php
/*****************************************/
/*=======================================*/
/*     PLIK: ProBot_admin_class.php   	 */
/*     DATA: 3.05.2012r        		 */
/*     ROLA: Bot admin klasa	         */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class ProBot_admin {
	//Funkcja usuwaj¹ca wszystkich botów:
	function delete_all_users() {
		if (file_exists("ProBot/ControlUsers.bot")) {
			$contents_bot = file_get_contents("ProBot/ControlUsers.bot");
			save2("ProBot/ControlUsers.bot","");
			
			$BotsArray = explode('\\',$contents_bot);
			
			if (!empty($contents_bot) && is_array($BotsArray)) {
				foreach ($BotsArray as $BotName) {
					$BotName = parse($BotName);
					$BotId = sql("SELECT `id` FROM `users` WHERE `username` = '".$BotName."'","array");
					
					$BotFileCache = "ProBot/$BotId-$BotName.bc";
					if (file_exists($BotFileCache)) {
						unlink($BotFileCache);
						}
					}
				}
			} else {
			save2("ProBot/ControlUsers.bot","");
			}
		}
		
	//Funkcja dodaje bota o wybranej nazwie:
	function add_user($uname) {
		$uid = sql("SELECT `id` FROM `users` WHERE `username` = '".parse($uname)."'","array");
		if (!empty($uid)) {
			$contents_bot = @file_get_contents("ProBot/ControlUsers.bot");
			$BotsArray = explode('\\',$contents_bot);
			$BotsArray[] = $uname;
			$BotsArray = del_emptys($BotsArray);
			if (is_array($BotsArray)) {
				$contents_bot = implode('\\',$BotsArray);
				}
			save2("ProBot/ControlUsers.bot",$contents_bot);
			}
		}
		
	//Funkcja usuwa bota o wybranej nazwie:
	function del_user($uid,$delcache = false) {
		$uname = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$uid."'","array"));
		if (!empty($uname)) {
			$contents_bot = file_get_contents("ProBot/ControlUsers.bot");
			$BotsArray = explode('\\',$contents_bot);
			foreach ($BotsArray as $BotName) {
				if ($BotName !== $uname) {
					$NewArray[] = $uname;
					}
				}
				
			$NewArray = del_emptys($NewArray);
				
			if (!is_array($NewArray)) {
				$contents_bot = "";
				} else {
				$contents_bot = implode('\\',$NewArray);
				}
				
			save2("ProBot/ControlUsers.bot",$contents_bot);
			
			$BotFileCache = "ProBot/$uid-".parse($uname).".bc";
			if (file_exists($BotFileCache) && $delcache) {
				unlink($BotFileCache);
				}
			}
		}
		
	function get_control_users() {
		if (file_exists("ProBot/ControlUsers.bot")) {
			$contents_bot = file_get_contents("ProBot/ControlUsers.bot");
			$BotsArray = explode('\\',$contents_bot);
			}
			
		if (!is_array($BotsArray)) {
			$BotsArray = array();
			}
			
		foreach ($BotsArray as $BotName) {
			$uid = sql("SELECT `id` FROM `users` WHERE `username` = '".parse($BotName)."'","array");
			if (!empty($uid)) {
				$Bkeys[$uid] = $BotName;
				}
			}
			
		if (!is_array($Bkeys)) {
			$Bkeys = array();
			}
			
		return $Bkeys;
		}
	}
?>
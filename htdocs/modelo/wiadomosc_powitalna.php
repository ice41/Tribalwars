<?php 
                                    #############################
                                    #    Plik konfiguracyjny    #
                                    #############################
                                    #    Wiadomo�� powitalna    #
                                    #############################
									#       by Bartekst221      #
									#############################
//Za�aduj ustawienia:
require ('lib/config.php');
//Za�aduj Smarty class i funkcje:
require 'lib/smarty/smarty.class.php';
require 'lib/functions.php';
//Za�aduj centralne ustawienia
require 'include.inc.php';

				//Wy�lij wiadomo�� powitajn�
				$nadawca = $config['mail']['nadawca'];
				$temat = $config['mail']['temat'];	
                $text = $config['mail']['text'];
                $userid = $_COOKIE['gracz_id'];
                $username = $_COOKIE['gracz_username'];				
				send_mail(-1,$nadawca,$userid,$username,parse($temat),parse($text),false);
				
                header('LOCATION: create_village.php'); 				
?>
<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin_edit_serwer.php   	 */
/*     DATA: 10.04.2012r        		 */
/*     ROLA: akcja - admin				 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

if ($conf['admin_key'] === 'actions_massiv_keyaaassd') {


	    		
				

			
	if ($_GET['akcja'] == 'aktywuj' and isset($_POST)) {

       

				$aktywacja = $_POST['aktywacja'];


		$configs_contents = file_get_contents("configs\config.php");
                                   $configs_contents = preg_replace('/\$configs\[(\'|\")aktywacja(\'|\")\]( )*(.*?)( )*\;/',"\$configs['aktywacja'] = '$aktywacja';",$configs_contents);

			$f = fopen("configs\config.php","w");
			fputs($f,$configs_contents);
			fclose($f);

				header('LOCATION: admin.php?screen=configs');
				exit;
				}
				

	if ($_GET['akcja'] == 'baza' and isset($_POST)) {

       
                
				$host = $_POST['host'];
                $user = $_POST['user'];
				$passy = $_POST['passy'];
				$tabela = $_POST['tabela'];

		$configs_contents = file_get_contents("configs\config.php");
                                   $configs_contents = preg_replace('/\$conf\[(\'|\")db_host(\'|\")\]( )*(.*?)( )*\;/',"\$conf['db_host'] = '$host';",$configs_contents);
								   $configs_contents = preg_replace('/\$conf\[(\'|\")db_user(\'|\")\]( )*(.*?)( )*\;/',"\$conf['db_user'] = '$user';",$configs_contents);
								   $configs_contents = preg_replace('/\$conf\[(\'|\")db_pass(\'|\")\]( )*(.*?)( )*\;/',"\$conf['db_pass'] = '$passy';",$configs_contents);
								   $configs_contents = preg_replace('/\$conf\[(\'|\")db_name(\'|\")\]( )*(.*?)( )*\;/',"\$conf['db_name'] = '$tabela';",$configs_contents);

			$f = fopen("configs\config.php","w");
			fputs($f,$configs_contents);
			fclose($f);

				header('LOCATION: admin.php?screen=configs');
				exit;
				}
	if ($_GET['akcja'] == 'edycja_bazy' and isset($_POST)) {

       
                

				$db = $_POST['db'];

		$configs_contents = file_get_contents("configs\config.php");
 
								   $configs_contents = preg_replace('/\$conf\[(\'|\")db_edit(\'|\")\]( )*(.*?)( )*\;/',"\$conf['db_edit'] = '$db';",$configs_contents);

			$f = fopen("configs\config.php","w");
			fputs($f,$configs_contents);
			fclose($f);

				header('LOCATION: admin.php?screen=configs');
				exit;
				}			
	}
?>
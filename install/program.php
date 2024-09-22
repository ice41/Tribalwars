<?php

    $wersja_s = '8.1';
	echo "\r\n  ########################################################################\n";
	echo "  # Programator informacyjny silnika PL-Lan By Bartekst221               #\r\n";
	echo "  #----------------------------------------------------------------------#\r\n";
	echo "  # Copyright (c) 2012-2013 Bartekst221                                  #\r\n";
	echo "  #----------------------------------------------------------------------#\r\n";
	echo "  # Autorzy: Bartekst221 <Tworca programu>                               #\r\n";
    echo "  #----------------------------------------------------------------------#\r\n";
	echo "  #     W razie problemow prosze przejsc na strone silnika plemion:      #\r\n";	
	echo "  #                 www.plemiona-silnik.p.ht/support.php                 #\r\n";		
	echo "  ########################################################################\r\n\r\n";


	/// Where I stand? ///
	$curdir = getcwd();
	list($partition, $nonpartition) = split (':', $curdir); //Fix by Wiedmann
	$partwampp = substr(realpath(__FILE__), 0, strrpos(dirname(realpath(__FILE__)), '\\'));
	$directorwampp = NULL;
	$awkpart = str_replace("&", "\\\\&", eregi_replace ("\\\\", "\\\\", $partwampp)); //Fix by Wiedmann
	$awkpartslash = str_replace("&", "\\\\&", ereg_replace ("\\\\", "/", $partwampp)); //Fix by Wiedmann
	$phpdir = $partwampp;
	$dir = ereg_replace("\\\\", "/", $partwampp);
	$ppartition = "$partition:";

	/// I need the install.sys + update.sys for more xampp informations
	$installsys = "install.sys";
	$installsysroot = $partwampp."\install\\".$installsys;

	/// Some addon|update.sys files
	$perlupdatesys = "perlupdate.sys";
	$pythonupdatesys = "pythonupdate.sys";
	$serverupdatesys = "serverupdate.sys";
	$utilsupdatesys = "utilsupdate.sys";
	$javaupdatesys = "javaupdate.sys";
	$otherupdatesys = "otherupdate.sys";

	/// XAMPP main directrory is ...
	$substit = "\\\\\\\\xampplite";
	$substitslash = "/xampplite";

	/// Globale variables
	$BS = 0;
	$CS = 0;
	$slashi = 1;
	$bslashi = 1;
	$awkexe = ".\install\awk.exe";
	$awk = ".\install\config.awk";
	$awknewdir = "\"".$awkpart."\"";
	$awkslashdir = "\"".$awkpartslash."\"";
	if (file_exists("$partwampp\install\.version")) {
		include_once "$partwampp\install\.version";
	}
	$confhttpdroot = $partwampp."\apache\\conf\\httpd.conf";

	// Find the install status for xampp basic package in the install.sys file
	if (file_exists($installsysroot)) {
		$i = 0;
		$datei = fopen($installsysroot, 'r');
		while (!feof($datei)) {
			$zeile = fgets($datei, 255);
			$sysroot[] = $zeile;
			$i += 1;
		}
		fclose($datei);

		$sysroot[2] = str_replace('perl', 'server', $sysroot[2]); // Fix by Wiedmann
		file_put_contents($installsysroot, implode('', $sysroot));

		list($left, $right) = split (' = ', $sysroot[0]);
		$right = eregi_replace ("\r\n", "", $right);
		if (strtolower($partwampp) == strtolower($right)) {
			$xamppinstaller = "nothingtodo";
		} else {
			$xamppinstaller = "newpath";
			$substit = eregi_replace ("\\\\", "\\\\\\\\", $right);
			$substitslash = eregi_replace("\\\\", "/", $right);
		}
	} else {
		$installsys = fopen($installsysroot, 'w');
		$wamppinfo = "DIR = $partwampp\r\nxampp = $xamppversion\r\nserver = 0\r\nperl = 0\r\npython = 0\r\nutils = 0\r\njava = 0\r\nother = 0";
		fputs($installsys, $wamppinfo);
		fclose($installsys);
		$xamppinstaller = "newinstall";
	}

	/// Find some *update.sys files and modify the install.sys ...
	$path = $partwampp."\install\\";
	$hdl = opendir($path);
	while ($res = readdir($hdl)) { //Searching all xampp sys files
		$array[] = $res;
	 }
	closedir($hdl);
	$werte = count($array);
	for ($q = 2; $q < $werte; $q++) {
		if (($array[$q] == $perlupdatesys) || ($array[$q] == $pythonupdatesys) || ($array[$q] == $serverupdatesys) || ($array[$q] == $utilsupdatesys) || ($array[$q] == $javaupdatesys) || ($array[$q] == $otherupdatesys)) {
			$updatesysroot = $partwampp."\install\\".$array[$q];
			if (file_exists($updatesysroot)) {
				$datei = fopen($updatesysroot, 'r');
				unset($updatezeile);

				$i = 0;
				while (!feof($datei)) {
					$zeile = fgets($datei, 255);
					$updatezeile[] = $zeile;
					@list($left, $right) = split('=', $updatezeile[0]);
					$left = eregi_replace(" ", "", $left);
					$left = eregi_replace("\r\n", "", $left);
					$right = eregi_replace("\r\n", "", $right);
					$update = $left;
					$update = strtolower($update);
					$updateversion = trim($right);
					$updateversionzahl = preg_split('|[.-]|', $updateversion); // Fix by Wiedmann
					if (!isset($updateversionzahl[3])) {
						$updateversionzahl[3] = '';
					}
					$updateinc = "xampp".$update.".inc";
					$updateconf = $update.".conf";
					echo "  Konfiguracja dla $update $updateversion\r\n";
					$i++;
				}
				fclose($datei);

				if (file_exists($installsysroot)) {
					$datei = fopen($installsysroot, 'r');
					unset($newzeile);
					$i = 0;
					while (!feof($datei)) {
						$zeile = fgets($datei, 255);
						$newzeile[] = $zeile;
						$i++;
					}
					fclose($datei);

					/// Analyze install.sys to *update.syse for todo
					$datei = fopen($installsysroot, 'w');
					if ($datei) {
						for ($z = 0; $z < $i + 1; $z++) {
							if (0 === stripos(trim($newzeile[$z]), trim($update))) { // Fix by Wiedmann
								list($left, $right) = split ('=', $newzeile[$z]);
								$left = eregi_replace(" ", "", $left);
								$left = eregi_replace("\r\n", "", $left);
								$right = trim(eregi_replace("\r\n", "", $right));
								$currentversionzahl = preg_split('|[.-]|', $right);; // Fix by Wiedmann
								if (!isset($currentversionzahl[3])) {
									$currentversionzahl[3] = '';
								}
								if ($currentversionzahl == 0 ) {
									$updatemake = "makenew"; // New installation
									$putnew = "$update = $updateversion\r\n";
									fputs($datei, $putnew);
								} elseif (
										(array_sum($currentversionzahl) < array_sum($updateversionzahl)) ||
										((array_sum($currentversionzahl) == array_sum($updateversionzahl)) &&
										($currentversionzahl[3] != $updateversionzahl[3]))) {
									$updatemake = "update";  // Update installation
									$putnew = "$update = $updateversion\r\n"; // Fix by Wiedmann
									fputs($datei, $putnew);
								} else {
									$updatemake = "doppelt"; // Installation is current
									fputs($datei, $newzeile[$z]);
								}
							} else {
								fputs($datei, $newzeile[$z]);
							}
						}
					}
					fclose($datei);

					if (($updatemake == "makenew") || ($updatemake=="doppelt")) {
						include_once "$partwampp\install\\$updateinc";
					}
				}
				// httpd.conf modification for Perl, Python or Java (only single)
				if ($update == "perl") {
					$includehttpdconf = "\r\n\r\nInclude conf/perl.conf";
				}
				if ($update == "python") {
					$includehttpdconf = "\r\n\r\nInclude conf/python.conf";
				}
				if ($update == "java") {
					$includehttpdconf = "\r\n\r\nInclude conf/java.conf";
				}
				if ((($update == "perl") || ($update == "python") || ($update == "java")) && ($updatemake == "makenew")) {
					$datei = fopen($confhttpdroot, 'a');
					if ($datei) {
						fputs($datei, $includehttpdconf);
					}
					@fclose($datei);
					$datei = fopen($confhttpd2root, 'a');
					if ($datei) {
						fputs($datei, $includehttpdconf);
					}
					fclose($datei);
					$datei = fopen($confhttpd3root, 'a');
					if ($datei) {
						fputs($datei, $includehttpdconf);
					}
					fclose($datei);
				}

				unlink($updatesysroot);
			}
		}
	}

	if (($xamppinstaller == "newinstall") || ($xamppinstaller == "newpath")) {
		if ($xamppinstaller == "newinstall") {
			/// First initialization only main packages
			if (file_exists("$partwampp\install\\xamppbasic.inc")) {
				include_once "$partwampp\install\\xamppbasic.inc";
			}
			if (file_exists("$partwampp\install\\xamppserver.inc")) { // Fix by Wiedmann
				include_once "$partwampp\install\\xamppserver.inc";
			}
		} else {
			/// Find all the packages
			if (file_exists("$partwampp\install\\xamppbasic.inc")) {
				include_once "$partwampp\install\\xamppbasic.inc";
			}
			if (file_exists("$partwampp\install\\xamppserver.inc")) {
				include_once "$partwampp\install\\xamppserver.inc";
			}
			if (file_exists("$partwampp\install\\xamppperl.inc")) {
				include_once "$partwampp\install\\xamppperl.inc";
			}
			if (file_exists("$partwampp\install\\xampppython.inc")) {
				include_once "$partwampp\install\\xampppython.inc";
			}
			if (file_exists("$partwampp\install\\xampputils.inc")) {
				include_once "$partwampp\install\\xampputils.inc";
			}
			if (file_exists("$partwampp\install\\xamppjava.inc")) {
				include_once "$partwampp\install\\xamppjava.inc";
			}
			if (file_exists("$partwampp\install\\xamppother.inc")) {
				include_once "$partwampp\install\\xamppother.inc";
			}
			$updatemake = "nothingtodo";
		}
	}

	$scount = count($slashrootreal);
	$bcount = count($backslashrootreal);

	/////////////////// xampp path is changing ///////////////////
	if ($xamppinstaller == "newpath") {
		set_time_limit(0);
		define('NEWSTDIN', fopen("php://stdin", "r")); // Fix by Wiedmann
		while ($BS == "0") {
			echo "  Czy chcesz zainstalowac silnik PL-Lan $wersja_s\n\n";
			echo "  1) Zainstaluj silnik!\n";
			echo "  x) Anuluj instalacje!\n";

			switch (trim(fgets(NEWSTDIN, 256))) { // Fix by Wiedmann
				case 1:
					$BS = 1;
					echo "\r\n  Instalacja silnika...\r\n";
					echo "  Prosze czekac...\r\n\r\n";
					sleep(1);
					break;

				case "x":
					echo "\r\n  Instalacja zostala Anulowana!  exit\r\n";
					sleep(3);
					exit;

				default:
					exit;
			}
		}
		fclose(NEWSTDIN); // Fix by Wiedmann
	}

	/////////////////// You can configure the addon modules for httpd ///////////////////
	if (file_exists($installsysroot)) {
		$datei = fopen($installsysroot, 'r');
		unset($newzeile);
		$i = 0;
		while (!feof($datei)) {
			$zeile = fgets($datei, 255);
			@list($left, $right) = split ('=', $zeile);
			$left = eregi_replace(" ", "", $left);
			$left = eregi_replace("\r\n", "", $left);
			$right = eregi_replace("\r\n", "", $right);
			$right = eregi_replace("\.", "", $right);
			if (strtolower($right) > 0) {
				if (strtolower($left) == "perl") {
					$perlactive = "yes";
				}
				if (strtolower($left) == "python") {
					$pythonactive = "yes";
				}
				if (strtolower($left) == "java") {
					$javaactive = "yes";
				}
			}
		}
		fclose($datei);
	}

	/////////////////// Case new install ///////////////////
	if (($xamppinstaller == "newinstall") || ($BS == 1) || ($updatemake == "makenew") || ($updatemake == "doppelt")) {
		if ($BS == "1") {
			echo "  Aktualizacja sciezek silnika w wszystkich plikach konfiguracyjnych... ... \r\n\r\n";
		}

		echo "  Konfigurowac silnik z  ";
		$system = system("echo '%os%'");
		if ($system != "'Windows_NT'") {
			$system = "Windows";
			echo "  $system 98/ME/HOME (nie NT)";
		}
		echo "  Prosze czekac ...";
		if ($xamppinstaller == "newinstall") {
			if ($system == "Windows") {
				$confhttpdroot = $partwampp."\apache\\conf\\httpd.conf";
				$includewin = "Win32DisableAcceptEx\r\n";
				echo "\r\n  Wylacz AcceptEx Winsocks wsparcie v2 (tylko NT)";
				$datei = fopen($confhttpdroot, 'r');
				unset($newzeile);
				$i = 0;
				while (!feof($datei)) {
					$zeile = fgets($datei, 255);
					$newzeile[] = $zeile;
					$i++;
				}
				fclose($datei);
				$datei = fopen($confhttpdroot, 'w');
				if ($datei) {
					for ($z = 0; $z < $i + 1; $z++) {
						if (eregi("Win32DisableAcceptEx", $newzeile[$z])) {
							fputs($datei, $includewin);
						} else {
							fputs($datei, $newzeile[$z]);
						}
					}
				}
				fclose($datei);
			} else {
				$confhttpdroot = $partwampp."\apache\\conf\\httpd.conf";
				$includewin = "# Win32DisableAcceptEx\r\n";
				echo "\r\n  Wlacz AcceptEx Winsocks wsparcie v2 dla systemow NT";
				$datei = fopen($confhttpdroot, 'r');
				$i = 0;
				unset($newzeile);
				while (!feof($datei)) {
					$zeile = fgets($datei, 255);
					$newzeile[] = $zeile;
					$i++;
				}
				fclose($datei);
				$datei = fopen($confhttpdroot, 'w');
				if ($datei) {
					for ($z = 0; $z < $i + 1; $z++) {
						if (eregi("Win32DisableAcceptEx", $newzeile[$z])) {
							fputs($datei, $includewin);
						} else {
							fputs($datei, $newzeile[$z]);
						}
					}
				}
				fclose($datei);
			}
		}

		$substit = "\"".$substit."\"";
		$trans = array(
			"^" => "\\\\^",
			"." => "\\\\.",
			"[" => "\\\\[",
			"$" => "\\\\$",
			"(" => "\\\\(",
			")" => "\\\\)",
			"+" => "\\\\+",
			"{" => "\\\\{"
		);
		$substit = strtr($substit, $trans);
		for ($i = 0; $i <= $bcount; $i++) {
			///// 08.08.05 Vogelgesang: For all files with identical file names /////
			if ($backslash[$i] == "") {
				$upbackslashrootreal = $backslashrootreal[$i];
			} else {
				$configname = $backslash[$i];
				$upbackslashrootreal = $backslashrootreal[$configname].$configname;

			}
			$backslashawk = eregi_replace("\\\\", "\\\\", $upbackslashrootreal);
			$backslashawk = "\"".$backslashawk;

			$awkconfig = $backslashawk."\"";
			$awkconfigtemp = $backslashawk."temp\"";
			$configreal = $upbackslashrootreal;
			$configtemp = $upbackslashrootreal."temp";

			///////////// Section SET  NEW configfiles for addons/update OR DELETE /////////////
			$configrealnew = $upbackslashrootreal.".new";
			if (!file_exists($configreal) && file_exists($configrealnew)) {
				if (!@copy($configrealnew, $configreal)) {
				} else {
					unlink($configrealnew);
				}
			} elseif (file_exists($configrealnew)) {
				unlink($configrealnew);
			}

			if ($updatemake == "doppelt") {
				break;
			}

			$awkrealm = $awkexe." -v DIR=".$awknewdir." -v CONFIG=".$awkconfig. " -v CONFIGNEW=".$awkconfigtemp. "  -v SUBSTIT=".$substit." -f ".$awk;

			if (file_exists($awk) && file_exists($awkexe) && file_exists($configreal)) {
				$handle = popen($awkrealm, 'w'); // Fix by Wiedmann
				pclose($handle);
			}

			if (file_exists($configtemp) && file_exists($configreal)) {
				if (!@copy($configtemp, $configreal)) {
				} else {
					unlink($configtemp);
				}
			}
		}

		$substitslash = "\"".$substitslash."\"";
		$trans = array(
			"^" => "\\\\^",
			"." => "\\\\.",
			"[" => "\\\\[",
			"$" => "\\\\$",
			"(" => "\\\\(",
			")" => "\\\\)",
			"+" => "\\\\+",
			"{" => "\\\\{"
		);
		$substitslash = strtr($substitslash, $trans);
		for ($i = 0; $i <= $scount; $i++) {
			///// 08.08.05 Vogelgesang: For all files with identical file names /////
			if ($slash[$i] == "") {
				$upslashrootreal = $slashrootreal[$i];
			} else {
				$configname = $slash[$i];
				$upslashrootreal = $slashrootreal[$configname].$configname;
			}
			$slashawk = eregi_replace("\\\\", "\\\\", $upslashrootreal);
			$slashawk = "\"".$slashawk;
			$awkconfig = $slashawk."\"";
			$awkconfigtemp = $slashawk."temp\"";
			$configreal = $upslashrootreal;
			$configtemp=$upslashrootreal."temp";

			///////////// Section SET  NEW configfiles for addons/update OR DELETE /////////////
			$configrealnew = $upslashrootreal.".new";
			if (!file_exists($configreal) && file_exists($configrealnew)) {
				if (!@copy($configrealnew, $configreal)) {
				} else {
					unlink($configrealnew);
				}
			} elseif (file_exists($configrealnew)) {
				unlink($configrealnew);
			}

			if ($updatemake == "doppelt") {
				break;
			}

			$awkrealm = $awkexe." -v DIR=".$awkslashdir." -v CONFIG=".$awkconfig. " -v CONFIGNEW=".$awkconfigtemp. "  -v SUBSTIT=".$substitslash." -f ".$awk;

			if (file_exists($awk) && file_exists($awkexe) && file_exists($configreal)) {
				$handle = popen($awkrealm, 'w'); // Fix by Wiedmann
				pclose($handle);
			}

			if (file_exists($configtemp) && file_exists($configreal)) {
				if (!@copy($configtemp, $configreal)) {
				} else {
					unlink($configtemp);
				}
			}
		}

		if (($xamppinstaller == "newpath") || ($BS == 1)) {
			if (file_exists($installsysroot)) {
				$datei = fopen($installsysroot, 'r');
				unset($newzeile);
				$i = 0;
				while (!feof($datei)) {
					$zeile = fgets($datei, 255);
					$newzeile[] = $zeile;
					$i++;
				}
				fclose($datei);
			}

			$datei = fopen($installsysroot, 'w');
			if ($datei) {
				for ($z = 0; $z < $i + 1; $z++) {
					if (eregi("DIR", $newzeile[$z])) {
						$includenewdir = "DIR = $partwampp\r\n";
						fputs($datei, $includenewdir);
					} else {
						$includenewdir = $newzeile[$z];
						fputs($datei, $includenewdir);
					}
				}
			}
			fclose($datei);
		}

		////////// Replace (copy) some newer files ////////////////
		$phpbin = $partwampp."\\apache\\bin\\php.ini";
		$phpcgi = $partwampp."\\php\\php.ini";
		@copy($phpbin, $phpcgi);

		$workersbin = $partwampp."\\tomcat\\conf\\workers.properties";
		$workersjk = $partwampp."\\tomcat\\conf\\jk\\workers.properties";
		if (file_exists($workersbin)) {
			copy($workersbin,$workersjk);
		}

		echo "  DONE!\r\n\r\n";
		echo "\r\n  ##### Silnik PL-Lan $wersja_s zostal zainstalowany!#####\r\n\r\n\r\n";
		sleep(3);
	}

	//////////////// Selection for modules  ////////////////
	if ((($perlactive == "yes") || ($pythonactive == "yes") || ($javaactive == "yes")) && ($update == "")) {
		$u = 1;

		if ($perlactive == "yes") {
			$moduleconf = "conf/perl.conf";
			$moduleconfigure = "MOD_PERL";
			$u++;
		}
		if ($pythonactive == "yes") {
			$moduleconf = "conf/pyton.conf";
			$moduleconfigure = "MOD_PYTHON";
			$u++;
		}
		if ($javaactive == "yes") {
			$moduleconf = "conf/java.conf";
			$moduleconfigure = "MOD_JDK";
			$u++;
		}

		set_time_limit(0);
		define('NEWSTDIN', fopen("php://stdin", "r"));
		while ($CS == "0") {
			echo "\n  Please select your choice!\n";
			echo "  Bitte jetzt auswaehlen!\n\n";
			if ($perlactive == "yes") {
				echo "  1) Configuration with MOD_PERL (mit MOD_PERL)\n";
				echo "  2) Configuration without MOD_PERL (ohne MOD MOD_PERL)\n";
			}
			if ($pythonactive == "yes") {
				echo "  3) Configuration with MOD_PYTHON (mit MOD_PYTHON)\n";
				echo "  4) Configuration without MOD_PYTHON (ohne MOD_PYTHON)\n";
			}
			if ($javaactive == "yes") {
				echo "  5) Configuration with MOD_JDK (mit MOD_JDK)\n";
				echo "  6) Configuration without MOD_JDK (ohne MOD_JDK)\n";
			}
			echo "  x) Exit (Beenden)\n";

			switch (trim(fgets(NEWSTDIN, 256))) {
				case 1:
					$CS = 1;
					echo "\r\n  Starting configure XAMPP with MOD_PERL ...\r\n";
					sleep(1);
					break;

				case 2:
					$CS = 2;
					echo "\r\n  Starting configure XAMPP without MOD_PERL ...\r\n";
					sleep(1);
					break;

				case 3:
					$CS = 3;
					echo "\r\n  Starting configure XAMPP with MOD_PYTHON ...\r\n";
					sleep(1);
					break;

				case 4:
					$CS = 4;
					echo "\r\n  Starting configure XAMPP without MOD_PYTHON ...\r\n";
					sleep(1);
					break;

				case 5:
					$CS = 5;
					echo "\r\n  Starting configure XAMPP with MOD_JDK ...\r\n";
					sleep(1);
					break;

				case 6:
				$CS = 6;
				echo "\r\n  Starting configure XAMPP without MOD_JDK ...\r\n";
				sleep(1);
				break;

				case "x":
					echo "\r\n  Setup is terminating on demand ...  exit\r\n";
					echo "  Das Setup wurde auf Wunsch abgebrochen ...\r\n";
					sleep(3);
					exit;

				default:
					exit;
			}
		}
		fclose(NEWSTDIN);

		if ($CS == 1) {
			$include = "Include conf/perl.conf"; $searchstring="conf/perl.conf";
		}
		if ($CS == 2) {
			$include = "# Include conf/perl.conf"; $searchstring="conf/perl.conf";
		}
		if ($CS == 3) {
			$include = "Include conf/python.conf"; $searchstring="conf/python.conf";
		}
		if ($CS == 4) {
			$include = "# Include conf/python.conf"; $searchstring="conf/python.conf";
		}
		if ($CS == 5) {
			$include = "Include conf/java.conf"; $searchstring="conf/java.conf";
		}
		if ($CS == 6) {
			$include = "# Include conf/java.conf"; $searchstring="conf/java.conf";
		}

		if ($CS > 0) {
			$i = 0;
			$datei = fopen($confhttpdroot, 'r');
			while (!feof($datei)) {
				$zeile = fgets($datei, 255);
				$newzeile[] = $zeile;
				$i++;
			}
			fclose($datei);
			$datei = fopen($confhttpdroot, 'w');
			if ($datei) {
				for ($z = 0; $z < $i + 1; $z++) {
					if (eregi($searchstring, $newzeile[$z])) {
						fputs($datei, $include);
					} else {
						fputs($datei, $newzeile[$z]);
					}
				}
			}
			fclose($datei);
			unset($newzeile);
			$i = 0;
			$datei = fopen($confhttpd2root, 'r');
			while (!feof($datei)) {
				$zeile = fgets($datei, 255);
				$newzeile[] = $zeile;
				$i++;
			}
			fclose($datei);
			$datei = fopen($confhttpd2root, 'w');
			if ($datei) {
				for($z = 0; $z < $i + 1; $z++) {
					if (eregi($searchstring, $newzeile[$z])) {
						fputs($datei, $include);
					} else {
						fputs($datei, $newzeile[$z]);
					}
				}
			}
			fclose($datei);
			unset($newzeile);
			$i = 0;
			$datei = fopen($confhttpd3root, 'r');
			while (!feof($datei)) {
				$zeile = fgets($datei, 255);
				$newzeile[] = $zeile;
				$i++;
			}
			fclose($datei);
			$datei = fopen($confhttpd3root, 'w');
			if ($datei) {
				for ($z = 0; $z < $i + 1; $z++) {
					if (eregi($searchstring, $newzeile[$z])) {
						fputs($datei, $include);
					} else {
						fputs($datei, $newzeile[$z]);
					}
				}
			}
			fclose($datei);
			unset($newzeile);
			echo "  Done!\r\n\r\n";
		}
	}

	if (file_exists($partwampp.'\install\serverupdate.inc')) { // Fix by Wiedmann
		include $partwampp.'\install\serverupdate.inc';
		unlink($partwampp.'\install\serverupdate.inc');
		echo "\r\n".'Ready.'."\r\n";
	}

	if ($updatemake == "") {
		$updatemake="nothingtodo";
	}

	if (($updatemake == "nothingtodo") && ($xamppinstaller == "nothingtodo") && (($CS < 1) || ($CS == ""))) {
		set_time_limit(0);
		define('NEWSTDIN', fopen("php://stdin", "r")); // Fix by Wiedmann
		while ($BS == "0") {



     		echo "  Jaka opcje chcesz zobaczyc?\n\n";
			echo "  Programisci) Sprawdz liste Programistow!\n";
			echo "  Wersja) Zobacz jaka masz wersje silnika!\n";
			echo "  Exit) Zamknij program!\n";
			echo "  Aktualizacja) Zobacz czy jest dostepna aktualizacja!\n";
            echo "  IP) Sprawdza czy na jakis IP jest zalozony inny serwer\n";			
			switch (trim(fgets(NEWSTDIN, 256))) { // Fix by Wiedmann
				case "programisci":

					echo "\r\n  Aktualny Programista silnika:\r\n";
					echo "  Bartekst221\r\n\r\n";
					sleep(1);
					break;
				case "aktualizacja":
//Zewnętrzen połączenie w celu sprawdzenia wersji
$handle=fopen("http://plemiona-silnik.p.ht/wersja.php", 'r');
$check=fgetcsv($handle,1024);
fclose($handle);
					echo "\r\n  Posiadasz wersje $wersja_s\r\n";
					echo "  Najnowsza wersja to $check[0]\r\n\r\n";

if($check[0] != $wersja_s){
echo "\r\n  Posiadasz stara wersje silnika - mozesz ja zaktualizowac wpisujac 'dwnld'\r\n";
}
if($check[0] == $wersja_s){
echo "/r/n  Posiadasz najnowsza wersje silnika!/r/n";
}
					sleep(1);
					break;					
				case "wersja":

					echo "\r\n  Aktualna wersja silnika ktora posiadasz:\r\n";
					echo "  $wersja_s\r\n\r\n";

					sleep(1);
					break;
				case "dwnld":

					echo "\r\n  Aby pobrac najnowszom wersje wejdz na te strone:\r\n";
					echo "\r\n http://plemiona-silnik.p.ht/najnowsza.php\r\n" ;

					sleep(1);
					break;	
                case "IP":
				$ips = array('192.168.0.1','192.168.0.2','192.168.0.3','192.168.0.4','192.168.0.5','192.168.0.6','http://www.plemiona.pl');
                $header = get_headers('http://www.plemiona.pl');
				foreach ($ips as $ip) {
                if(strpos($header[0],"404")) {
                    echo 'IP '.$ip.' jest poprawny! \r\n';   	
                    $pip++;					
                    } else {
 
					}
				}	
				if ($pip <= 0) {
				echo 'Nie ma zadnego serwera zalozonym na twoim domowym IP!';
				}
                sleep(1);
                exit;				
				case "Exit":
					echo "\r\n  Zamykanie programu...  exit\r\n";
					sleep(3);
					exit;

		fclose(NEWSTDIN); // Fix by Wiedmann
			}
		}

		
		
		
		
	}

	exit;
?>


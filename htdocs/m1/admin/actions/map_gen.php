<?php

$type=1;
//type=1 inseamna impartita in 4 tabele
//type=0 o singura tabela






ini_set("memory_limit", "1000M");
if (!function_exists('free_arround')) {
	function free_arround($x_coord,$y_coord,$coord){

		if (($coord[$y_coord+1][$x_coord]['type']=="grass" OR !$coord[$y_coord+1][$x_coord]['type']) AND ($coord[$y_coord+1][$x_coord+1]['type']=="grass" OR !$coord[$y_coord+1][$x_coord+1]['type']) AND ($coord[$y_coord][$x_coord+1]['type']=="grass" OR !$coord[$y_coord][$x_coord+1]['type']) AND ($coord[$y_coord-1][$x_coord+1]['type']=="grass" OR !$coord[$y_coord-1][$x_coord+1]['type']) AND ($coord[$y_coord-1][$x_coord]['type']=="grass" OR !$coord[$y_coord-1][$x_coord]['type']) AND ($coord[$y_coord-1][$x_coord-1]['type']=="grass" OR !$coord[$y_coord-1][$x_coord-1]['type']) AND ($coord[$y_coord][$x_coord-1]['type']=="grass" OR !$coord[$y_coord][$x_coord-1]['type']) AND ($coord[$y_coord+1][$x_coord-1]['type']=="grass" OR !$coord[$y_coord+1][$x_coord-1]['type'])) {

			$text=1;

		} else {

			$text=0;

		}

		return $text;
	}
}


if (!function_exists('free_berg')) {
	function free_berg($x_coord,$y_coord,$coord){

		if (($coord[$y_coord+1][$x_coord]['type']=="grass" OR !$coord[$y_coord+1][$x_coord]['type']) AND ($coord[$y_coord+1][$x_coord-1]['type']=="grass" OR !$coord[$y_coord+1][$x_coord-1]['type']) AND ($coord[$y_coord][$x_coord-1]['type']=="grass" OR !$coord[$y_coord][$x_coord-1]['type'])) {

			$text=1;

		} else {

			$text=0;

		}

		return $text;
	}
}

if (!function_exists('free')) {
	function free($x_coord,$y_coord,$coord){

		if (($coord[$y_coord][$x_coord]['type']=="grass" OR !$coord[$y_coord][$x_coord]['type']) AND $coord[$y_coord][$x_coord]['image']<>"forest0000.png" AND $coord[$y_coord][$x_coord]['image']<>"forest0001.png" AND $coord[$y_coord][$x_coord]['image']<>"forest0010.png" AND $coord[$y_coord][$x_coord]['image']<>"forest0011.png" AND $coord[$y_coord][$x_coord]['image']<>"forest0100.png" AND $coord[$y_coord][$x_coord]['image']<>"forest0101.png" AND $coord[$y_coord][$x_coord]['image']<>"forest0110.png" AND $coord[$y_coord][$x_coord]['image']<>"forest0111.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1000.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1001.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1010.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1011.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1100.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1101.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1110.png" AND $coord[$y_coord][$x_coord]['image']<>"forest1111.png"){

			$text=1;

		} else {

			$text=0;

		}

		return $text;
	}
}




if ($_GET['generate']==1) {

	$start=time();
	settype($coordonate, "array");

	if ($type==0) {

		$sql3 = "CREATE TABLE IF NOT EXISTS `map` (
	  `id` int(10) NOT NULL auto_increment,
	  `x` smallint(3) NOT NULL,
	  `y` smallint(3) NOT NULL,
	  `type` enum('grass','berg','see','forest','other') collate latin1_general_ci NOT NULL default 'other',
	  `image` varchar(100) collate latin1_general_ci NOT NULL,
	  PRIMARY KEY  (`id`),
	  KEY `x` (`x`),
	  KEY `y` (`y`)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";
		$exec_sql2 = mysql_query($sql3) or die(mysql_error());

		$sql3 = "TRUNCATE TABLE  `map`";
		$exec_sql2 = mysql_query($sql3) or die(mysql_error());


	} elseif ($type==1) {

	$sql3 = "CREATE TABLE IF NOT EXISTS `map00` (
	  `id` int(10) NOT NULL auto_increment,
	  `x` smallint(3) NOT NULL,
	  `y` smallint(3) NOT NULL,
	  `type` enum('grass','berg','see','forest','other') collate latin1_general_ci NOT NULL default 'other',
	  `image` varchar(100) collate latin1_general_ci NOT NULL,
	  PRIMARY KEY  (`id`),
	  KEY `x` (`x`),
	  KEY `y` (`y`)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	$sql3 = "CREATE TABLE IF NOT EXISTS `map01` (
	  `id` int(10) NOT NULL auto_increment,
	  `x` smallint(3) NOT NULL,
	  `y` smallint(3) NOT NULL,
	  `type` enum('grass','berg','see','forest','other') collate latin1_general_ci NOT NULL default 'other',
	  `image` varchar(100) collate latin1_general_ci NOT NULL,
	  PRIMARY KEY  (`id`),
	  KEY `x` (`x`),
	  KEY `y` (`y`)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	$sql3 = "CREATE TABLE IF NOT EXISTS `map11` (
	  `id` int(10) NOT NULL auto_increment,
	  `x` smallint(3) NOT NULL,
	  `y` smallint(3) NOT NULL,
	  `type` enum('grass','berg','see','forest','other') collate latin1_general_ci NOT NULL default 'other',
	  `image` varchar(100) collate latin1_general_ci NOT NULL,
	  PRIMARY KEY  (`id`),
	  KEY `x` (`x`),
	  KEY `y` (`y`)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	$sql3 = "CREATE TABLE IF NOT EXISTS `map10` (
	  `id` int(10) NOT NULL auto_increment,
	  `x` smallint(3) NOT NULL,
	  `y` smallint(3) NOT NULL,
	  `type` enum('grass','berg','see','forest','other') collate latin1_general_ci NOT NULL default 'other',
	  `image` varchar(100) collate latin1_general_ci NOT NULL,
	  PRIMARY KEY  (`id`),
	  KEY `x` (`x`),
	  KEY `y` (`y`)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	$sql3 = "TRUNCATE TABLE  `map00`";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	$sql3 = "TRUNCATE TABLE  `map11`";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	$sql3 = "TRUNCATE TABLE  `map01`";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	$sql3 = "TRUNCATE TABLE  `map10`";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());

	}

	for ($y = 1; $y <= 999; $y++) {
		for ($x = 1; $x <= 999; $x++) {

			if (!$coord[$y][$x]['activ']) {

				$do=rand(0, 100);
				if ($do>0 AND $do<=30) {

					$tip=rand(1, 6);

					if ($tip==1){
					$x_coord=$x;
					$y_coord=$y;

					$liber=free_arround($x_coord,$y_coord,$coord);


					if ($liber==1 OR $liber==6){

						$coord[$y_coord][$x_coord]['type']="see";
						$coord[$y_coord][$x_coord]['image']="see.png";
						$coord[$y_coord][$x_coord]['activ']=1;

					} else {
					/*	$grass=rand(1, 4);
						$x_coord=$x;
						$y_coord=$y;
						$coord[$y_coord][$x_coord]['type']="grass";
						$coord[$y_coord][$x_coord]['image']="gras$grass.png";
						$coord[$y_coord][$x_coord]['activ']=1; */
					}

					} elseif ($tip==2) {
					$x_coord=$x;
					$y_coord=$y;
					$free=free_berg($x_coord,$y_coord,$coord);
					$free_around=free_arround($x_coord,$y_coord,$coord)+free_arround($x_coord,$y_coord+1,$coord)+free_arround($x_coord-1,$y_coord+1,$coord)+free_arround($x_coord-1,$y_coord,$coord);
					if ($free==1 AND $free_around>2) {

						$coord[$y_coord][$x_coord]['type']="berg";
						$coord[$y_coord][$x_coord]['image']="berg4.png";
						$coord[$y_coord][$x_coord]['activ']=1;

						$x_coord=$x;
						$y_coord=$y+1;
						$coord[$y_coord][$x_coord]['type']="berg";
						$coord[$y_coord][$x_coord]['image']="berg3.png";
						$coord[$y_coord][$x_coord]['activ']=1;

						$x_coord=$x+1;
						$y_coord=$y+1;
						$coord[$y_coord][$x_coord]['type']="berg";
						$coord[$y_coord][$x_coord]['image']="berg2.png";
						$coord[$y_coord][$x_coord]['activ']=1;

						$x_coord=$x+1;
						$y_coord=$y;
						$coord[$y_coord][$x_coord]['type']="berg";
						$coord[$y_coord][$x_coord]['image']="berg1.png";
						$coord[$y_coord][$x_coord]['activ']=1;

					} else {
						/* $grass=rand(1, 4);
						$x_coord=$x;
						$y_coord=$y;
						$coord[$y_coord][$x_coord]['type']="grass";
						$coord[$y_coord][$x_coord]['image']="gras$grass.png";
						$coord[$y_coord][$x_coord]['activ']=1; */
					}

					//} elseif ($tip==3 OR $tip==4 OR $tip==5) {
					} elseif ($tip==3 OR $tip==4) {

						$forest_num=rand(1, 6);
						$x_coord=$x;
						$y_coord=$y;
						if ($forest_num==1 or $forest_num==5) {
							$x_coord=$x;
							$y_coord=$y;
							$coord[$y_coord][$x_coord]['type']="grass";
							$coord[$y_coord][$x_coord]['image']="forest0000.png";
							$coord[$y_coord][$x_coord]['activ']=1;
						}
						if ($forest_num==2) {
							$forest_2_dir=rand(1, 2);
							if ($forest_2_dir==1) {
								$x_coord=$x;
								$y_coord=$y;
								if (free($x_coord,$y_coord+1,$coord)==1) {
									$coord[$y_coord][$x_coord]['type']="grass";
									$coord[$y_coord][$x_coord]['image']="forest0010.png";
									$coord[$y_coord][$x_coord]['activ']=1;


									$x_coord=$x;
									$y_coord=$y+1;

									$coord[$y_coord][$x_coord]['type']="grass";
									$coord[$y_coord][$x_coord]['image']="forest1000.png";
									$coord[$y_coord][$x_coord]['activ']=1;
								}
							}
							if ($forest_2_dir==2) {

								$x_coord=$x;
								$y_coord=$y;
								if (free($x_coord+1,$y_coord,$coord)==1) {
									$coord[$y_coord][$x_coord]['type']="grass";
									$coord[$y_coord][$x_coord]['image']="forest0001.png";
									$coord[$y_coord][$x_coord]['activ']=1;

									$x_coord=$x+1;
									$y_coord=$y;

									$coord[$y_coord][$x_coord]['type']="grass";
									$coord[$y_coord][$x_coord]['image']="forest0100.png";
									$coord[$y_coord][$x_coord]['activ']=1;
								}
							}
						}

						if ($forest_num==3) {
							$x_coord=$x;
							$y_coord=$y;
							$coord[$y_coord][$x_coord]['type']="grass";
							$coord[$y_coord][$x_coord]['image']="forest0010.png";
							$coord[$y_coord][$x_coord]['activ']=1;

							$x_coord=$x-1;
							$y_coord=$y+2;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest1001.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}


							$x_coord=$x;
							$y_coord=$y+2;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest1100.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

							$x_coord=$x;
							$y_coord=$y+1;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest1111.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

							$x_coord=$x-1;
							$y_coord=$y+1;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest0011.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

						}

						if ($forest_num==4) {
							$x_coord=$x;
							$y_coord=$y;
							$coord[$y_coord][$x_coord]['type']="grass";
							$coord[$y_coord][$x_coord]['image']="forest0010.png";
							$coord[$y_coord][$x_coord]['activ']=1;


							$x_coord=$x;
							$y_coord=$y+1;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest1011.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

							$x_coord=$x;
							$y_coord=$y+2;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest1001.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

							$x_coord=$x+1;
							$y_coord=$y+2;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest0100.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

						}


						if ($forest_num==6) {
							$x_coord=$x;
							$y_coord=$y;
							$coord[$y_coord][$x_coord]['type']="grass";
							$coord[$y_coord][$x_coord]['image']="forest0001.png";
							$coord[$y_coord][$x_coord]['activ']=1;

							$x_coord=$x+1;
							$y_coord=$y;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest0101.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

							$x_coord=$x+2;
							$y_coord=$y;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest0101.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}


							$x_coord=$x+3;
							$y_coord=$y;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest0111.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}


							$x_coord=$x+3;
							$y_coord=$y+1;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest1000.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}


							$x_coord=$x+4;
							$y_coord=$y;
							if (free($x_coord,$y_coord,$coord)==1) {
								$coord[$y_coord][$x_coord]['type']="grass";
								$coord[$y_coord][$x_coord]['image']="forest0100.png";
								$coord[$y_coord][$x_coord]['activ']=1;
							}

						}


					}

				} else {

					/* $grass=rand(1, 4);
					$x_coord=$x;
					$y_coord=$y;
					$coord[$y_coord][$x_coord]['type']="grass";
					$coord[$y_coord][$x_coord]['image']="gras$grass.png";
					$coord[$y_coord][$x_coord]['activ']=1; */

				}

				if ($coord[$y][$x]['type']=='') {

					/* $grass=rand(1, 4);
					$x_coord=$x;
					$y_coord=$y;
					$coord[$y_coord][$x_coord]['type']="grass";
					$coord[$y_coord][$x_coord]['image']="gras$grass.png";
					$coord[$y_coord][$x_coord]['activ']=1; */


				}


			}
			if ($x==999) {
				$x=9999;
			}
		}
		@ob_flush(); @flush();
		if ($y==999) {
			$y=9999;
		}
	}

	foreach($coord as $key1 => $value1) {
		foreach ($coord[$key1] as $key2 => $value2) {
			if ($key1>-1 AND $key2>-1 AND $key1<1000 AND $key2<1000) {

				if ($type==0) {


					$type=$coord[$key1][$key2]['type'];
					$image=$coord[$key1][$key2]['image'];
					$insert[$key1].='(\''.$key2.'\',\''.$key1.'\',\''.$type.'\',\''.$image.'\'),';

				} elseif ($type==1) {

					$type=$coord[$key1][$key2]['type'];
					$image=$coord[$key1][$key2]['image'];
					$table_ver_x=floor($key2/500);
					$table_ver_y=floor($key1/500);
					$table_sufix=$table_ver_x.$table_ver_y;

					$sql3 = "INSERT INTO `map$table_sufix` (x,y,type,image) VALUES ('$key2','$key1','$type','$image')";
					$exec_sql2 = mysql_query($sql3) or die($sql3);

				}
			}
		}

		if ($type==0) {
			if ($insert[$key1]) {
				$insert[$key1]=substr($insert[$key1],0,-1);
			}
		}
	}



	if ($type==0) {
		foreach($insert as $key => $value) {
			$sql3 = "INSERT INTO `map` (x,y,type,image) VALUES $value";
			$exec_sql2 = mysql_query($sql3) or die($sql3);
		}
	}


	$end=time();
	$diff=$end-$start;
	$mesaj= "<h5>Generarea a fost efectuata cu succes in $diff secunde</h5>";
	$tpl->assign('mesaj',$mesaj);
}
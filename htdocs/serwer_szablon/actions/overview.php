<?php 
$labels = sql("SELECT `o_labels` FROM `users` WHERE `id` = '".$user['id']."'","array");
$ower_style = sql("SELECT `o_style` FROM `users` WHERE `id` = '".$user['id']."'","array");
$ower_anims = sql("SELECT `o_anims` FROM `users` WHERE `id` = '".$user['id']."'","array");

if ($labels == 1) {
	$_labels = true;
    } else {
	$_labels = false;
	}
	
if ($_GET['akcja'] == 'o_labels') {
    if ($_labels === true) {
	    mysql_query("UPDATE `users` SET `o_labels` = '0' WHERE `id` = '".$user['id']."'");
	    }
	if ($_labels === false) {
		mysql_query("UPDATE `users` SET `o_labels` = '1' WHERE `id` = '".$user['id']."'");
	    }
	header ('location: game.php?village='.$village['id'].'&screen=overview');
	exit;
    }
	
if ($ower_style == 1) {
    $o_style = 'new';
    } else {
	$o_style = 'classic';
	}
	
if ($_GET['akcja'] == 'o_style') {
	if ($o_style === 'new') {
	    mysql_query("UPDATE `users` SET `o_style` = '0' WHERE `id` = '".$user['id']."'");
	    }
	if ($o_style === 'classic') {
		mysql_query("UPDATE `users` SET `o_style` = '1' WHERE `id` = '".$user['id']."'");
	    }
	header ('location: game.php?village='.$village['id'].'&screen=overview');
	exit;
    }
	
if ($ower_anims == 1) {
	$_anims = true;
    } else {
	$_anims = false;
	}
	
if ($_GET['akcja'] == 'o_anims') {
	if ($_anims === true) {
	    mysql_query("UPDATE `users` SET `o_anims` = '0' WHERE `id` = '".$user['id']."'");
	    }
	if ($_anims === false) {
		mysql_query("UPDATE `users` SET `o_anims` = '1' WHERE `id` = '".$user['id']."'");
	    }
	header ('location: game.php?village='.$village['id'].'&screen=overview');
	exit;
    }
	


$coords = array (
    'main' => '373,187,417,129,407,72,329,65,306,99,311,150',
	'barracks' => '392,289,444,313,506,283,481,235,442,216,392,252',
	'stable' => '64,241,70,265,150,307,189,289,184,232,99,202',
	'garage' => '284,358,362,361,402,321,369,283,346,278,291,320',
	'snob' => '206,149,257,125,229,60,185,80,156,111',
	'smith' => '174,335,222,361,271,342,283,301,216,262',
	'place' => '315,271,379,275,401,229,375,206,343,207',
	'market' => '214,149,234,228,313,230,330,169,273,122',
	'wood' => '472,379,523,417,583,373,528,330',
	'stone' => '34,300,0,349,15,399,67,417,91,402,92,341',
	'iron' => '0,55,45,90,93,58,89,6,39,9',
	'farm' => '456,0,477,41,526,75,583,88,597,18,597,0',
	'storage' => '96,192,153,218,195,215,193,148,133,121',
	'hide' => '241,80,261,113,294,93,268,63',
	'wall' => '428,333,430,382,472,363,470,318',
	'statue' => '277,231,256,265,266,285,292,287,306,266'
    );
$tpl->assign('builds_graphic_coords',$coords);
$tpl->assign('anims',$_anims);
$tpl->assign('labels',$_labels);
$tpl->assign('style',$o_style);
$tpl->assign('pala_name',entparse($user['pala_name']));
eaccelerator_load('eJyVWltTG8kV7taIRcbL2guuTZUrrpVjdtgCDF7v+gKSqJIAGXzRDh5sbhIqSTMGLUIioxEXu5LKY97ynuf8hjznb+RH5AekKg/p07fpbs2obFeZ6ek+fb7vXPpyJG0U19Y2Xm+8Le78+halEUIYoRRCtxH820zRB3IsOoCte+RZXNvZ+rXi1t8UXXfr/auN/frm1ovNYpG8rq/jKRBFaYytR+TZ935rnPS905ebbvHl+qvN4utX0Fynfyr937yTxin52zl5WSm6669ez8PsFOHxK6Vi3QW807Dd6/azD7PFQf/D/06CQfc4u7G3sXbfHafssHWD/G116s1Bu+P1cQ66cZr3H/thvREEjesidBew9RV5eM1u48zH0DHObCb/M1IfiHBlNvRZmFj0YoIOZjLuBBf7mouFAtmeYMIp7N4cVvUG+jBYV4FWKp1OlZEUBFe3PTbRQhrNJvSNkQkYiCL6iukrvNvw+hW20mO0RbmWoZV2J+P9Myn8M8H90/V9z/eqk9IVkk5pkjqNeioazkjNwJLNxvakQG9B9pAMgBiGwcB3b3Ppm1K67vW6PrZvC3853w6bTftgGoTgot3pNI59vE07CY20Nc2amCXc/Lc0dXLInRrm9gb68Di4HlqpTHp8ORIcl5iPMe20eHA5134IyM0pFoUMj8IUi0KGR2FKRoFpgChAK+NMx5kxLc2g47GI09PMtLQ1P02N+xG17jDXjpHHh0an77t3knx7R/h27jvS+hH99B0N+/jc78hzFbXumpruJmm6K6P0+wSReRhIo1vIuUedJPOHvmM9ru49xWBt/ezco/rBifdEMs19T1q30E/fU/Yp9z6nkGE5Pei2Q5LS99WUDvyGxwaK92n6WtzZqHqf+pHBq/GoiQFMUDn5EpsML4VoOCMZgOcYvH1fsH3xgI6RTeIBl4IUb3frHIjztR8Il7ozQ9reQBe+AckKrdRE+sYHJOVUR85wS8C+7uAMN2dYik7wFJ1hKTrBU3RGpuiM4FuG1oTzA4+SUDT1A8s8bMHER/M2Nf8dcmweXnWZ2sZk1+a0Yk3fsWWMbRnjWdJ6h36apVG8kZsDiQy2voEYNzqteuM48P0zvxtW53gkzQVVgoECHSoIGQjWXEywd+YYBbYxSt32nODjPFSc3ep1P7SP8fZDnkQsVP1zkv7TrA9PUGfNP6Re+jOS07UVTzst6IZ98bLX86gceA7sJGdU/TzoeYMWHHdcHNxhSbEhNpZYwJSN9ZAtgrSVpqMpEvY8eRbhLZ+iLsk/VPxHl36n1wu+g96baTQHz79+GX80ij/b4BK9aWnepPzpdvf5jF2he4pzohzqvQs/uGj7l9ims8kauOksxrBYjInpohbTRRrTvyM5XfPJom5FSPZCKpgU1MUoqEJsiI4R1EUZ1EUtqIuKixZjXQS9X5OgwvMfX2hAUlSFw7gBsf40orooo/rZlF2he1qQMsO6yMP6tbMUQ2MpJqxLWliXaFj/ieR0zStLWqq3g16XyiVFdSmKqhAbYmNEdUlGdUmL6pLioqVYF0HvJIkqPP/1ZfyTgircxfnHetMI6pIM6mczdoXuKc7JjOkSj+nki8dUkByij/kUuCmcXdfPiDDs1OQAhRF6gL74WQj/rOjvNy7I3YQ7pEKOKTLlZzHF/YVLAtc2tn9hwOzQdJ7EhPAJjzC2bkFvo9vyO5KN9YQFk4XQfcKV34wkwzY5J+0nEv8pF4EbhdfEuadcAXXaHwd+cO08RcPn1vZTFih5Q8lQKWwdAy6p4tZ2sm1v4UPQOxOmL4S9qHl97i+Qm2UQUkILftdjDa/tZ2FSVvo3e3niB362DyKqusJsGlNQnLLY6pzN9gLPD7LN66zQVwSBQooVDU9RdBYLs8Gzgd8fdEJsMwtIKrnPDKc8U51S9sPWSfWZVKYpKUE/L1KEiEXwnqHoYhL0SIZxCHKfhlYa/QU7zxG70LBUoK9ImbL9nK8N4XJXSAyl5M5ztkzSYztMRobJfi6MdJZ1uGUTblnCwUYVBc9dToRdlrDLAlafay9L+BUdfsWEX5HwtHYjCeOuJAKvSOAVASxm2SsSMqdD5kzInGZxlJ5uLhE4J4FzqsXRXDsn4fM6fN6Ez0t4KChECrv5RPC8BM8LcHWmnZfQBR26YGTjdgExEF1BnnfT1U/9STpTBcTPC7eQyKwgmRVUt5Ddvn3R6NTbXbuARCG3SlrfRNxWTW6rkpvuWSlp7m4YBgjfNM7zuVRMGHCHdqbJtjEPrRR6wEDREKiWfd/yaWy5N8Kw0TpdYArufaEC2Ej7g/PzXhB+FgXoIhvjlFBAtxc5swWNW9FHHHPwPiO7o6JaIAyHi3kSpb/ZWVV9TZxaZ461qQQJ1y2nZManpMUnWuslGMjTHdApceiE85CLwhaVLyFW3iJetdEPzOqn/nXdv2r3w/4CCKRRAztrpsfWhnw+taYGLfDDQdCdX6MIq9hd5wrENr+Ohs6+dRSVtRRjnWEM7WyZdZbmUMTy8w9KUnaYcRlxlrU9enhRODi8wEWzRXgVR9U6io4qwXIciVPmMbYZGtSrG6S1id2yYUt52JayaUtZ2gIpoR6umfIXW1PWrSkr1pQVa8px1pSFNe6mYcamagY7eTelNl1LCQb40bupIAqVsE1w6l4jbGB7U6A6W0jdHnPwCjU/2wvD80bQ96tbCqypqiYGkfisEbxVgl7+OcCWQmgrcR1uIbFtMhmLXZKjLAO19pbk/dJcAbRjbPjMlpImczZDrhnQ777keZKwWHeYLvjU5KXMwldgC3YquiMrMY6kMhpp2mENk65WFJcnkKkJGXqXKlUij0eTM66AHPZ4RXq8MsLjFelxRzfQ4QbCB5zw6bXQXCfc+mCCo5ggDK45yMgW2KpKjuROUSyJQpWkkkyoiVFaNdUU2ThTOApIFGmT0epdduFRYMDMaU6i0xzpNEc4DRYit9l2hLfeb3MVzI4/bFNWaO4tef4bvXhHB0m19I6LQUHTC8mmolZX75AoVd5r2uz3SCmV3F0+KDaOXTS0/+2imDpml+V/VMfsMoNAe1Idk1C8jChcoiDQvZKSg70SPtuczRYr61kicdL2PL9bmH0UV8jAFLGf7iqpLexWC5ldEQB3z/DKnuoVtp3uKRmqFjJ7SO6mQgQKmT0jme09sfjmoZVGYylnX1sk9FVb8PvM51EhIyTiEmBnX2bbvsg2Xsvsy2V5oCMemIgHEtE86dyDUdgHEvtAYJsK7APJ4lBncWiyOJQsZElzOAr9UKIfCnRZ1RxK1KqOWjVRqxLVqGqqo7CrErsqsI3CpioZ1HQGNZNBTTLQCpvaKPyaxK8JfK22qUn0Ix39yEjQ7SPEcIzahnfrtc0RErXN0ShyR5Lckeocpbw5QqK8aZh8GpKPmUolGOI35gbHT7oxM1F6Y4bmyBszCKTRf7Db5FJiO2iioU2yiYxLYpMFL+6S2ERfekmkgNElEV7FptZE0aYmeGqXxKaIuNsyzGipZrBdrSW1GZdEGODbWktBFCqHLoktmWeelmc5eB26JHoK7NAlUQzql0To5VcWTyHkjco/T+afJ/LvthEcem/xJHmfq5NhpR1jcTuilB26K/osFdS7oo9G3xWZLrgr+oLL3AfS+i922ro/2zH+pDIabdphxdGuthXfJ90WhQy7LbYj10eTM64AjXV9W7q+PdL1ben6U81O+mrprzgBbPsUCa6sicUSN+Hc01GcTyXnU8FZva+dCqrvO1wLv691ELuvnZHn3/B+j1OFVeYHQS/Ar3ssmxfOEWxBEyn3nGuIZOxzpoV98+0GSkTD8w7OBYgvXvqxSr/fPu4Woa8Qc/Mk79UAietujECJzaTfk0tBnHH7Jmo/BrXPUONcCMB9BThOptSPsPsKdmhihzHYYWSx9jMEAA4NizWBUhihhgrqwEQdxKAOGKr8LoXCDVD0uwTli4faACk/S5BTSoMIf6DgX5j4FzH4Fwxf/00QcLhQTNZHSxcR3oWCd2niXcbgXTI87fcaAHepwGmDpcsI7VJBuzLRrmLQrhha7E8PAPVKQY0VKl1F6FcK+rWJfh2Dfs3QE76MBvxrBT9BrHQdMbhWGHw0GXyMYfCRMUj64hQofFQoJMmVPkYcPiocPpkcPsVw+BR5IeZ7PqDwyfBCjFjpU8TgU8Rg9U/0yc4ThP4P21b9bg=='); ?>
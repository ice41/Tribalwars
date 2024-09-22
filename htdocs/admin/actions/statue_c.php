<?php

$sql1 = "ALTER TABLE `villages` ADD `statue` INT(5) NULL DEFAULT '0' AFTER `place`;ALTER TABLE `villages` ADD `all_unit_knight` INT(6) NULL DEFAULT '0' AFTER `all_unit_catapult`;ALTER TABLE `unit_place` ADD `unit_knight` INT(11) NULL DEFAULT '0' AFTER `unit_catapult`;ALTER TABLE `villages` ADD `unit_knight_tec_level` INT(11) NULL DEFAULT '1' AFTER `unit_catapult_tec_level`;CREATE TABLE `paladin` (`uid` INT(11) NOT NULL, `name` VARCHAR(150) NOT NULL DEFAULT 'Paladin', PRIMARY KEY (`uid`));CREATE TABLE `pala_deploy` (`uid` INT(11) NOT NULL ,`from` INT(11) NOT NULL ,`to` INT(11) NOT NULL ,`finish` INT(15) NOT NULL ,PRIMARY KEY (`uid`)) ;";

$buildings = '$cl_builds->add_build("Statue","statue");
$cl_builds->set_woodprice("220","1");
$cl_builds->set_stoneprice("220","1");
$cl_builds->set_ironprice("220","1");
$cl_builds->set_bhprice("10","1");
$cl_builds->set_time("600","1");
$cl_builds->set_points("8","1");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("1");
$cl_builds->set_specials(array());
$cl_builds->set_description("An der Statue huldigen die Dorfbewohner deinem Paladin. Sollte dein Paladin einmal fallen, kannst du hier einen deiner K&auml;mpfer zum neuen Paladin ernennen.");
$cl_builds->set_graphicCoords("277,231,256,265,266,285,292,287,306,266");';

$units = '$cl_units->add_unit("Paladin","unit_knight");
$cl_units->set_woodprice("20");
$cl_units->set_stoneprice("20");
$cl_units->set_ironprice("40");
$cl_units->set_bhprice("10");
$cl_units->set_time("3600");
$cl_units->set_att("150","1.045");
$cl_units->set_def("250","1.045");
$cl_units->set_defcav("400","1.045");
$cl_units->set_defarcher("150","1.045");
$cl_units->set_speed("400");
$cl_units->set_booty("100");
$cl_units->set_needed(array());
$cl_units->set_recruit_in("statue");
$cl_units->set_specials(array());
$cl_units->set_group("cav");
$cl_units->set_col("D");
$cl_units->set_attType("undefined");
$cl_units->set_description("Der edle Paladin besch&uuml;tzt dein Dorf und deine Verb&uuml;ndeten vor feindlichen Angreifern. Jeder Spieler kann nur einen Paladin haben.");';

?>
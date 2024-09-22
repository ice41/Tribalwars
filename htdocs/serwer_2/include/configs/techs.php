<?php
$cl_techs = new techs();

//////////// Zeitfaktor zum forschen in der Schmiede ////////////

$cl_techs->set_smithfactor("0.997","0.9096");

///////////////////// Alle Technologien /////////////////////
$cl_techs->add_tech("Pika","spear");
$cl_techs->set_group("Piechota");
$cl_techs->set_woodprice("30","1.6");
$cl_techs->set_stoneprice("25","1.6");
$cl_techs->set_ironprice("35","1.6");
$cl_techs->set_time("240","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array());
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");
$cl_techs->add_tech("Miecz","sword");
$cl_techs->set_group("Piechota");
$cl_techs->set_woodprice("60","1.6");
$cl_techs->set_stoneprice("50","1.6");
$cl_techs->set_ironprice("40","1.6");
$cl_techs->set_time("300","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("smith"=>"1"));
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");
$cl_techs->add_tech("Topór","axe");
$cl_techs->set_group("Piechota");
$cl_techs->set_woodprice("700","1.6");
$cl_techs->set_stoneprice("840","1.6");
$cl_techs->set_ironprice("820","1.6");
$cl_techs->set_time("3085","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("smith"=>"2"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");$cl_techs->add_tech("£uk","archer");$cl_techs->set_group("Piechota");$cl_techs->set_woodprice("640","1.6");$cl_techs->set_stoneprice("560","1.6");$cl_techs->set_ironprice("740","1.6");$cl_techs->set_time("3600","1.75");$cl_techs->set_maxStage("1");$cl_techs->set_needed(array("smith"=>"5","barracks"=>"5"));$cl_techs->set_attType(array('def'));$cl_techs->set_description("");
$cl_techs->add_tech("Lekka kawaleria","light");
$cl_techs->set_group("Kawaleria");
$cl_techs->set_woodprice("2200","1.6");
$cl_techs->set_stoneprice("2400","1.6");
$cl_techs->set_ironprice("2000","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"3","smith"=>"7"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");$cl_techs->add_tech("£ucznik na koniu","cav_archer");$cl_techs->set_group("Kawaleria");$cl_techs->set_woodprice("3000","1.6");$cl_techs->set_stoneprice("2400","1.6");$cl_techs->set_ironprice("2000","1.6");$cl_techs->set_time("5040","1.75");$cl_techs->set_maxStage("1");$cl_techs->set_needed(array("stable"=>"5","smith"=>"10"));$cl_techs->set_attType(array('off'));$cl_techs->set_description("");
$cl_techs->add_tech("Ciê¿ka kawaleria","heavy");
$cl_techs->set_group("Kawaleria");
$cl_techs->set_woodprice("3000","1.6");
$cl_techs->set_stoneprice("2400","1.6");
$cl_techs->set_ironprice("2000","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"10","smith"=>"15"));
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");
$cl_techs->add_tech("Taran","ram");
$cl_techs->set_group("Bronie oblê¿nicze");
$cl_techs->set_woodprice("1200","1.6");
$cl_techs->set_stoneprice("1600","1.6");
$cl_techs->set_ironprice("800","1.6");
$cl_techs->set_time("4480","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("garage"=>"1"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");
$cl_techs->add_tech("Katapulta","catapult");
$cl_techs->set_group("Bronie oblê¿nicze");
$cl_techs->set_woodprice("1600","1.6");
$cl_techs->set_stoneprice("2000","1.6");
$cl_techs->set_ironprice("1200","1.6");
$cl_techs->set_time("5600","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("garage"=>"2","smith"=>"12"));
$cl_techs->set_attType(array('def','off'));
$cl_techs->set_description("");
?>

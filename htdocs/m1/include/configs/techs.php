<?
$cl_techs = new techs();

//////////// Zeitfaktor zum forschen in der Schmiede ////////////
$cl_techs->set_smithfactor("0.997","0.9096");

///////////////////// Alle Technologien /////////////////////

$cl_techs->add_tech("Lan&ccedil;a","spear");
$cl_techs->set_group("Infantaria");
$cl_techs->set_woodprice("256","1.6");
$cl_techs->set_stoneprice("244","1.6");
$cl_techs->set_ironprice("296","1.6");
$cl_techs->set_time("2900","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array());
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");

$cl_techs->add_tech("Espada","sword");
$cl_techs->set_group("Infantaria");
$cl_techs->set_woodprice("360","1.6");
$cl_techs->set_stoneprice("320","1.6");
$cl_techs->set_ironprice("312","1.6");
$cl_techs->set_time("3085","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("smith"=>"1"));
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");

$cl_techs->add_tech("Machado","axe");
$cl_techs->set_group("Infantaria");
$cl_techs->set_woodprice("280","1.6");
$cl_techs->set_stoneprice("336","1.6");
$cl_techs->set_ironprice("228","1.6");
$cl_techs->set_time("3085","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("smith"=>"2"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Explorador","spy");
$cl_techs->set_group("Cavalaria");
$cl_techs->set_woodprice("440","1.6");
$cl_techs->set_stoneprice("496","1.6");
$cl_techs->set_ironprice("416","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"3"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Cavalaria leve","light");
$cl_techs->set_group("Cavalaria");
$cl_techs->set_woodprice("440","1.6");
$cl_techs->set_stoneprice("496","1.6");
$cl_techs->set_ironprice("416","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"3"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Cavalaria Pesada","heavy");
$cl_techs->set_group("Cavalaria");
$cl_techs->set_woodprice("600","1.6");
$cl_techs->set_stoneprice("496","1.6");
$cl_techs->set_ironprice("416","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"10","smith"=>"15"));
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");

$cl_techs->add_tech("&Aacute;riete","ram");
$cl_techs->set_group("M&aacute;quinas de guerra");
$cl_techs->set_woodprice("560","1.6");
$cl_techs->set_stoneprice("800","1.6");
$cl_techs->set_ironprice("192","1.6");
$cl_techs->set_time("4480","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("garage"=>"1"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Catapulta","catapult");
$cl_techs->set_group("M&aacute;quinas de guerra");
$cl_techs->set_woodprice("640","1.6");
$cl_techs->set_stoneprice("960","1.6");
$cl_techs->set_ironprice("560","1.6");
$cl_techs->set_time("5600","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("garage"=>"2","smith"=>"12"));
$cl_techs->set_attType(array('def','off'));
$cl_techs->set_description("");
?>
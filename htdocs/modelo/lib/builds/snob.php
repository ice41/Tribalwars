<?php 
$name = 'Academia';
$drewno = '15000';
$glina = '25000';
$zelazo = '10000';
$zagroda = '80';
$max = '20';
$opis = "Pode recrutar um nobre para assumir outras aldeias.";
$cl_builds->add_build($name,"snob");
$cl_builds->set_woodprice($drewno,"2");
$cl_builds->set_stoneprice($glina,"2");
$cl_builds->set_ironprice($zelazo,"2");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("64800","1.2");
$cl_builds->set_points("512","1.2");
$cl_builds->set_needbuilds(array("main"=>"20","smith"=>"20","market"=>"10"));
if ($config['ag_style'] == 0) {
	$cl_builds->set_maxstage("3");
	}
if ($config['ag_style'] == 1) {
	$cl_builds->set_maxstage("1");
	}
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);

?>
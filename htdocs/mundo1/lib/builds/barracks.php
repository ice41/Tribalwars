<?php 
$name = 'Quartel';
$drewno = '200';
$glina = '170';
$zelazo = '90';
$zagroda = '7';
$max = '25';
$opis = "No quartel, pode recrutar infantaria.Quanto maior o nivel, o recrutamento é mais rápido.";
$cl_builds->add_build($name,"barracks");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.28");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("1800","1.2");
$cl_builds->set_points("16","1.2");
$cl_builds->set_needbuilds(array("main"=>"3"));
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
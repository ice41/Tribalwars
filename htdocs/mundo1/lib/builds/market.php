<?php 
$name = 'Mercado';
$drewno = '100';
$glina = '100';
$zelazo = '100';
$zagroda = '20';
$max = '25';
$opis = "Aqui pode negociar com outros jogadores ou enviar recursos.";
$cl_builds->add_build($name,"market");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.275");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("2700","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array("main"=>"3","storage"=>"2"));
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
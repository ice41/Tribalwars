<?php 
$name = 'Muralha';
$drewno = '50';
$glina = '100';
$zelazo = '20';
$zagroda = '5';
$max = '20';
$opis = "A Muralha protege a aldeia contra o oponente.Graças a ele, a defesa das tropas e a defesa geral da aldeia aumentam.";
$cl_builds->add_build($name,"wall");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.275");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.18");
$cl_builds->set_time("3600","1.2");
$cl_builds->set_points("8","1.2");
$cl_builds->set_needbuilds(array("barracks"=>"1"));
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
<?php 
$name = 'Estabulo';
$drewno = '270';
$glina = '240';
$zelazo = '260';
$zagroda = '8';
$max = '20';
$opis = "Pode recrutar no estábulo.Quanto maior o nivel do estábulo, o recrutamento é mais rápido.";
$cl_builds->add_build($name,"stable");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.28");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("20","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","barracks"=>"5","smith"=>"5"));
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
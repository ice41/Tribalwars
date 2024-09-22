<?php 
$name = 'Poço de Argila';
$drewno = '65';
$glina = '50';
$zelazo = '40';
$zagroda = '10';
$max = '30';
$opis = "No Poço de Argila, os funcionários trazem argila para a expansão da aldeia.Quanto maior o nivel, mais argila será lançada.";
$cl_builds->add_build($name,"stone");
$cl_builds->set_woodprice($drewno,"1.27");
$cl_builds->set_stoneprice($glina,"1.265");
$cl_builds->set_ironprice($zelazo,"1.24");
$cl_builds->set_bhprice($zagroda,"1.14");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
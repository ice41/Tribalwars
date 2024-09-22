<?php 
$name = 'Estatua';
$drewno = '220';
$glina = '220';
$zelazo = '220';
$zagroda = '10';
$max = '1';
$opis = "Os aldeões prestam homenagem ao Paladino no pedestal. Se o seu paladino cair em batalha, aqui pode nomear um novo Paladino para o posto de cavaleiro.";
$cl_builds->add_build($name,"statue");
$cl_builds->set_woodprice($drewno,"1");
$cl_builds->set_stoneprice($glina,"1");
$cl_builds->set_ironprice($zelazo,"1");
$cl_builds->set_bhprice($zagroda,"1");
$cl_builds->set_time("600","1");
$cl_builds->set_points("24","1");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
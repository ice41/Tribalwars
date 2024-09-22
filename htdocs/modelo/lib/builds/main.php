<?php
$name = 'Edificio Principal';
$drewno = '90';
$glina = '80';
$zelazo = '70';
$zagroda = '5';
$max = '30';
$opis = "No Edificio Principal pode atualizar os edifícios existentes ou construir novos. Quanto maior o nivel, mais rápido os edifícios são construídos. Depois de construir o edificio principal até o décimo quinto nível, você pode demolir outros edifícios. Abaixo da lista de edifícios existe também um local onde podemos alterar o nome da aldeia.";
$cl_builds->add_build($name,"main");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.275");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
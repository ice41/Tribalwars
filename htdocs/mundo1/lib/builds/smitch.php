<?php 
$name = 'Ferreiro';
$drewno = '220';
$glina = '180';
$zelazo = '240';
$zagroda = '40';
$max = '20';
$opis = "As unidades são pesquisadas no Ferreiro. Quanto maior o nivel, melhores unidades pode pesquisar. Além disso, o tempo de pesquisa é reduzido. O número de pesquisas possíveis é limitado. Tecnologias já pesquisadas podem ser eliminadas para dar lugar a outras. Nenhum recurso é ganho quando eliminado.";
$cl_builds->add_build($name,"smith");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.275");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("19","1.2");
$cl_builds->set_needbuilds(array("main"=>"5","barracks"=>"1"));
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>
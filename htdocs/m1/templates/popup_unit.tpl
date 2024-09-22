<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{$cl_builds->get_name($building)} - Empire of War</title>
	<link rel="stylesheet" type="text/css" href="../css/game.css" />
	<script src="../js/script.js" type="text/javascript"></script>
</head>
<body>
<table class="main" width="100%" align="center">
	<tr>
		<td>
			<table>
				<tr>
					<td><img src="../graphic/unit_big/{$cl_units->get_graphicName($unit)}.png" alt="{$cl_units->get_name($unit)}" /></td>
					<td>
						<h2>{$cl_units->get_name($unit)}</h2>
						<p>{$cl_units->get_description($unit)}</p>
					</td>
				</tr>
			</table>
			<table style="border:1px solid #FEE47D;" class="vis">
				<tr><th width="150">Custo</th><th>Ocupa&ccedil;&atilde;o</th><th>Velocidade</th><th>Saque</th></tr>
				<tr class="center">
					<td><img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$cl_units->get_woodprice($unit)} <img src="../graphic/icons/stone.png" title="Argila" alt="" />{$cl_units->get_stoneprice($unit)} <img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$cl_units->get_ironprice($unit)}</td>
					<td><img src="../graphic/icons/farm.png" title="Fazenda" alt="" /> {$cl_units->get_bhprice($unit)}</td>
					<td>{$cl_units->get_speed($unit,'minutes')} Minutos por campo</td>
					<td>{$cl_units->get_booty($unit)}</td>
				</tr>
			</table><br />
			<table style="border:1px solid #FEE47D;" class="vis">
				<tr><td>Pontos de ataque</td><td><img src="../graphic/unit/att.png" alt="Pontos de ataque" /> {$cl_units->get_att($unit,1)}</td></tr>
				<tr><td>Defesa geral</td><td><img src="../graphic/unit/def.png" alt="Defesa geral" /> {$cl_units->get_def($unit,1)}</td></tr>
				<tr><td>Defesa contra cavalaria</td><td><img src="../graphic/unit/def_cav.png" alt="Defesa contra cavalaria" /> {$cl_units->get_defCav($unit,1)}</td></tr>
				<tr><td>Defesa contra arqueiros</td><td><img src="../graphic/unit/def_archer.png" alt="Defesa contra arqueiros" /> {$cl_units->get_defArcher($unit,1)}</td></tr>
			</table><br />
			<table class="vis">
				<tr><th colspan="{$cl_units->get_countNeeded($unit)}">Requerimentos de pesquisa</th></tr>
				<tr>
					{if count($cl_units->get_needed($unit))>0}
						{foreach from=$cl_units->get_needed($unit) key=n_unit item=n_stage}
					<td><a href="popup_building.php?building={$n_unit}">{$cl_builds->get_name($n_unit)}</a> ({$n_stage|nivel})</td>
						{/foreach}
					{else}
					<td><div class="error">N&atilde;o existem requerimentos para pesquisa desta unidade.</div></td>
					{/if}
				</tr>
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
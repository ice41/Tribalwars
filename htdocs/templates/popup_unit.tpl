<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$cl_units->get_name($unit)}</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1176997364" type="text/javascript"></script>
</head>

<body >
<table class="main" width="100%" align="center"><tr><td>
<table><tr><td><img src="graphic/unit_big/{$cl_units->get_graphicName($unit)}.png" alt="{$cl_units->get_name($unit)}" /></td>
<td>
<h2>{$cl_units->get_name($unit)}</h2>
<p>{$cl_units->get_description($unit)}</p>
</td></tr></table>

<table style="border: 1px solid #DED3B9;" class="vis"><tr><th width="150">Costuri</th><th>Popula&#355;ie</th><th>Rapiditate</th><th>Duce prada</th></tr>

<tr class="center"><td><img src="graphic/holz.png" title="Lemn" alt="" />{$cl_units->get_woodprice($unit)} <img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$cl_units->get_stoneprice($unit)} <img src="graphic/eisen.png" title="Fier" alt="" />{$cl_units->get_ironprice($unit)} </td>
<td><img src="graphic/face.png" title="Ferm&#259;" alt="" /> {$cl_units->get_bhprice($unit)}</td>
<td>{$cl_units->get_speed($unit,'minutes')} minute pe c&#226;mp</td><td>{$cl_units->get_booty($unit)}</td></tr>
</table>
<br />

<table style="border: 1px solid #DED3B9;" class="vis">
<tr><td>Putere de atac</td><td><img src="graphic/unit/att.png" alt="Putere de atac" /> {$cl_units->get_att($unit,1)}</td></tr>
<tr><td>Ap&#259;rare &#238;n general</td><td><img src="graphic/unit/def.png" alt="Ap&#259;rare &#238;n general" /> {$cl_units->get_def($unit,1)}</td></tr>
<tr><td>Ap&#259;rare - cavalerie</td><td><img src="graphic/unit/def_cav.png" alt="Ap&#259;rare - cavalerie" /> {$cl_units->get_defCav($unit,1)}</td></tr>
<tr><td>Ap&#259;rare - arca&#351;i</td><td><img src="graphic/unit/def_archer.png" alt="Ap&#259;rare - arca&#351;i" /> {$cl_units->get_defArcher($unit,1)}</td></tr>
</table>
<br />

	
<table class="vis"><tr><th colspan="{$cl_units->get_countNeeded($unit)}">Condi&#355;ii pentru cercetare:</th></tr>
<tr>
		{if count($cl_units->get_needed($unit))>0}
			{foreach from=$cl_units->get_needed($unit) key=n_unit item=n_stage}
			<td><a href="popup_building.php?building={$n_unit}">{$cl_builds->get_name($n_unit)}</a> (Nivelul {$n_stage})</td>
			{/foreach}
		{else}
			<td>Unitate f&#259;r&#259; condi&#355;ii necesare</td>
		{/if}
</tr>
</table><br />


</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$cl_builds->get_name($building)}</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1176997364" type="text/javascript"></script>
</head>
<body>
<table class="main" width="100%" align="center"><tr><td>
<h2>{$cl_builds->get_name($building)}</h2>
<p>{$cl_builds->get_description_bydbname($building)}</p>

<p>Nivelul maxim de extindere: <b>{$cl_builds->get_maxstage($building)}</b></p>

{if count($cl_builds->get_needed_by_dbname($building))>0}
	<table class="vis"><tr><th colspan="3">Condi&#355;ii</th></tr>
		<tr>
			{foreach from=$cl_builds->get_needed_by_dbname($building) key=n_building item=n_stage}
				<td><a href="popup_building.php?building={$n_building}">{$cl_builds->get_name($n_building)}</a> (Nivelul {$n_stage})</td>
			{/foreach}
		</tr>
	</table>
{/if}

<table class="vis">
<tr>
<th>Nivelul</th><th width="220">Necesitate</th><th width="110">Muncitori pentru nivelul/total</th></tr>
{section name=foo start=1 loop=$cl_builds->get_maxstage($building)+1 step=1}
<tr>
	<td>{$smarty.section.foo.index}</td>
	<td><img src="graphic/holz.png" title="Lemn" alt="" />{$cl_builds->get_wood($building,$smarty.section.foo.index)} <img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$cl_builds->get_stone($building,$smarty.section.foo.index)} <img src="graphic/eisen.png" title="Fier" alt="" />{$cl_builds->get_iron($building,$smarty.section.foo.index)} </td>
	<td><img src="graphic/face.png" title="Ferma" alt="" />{$cl_builds->get_bh($building,$smarty.section.foo.index)} / {$cl_builds->get_bh_total()}</td>
</tr>
{/section}
</table>

</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
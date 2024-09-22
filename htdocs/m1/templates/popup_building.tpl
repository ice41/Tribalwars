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
					<td><img src="../graphic/build/{$building}.jpg" alt="{$cl_builds->get_name($building)}" /></td>
					<td>
						<h2>{$cl_builds->get_name($building)}</h2>
						<p>{$cl_builds->get_description_bydbname($building)}</p>
					</td>
				</tr>
			</table>
			<p>N&iacute;vel m&aacute;ximo: <b>{$cl_builds->get_maxstage($building)}</b></p>
			{if count($cl_builds->get_needed_by_dbname($building))>0}
			<table class="vis">
				<tr><th colspan="3">Requerimentos para contru&ccedil;&atilde;o:</th></tr>
				<tr>
				{foreach from=$cl_builds->get_needed_by_dbname($building) key=n_building item=n_stage}
					<td><a href="popup_building.php?building={$n_building}">{$cl_builds->get_name($n_building)}</a> (Nivel {$n_stage})</td>
				{/foreach}
				</tr>
			</table><br />
			{/if}
			<table class="vis" width="100%">
				<tr>
					<th>N&iacute;vel</th>
					<th width="220">Recursos necess&aacute;rios</th>
					<th width="110">Fazenda</th>
				</tr>
				{section name=foo start=1 loop=$cl_builds->get_maxstage($building)+1 step=1}
				<tr>
					<td align="center">{$smarty.section.foo.index}</td>
					<td align="center"><img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$cl_builds->get_wood($building,$smarty.section.foo.index)} <img src="../graphic/icons/stone.png" title="Argila" alt="" />{$cl_builds->get_stone($building,$smarty.section.foo.index)} <img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$cl_builds->get_iron($building,$smarty.section.foo.index)}</td>
					<td align="center"><img src="../graphic/icons/farm.png" title="Fazenda" alt="" /> {$cl_builds->get_bh($building,$smarty.section.foo.index)}</td>
				</tr>
				{/section}
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
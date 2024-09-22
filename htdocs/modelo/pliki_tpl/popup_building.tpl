<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{$cl_builds->get_name($unit)}</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

		<link rel="stylesheet" type="text/css" href="game.css?1331133567" />
		<link rel="stylesheet" type="text/css" href="styl.css?1331133567" />

	</head>

	<body id="ds_body" class="header" >
		<table style="margin:auto; margin-top: 15px; width: 100%;padding:5px;">
			<tr>
				<td>
					<table class="content-border" id="content_value" style="border-collapse: collapse; width: 100%; padding: 10px;">
						<tr>
							<td>
								<table>
									<tr>
										<td valign="top">
											<img src="/ds_graphic/big_buildings/{$building}1.png" alt="{$cl_builds->get_name($unit)}" />
										</td>
										<td valign="top">
											<h2>{$cl_builds->get_name($building)}</h2>
											<p>{$cl_builds->get_description_bydbname($building)}</p>
										</td>
									</tr>
								</table>
								<br>
								
								<table class="vis">
									<tr>
										<th>
										Maksymalny poziom rozbudowy:
										</th>
										<td>
										{$cl_builds->get_maxstage($building)}
										</td>
									</tr>
								</table>
								<br>

								{if count($cl_builds->get_needed_by_dbname($building))>0}
									<table class="vis">
										<tr>
											<th colspan="3">Níveis de construção necessários</th>
										</tr>
										<tr>
											{foreach from=$cl_builds->get_needed_by_dbname($building) key=n_building item=n_stage}
												<td><a href="popup_building.php?building={$n_building}">{$cl_builds->get_name($n_building)}</a> (Nível {$n_stage})</td>
											{/foreach}
										</tr>
									</table>
									<br>
								{/if}
								

								<table class="vis">
									<tr>
										<th>Nível</th>
										<th width="220">Custos</th>
										<th width="140">Colonizadores / Juntos</th>
									</tr>
									{section name=foo start=1 loop=$cl_builds->get_maxstage($building)+1 step=1}
										<tr>
											<td>
												{$smarty.section.foo.index}
											</td>
											<td>
												<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{$cl_builds->get_wood($building,$smarty.section.foo.index)} 
												<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{$cl_builds->get_stone($building,$smarty.section.foo.index)} 
												<img src="/ds_graphic/eisen.png" title="Ferro" alt="" />{$cl_builds->get_iron($building,$smarty.section.foo.index)} 
											</td>
											<td>
												<img src="/ds_graphic/face.png" title="População" alt="" />
												{$cl_builds->get_bh($building,$smarty.section.foo.index)} / {$cl_builds->get_bh_total($building,$smarty.section.foo.index)}
											</td>
										</tr>
									{/section}
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>

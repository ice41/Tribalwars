<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{$cl_units->get_name($unit)}</title>
		<meta http-equiv="content-type" content="text/html; charset=windows-1250" />

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
										<td>
											<img src="/ds_graphic/unit_big/{$cl_units->get_graphicName($unit)}.png" alt="{$cl_units->get_name($unit)}" />
										</td>
										<td>
											<h2>{$cl_units->get_name($unit)}</h2>
											<p>{$cl_units->get_description($unit)}</p>
										</td>
									</tr>
								</table>

								<table class="vis">
									<tr>
										<th width="150">Zapotrzebowanie</th>
										<th>Osadnicy</th>
										<th>Szybkoœæ</th>
										<th>£upy</th>
									</tr>

									<tr class="center">
										<td>
											<img src="/ds_graphic/holz.png" title="Drewno" alt="" />{$cl_units->get_woodprice($unit)} 
											<img src="/ds_graphic/lehm.png" title="Glina" alt="" />{$cl_units->get_stoneprice($unit)} 
											<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{$cl_units->get_ironprice($unit)} 
										</td>
										<td>
											<img src="/ds_graphic/face.png" title="Wieœniak" alt="" /> {$cl_units->get_bhprice($unit)}
										</td>
										<td>
											{$cl_units->get_speed($unit) / 60} Minut na pole
										</td>
										<td>
											{$cl_units->get_booty($unit)}
										</td>
									</tr>
								</table>
								
								<br />

								<table class="vis">
									<tr>
										<td>Si³a ataku</td>
										<td>
											<img src="/ds_graphic/unit/att.png" alt="Si³a ataku" /> {$cl_units->get_att($unit,1)}
										</td>
									</tr>
									<tr>
										<td>Si³a obrony</td>
										<td>
											<img src="/ds_graphic/unit/def.png" alt="Si³a obrony" /> {$cl_units->get_def($unit,1)}
										</td>
									</tr>
									<tr>
										<td>Si³a obrony przeciw kawalerii</td>
										<td>
											<img src="/ds_graphic/unit/def_cav.png" alt="Si³a obrony przeciw kawalerii" /> {$cl_units->get_defCav($unit,1)}</td>
									</tr>
									<tr>
										<td>Si³a obrony przeciw ³ucznikom</td>
										<td><img src="/ds_graphic/unit/def_archer.png" alt="Si³a obrony przeciw ³ucznikom" /> {$cl_units->get_defArcher($unit,1)}</td>
									</tr>
							</table>
							
							<br />

							<table class="vis">
								<tr>
									<th colspan="{$cl_units->get_countNeeded($unit)}">Wymagane poziomy budynków, aby móc rekrutowaæ dan¹ jednostkê</th>
								</tr>
								
								<tr>
									{if count($cl_units->get_needed($unit))>0}
										{foreach from=$cl_units->get_needed($unit) key=n_unit item=n_stage}
											<td>
												<a href="popup_building.php?building={$n_unit}">{$cl_builds->get_name($n_unit)}</a> (Poziom {$n_stage})
											</td>
										{/foreach}
									{else}
										<td>Jednostka dostêpna bez wymagañ.</td>
									{/if}
								</tr>
							</table>
							<br />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
